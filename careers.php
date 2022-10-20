<?php
include('admin/php/helper/db.php');

use DB\DB;

$db = new DB();
///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM carrer_page WHERE section_name = 'meta' AND `status` = '1'");
if (mysqli_num_rows($meta) > 0) {
	$metaData = mysqli_fetch_assoc($meta);
}

////selecting hero data
$hero = $db->db("SELECT * FROM carrer_page WHERE section_name = 'hero' AND `status` = '1'");
$heroData = false;
if (mysqli_num_rows($hero) > 0) {
	$heroData = mysqli_fetch_assoc($hero);
}

///selecting section second data
$sectionTwo = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_two' AND `status` = '1'");
$sectionTwoData = false;
if ($sectionTwo) {
	$sectionTwoData = mysqli_fetch_assoc($sectionTwo);
}

///selecting section third data
$sectionThree = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_three' AND `status` = '1'");
$sectionThreeData = false;
if ($sectionThree) {
	$sectionThreeData = mysqli_fetch_assoc($sectionThree);
}

///selecting section fourth data
$sectionFour = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_four' AND `status` = '1'");
$sectionFourData = false;
if ($sectionFour) {
	$sectionFourData = mysqli_fetch_assoc($sectionFour);
}

///selecting section Fifth data
$sectionFive = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_five' AND `status` = '1'");
$sectionFiveData = false;
if ($sectionFive) {
	$sectionFiveData = mysqli_fetch_assoc($sectionFive);
}

///selecting section Sixth data
$sectionSix = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_six' AND `status` = '1'");
$sectionSixData = false;
if ($sectionSix) {
	$sectionSixData = mysqli_fetch_assoc($sectionSix);
}
include 'includes/header.php';
?>
<!-- Hero Banner -->
<?php if ($heroData) : ?>
	<section class="hero-banner overflow-hidden" style="background-image: url(<?php echo $heroData['main_image']; ?>); background-position: center;">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center wow zoomIn">
					<div class="hero-banner-text">
						<h5 class="hero-sub-title text-white mb-2"><?php echo $heroData['title']; ?></h5>
						<h2 class="hero-title text-primary"><?php echo $heroData['main_title']; ?></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionTwoData) : ?>
	<!-- Why Choose Euler -->
	<section class="careers-why dot-bg sec-space pb-0 overflow-hidden">
		<ul class="list-none ani-sec">
			<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-white-bg-l.png"></li>
		</ul>
		<div class="container">
			<div class="row">
				<div class="col-md-8 mx-auto text-center">
					<h3 class="heading mb-3 mb-md-4 wow fadeInDown"><?php echo $sectionTwoData['main_title']; ?></h3>
					<p class="wow fadeInDown"><?php echo $sectionTwoData['main_description']; ?></p>
					<img class="mt-3 wow fadeInUp" src="<?php echo $sectionTwoData['main_image']; ?>" alt="Euler Team">
				</div>
			</div>
			<div class="qst-img d-none d-md-block" data-aos="fade-up"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/qst-sign.png"></div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionThreeData) : ?>
	<!-- We don’t let cubicles -->
	<section class="car-left-img bg-img bg-white sec-space overflow-hidden" style="background-image: url(<?php echo $sectionThreeData['main_image']; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 ml-lg-auto wow fadeInRight">
					<img src="images/divider.png">
					<h3 class="heading mt-3 mb-3 mb-md-4 text-white"><?php echo $sectionThreeData['main_title']; ?></h3>
					<p class="text-white"><?php echo $sectionThreeData['main_description']; ?></p>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionFourData) : ?>
	<!-- We believe that -->
	<section class="car-right-img bg-img bg-dark sec-space overflow-hidden" style="background-image: url(<?php echo $sectionFourData['main_image']; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 wow fadeInLeft">
					<img src="images/divider.png">
					<h4 class="heading mt-3 mb-3 mb-md-4 text-white"><?php echo $sectionFourData['main_title']; ?></h4>
					<p class="text-white"><?php echo $sectionFourData['main_description']; ?></p>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionFiveData) : ?>
	<!-- We unlearn -->
	<section class="car-left-img bg-img bg-white sec-space overflow-hidden" style="background-image: url(<?php echo $sectionFiveData['main_image']; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 ml-lg-auto wow fadeInRight">
					<img src="images/divider.png">
					<h4 class="heading mt-3 mb-3 mb-md-4 text-white"><?php echo $sectionFiveData['main_title']; ?></h4>
					<p class="text-white"><?php echo $sectionFiveData['main_description']; ?></p>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionSixData) : ?>
	<!-- Want to be a part of our team -->
	<section class="car-right-img bg-img bg-dark sec-space overflow-hidden" style="background-image: url(<?php echo $sectionSixData['main_image']; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-6 wow fadeInLeft">
					<h3 class="heading text-white mb-3 mb-md-4"><?php echo $sectionSixData['main_title']; ?></h3>
					<p class="mb-0 text-white text-big"><?php echo $sectionSixData['main_description']; ?></p>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>