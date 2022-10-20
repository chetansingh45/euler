<?php
require('./php/helper/db.php');

use DB\DB;

$DB = new DB();
$res = $DB->db("select o.id, o.status, o.booking_id, o.transaction_id, o.transaction_detail,  o.invoice_no, o.total_amount, o.actual_amount, o.finance, o.email, o.firstname, o.lastname, o.phone, p.name as product_name from orders as o, product_sku as p where o.transaction_id is not null && o.transaction_id != '' && p.id = o.product_sku_id order by o.id desc limit 10");
include 'includes/header.php' ?>

<div class="row">
<?php
                    $t_res = $DB -> db("SELECT  (SELECT COUNT(*) FROM   orders) AS total_order,
                                        (SELECT COUNT(*) FROM   contactus) AS total_contactus,
                                        (SELECT COUNT(*) FROM   product_sku) AS total_product,
                                        (SELECT COUNT(*) FROM   testride) AS total_testride FROM dual");
                    $t_row = mysqli_fetch_assoc($t_res);
                    $temp_card = ["Bookings" => $t_row['total_order'], "Test Rides" => $t_row['total_testride'], "Contacts" => $t_row['total_contactus'], "Products" => $t_row['total_product']];
                    foreach($temp_card as $t_key => $t_value):
                ?>
    <div class="col-md-3 col-sm-6">
        <div class="card bg-primary-light shadow-none">
            <div class="card-body p-3">
                <div class="media align-items-center">
                    <span class="p-3 mr-3 feature-icon rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary)" class="bi bi-calendar4-week" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                        <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                        </svg>
                    </span>
                    <div class="media-body text-right">
                        <!-- <p class="fs-18 mb-2">Interviews Schedule</p>
                        <span class="fs-48 text-primary font-w600">86</span> -->

                            <p class="fs-18 mb-2"><?php echo $t_key ?></p>
                            <span class="fs-48 text-primary font-w600"><?php echo $t_value ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>




    <div class="col-12">
        <h4 class="fs-20 font-w600">Latest Bookings</h4>
        <!-- Table -->
        <div class="table-responsive mt-4">
            <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                <thead>
                    <tr>
                        <th scope="col" class="text-nowrap">Booking ID</th>
                        <th scope="col" class="text-nowrap">Total</th>
                        <th scope="col" class="text-nowrap">Payment Method</th>
                        <th scope="col" class="text-nowrap">Payment Status</th>
                        <!--<th scope="col" class="text-nowrap">Status</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($order = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td><?php echo $order['booking_id'] ?></td>
                            <td class="digits"><?php echo $order['actual_amount'] ?></td>
                            <?php
                            $paymentDetail = [];
                            $paymentDetail['paymentmethod'] = json_decode($order['transaction_detail'], true)['PAYMENTMODE'];
                            if ($order['transaction_id'] == 'failed' || $order['transaction_id'] == 'pending') :
                                $paymentDetail['paymentstatus'] = $order['transaction_id'];
                            else :
                                $paymentDetail['paymentstatus'] = 'success';
                            endif;
                            ?>
                            <td><?php echo $paymentDetail['paymentmethod']; ?></td>
                            <td><small class="text-white px-2 py-1 rounded <?php echo $paymentDetail['paymentstatus'] === 'success' ? "bg-success" : "bg-danger" ?>"><?php echo $paymentDetail['paymentstatus']; ?></small></td>
                            <!--<td class="digits"><?php echo $order['status']; ?></td>-->
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>