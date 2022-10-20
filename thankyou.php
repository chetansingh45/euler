<?php
session_start();
if(!isset($_SESSION['payment'])) header("Location: ./product.php");
require('./php/helper/db/db.php');

use DB\DB;
$DB = new DB();

/*
|Validating and fetching Product
================================= */
$payment = $_SESSION['payment'];
if($payment -> payment === false)  header("Location: ./book-now.php");

$res = $DB->db("select o.id, o.status, o.booking_id,  o.invoice_no, o.total_amount, o.actual_amount, o.state, o.city, o.showroom, o.finance, o.email, o.firstname, o.lastname, o.phone, p.image_url, p.name as product_name, p.sku_name from orders as o, product_sku as p where o.booking_id = '{$payment -> order_id}' && p.id = o.product_sku_id");
if(mysqli_num_rows($res) === 0) header("Location: ./book-now.php");
$order= mysqli_fetch_assoc($res);

$page_title = 'Thankyou';
include 'includes/header.php'; 
?>
<!-- Hero Banner -->
<section class="bg-dark sec-space">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center wow zoomIn">
				<h2 class="hero-title text-primary">Thank you for booking Euler HiLoad</h2>
			</div>
		</div>
	</div>
</section>

<!-- Thankyou Content -->
<section class="sec-space">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h4 class="heading-sm text-center mb-3 mb-md-4"><?php echo !in_array($payment->payment, ["pending", "failed"]) ? "Your Booking is confirmed " : "Your Payment is {$payment->payment} " ?>and your order id is <b class="text-primary">#<?php echo $order['booking_id'] ?></b></h4>
                <div class="pur-pro-info text-center">
                    <div class="pur-pro-info-item">
                        <div class="pur-pro-img text-center pr-lg-4 mb-4 mb-lg-0">
                            <img src="<?php echo $order['image_url']; ?>">
                        </div>
                        <div class="bg-light-blue p-4">
                            <h4 class="text-big"><?php echo $order['product_name'].' '.$order['sku_name'] ?></h4>
                            <h4 class="text-big">Quantity: <b>1</b></h4>
                            <h4 class="text-big">₹<?php echo $order['actual_amount'] ?></h4>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-12">
                        <h4 class="text-big mb-3">Your Information</h4>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="bg-light-blue p-4 h-100">
                            <p class="mb-2">Full Name - <b><?php echo $order['firstname'].' '.$order['lastname'] ?></b></p>
                            <p class="mb-2">Your Phone - <b><?php echo $order['phone'] ?></b></p>
                            <p class="mb-0">Email - <b><?php echo $order['email'] ?></b></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light-blue p-4 h-100">
                            <p class="mb-2">State - <b><?php echo $order['state'] ?></b>, City - <b><?php echo $order['city'] ?></b></p>
                            <p class="mb-2">Showroom - <b><?php echo $order['showroom'] ?></b></p>
                            <p class="mb-0">Finance Required - <b><?php echo $order['finance'] ? "Yes" : "No" ?></b></p>
                        </div>
                    </div>
                </div>
                <h4 class="text-big text-center mt-3 mt-md-4">Please check your order details we have sent on your registered email (<b class="text-primary"><?php echo $order['email'] ?></b>)</h4>
                <h3 class="text-center mt-3 mt-md-4">In case of any query  you can contact us at Phone number <a href="tel:011-45859333">011-45859333</a> or write to us at <a href="customercare@eulermotors.com">customercare@eulermotors.com</a></h3>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php';?>
