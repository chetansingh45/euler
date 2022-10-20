<?php
include('php/helper/db.php');
include 'includes/header.php';
include 'php/helper/alert.php';

use DB\DB;

$db = new DB();

////////////saving and updating section meta

$section_meta = $db->db("SELECT * FROM hiload_page WHERE section_name = 'meta'");
if (isset($_POST['save_meta'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    if (mysqli_num_rows($section_meta) > 0) {
        $res = $db->db("UPDATE hiload_page SET main_title='$main_title',main_description='$main_description' WHERE section_name='meta'");
        if ($res) {
            alert("Updated", "Meta Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO hiload_page (section_name,main_title,main_description)
        VALUES ('meta','$main_title','$main_description')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Meta Added Successfully", "success");
        }
    }
}
$meta_data = false;
$meta = $db->db("SELECT * FROM hiload_page WHERE section_name = 'meta'");
if (mysqli_num_rows($meta) > 0) {
    $meta_data = mysqli_fetch_assoc($meta);
}

//////---------Saving And updating hero section--------------////////////////////////////////////////////////
$sectionHero = $db->db("SELECT * FROM hiload_page WHERE section_name = 'hero'");
if (mysqli_num_rows($sectionHero) > 0) {
    $sectionHeroData = mysqli_fetch_assoc($sectionHero);
} else {
    $sectionHeroData = false;
}
if (isset($_POST['save_hero_section'])) {
    $main_image_alt = filter($_POST['main_image_alt']);
    $main_image = $_POST['main_image'];


    // $main_image = $_FILES['main_image']['name'];
    // $main_image = rand(000000,99999999).$main_image;
    // $main_image_temp = $_FILES['main_image']['tmp_name'];
    // move_uploaded_file($main_image_temp,"cmsimages/".$main_image);

    $res = $db->db("INSERT INTO hiload_page (section_name,main_image,main_image_alt) VALUES ('hero','$main_image','$main_image_alt')");
    if ($res) {
        alert("Added", "Hero Section Added Successfully", "success");
    }
}

////////////saving and updating section two

$section_two = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_two' AND main_title IS NOT NULL");
$section_two_data = mysqli_fetch_assoc($section_two);
if (isset($_POST['save_section_two'])) {
    $main_title = filter($_POST['main_title']);
    $btn_link = filter($_POST['btn_link']);
    $btn_text = filter($_POST['btn_text']);
    $iframe = $_POST['iframe'];

    if (mysqli_num_rows($section_two) > 0) {
        $res = $db->db("UPDATE hiload_page SET main_title='$main_title',iframe='$iframe',btn_link='$btn_link',btn_text='$btn_text' WHERE section_name='section_two' AND main_title IS NOT NULL ");
        if ($res) {
            alert("Updated", "Section Two Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO hiload_page (section_name,main_title,iframe,btn_link,btn_text)
        VALUES ('section_two','$main_title','$iframe','$btn_link','$btn_text')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Section Two Added Successfully", "success");
        }
    }
}
$section_two_data = false;
$section_two = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_two' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_two) > 0) {
    $section_two_data = mysqli_fetch_assoc($section_two);
}

if (isset($_GET['section']) && isset($_GET['id'])) {
    $section = $_GET['section'];
    $id = $_GET['id'];
    if ($section == 'three') {
        $sql = "DELETE FROM hiload_page WHERE id='$id'";
        $query = $db->db($sql);
        if ($query) {
            redirect('cms-hiload.php.php');
        }
    }
}

///////save and update section three 

if (isset($_POST['save_section_three'])) {
    $main_title = filter($_POST['main_title']);
    $main_image_alt = filter($_POST['main_image_alt']);
    $main_image = $_POST['main_image'];

    $checkOldTitle = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_three' AND main_title IS NOT NULL");
    if (mysqli_num_rows($checkOldTitle) > 0) {

        // if(isNull($_FILES['main_image']['name'])){
        //     $main_image = $checkOldTitle['main_image'];
        // }else{
        //     $main_image = $_FILES['main_image']['name'];
        //     $main_image_temp = $_FILES['main_image']['tmp_name'];
        //     $main_image = rand(0000000,999999).$main_image;
        //     move_uploaded_file($main_image_temp,'cmsimages/'.$main_image);
        // }
        $sql = "UPDATE hiload_page SET main_title='$main_title',main_image='$main_image',main_image_alt='$main_image_alt' WHERE section_name='section_three' AND main_title IS NOT NULL";
        $query = $db->db($sql);
        if ($query) {
            echo alert("Updated", "Section Three Updated Successfully", "success");
        }
    } else {
        // $main_image_temp = $_FILES['main_image']['tmp_name'];
        // $main_image = $_FILES['main_image']['name'];
        // $main_image = rand(0000000,999999).$main_image;
        // move_uploaded_file($main_image_temp,'cmsimages/'.$main_image);
        $sql = "INSERT INTO hiload_page (section_name,main_title,main_image,main_image_alt) VALUES ('section_three','$main_title','$main_image','$main_image_alt')";
        $query = $db->db($sql);
        if ($query) {
            echo alert("Added", "Section Three Added Successfully", "success");
        }
    }
}
$section_three_data = false;
$section_three = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_three' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_three) > 0) {
    $section_three_data = mysqli_fetch_assoc($section_three);
}

if (isset($_POST['save_section_three_logo'])) {
    if (mysqli_num_rows($db->db("SELECT * FROM hiload_page WHERE main_title IS NULL AND section_name ='section_three'")) == 5) {
        alert("Limit Error", "You can only add up to 5 logos", "warning");
    } else {
        $title = filter($_POST['title']);
        $logo_alt = filter($_POST['logo_alt']);
        $description = filter($_POST['description']);
        $logo = $_POST['logo'];

        // $logo = $_FILES['logo']['name'];
        // $logo = rand(000000,999999).$logo;
        // $logo_tmp = $_FILES['logo']['tmp_name'];
        // move_uploaded_file($logo_tmp,"cmsimages/".$logo);
        $res = $db->db("INSERT INTO hiload_page (section_name,title,logo,logo_alt,description) VALUES ('section_three','$title','$logo','$logo_alt','$description')");
        if ($res) {
            alert("Added", "Logo Added Successfully", "success");
        }
    }
}


///////save and update section Four 

if (isset($_POST['save_section_four'])) {
    $main_title = filter($_POST['main_title']);
    $main_image_alt = $_POST['main_image_alt'];
    $main_image = $_POST['main_image'];

    $checkOldTitle = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_four' AND main_title IS NOT NULL");
    if (mysqli_num_rows($checkOldTitle) > 0) {
        // $checkOldTitle=mysqli_fetch_array($checkOldTitle);
        // if(isNull($_FILES['main_image']['name'])){
        //     $main_image = $checkOldTitle['main_image'];
        // }else{
        //     $main_image = $_FILES['main_image']['name'];
        //     $main_image_temp = $_FILES['main_image']['tmp_name'];
        //     $main_image = rand(000000,999999).$main_image;
        //     move_uploaded_file($main_image_temp,"cmsimages/".$main_image);
        // }
        $sql = "UPDATE hiload_page SET main_title='$main_title',main_image='$main_image',main_image_alt='$main_image_alt' WHERE section_name='section_four' AND main_title IS NOT NULL";
        $query = $db->db($sql);
        if ($query) {
            echo alert("Updated", "Section Four Updated Successfully", "success");
        }
    } else {
        // $main_image = $_FILES['main_image']['name'];
        // $main_image_temp = $_FILES['main_image']['tmp_name'];
        // $main_image = rand(000000,999999).$main_image;
        // move_uploaded_file($main_image_temp,"cmsimages/".$main_image);
        $sql = "INSERT INTO hiload_page (section_name,main_title,main_image,main_image_alt) VALUES ('section_four','$main_title','$main_image','$main_image_alt')";
        $query = $db->db($sql);
        if ($query) {
            echo alert("Added", "Section Four Added Successfully", "success");
        }
    }
}
$section_four_data = false;
$section_four = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_four' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_four) > 0) {
    $section_four_data = mysqli_fetch_assoc($section_four);
}

if (isset($_POST['save_section_four_logo'])) {
    if (mysqli_num_rows($db->db("SELECT * FROM hiload_page WHERE main_title IS NULL AND section_name ='section_four'")) == 3) {
        alert("Limit Error", "You can only add up to 3 logos", "warning");
    } else {
        $title = filter($_POST['title']);
        $logo_alt = filter($_POST['logo_alt']);
        $description = filter($_POST['description']);
        $logo = $_POST['logo'];

        // $logo = $_FILES['logo']['name'];
        // $logo = rand(000000,999999).$logo;
        // $logo_tmp = $_FILES['logo']['tmp_name'];
        // move_uploaded_file($logo_tmp,"cmsimages/".$logo);
        $res = $db->db("INSERT INTO hiload_page (section_name,title,logo,logo_alt,description) VALUES ('section_four','$title','$logo','$logo_alt','$description')");
        if ($res) {
            alert("Added", "Logo Added Successfully", "success");
        }
    }
}
////saving and updating saction five


if (isset($_POST['save_section_five'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    $main_image = $_POST['main_image'];
    $checkOldVideo = $db->db("SELECT * FROM hiload_page WHERE section_name='section_five'");
    if (mysqli_num_rows($checkOldVideo) > 0) {
        $main_image = $_POST['main_image'];
        $res = $db->db("UPDATE hiload_page SET main_image='$main_image',main_title='$main_title',main_description='$main_description' WHERE section_name='section_five'");
        if ($res) {
            alert('Updated', "Section Five Updated Successfully", 'success');
        }
    } else {
        $res = $db->db("INSERT INTO hiload_page (section_name,main_title,main_description,main_image) VALUES('section_five','$main_title','$main_description','$main_image')");
        if ($res) {
            alert('Added', 'Section Five Added Successfully', 'success');
        }
    }
}
$section_five_data = false;
$section_five = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_five' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_five) > 0) {
    $section_five_data = mysqli_fetch_assoc($section_five);
}


///////save and update section six 

if (isset($_POST['save_section_six'])) {
    $main_title = filter($_POST['main_title']);
    $main_image_alt = $_POST['main_image_alt'];
    $main_image = $_POST['main_image'];

    $checkOldTitle = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_six' AND main_title IS NOT NULL");
    if (mysqli_num_rows($checkOldTitle) > 0) {
        // $checkOldTitle=mysqli_fetch_array($checkOldTitle);
        // if(isNull($_FILES['main_image']['name'])){
        //     $main_image = $checkOldTitle['main_image'];
        // }else{
        //     $main_image = $_FILES['main_image']['name'];
        //     $main_image_temp = $_FILES['main_image']['tmp_name'];
        //     $main_image = rand(000000,999999).$main_image;
        //     move_uploaded_file($main_image_temp,"cmsimages/".$main_image);
        // }
        $sql = "UPDATE hiload_page SET main_title='$main_title',main_image='$main_image',main_image_alt='$main_image_alt' WHERE section_name='section_six' AND main_title IS NOT NULL";
        $query = $db->db($sql);
        if ($query) {
            echo alert("Updated", "Section Four Updated Successfully", "success");
        }
    } else {
        // $main_image = $_FILES['main_image']['name'];
        // $main_image_temp = $_FILES['main_image']['tmp_name'];
        // $main_image = rand(000000,999999).$main_image;
        // move_uploaded_file($main_image_temp,"cmsimages/".$main_image);
        $sql = "INSERT INTO hiload_page (section_name,main_title,main_image,main_image_alt) VALUES ('section_six','$main_title','$main_image','$main_image_alt')";
        $query = $db->db($sql);
        if ($query) {
            echo alert("Added", "Section Four Added Successfully", "success");
        }
    }
}
$section_six_data = false;
$section_six = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_six' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_six) > 0) {
    $section_six_data = mysqli_fetch_assoc($section_six);
}

if (isset($_POST['save_section_six_logo'])) {
    if (mysqli_num_rows($db->db("SELECT * FROM hiload_page WHERE main_title IS NULL AND section_name ='section_six'")) == 3) {
        alert("Limit Error", "You can only add up to 3 logos", "warning");
    } else {
        $title = filter($_POST['title']);
        $logo_alt = filter($_POST['logo_alt']);
        $description = filter($_POST['description']);
        $logo = $_POST['logo'];

        // $logo = $_FILES['logo']['name'];
        // $logo = rand(000000,999999).$logo;
        // $logo_tmp = $_FILES['logo']['tmp_name'];
        // move_uploaded_file($logo_tmp,"cmsimages/".$logo);
        $res = $db->db("INSERT INTO hiload_page (section_name,title,logo,logo_alt,description) VALUES ('section_six','$title','$logo','$logo_alt','$description')");
        if ($res) {
            alert("Added", "Logo Added Successfully", "success");
        }
    }
}

/**=================== 
 saving and updating section seven
=====================*/
if (isset($_POST['save_section_seven'])) {
    $main_title = filter($_POST['main_title']);

    $checkOldTitle = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_seven' AND main_title IS NOT NULL");
    if (mysqli_num_rows($checkOldTitle) > 0) {
        $checkOldTitle = mysqli_fetch_array($checkOldTitle);
        $main_image = $_POST['main_image'];
        $sql = "UPDATE hiload_page SET main_title='$main_title',main_image='$main_image' WHERE section_name='section_seven' AND main_title IS NOT NULL";
        $query = $db->db($sql);
        if ($query) {
            echo alert("Updated", "Section Seven Updated Successfully", "success");
        }
    } else {
        $main_image = $_POST['main_image'];
        $sql = "INSERT INTO hiload_page (section_name,main_title,main_image) 
                VALUES ('section_seven','$main_title','$main_image')";
        $query = $db->db($sql);
        if ($query) {
            echo alert("Added", "Section Seven Added Successfully", "success");
        }
    }
}
$section_seven_data = false;
$section_seven = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_seven' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_seven) > 0) {
    $section_seven_data = mysqli_fetch_assoc($section_seven);
}
if (isset($_POST['save_section_seven_logo'])) {
    if (mysqli_num_rows($db->db("SELECT * FROM hiload_page WHERE main_title IS NULL AND section_name ='section_seven'")) == 5) {
        alert("Limit Error", "You can only add up to 5 logos", "warning");
    } else {
        $title = filter($_POST['title']);
        $logo_alt = filter($_POST['logo_alt']);
        $description = filter($_POST['description']);
        $logo = $_POST['logo'];

        // $logo = $_FILES['logo']['name'];
        // $logo = rand(000000,999999).$logo;
        // $logo_tmp = $_FILES['logo']['tmp_name'];
        // move_uploaded_file($logo_tmp,"cmsimages/".$logo);
        $res = $db->db("INSERT INTO hiload_page (section_name,title,logo,logo_alt,description) VALUES ('section_seven','$title','$logo','$logo_alt','$description')");
        if ($res) {
            alert("Added", "Logo Added Successfully", "success");
        }
    }
}
///////save and update section Eight

if (isset($_POST['save_section_eight'])) {
    $main_title = filter($_POST['main_title']);
    $main_image_alt = $_POST['main_image_alt'];
    $main_image = $_POST['main_image'];

    $checkOldTitle = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_eight' AND main_title IS NOT NULL");
    if (mysqli_num_rows($checkOldTitle) > 0) {
        // $checkOldTitle=mysqli_fetch_array($checkOldTitle);
        // if(isNull($_FILES['main_image']['name'])){
        //     $main_image = $checkOldTitle['main_image'];
        // }else{
        //     $main_image = $_FILES['main_image']['name'];
        //     $main_image_temp = $_FILES['main_image']['tmp_name'];
        //     $main_image = rand(000000,999999).$main_image;
        //     move_uploaded_file($main_image_temp,"cmsimages/".$main_image);
        // }
        $sql = "UPDATE hiload_page SET main_title='$main_title',main_image='$main_image',main_image_alt='$main_image_alt' WHERE section_name='section_eight' AND main_title IS NOT NULL";
        $query = $db->db($sql);
        if ($query) {
            echo alert("Updated", "Section Four Updated Successfully", "success");
        }
    } else {
        // $main_image = $_FILES['main_image']['name'];
        // $main_image_temp = $_FILES['main_image']['tmp_name'];
        // $main_image = rand(000000,999999).$main_image;
        // move_uploaded_file($main_image_temp,"cmsimages/".$main_image);
        $sql = "INSERT INTO hiload_page (section_name,main_title,main_image,main_image_alt) VALUES ('section_eight','$main_title','$main_image','$main_image_alt')";
        $query = $db->db($sql);
        if ($query) {
            echo alert("Added", "Section Four Added Successfully", "success");
        }
    }
}
$section_eight_data = false;
$section_eight = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_eight' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_eight) > 0) {
    $section_eight_data = mysqli_fetch_assoc($section_eight);
}

if (isset($_POST['save_section_eight_logo'])) {
    if (mysqli_num_rows($db->db("SELECT * FROM hiload_page WHERE main_title IS NULL AND section_name ='section_eight'")) == 5) {
        alert("Limit Error", "You can only add up to 5 logos", "warning");
    } else {
        $title = filter($_POST['title']);
        $logo_alt = filter($_POST['logo_alt']);
        $description = filter($_POST['description']);
        $logo = $_POST['logo'];

        // $logo = $_FILES['logo']['name'];
        // $logo = rand(000000,999999).$logo;
        // $logo_tmp = $_FILES['logo']['tmp_name'];
        // move_uploaded_file($logo_tmp,"cmsimages/".$logo);
        $res = $db->db("INSERT INTO hiload_page (section_name,title,logo,logo_alt,description) VALUES ('section_eight','$title','$logo','$logo_alt','$description')");
        if ($res) {
            alert("Added", "Logo Added Successfully", "success");
        }
    }
}

////saving and updating saction Nine


if (isset($_POST['save_section_nine'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = $_POST['main_description'];
    $btn_text = filter($_POST['btn_text']);
    $btn_link = filter($_POST['btn_link']);
    $title = filter($_POST['title']);
    $main_image_alt = filter($_POST['main_image_alt']);
    $main_image = $_POST['main_image'];

    $checkOldImage = $db->db("SELECT * FROM hiload_page WHERE section_name='section_nine'");
    if (mysqli_num_rows($checkOldImage) > 0) {
        // if(isNull($_FILES['main_image']['name'])){
        //     $oldVideo = mysqli_fetch_array($checkOldImage);
        //     $main_image =  $oldVideo['main_image'];
        // }else{
        //     $main_image = $_FILES['main_image']['name'];
        //     $main_image = rand(000000,999999).$main_image;
        //     move_uploaded_file($_FILES['main_image']['tmp_name'],'cmsimages/'.$main_image);
        // }
        $res = $db->db("UPDATE hiload_page SET main_image='$main_image',main_title='$main_title',main_description='$main_description', title='$title',btn_text='$btn_text',btn_link='$btn_link',main_image_alt='$main_image_alt' WHERE section_name='section_nine'");
        if ($res) {
            alert('Updated', "Section Nine Updated Successfully", 'success');
        }
    } else {
        // $main_image = $_FILES['main_image']['name'];
        // $main_image = rand(000000,999999).$main_image;
        // move_uploaded_file($_FILES['main_image']['tmp_name'],'cmsimages/'.$main_image);
        $res = $db->db("INSERT INTO hiload_page (section_name,main_title,main_description,main_image,btn_link,btn_text,title,main_image_alt) VALUES('section_nine','$main_title','$main_description','$main_image','$btn_link','$btn_text','$title','$main_image_alt')");
        if ($res) {
            alert('Added', 'Section Nine Added Successfully', 'success');
        }
    }
}
$section_nine_data = false;
$section_nine = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_nine' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_nine) > 0) {
    $section_nine_data = mysqli_fetch_assoc($section_nine);
}

////saving and updating saction ten


if (isset($_POST['save_section_ten'])) {
    $main_title = filter($_POST['main_title']);
    // $main_description = filter($_POST['main_description']);
    $heading1 = filter($_POST['heading1']);
    $heading2 = filter($_POST['heading2']);

    $checkOldImage = $db->db("SELECT * FROM hiload_page WHERE section_name='section_ten'");
    if (mysqli_num_rows($checkOldImage) > 0) {

        $res = $db->db("UPDATE hiload_page SET heading1='$heading1',heading2='$heading2',main_title='$main_title' WHERE 
                        section_name='section_ten'");
        if ($res) {
            alert('Updated', "Section Ten Updated Successfully", 'success');
        }
    } else {
        $res = $db->db("INSERT INTO hiload_page (section_name,main_title,heading1,heading2) 
                                VALUES('section_ten','$main_title','$heading1','$heading2')");
        if ($res) {
            alert('Added', 'Section Ten Added Successfully', 'success');
        }
    }
}
$section_ten_data = false;
$section_ten = $db->db("SELECT * FROM hiload_page WHERE section_name = 'section_ten' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_ten) > 0) {
    $section_ten_data = mysqli_fetch_assoc($section_ten);
}

///////deleting specifacitation items

if (isset($_GET['action']) &&  isset($_GET['item_id'])) {
    if (isset($_GET['action']) == 'delete_spec_items') {
        $id = $_GET['item_id'];
        $res = $db->db("DELETE FROM hiload_spec_items WHERE id='$id'");
        if ($res) {
            redirect('cms-hiload.php');
        }
    }
}

/////add new feature to specifacitation

if (isset($_POST['add_new_feature'])) {
    $spec_id = $_POST['spec_id'];
    if (!isNull($spec_id)) {
        $col1 = $_POST['col1'];
        $col2 = $_POST['col2'];
        $col3 = $_POST['col3'];
        $res = $db->db("INSERT INTO hiload_spec_items (hiload_id,col1,col2,col3) VALUES ('$spec_id','$col1','$col2','$col3')");
        if ($res) {
            alert('Added Successfully', 'New Iteam Added Successfully', 'success');
        }
    }
}

/////comman delete for all sections

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = $db->db("DELETE FROM hiload_page WHERE id = '$id'");
    if ($res) {
        redirect('cms-hiload.php');
    }
}
?>
<div class="d-flex align-items-center mb-4 flex-wrap">
    <h4 class="fs-20 font-w600  me-auto">Hiload</h4>
</div>
<!-- Meta Details -->

<div class="row">
    <div class="col-xl-12">
        <form method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="bg-primary sec-head">
                    <h4 class="text-white p-3 bg-primary d-inline-block">Meta Details</h4>
                    <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                        <input class="form-check-input" onchange="changeStatus('hiload_page', <?php echo $meta_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $meta_data['status'] === '1' ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label class="form-label font-w600">Meta Title<span class="text-danger scale5 ms-2">*</span></label>
                            <input required type="text" class="form-control solid" name="main_title" placeholder="Meta Title" aria-label="name" <?php if ($meta_data) { ?> value="<?php echo $meta_data['main_title'] ?>" <?php } ?>>
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label class="form-label font-w600">Meta Description<span class="text-danger scale5 ms-2">*</span></label>
                            <textarea height="300px" id="editor6" required name="main_description" class="form-control solid" aria-label="name">
                            <?php if ($meta_data) {
                                echo $meta_data['main_description'];
                            } ?>
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
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Slider Image<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="main_image" class="form-control solid" aria-label="name" placeholder="Enter Image Url">
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Slider Image Alt<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_image_alt" placeholder="Slider Image Alt" aria-label="name" placeholder="Enter Image Alt Text">
                            </div>
                            <input type="hidden" name="save_hero_section">
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
    <div class="row">
        <?php
        $seectionThreeLines = $db->db("SELECT * FROM hiload_page WHERE main_title IS NULL AND section_name='hero'");
        while ($row = mysqli_fetch_assoc($seectionThreeLines)) {
        ?>
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="jobs2 text-center card-body">
                        <div class="text-center">
                            <span class="">
                                <img height="50px" widht="50px" src="<?php echo $row['main_image'] ?>">
                            </span>
                            <h4 class="fs-20 mb-0"></h4>
                            <span class="text-primary mb-3 d-block"></span>
                        </div>
                        <div class="mb-3">
                            <h6><?php echo $row['main_image_alt'] ?></h6>
                        </div>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-hiload.php?id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success light" data-bs-toggle="modal" data-bs-target="#hero_modal" onclick="edit_hero('<?php echo $row['main_image'] ?>','<?php echo $row['main_image_alt'] ?>',<?php echo $row['id'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                            </a>
                            <div class="form-check form-switch d-flex align-items-center mx-1">
                                <input class="form-check-input" onchange="changeStatus('hiload_page', <?php echo $row['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $row['status'] === '1' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!------------- Section Two --------- -->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 2</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('hiload_page', <?php echo $section_two_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_two_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_two_data) { ?> value="<?php echo $section_two_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Viedo Url<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="iframe" placeholder="Video Url" aria-label="name" <?php if ($section_two_data) { ?> value="<?php echo $section_two_data['iframe'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Button Link<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="btn_link" placeholder="Button Link" aria-label="name" <?php if ($section_two_data) { ?> value="<?php echo $section_two_data['btn_link'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Button Text<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="btn_text" placeholder="Button Text" aria-label="name" <?php if ($section_two_data) { ?> value="<?php echo $section_two_data['btn_text'] ?>" <?php } ?>>
                            </div>
                            <input type="hidden" name="save_section_two">
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


    <!--------------- Section Three ---------------->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 3</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('hiload_page', <?php echo $section_three_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_three_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_three_data) { ?> value="<?php echo $section_three_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Main Image Url<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" class="form-control solid" name="main_image" aria-label="name" placeholder="Enter Image Url" value="<?php echo $section_three_data ? $section_three_data['main_image'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Main Image Alt<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_image_alt" aria-label="name" placeholder="Main Image Alt" <?php if ($section_three_data) { ?> value="<?php echo $section_three_data['main_image_alt'] ?>" <?php } ?>>
                            </div>

                            <div class="col-xl-4  col-md-6 mb-4">
                                <?php if ($section_three_data) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $section_three_data['main_image'] ?>" height="150" width="400">
                                <?php } else { ?>
                                    <img src="cmsimages/default-cover.jfif">
                                <?php } ?>
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
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Url<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" class="form-control solid" name="logo" aria-label="name" placeholder="Enter Logo Url">
                                </div>
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="title" placeholder=" Title" aria-label="name">
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="description" placeholder="logo Description" aria-label="name">
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Alt Text<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="logo_alt" placeholder="logo alt" aria-label="name">
                            </div>

                        </div>
                        <input type="hidden" name="save_section_three_logo">
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
    <div class="row">
        <?php
        $seectionThreeLines = $db->db("SELECT * FROM hiload_page WHERE main_title IS NULL AND section_name='section_three'");
        while ($row = mysqli_fetch_assoc($seectionThreeLines)) {
        ?>
            <div class="col-md-2 col-sm-6">
                <div class="card">
                    <div class="jobs2 text-center card-body">
                        <div class="text-center">
                            <span class="">
                                <img height="50px" widht="50px" src="<?php echo $row['logo'] ?>">
                            </span>
                            <h4 class="fs-20 mb-0"></h4>
                            <span class="text-primary mb-3 d-block"></span>
                        </div>
                        <div class="mb-3">
                            <h6><?php echo $row['title'] ?></h6>
                            <p><?php echo $row['description'] ?>
                            <p>
                        </div>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-hiload.php.php?section=three&id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>

                            <a href="javascript:void(0);" class="btn btn-success light" data-bs-toggle="modal" data-bs-target="#edit_section_modal" onclick="edit_section('<?php echo $row['logo'] ?>','<?php echo $row['logo_alt'] ?>','<?php echo $row['title'] ?>','<?php echo $row['description'] ?>',<?php echo $row['id'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!--------------- Section Four ---------------->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 4</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('hiload_page', <?php echo $section_four_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_four_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_four_data) { ?> value="<?php echo $section_four_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Main Image<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" class="form-control solid" name="main_image" aria-label="name" placeholder="Enter Image Url" value="<?php echo $section_four_data ? $section_four_data['main_image'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Main Image Alt<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_image_alt" aria-label="name" placeholder="Main Image Alt" <?php if ($section_four_data) { ?> value="<?php echo $section_four_data['main_image_alt'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <?php if ($section_four_data) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $section_four_data['main_image'] ?>" height="150" width="400">
                                <?php } ?>
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
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Url<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" class="form-control solid" name="logo" aria-label="name" placeholder="Enter Logo Url">
                                </div>
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="title" placeholder=" Title" aria-label="name">
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="description" placeholder="logo Description" aria-label="name">
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Alt Text<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="logo_alt" placeholder="logo alt" aria-label="name">
                            </div>

                        </div>
                        <input type="hidden" name="save_section_four_logo">
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
    <div class="row">
        <?php
        $seectionThreeLines = $db->db("SELECT * FROM hiload_page WHERE main_title IS NULL AND section_name='section_four'");
        while ($row = mysqli_fetch_assoc($seectionThreeLines)) {
        ?>
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="jobs2 text-center card-body">
                        <div class="text-center">
                            <span class="">
                                <img height="50px" widht="50px" src="<?php echo $row['logo'] ?>">
                            </span>
                            <h4 class="fs-20 mb-0"></h4>
                            <span class="text-primary mb-3 d-block"></span>
                        </div>
                        <div class="mb-3">
                            <h6><?php echo $row['title'] ?></h6>
                            <p><?php echo $row['description'] ?>
                            <p>
                        </div>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-hiload.php.php?section=three&id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success light" data-bs-toggle="modal" data-bs-target="#edit_section_modal" onclick="edit_section('<?php echo $row['logo'] ?>','<?php echo $row['logo_alt'] ?>','<?php echo $row['title'] ?>','<?php echo $row['description'] ?>',<?php echo $row['id'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!--------------- Section Five ---------------->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 5</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('hiload_page', <?php echo $section_five_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_five_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_five_data) { ?> value="<?php echo $section_five_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea height="300px" id="editor1" required name="main_description" class="form-control solid" aria-label="name">
                                <?php if ($section_five_data) {
                                    echo $section_five_data['main_description'];
                                } ?>
                            </textarea>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Video<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_image" aria-label="name" <?php if ($section_five_data) { ?> value="<?php echo $section_five_data['main_image'] ?>" <?php } ?>>
                            </div>

                            <div class="col-xl-6  col-md-6 mb-4">
                                <?php if ($section_four_data) { ?>
                                    <video class="" width="100%" height="150" controls="">
                                        <source src="cmsimages/<?php echo $section_five_data['main_image'] ?>" type="video/mp4">
                                    </video>
                                <?php } ?>
                            </div>
                        </div>
                        <input type="hidden" name="save_section_five">
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

    <!--------------- Section Six ---------------->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 6</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('hiload_page', <?php echo $section_six_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_six_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_six_data) { ?> value="<?php echo $section_six_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Main Image<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" class="form-control solid" name="main_image" aria-label="name" placeholder="Enter Image Url" value="<?php echo $section_six_data ? $section_six_data['main_image'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Main Image Alt<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_image_alt" aria-label="name" placeholder="Main Image Alt" <?php if ($section_six_data) { ?> value="<?php echo $section_six_data['main_image_alt'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <?php if ($section_six_data) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $section_six_data['main_image'] ?>" height="150" width="400">
                                <?php } ?>
                            </div>
                        </div>
                        <input type="hidden" name="save_section_six">
                    </div>
                    <div class="card-footer text-end">
                        <div>

                            <button class="btn btn-secondary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" class="form-control solid" name="logo" aria-label="name" placeholder="Enter Logo Url">
                                </div>
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="title" placeholder=" Title" aria-label="name" value="">
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="description" placeholder="logo Description" aria-label="name" value="">
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Alt Text<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="logo_alt" placeholder="logo alt" aria-label="name" value="">
                            </div>

                        </div>
                        <input type="hidden" name="save_section_six_logo">
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
    <div class="row">
        <?php
        $seectionThreeLines = $db->db("SELECT * FROM hiload_page WHERE main_title IS NULL AND section_name='section_six'");
        while ($row = mysqli_fetch_assoc($seectionThreeLines)) {
        ?>
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="jobs2 text-center card-body">
                        <div class="text-center">
                            <span class="">
                                <img height="50px" widht="50px" src="<?php echo $row['logo'] ?>">
                            </span>
                            <h4 class="fs-20 mb-0"></h4>
                            <span class="text-primary mb-3 d-block"></span>
                        </div>
                        <div class="mb-3">
                            <h6><?php echo $row['title'] ?></h6>
                            <p><?php echo $row['description'] ?>
                            <p>
                        </div>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-hiload.php.php?section=three&id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success light" data-bs-toggle="modal" data-bs-target="#edit_section_modal" onclick="edit_section('<?php echo $row['logo'] ?>','<?php echo $row['logo_alt'] ?>','<?php echo $row['title'] ?>','<?php echo $row['description'] ?>',<?php echo $row['id'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!--------------- Section Seven ---------------->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 7</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('hiload_page', <?php echo $section_seven_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_seven_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_seven_data) { ?> value="<?php echo $section_seven_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Video<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_image" aria-label="name" value="<?php echo $section_seven_data['main_image'] ?>">
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <?php if ($section_seven_data) { ?>
                                    <video class="" width="100%" height="150" controls="">
                                        <source src="cmsimages/<?php echo $section_seven_data['main_image'] ?>" type="video/mp4">
                                    </video>
                                <?php } ?>
                            </div>
                        </div>
                        <input type="hidden" name="save_section_seven">
                    </div>
                    <div class="card-footer text-end">
                        <div>

                            <button class="btn btn-secondary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" class="form-control solid" name="logo" aria-label="name" placeholder="Enter Logo Url">
                                </div>
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="title" placeholder=" Title" aria-label="name" value="">
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="description" placeholder="logo Description" aria-label="name" value="">
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Alt Text<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="logo_alt" placeholder="logo alt" aria-label="name" value="">
                            </div>

                        </div>
                        <input type="hidden" name="save_section_seven_logo">
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
    <div class="row">
        <?php
        $seectionThreeLines = $db->db("SELECT * FROM hiload_page WHERE main_title IS NULL AND section_name='section_seven'");
        while ($row = mysqli_fetch_assoc($seectionThreeLines)) {
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="jobs2 text-center card-body">
                        <div class="text-center">
                            <span class="">
                                <img height="50px" widht="50px" src="<?php echo $row['logo'] ?>">
                            </span>
                            <h4 class="fs-20 mb-0"></h4>
                            <span class="text-primary mb-3 d-block"></span>
                        </div>
                        <div class="mb-3">
                            <h6><?php echo $row['title'] ?></h6>
                            <p><?php echo $row['description'] ?>
                            <p>
                        </div>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-hiload.php.php?section=three&id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success light" data-bs-toggle="modal" data-bs-target="#edit_section_modal" onclick="edit_section('<?php echo $row['logo'] ?>','<?php echo $row['logo_alt'] ?>','<?php echo $row['title'] ?>','<?php echo $row['description'] ?>',<?php echo $row['id'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!--------------- Section Eight ---------------->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 8</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('hiload_page', <?php echo $section_eight_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_eight_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_eight_data) { ?> value="<?php echo $section_eight_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Main Image<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" class="form-control solid" name="main_image" aria-label="name" placeholder="Enter Image Url" value="<?php echo $section_eight_data ? $section_eight_data['main_image'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Main Image Alt<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_image_alt" aria-label="name" placeholder="Main Image Alt" <?php if ($section_eight_data) { ?> value="<?php echo $section_eight_data['main_image_alt'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <?php if ($section_eight_data) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $section_eight_data['main_image'] ?>" height="150" width="400">
                                <?php } ?>
                            </div>
                        </div>
                        <input type="hidden" name="save_section_eight">
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <button class="btn btn-secondary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" class="form-control solid" name="logo" aria-label="name" placeholder="Enter Logo Url">
                                </div>
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="title" placeholder=" Title" aria-label="name" value="">
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="description" placeholder="logo Description" aria-label="name" value="">
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Alt Text<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="logo_alt" placeholder="logo alt" aria-label="name" value="">
                            </div>

                        </div>
                        <input type="hidden" name="save_section_eight_logo">
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
    <div class="row">
        <?php
        $seectionThreeLines = $db->db("SELECT * FROM hiload_page WHERE main_title IS NULL AND section_name='section_eight'");
        while ($row = mysqli_fetch_assoc($seectionThreeLines)) {
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="jobs2 text-center card-body">
                        <div class="text-center">
                            <span class="">
                                <img height="50px" widht="50px" src="<?php echo $row['logo'] ?>">
                            </span>
                            <h4 class="fs-20 mb-0"></h4>
                            <span class="text-primary mb-3 d-block"></span>
                        </div>
                        <div class="mb-3">
                            <h6><?php echo $row['title'] ?></h6>
                            <p><?php echo $row['description'] ?>
                            <p>
                        </div>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-hiload.php.php?section=three&id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success light" data-bs-toggle="modal" data-bs-target="#edit_section_modal" onclick="edit_section('<?php echo $row['logo'] ?>','<?php echo $row['logo_alt'] ?>','<?php echo $row['title'] ?>','<?php echo $row['description'] ?>',<?php echo $row['id'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!--------------- Section Nine ---------------->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 9</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('hiload_page', <?php echo $section_nine_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_nine_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_nine_data) { ?> value="<?php echo $section_nine_data['main_title'] ?>" <?php } ?>>
                            </div>

                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Image<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control solid" name="main_image" aria-label="name" placeholder="Enter Image Url" value="<?php echo $section_nine_data ? $section_nine_data['main_image'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Image Alt<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_image_alt" placeholder="main image alt" aria-label="name" <?php if ($section_nine_data) { ?> value="<?php echo $section_nine_data['main_image_alt'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Button Link<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="btn_link" placeholder="button link" aria-label="name" <?php if ($section_nine_data) { ?> value="<?php echo $section_nine_data['btn_link'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Button Text<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="btn_text" placeholder="button text" aria-label="name" <?php if ($section_nine_data) { ?> value="<?php echo $section_nine_data['btn_text'] ?>" <?php } ?>>
                            </div>

                            <div class="col-xl-3  col-md-6 mb-4">
                                <?php if ($section_nine_data) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $section_nine_data['main_image'] ?>" height="150" width="400">
                                <?php } ?>
                            </div>

                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Start Price<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="title" placeholder="title" aria-label="name" <?php if ($section_nine_data) { ?> value="<?php echo $section_nine_data['title'] ?>" <?php } ?>>
                            </div>

                            <div class="col-xl-3  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea height="300px" id="editor3" required name="main_description" class="form-control solid" aria-label="name">
                                <?php if ($section_nine_data) {
                                    echo $section_nine_data['main_description'];
                                } ?>
                            </textarea>
                            </div>
                        </div>
                        <input type="hidden" name="save_section_nine">
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
    <!--------------- Section Ten ---------------->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 10</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('hiload_page', <?php echo $section_ten_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_ten_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_ten_data) { ?> value="<?php echo $section_ten_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Heading 1<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="heading1" placeholder="heading 1" aria-label="name" <?php if ($section_ten_data) { ?> value="<?php echo $section_ten_data['heading1'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Heading 2<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="heading2" placeholder="heading 2" aria-label="name" <?php if ($section_ten_data) { ?> value="<?php echo $section_ten_data['heading2'] ?>" <?php } ?>>
                            </div>

                        </div>
                        <input type="hidden" name="save_section_ten">
                    </div>
                    <div class="card-footer text-end">
                        <div>

                            <button class="btn btn-secondary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['save_section_ten_spections'])) {
                $title = filter($_POST['title']);
                $col1 = $_POST['col1'];
                $col2 = $_POST['col2'];
                $col3 = $_POST['col3'];
                $col1Count = count($col1);
                $col2Count = count($col2);
                $col3Count = count($col3);
                $is_added = false;
                if ($col1Count == $col2Count && $col1Count == $col3Count) {
                    $res = $db->db("INSERT INTO hiload_page (section_name,title) VALUES ('section_ten','$title')");
                    $lastId = $db->last_id;
                    foreach ($col1 as $key => $val) {
                        $title1 = $col1[$key];
                        $title2 = $col2[$key];
                        $title3 = $col3[$key];
                        $res = $db->db("INSERT INTO hiload_spec_items (hiload_id,col1,col2,col3) VALUES ('$lastId','$title1','$title2','$title3')");
                        if ($res) {
                            $is_added = true;
                        }
                    }
                    if ($is_added) {
                        alert("Added", 'New Specifications Added', 'success');
                    }
                } else {
                    alert('Opps!', 'Someting Went wrong', 'warning');
                }
            }
            ?>

            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row spec_row">
                            <div class="col-xl-12  col-md-6 mb-4">
                                <label class="form-label font-w600">Specifications Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="title" placeholder="Main Title" aria-label="name">
                            </div>

                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Column 1<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="col1[]" placeholder="heading 1" aria-label="name">
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Column 2<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="col2[]" placeholder="heading 2" aria-label="name">
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Column 3<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="col3[]" placeholder="heading 2" aria-label="name">
                            </div>

                        </div>
                        <input type="hidden" name="save_section_ten_spections">
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <a href="javascript:void(0)" class="btn btn-primary add_row">Add Row</a>&nbsp;
                            <button class="btn btn-secondary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <table class="table table-hover text-center">
                            <tr>
                                <th>Specifications</th>
                                <th>HiLoad DV</th>
                                <th>HiLoad PV</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $query = $db->db("SELECT * FROM hiload_page WHERE section_name='section_ten' AND main_title IS NULL AND title IS NOT NULL");
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr class="alert alert-primary">
                                    <td colspan="3">
                                        <h4><?= $row['title'] ?></h4><br /><small>Use "1" in the column section if you want to add the check(<i class="fa fa-check text-primary" aria-hidden="true"></i>) icon inside the specifications list </small>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary" onclick="loadModel(<?php echo $row['id'] ?>)"><i class="fa fa-plus"></i></a>
                                        <a href="cms-hiload.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="deletetestride(1)"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $selectSpecs = $db->db("SELECT * FROM hiload_spec_items WHERE hiload_id='{$row['id']}'");
                                while ($r = mysqli_fetch_assoc($selectSpecs)) {
                                ?>
                                    <tr>
                                        <td><?php echo $r['col1']; ?></td>
                                        <td><?php echo $r['col2']; ?></td>
                                        <td><?php if ($r['col3'] != '0') {
                                                echo  $r['col3'];
                                            } ?></td>
                                        <td><a href="cms-hiload.php?action=delete_spec_items&item_id=<?php echo $r['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="deletetestride(1)"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dealershipModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New Feature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username" id="username" class="col-sm-2 control-label">Column 1</label>
                            <input type="text" required name="col1" class="form-control" placeholder="Column 1">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Column 2</label>
                            <input type="text" name="col2" class="form-control" placeholder="Column 2">
                        </div>
                        <div class="form-group">
                            <label for="Password" class="col-sm-2 control-label">Column 3</label>
                            <input type="text" name="col3" class="form-control" placeholder="Column 3">
                        </div>
                        <input type="hidden" id="spec_id" name="spec_id">
                        <input type="hidden" name="add_new_feature">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modals -->
    <!-- Edit Hero Model -->

    <div class="modal fade" id="hero_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Hero Image</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="label">Image Url</label>
                            <div class="input-group">
                                <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                    </svg>
                                </span>
                                <input required type="text" name="main_image" class="form-control solid demo_test" id="hero_image_url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Image Alt</label>
                            <input type="text" class="form-control" id="hero_image_alt">
                        </div>
                        <input type="hidden" id="hero_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update_hero_section">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Icons Model -->

    <div class="modal fade" id="edit_section_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="label">Image Url</label>
                            <div class="input-group">
                                <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                    </svg>
                                </span>
                                <input required type="text" class="form-control solid demo_test" id="edit_logo_url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Image Alt</label>
                            <input type="text" class="form-control" id="edit_image_alt">
                        </div>
                        <div class="form-group">
                            <label class="label">Title</label>
                            <input type="text" class="form-control" id="edit_image_title">
                        </div>
                        <div class="form-group">
                            <label class="label">Description</label>
                            <input type="text" class="form-control" id="edit_image_desc">
                        </div>
                        <input type="hidden" id="edit_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update_edit_section">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
    <script>
        function edit_section(image, alt, title, description, id) {
            $("#edit_logo_url").val(image)
            $("#edit_image_alt").val(alt)
            $("#edit_image_title").val(title)
            $("#edit_image_desc").val(description)
            $("#edit_id").val(id)
        }

        $(".update_edit_section").click(function() {
            let logo = $("#edit_logo_url").val()
            let logo_alt = $("#edit_image_alt").val()
            let title = $("#edit_image_title").val()
            let description = $("#edit_image_desc").val()
            let id = $("#edit_id").val()
            $.post("ajax-request.php", {
                    id: id,
                    logo_alt: logo_alt,
                    title: title,
                    logo: logo,
                    description: description,
                    page: 'cms-hiload',
                    action: 'update-section'
                },
                function(data) {
                    console.log(data);
                    if (data == 1) {
                        $(".close").click();
                        location.reload();
                    }
                })
        })

        function edit_hero(image, alt, id) {
            $("#hero_id").val(id)
            $("#hero_image_alt").val(alt)
            $("#hero_image_url").val(image)
        }

        $(".update_hero_section").click(function() {
            let id = $("#hero_id").val();
            let image_alt = $("#hero_image_alt").val();
            let image = $("#hero_image_url").val();
            $.post("ajax-request.php", {
                    id: id,
                    image_alt: image_alt,
                    image: image,
                    page: 'cms-hiload',
                    action: 'update-hero'
                },
                function(data) {
                    console.log(data);
                    if (data == 1) {
                        $(".close").click();
                        location.reload();
                    }
                })
        })

        function loadModel(id) {
            $("#spec_id").val(id);
            $('#dealershipModal').modal('show');
        }

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
            .create(document.querySelector('#editor6'))
            .catch(error => {
                console.error(error);
            });

        $(".add_row").click(function() {
            let row = `<div class="col-xl-4  col-md-6 mb-4">
                            <label  class="form-label font-w600">Column 1<span class="text-danger scale5 ms-2">*</span></label>
                            <input  type="text" class="form-control solid" name="col1[]" placeholder="heading 1" aria-label="name">
                        </div>
                        <div class="col-xl-4  col-md-6 mb-4">
                            <label  class="form-label font-w600">Column 2<span class="text-danger scale5 ms-2">*</span></label>
                            <input  type="text" class="form-control solid" name="col2[]" placeholder="heading 2" aria-label="name">
                        </div>
                        <div class="col-xl-4  col-md-6 mb-4">
                            <label  class="form-label font-w600">Column 3<span class="text-danger scale5 ms-2">*</span></label>
                            <input  type="text" class="form-control solid" name="col3[]" placeholder="heading 2" aria-label="name">
                        </div>`;
            $(".spec_row").append(row);
        });
    </script>