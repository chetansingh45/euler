<?php

include('admin/php/helper/db.php');

use DB\DB;

$db = new DB();

///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM telematics_page WHERE section_name = 'meta' AND `status` = '1'");
if (mysqli_num_rows($meta) > 0) {
    $metaData = mysqli_fetch_assoc($meta);
}

////selecting hero data
$hero = $db->db("SELECT * FROM telematics_page WHERE section_name = 'hero' AND `status` = '1'");
$heroData = false;
if (mysqli_num_rows($hero) > 0) {
    $heroData = mysqli_fetch_assoc($hero);
}

////selection section two
$sectionTwo = $db->db("SELECT * FROM telematics_page WHERE section_name = 'section_two' AND main_title IS NOT NULL AND `status` = '1'");
$sectionTwoData = false;
if ($sectionTwo) {
    $sectionTwoData = mysqli_fetch_assoc($sectionTwo);
}

////selection section three
// $sectionThree = $db->db("SELECT * FROM telematics_page WHERE section_name = 'section_three'");
// $sectionThreeData = false;
// if($sectionThree){
//     $sectionThreeData = mysqli_fetch_assoc($sectionThree);
// }

////selection section four
$sectionFour = $db->db("SELECT * FROM telematics_page WHERE section_name = 'section_four' AND `status` = '1'");
$sectionFourData = false;
if ($sectionFour) {
    $sectionFourData = mysqli_fetch_assoc($sectionFour);
}
include 'includes/header.php';
?>
<?php if ($heroData) : ?>
    <!-- Hero Banner -->
    <section class="hero-banner overflow-hidden" style="background-image: url(<?php echo $heroData['main_image'] ?>);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center wow zoomIn">
                    <div>
                        <h5 class="hero-title text-white mb-2"><?php echo $heroData['main_title']; ?></h5>
                        <h2 class="hero-sub-title text-primary"><?php echo $heroData['title']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($sectionTwoData) : ?>
    <!-- Electrify your fleet while reducing your OPEX and CAPEX -->
    <section class="sec-space">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto text-center wow zoomIn">
                    <h3 class="heading mb-3 mb-md-4"><?php echo $sectionTwoData['main_title']; ?></h3>
                    <p><?php echo $sectionTwoData['main_description']; ?></p>
                </div>
            </div>
        </div>
    </section>
    <!-- How It Functions -->
    <section class="d-none overview-bg-img sec-space" style="background-image: url(https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/telematics-img1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto text-center wow zoomIn">
                    <h3 class="heading text-white mb-3 mb-md-4">How It Functions</h3>
                    <p class="text-white mb-0">Euler Shepherd helps you make sense of the data that your vehicle constantly produces. This information can then be applied to manage your fleet operation effectively. From vehicle location to vehicle health, Euler Telematics lets you monitor your fleet and keeps you updated about their minute details.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Offering -->
    <section class="ofr-sec sec-space pb-0 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto text-center wow zoomIn">
                    <h3 class="heading mb-3 mb-md-4"><?php echo $sectionTwoData['title']; ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-none text-md-right ofr-sec-l sec-space pt-0 wow fadeInLeft">
                        <?php
                        $leftHeadings = $db->db("SELECT * FROM telematics_page WHERE section_name = 'section_two' AND main_title IS NULL AND side='left'");
                        while ($row = mysqli_fetch_array($leftHeadings)) {
                        ?>
                            <li class="mb-3">
                                <div class="icon-box2 icon-box2-r align-items-center">
                                    <div>
                                        <p class="text-md"><b><?php echo $row['title'] ?></b></p>
                                    </div>
                                    <img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>">
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-md-4 d-none d-md-flex">
                    <div class="h-100 d-flex align-items-end"><img src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/our-ofr-phone.png"></div>
                </div>
                <div class="col-md-4">
                    <ul class="list-none ofr-sec-r sec-space pt-0 wow fadeInRight">
                        <?php
                        $leftHeadings = $db->db("SELECT * FROM telematics_page WHERE section_name = 'section_two' AND main_title IS NULL AND side='right'");
                        while ($row = mysqli_fetch_array($leftHeadings)) {
                        ?>
                            <li class="mb-3">
                                <div class="icon-box2 align-items-center">
                                    <img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['logo_alt'] ?>">
                                    <div>
                                        <p class="text-md"><b><?php echo $row['title'] ?></b></p>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Alert -->
<section class="bg-dark sec-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single-slider">
                    <div class="single-slider-inner">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img src="images/alert-img.jpg">
                            </div>
                            <div class="col-md-6 text-center text-md-left">
                                <h3 class="heading text-white my-3 mt-md-0 mb-md-4"><b>Alert</b></h3>
                                <ul class="list-style">
                                    <li class="mb-3 mb-md-4">
                                        <div class="icon-box icon-box-right align-items-center">
                                            <img src="images/breakdown.png">
                                            <div>
                                                <h4 class="text-big text-primary"><b>Breakdown</b></h4>
                                                <p class="text-white mb-0">You will be notified when a vehicle has broken down</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3 mb-md-4">
                                        <div class="icon-box icon-box-right align-items-center">
                                            <img src="images/crash.png">
                                            <div>
                                                <h4 class="text-big text-primary"><b>Crash/Topple</b></h4>
                                                <p class="text-white mb-0">In case a vehicle has toppled or is subject to crash</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-box icon-box-right align-items-center">
                                            <img src="images/bettery.png">
                                            <div>
                                                <h4 class="text-big text-primary"><b>Pre-heating of battery</b></h4>
                                                <p class="text-white mb-0">In case the vehicle battery is getting pre-heated</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="single-slider-inner">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img src="images/alert-img.jpg">
                            </div>
                            <div class="col-md-6 text-center text-md-left">
                                <h3 class="heading text-white my-3 mt-md-0 mb-md-4"><b>Alert</b></h3>
                                <ul class="list-style">
                                    <li class="mb-3 mb-md-4">
                                        <div class="icon-box icon-box-right align-items-center">
                                            <img src="images/breakdown.png">
                                            <div>
                                                <h4 class="text-big text-primary"><b>Breakdown</b></h4>
                                                <p class="text-white mb-0">You will be notified when a vehicle has broken down</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3 mb-md-4">
                                        <div class="icon-box icon-box-right align-items-center">
                                            <img src="images/crash.png">
                                            <div>
                                                <h4 class="text-big text-primary"><b>Crash/Topple</b></h4>
                                                <p class="text-white mb-0">In case a vehicle has toppled or is subject to crash</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-box icon-box-right align-items-center">
                                        <img src="images/bettery.png">    
                                            <div>
                                                <h4 class="text-big text-primary"><b>Pre-heating of battery</b></h4>
                                                <p class="text-white mb-0">In case the vehicle battery is getting pre-heated</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="single-slider-inner d-none">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img width="200px" class="mx-auto width-125" src="images/Energy-Efficiency-telematics.png">
                            </div>
                            <div class="col-md-6 text-center text-md-left">
                                <h3 class="heading text-white my-3 mt-md-0 mb-md-4"><b>Energy Efficiency</b></h3>
                                <ul class="list-style">
                                    <li class="mb-3 mb-md-4">
                                        <div class="icon-box icon-box-right align-items-center">
                                        <img src="images/energy-e-icon1.png">
                                            <div>
                                                <p class="text-white mb-0">Monitor the consumption of energy while vehicles are driving and while they are idling, to see how this affects your bottom line</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3 mb-md-4">
                                        <div class="icon-box icon-box-right align-items-center">
                                        <img src="images/energy-e-icon2.png">
                                            <div>
                                                <p class="text-white mb-0">Monitor remainder charge</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-box icon-box-right align-items-center">
                                        <img src="images/energy-e-icon3.png">
                                            <div>
                                                <p class="text-white mb-0">Notifies about closest charging station</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider-inner d-none">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img src="images/Fleet-Notification-telematics.png">
                            </div>
                            <div class="col-md-6 text-center text-md-left">
                                <h3 class="heading text-white my-3 mb-md-4"><b>Fleet Notifications</b></h3>
                                <p class="text-primary">Get notified for a range of vehicle statuses. Alerts are issued:</p>
                                <ul class="list-style">
                                    <li class="mb-3 mb-md-4">
                                        <div class="icon-box icon-box-right align-items-center">
                                        <img src="images/fleet-icon1.png">
                                            <div>
                                                <p class="text-white mb-0">If the vehicle is driven beyond normal operating hours</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3 mb-md-4">
                                        <div class="icon-box icon-box-right align-items-center">
                                        <img src="images/fleet-icon2.png">
                                            <div>
                                                <p class="text-white mb-0">If the vehicle is being towed</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-box icon-box-right align-items-center">
                                        <img src="images/fleet-icon3.png">
                                            <div>
                                                <p class="text-white mb-0">In case of breakdown</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="sec-space">
    <div class="container">
        <div class="row align-items-center justify-content-center wow zoomIn">
            <div class="col-md-12 text-center">
                <h2 class="heading mb-3 mb-md-4">To Avail The Services</h2>
                <a href="javascript:;" class=" btn btn-primary" data-toggle="modal" data-target="#ctamodel"><span>Know More</span></a>
                <div class="modal fade" id="ctamodel" tabindex="-1" role="dialog" aria-labelledby="ctamodelLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="modal-body text-center">
                                <form class="text-left">
                                    <h3 class="heading-sm mb-3">Your Contact Info</h3>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="recipient-name" placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  required="true" placeholder="Mobile Number*">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><span>Submit</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<?php if ($sectionFourData) : ?>
    <!-- Driver Notifications -->
    <section class="sec-space dot-top pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto text-center mb-3 mb-md-4 wow zoomIn">
                    <h2 class="heading mb-3 mb-md-4"><?php echo $sectionFourData['main_title']; ?></h2>
                    <p class="mb-2"><?php echo $sectionFourData['main_description']; ?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="notification-sec sec-space py-md-0">
        <div class="container">
            <div class="row">
                <div class="col-md-2 text-center d-md-flex justify-content-md-center align-items-md-start wow fadeInLeft">
                    <img class="bell-img" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/bell.png">
                </div>
                <div class="col-md-8 py-4 py-md-0 wow zooIn">
                    <img src="<?php echo $sectionFourData['main_image']; ?>">
                </div>
                <div class="col-md-2 text-center d-md-flex justify-content-md-center align-items-md-end wow fadeInRight">
                    <img class="bell-img" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/bell.png">
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
<?php include 'includes/footer.php'; ?>