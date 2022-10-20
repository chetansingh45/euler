<?php
require('./php/helper/db/db.php');
use DB\DB;

$DB = new DB();

if(!isset($_GET['booking_id'])) header("Location: ./test-ride.php");

$testride_id = $DB -> input($_GET['booking_id']);
$res = $DB -> db("select * from testride where testride_id = '$testride_id'");
if(mysqli_num_rows($res) === 0) header("Location: ./test-ride.php");

$testride = mysqli_fetch_assoc($res);

$page_title = 'Thankyou for your test ride';
include 'includes/header.php'; 
?>
<!-- Hero Banner -->
<section class="bg-dark sec-space">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center wow zoomIn">
				<h2 class="hero-title text-primary">Thankyou</h2>
			</div>
		</div>
	</div>
</section>

<!-- Thankyou Content -->
<section class="sec-space">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h4 class="heading-sm text-center mb-3 mb-md-4">Your test ride is confirmed your booking id is <b class="text-primary">#<?php echo $testride['testride_id'] ?></b></h4>
                <div class="row text-center">
                    <div class="col-12">
                        <h4 class="text-big mb-3">Your Information</h4>
                    </div>
                    <div class="col-sm-8 col-lg-6 mx-auto mb-3 mb-md-0">
                        <div class="bg-light-blue p-4 h-100">
                            <p class="mb-2">Name - <b><?php echo $testride['name'] ?></b></p>
                            <p class="mb-2">Phone Number - <b><?php echo $testride['mobile'] ?></b></p>
                            <p class="mb-2">Email - <b><?php echo $testride['email'] ?></b></p>
                            <p class="mb-0">State - <b><?php echo $testride['state'] ?></b>, City - <b><?php echo $testride['city'] ?></b>, <br/>Pin Code - <b><?php echo $testride['pincode'] ?></b></p>
                        </div>
                    </div>
                </div>
                <h4 class="text-big text-center mt-3 mt-md-4">Please check your test ride booking details we have sent on your register email (<b class="text-primary"><?php echo $testride['email'] ?></b>)</h4>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php';?>