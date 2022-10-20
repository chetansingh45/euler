<?php
include('admin/php/helper/db.php');

use DB\DB;

$db = new DB();

///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM mobility_page WHERE section_name = 'meta' AND `status` = '1'");
if (mysqli_num_rows($meta) > 0) {
	$metaData = mysqli_fetch_assoc($meta);
}

////selecting hero data
$hero = $db->db("SELECT * FROM mobility_page WHERE section_name = 'hero' AND `status` = '1'");
$heroData = false;
if (mysqli_num_rows($hero) > 0) {
	$heroData = mysqli_fetch_assoc($hero);
}

////selection section two
$sectionTwo = $db->db("SELECT * FROM mobility_page WHERE section_name = 'section_two' AND main_title IS NOT NULL AND `status` = '1'");
$sectionTwoData = false;
if ($sectionTwo) {
	$sectionTwoData = mysqli_fetch_assoc($sectionTwo);
}

////selecting section three
$sectionThree = $db->db("SELECT * FROM mobility_page WHERE section_name = 'section_three' AND main_title IS NOT NULL AND `status` = '1'");
$sectionThreeData = false;
if ($sectionThree) {
	$sectionThreeData = mysqli_fetch_assoc($sectionThree);
}

////selecting section Four
$sectionFour = $db->db("SELECT * FROM mobility_page WHERE section_name = 'section_four' AND main_title IS NOT NULL AND `status` = '1'");
$sectionFourData = false;
if ($sectionFour) {
	$sectionFourData = mysqli_fetch_assoc($sectionFour);
}

////selecting section Five
$sectionFive = $db->db("SELECT * FROM mobility_page WHERE section_name = 'section_five' AND main_title IS NOT NULL AND `status` = '1'");
$sectionFiveData = false;
if ($sectionFive) {
	$sectionFiveData = mysqli_fetch_assoc($sectionFive);
}
include 'includes/header.php';
?>

<?php if ($heroData) : ?>
	<!-- Hero Banner -->
	<section class="hero-banner overflow-hidden" style="background-image: url(<?php echo $heroData['main_image'] ?>);">
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
	<!-- Overview Section -->
	<section class="sec-space overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center mb-3 mb-md-5">
					<h3 class="heading wow zoomIn"><?php echo $sectionTwoData['main_title']; ?></h3>
				</div>
				<div class="row">
					<div class="col-md-10 mx-auto">
						<div class="row">
							<div class="col-md-6 mb-4 mb-md-0 text-center text-md-left wow fadeInLeft">
								<p class="mb-3 mb-md-4"><b><?php echo $sectionTwoData['title']; ?></b></p>
								<?php
								$query = $db->db("SELECT * FROM mobility_page WHERE main_title IS NULL AND section_name='section_two' AND side='left'");
								while ($row = mysqli_fetch_assoc($query)) {
								?>
									<div class="icon-box">
										<img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>">
										<p><?php echo $row['title']; ?></p>
									</div>
								<?php } ?>
							</div>
							<div class="col-md-6 text-center text-md-left wow fadeInRight">
								<p class="mb-3 mb-md-4"><b><?php echo $sectionTwoData['right_title']; ?></b></p>
								<?php
								$query = $db->db("SELECT * FROM mobility_page WHERE main_title IS NULL AND section_name='section_two' AND side='right'");
								while ($row = mysqli_fetch_assoc($query)) {
								?>
									<div class="icon-box">
										<img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>">
										<p><?php echo $row['title']; ?></p>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionThreeData) : ?>
	<!-- Industries We Serve -->
	<section class="sec-space dot-bg bg-dark overflow-hidden">
		<ul class="list-none ani-sec">
			<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-l.png"></li>
			<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-r.png"></li>
		</ul>
		<div class="container">
			<div class="row">
				<div class="col-md-10 mx-auto text-center mb-3 mb-md-5 wow zoomIn">
					<h3 class="heading text-white mb-3"><?php echo $sectionThreeData['main_title']; ?></h3>
				</div>
				<?php
				$query = $db->db("SELECT * FROM mobility_page WHERE section_name='section_three' AND main_title IS NULL");
				while ($row = mysqli_fetch_assoc($query)) {
				?>
					<div class="col-md-3 text-center wow fadeInUp">
						<img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>">
						<p class="text-white mt-0 mt-md-0"><?php echo $row['title'] ?></p>
					</div>
				<?php } ?>

			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionFourData) : ?>
	<!-- Testimonials -->
	<section class="testimonial-sec dot-bg sec-space overflow-hidden">
		<ul class="list-none ani-sec">
			<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-l.png"></li>
			<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dot-black-bg-r.png"></li>
		</ul>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 text-center mb-3 mb-md-5 wow zoomIn">
					<h3 class="heading mb-3"><?php echo $sectionFourData['main_title']; ?></h3>
				</div>
				<div class="col-12 wow zoomIn">
					<div class="testimonials-sec">
						<?php
						$query = $db->db("SELECT * FROM mobility_page WHERE main_title IS NULL AND section_name ='section_four'");
						while ($row = mysqli_fetch_assoc($query)) {
						?>
							<div class="test-item">
								<div class="test-icon"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/testi_icon.png"></div>
								<div class="test-item-text">
									<p><?php echo $row['description'] ?></p>
								</div>
								<div class="test-brand"><img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>"></div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionFiveData) : ?>
	<!-- Footer Bottom -->
	<section class="btm-sec sec-space bg-dark position-relative overflow-hidden">
		<ul class="list-none ani-sec">
			<li class="wow fadeInLeft"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/btm-shadow-l.png"></li>
			<li class="wow fadeInRight"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/btm-shadow-r.png"></li>
		</ul>
		<div class="container">
			<div class="row">
				<div class="col-lg-11 mx-auto text-center wow zoomIn">
					<h2 class="heading text-white mb-3 mb-md-5"><?php echo $sectionFiveData['main_title']; ?></h2>
					<a href="<?php echo $sectionFiveData['btn_link']; ?>" class="btn btn-primary"><span><?php echo $sectionFiveData['btn_text']; ?></span></a>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>