<?php
include('php/helper/db.php');
include 'includes/header.php';
include 'php/helper/alert.php';

use DB\DB;

$db = new DB();

if (isset($_POST['save_section_four_linesa'])) {
    $year = $_POST['year'];
    $footer_title = $_POST['footer_title'];
    $description = $_POST['description'];
    $logo = $_POST['logo'];

    // $logo = $_FILES['logo']['name'];
    // print_r($logo);
    $footer_title_count = count($footer_title);
    $description_count = count($description);
    $logo_count = count($logo);
    if ($logo_count == $footer_title_count && $logo_count == $description_count) {
        $addTitle = $db->db("INSERT INTO about_page (section_name,title) VALUES ('section_four','$year')");
        $yearId = $db->last_id;
        $added  = false;
        foreach ($logo as $key => $value) {
            $title = $footer_title[$key];
            $description_temp = $description[$key];
            $image = $value;

            // $image_temp = $_FILES['logo']['tmp_name'][$key];
            // $image = rand(00000,99999).$image;
            // move_uploaded_file($image_temp,'cmsimages/'.$image);
            $query = $db->db("INSERT INTO about_page_items (title,description,logo,year_id) VALUES ('$title','$description_temp','$image','$yearId')");
            if ($query) {
                $added = true;
            }
        }
        if ($added) {
            alert("Added", 'Added Successfully', 'success');
        }
    } else {
        alert('Error', 'Something Went wrong', 'warning');
    }
}


////////////saving and updating section meta

$section_meta = $db->db("SELECT * FROM about_page WHERE section_name = 'meta'");
if (isset($_POST['save_meta'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    if (mysqli_num_rows($section_meta) > 0) {
        $res = $db->db("UPDATE about_page SET main_title='$main_title',main_description='$main_description' WHERE section_name='meta'");
        if ($res) {
            alert("Updated", "Meta Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO about_page (section_name,main_title,main_description)
        VALUES ('meta','$main_title','$main_description')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Meta Added Successfully", "success");
        }
    }
}
$meta_data = false;
$meta = $db->db("SELECT * FROM about_page WHERE section_name = 'meta'");
if (mysqli_num_rows($meta) > 0) {
    $meta_data = mysqli_fetch_assoc($meta);
}

//////---------Saving And updating hero section--------------////////////////////////////////////////////////
$sectionHero = $db->db("SELECT * FROM about_page WHERE section_name = 'hero'");
if (mysqli_num_rows($sectionHero) > 0) {
    $sectionHeroData = mysqli_fetch_assoc($sectionHero);
} else {
    $sectionHeroData = false;
}
if (isset($_POST['save_hero_section'])) {
    $title = filter($_POST['title']);
    $main_title = filter($_POST['main_title']);
    $main_image = $_POST['main_image'];

    // if(isNull($_FILES['main_image']['name'])){
    //     if($sectionHeroData){
    //         $main_image = $sectionHeroData['main_image'];
    //     }else{
    //         $main_image = "default-cover.jfif";
    //     }
    // }else{
    //     $main_image = $_FILES['main_image']['name'];
    //     $main_image = rand(00000,999999).$main_image;
    //     $main_image_temp = $_FILES['main_image']['tmp_name'];
    //     move_uploaded_file($main_image_temp,"cmsimages/".$main_image);
    // }

    if (mysqli_num_rows($sectionHero) > 0) {
        $res = $db->db("UPDATE about_page SET title='$title',main_title='$main_title',main_image='$main_image' WHERE section_name='hero'");
        if ($res) {
            alert("Updated", "Hero Section Updated Successfully", "success");
        }
    } else {
        $res = $db->db("INSERT INTO about_page (section_name,main_title,title,main_image)
                VALUES ('hero','$main_title','$title','$main_image')");
        if ($res) {
            alert("Added", "Hero Section Added Successfully", "success");
        }
    }
}
$heroData = false;
$hero = $db->db("SELECT * FROM about_page WHERE section_name = 'hero'");
if (mysqli_num_rows($hero) > 0) {
    $heroData = mysqli_fetch_assoc($hero);
}

////////////saving and updating section two

$section_two = $db->db("SELECT * FROM about_page WHERE section_name = 'section_two' AND main_title IS NOT NULL");
$section_two_data = mysqli_fetch_assoc($section_two);
if (isset($_POST['save_section_two'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = $_POST['main_description'];
    if (mysqli_num_rows($section_two) > 0) {
        $res = $db->db("UPDATE about_page SET main_title='$main_title',main_description='$main_description' WHERE section_name='section_two' AND main_title IS NOT NULL ");
        if ($res) {
            alert("Updated", "Section Two Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO about_page (section_name,main_title,main_description)
        VALUES ('section_two','$main_title','$main_description')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Section Two Added Successfully", "success");
        }
    }
}
$section_two_data = false;
$section_two = $db->db("SELECT * FROM about_page WHERE section_name = 'section_two' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_two) > 0) {
    $section_two_data = mysqli_fetch_assoc($section_two);
}

if (isset($_POST['save_section_two_lines'])) {
    $title = filter($_POST['title']);
    $logo_alt = filter($_POST['logo_alt']);
    $logo = $_POST['logo'];

    // $logo = $_FILES['logo']['name'];
    // $logo = rand(00000,999999).$logo;
    // $logo_temp = $_FILES['logo']['tmp_name'];
    // move_uploaded_file($logo_temp,"cmsimages/".$logo);
    $sql = "INSERT INTO about_page (section_name,title,logo,logo_alt) VALUES ('section_two','$title','$logo','$logo_alt')";
    $query = $db->db($sql);
    if ($query) {
        alert("Added", "New title added", "success");
    }
}
if (isset($_GET['section']) && isset($_GET['id'])) {
    $section = $_GET['section'];
    $id = $_GET['id'];
    if ($section == 'three') {
        $sql = "DELETE FROM about_page WHERE id='$id'";
        $query = $db->db($sql);
        if ($query) {
            redirect('cms-about-us.php');
            // alert("Deleted","Section three logo deleted",'success');
        }
    }
}


//////////////section four////////////////////////////////////////////////
if (isset($_POST['save_section_four'])) {
    $section_four = $db->db("SELECT * FROM about_page WHERE section_name = 'section_four' AND main_title IS NOT NULL");
    $section_four_data = mysqli_fetch_assoc($section_four);
    $main_title = filter($_POST['main_title']);

    if (mysqli_num_rows($section_four) > 0) {
        $res = $db->db("UPDATE about_page SET main_title='$main_title' WHERE section_name='section_four' AND main_title IS NOT NULL ");
        if ($res) {
            alert("Updated", "Section Four Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO about_page (section_name,main_title)
        VALUES ('section_four','$main_title')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Section Four Added Successfully", "success");
        }
    }
}
$section_four_data = false;
$section_four = $db->db("SELECT * FROM about_page WHERE section_name = 'section_four' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_four) > 0) {
    $section_four_data = mysqli_fetch_assoc($section_four);
}


if (isset($_GET['section']) && isset($_GET['id'])) {
    $section = $_GET['section'];
    $id = $_GET['id'];
    if ($section == 'three') {
        $sql = "DELETE FROM charging_station_page WHERE id='$id'";
        $query = $db->db($sql);
        if ($query) {
            redirect('cms-about-us.php');
        }
    }
}
//////////////section five////////////////////////////////////////////////
if (isset($_POST['save_section_five'])) {
    $section_five = $db->db("SELECT * FROM about_page WHERE section_name = 'section_five' AND main_title IS NOT NULL");
    $section_five_data = mysqli_fetch_assoc($section_five);
    $main_title = filter($_POST['main_title']);

    if (mysqli_num_rows($section_five) > 0) {
        $res = $db->db("UPDATE about_page SET main_title='$main_title' WHERE section_name='section_five' AND main_title IS NOT NULL ");
        if ($res) {
            alert("Updated", "Section Five Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO about_page (section_name,main_title)
        VALUES ('section_five','$main_title')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Section Five Added Successfully", "success");
        }
    }
}
$section_five_data = false;
$section_five = $db->db("SELECT * FROM about_page WHERE section_name = 'section_five' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_five) > 0) {
    $section_five_data = mysqli_fetch_assoc($section_five);
}

if (isset($_POST['save_section_five_lines'])) {
    $title = filter($_POST['title']);
    $logo_alt = filter($_POST['logo_alt']);
    $logo = $_POST['logo'];

    // $logo = $_FILES['logo']['name'];
    // $logo = rand(00000,99999).$logo;
    // $logo_temp = $_FILES['logo']['tmp_name'];
    // move_uploaded_file($logo_temp,"cmsimages/".$logo);
    $sql = "INSERT INTO about_page (section_name,title,logo,logo_alt) VALUES ('section_five','$title','$logo','$logo_alt')";
    $query = $db->db($sql);
    if ($query) {
        alert("Added", "New title added", "success");
    }
}
if (isset($_GET['section']) && isset($_GET['id'])) {
    $section = $_GET['section'];
    $id = $_GET['id'];
    if ($section == 'three') {
        $sql = "DELETE FROM about_page WHERE id='$id'";
        $query = $db->db($sql);
        if ($query) {
            redirect('cms-about-us.php');
        }
    }
}

//////////////section Six////////////////////////////////////////////////
if (isset($_POST['save_section_six'])) {
    $section_six = $db->db("SELECT * FROM about_page WHERE section_name = 'section_six' AND main_title IS NOT NULL");
    $section_six_data = mysqli_fetch_assoc($section_six);
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    if (mysqli_num_rows($section_six) > 0) {
        $res = $db->db("UPDATE about_page SET main_title='$main_title',main_description='$main_description' WHERE section_name='section_six' AND main_title IS NOT NULL ");
        if ($res) {
            alert("Updated", "Section Six Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO about_page (section_name,main_title,main_description)
        VALUES ('section_six','$main_title','$main_description')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Section Six Added Successfully", "success");
        }
    }
}
$section_six_data = false;
$section_six = $db->db("SELECT * FROM about_page WHERE section_name = 'section_six' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_six) > 0) {
    $section_six_data = mysqli_fetch_assoc($section_six);
}

if (isset($_POST['save_section_six_lines'])) {
    $logo_alt = filter($_POST['logo_alt']);
    $logo = $_POST['logo'];

    // $logo = $_FILES['logo']['name'];
    // $logo = rand(00000,99999).$logo;
    // $logo_temp = $_FILES['logo']['tmp_name'];
    // move_uploaded_file($logo_temp,"cmsimages/".$logo);
    $sql = "INSERT INTO about_page (section_name,logo,logo_alt) VALUES ('section_six','$logo','$logo_alt')";
    $query = $db->db($sql);
    if ($query) {
        alert("Added", "New title added", "success");
    }
}

//////////////section Seven////////////////////////////////////////////////
if (isset($_POST['save_section_seven'])) {
    $section_seven = $db->db("SELECT * FROM about_page WHERE section_name = 'section_seven' AND main_title IS NOT NULL");
    $section_seven_data = mysqli_fetch_assoc($section_six);
    $main_title = filter($_POST['main_title']);
    $btn_text = filter($_POST['btn_text']);
    $btn_link = filter($_POST['btn_link']);
    if (mysqli_num_rows($section_seven) > 0) {
        $res = $db->db("UPDATE about_page SET main_title='$main_title',btn_link='$btn_link',btn_text='$btn_text' WHERE section_name='section_seven' AND main_title IS NOT NULL ");
        if ($res) {
            alert("Updated", "Section Seven Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO about_page (section_name,main_title,btn_link,btn_text)
        VALUES ('section_seven','$main_title','$btn_link','$btn_text')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Section Seven Added Successfully", "success");
        }
    }
}
$section_seven_data = false;
$section_seven = $db->db("SELECT * FROM about_page WHERE section_name = 'section_seven' AND main_title IS NOT NULL");
if (mysqli_num_rows($section_seven) > 0) {
    $section_seven_data = mysqli_fetch_assoc($section_seven);
}
?>
<div class="d-flex align-items-center mb-4 flex-wrap">
    <h4 class="fs-20 font-w600  me-auto">About-Us</h4>
</div>
<!-- Meta Details -->

<div class="row">
    <div class="col-xl-12">
        <!-- <h4 class="mt-4 text-white p-3 bg-primary sec-head">Meta Details</h4> -->
        <form method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="bg-primary sec-head">
                    <h4 class="text-white p-3 bg-primary d-inline-block">Meta Details</h4>
                    <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                        <input class="form-check-input" onchange="changeStatus('about_page', <?php echo $meta_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $meta_data['status'] === '1' ? 'checked' : '' ?>>
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
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('about_page', <?php echo $heroData['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $heroData['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Sub Ttile<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="title" placeholder="Sub Title" aria-label="name" <?php if ($heroData) { ?> value="<?php echo $heroData['title'] ?>" <?php } ?>>
                            </div>

                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($heroData) { ?> value="<?php echo $heroData['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Background Image<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" name="main_image" class="form-control solid" aria-label="name" placeholder="Enter Image Url" value="<?php echo $heroData ? $heroData['main_image'] : '' ?>">
                                </div>
                            </div>
                            <input type="hidden" name="save_hero_section">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <?php if ($heroData) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $heroData['main_image'] ?>" height="150" width="400">
                                <?php } else { ?>
                                    <img src="cmsimages/default-cover.jfif">
                                <?php } ?>
                            </div>

                            <!-- <div class="col-xl-12 mb-4">
                                <label  class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea class="form-control solid" aria-label="With textarea"></textarea>
                        </div> -->
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
                            <input class="form-check-input" onchange="changeStatus('about_page', <?php echo $section_two_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_two_data['status'] === '1' ? 'checked' : '' ?>>
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
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea height="300px" id="editor1" name="main_description" class="form-control solid" aria-label="With textarea">
                                <?php if ($section_two_data) {
                                    echo $section_two_data['main_description'];
                                } ?>
                            </textarea>
                            </div>
                            <input type="hidden" name="save_section_two">
                            <!-- <div class="col-xl-12 mb-4">
                                <label  class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea class="form-control solid" aria-label="With textarea"></textarea>
                        </div> -->
                        </div>

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
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="title" placeholder="Main Title" aria-label="name">
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">logo<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" name="logo" class="form-control solid" aria-label="name" placeholder="Enter Logo Url">
                                </div>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Alt Text<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" name="logo_alt" class="form-control solid" aria-label="name" placeholder="Enter Logo Alt Text">
                            </div>
                            <input type="hidden" name="save_section_two_lines">
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
        $seectionThreeLines = $db->db("SELECT * FROM about_page WHERE main_title IS NULL AND section_name='section_two'");
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
                        </div>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-about-us.php?section=three&id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success light" data-bs-toggle="modal" data-bs-target="#edit_section" onclick="edit_section('<?php echo $row['logo'] ?>','<?php echo $row['title'] ?>',<?php echo $row['id'] ?>)">
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

    <!------------- Section Four --------- -->

    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 4</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('about_page', <?php echo $section_four_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_four_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_four_data) { ?> value="<?php echo $section_four_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <input type="hidden" name="save_section_four">
                        </div>

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
                        <div class="row add_years">
                            <div class="col-xl-12  col-md-6 mb-4">
                                <label class="form-label font-w600">Year<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="year" placeholder="Add Year" aria-label="name">
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="footer_title[]" placeholder="Title" aria-label="name">
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="description[]" placeholder="Description" aria-label="name">
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">logo<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" name="logo[]" class="form-control solid" aria-label="name" placeholder="Enter Logo Url">
                                </div>

                            </div>

                        </div>
                        <input type="hidden" name="save_section_four_linesa">
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <a href="javascript:void(0);" class="btn btn-primary me-3 add_more">Add More</a>

                            <button class="btn btn-secondary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <?php
        $seectionThreeLines = $db->db("SELECT * FROM about_page WHERE main_title IS NULL AND section_name='section_four'");
        while ($row = mysqli_fetch_assoc($seectionThreeLines)) {
        ?>
            <div class="col-md-6 col-sm-6">
                <div class="card">
                    <div class="jobs2 text-center card-body">
                        <div class="mb-3 mt-3">
                            <h3><?php echo $row['title'] ?></h3>
                        </div>
                        <?php
                        $selectItems = $db->db("SELECT * FROM about_page_items WHERE year_id='{$row['id']}'");
                        while ($items = mysqli_fetch_assoc($selectItems)) {
                        ?>

                            <div class="text-center">
                                <span class="">
                                    <img height="50px" widht="50px" src="<?php echo $items['logo'] ?>">
                                </span>
                                <h4 class="fs-20 mb-0"></h4>
                                <span class="text-primary mb-3 d-block"></span>
                            </div>
                            <div class="mb-3 mt-3">
                                <h6><?php echo $items['title'] ?></h6>
                            </div>
                            <div class="mb-3 mt-3">
                                <p><?php echo $items['description'] ?></p>
                            </div>
                            <div class="action-buttons d-flex justify-content-center">
                                <a href="javascript:void(0);" class="btn btn-success light" data-bs-toggle="modal" data-bs-target="#edit_year_modal" onclick="edit_year('<?php echo $items['logo'] ?>','<?php echo $items['title'] ?>','<?php echo $items['description'] ?>',<?php echo $items['id'] ?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <div class="action-buttons d-flex justify-content-center">
                                <a href="javascript:void(0);" class="btn btn-danger light" onclick="delete_year(<?php echo $items['id'] ?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <hr>
                        <?php } ?>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-about-us.php?section=three&id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


    <!------------- Section Five --------- -->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 5</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('about_page', <?php echo $section_five_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_five_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_five_data) { ?> value="<?php echo $section_five_data['main_title'] ?>" <?php } ?>>
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
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="title" placeholder="Logo Title" aria-label="name">
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">logo<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" name="logo" class="form-control solid" aria-label="name" placeholder="Enter Logo Url">
                                </div>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Logo Alt Text<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" name="logo_alt" class="form-control solid" aria-label="name" placeholder="Enter Logo Alt Text">
                            </div>
                            <input type="hidden" name="save_section_five_lines">
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
        $seectionThreeLines = $db->db("SELECT * FROM about_page WHERE main_title IS NULL AND section_name='section_five'");
        while ($row = mysqli_fetch_assoc($seectionThreeLines)) {
        ?>
            <div class="col-md-2 col-sm-4">
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
                        </div>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-about-us.php?section=three&id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success light" data-bs-toggle="modal" data-bs-target="#edit_section" onclick="edit_section('<?php echo $row['logo'] ?>','<?php echo $row['title'] ?>',<?php echo $row['id'] ?>)">
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


    <!------------- Section Six --------- -->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 6</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('about_page', <?php echo $section_six_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_six_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_six_data) { ?> value="<?php echo $section_six_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Description<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_description" placeholder="Main Title" aria-label="name" <?php if ($section_six_data) { ?> value="<?php echo $section_six_data['main_description'] ?>" <?php } ?>>
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
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Image Url<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" name="logo" class="form-control solid" aria-label="name" placeholder="Enter Image Url">
                                </div>

                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Image Alt Text<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" name="logo_alt" class="form-control solid" aria-label="name" placeholder="Enter Image Alt Text">
                            </div>
                            <input type="hidden" name="save_section_six_lines">
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
        $seectionThreeLines = $db->db("SELECT * FROM about_page WHERE main_title IS NULL AND section_name='section_six'");
        while ($row = mysqli_fetch_assoc($seectionThreeLines)) {
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="jobs2 text-center card-body">
                        <div class="text-center">
                            <span class="">
                                <img height="100px" widht="100px" src="<?php echo $row['logo'] ?>">
                            </span>
                            <h4 class="fs-20 mb-0"></h4>
                            <span class="text-primary mb-3 d-block"></span>
                        </div>
                        <div class="mb-3">
                            <h6><?php echo $row['logo_alt'] ?></h6>
                        </div>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-about-us.php?section=three&id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success light" data-bs-toggle="modal" data-bs-target="#team_modal" onclick="edit_team('<?php echo $row['logo'] ?>','<?php echo $row['logo_alt'] ?>',<?php echo $row['id'] ?>)">
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
    <!-- Section Seven -->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 7</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('about_page', <?php echo $section_seven_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_seven_data['status'] === '1' ? 'checked' : '' ?>>
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
                                <label class="form-label font-w600">Button Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="btn_text" placeholder="Button Name" aria-label="name" <?php if ($section_seven_data) { ?> value="<?php echo $section_seven_data['btn_text'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Button Link<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="btn_link" placeholder="Button Link" aria-label="name" <?php if ($section_seven_data) { ?> value="<?php echo $section_seven_data['btn_link'] ?>" <?php } ?>>
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
        </div>
    </div>
    <!-- Modals -->
    <!-- Section Four  Model -->

    <div class="modal fade" id="edit_year_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="label">Logo Url</label>
                            <div class="input-group">
                                <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                    </svg>
                                </span>
                                <input required type="text" class="form-control solid demo_test" id="year_logo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Title</label>
                            <input type="text" class="form-control" id="year_title">
                        </div>
                        <div class="form-group">
                            <label class="label">Description</label>
                            <input type="text" class="form-control" id="year_desc">
                        </div>
                        <input type="hidden" id="year_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update_year">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit section model -->

    <div class="modal fade" id="edit_section" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="label">Logo Url</label>
                            <div class="input-group">
                                <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                    </svg>
                                </span>
                                <input required type="text" class="form-control solid demo_test" id="section_logo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Title</label>
                            <input type="text" class="form-control" id="section_title">
                        </div>
                        <input type="hidden" id="section_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update_section">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Team modals -->
    <div class="modal fade" id="team_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input required type="text" class="form-control solid demo_test" id="team_image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Image Alt</label>
                            <input type="text" class="form-control" id="team_image_alt">
                        </div>
                        <input type="hidden" id="team_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update_team">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php' ?>
    <script>
        function edit_year(logo, title, description, id) {
            $("#year_id").val(id);
            $("#year_desc").val(description);
            $("#year_title").val(title)
            $("#year_logo").val(logo)
        }

        function delete_year(id) {
            $.post("ajax-request.php", {
                    id: id,
                    page: 'cms-about-us',
                    action: 'delete-year'
                },
                function(data) {
                    console.log(data);
                    if (data == 1) {
                        $(".close").click();
                        location.reload();
                    }
                })
        }

        function edit_section(logo, title, id) {
            $("#section_id").val(id)
            $("#section_title").val(title)
            $("#section_logo").val(logo)
        }

        function edit_team(logo, title, id) {
            $("#team_id").val(id);
            $("#team_image").val(logo)
            $("#team_image_alt").val(title)
        }

        $(".update_section").click(function() {
            let id = $("#section_id").val()
            let title = $("#section_title").val()
            let logo = $("#section_logo").val()
            $.post("ajax-request.php", {
                    id: id,
                    logo: logo,
                    title: title,
                    page: 'cms-about-us',
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

        $(".update_year").click(function() {
            let id = $("#year_id").val();
            let description = $("#year_desc").val();
            let title = $("#year_title").val()
            let logo = $("#year_logo").val();
            $.post("ajax-request.php", {
                    id: id,
                    logo: logo,
                    description: description,
                    title: title,
                    page: 'cms-about-us',
                    action: 'update-year'
                },
                function(data) {
                    console.log(data);
                    if (data == 1) {
                        $(".close").click();
                        location.reload();
                    }
                })
        })

        $(".update_team").click(function() {
            let id = $("#team_id").val();
            let logo = $("#team_image").val();
            let logo_alt = $("#team_image_alt").val()
            $.post("ajax-request.php", {
                    id: id,
                    logo: logo,
                    logo_alt: logo_alt,
                    page: 'cms-about-us',
                    action: 'update-team'
                },
                function(data) {
                    console.log(data);
                    if (data == 1) {
                        $(".close").click();
                        location.reload();
                    }
                })
        })

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

        $(".add_more").click(function() {
            let year = `<div class="col-xl-4  col-md-6 mb-4">
                            <label  class="form-label font-w600">Title<span class="text-danger scale5 ms-2">*</span></label>
                            <input required type="text" class="form-control solid" name="footer_title[]" placeholder="Main Title" aria-label="name">
                        </div>
                        <div class="col-xl-4  col-md-6 mb-4">
                            <label  class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                            <input required type="text" class="form-control solid" name="description[]" placeholder="Description" aria-label="name">
                        </div>
                        <div class="col-xl-4  col-md-6 mb-4">
                            <label  class="form-label font-w600">logo<span class="text-danger scale5 ms-2">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                    </svg>
                                </span>
                                <input required type="text" name="logo[]" class="form-control solid"  aria-label="name" placeholder="Enter Logo Url">
                            </div> 
                        </div>`;
            $(".add_years").append(year)
        })

        // $('.open_gallery').on('click', '.open_gallery', function() {
        //     alert('done')
        // })
        $("body").on("click", ".open_gallery", function() {
            localStorage.setItem("s3_image", $(this).parent().find('input').val())
            $("#gellery_modal").modal('show');
        });
    </script>