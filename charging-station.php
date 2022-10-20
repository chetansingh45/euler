<?php
include('admin/php/helper/db.php');

use DB\DB;

$db = new DB();
///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM charging_station_page WHERE section_name = 'meta' AND `status` = '1'");
if (mysqli_num_rows($meta) > 0) {
	$metaData = mysqli_fetch_assoc($meta);
}
///selecting Hero
$heroData = false;
$hero = $db->db("SELECT * FROM charging_station_page WHERE section_name = 'hero' AND `status` = '1'");
if (mysqli_num_rows($hero) > 0) {
	$heroData = mysqli_fetch_assoc($hero);
}
///selecting section Three
$sectionThreeData = false;
$sectionThree = $db->db("SELECT * FROM charging_station_page WHERE section_name = 'section_three' AND main_title IS NOT NULL AND `status` = '1'");
if (mysqli_num_rows($sectionThree) > 0) {
	$sectionThreeData = mysqli_fetch_assoc($sectionThree);
}
$sectionThreeLines = $db->db("SELECT * FROM charging_station_page WHERE section_name = 'section_three' AND main_title IS NULL");
///selecting section four
$sectionFourData = false;
$sectionFour = $db->db("SELECT * FROM charging_station_page WHERE section_name = 'section_four' AND main_title IS NOT NULL AND `status` = '1'");
if (mysqli_num_rows($sectionFour) > 0) {
	$sectionFourData = mysqli_fetch_assoc($sectionFour);
}
$sectionFourLines = $db->db("SELECT * FROM charging_station_page WHERE section_name = 'section_four' AND main_title IS NULL");
///selecting section five
$sectionFiveData = false;
$sectionFive = $db->db("SELECT * FROM charging_station_page WHERE section_name = 'section_five' AND main_title IS NOT NULL AND `status` = '1'");
if (mysqli_num_rows($sectionFive) > 0) {
	$sectionFiveData = mysqli_fetch_assoc($sectionFive);
}
$sectionFiveLines = $db->db("SELECT * FROM charging_station_page WHERE section_name = 'section_five' AND main_title IS NULL");

include 'includes/header.php';
?>
<?php if ($heroData) : ?>
	<section class="hero-banner charging_banner_video overflow-hidden" style="background-image: url(<?php echo $heroData['main_image'] ?>); background-position:center;">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center wow zoomIn">
					<div class="hero-banner-text mt-lg-5 mb-3">
						<h5 class="hero-sub-title text-white mb-2"><?php echo $heroData['title']; ?></h5>
						<h2 class="hero-title text-primary"><?php echo $heroData['main_title']; ?></h2>
					</div>
					<!-- Trigger the modal with a button -->
					<a href="javascript:;" class="play_btn" data-toggle="modal" data-target="#chargingVideo"><i class="fas fa-play"></i></a>

					<!-- Modal -->
					<div class="modal fade" id="chargingVideo" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<div class="modal-body">
									<div class="charging_video">
										<iframe width="100%" height="100%" src="<?php echo $heroData['iframe']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- Charging Network Map -->
<section class="network-map sec-space overflow-hidden">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 wow fadeInLeft">
				<div class="net-sel bg-light-blue">
					<div class="chargingLicon mb-3">
						<h3 class="text-md"><b>Charging Station Locator</b></h3>
						<i class="fas fa-sync-alt chargingLicon1"></i>
					</div>
					<div class="select-charging mb-3">
						<div class="states selecty-dd">
							<select class="select-option form-control" name="slct1" id="slct1">
								<option value="" selected="">Select State</option>
								<option value="Andaman and Nicobar Islands" class="states1">Andaman and Nicobar Islands</option>
								<option value="Delhi" class="states1">Delhi</option>
							</select>
						</div>
					</div>
					<div class="select-charging mb-3">
						<div class="states">
							<select class="select-option form-control" name="slct2" id="slct2">
								<option value="" selected="">Select City</option>
							</select>
						</div>
					</div>
					<div class="network-map-scrollbar mb-3">
						<p class="text-md"><b>Result For Charging Stations:</b></p>
					</div>
					<div class="network-map-content">
						<div class="network-map-content-wrap">
							<div class="addrss">
								<h4>GO AUTO/ Treo Tata (3S) - Safdargunj</h4>
								<p>A-2/14, Safdarjung Enclave, , Delhi, Delhi - 110029</p>
								<a href="#" class="hidden-xs">View On Map</a> <span class="hidden-xs">|</span>
								<a href="#">Get Direction</a>
							</div>
							<div class="addrss">
								<h4>GO AUTO/ Treo Tata (3S) - Safdargunj</h4>
								<p>A-2/14, Safdarjung Enclave, , Delhi, Delhi - 110029</p>
								<a href="#" class="hidden-xs">View On Map</a> <span class="hidden-xs">|</span>
								<a href="#">Get Direction</a>
							</div>
							<div class="addrss">
								<h4>GO AUTO/ Treo Tata (3S) - Safdargunj</h4>
								<p>A-2/14, Safdarjung Enclave, , Delhi, Delhi - 110029</p>
								<a href="#" class="hidden-xs">View On Map</a> <span class="hidden-xs">|</span>
								<a href="#">Get Direction</a>
							</div>
							<div class="addrss">
								<h4>GO AUTO/ Treo Tata (3S) - Safdargunj</h4>
								<p>A-2/14, Safdarjung Enclave, , Delhi, Delhi - 110029</p>
								<a href="#" class="hidden-xs">View On Map</a> <span class="hidden-xs">|</span>
								<a href="#">Get Direction</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8 d-none d-lg-flex wow fadeInRight">
				<div class="network-map-r">
					<img src="./images/maps.png" alt="maps" />
				</div>
			</div>
		</div>
	</div>
</section>
<?php if ($sectionThreeData) : ?>
	<!-- Flash -->
	<section class="sec-space bg-light overflow-hidden">
		<div class="container">
			<div class="row flex-column-reverse flex-lg-row align-items-center">
				<div class="col-lg-6 mt-4 mt-lg-0 text-center text-md-left wow fadeInLeft">
					<h2 class="heading mb-3"><?php echo $sectionThreeData['main_title']; ?></h2>
					<p><?php echo $sectionThreeData['main_description']; ?></p>
					<?php
					while ($row = mysqli_fetch_array($sectionThreeLines)) {
					?>
						<div class="icon-box align-items-center">
							<img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>">
							<p class="mt-0 text-big"><b><?php echo $row['title'] ?></b></p>
						</div>
					<?php } ?>
				</div>
				<div class="col-lg-6 text-center text-md-left text-lg-right wow fadeInRight">
					<img src="<?php echo $sectionThreeData['main_image']; ?>" alt="<?php echo $sectionThreeData['main_image_alt']; ?>">
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ($sectionFourData) : ?>
	<!-- Onboard-sec -->
	<section class="sec-space overflow-hidden">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 text-center text-md-left wow fadeInLeft">
					<img src="<?php echo $sectionFourData['main_image']; ?>" alt="<?php echo $sectionFourData['main_image_alt']; ?>">
				</div>
				<div class="col-lg-6 mt-4 mt-lg-0 text-center text-md-left wow fadeInRight">
					<h2 class="heading mb-3"><?php echo $sectionFourData['main_title']; ?></h2>
					<p><?php echo $sectionFourData['main_description']; ?></p>
					<?php
					while ($row = mysqli_fetch_assoc($sectionFourLines)) {
					?>
						<div class="icon-box align-items-center">
							<img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>">
							<p class="mt-0 text-big"><b><?php echo $row['title']; ?></b></p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- Flash-7 -->
<section class="price-bg bg-light sec-space overflow-hidden d-none">
	<div class="container">
		<div class="row flex-column-reverse flex-lg-row">
			<div class="col-md-6 wow zoomIn">
				<h4 class="heading my-3 text-md-left text-center"><b>Flash 7</b></h4>
				<div class="icon-box align-items-center">
					<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/time.png" alt="">
					<p class="mt-0 text-big">Go from 0 to 80% in 1 hr 40 mins</p>
				</div>
				<div class="icon-box align-items-center">
					<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/charging.png" alt="">
					<p class="mt-0 text-big mb-3 mb-md-3">Full charge in 4 hours</p>
				</div>
				<!-- <hr>
				<h4 class="heading mb-3 text-md-left text-center"><b>Flash 13</b></h4>
				<div class="icon-box align-items-center">
					<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/time.png" alt="">
					<p class="mt-0 text-big"><b>Charges 0-80% in 40 mins</b></p>
				</div>
				<div class="icon-box align-items-center">
					<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/charging.png" alt="">
					<p class="mt-0 text-big"><b>Full charge in 2 hr 15 mins</b></p>
				</div> -->
			</div>
			<div class="col-md-6 text-center text-md-left text-lg-right wow fadeInRight">
				<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/flash-7-new.png">
			</div>
		</div>
	</div>
</section>
<?php if ($sectionFiveData) : ?>
	<!-- Chargin-sec -->
	<section class="sec-space overflow-hidden">
		<div class="container">
			<div class="row row flex-column-reverse flex-lg-row">
				<div class="col-lg-6 mt-4 mt-lg-0 text-center text-md-left wow fadeInLeft">
					<h2 class="heading mb-3"><?php echo $sectionFiveData['main_title']; ?></h2>
					<p><?php echo $sectionFiveData['main_description']; ?></p>
					<?php
					while ($row = mysqli_fetch_assoc($sectionFiveLines)) {
					?>
						<div class="icon-box align-items-center">
							<img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>">
							<p class="mt-0 text-big"><b><?php echo $row['title'] ?></b></p>
						</div>
					<?php } ?>
				</div>
				<div class="col-lg-6 text-center text-md-left wow fadeInRight">
					<img src="<?php echo $sectionFiveData['main_image']; ?>" alt="<?php echo $sectionFiveData['main_image_alt']; ?>">
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>
<script>
	// stateWorld
	window.onload = () => {
		const worldOptions = {
			// 'Karnataka': {
			//     'Bengaluru': [
			//             {
			//                 'address': '193, Ground Floor, Shiv Sadan, Outer Ring Road, B Narayanapura, Bengaluru - 560016.Near: Elite Ford Showroom & ICICI Bank',
			//                 'hub': 'B Narayanpura Hub'
			//             }
			//         ]
			// },
			'Haryana': {
				'Gurugram': [{
					'address': 'Plot No.2, Near Ghoda Chowk, Sector-17, Gurugram, Haryana - 122001',
					'hub': 'Gurugram Hub'
				}]
			},
			// 'Uttar Pradesh': {
			//     'Gautam Budhha Nagar': [
			//             {
			//                 'address': '22, Bahlolpur, Sector 69, Noida, Gautam Buddha Nagar, Uttar Pradesh - 201304',
			//                 'hub': 'Noida 69 Hub'
			//             },
			//         ],
			//     'Ghaziabad': [{
			//                 'address': 'Plot 40/1B/5, Site 4, Sahibabad, Industrial Area, Ghaziabad, Uttar Pardesh - 201010',
			//                 'hub': 'Mohan Nagar Hub'
			//             }]
			// },
			'Delhi': {
				'Delhi': [{
						'address': 'B-92, Phase 2, Okhla Industrial Area, New Delhi - 110020',
						'hub': 'Okhla Hub'
					},
					{
						'address': 'G-214A, Ghazipur Village, Delhi - 110096',
						'hub': 'Ghazipur Hub'
					},
					{
						'address': 'WZ4, Bhagwan Das, Near Punjabi Bagh, Opposite Pillar No. 68, New Delhi - 110030',
						'hub': 'Punjabi Bagh Hub'
					},
					{
						'address': 'Sharma Shop at H.No. 65 Village Matiala, Uttam Nagar, Delhi-110059',
						'hub': 'Dwarka Hub'
					},
					{
						'address': 'KH No. 54/1, Laxmi Park, Nangloi, Delhi -110041',
						'hub': 'Peeragarhi Hub'
					},
					{
						'address': 'E -3A , Milan Garden, Mandoli, Delhi - 110093',
						'hub': 'Mandoli Hub'
					},
				]
			}
		}
		let options = '<option value="" selected disabled>Select State</option>';
		for (const [key, value] of Object.entries(worldOptions)) {
			options += `<option value="${key}">${key}</option>`;
		}
		stateWorld.innerHTML = options;

		let cards = '';
		for (const [key, value] of Object.entries(worldOptions)) {
			options += `<option value="${key}">${key}</option>`;
			for (const [key1, value1] of Object.entries(value)) {
				for (const value2 of value1) {
					cards += `<div class="addrss">
    							<h4>${value2.hub}</h4>
    							<p>${value2.address}</p>
    						</div>`;
				}
			}
		}
		$(`div[data-append="address"]`).html(cards);

		stateWorld.addEventListener("change", event => {
			cityWorld.value = '';
			options = '<option value="" selected disabled>Select City</option>';

			$(`div[data-append="address"]`).html('');
			cards = '';

			for (const [key, value] of Object.entries(worldOptions[event.target.value])) {
				options += `<option value="${key}">${key}</option>`;
				for (const v of value) {
					cards += `<div class="addrss">
    							<h4>${v.hub}</h4>
    							<p>${v.address}</p>
    						</div>`;
				}
			}
			cityWorld.innerHTML = options;
			$(`div[data-append="address"]`).html(cards);
		})

		cityWorld.addEventListener("change", event => {
			$(`div[data-append="address"]`).html('');
			cards = '';
			for (const value of worldOptions[stateWorld.value][cityWorld.value]) {
				cards += `<div class="addrss">
							<h4>${value.hub}</h4>
							<p>${value.address}</p>
						</div>`;
			}
			$(`div[data-append="address"]`).html(cards)
		})
	}
</script>