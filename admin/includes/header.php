<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:login.php');
}


include 'php/helper/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Euler-Admin</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	
	<!-- Style css -->
    <link href="css/style.css?v=<?php echo time() ?>" rel="stylesheet">
    <link href="css/custom.css?v=<?php echo time() ?>" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header bg-primary">
            <a href="index.php" class="brand-logo">
                <img src="../images/logo(2).png" alt="Webeesocial Logo">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                <?php
                                    if(isset($_GET['section'])){
                                        echo $_GET['section'];
                                    }
                                ?>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item fw-bold"><?php echo $_SESSION['user']['user_name'] ?></li>
							<li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="logout.php" class="dropdown-item ai-icon">
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    <li>
                        <a href="index.php" aria-expanded="false">
							<i class="bi bi-graph-up-arrow"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li>
                        <a href="gallery.php" aria-expanded="false">
							<i class="bi bi-film"></i>
							<span class="nav-text">Gallery</span>
						</a>
                    </li>
                    <?php if(isAdmin() || isPublisher() || isJrAdmin()){?>
                    <li>
                        <a class="" href="variants.php" aria-expanded="false">
                        <i class="bi bi-truck-flatbed"></i>
							<span class="nav-text">Variants</span>
						</a>
                    </li>
                    <li>
                        <a href="form.php" aria-expanded="false">
                        <i class="bi bi-card-list"></i>
							<span class="nav-text">Form</span>
						</a>
                    </li>
                    <li>
                        <a href="gallery.php" aria-expanded="false">
							<i class="bi bi-film"></i>
							<span class="nav-text">Gallery</span>
						</a>
                    </li>
                    <?php }?>
                    <li>
                        <a class="" href="booking.php" aria-expanded="false">
                            <i class="bi bi-clipboard-data"></i>
							<span class="nav-text">Booking</span>
						</a>
                    </li>

                    <li>
                        <a class="" href="dealership.php" aria-expanded="false">
                            <i class="bi bi-shop"></i>
							<span class="nav-text">Dealerships</span>
						</a>
                    </li>

                    <li>
                        <a class="" href="newsletter.php" aria-expanded="false">
                            <i class="bi bi-envelope-check"></i>
							<span class="nav-text">Newsletter</span>
						</a>
                    </li>

                    <li>
                        <a class="" href="eep.php" aria-expanded="false">
                            <i class="bi bi-envelope-check"></i>
							<span class="nav-text">EEP</span>
						</a>
                    </li>

                    <li>
                        <a class="" href="test-ride.php" aria-expanded="false">
                            <i class="bi bi-bicycle"></i>
							<span class="nav-text">Test-ride</span>
						</a>
                    </li>
                    <?php
                        if(isAdmin()){
                    ?>                
                    <li>
                        <a class="" href="users.php" aria-expanded="false">
                            <i class="bi bi-people"></i>
							<span class="nav-text">Users</span>
						</a>
                    </li>
                   
                    <?php }?>
                    <li>
                        <a class="" href="contactus.php" aria-expanded="false">
                            <i class="bi bi-telephone-inbound"></i>
							<span class="nav-text">Contact</span>
						</a>
                    </li>
                    <?php
                        if(isAdmin() || isPublisher() || isJrAdmin()){
                    ?>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-file"></i>
							<span class="nav-text">Pages</span>
						</a>
                        <ul aria-expanded="false">
                            <!-- Home -->
                            <li>
                                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                    <span class="nav-text">Home</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="cms-index.php?section=meta">Meta</a></li>
                                    <li><a href="cms-index.php?section=cover">Cover</a></li>
                                    <li><a href="cms-index.php?section=find-out-more">Find Out More</a></li>
                                    <li><a href="cms-index.php?section=network">Network</a></li>
                                    <li><a href="cms-index.php?section=slider">Slider</a></li>
                                    <li><a href="cms-index.php?section=assets">Assets</a></li>
                                    <li><a href="cms-index.php?section=news">News</a></li>
                                    <li><a href="cms-index.php?section=accolades">Accolades</a></li>
                                </ul>
                            </li>
                            <!-- About -->
                            <li>
                                <a class="" href="cms-about-us.php" aria-expanded="false">
                                    
                                    <span class="nav-text">About Us</span>
                                </a>
                            </li>
                            <!-- Hiload -->
                            <li>
                                <a class="" href="cms-hiload.php" aria-expanded="false">
                                    
                                    <span class="nav-text">Hiload</span>
                                </a>
                            </li>
                            <!-- Carrer -->
                            <li>
                                <a class="" href="cms-carrer.php" aria-expanded="false">
                                    <span class="nav-text">Carrer</span>
                                </a>
                            </li>
                            <!-- Charging Station -->
                            <li>
                                <a class="" href="cms-charging-station.php" aria-expanded="false">
                                    
                                    <span class="nav-text">Charging Station</span>
                                </a>
                            </li>
                            <!-- Euler Mobility -->
                            <li>
                                <a class="" href="cms-euler-mobility.php" aria-expanded="false">
                                    
                                    <span class="nav-text">Euler Mobility</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="cms-dealership.php" aria-expanded="false">
                                    
                                    <span class="nav-text">Dealership</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="cms-technology.php" aria-expanded="false">
                                    
                                    <span class="nav-text">Technology</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="cms-telematics.php" aria-expanded="false">
                                    
                                    <span class="nav-text">Telematics</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="cms-product-reviews.php" aria-expanded="false">
                                    
                                    <span class="nav-text">Product Reviews</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="cms-media-coverage.php" aria-expanded="false">
                                    
                                    <span class="nav-text">Media Coverage</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="cms-privacy-policy.php" aria-expanded="false">
                                    
                                    <span class="nav-text">Privacy Policy</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="cms-refund-policy.php" aria-expanded="false">
                                    
                                    <span class="nav-text">Refund Policy</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="cms-term&condition.php" aria-expanded="false">
                                    
                                    <span class="nav-text">T&C</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="cms-faq.php" aria-expanded="false">
                                    
                                    <span class="nav-text">FAQ</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="cms-eep.php" aria-expanded="false">
                                    
                                    <span class="nav-text">EEP</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="cms-contact.php" aria-expanded="false">
                                    
                                    <span class="nav-text">Contact Us</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <?php }?>
                    
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
