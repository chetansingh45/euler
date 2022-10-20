<?php
include 'php/helper/db.php';

use DB\DB;

$db = new DB();
include 'includes/header.php';
require_once 'php/helper/alert.php';
if (isset($_GET['id'])) {
    if (isAdmin() || isJrAdmin()) {
        $id = $_GET['id'];
        $res = $db->db("DELETE FROM orders WHERE id = '$id'");
        if ($res) {
            redirect('booking.php');
        }
    }
}
?>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <button class="btn btn-primary" onclick="ExportToExcel('booking.xlsx')">Download</button>
            <a href="booking.php?filter=day" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'day' ? 'disabled': '' ?>">Today</a>
            <a href="booking.php?filter=week" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'week' ? 'disabled': '' ?>">This Week</></a>
            <a href="booking.php?filter=month" class="btn btn-primary mx-1 <?php echo isset($_GET['filter']) && $_GET['filter'] == 'month' ? 'disabled': '' ?>">This Month</></a>
            <a href="booking.php"><button class="btn btn-primary mx-1 <?php echo !isset($_GET['filter']) ? 'disabled': '' ?>">All</button></a>
            <a href="javascript:void(0);" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#range_filter_modal">Range</a>
            <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="tableList">
                <thead>
                    <tr>
                        <th class="text-nowrap">SL No.</th>
                        <th class="text-nowrap">Booking ID</th>
                        <th class="text-nowrap">Date</th>
                        <th class="text-nowrap">Amount</th>
                        <th class="text-nowrap">Product Name</th>
                        <th class="text-nowrap">Model</th>
                        <th class="text-nowrap">Customer Name</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Phone</th>
                        <th class="text-nowrap">Pincode</th>
                        <th class="text-nowrap">Transaction ID</th>
                        <th class="text-nowrap">Payment Status</th>
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
    function deleteOrder(id) {
        commonAjax({
                page: 'php/module/order/delete.php?id=' + id,
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
    const columns = [
        {
            data: 'sno'
        },
        {
            data: 'booking_id',
        },
        {
            data: 'created_at', render: (data) => `<span class="text-nowrap">${data}</span>`
        },
        {
            data: 'actual_amount'  
        },
        {
            data: 'product_name',
        },
        {
            data: 'sku_name',
        },
        {
            data: 'firstname',
        },
        {
            data: 'email'
        },
        {
            data: 'phone',
        },
        {
            data: 'pincode',
        },
        {
            data: 'transaction_id',
            render: function (data, type, row) {
                if(row.transaction_id == 'failed') return "-";
                else return `<small>${row.transaction_id}</small>`;
            }
        },
        {
            data: 'transaction_id',
            render: function (data, type, row) {
                if(row.transaction_id == 'failed' || row.transaction_id == 'pending') return "<small class='bg-danger px-2 py-1 text-white rounded'>"+row.transaction_id+"</small>";
                else return "<small class='bg-success text-white px-2 py-1 rounded'>success</small>";
            }
        },
        <?php
            if(isAdmin()){
        ?>
        {
            data: 'ACTION',
            render: function (data, type, row) {
                return `<div style="width: 100px" class="text-center">
                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger" onclick="deleteOrder(${row.id})"><i class="bi bi-trash"></i></a>
                        </div>`;
                    }
                }
            <?php } ?>
        ];
        initializeDatatable({
            Url: "./php/module/order/list.php?<?php echo $filter;?>",
            columns
        });

    }
</script>
