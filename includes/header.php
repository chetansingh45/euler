<!DOCTYPE php>
<php lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/fav.ico" type="image">
	<title><?php echo isset($metaData['main_title']) ? $metaData['main_title'] : '';?></title>
	<meta name="description" content="<?php echo isset($metaData['main_description']) ? $metaData['main_description'] : ''?>">
	<script src="js/modernizr.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/normalize.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/slick.min.css">
	<link href="css/slick-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/burger-menu.css">
	<link rel="stylesheet" href="css/snackbar.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custom.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js" integrity="sha512-p7Ey2nBhKYEi9yh0iDs+GMA0ttebOqVl3OO2oWRzRxtDoN/RedyYcHFUJZhMVi8NKRdEA7n+9NTNQX/kFIZgNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" integrity="sha512-q583ppKrCRc7N5O0n2nzUiJ+suUv7Et1JGels4bXOaMFQcamPk9HjdUknZuuFjBNs7tsMuadge5k9RzdmO+1GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-205743915-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-205743915-1');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '308519140662434');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=308519140662434&ev=PageView&noscript=1"/></noscript>
    <!-- End Facebook Pixel Code -->
	<style>
        .translate_control {
            position: fixed;
            right: 10px;
            bottom: 4vh;
            z-index: 99999;
            width: 100px;
        }
        .goog-te-gadget-link{
            display: none;
        }
        #goog-gt-tt {
            display:none !important;
        }
		.media__video-container,
        .media__press-release-container {
            display: grid !important;
            grid-template-columns: repeat(2, 1fr);
            gap: 4vh 2vw;
        }

        .media__video-frame,
        .media__press-release-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 36vh;
            box-shadow: 0 4px 8px 0 rgb(0 0 0 / 40%);
        }

        .media__press-release-link {
            flex-direction: column;
            gap: 1vh;
            padding: 1vh 1vw 0;
        }

        .media__press-release-link img {
            width: 100%;
        }

        @media (max-width: 991px) {
            .media__video-container,
            .media__press-release-container {
                grid-template-columns: repeat(1, 1fr);
                gap: 2vh 1vw;
            }
        }

        .toll-free-call-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            position: fixed;
            bottom: 0;
            background: #000;
            font-size: 0.8rem;
            z-index: 1000;
            padding: 1vh;
            width: 100%;
            gap: 1vh;
        }

       .toll-free-call-bar a {
            color: #fff !important;
            font-weight: bold;
       }

        @media (max-width: 991px) {
            .toll-free-call-bar {
                padding: 1vh 1vh 1.5vh;
            }
        }
    </style>

    <style>
        .media__video-container,
        .media__press-release-container {
            display: grid !important;
            grid-template-columns: repeat(2, 1fr);
            gap: 4vh 2vw;
        }

        .media__video-frame,
        .media__press-release-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 36vh;
            box-shadow: 0 4px 8px 0 rgb(0 0 0 / 40%);
        }

        .media__press-release-link {
            flex-direction: column;
            gap: 1vh;
            padding: 1vh 1vw 0;
        }

        .media__press-release-link img {
            width: 100%;
        }

        @media (max-width: 991px) {
            .media__video-container,
            .media__press-release-container {
                grid-template-columns: repeat(1, 1fr);
                gap: 2vh 1vw;
            }
        }

        .toll-free-call-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            position: fixed;
            bottom: 0;
            background: #000;
            font-size: 0.8rem;
            z-index: 1000;
            padding: 1vh;
            width: 100%;
            gap: 1vh;
        }

       .toll-free-call-bar a {
            color: #fff !important;
            font-weight: bold;
       }

        @media (max-width: 991px) {
            .toll-free-call-bar {
                padding: 1vh 1vh 1.5vh;
            }
        }
    </style>
</head>

<body class="translate">
    <div class="toll-free-call-bar">
        <a href="tel:1800 1238 1238" alt="toll-free"><i class="bi bi-telephone-fill"></i> 1800 1238 1238</a> | Mon-Sat (9.30AM-6.30PM)
    </div>
    <!-- |snackbar| -->
	<div id="snackbar"></div>
	<!-- |Google Transaltor| -->
	<div class="translate_control shadow  px-2 py-1 bg-white text-center rounded" lang="en">
        <a href="javascript: void(0)" class="text-black" id="changelgText">Hindi</a>
    </div>
	<!-- Header -->
	<header class="header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-3">
					<a href="https://www.eulermotors.com/"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/logo.png" class="logo" alt="Euler Logo"></a>
				</div>
				<div class="col-lg-9">
					<div class="mob_menu">
						<div class="d-lg-none mr-4"><a href="book-now.php" class="btn btn-primary"><span>Book Now</span></a></div>
						<div class="offcanvas d-flex justify-content-end d-lg-none">
							<button type="button" class="offcanvas-menu-btn menu-status-open"> <span class="btn-icon-wrap">
                                <span></span>
								<span></span>
								<span></span>
								</span>
							</button>
						</div>
					</div>
					<nav class="header_menu">
						<ul class="menu-items">
							<li><a href="hiload.php">HiLoad</a></li>
							<li><a href="charging-station.php">Charging Network</a></li>
							<li><a href="telematics.php">Telematics</a></li>
							<li><a href="lease.php">Euler Mobility</a></li>
							<li id="about_company_menu">
							    <div class="lan">
                                    <div class="lan-btn">Company <span class="caret"></span></div>
                                    <ul class="lan-selector">
                                        <!--<li><a href="press-release.php" class="small">Press Release</a></li>-->
                                        <li><a href="media-coverage.php" class="small">Media Coverage</a></li>
                                        <li><a href="product-reviews.php" class="small">Product Reviews</a></li>
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="contact.php">Contact Us</a></li>
                                        <li><a href="careers.php">Careers</a></li>
                                    </ul>
                                </div>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
 
