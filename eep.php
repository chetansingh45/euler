<?php 
$page_title = 'EEP';
include('admin/php/helper/db.php');

use DB\DB;
$db = new DB();

///submit form

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $res = $db->db("INSERT INTO eep_form (name, age, city, contact) VALUES ('$name', '$age', '$city', '$contact')");
    if($res){
        echo "1";
    }else{
        echo "0";
    }
    exit;
}

///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM eep_page WHERE section_name = 'meta'");
if(mysqli_num_rows($meta) > 0){
    $metaData = mysqli_fetch_assoc($meta);
}

////selecting hero data
$hero = $db->db("SELECT * FROM eep_page WHERE section_name = 'hero' AND status = '1'");
$heroData = false;
if(mysqli_num_rows($hero) > 0){
    $heroData = mysqli_fetch_assoc($hero);
}

////selection section two
$sectionTwo = $db->db("SELECT * FROM eep_page WHERE section_name = 'section_two' AND main_title IS NOT NULL AND `status` = '1'");
$sectionTwoData = false;
if($sectionTwo){
    $sectionTwoData = mysqli_fetch_assoc($sectionTwo);
}

////selection section three
$sectionThree = $db->db("SELECT * FROM eep_page WHERE section_name = 'section_three' AND  main_title IS NOT NULL AND `status` = '1'");
$sectionThreeData = false;
if($sectionThree){
    $sectionThreeData = mysqli_fetch_assoc($sectionThree);
}
include 'includes/header.php'; 
?>
<?php if($heroData){ ?>
<!-- Banner Section -->
<section>
    <a href="#entr_form"><img src="<?php echo $heroData['main_image']?>" alt="EEP Banner"></a>
</section>
<?php }?>


<?php if($sectionTwoData){?>
<!-- Section 1 -->
<section class="sec-space bg-light">
    <div class="container">
        <div class="row text-center text-md-left justify-content-center">
            <div class="col-12">
                <h2 class="heading mb-3 mb-md-4 text-center"><?php echo $sectionTwoData['main_title']?></h2>
            </div>
            <?php
            $res = $db->db("SELECT * FROM eep_page WHERE section_name ='section_two' AND main_title IS NULL");
            while($row = mysqli_fetch_assoc($res)){
            ?>
            <div class="col-md-4">
                <div class="eep-icon-box d-flex align-items-center bg-light-blue p-3 rounded-15 justify-content-center mb-3 mb-md-4">
                    <i class="fa fa-check text-primary mr-3" aria-hidden="true"></i>
                    <p class="mb-0 text-md"><b><?php echo $row['title']?></b>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>
<?php }?>

<?php if($sectionThreeData){?>
<!-- Section 2 -->
<section class="sec-space">
    <div class="container">
        <div class="row text-center text-md-left justify-content-center">
            <div class="col-12">
                <h2 class="heading mb-3 mb-md-4 text-center"><?php echo $sectionThreeData['main_title'];?></h2>
            </div>
            <?php
            $res = $db->db("SELECT * FROM eep_page WHERE section_name ='section_three' AND main_title IS NULL");
            while($row = mysqli_fetch_assoc($res)){
            ?>
            <div class="col-md-4 mb-3 mb-md-4">
                <div class="eep-icon-box d-flex flex-column align-items-center justify-content-center bg-light-blue p-4 p-md-5 rounded-15 text-center h-100">
                    <img src="<?php echo $row['logo']?>" alt="">
                    <p class="mb-0 mt-2 text-md"><b><?php echo $row['title']?></b>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>
<?php }?>

<!-- Form Section -->
<div id="entr_form" class="scroll-item"></div>
<section class="sec-space bg-light">
	<div class="container">
		<div class="row text-center justify-content-center">
            <div class="col-12 mb-3 mb-md-4">
                <h2 class="heading">Curious to know more?</h2>
				<h4 class="heading-sm">Submit your details below</h4>
            </div>
			<div class="col-md-12">
			    <hr>	
                <div>
                    <form method="post" class="dealer-form" id="eep_form">
                        <div class="row text-left">
                            <div class="col-md-6 mb-3">
                                <label><b>Name<span class="text-danger">*</span></b></label>
                                <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><b>Age<span class="text-danger">*</span></b></label>
                                <input type="number" id="age" class="form-control" placeholder="Your Age" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><b>Phone Number<span class="text-danger">*</span></b></label>
                                <input type="text" id="contact" class="form-control"required  placeholder="Your Phone Number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><b>City<span class="text-danger">*</span></b></label>
                                <select class="form-control" id="city" required>
                                    <option selected="">Select Your City</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="New Delhi">New Delhi</option>
                                    <option value="Gurugram">Gurugram</option>
                                    <option value="Faridabad">Faridabad</option>
                                    <option value="Noida">Noida</option>
                                    <option value="Ghaziabad">Ghaziabad</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-4 d-block submit_btn">Submit</button>
                        <h2 class="text-success success_msg"></h2>
                    </form>
                    <hr>
                    <p class="text-left mt-2 mb-0">To know more please call on <a href="tel:1800 1238 1238">1800 1238 1238</a></p>
                </div>
			</div>
		</div>
	</div>
</section>

<!-- Disclaimers -->
<section class="sec-space">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 mb-md-4">
                <h2 class="heading">Disclaimers</h2>
            </div>
            <div class="col-12">
                <ul>
                    <li>The vehicle is available on the down payment of Re1 if the owner associates the vehicle with Euler Mobility and opts to finance the vehicle from a bank or NBFC</li>
                    <li>The assured income of Rs 38000 is applicable if the vehicle owner is a business partner with Euler Mobility Services and consistently works for 30 days in a month</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include "includes/footer.php" ?>
<script>
    $(document).ready(function() {
        $("#eep_form").submit(function(e) {
            $(".submit_btn").html("Submitting...");
            e.preventDefault();
            let name = $("#name").val();
            let age = $("#age").val();
            let contact = $("#contact").val();
            let city = $("#city").val();
            $.post('eep.php',{name,age,contact,city},function(data){
                if(data){
                    $(".success_msg").html("Thankyou! we will contact you soon.");
                    $("#name").val('');
                    $("#age").val('');
                    $("#contact").val('');
                }
                $(".submit_btn").html("Submit");
                setTimeout(function(){
                    $(".success_msg").html("");
                },5000)
            })
        })
    })
</script>