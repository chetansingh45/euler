<?php
include 'php/helper/db.php';

use DB\DB;

$db = new DB();
include 'includes/header.php';
require_once 'php/helper/alert.php';
if (isset($_GET['id'])) {
    if (isAdmin() || isJrAdmin()) {
        $id = $_GET['id'];
        $res = $db->db("DELETE FROM contactus WHERE id = '$id'");
        if ($res) {
            redirect('contactus.php');
        }
    }
}
?>

<div class="row">
    <div class="col-12">
        <button class="btn btn-primary mx-1" onclick="ExportToExcel('contactus.xlsx')">Download</button>
        <a href="contactus.php?filter=day" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'day' ? 'disabled' : '' ?>">Today</a>
        <a href="contactus.php?filter=week" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'week' ? 'disabled' : '' ?>">This Week</></a>
        <a href="contactus.php?filter=month" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'month' ? 'disabled' : '' ?>">This Month</></a>
        <a href="contactus.php"><button class="btn btn-primary mx-1 <?php echo !isset($_GET['filter']) ? 'disabled' : '' ?>">All</button></a>

        <div class="table-responsive">
            <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="tableList">

                <thead>
                    <tr>
                        <th class="text-nowrap">SL No.</th>
                        <th class="text-nowrap">NAME</th>
                        <th class="text-nowrap">EMAIL</th>
                        <th class="text-nowrap">MOBILE</th>
                        <th class="text-nowrap">ENQUIRY TYPE</th>
                        <th class="text-nowrap">MESSAGE</th>
                        <th class="text-nowrap">DATE</th>
                        <?php
                        if (isAdmin() || isJrAdmin()) {
                        ?>
                            <th class="text-nowrap">ACTION</th>
                        <?php } ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<?php include 'includes/footer.php' ?>

<script>
    function deletecontact(id) {
        commonAjax({
                page: 'php/module/contact/delete.php?id=' + id,
                type: 'GET'
            })
            .then(response => {
                console.log(response);
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

    function viewcontactus(id) {
        // document.querySelector(`span[data-modal-detail="message"]`).innerHTML = "Loading...";
        commonAjax({
                page: 'php/module/contact/list-view.php?id=' + id,
                type: 'GET'
            })
            .then(response => {
                if (response.success) {
                    $('#ContactModal').modal('show');
                    // document.querySelector(`span[data-modal-detail="message"]`).innerHTML = response.data.message;
                }

            })
            .catch(err => console.log(err))
    }
    window.onload = () => {
        const columns = [{
                data: 'sno',
            },
            {
                data: 'name',
                render: (data) => `<span class="text-nowrap">${data}</span>`
            },
            {
                data: 'email',
                render: (data) => `<span class="text-nowrap">${data}</span>`
            },
            {
                data: 'mobile',
                render: (data) => `<span class="text-nowrap">${data}</span>`
            },
            {
                data: 'enquiry_type',
            },
            {
                data: 'message',
                render: (data, type, row) => `${data}`
            },
            {
                data: 'created_at',
                render: (data) => `<span class="text-nowrap">${data}</span>`
            },
            <?php if (isAdmin() || isJrAdmin()) : ?> {
                    data: 'ACTION',
                    render: function(data, type, row) {
                        return `<div style="width: 100px" class="text-center">
                            <a href="contactus.php?id=${row.id}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                        </div>`;
                    }
                }
            <?php endif; ?>
        ];

        initializeDatatable({
            Url: "./php/module/contact/list.php<?php echo isset($_GET['filter']) ? "?filter={$_GET['filter']}" : '' ?>",
            columns
        });
    }
</script>
