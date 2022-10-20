<?php
error_reporting(0);
ini_set('display_errors', 0);
include('admin/php/helper/db.php');

use DB\DB;

$db = new DB();

///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM media_coverage_page WHERE section_name = 'meta' AND `status` = '1'");
if (mysqli_num_rows($meta) > 0) {
    $metaData = mysqli_fetch_assoc($meta);
}

////selecting hero data
$hero = $db->db("SELECT * FROM media_coverage_page WHERE section_name = 'hero' AND `status` = '1'");
$heroData = false;
if (mysqli_num_rows($hero) > 0) {
    $heroData = mysqli_fetch_assoc($hero);
}

////selection section two
$sectionTwo = $db->db("SELECT * FROM media_coverage_page WHERE section_name = 'section_two' AND `status` = '1'");
$sectionTwoData = false;
// if ($sectionTwo) {
//     $sectionTwoData = mysqli_fetch_assoc($sectionTwo);
// }
include 'includes/header.php';
include 'includes/OpenGraph.php';
?>
<?php if ($heroData) : ?>
    <!-- Hero Banner -->
    <section class="hero-banner sm overflow-hidden" style="background-image: url(<?php echo $heroData['main_image'] ?>); background-position: center;">
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
<?php if (mysqli_num_rows($sectionTwo) > 0) : ?>
    <div class="text-content-container">
        <div class="media__press-release-container" id="v-pills-profile">
            <?php
            while ($row = mysqli_fetch_assoc($sectionTwo)) {
                $article_url = $row['iframe'];
                $article = OpenGraph::fetch($article_url);
            ?>
                <a class="media__press-release-link" href='<?php echo $articleurl; ?>' target="_blank" alt='<?php echo $article->title; ?>'>
                    <img alt='<?php echo $article->title; ?>' src='<?php echo $article->image; ?>' />
                    <h3><i><?php echo $article->site_name; ?></i> | <?php echo $article->title; ?></h3>
                </a>
            <?php } ?>
        </div>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>