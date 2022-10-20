<?php
include 'php/helper/db.php';

use DB\DB;

$db = new DB();
include 'includes/header.php';
require_once 'php/helper/alert.php';
if (isset($_GET['id'])) {
    if (isAdmin() || isJrAdmin()) {
        $id = $_GET['id'];
        $res = $db->db("DELETE FROM dealership WHERE id = '$id'");
        if ($res) {
            redirect('dealership.php');
        }
    }
}
?>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <button class="btn btn-primary mx-1" onclick="ExportToExcel('dealership.xlsx')">Download</button>
            <a href="dealership.php?filter=day" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'day' ? 'disabled' : '' ?>">Today</a>
            <a href="dealership.php?filter=week" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'week' ? 'disabled' : '' ?>">This Week</></a>
            <a href="dealership.php?filter=month" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'month' ? 'disabled' : '' ?>">This Month</></a>
            <a href="dealership.php"><button class="btn btn-primary mx-1 <?php echo !isset($_GET['filter']) ? 'disabled' : '' ?>">All</button></a>
            <a href="javascript:void(0);" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#range_filter_modal">Range</a>

            <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="tableList">
                <thead>
                    <tr>
                        <th class="text-nowrap">SL No.</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Date of Birth</th>
                        <th class="text-nowrap">Educational Qualification</th>
                        <th class="text-nowrap">Address</th>
                        <th class="text-nowrap">State</th>
                        <th class="text-nowrap">City</th>
                        <th class="text-nowrap">Pincode</th>
                        <th class="text-nowrap">Business Information</th>
                        <th class="text-nowrap">Date</th>
                        <?php
                        if (isAdmin() || isJrAdmin()) {
                        ?>
                            <th class="text-nowrap">Action</th>
                        <?php } ?>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
</div>
<!-- | MODAL | -->
<div class="modal fade" id="dealershipModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Business Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><b>Partnership: </b> <span data-modal-detail="partnership"></span></p>
                <p><b>State Applied For: </b> <span data-modal-detail="state_applied_for"></span>, <b>City Applied For: </b> <span data-modal-detail="city_applied_for"></span></p>
                <p><b>Current Business Details: </b> <span data-modal-detail="current_business_detail"></span></p>
                <p><b>Automotive industry experience: </b> <span data-modal-detail="experience"></span></p>
                <p><b>Number of years in business: </b> <span data-modal-detail="years"></span></p>
                <p><b>Which companies have you partnered with?: </b> <span data-modal-detail="partnered_with"></span></p>
                <p><b>Annual turnover of your business (In lacs): </b> <span data-modal-detail="annual_turnover"></span></p>
                <p><b>Land Details: </b> <span data-modal-detail="land_detail"></span></p>
                <p><b>What is the approximate amount you are willing to invest? (In Rupees): </b> <span data-modal-detail="amount_willing_to_invest"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->

<!-- Range Filter Model -->

<div class="modal fade" id="range_filter_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter By Range</h5>
            </div>
            <form method="get">
                <input type="hidden" name="filter" value="range">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="label">From</label>
                        <input type="date" name="from" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="label">To</label>
                        <input type="date" name="to" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
<?php
$filter = '';
if (isset($_GET['filter'])) {
    $filter .= 'filter=' . $_GET['filter'];
}
if (isset($_GET['from'])) {
    $filter .= '&from=' . $_GET['from'];
}
if (isset($_GET['to'])) {
    $filter .= '&to=' . $_GET['to'];
}
?>
<script>
    function deletedealership(id) {
        commonAjax({
                page: 'php/module/dealership/delete.php?id=' + id,
                type: 'GET'
            })
            .then(response => {
                snackbar({
                    success: response.success,
                    message: response.message
                })
                if (response.success) tableRefreshBtn.click();
            })
            .catch(err => snackbar({
                success: false,
                message: "Something went wrong!"
            }))

    }

    function viewBusinessDetail(id) {
        commonAjax({
                addonUrl: 'php/module/dealership/list-view.php?id=' + id,
                type: 'GET'
            })
            .then(response => {
                if (response.success) {
                    $('#dealershipModal').modal('show');

                    for (const [key, value] of Object.entries(response.data)) {
                        try {
                            document.querySelector(`span[data-modal-detail="${key}"]`).innerHTML = value
                        } catch (err) {
                            console.log(err)
                        }
                    }
                }

            })
            .catch(err => console.log(err))
    }

    window.onload = () => {
        const columns = [{
                data: 'sno'
            },
            {
                data: 'name',
                render: (data) => `<span class="text-nowrap">${data}</span>`
            },
            {
                data: 'email'
            },
            {
                data: 'dob',
            },
            {
                data: 'qualification',
            },
            {
                data: 'address',
                render: (data) => `<span class="text-nowrap">${data}</span>`
            },
            {
                data: 'state',
            },
            {
                data: 'city',
            },
            {
                data: 'pincode',
            },
            {
                data: 'pincode',
                render: (data, type, row) => `<button type="button" class="btn btn-sm btn-primary" onclick="viewBusinessDetail(${row.id})">VIEW</button>`
            },
            {
                data: 'created_at',
                render: (data) => `<span class="text-nowrap">${data}</span>`
            },
            <?php if (isAdmin() || isJrAdmin()) : ?> {
                    data: 'ACTION',
                    render: function(data, type, row) {
                        return `<div style="width: 100px" class="text-center">
                            <a href="dealership.php?id=${row.id}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                        </div>`;
                    }
                }
            <?php endif; ?>
        ];
        initializeDatatable({
            Url: "./php/module/dealership/list.php?<?php echo $filter; ?>",
            columns
        });
    }
</script>