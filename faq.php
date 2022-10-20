<?php
include('admin/php/helper/db.php');

use DB\DB;

$db = new DB();

///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM faq_page WHERE section_name = 'meta'");
if (mysqli_num_rows($meta) > 0) {
   $metaData = mysqli_fetch_assoc($meta);
}

////selecting hero data
$hero = $db->db("SELECT * FROM faq_page WHERE section_name = 'hero'");
$heroData = false;
if (mysqli_num_rows($hero) > 0) {
   $heroData = mysqli_fetch_assoc($hero);
}
include 'includes/header.php';
?>

<?php if($heroData['status']){ ?>
<!-- Hero Banner -->
<section class="bg-dark sec-space">
   <div class="container">
      <div class="row">
         <div class="col-12 text-center wow zoomIn">
            <h2 class="hero-title text-primary"><?php echo $heroData['main_title'] ?></h2>
         </div>
      </div>
   </div>
</section>
<?php }?>

<!-- FAQ Content -->
<section class="sec-space">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="spec-list-hiload spec-list">
               <div class="spec-list-inner">
                  <?php
                  $list = $db->db("SELECT * FROM faq_page WHERE section_name = 'section_two'");
                  while($row = mysqli_fetch_assoc($list)){
                  ?>
                  <div class="accordion" id="pro-cat<?php echo $row['id']?>">
                     <div class="accordion-inner">
                        <div class="tab-btn" data-toggle="collapse" data-target="#collp_cat1_<?php echo $row['id']?>" aria-expanded="true" aria-controls="collp_cat1_1">
                           <span><?php echo $row['title']?></span>
                           <span><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span>
                        </div>
                        <div id="collp_cat1_<?php echo $row['id']?>" class="collapse" aria-labelledby="collp_cat1_36" data-parent="#pro-cat<?php echo $row['id']?>">
                        <div class="mt-3 bg-light p-3 ">
                           <p><?php echo $row['description']?></p>
                        </div> 
                        </div>
                     </div>
                  </div>
                  <?php }?>
               </div>
            </div>
            <!-- <div class="mt-3 text-center text-md-left">
               <p>True Range: The actual estimated distance your electric vehicle will cover in one full charge, considering median driving conditions* and the rated payload.**</p>
               <p>* Median driving conditions include; acceleration and deceleration (brake application) rates, battery health, road and traffic conditions, operating temperature.</p>
               <p>** The certified range exceeds the ‘True Range’ because it is measured based on the certification body’s baseline criteria of IDC (Indian drive cycle) with nominal payload and brake application. </p>
               <!-- <p>Real Range: 100 ± 5 km: The actual estimated distance your electric vehicle will cover in one full charge, considering median driving conditions* and the rated payload.**</p>
                <p>* Median driving conditions include; acceleration and deceleration (brake application) rates, battery health, road and traffic conditions, operating temperature.</p>
                <p>** The certified range exceeds the ‘Real Range’ because it is measured based on the certification body’s baseline criteria of IDC (Indian drive cycle) with nominal payload and brake application.</p> 
            </div> -->
         </div>
      </div>
   </div>
</section>

<?php include 'includes/footer.php'; ?>