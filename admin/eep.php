<?php
include 'php/helper/db.php';

use DB\DB;

$db = new DB();
include 'includes/header.php';
require_once 'php/helper/alert.php';
if (isset($_GET['id'])) {
    if (isAdmin() || isJrAdmin()) {
        $id = $_GET['id'];
        $res = $db->db("DELETE FROM eep_form WHERE id = '$id'");
        if ($res) {
            redirect('eep.php');
        }
    }
}
?>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <button class="btn btn-primary mx-1" onclick="ExportToExcel('newsletter.xlsx')">Download</button>
            <a href="eep.php?filter=day" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'day' ? 'disabled' : '' ?>">Today</a>
            <a href="eep.php?filter=week" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'week' ? 'disabled' : '' ?>">This Week</></a>
            <a href="eep.php?filter=month" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'month' ? 'disabled' : '' ?>">This Month</></a>
            <a href="eep.php"><button class="btn btn-primary mx-1 <?php echo !isset($_GET['filter']) ? 'disabled' : '' ?>">All</button></a>
            <a href="javascript:void(0);" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#range_filter_modal">Range</a>

            <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="tableList">

                <thead>
                    <tr>
                        <th class="text-nowrap">SL No.</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap">Contact</th>
                        <th class="text-nowrap">Age</th>
                        <th class="text-nowrap">City</th>
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
if(isset($_GET['filter'])){
    $filter .='filter='.$_GET['filter'];
}
if(isset($_GET['from'])){
    $filter.= '&from='.$_GET['from'];
}
if(isset($_GET['to'])){
    $filter.= '&to='.$_GET['to'];
}
?>

<script>
    function deletetenewsletter(id) {
        commonAjax({
                page: 'php/module/newsletter/delete.php?id=' + id,
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
    window.onload = () => {
        const columns = [{
                data: 'sno'
            },
            {
                data: 'name',
                render: (data) => `<span class="text-nowrap">${data}</span>`
            },
            {
                data: 'contact'
            },
            {
                data: 'age',
            },
            {
                data: 'city',
            },
            {
                data: 'created_at',
                render: (data) => `<span class="text-nowrap">${data}</span>`
            },
            <?php
            if (isAdmin() || isJrAdmin()) : ?> {
                    data: 'ACTION',
                    render: function(data, type, row) {
                        return `<div style="width: 100px" class="text-center">
                            <a href="eep.php?id=${row.id}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                        </div>`;
                    }
                }
            <?php endif; ?>
        ];
        initializeDatatable({
            Url: "./php/module/eep/list.php?<?php echo $filter; ?>",
            columns
        });
    }
</script>
