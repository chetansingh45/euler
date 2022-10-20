<?php
include('admin/php/helper/db.php');

use DB\DB;

$db = new DB();

///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM product_reviews_page WHERE section_name = 'meta' AND `status` = '1'");
if (mysqli_num_rows($meta) > 0) {
    $metaData = mysqli_fetch_assoc($meta);
}

////selecting hero data
$hero = $db->db("SELECT * FROM product_reviews_page WHERE section_name = 'hero' AND `status` = '1'");
$heroData = false;
if (mysqli_num_rows($hero) > 0) {
    $heroData = mysqli_fetch_assoc($hero);
}

////selection section two
$sectionTwo = $db->db("SELECT * FROM product_reviews_page WHERE section_name = 'section_two' AND `status` = '1'");
$sectionTwoData = false;
if ($sectionTwo) {
    $sectionTwoData = mysqli_fetch_assoc($sectionTwo);
}
include 'includes/header.php';
?>
<?php if ($heroData) : ?>
    <!-- Hero Banner -->
    <section class="hero-banner sm overflow-hidden" style="background-image: url(<?php echo $heroData['main_image']; ?>); background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center wow zoomIn">
                    <div class="hero-banner-text">
                        <h5 class="hero-sub-title text-white mb-2"><?php echo $heroData['main_title']; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php
$videos = $db->db("SELECT * FROM product_reviews_page WHERE section_name = 'section_two' AND `status` = '1'");
if (mysqli_num_rows($videos) > 0) : ?>
    <div class="text-content-container">
        <div class="media__video-container" id="product_reviews" aria-labelledby="product_reviews">
            <?php while ($row = mysqli_fetch_assoc($videos)) : ?>
                <iframe class="media__video-frame" src="<?php echo $row['iframe']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>