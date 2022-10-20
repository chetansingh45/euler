<?php
include 'admin/php/helper/functions.php';
include 'admin/php/helper/db.php';

use DB\DB;

$db = new DB();
///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM hiload_page WHERE section_name = 'meta' AND `status` = '1'");
if (mysqli_num_rows($meta) > 0) {
    $metaData = mysqli_fetch_assoc($meta);
}
/////selecting slider data
$sliderData = $db->db("SELECT * FROM hiload_page WHERE section_name='hero' AND `status` = '1'");

////selecting section two data
$sectionTwo = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_two' AND `status` = '1'");
$sectionTwoData = false;
if ($sectionTwo) {
    $sectionTwoData = mysqli_fetch_assoc($sectionTwo);
}

////selecting section three data
$sectionThree = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_three' AND main_title IS NOT NULL AND `status` = '1'");
$sectionThreeData = false;
if ($sectionThree) {
    $sectionThreeData = mysqli_fetch_assoc($sectionThree);
}

////selecting section four data
$section_four = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_four' AND main_title IS NOT NULL AND `status` = '1'");
$section_four_data = false;
if ($section_four) {
    $section_four_data = mysqli_fetch_assoc($section_four);
}

////selecting section Five data
$section_five = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_five' AND main_title IS NOT NULL AND `status` = '1'");
$section_five_data = false;
if ($section_five) {
    $section_five_data = mysqli_fetch_assoc($section_five);
}

////selecting section six data
$section_six = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_six' AND main_title IS NOT NULL AND `status` = '1'");
$section_six_data = false;
if ($section_six) {
    $section_six_data = mysqli_fetch_assoc($section_six);
}

////selecting section seven data
$section_seven = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_seven' AND main_title IS NOT NULL AND `status` = '1'");
$section_seven_data = false;
if ($section_seven) {
    $section_seven_data = mysqli_fetch_assoc($section_seven);
}

////selecting section eight data
$section_eight = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_eight' AND main_title IS NOT NULL AND `status` = '1'");
$section_eight_data = false;
if ($section_eight) {
    $section_eight_data = mysqli_fetch_assoc($section_eight);
}

////selecting section nine data
$section_nine = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_nine' AND main_title IS NOT NULL AND `status` = '1'");
$section_nine_data = false;
if ($section_nine) {
    $section_nine_data = mysqli_fetch_assoc($section_nine);
}

////selecting section ten data
$section_ten = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_ten' AND main_title IS NOT NULL AND `status` = '1'");
$section_ten_data = false;
if ($section_ten) {
    $section_ten_data = mysqli_fetch_assoc($section_ten);
}

include 'includes/header.php';
?>
<!-- Menu -->
<section class="bg-grey-black mini-menu-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12 overflow-X-scroll">
                <div class="row" style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <div id="Scrollspy" class="navbar mini-menu justify-content-md-center text-center">
                            <!-- <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="#introduction">Introduction</a></li>
                                <li class="nav-item"><a class="nav-link" href="#intelligence">Intelligence</a></li>
                                <li class="nav-item"><a class="nav-link" href="#performance">Performance</a></li>
                                <li class="nav-item"><a class="nav-link" href="#charging">Charging</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
                            </ul>
                            -->
                        </div>
                    </div>
                    <div>
                        <div class="navbar mini-menu justify-content-md-center text-center">
                            <ul class="nav">
                                <li class="nav-item"><a href="pdf/HiLoad_Brochure.pdf" target="_blank" class="nav-link mini-menu-btn">Download brochure</a></li>
                                <li class="nav-item"><a class="nav-link" href="test-ride.php">Test Ride</a></li>
                                <li class="nav-item"><a class="nav-link" href="book-now.php">Book Now</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if (mysqli_num_rows($sliderData) > 0) : ?>
    <!-- Hero Banner -->
    <div id="introduction" class="scroll-item"></div>
    <section class="background-cover">
        <div class="full-screen-slider">
            <?php
            while ($row = mysqli_fetch_array($sliderData)) {
            ?>
                <div class="slide slide--1" style="background-image: url(<?php echo $row['main_image'] ?>);height: 451px;">
                    <!-- <div class="fullscreen-slider-inner">
               <h2 class="heading text-white mb-3">Bada Socho. Euler HiLoad Socho.</h2>
               <a href="pdf/Brochure.pdf" target="_blank" class="btn btn-primary"><span>Download Brochure</span></a>
               <a href="#" class="btn btn-primary"><span>Enquire Now</span></a>
            </div> -->
                </div>
            <?php } ?>
            <!-- <div class="slide slide--2">
            <div class="fullscreen-slider-inner">
               <h2 class="heading text-white mb-3">Bada Socho. Euler HiLoad Socho.</h2>
               <a href="pdf/Brochure.pdf" target="_blank" class="btn btn-primary"><span>Download Brochure</span></a>
               <a href="#" class="btn btn-primary"><span>Enquire Now</span></a>
            </div> 
         </div>
         <div class="slide slide--3">
            <div class="fullscreen-slider-inner">
               <h2 class="heading text-white mb-3">Bada Socho. Euler HiLoad Socho.</h2>
               <a href="pdf/Brochure.pdf" target="_blank" class="btn btn-primary"><span>Download Brochure</span></a>
               <a href="#" class="btn btn-primary"><span>Enquire Now</span></a>
            </div> 
         </div> -->
        </div>
    </section>
<?php endif; ?>
<?php if ($sectionTwoData) : ?>
    <!-- video-section -->
    <section class="sec-space wow zoomIn">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-12">
                    <h2 class="heading mb-3 mb-md-5"><?php echo $sectionTwoData['main_title']; ?></h2>
                    <div style="height: 50vh; width: 100%">
                        <iframe width="100%" height="100%" src="<?php echo $sectionTwoData['iframe']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="row text-center justify-content-center mt-4">
                <h2><a href="<?php echo $sectionTwoData['btn_link']; ?>" target="_blank" class="text-primary"><?php echo $sectionTwoData['btn_text']; ?> <i class="fas fa-external-link-alt"></i></a></h2>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($sectionThreeData) : ?>
    <!-- features-sec -->
    <div id="performance" class="scroll-item"></div>
    <section class="text-center wow zoomIn">
        <div class="container">
            <h2 class="heading mb-3 mb-md-5"><?php echo $sectionThreeData['main_title']; ?></h2>
        </div>
    </section>
    <section class="performance-sec sec-space overflow-hidden bg-dark lift-heavy">
        <div class="container">
            <div class="row flex-column-reverse flex-md-row align-items-center">
                <div class="col-md-12 text-center justify-content-center">
                    <!-- <h2 class="heading-sm text-white mb-3">Best in Segment.</h2> -->
                    <!-- <a href="#" class="btn btn-primary"><span>Enquire Now</span></a> -->
                </div>
                <div class="col-md-8 wow fadeInLeft">
                    <div class="tab-content" id="per-tabContent">
                        <div class="tab-pane fade show active" id="per-1" role="tabpanel" aria-labelledby="per-1-tab">
                            <img class="img-change-inner" src="<?php echo $sectionThreeData['main_image']; ?>">
                        </div>
                        <div class="tab-pane fade" id="per-2" role="tabpanel" aria-labelledby="per-2-tab">
                            <img class="img-change-inner" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/auto-hi-load.jpg">
                        </div>
                        <div class="tab-pane fade" id="per-3" role="tabpanel" aria-labelledby="per-3-tab">
                            <img class="img-change-inner" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/auto-hi-load.jpg">
                        </div>
                        <div class="tab-pane fade" id="per-4" role="tabpanel" aria-labelledby="per-4-tab">
                            <img class="img-change-inner" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/auto-hi-load.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 overflow-X-nav-scroll">
                    <div class="feature-nav feature-right nav flex-md-column text-md-right wow fadeInRight" id="per-tab" role="tablist" aria-orientation="vertical">
                        <?php
                        $query = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_three' AND main_title IS NULL");
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <a class="nav-link " id="per-1-tab" data-toggle="pill" href="#per-1" role="tab" aria-controls="per-1" aria-selected="true">
                                <div class="feature-nav-img">
                                    <img class="feature-img-inactive" src="<?php echo $row['logo']; ?>" alt="<?php echo $row['logo_alt']; ?>">
                                    <img class="feature-img-active" src="<?php echo $row['logo']; ?>" alt="<?php echo $row['logo_alt']; ?>">
                                </div>
                                <div>
                                    <h2><?php echo $row['title']; ?></h2>
                                    <p><?php echo $row['description']; ?></p>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($section_four_data) : ?>
    <!-- Product-sec -->
    <div id="charging" class="scroll-item"></div>
    <section class="text-center wow zoomIn">
        <div class="container">
            <h2 class="heading mb-3 mt-5"><?php echo $section_four_data['main_title']; ?></h2>
        </div>
    </section>
    <section class="pricing-sec sec-space overflow-hidden lift-heavy">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 overflow-X-nav-scroll">
                    <div class="feature-nav nav flex-md-column wow fadeInLeft" id="pri-tab" role="tablist" aria-orientation="vertical" style="visibility: visible; animation-name: fadeInLeft;">
                        <?php
                        $query = $db->db("SELECT * FROM hiload_page WHERE section_name ='section_four' AND main_title IS NULL");
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <a class="nav-link " id="pri-1-tab" data-toggle="pill" href="#pri-1" role="tab" aria-controls="pri-1" aria-selected="true">
                                <div class="feature-nav-img">
                                    <img class="feature-img-inactive" src="<?php echo $row['logo']; ?>" alt="<?php echo $row['logo_alt']; ?>">
                                    <img class="feature-img-active" src="<?php echo $row['logo']; ?>" alt="<?php echo $row['logo_alt']; ?>">
                                </div>
                                <div>
                                    <h2><?php echo $row['title']; ?></h2>
                                    <p><?php echo $row['description']; ?></p>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content wow fadeInRight" id="pri-tabContent" style="visibility: visible; animation-name: fadeInRight;">
                        <div class="tab-pane fade show active" id="pri-1" role="tabpanel" aria-labelledby="pri-1-tab">
                            <img class="img-change-inner" src="<?php echo $section_four_data['main_image']; ?>">
                        </div>
                        <div class="tab-pane fade" id="pri-2" role="tabpanel" aria-labelledby="pri-2-tab">
                            <img class="img-change-inner" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/auto-perfornmance.jpg">
                        </div>
                        <div class="tab-pane fade" id="pri-3" role="tabpanel" aria-labelledby="pri-3-tab">
                            <img class="img-change-inner" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/auto-perfornmance.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($section_five_data) : ?>
    <!-- Battery Temp -->
    <section class="sec-space wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-12">
                    <h2 class="heading mb-3"><?php echo $section_five_data['main_title']; ?></h2>
                    <p>
                    <h2><?php echo $section_five_data['main_description']; ?></h2>
                    </p>
                    <video class="img-change-inner" width="100%" height="417" autoplay="autoplay" controls="">
                        <source src="admin/cmsimages/<?php echo $section_five_data['main_image']; ?>" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($section_six_data) : ?>
    <!-- Safety -->
    <div id="pricing" class="scroll-item"></div>
    <section class="text-center wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
        <div class="container">
            <h2 class="heading mb-3"><?php echo $section_six_data['main_title']; ?></h2>
        </div>
    </section>
    <section class="pricing-sec sec-space overflow-hidden lift-heavy">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 overflow-X-nav-scroll">
                    <div class="feature-nav nav flex-md-column wow fadeInLeft" id="pri-tab" role="tablist" aria-orientation="vertical" style="visibility: visible; animation-name: fadeInLeft;">
                        <?php
                        $query = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_six' AND main_title IS NULL");
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <a class="nav-link " id="pri-1-tab" data-toggle="pill" href="#pri-1" role="tab" aria-controls="pri-1" aria-selected="true">
                                <div class="feature-nav-img">
                                    <img class="feature-img-inactive" src="<?php echo $row['logo']; ?>" alt="<?php echo $row['logo_alt']; ?>">
                                    <img class="feature-img-active" src="<?php echo $row['logo']; ?>" alt="<?php echo $row['logo_alt']; ?>">
                                </div>
                                <div>
                                    <h2><?php echo $row['title']; ?></h2>
                                    <p><?php echo $row['description']; ?></p>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="tab-content wow fadeInRight" id="pri-tabContent" style="visibility: visible; animation-name: fadeInRight;">
                        <div class="tab-pane fade show active" id="pri-1" role="tabpanel" aria-labelledby="pri-1-tab">
                            <img class="img-change-inner" src="<?php echo $section_six_data['main_image']; ?>">
                        </div>
                        <div class="tab-pane fade" id="pri-2" role="tabpanel" aria-labelledby="pri-2-tab">
                            <video class="img-change-inner" width="100%" height="417" autoplay="autoplay" controls="">
                                <source src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Battery-temperature.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="tab-pane fade" id="pri-3" role="tabpanel" aria-labelledby="pri-3-tab">
                            <img class="img-change-inner" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Safe-Cabin-img.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($section_seven_data) : ?>
    <!-- Vehical Charger -->
    <section class="performance-sec sec-space overflow-hidden bg-dark lift-heavy">
        <div class="container">
            <div class="row flex-column-reverse flex-md-row align-items-center">
                <div class="col-md-12 text-center justify-content-center">
                    <h2 class="heading text-white mb-3"><?php echo $section_seven_data['main_title']; ?></h2>
                </div>
                <div class="col-md-7 wow fadeInLeft mt-5" style="visibility: visible; animation-name: fadeInLeft;">
                    <div class="tab-content" id="per-tabContent">
                        <div class="tab-pane fade show active" id="per-1" role="tabpanel" aria-labelledby="per-1-tab">
                            <video width="100%" controls autoplay muted>
                                <source src='admin/cmsimages/<?php echo $section_seven_data['main_image']; ?>' type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 overflow-X-nav-scroll">
                    <div class="feature-nav feature-right nav flex-md-column text-md-right wow fadeInRight" id="per-tab" role="tablist" aria-orientation="vertical" style="visibility: visible; animation-name: fadeInRight;">
                        <?php
                        $query = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_seven' AND main_title IS NULL");
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <a class="nav-link " id="per-1-tab" data-toggle="pill" href="#per-1" role="tab" aria-controls="per-1" aria-selected="true">
                                <div class="feature-nav-img">
                                    <img class="feature-img-inactive" src="<?php echo $row['logo']; ?>" alt="<?php echo $row['logo_alt']; ?>">
                                    <img class="feature-img-active" src="<?php echo $row['logo']; ?>" alt="<?php echo $row['logo_alt']; ?>">
                                </div>
                                <div>
                                    <h2><?php echo $row['title']; ?></h2>
                                    <p><?php echo $row['description']; ?></p>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($section_eight_data) : ?>
    <!-- Telematics -->
    <section class="pricing-sec sec-space overflow-hidden lift-heavy">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center justify-content-center">
                    <h2 class="heading mb-3"><?php echo $section_eight_data['main_title']; ?></h2>
                </div>
                <div class="col-md-5 overflow-X-nav-scroll">
                    <div class="feature-nav nav flex-md-column wow fadeInLeft" id="pri-tab" role="tablist" aria-orientation="vertical" style="visibility: visible; animation-name: fadeInLeft;">
                        <?php
                        $query = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_eight' AND main_title IS NULL");
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <a class="nav-link " id="pri-1-tab" data-toggle="pill" href="#pri-1" role="tab" aria-controls="pri-1" aria-selected="true">
                                <div class="feature-nav-img">
                                    <img class="feature-img-inactive" src="<?php echo $row['logo']; ?>" alt="<?php echo $row['logo_alt'] ?>">
                                    <img class="feature-img-active" src="<?php echo $row['logo']; ?>" alt="<?php echo $row['logo_alt'] ?>">
                                </div>
                                <div>
                                    <h2><?php echo $row['title'] ?></h2>
                                    <p><?php echo $row['description'] ?></p>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="tab-content wow fadeInRight" id="pri-tabContent" style="visibility: visible; animation-name: fadeInRight;">
                        <div class="tab-pane fade show active" id="pri-1" role="tabpanel" aria-labelledby="pri-1-tab">
                            <img class="img-change-inner" src="<?php echo $section_eight_data['main_image']; ?>">
                        </div>
                        <div class="tab-pane fade" id="pri-2" role="tabpanel" aria-labelledby="pri-2-tab">
                            <!-- <img class="img-change-inner" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/laift-heavier.jpg"> -->
                            <video class="img-change-inner" width="100%" height="417" autoplay="autoplay" controls="">
                                <source src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/phone.jpg" type="video/mp4">
                            </video>
                        </div>
                        <div class="tab-pane fade" id="pri-3" role="tabpanel" aria-labelledby="pri-3-tab">
                            <img class="img-change-inner" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/phone.jpg">
                        </div>
                        <div class="tab-pane fade" id="pri-4" role="tabpanel" aria-labelledby="pri-4-tab">
                            <img class="img-change-inner" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/phone.jpg">
                        </div>
                        <div class="tab-pane fade" id="pri-4" role="tabpanel" aria-labelledby="pri-4-tab">
                            <img class="img-change-inner" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/phone.jpg">
                        </div>
                    </div>
                </div>
                <div class="mx-auto text-center col-md-12">
                    <div class=" mt-3 mt-md-5">
                        <a href="telematics.php" class="btn btn-primary"><span>Know More</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($section_nine_data) : ?>
    <!-- Pricing -->
    <section class="sec-space wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="prroduct-sec text-center">
                        <h4 class="heading mb-3 mb-md-4"><?php echo $section_nine_data['main_title']; ?></h4>
                        <img src="<?php echo $section_nine_data['main_image'] ?>">
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <?php echo $section_nine_data['main_description']; ?>
                        </div>
                        <div class="col-4" style="display: flex; align-items: center; gap: 4px;">
                            <a href="<?php echo $section_nine_data['btn_link'] ?>" target="_blank" class="btn btn-primary"><span><?php echo $section_nine_data['btn_text'] ?></span></a>
                            <h1>@ ₹<?php echo $section_nine_data['title'] ?>/-</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($section_ten_data) : ?>
    <section class="sec-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading text-center mb-3 mb-md-4"><?php echo $section_ten_data['main_title']; ?></h2>
                    <div class="spec-list-hiload spec-list">
                        <div class="spec-list-inner">
                            <ul class="spec-list-head">
                                <li></li>
                                <li><b><?php echo $section_ten_data['heading1'] ?></b></li>
                                <li><b><?php echo $section_ten_data['heading2'] ?></b></li>
                            </ul>
                            <?php
                            $query = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_ten' AND main_title IS NULL");
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <div class="accordion" id="pro-cat1-accor">
                                    <div class="accordion-inner">
                                        <div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_<?php echo $row['id'] ?>" aria-expanded="true" aria-controls="collp_cat1_1">
                                            <span><?php echo $row['title'] ?></span>
                                            <span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                                        </div>
                                        <div id="collp_cat1_<?php echo $row['id'] ?>" class="collapse" aria-labelledby="collp_cat1_<?php echo $row['id'] ?>" data-parent="#pro-cat1-accor">
                                            <?php
                                            $q = $db->db("SELECT * FROM hiload_spec_items WHERE hiload_id = '{$row['id']}'");
                                            while ($r = mysqli_fetch_assoc($q)) {
                                            ?>
                                                <ul>
                                                    <li><?php echo $r['col1']; ?></li>
                                                    <?php if ($r['col2'] == '1') { ?>
                                                        <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                    <?php } else { ?>
                                                        <li><?php echo $r['col2']; ?></li>
                                                    <?php } ?>
                                                    <?php if ($r['col3'] == '1') { ?>
                                                        <li><i class="fa fa-check text-primary" aria-hidden="true"></i></li>
                                                    <?php } else { ?>
                                                        <li><?php echo $r['col3']; ?></li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="mt-3 text-center text-md-left">
                        <p>True Range: The actual estimated distance your electric vehicle will cover in one full charge, considering median driving conditions* and the rated payload.**</p>
                        <p>* Median driving conditions include; acceleration and deceleration (brake application) rates, battery health, road and traffic conditions, operating temperature.</p>
                        <p>** The certified range exceeds the ‘True Range’ because it is measured based on the certification body’s baseline criteria of IDC (Indian drive cycle) with nominal payload and brake application. </p>
                        <!-- <p>Real Range: 100 ± 5 km: The actual estimated distance your electric vehicle will cover in one full charge, considering median driving conditions* and the rated payload.**</p>
                <p>* Median driving conditions include; acceleration and deceleration (brake application) rates, battery health, road and traffic conditions, operating temperature.</p>
                <p>** The certified range exceeds the ‘Real Range’ because it is measured based on the certification body’s baseline criteria of IDC (Indian drive cycle) with nominal payload and brake application.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>
<script>
    
    $(document).ready(function(){
            var fbRender = document.getElementById('popup_body'),
            formData = $("#form_data").val();
            var formRenderOpts = {
                formData,
                dataType: 'json'
            };
            $(fbRender).formRender(formRenderOpts);
            if(formData!='' && formData!="null"){
                setTimeout(function(){ triggerPopupForm(); },2000);
            }
        })

        // submit_popup_form

        $(".submit_popup_form").submit(function(e){
            e.preventDefault();
            $(".popup_submit_btn").html('Submitting..')
            let inputs = $(this).serializeArray();
            console.log(inputs)
            $.post('admin/ajax-request.php',{data:inputs,action:'save_popup_form'},function(data, status){
                console.log(data);
                data = JSON.parse(data)
                if(data.success){
                   localStorage.setItem('is_submitted',true);
                   $(".success_msg_popup").html('Enquire Submitted');
                   setTimeout(function(){
                   location.reload();
                   },2000)
               }
            })
        })

        function triggerPopupForm(){
            let is_submitted = false;
            let temp = localStorage.getItem('is_submitted');
            if(temp=='' || temp==null){
                $('#popupForm').modal('show');
            }
        }
        
</script>