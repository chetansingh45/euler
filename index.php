<?php
include('php/helper/db/db.php');

use DB\DB;

$db = new DB();
///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM home_page WHERE section_name = 'meta' AND `status` = '1'");
if (mysqli_num_rows($meta) > 0) {
	$metaData = mysqli_fetch_assoc($meta);
} else {
	$metaData['main_title'] = "India’s most powerful electric commercial vehicle";
	$metaData['main_description'] = "Building Electric Commercial Vehicles for India. Euler HiLoad - The next big chapter in 3W electric mobility has been launched. Book Now- Only for Rs.999";
}
$cover = $db->db("SELECT * FROM home_page WHERE section_name = 'cover' AND `status` = '1'");
$cover = mysqli_fetch_assoc($cover);
$findOutMore = $db->db("SELECT * FROM home_page WHERE section_name = 'find_out_more' AND `status` = '1'");
$findOutMore = mysqli_fetch_assoc($findOutMore);
$slider = $db->db("SELECT * FROM home_page WHERE section_name='slider' AND main_title IS NOT NULL");
$sliderData = mysqli_fetch_assoc($slider);
$assetsTitle = $db->db("SELECT * FROM home_page WHERE section_name='assets' AND main_title  IS NOT NULL");
$assetsTitle = mysqli_fetch_assoc($assetsTitle);
$assets = $db->db("SELECT * FROM home_page WHERE section_name='assets' AND main_title IS NULL AND `status` = '1'");
$news = $db->db("SELECT * FROM home_page WHERE section_name='news' AND main_title IS NULL AND `status` = '1'");
$newsTitle = $db->db("SELECT * FROM home_page WHERE section_name='news' AND main_title  IS NOT NULL");
$newsTitle = mysqli_fetch_assoc($newsTitle);
$accoladeTitle = $db->db("SELECT * FROM home_page WHERE section_name='accolades' AND main_title  IS NOT NULL");
$accoladeTitle = mysqli_fetch_assoc($accoladeTitle);
$accolades = $db->db("SELECT * FROM home_page WHERE section_name='accolades' AND main_title IS NULL AND `status` = '1'");
$network = $db->db("SELECT * FROM home_page WHERE section_name='network' AND `status` = '1'");
if ($network) {
	$networkData = mysqli_fetch_assoc($network);
}
include 'includes/header.php';

?>
<?php
if ($cover) {
	$main_title = explode(",", $cover['main_title']);
	$main_desc = $cover['main_description'];
?>
	<!-- Hero Banner -->
	<section class="home-hero">
		<div class="prd-thumb">
			<img data-aos="fade-left" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/spotligt-prd-thumb.png">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="home-hero-text">
						<h2 class="home-hero-heading text-white"><span class="d-inline-flex align-items-center" data-aos="fade-left"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/logo-sign.png" class="logo-sign" alt="Euler Logo Sign"> <?php echo $main_title[0] ?>,</span> <span class="d-inline-block" data-aos="fade-right"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/spotlight-line-right.png"></span><br /><span class="d-inline-block" data-aos="fade-left"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/spotlight-line-left.png"></span> <span class="d-inline-block" data-aos="fade-right"><?php echo $main_title[1] ?></span></h2>
						<p class="text-primary text-big my-3 my-md-5"><i>We are an automotive tech startup manufacturing light electric commercial vehicles for intra-city transportation</i></p>
						<div class="kilometers wow zoomIn">
							<h2><span class="count2">0</span>+ kms</h2>
							<h4 class="text-primary">Covered Successfully</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
<!-- Coming Soon -->
<section style="display: none;" class="coming-soon pb-5 pb-sm-0 dot-bg bg-dark">
	<ul class="list-none ani-sec">
		<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-l.png"></li>
		<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-r.png"></li>
	</ul>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-sm-7 text-center">
				<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/coming-soon-img.jpg" data-aos="zoom-in">
			</div>
			<div class="col-sm-5 wow fadeInRight">
				<div class="coming-soon-right">
					<p class="text-big mb-1 text-white">Coming Soon</p>
					<h3 class="heading mb-3 mb-md-4 text-white">Euler HiLoad</h3>
					<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><span>Get Updates</span></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php if ($findOutMore) : ?>
	<!-- Electrifying India. One EV at a time -->
	<section class="section-three">
		<div class="container position-relative">
			<div class="row">
				<div class="col-md-7 sec-space">
					<div class="who-we-are">
						<h3 class="heading mb-3 mb-md-4" data-aos="fade-right"><?php echo $findOutMore['main_title'] ?></h3>
						<div class="desc" data-aos="fade-right">
							<?php echo $findOutMore['main_description'] ?>
						</div>
						<a href="<?php echo $findOutMore['btn_link'] ?>" class="btn btn-dark" data-aos="fade-right"><span>Find out more</span></a>
					</div>
				</div>
			</div>
			<div class="ev" data-aos="fade-right">
				<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Euler-veh-big.png">
			</div>
		</div>
	</section>
<?php endif ?>
<?php if ($networkData) : ?>
	<!-- Widespread Charging Network -->
	<section class="section-four sec-space dot-bg bg-dark">
		<ul class="list-none ani-sec">
			<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-l.png"></li>
			<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-r.png"></li>
		</ul>
		<div class="container">
			<div class="row align-items-center flex-column-reverse flex-md-row">
				<div class="col-md-6">
					<div class="map-holder">
						<!--<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/map-bg.png" data-aos="zoom-in">-->
						<img src="<?php echo $networkData['main_image'] ?>" data-aos="zoom-in">
						<!-- <div id="map_canvas"></div> -->
						<!--<div id="maps"></div>-->
					</div>
				</div>
				<div class="col-md-6 mb-3 mb-md-0">
					<div class="map-details wow fadeInRight">
						<h3 class="heading text-white mb-3 mb-md-4"><?php echo $network ? $networkData['main_title'] : "Widespread Charging Network"; ?></h3>
						<div class="desc text-white"><?php echo $network ? $networkData['main_description'] : "Widespread Charging Network"; ?></div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php
$query = $db->db("SELECT * FROM home_page WHERE section_name='slider' AND main_title IS  NULL AND `status` = '1'");
if (mysqli_num_rows($query) > 0) : ?>
	<div class="section-five">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="heading text-center wow zoomIn"><?php echo $sliderData['main_title'] ?></h2>
				</div>
				<div class="why-ev-holder wow zoomIn">
					<div class="charge-slider">
						<?php

						while ($slide = mysqli_fetch_assoc($query)) {
						?>
							<div class="slide-item">
								<div class="details">
									<div class="icon">
										<img src="<?php echo $slide['logo'] ?>">
									</div>
									<div class="heading"><?php echo $slide['title'] ?></div>
									<div class="desc">
										<?php echo $slide['description'] ?>
									</div>
								</div>
								<div class="thumb">
									<img src="<?php echo $slide['main_image'] ?>">
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="charge-nav sync mx-auto">
						<?php
						$query = $db->db("SELECT * FROM home_page WHERE section_name='slider' AND main_title IS  NULL AND `status` = '1'");
						while ($slide = mysqli_fetch_assoc($query)) {
						?>
							<div>
								<h3><?php echo $slide['footer_title'] ?></h3>
							</div>
						<?php } ?>
					</div>

				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if (mysqli_num_rows($assets) > 0) : ?>
	<div class="section-six overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="heading text-center text-white wow zoomIn"><?php echo $assetsTitle['main_title'] ?></h2>
				</div>
				<div class="clients wow fadeInUp">
					<ul>
						<?php while ($row = mysqli_fetch_assoc($assets)) : ?>
							<li>
								<img src="<?php echo $row['logo'] ?>">
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if (mysqli_num_rows($news) > 0) : ?>
	<div class="section-seven sec-space">
		<div class="container">
			<div class="row">
				<div class="col-12 mb-3 mb-md-5">
					<h2 class="heading text-center wow zoomIn"><?php echo $newsTitle ? $newsTitle['main_title'] : ''; ?></h2>
				</div>
				<div class="col-12">
					<div class="head_slider">
						<?php
						while ($row = mysqli_fetch_assoc($news)) {
						?>
							<div class="head_items" data-match-height="groupName">
								<div class="thumb">
									<img src="<?php echo $row['main_image'] ?>">
									<div class="title"><?php echo $row['title']; ?></div>
								</div>
								<div class="desc">
									<div class="cont"><?php echo $row['description'] ?></div>
									<div class="cta"><a href="<?php echo $row['btn_link'] ?>" target="blank" class="btn btn-primary"><span><?php echo $row['btn_text'] ?></span></a>
									</div>
								</div>
							</div>
						<?php } ?>
						<!-- <div class="head_items" data-match-height="groupName">
						<div class="thumb">
							<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/news-thumb2.jpg">
							<div class="title">CNBC Young Turks</div>
						</div>
						<div class="desc">
							<div class="cont">A discussion on India’s EV push, the focus on opportunities and challenges for the EV space in India and Euler Motor’s plans for 2021</div>
							<div class="cta"><a href="https://www.youtube.com/watch?v=xPxOMJhlxGk" target="blank" class="btn btn-primary"><span>See Now</span></a>
							</div>
						</div>
					</div> -->
						<!-- <div class="head_items" data-match-height="groupName">
						<div class="thumb">
							<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/news-thumb3.jpg">
							<div class="title">ET Now</div>
						</div>
						<div class="desc">
							<div class="cont">Euler Motors current investors have chosen to continue to invest in Euler Motors because they believe in their vision and execution.</div>
							<div class="cta"><a href="//timesnownews.com/videos/et-now/shows/how-did-euler-motors-raise-30cr-of-additional-financing-startupcentral/91206" target="blank" class="btn btn-primary"><span>Read More</span></a>
							</div>
						</div>
					</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if (mysqli_num_rows($accolades) > 0) : ?>
	<div class="section-eight">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="heading text-center text-white wow zoomIn"><?php echo $accoladeTitle ? $accoladeTitle['main_title'] : '' ?></h2>
				</div>
				<div class="col-12">
					<div class="awards-slider">
						<div class="slider stick-dots">
							<?php
							while ($row = mysqli_fetch_assoc($accolades)) {
							?>
								<div class="slide">
									<div class="slide__img">
										<img src="<?php echo $row['main_image'] ?>" heigh="300" width="500" alt="" data-lazy="<?php echo $row['main_image'] ?>" class="full-image" />
									</div>
									<div class="slide__content slide__content__right animated" data-animation-in="fadeInLeft" data-delay-in="0.2">
										<div class="slide__content--headings">
											<h3><?php echo $row['title'] ?></h3>
											<div class="desc"><?php echo $row['description'] ?></div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>