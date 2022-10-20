<?php
    $page_title = 'Refund Policy';
    $page_description = 'Default Description';
    include('admin/php/helper/db.php');
    use DB\DB;
    $db = new DB();

    ///selecting meta data
    $metaData = false;
    $meta = $db->db("SELECT * FROM refund_policy_page WHERE section_name = 'meta'");
    if(mysqli_num_rows($meta) > 0){
        $metaData = mysqli_fetch_assoc($meta);
    }

    ////selecting hero data
    $hero = $db->db("SELECT * FROM refund_policy_page WHERE section_name = 'hero'");
    $heroData = false;
    if(mysqli_num_rows($hero) > 0){
        $heroData = mysqli_fetch_assoc($hero);
    }

    ////selection section two
    $sectionTwo = $db->db("SELECT * FROM refund_policy_page WHERE section_name = 'section_two'");
    $sectionTwoData = false;
    if($sectionTwo){
        $sectionTwoData = mysqli_fetch_assoc($sectionTwo);
    }
    include 'includes/header.php';
?>
<?php 
if($heroData['status']){
?>
    <!-- Hero Banner -->
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

<?php if($sectionTwoData['status']){?>
        <div class="row">
            <div class="col-12 text-content-container">
            <?php
				if($sectionTwoData){ echo $sectionTwoData['main_description']; }
			?>
            </div>
        </div>
<?php }?>
<?php include 'includes/footer.php';?>
