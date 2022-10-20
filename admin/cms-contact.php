<?php 
include('php/helper/db.php');
include 'includes/header.php';
include 'php/helper/alert.php';
use DB\DB;
$db = new DB();

////////////saving and updating section meta

$section_meta = $db->db("SELECT * FROM contact_page WHERE section_name = 'meta'");
if(isset($_POST['save_meta'])){
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    if(mysqli_num_rows($section_meta) > 0){
        $res = $db->db("UPDATE contact_page SET main_title='$main_title',main_description='$main_description' WHERE section_name='meta'");
        if($res){
            alert("Updated","Meta Updated Successfully","success");
        }
    }else{
        $sql = "INSERT INTO contact_page (section_name,main_title,main_description)
        VALUES ('meta','$main_title','$main_description')";
        
        $res = $db->db($sql);
        if($res){
            alert("Added","Meta Added Successfully","success");
        }
    }
}
$meta_data = false;
$meta = $db->db("SELECT * FROM contact_page WHERE section_name = 'meta'");
if(mysqli_num_rows($meta) > 0){
    $meta_data = mysqli_fetch_assoc($meta);
}

//////---------Saving And updating hero section--------------////////////////////////////////////////////////
$sectionHero = $db->db("SELECT * FROM contact_page WHERE section_name = 'hero'");
if(mysqli_num_rows($sectionHero) > 0){
    $sectionHeroData = mysqli_fetch_assoc($sectionHero);
}else{
    $sectionHeroData = false;
}
if(isset($_POST['save_hero_section'])){
    $main_title = filter($_POST['main_title']);
    $main_image = $_POST['main_image'];
    if(mysqli_num_rows($sectionHero) > 0){
        $res = $db->db("UPDATE contact_page SET main_title='$main_title',main_image='$main_image' WHERE section_name='hero'");
        if($res){
            alert("Updated","Hero Section Updated Successfully","success");
        }
    }else{
        $res = $db->db("INSERT INTO contact_page (section_name,main_title,main_image)
                VALUES ('hero','$main_title','$main_image')");
        if($res){
            alert("Added","Hero Section Added Successfully","success");
        }
    }

}
$heroData = false;
$hero = $db->db("SELECT * FROM contact_page WHERE section_name = 'hero'");
if(mysqli_num_rows($hero) > 0){
    $heroData = mysqli_fetch_assoc($hero);
}

////saving and updating section two

if(isset($_POST['save_section_two'])){
    $left_title = filter($_POST['left_title']);
    $right_title = filter($_POST['right_title']);
    $left_description = filter($_POST['left_description']);
    $right_description = filter($_POST['right_description']);
    $checkOldDetails = $db->db("SELECT * FROM contact_page WHERE section_name ='section_two'");
    if(mysqli_num_rows($checkOldDetails) > 0){
        $query = $db->db("UPDATE contact_page SET main_title='$left_title',main_description='$left_description',title='$right_title',description='$right_description' WHERE section_name='section_two'");
        if($query){
            alert("Updated","Section Two Updated Successfully",'success');
        }
    }else{
        $query = $db->db("INSERT INTO contact_page (section_name,main_title,main_description,title,description) VALUES('section_two','$left_title','$left_description','$right_title','$right_description')");
        if($query){
            alert("Added","Section Two Added Successfully",'success');
        }
    }
}
$section_two_data = false;
$sectionTwo = $db->db("SELECT * FROM contact_page WHERE section_name = 'section_two'");
if(mysqli_num_rows($sectionTwo) > 0){
    $section_two_data = mysqli_fetch_assoc($sectionTwo);
}

/////saving and updating section three

if(isset($_POST['save_section_three'])){
    $main_title = filter($_POST['main_title']);
    $checkOldDetails = $db->db("SELECT * FROM contact_page WHERE section_name ='section_three'");
    if(mysqli_num_rows($checkOldDetails) > 0){
        $query = $db->db("UPDATE contact_page SET main_title='$main_title' WHERE section_name='section_three'");
        if($query){
            alert("Updated","Section Three Updated Successfully",'success');
        }
    }else{
        $query = $db->db("INSERT INTO contact_page (section_name,main_title) VALUES ('section_three','$main_title')");
        if($query){
            alert("Added","Section Three Added Successfully",'success');
        }
    }
}
$section_three_data = false;
$sectionThree = $db->db("SELECT * FROM contact_page WHERE section_name = 'section_three'");
if(mysqli_num_rows($sectionThree) > 0){
    $section_three_data = mysqli_fetch_assoc($sectionThree);
}

////saving and updating section Four

if(isset($_POST['save_section_four'])){
    $left_title = filter($_POST['left_title']);
    $right_title = filter($_POST['right_title']);
    $left_description = $_POST['left_description'];
    $right_description = $_POST['right_description'];
    $checkOldDetails = $db->db("SELECT * FROM contact_page WHERE section_name ='section_four'");
    if(mysqli_num_rows($checkOldDetails) > 0){
        $query = $db->db("UPDATE contact_page SET main_title='$left_title',main_description='$left_description',title='$right_title',description='$right_description' WHERE section_name='section_four'");
        if($query){
            alert("Updated","Section Four Updated Successfully",'success');
        }
    }else{
        $query = $db->db("INSERT INTO contact_page (section_name,main_title,main_description,title,description) VALUES('section_four','$left_title','$left_description','$right_title','$right_description')");
        if($query){
            alert("Added","Section Four Added Successfully",'success');
        }
    }
}
$section_four_data = false;
$sectionFour = $db->db("SELECT * FROM contact_page WHERE section_name = 'section_four'");
if(mysqli_num_rows($sectionFour) > 0){
    $section_four_data = mysqli_fetch_assoc($sectionFour);
}
 ?>
<div class="d-flex align-items-center mb-4 flex-wrap">
	<h4 class="fs-20 font-w600  me-auto">CMS Charging Station</h4>
</div>
<!-- Meta Details -->

<div class="row">
<div class="col-xl-12">
    <form method="post" enctype="multipart/form-data">
        <div class="card">
        <div class="bg-primary sec-head">
            <h4 class="text-white p-3 bg-primary d-inline-block">Meta Details</h4>
            <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                <input class="form-check-input" onchange="changeStatus('contact_page', <?php echo $meta_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $meta_data['status'] === '1' ? 'checked' : '' ?>>
                <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
            </div>
        </div>
            <div class="card-body">
                                <div class="row">
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Meta Title<span class="text-danger scale5 ms-2">*</span></label>
                        <input required type="text" class="form-control solid" name="main_title" placeholder="Meta Title" aria-label="name" 
                        <?php if($meta_data){?>
                            value="<?php echo $meta_data['main_title']?>" <?php }?>  
                        >
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Meta Description<span class="text-danger scale5 ms-2">*</span></label>
                        <textarea height="300px" id="editor6" required name="main_description" class="form-control solid"  aria-label="name">
                            <?php if($meta_data){ echo $meta_data['main_description'];}?>
                        </textarea>
                    </div>
                    <input type="hidden" name="save_meta">
                </div>
                
            </div>
            <div class="card-footer text-end">
                <div>
                    
                    <button class="btn btn-secondary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Hero Section -->
<div class="row">
    <div class="col-xl-12">
        <form method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="bg-primary sec-head">
                    <h4 class="text-white p-3 bg-primary d-inline-block">Hero Section</h4>
                    <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                        <input class="form-check-input" onchange="changeStatus('contact_page', <?php echo $heroData['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $heroData['status'] === '1' ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Title<span class="text-danger scale5 ms-2">*</span></label>
                            <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" 
                            <?php if($heroData){?>
                             value="<?php echo $heroData['main_title']?>" <?php }?>  
                            >
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Background Image Url<span class="text-danger scale5 ms-2">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                    </svg>
                                </span>
                                <input required type="text" name="main_image" class="form-control solid" aria-label="name" <?php if ($heroData) { ?> value="<?php echo $heroData['main_image'] ?>" <?php } ?>>
                            </div>
                        </div>
                        
                        <input type="hidden" name="save_hero_section">
                        <div class="col-xl-6  col-md-6 mb-4">
                            <?php if($heroData){?>
                                <img class="img-responsive img-thumbnail" src="<?php echo $heroData['main_image']?>" height="150" width="400">
                            <?php }else{?>  
                                <img src="cmsimages/default-cover.jfif">
                            <?php }?>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer text-end">
                    <div>
                        
                        <button class="btn btn-secondary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--------------- Section two--------------- -->
<div class="row">
    <div class="col-xl-12">
        <form method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="bg-primary sec-head">
                    <h4 class="text-white p-3 bg-primary d-inline-block">Section 2</h4>
                    <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                        <input class="form-check-input" onchange="changeStatus('contact_page', <?php echo $section_two_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_two_data['status'] === '1' ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Left Title<span class="text-danger scale5 ms-2">*</span></label>
                            <input required type="text" class="form-control solid" name="left_title" placeholder="Main Title" aria-label="name" 
                            <?php if($section_two_data){?>
                             value="<?php echo $section_two_data['main_title']?>" <?php }?>  
                            >
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Left Description<span class="text-danger scale5 ms-2">*</span></label>
                            <textarea id="editor1" required class="form-control solid" name="left_description" aria-label="name">
                                <?php if($section_two_data){ echo $section_two_data['main_description']; }?>
                            </textarea>
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Right Title<span class="text-danger scale5 ms-2">*</span></label>
                            <input required type="text" class="form-control solid" name="right_title" placeholder="Main Title" aria-label="name" 
                            <?php if($section_two_data){?>
                             value="<?php echo $section_two_data['title']?>" <?php }?>  
                            >
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Right Description<span class="text-danger scale5 ms-2">*</span></label>
                            <textarea id="editor2" required class="form-control solid" name="right_description" aria-label="name">
                            <?php if($section_two_data){ echo $section_two_data['description']; }?>
                            </textarea>
                        </div>
                    </div>
                    <input type="hidden" name="save_section_two">
                </div>
                <div class="card-footer text-end">
                    <div>
                        
                        <button class="btn btn-secondary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--------------- Section Three--------------- -->
<div class="row">
    <div class="col-xl-12">
        <form method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="bg-primary sec-head">
                    <h4 class="text-white p-3 bg-primary d-inline-block">Section 3</h4>
                    <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                        <input class="form-check-input" onchange="changeStatus('contact_page', <?php echo $section_three_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_three_data['status'] === '1' ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12  col-md-6 mb-4">
                            <label  class="form-label font-w600">Title<span class="text-danger scale5 ms-2">*</span></label>
                            <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" 
                            <?php if($section_three_data){?>
                             value="<?php echo $section_three_data['main_title']?>" <?php }?>  
                            >
                        </div>
                        
                    </div>
                    <input type="hidden" name="save_section_three">
                </div>
                <div class="card-footer text-end">
                    <div>
                        
                        <button class="btn btn-secondary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--------------- Section Four--------------- -->
<div class="row">
    <div class="col-xl-12">
        <form method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="bg-primary sec-head">
                    <h4 class="text-white p-3 bg-primary d-inline-block">Section 4</h4>
                    <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                        <input class="form-check-input" onchange="changeStatus('contact_page', <?php echo $section_four_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_four_data['status'] === '1' ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Left Title<span class="text-danger scale5 ms-2">*</span></label>
                            <input required type="text" class="form-control solid" name="left_title" placeholder="Main Title" aria-label="name" 
                            <?php if($section_four_data){?>
                             value="<?php echo $section_four_data['main_title']?>" <?php }?>  
                            >
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Left Description<span class="text-danger scale5 ms-2">*</span></label>
                            <textarea id="editor3" required class="form-control solid" name="left_description" aria-label="name">
                                <?php if($section_four_data){ echo $section_four_data['main_description']; }?>
                            </textarea>
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Right Title<span class="text-danger scale5 ms-2">*</span></label>
                            <input required type="text" class="form-control solid" name="right_title" placeholder="Main Title" aria-label="name" 
                            <?php if($section_four_data){?>
                             value="<?php echo $section_four_data['title']?>" <?php }?>  
                            >
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Right Description<span class="text-danger scale5 ms-2">*</span></label>
                            <textarea id="editor4" required class="form-control solid" name="right_description" aria-label="name">
                            <?php if($section_four_data){ echo $section_four_data['description']; }?>
                            </textarea>
                        </div>
                    </div>
                    <input type="hidden" name="save_section_four">
                </div>
                <div class="card-footer text-end">
                    <div>
                        
                        <button class="btn btn-secondary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include 'includes/footer.php' ?>
<script>
     ClassicEditor
    .create(document.querySelector('#editor1'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#editor2'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#editor3'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#editor4'))
    .catch(error => {
        console.error(error);
    });
    // ClassicEditor
    // .create(document.querySelector('#editor5'))
    // .catch(error => {
    //     console.error(error);
    // });
    ClassicEditor
    .create(document.querySelector('#editor6'))
    .catch(error => {
        console.error(error);
    });
</script>
            