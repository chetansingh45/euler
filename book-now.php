<?php 
    $page_title = 'Book Now'; 
	$page_description = 'Book Now';
	$metaData = false;
	include('admin/php/helper/db.php');
	use DB\DB;
	$db = new DB();
    include 'includes/header.php'; 
?>
<!-- Hero Banner -->
<section class="bg-dark sec-space">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center wow zoomIn">
				<h2 class="hero-title text-primary">Book Now</h2>
			</div>
		</div>
	</div>
</section>
<!-- Book Now -->
<section class="book-now-sec sec-space">
	<div class="container">
		<div class="pro-sel">
			<ul class="nav nav-tabs" id="pro-cat" role="tablist">
				<li class="nav-item w-100" role="presentation">
					<a class="nav-link active" id="pro-tab1-tab" data-toggle="tab" href="#pro-tab1" role="tab" aria-controls="pro-tab1" aria-selected="true">HiLoad EV</a>
				</li>
				<!-- <li class="nav-item w-50" role="presentation">
					<a class="nav-link" id="pro-tab2-tab" data-toggle="tab" href="#pro-tab2" role="tab" aria-controls="pro-tab2" aria-selected="false">HiLoad XR14</a>
				</li> -->
			</ul>
			<div class="tab-content mt-3" id="pro-catContent">
				<div class="tab-pane fade show active" id="pro-tab1" role="tabpanel" aria-labelledby="pro-tab1-tab">
					<div class="pro-sel-list">
						<div class="pro-sel-pro">
							<div class="pro-list">
								<div class="pro-list-img">
									<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/full-body-hiload.png">
									<!-- <span class="pro-batch" data-toggle="modal" data-target="#compare_list">Compare</span> -->
								</div>
								<div class="pro-list-details">
									<h4 class="pro-title">HiLoad DV -Delivery Van</h4>
									<!-- <p>Payload: <b>678 Kg</b></p> -->
									
									<div class="btn-grp">
										<!-- <a href="product.php" class="btn btn-dark"><span>View Details</span></a> -->
										<a href="checkout.php?product=SKUHI01" class="btn btn-primary"><span>Book Now</span></a>
									</div>
								</div>
							</div>
							<div class="pro-list">
								<div class="pro-list-img">
									<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/half-load-hiload.png">
									<!-- <span class="pro-batch" data-toggle="modal" data-target="#compare_list">Compare</span> -->
								</div>
								<div class="pro-list-details">
									<h4 class="pro-title">HiLoad PV - Pickup Van</h4>
									<!-- <p>Payload: <b>713 Kg</b></p> -->
									
									<div class="btn-grp">
										<!-- <a href="product.php" class="btn btn-dark"><span>View Details</span></a> -->
										<a href="checkout.php?product=SKUHI02" class="btn btn-primary"><span>Book Now</span></a>
									</div>
								</div>
							</div>
							<div class="pro-list">
								<div class="pro-list-img">
									<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/hideck-hiload.png">
									<!-- <span class="pro-batch" data-toggle="modal" data-target="#compare_list">Compare</span> -->
								</div>
								<div class="pro-list-details">
									<h4 class="pro-title">HiLoad HD - Hi Deck</h4>
									<!-- <p>Payload: <b>688 Kg</b></p> -->
									
									<div class="btn-grp">
										<!-- <a href="product.php" class="btn btn-dark"><span>View Details</span></a> -->
										<a href="checkout.php?product=SKUHI03" class="btn btn-primary"><span>Book Now</span></a>
									</div>
								</div>
							</div>
							<div class="pro-list">
								<div class="pro-list-img">
									<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/flat-bed-hiload.png">
									<!-- <span class="pro-batch" data-toggle="modal" data-target="#compare_list">Compare</span> -->
								</div>
								<div class="pro-list-details">
									<h4 class="pro-title">HiLoad FB - Flat Bed</h4>
									<!-- <p>Payload: <b>738 Kg</b></p> -->
									
									<div class="btn-grp">
										<!-- <a href="product.php" class="btn btn-dark"><span>View Details</span></a> -->
										<a href="checkout.php?product=SKUHI04" class="btn btn-primary"><span>Book Now</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <hr class="mb-4 mb-md-5"> -->
					<!--
					    <h2 class="heading text-center mb-3 mb-md-4">Specifications</h2>
					    <div class="spec-list">
                            <div class="spec-list-inner">
                                <ul class="spec-list-head">
                                    <li></li>
                                    <li><b>HiLoad Full Load Body DV</b></li>
                                    <li><b>HiLoad Half Load Body PV</b></li>
                                    <li><b>HiLoad Full Open Load Body HD</b></li>
                                    <li><b>HiLoad Flat Bed FB</b></li>
                                </ul>
                                <div class="accordion" id="pro-cat1-accor">
                                    <div class="accordion-inner">
                                        <div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_1" aria-expanded="true" aria-controls="collp_cat1_1">
                                            <span>Parameters</span>
                                            <span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></div>
                                        <div id="collp_cat1_1" class="collapse" aria-labelledby="collp_cat1_1" data-parent="#pro-cat1-accor">
                                            <ul>
                                                <li>Payload</li>
                                                <li>678 Kg</li>
                                                <li>713 Kg</li>
                                                <li>688 Kg</li>
                                                <li>738 Kg</li>
                                            </ul>
                                            <ul>
                                                <li>Charging Time</li>
                                                <li>AC charging-3.5hours l Fast Charging - 50 mins</li>
                                                <li>AC charging-3.5hours l Fast Charging - 50 mins</li>
                                                <li>AC charging-3.5hours l Fast Charging - 50 mins</li>
                                                <li>AC charging-3.5hours l Fast Charging - 50 mins</li>
                                            </ul>
                                            <ul>
                                                <li></li>
                                                <li>Battery Powerpack</li>
                                                <li>Battery Powerpack</li>
                                                <li>Battery Powerpack</li>
                                                <li>Battery Powerpack</li>
                                            </ul>
                                            <ul>
                                                <li>Battery Type / Location</li>
                                                <li>Lithium-ion battery / Chassis integration</li>
                                                <li>Lithium-ion battery / Chassis integration</li>
                                                <li>Lithium-ion battery / Chassis integration</li>
                                                <li>Lithium-ion battery / Chassis integration</li>
                                            </ul>
                                            <ul>
                                                <li>Pack Voltage</li>
                                                <li>72V</li>
                                                <li>72V</li>
                                                <li>72V</li>
                                                <li>72V</li>
                                            </ul>
                                            <ul>
                                                <li>Thermal Management System (Liquid Cooling)</li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                            </ul>
                                            <ul>
                                                <li>Water and  Dust Proof Battery (IP67)</li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                            </ul>
                                            <ul>
                                                <li>Emission Free</li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion" id="pro-cat1-accor">
                                    <div class="accordion-inner">
                                        <div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_2" aria-expanded="true" aria-controls="collp_cat1_2">
                                            <span>Description</span>
                                            <span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></div>
                                        <div id="collp_cat1_2" class="collapse" aria-labelledby="collp_cat1_2" data-parent="#pro-cat1-accor">
                                            <ul>
                                                <li>Type</li>
                                                <li>L5N</li>
                                                <li>L5N</li>
                                                <li>L5N</li>
                                                <li>L5N</li>
                                            </ul>
                                            <ul>
                                                <li>Seating Capacity</li>
                                                <li>D + Cargo</li>
                                                <li>D + Cargo</li>
                                                <li>D + Cargo</li>
                                                <li>D + Cargo</li>
                                            </ul>
                                            <ul>
                                                <li>Cabin Type</li>
                                                <li>Reinforced Sheet Metal</li>
                                                <li>Reinforced Sheet Metal</li>
                                                <li>Reinforced Sheet Metal</li>
                                                <li>Reinforced Sheet Metal</li>
                                            </ul>
                                            <ul>
                                                <li>Overall Length</li>
                                                <li>3400mm</li>
                                                <li>3400mm</li>
                                                <li>3400mm</li>
                                                <li>3400mm</li>
                                            </ul>
                                            <ul>
                                                <li>Overall Width</li>
                                                <li>1460 mm</li>
                                                <li>1460 mm</li>
                                                <li>1460 mm</li>
                                                <li>1460 mm</li>
                                            </ul>
                                            <ul>
                                                <li>Overall Height</li>
                                                <li>2100</li>
                                                <li>1800</li>
                                                <li>2100</li>
                                                <li>1800</li>
                                            </ul>
                                            <ul>
                                                <li>Container Dimension (L) </li>
                                                <li>3000</li>
                                            </ul>
                                            <ul>
                                                <li>Rated Payload</li>
                                                <li>753 Kg</li>
                                                <li>789 Kg</li>
                                                <li>NA</li>
                                                <li>813 Kg</li>
                                            </ul>
                                            <ul>
                                                <li>Kerb Weight</li>
                                                <li>660 Kg</li>
                                                <li>624 Kg</li>
                                                <li>NA</li>
                                                <li>600 Kg</li>
                                            </ul>
                                            <ul>
                                                <li>Gross Vehicle Weight</li>
                                                <li>1413 Kg</li>
                                                <li>1413 Kg</li>
                                                <li>1413 Kg</li>
                                                <li>1413 Kg</li>
                                            </ul>
                                            <ul>
                                                <li>Track Width</li>
                                                <li>1270 mm</li>
                                                <li>1270 mm</li>
                                                <li>1270 mm</li>
                                                <li>1270 mm</li>
                                            </ul>
                                            <ul>
                                                <li>Wheelbase</li>
                                                <li>2200mm</li>
                                                <li>2200mm</li>
                                                <li>2200mm</li>
                                                <li>2200mm</li>
                                            </ul>
                                            <ul>
                                                <li>Turning Radius</li>
                                                <li>3.5 m</li>
                                                <li>3.5 m</li>
                                                <li>3.5 m</li>
                                                <li>3.5 m</li>
                                            </ul>
                                            <ul>
                                                <li>Gradeability </li>
                                                <li>21% / 9.45 degrees </li>
                                                <li>21% / 9.45 degrees </li>
                                                <li>21% / 9.45 degrees </li>
                                                <li>21% / 9.45 degrees </li>
                                            </ul>
                                            <ul>
                                                <li>Ground Clearance (Full bump- Worst case)</li>
                                                <li>240 mm</li>
                                                <li>240 mm</li>
                                                <li>240 mm</li>
                                                <li>240 mm</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion" id="pro-cat2-accor">
                                    <div class="accordion-inner">
                                        <div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_3" aria-expanded="true" aria-controls="collp_cat1_3">
                                            <span>Motor</span>
                                            <span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></div>
                                        <div id="collp_cat1_3" class="collapse" aria-labelledby="collp_cat1_3" data-parent="#pro-cat1-accor">
                                            <ul>
                                                <li>Type</li>
                                                <li>Three phase induction motor</li>
                                                <li>Three phase induction motor</li>
                                                <li>Three phase induction motor</li>
                                                <li>Three phase induction motor</li>
                                            </ul>
                                            <ul>
                                                <li>Power (peak)</li>
                                                <li>11.3 KW</li>
                                                <li>11.3 KW</li>
                                                <li>11.3 KW</li>
                                                <li>11.3 KW</li>
                                            </ul>
                                            <ul>
                                                <li>Torque (peak)</li>
                                                <li>88.55 Nm</li>
                                                <li>88.55 Nm</li>
                                                <li>88.55 Nm</li>
                                                <li>88.55 Nm</li>
                                            </ul>
                                            <ul>
                                                <li>Transmission</li>
                                                <li>Automatic</li>
                                                <li>Automatic</li>
                                                <li>Automatic</li>
                                                <li>Automatic</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion" id="pro-cat3-accor">
                                    <div class="accordion-inner">
                                        <div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_4" aria-expanded="true" aria-controls="collp_cat1_4">
                                            <span>Brake systems</span>
                                            <span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></div>
                                        <div id="collp_cat1_4" class="collapse" aria-labelledby="collp_cat1_4" data-parent="#pro-cat1-accor">
                                            <ul>
                                                <li>Type</li>
                                                <li>Hydraulic</li>
                                                <li>Hydraulic</li>
                                                <li>Hydraulic</li>
                                                <li>Hydraulic</li>
                                            </ul>
                                            <ul>
                                                <li>Front</li>
                                                <li>Disc Brake</li>
                                                <li>Disc Brake</li>
                                                <li>Disc Brake</li>
                                                <li>Disc Brake</li>
                                            </ul>
                                            <ul>
                                                <li>Rear</li>
                                                <li>Drum Brake</li>
                                                <li>Drum Brake</li>
                                                <li>Drum Brake</li>
                                                <li>Drum Brake</li>
                                            </ul>
                                            <ul>
                                                <li>Parking</li>
                                                <li>Mechanical lever</li>
                                                <li>Mechanical lever</li>
                                                <li>Mechanical lever</li>
                                                <li>Mechanical lever</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion" id="pro-cat4-accor">
                                    <div class="accordion-inner">
                                        <div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_5" aria-expanded="true" aria-controls="collp_cat1_5">
                                            <span>Suspension systems</span>
                                            <span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></div>
                                        <div id="collp_cat1_5" class="collapse" aria-labelledby="collp_cat1_5" data-parent="#pro-cat1-accor">
                                            <ul>
                                                <li>Front</li>
                                                <li>Hydraulic shock absorber with helical spring</li>
                                                <li>Hydraulic shock absorber with helical spring</li>
                                                <li>Hydraulic shock absorber with helical spring</li>
                                                <li>Hydraulic shock absorber with helical spring</li>
                                            </ul>
                                            <ul>
                                                <li>Rear</li>
                                                <li>Trailing arm with hydraulic shock absorber with helical spring </li>
                                                <li>Trailing arm with hydraulic shock absorber with helical spring </li>
                                                <li>Trailing arm with hydraulic shock absorber with helical spring </li>
                                                <li>Trailing arm with hydraulic shock absorber with helical spring </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion" id="pro-cat5-accor">
                                    <div class="accordion-inner">
                                        <div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_6" aria-expanded="true" aria-controls="collp_cat1_6">
                                            <span>Features</span>
                                            <span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></div>
                                        <div id="collp_cat1_6" class="collapse" aria-labelledby="collp_cat1_6" data-parent="#pro-cat1-accor">
                                            <ul>
                                                <li>Regenerative Braking </li>
                                                <li><i class="fas fa-check-double text-primary"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                            </ul>
                                            <ul>
                                                <li>Telematics Enabled</li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    -->
				</div>
				<div class="tab-pane fade" id="pro-tab2" role="tabpanel" aria-labelledby="pro-tab2-tab" style="display: none">
					<div class="pro-sel-list">
						<div class="pro-sel-pro">
							<div class="pro-list">
								<div class="pro-list-img">
									<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Full-Load-Body.jpg">
									<!-- <span class="pro-batch" data-toggle="modal" data-target="#compare_list">Compare</span> -->
								</div>
								<div class="pro-list-details">
									<h4 class="pro-title">HiLoad Full Load Body DVXR14</h4>
									<p>Payload: <b>678 Kg</b></p>
									
									<div class="btn-grp">
										<!-- <a href="product.php" class="btn btn-dark"><span>View Details</span></a> -->
										<a href="checkout.php?product=SKUHI05" class="btn btn-primary"><span>Book Now</span></a>
									</div>
								</div>
							</div>
							<div class="pro-list">
								<div class="pro-list-img">
									<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Half-Load-Body.jpg">
									<!-- <span class="pro-batch" data-toggle="modal" data-target="#compare_list">Compare</span> -->
								</div>
								<div class="pro-list-details">
									<h4 class="pro-title">HiLoad Half Load Body PVXR14</h4>
									<p>Payload: <b>713 Kg</b></p>
									
									<div class="btn-grp">
										<!-- <a href="product.php" class="btn btn-dark"><span>View Details</span></a> -->
										<a href="checkout.php?product=SKUHI06" class="btn btn-primary"><span>Book Now</span></a>
									</div>
								</div>
							</div>
							<div class="pro-list">
								<div class="pro-list-img">
									<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Full-Load-Body.jpg">
									<!-- <span class="pro-batch" data-toggle="modal" data-target="#compare_list">Compare</span> -->
								</div>
								<div class="pro-list-details">
									<h4 class="pro-title">HiLoad Full Open Load Body HDXR14</h4>
									<p>Payload: <b>688 Kg</b></p>
									
									<div class="btn-grp">
										<!-- <a href="product.php" class="btn btn-dark"><span>View Details</span></a> -->
										<a href="checkout.php?product=SKUHI07" class="btn btn-primary"><span>Book Now</span></a>
									</div>
								</div>
							</div>
							<div class="pro-list">
								<div class="pro-list-img">
									<img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Flat-Bed-Body.jpg">
									<!-- <span class="pro-batch" data-toggle="modal" data-target="#compare_list">Compare</span> -->
								</div>
								<div class="pro-list-details">
									<h4 class="pro-title">HiLoad Flat Bed FBXR14</h4>
									<p>Payload: <b>738 Kg</b></p>
									
									<div class="btn-grp">
										<!-- <a href="product.php" class="btn btn-dark"><span>View Details</span></a> -->
										<a href="checkout.php?product=SKUHI08" class="btn btn-primary"><span>Book Now</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr class="mb-4 mb-md-5">
					<h2 class="heading text-center mb-3 mb-md-4">Specifications</h2>
					<div class="spec-list">
						<div class="spec-list-inner">
							<ul class="spec-list-head">
								<li></li>
								<li><b>HiLoad Full Load Body-DVXR14</b></li>
								<li><b>HiLoad Half Load Body PVXR14</b></li>
								<li><b>HiLoad Full Open Load Body HDXR14</b></li>
								<li><b>HiLoad Flat  Bed FBXR14</b></li>
							</ul>
							<div class="accordion" id="pro-cat7-accor">
								<div class="accordion-inner">
									<div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_8" aria-expanded="true" aria-controls="collp_cat1_8">
										<span>Parameters</span> 
										<span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
									</div>
									<div id="collp_cat1_8" class="collapse" aria-labelledby="collp_cat1_8" data-parent="#pro-cat1-accor">
										<ul>
											<li>Payload</li>
											<li>678 Kg</li>
											<li>713 Kg</li>
											<li>688 Kg</li>
											<li>738 Kg</li>
										</ul>
										<ul>
											<li>Charging Time</li>
											<li>AC charging-3.5hours l Fast Charging - 50 mins</li>
											<li>AC charging-3.5hours l Fast Charging - 50 mins</li>
											<li>AC charging-3.5hours l Fast Charging - 50 mins</li>
											<li>AC charging-3.5hours l Fast Charging - 50 mins</li>
										</ul>
										<ul>
											<li></li>
											<li>Battery Powerpack</li>
											<li>Battery Powerpack</li>
											<li>Battery Powerpack</li>
											<li>Battery Powerpack</li>
										</ul>
										<ul>
											<li>Battery Type / Location</li>
											<li>Lithium-ion battery / Chassis integration</li>
											<li>Lithium-ion battery / Chassis integration</li>
											<li>Lithium-ion battery / Chassis integration</li>
											<li>Lithium-ion battery / Chassis integration</li>
										</ul>
										<ul>
											<li>Pack Voltage</li>
											<li>72V</li>
											<li>72V</li>
											<li>72V</li>
											<li>72V</li>
										</ul>
										<ul>
											<li>Capacity</li>
											<li>14.4 KWH</li>
											<li>14.4 KWH</li>
											<li>14.4 KWH</li>
											<li>14.4 KWH</li>
										</ul>
										<ul>
											<li>Thermal Management System (Liquid Cooling)</li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
										</ul>
										<ul>
											<li>Water and  Dust Proof Battery (IP67)</li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
										</ul>
										<ul>
											<li>Emission Free</li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion" id="pro-cat8-accor">
								<div class="accordion-inner">
									<div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_9" aria-expanded="true" aria-controls="collp_cat1_9">
										<span>Description</span> 
										<span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></div>
									<div id="collp_cat1_9" class="collapse" aria-labelledby="collp_cat1_9" data-parent="#pro-cat1-accor">
										<ul>
											<li>Type</li>
											<li>L5N</li>
											<li>L5N</li>
											<li>L5N</li>
											<li>L5N</li>
										</ul>
										<ul>
											<li>Seating Capacity</li>
											<li>D + Cargo</li>
											<li>D + Cargo</li>
											<li>D + Cargo</li>
											<li>D + Cargo</li>
										</ul>
										<ul>
											<li>Cabin Type</li>
											<li>Reinforced Sheet Metal</li>
											<li>Reinforced Sheet Metal</li>
											<li>Reinforced Sheet Metal</li>
											<li>Reinforced Sheet Metal</li>
										</ul>
										<ul>
											<li>Overall Length</li>
											<li>3400mm</li>
											<li>3400mm</li>
											<li>3400mm</li>
											<li>3400mm</li>
										</ul>
										<ul>
											<li>Overall Width</li>
											<li>1460 mm</li>
											<li>1460 mm</li>
											<li>1460 mm</li>
											<li>1460 mm</li>
										</ul>
										<ul>
											<li>Overall Height</li>
											<li>2100</li>
											<li>1800</li>
											<li>2100</li>
											<li>1800</li>
										</ul>
										<ul>
											<li>Container Dimension (L) </li>
											<li>3000</li>
										</ul>
										<ul>
											<li>Rated Payload</li>
											<li>753 Kg</li>
											<li>789 Kg</li>
											<li>NA</li>
											<li>813 Kg</li>
										</ul>
										<ul>
											<li>Kerb Weight</li>
											<li>660 Kg</li>
											<li>624 Kg</li>
											<li>NA</li>
											<li>600 Kg</li>
										</ul>
										<ul>
											<li>Gross Vehicle Weight</li>
											<li>1413 Kg</li>
											<li>1413 Kg</li>
											<li>1413 Kg</li>
											<li>1413 Kg</li>
										</ul>
										<ul>
											<li>Track Width</li>
											<li>1270 mm</li>
											<li>1270 mm</li>
											<li>1270 mm</li>
											<li>1270 mm</li>
										</ul>
										<ul>
											<li>Wheelbase</li>
											<li>2200mm</li>
											<li>2200mm</li>
											<li>2200mm</li>
											<li>2200mm</li>
										</ul>
										<ul>
											<li>Turning Radius</li>
											<li>3.5 m</li>
											<li>3.5 m</li>
											<li>3.5 m</li>
											<li>3.5 m</li>
										</ul>
										<ul>
											<li>Gradeability </li>
											<li>21% / 9.45 degrees </li>
											<li>21% / 9.45 degrees </li>
											<li>21% / 9.45 degrees </li>
											<li>21% / 9.45 degrees </li>
										</ul>
										<ul>
											<li>Ground Clearance (Full bump- Worst case)</li>
											<li>240 mm</li>
											<li>240 mm</li>
											<li>240 mm</li>
											<li>240 mm</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion" id="pro-cat9-accor">
								<div class="accordion-inner">
									<div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_10" aria-expanded="true" aria-controls="collp_cat1_10">
										<span>Motor</span> 
										<span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></div>
									<div id="collp_cat1_10" class="collapse" aria-labelledby="collp_cat1_10" data-parent="#pro-cat1-accor">
										<ul>
											<li>Type</li>
											<li>Three phase induction motor</li>
											<li>Three phase induction motor</li>
											<li>Three phase induction motor</li>
											<li>Three phase induction motor</li>
										</ul>
										<ul>
											<li>Power (peak)</li>
											<li>11.3 KW</li>
											<li>11.3 KW</li>
											<li>11.3 KW</li>
											<li>11.3 KW</li>
										</ul>
										<ul>
											<li>Torque (peak)</li>
											<li>88.55 Nm</li>
											<li>88.55 Nm</li>
											<li>88.55 Nm</li>
											<li>88.55 Nm</li>
										</ul>
										<ul>
											<li>Transmission</li>
											<li>Automatic</li>
											<li>Automatic</li>
											<li>Automatic</li>
											<li>Automatic</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion" id="pro-cat10-accor">
								<div class="accordion-inner">
									<div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_11" aria-expanded="true" aria-controls="collp_cat1_11">
										<span>Brake systems</span> 
										<span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></div>
									<div id="collp_cat1_11" class="collapse" aria-labelledby="collp_cat1_11" data-parent="#pro-cat1-accor">
										<ul>
											<li>Type</li>
											<li>Hydraulic</li>
											<li>Hydraulic</li>
											<li>Hydraulic</li>
											<li>Hydraulic</li>
										</ul>
										<ul>
											<li>Front</li>
											<li>Disc Brake</li>
											<li>Disc Brake</li>
											<li>Disc Brake</li>
											<li>Disc Brake</li>
										</ul>
										<ul>
											<li>Rear</li>
											<li>Drum Brake</li>
											<li>Drum Brake</li>
											<li>Drum Brake</li>
											<li>Drum Brake</li>
										</ul>
										<ul>
											<li>Parking</li>
											<li>Mechanical lever</li>
											<li>Mechanical lever</li>
											<li>Mechanical lever</li>
											<li>Mechanical lever</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion" id="pro-cat11-accor">
								<div class="accordion-inner">
									<div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_12" aria-expanded="true" aria-controls="collp_cat1_12">
										<span>Suspension systems</span> 
										<span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></div>
									<div id="collp_cat1_12" class="collapse" aria-labelledby="collp_cat1_12" data-parent="#pro-cat1-accor">
										<ul>
											<li>Front</li>
											<li>Hydraulic shock absorber with helical spring</li>
											<li>Hydraulic shock absorber with helical spring</li>
											<li>Hydraulic shock absorber with helical spring</li>
											<li>Hydraulic shock absorber with helical spring</li>
										</ul>
										<ul>
											<li>Rear</li>
											<li>Trailing arm with hydraulic shock absorber with helical spring </li>
											<li>Trailing arm with hydraulic shock absorber with helical spring </li>
											<li>Trailing arm with hydraulic shock absorber with helical spring </li>
											<li>Trailing arm with hydraulic shock absorber with helical spring </li>
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion" id="pro-cat12-accor">
								<div class="accordion-inner">
									<div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_13" aria-expanded="true" aria-controls="collp_cat1_13">
										<span>Features</span> 
										<span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></div>
									<div id="collp_cat1_13" class="collapse" aria-labelledby="collp_cat1_13" data-parent="#pro-cat1-accor">
										<ul>
											<li>Regenerative Braking </li>
											<li><i class="fas fa-check-double text-primary"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
										</ul>
										<ul>
											<li>Telematics Enabled</li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
											<li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- List -->
<div class="compare_list modal fade" id="compare_list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-body">
				<table>
					<tbody>
						<tr>
							<td>Parameters</td>
							<td>HiLoad Full Load Body DVXR14</td>
							<td>HiLoad Half Load Body PVXR14</td>
							<td>HiLoad Full Open Load Body HDXR14</td>
							<td>HiLoad Flat Bed FBXR14</td>
						</tr>
						<tr>
							<td>Payload</td>
							<td>678 Kg</td>
							<td>713 Kg</td>
							<td>688 Kg</td>
							<td>738 Kg</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>

</script>
<?php include 'includes/footer.php';?>
