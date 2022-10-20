<?php
include('admin/php/helper/db.php');

use DB\DB;

$db = new DB();

///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM about_page WHERE section_name = 'meta' AND `status` = '1'");
if (mysqli_num_rows($meta) > 0) {
	$metaData = mysqli_fetch_assoc($meta);
}

////selecting hero data
$hero = $db->db("SELECT * FROM about_page WHERE section_name = 'hero' AND `status` = '1'");
$heroData = false;
if (mysqli_num_rows($hero) > 0) {
	$heroData = mysqli_fetch_assoc($hero);
}

////selection section two
$sectionTwo = $db->db("SELECT * FROM about_page WHERE section_name = 'section_two' AND main_title IS NOT NULL AND `status` = '1'");
$sectionTwoData = false;
if ($sectionTwo) {
	$sectionTwoData = mysqli_fetch_assoc($sectionTwo);
}

///selecting section four
$sectionFour = $db->db("SELECT * FROM about_page WHERE section_name = 'section_four' AND main_title IS NOT NULL AND `status` = '1'");
$sectionFourData = false;
if ($sectionFour) {
	$sectionFourData = mysqli_fetch_assoc($sectionFour);
}

///selecting section five
$sectionFive = $db->db("SELECT * FROM about_page WHERE section_name = 'section_five' AND main_title IS NOT NULL AND `status` = '1'");
$sectionFiveData = false;
if ($sectionFive) {
	$sectionFiveData = mysqli_fetch_assoc($sectionFive);
}

///selecting section Six
$sectionSix = $db->db("SELECT * FROM about_page WHERE section_name = 'section_six' AND main_title IS NOT NULL AND `status` = '1'");
$sectionSixData = false;
if ($sectionSix) {
	$sectionSixData = mysqli_fetch_assoc($sectionSix);
}

///selecting section Seven
$sectionSeven = $db->db("SELECT * FROM about_page WHERE section_name = 'section_seven' AND main_title IS NOT NULL AND `status` = '1'");
$sectionSevenData = false;
if ($sectionSeven) {
	$sectionSevenData = mysqli_fetch_assoc($sectionSeven);
}

include 'includes/header.php';
?>
<?php if ($heroData) : ?>
	<!-- Hero Banner -->
	<section class="hero-banner overflow-hidden" style="background-image: url(<?php echo $heroData['main_image'] ?>);">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 mx-auto text-center wow zoomIn">
					<div class="hero-banner-text">
						<h5 class="hero-sub-title text-white mb-2"><?php if ($heroData) {
																		echo $heroData['title'];
																	} ?></h5>
						<h2 class="hero-title text-primary"><?php if ($heroData) {
																echo $heroData['main_title'];
															} ?></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<!-- Overview Section -->
<?php if ($sectionTwoData) : ?>
	<section class="sec-space dot-bg">
		<ul class="list-none ani-sec">
			<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-l.png"></li>
			<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-r.png"></li>
		</ul>
		<div class="container">
			<div class="row">
				<div class="col-md-10 mx-auto text-center wow zoomIn">
					<h2 class="heading mb-3 mb-md-4"><?php if ($sectionTwoData) {
															echo $sectionTwoData['main_title'];
														} ?></h2>
					<p><?php if ($sectionTwoData) {
							echo $sectionTwoData['main_description'];
						} ?></p>
				</div>
				<div class="col-12 text-center mt-3 mt-md-4">
					<div class="eco-sys">
						<?php
						$items = $db->db("SELECT * FROM about_page WHERE section_name = 'section_two' AND main_title IS NULL");
						$count = mysqli_num_rows($items);
						$i = 1;
						while ($row = mysqli_fetch_assoc($items)) {
						?>
							<div class="eco-sys-box wow zoomIn">
								<h4 class="mb-3"><?php echo $row['title'] ?></h4>
								<img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>">
							</div>
							<?php if ($i != $count) { ?>
								<div class="eco-sys-plus wow zoomIn">
									<i class="fas fa-plus text-primary"></i>
								</div>
							<?php } ?>
						<?php $i++;
						} ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<!-- Pronunciation -->
<section class="sec-space dot-bg bg-dark">
	<ul class="list-none ani-sec">
		<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-l.png"></li>
		<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-r.png"></li>
	</ul>
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto text-center wow zoomIn">
				<h2 class="heading mb-3 mb-md-4 text-white">Pronunciation</h2>
				<div id="audio-button" class="playSound mb-4">
					<audio id="player" src="audio/euler-audio.mp3"></audio>
					<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/sound-img.png" width="300px">
				</div>
				<h2 class="heading-sm text-white">OY - l er</h2>
			</div>
		</div>
	</div>
</section>
<?php if ($sectionFourData) : ?>
	<!-- The story so far -->
	<section class="sec-space dot-bg">
		<ul class="list-none ani-sec">
			<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-white-bg-l.png"></li>
			<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-white-bg-r.png"></li>
		</ul>
		<div class="container">
			<div class="row">
				<div class="col-12 text-center wow zoomIn">
					<h2 class="heading mb-3 mb-md-4 mb-lg-5"><?php if ($sectionFourData) {
																	echo $sectionFourData['main_title'];
																} ?></h2>
				</div>
				<div class="col-12 wow zoomIn">
					<div class="story-slider-top mb-0 mb-md-3">
						<?php
						$years = $db->db("SELECT * FROM about_page WHERE section_name = 'section_four' AND main_title IS NULL");
						while ($row = mysqli_fetch_assoc($years)) {
						?>
							<div class="story-item-nav">
								<h3 class="heading-sm text-primary"><img src="images/divider-short.png"><span><?php echo $row['title'] ?></span><img src="images/divider-short.png"></h3>
							</div>
						<?php } ?>
					</div>
					<div class="story-slider-bot">

						<?php
						$years = $db->db("SELECT * FROM about_page WHERE section_name = 'section_four' AND main_title IS NULL");
						while ($row = mysqli_fetch_assoc($years)) {
						?>
							<div>
								<div class="story-item-box">
									<?php
									$items = $db->db("SELECT * FROM about_page_items WHERE year_id = '{$row['id']}'");
									while ($item = mysqli_fetch_assoc($items)) {
										$sub_title = explode(' ', $item['title']);
									?>
										<div class="story-item">
											<img src="images/divider.png">
											<h4><span class="text-primary"><?php echo $sub_title[0] ?></span> <?php echo $sub_title[1] ?></h4>
											<p><?php echo $item['description'] ?></p>
											<img class="float-img" src="<?php echo $item['logo'] ?>">
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionFiveData) : ?>
	<!-- Trusted by Investors -->
	<section class="sec-space dot-bg bg-dark">
		<ul class="list-none ani-sec">
			<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-l.png"></li>
			<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-r.png"></li>
		</ul>
		<div class="container">
			<div class="row text-white justify-content-center">
				<div class="col-12 text-center wow zoomIn mb-3 mb-md-4">
					<h2 class="heading mb-3 mb-md-4 text-white"><?php if ($sectionFiveData) {
																	echo $sectionFiveData['main_title'];
																} ?></h2>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p> -->
				</div>
				<?php
				$items  = $db->db("SELECT * FROM about_page WHERE section_name='section_five' AND main_title IS NULL");
				while ($row = mysqli_fetch_assoc($items)) {
				?>
					<div class="col-sm-6 col-md-4 text-center wow zoomIn">
						<img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>">
						<p class="mt-0 mt-md-2"><?php echo $row['title'] ?></p>
					</div>
				<?php } ?>

			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ($sectionSixData) : ?>
	<!-- Our Team -->
	<section class="sec-space">
		<div class="container">
			<div class="row">
				<div class="col-md-9 mx-auto text-left text-md-center wow zoomIn mb-3 mb-md-4">
					<h2 class="heading mb-3 mb-md-4"><?php if ($sectionSixData) {
															echo $sectionSixData['main_title'];
														} ?></h2>
					<p><?php if ($sectionSixData) {
							echo $sectionSixData['main_description'];
						} ?></p>
				</div>
				<div class="col-12">
					<div class="team-img-slider">
						<?php
						$item = $db->db("SELECT * FROM about_page WHERE section_name = 'section_six' AND main_title IS NULL");
						while ($row = mysqli_fetch_assoc($item)) {
						?>
							<div><img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>"></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<!-- Philosophy Section -->
<!-- <section class="philosophy-sec sec-space">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<h2 class="heading mb-3 mb-md-4">Philosophy</h2>
				<p>At Euler, we believe that the world’s shift to Electric Vehicles is inevitable. But every good idea needs a champion to build momentum and grow into a revolution.</p>
			</div>
		</div>
	</div>
</section> -->

<!-- Commiatment -->
<!-- <section class="commit-sec sec-space">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/commint-left.jpg">
			</div>
			<div class="col-md-8">
				<h2 class="heading mb-3 mb-md-4 text-white">Commitment</h2>
				<p class="text-white mb-0">With purposeful & relentless innovation, we are committed to not just removing barriers to mass adoption of EV in India, but to present a rewarding, superior alternative to traditional mobility. Good for the planet, good for business and good for people. This is just the beginning, but the revolution has begun.</p>
			</div>
		</div>
	</div>
</section> -->
<?php if ($sectionSevenData) : ?>
	<!-- Footer Bottom -->
	<section class="btm-sec sec-space bg-dark position-relative overflow-hidden">
		<ul class="list-none ani-sec">
			<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/btm-shadow-l.png"></li>
			<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/btm-shadow-r.png"></li>
		</ul>
		<div class="container">
			<div class="row">
				<div class="col-lg-9 mx-auto text-center wow zoomIn">
					<h2 class="heading text-white mb-3 mb-md-5"><?php if ($sectionSevenData) {
																	echo $sectionSevenData['main_title'];
																} ?></h2>
					<a href="<?php if ($sectionSevenData) {
									echo $sectionSevenData['btn_link'];
								} ?>" class="btn btn-primary"><span><?php if ($sectionSevenData) {
																	echo $sectionSevenData['btn_text'];
																} ?></span></a>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>