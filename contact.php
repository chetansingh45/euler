<?php 
    $page_title = 'Contact Us';
	$page_description = 'Default Description';
	include('admin/php/helper/db.php');
	use DB\DB;
	$db = new DB();

	///selecting meta data
	$metaData = false;
	$meta = $db->db("SELECT * FROM contact_page WHERE section_name = 'meta'");
	if(mysqli_num_rows($meta) > 0){
		$metaData = mysqli_fetch_assoc($meta);
	}

	////selecting hero data
	$hero = $db->db("SELECT * FROM contact_page WHERE section_name = 'hero'");
	$heroData = false;
	if(mysqli_num_rows($hero) > 0){
		$heroData = mysqli_fetch_assoc($hero);
	}

	////selection section two
	$sectionTwo = $db->db("SELECT * FROM contact_page WHERE section_name = 'section_two'");
	$sectionTwoData = false;
	if($sectionTwo){
		$sectionTwoData = mysqli_fetch_assoc($sectionTwo);
	}

	////selection section three
	$sectionThree = $db->db("SELECT * FROM contact_page WHERE section_name = 'section_three'");
	$sectionThreeData = false;
	if($sectionThree){
		$sectionThreeData = mysqli_fetch_assoc($sectionThree);
	}

	////selection section four
	$sectionFour = $db->db("SELECT * FROM contact_page WHERE section_name = 'section_four'");
	$sectionFourData = false;
	if($sectionFour){
		$sectionFourData = mysqli_fetch_assoc($sectionFour);
	}
    include 'includes/header.php'; 
?>
<!-- Hero Banner -->
<?php if($heroData['status']){ ?>
<section class="hero-banner overflow-hidden" style="background-image: url(<?php echo $heroData['main_image']?>); background-position:center;">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center wow zoomIn">
				<div class="hero-banner-text">
					<h2 class="hero-title text-primary"><?php if($heroData){ echo $heroData['main_title']; }?></h2>
				</div>
			</div>
		</div>
	</div>
</section>
<?php }?>

<!-- Address -->
<?php if($sectionTwoData['status']){ ?>
<section class="address-sec sec-space overflow-hidden">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-5 mb-4 mb-md-0 wow fadeInLeft">
				<h3 class="heading-sm mb-3"><?php if($sectionTwoData){ echo $sectionTwoData['main_title']; }?></h3>
				<p><?php if($sectionTwoData){ echo $sectionTwoData['main_description']; }?></p>
				<!-- <a href="#" class="btn btn-primary"><span>Get Directions</span></a> -->
			</div>
			<div class="col-lg-2 d-none d-lg-block"></div>
			<div class="col-md-6 col-lg-5 wow fadeInRight">
				<h3 class="heading-sm mb-3"><?php if($sectionTwoData){ echo $sectionTwoData['title']; }?></h3>
				<p><?php if($sectionTwoData){ echo $sectionTwoData['description']; }?></p>
				<!-- <a href="#" class="btn btn-primary"><span>Get Directions</span></a> -->
			</div>
		</div>
	</div>
</section>
<?php }?>

<?php if($sectionThreeData['status']){ ?>
<!-- Form Section -->
<section class="form-sec sec-space py-md-0 bg-dark">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 col-lg-5 mb-4 mb-md-0 wow zoomIn">
				<p class="text-white text-big"><?php if($sectionThreeData){ echo $sectionThreeData['main_title']; }?></p> ?></p>
			</div>
			<div class="col-lg-1 d-none d-lg-block"></div>
			<div class="col-md-6">
                <form id="kontaktForm" class="main-form wow zoomIn" name="contactus">
					<div class="row">
						<div class="col-12 mb-3">
							<input type="text" class="form-control" name="name" required placeholder="Name">
						</div>
						<div class="col-12 mb-3">
						    <input type="tel" name="mobile" pattern="(6|7|8|9)\d{9}" title="Invalid phone number (avoid country code)" class="form-control" placeholder="Mobile" minlength="10" maxlength="10" required>
						</div>
						<div class="col-12 mb-3">
							<input type="email" class="form-control" name="email" required placeholder="Email">
						</div>
						<div class="col-12 mb-3">
							<label for="Select-enquiry">Select Enquiry</label>
							<div class="row">
								<div class="col-md-4">
									<div class="form-check mr-3">
										<input class="form-check-input" type="radio" required name="enquiry_type" id="enquiry1" value="service" checked>
										<label class="form-check-label" for="enquiry1">Service</label>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-check">
										<input class="form-check-input" type="radio" required name="enquiry_type" id="enquiry2" value="corporate">
										<label class="form-check-label" for="enquiry2">Corporate & Fleet sales</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 mb-3">
							<textarea name="message" class="form-control" id="msg" required rows="4" placeholder="Message..."></textarea>
						</div>
						<div class="col-12">
							<button type="submit" name="submit" class="btn btn-primary"><span>Submit</span></button>
							<p class="d-block mt-2 p-3" data-message="contactus"></p>
						</div>
					</div>
				</form>
                <h1 id="successKontakt" style="text-align: center; display: none;" class="form-popup main-form">Thank You</h1>
			</div>
		</div>
	</div>
</section>
<?php }?>

<?php if($sectionFourData['status']){ ?>
<!-- Contact Card Section -->
<section class="contact-bot sec-space ">
	<div class="container">
		<div class="row">
			<!-- <div class="col-sm-6 mb-4 wow zoomIn">
				<div class="contact-bot-card text-center">
					<h3 class="text-big mb-3">Press & Media</h3>
					<p class="mb-2">For media enquiries, please write to us at</p>
					<a href="mailto:pallavi.arora@eulermotors.com">pallavi.arora@eulermotors.com</a>
				</div>
			</div> -->
			<div class="col-sm-6 mb-4 wow zoomIn">
				<div class="contact-bot-card text-center">
					<h3 class="text-big mb-3"><?php if($sectionFourData){ echo $sectionFourData['main_title']; } ?></h3>
					<p class="mb-2"><?php if($sectionFourData){ echo $sectionFourData['main_description']; } ?></p>
					<!-- <a href="mailto:emscm@eulermotors.com">emscm@eulermotors.com</a> -->
				</div>
			</div>
			<!-- <div class="col-sm-6 mb-4 wow zoomIn">
				<div class="contact-bot-card text-center">
					<h3 class="text-big mb-3">Euler authorised marketing person</h3>
					<p class="mb-2">If you are interested in being a sales associate, please contact us directly at</p>
					<a href="mailto:marketing@eulermotors.com">marketing@eulermotors.com</a>
				</div>
			</div> -->
			<div class="col-sm-6 mb-0 mb-sm-4 wow zoomIn">
				<div class="contact-bot-card text-center">
					<h3 class="text-big mb-3"><?php if($sectionFourData){ echo $sectionFourData['title']; } ?></h3>
					<p class="mb-2"><?php if($sectionFourData){ echo $sectionFourData['description']; } ?></p>
					<!-- <a href="mailto:hr@eulermotors.com">hr@eulermotors.com</a> -->
				</div>
			</div>
		</div>
	</div>
</section>
<?php }?>
	
<?php include 'includes/footer.php'; ?>
<script>
	const submitContactUs = event => {
		event.preventDefault();
		let dataMessage = document.querySelector('p[data-message="contactus"]');
		dataMessage.innerHTML = '';
		dataMessage.classList.remove('bg-light-blue');
        dataMessage.classList.remove('bg-danger');
        
		event.target.submit.innerHTML = `<div class="spinner-grow text-dark" role="status"><span class="visually-hidden">Loading...</span></div>`;
		const fd = new FormData(event.target);
		commonAjax({
			page: '/php/module/other/contactus.php',
			params: fd
		})
		.then(response => {
			console.log(response);
			event.target.submit.innerHTML = "<span>Submit</span>";
			snackbar({success: response.success, message: response.message});
			
			if(response.success)
			{
				dataMessage.innerHTML = "Thankyou for contacting us!";
				dataMessage.classList.add('bg-light-blue');
		        dataMessage.classList.remove('bg-danger');
				
				event.target.reset();
				return;
			}
			dataMessage.innerHTML = response.message;
			dataMessage.classList.remove('bg-light-blue');
	        dataMessage.classList.add('bg-danger');
		})
		.catch(err => {console.log(err); event.target.submit.innerHTML = "<span>Submit</span>";})
	}
	document.forms.contactus.addEventListener("submit", submitContactUs);
</script>
