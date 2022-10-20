<?php

include('admin/php/helper/db.php');

use DB\DB;

$db = new DB();

///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM technology_page WHERE section_name = 'meta' AND `status` = '1'");
if (mysqli_num_rows($meta) > 0) {
	$metaData = mysqli_fetch_assoc($meta);
}

////selecting hero data
$hero = $db->db("SELECT * FROM technology_page WHERE section_name = 'hero' AND `status` = '1'");
$heroData = false;
if (mysqli_num_rows($hero) > 0) {
	$heroData = mysqli_fetch_assoc($hero);
}

////selection section two
$sectionTwo = $db->db("SELECT * FROM technology_page WHERE section_name = 'section_two' AND `status` = '1'");
$sectionTwoData = false;
if ($sectionTwo) {
	$sectionTwoData = mysqli_fetch_assoc($sectionTwo);
}

////selection section three
$sectionThree = $db->db("SELECT * FROM technology_page WHERE section_name = 'section_three' AND `status` = '1'");
$sectionThreeData = false;
if ($sectionThree) {
	$sectionThreeData = mysqli_fetch_assoc($sectionThree);
}

////selection section four
$sectionFour = $db->db("SELECT * FROM technology_page WHERE section_name = 'section_four' AND `status` = '1'");
$sectionFourData = false;
if ($sectionFour) {
	$sectionFourData = mysqli_fetch_assoc($sectionFour);
}
include 'includes/header.php';

?>
<?php if ($heroData) : ?>
	<!-- Hero Banner -->
	<section class="hero-banner overflow-hidden" style="background-image: url(<?php echo $heroData['main_image'] ?>); background-position:center;">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center wow zoomIn">
					<div class="hero-banner-text mt-lg-5 mb-3">
						<h5 class="hero-title text-white mb-2"><?php echo $heroData['main_title']; ?></h5>
						<h2 class="hero-sub-title text-primary"><?php echo $heroData['title'];  ?></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionTwoData) : ?>
	<!-- Vehicle Management -->
	<section class="sec-space dot-bg">
		<ul class="list-none ani-sec">
			<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-white-bg-l.png"></li>
			<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-white-bg-r.png"></li>
		</ul>
		<div class="container">
			<div class="row flex-column-reverse flex-lg-row">
				<div class="col-lg-6 mt-4 mt-lg-0 text-center text-md-left wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
					<h2 class="heading mb-3"><?php echo $sectionTwoData['main_title'];  ?></h2>
					<?php
					$query = $db->db("SELECT * FROM technology_page WHERE main_title IS NULL AND section_name='section_two'");
					while ($row = mysqli_fetch_assoc($query)) {
					?>
						<div class="icon-box align-items-center">
							<img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>">
							<p class="mt-0 text-big"><b><?php echo $row['title'] ?></b></p>
						</div>
					<?php } ?>
				</div>
				<div class="col-lg-6 text-center text-md-left text-lg-right wow fadeInRight">
					<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Tech_01-vehicle.png" alt="">
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionThreeData) : ?>
	<!-- Electron Card -->
	<section class="sec-space dot-bg bg-light">
		<ul class="list-none ani-sec">
			<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-white-bg-l.png"></li>
			<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-white-bg-r.png"></li>
		</ul>
		<div class="container">
			<div class="row align-items-center align-items-center">
				<div class="col-lg-5 text-center text-md-left wow fadeInLeft">
					<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Electron-Card.png" alt="">
				</div>
				<div class="col-lg-6 mt-4 mt-lg-0 text-center text-md-left wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
					<h2 class="heading mb-3"><?php echo $sectionThreeData['main_title']; ?></h2>
					<p class=""><b><?php echo $sectionThreeData['main_description']; ?></b></p>
					<?php
					$query = $db->db("SELECT * FROM technology_page WHERE section_name = 'section_three' AND main_title IS NULL");
					while ($row = mysqli_fetch_assoc($query)) {
					?>
						<div class="icon-box align-items-center">
							<img src="<?php echo $row['logo'] ?>" alt="">
							<p class="mt-0 text-big"><b><?php echo $row['title'] ?></b></p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionFourData) : ?>
	<!-- Battery Tech -->
	<section class="hero-banner fleet-owner overflow-hidden" style="background-image: url(https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/battery-tem.jpg); background-position:center;">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center wow zoomIn">
					<div>
						<h2 class="hero-title text-white"><?php echo $sectionFourData['main_title']; ?></h2>
						<p class="text-white"><?php echo $sectionFourData['main_description']; ?></p>
					</div>
				</div>
				<div class="col-12 mt-3 mt-md-4">
					<div class="tech-slider">
						<?php
						$query = $db->db("SELECT * FROM technology_page WHERE section_name='section_four' AND main_title IS NULL");
						while ($row = mysqli_fetch_assoc($query)) {
						?>
							<?php if ($row['is_video']) { ?>
								<div class="tech-slider-inner overflow-hidden">
									<div class="row justify-content-center align-items-center text-center text-lg-left">
										<div class="col-md-6">
											<h1 class=" mb-4 text-white"><?php echo $row['title']; ?></h1>
											<p class="text-white"><?php echo $row['description']; ?></p>
										</div>
										<div class="col-md-6">
											<video width="90%" controls>
												<source src="<?php echo $row['logo']; ?>" type="Tech_05.mp4">
												<source src="<?php echo $row['logo']; ?>" type="video/ogg">
											</video>
										</div>
									</div>
								</div>
							<?php } else { ?>
								<div class="tech-slider-inner overflow-hidden">
									<div class="row justify-content-center align-items-center text-center text-lg-left">
										<div class="col-md-6">
											<h1 class=" mb-4 text-white"><?php echo $row['title']; ?></h1>
											<p class="text-white"><?php echo $row['description']; ?></p>
										</div>
										<div class="col-md-6">
											<img src="<?php echo $row['logo']; ?>" alt="">
										</div>
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>