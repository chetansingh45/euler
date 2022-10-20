<?php
include('php/helper/db.php');
include 'includes/header.php';
include 'php/helper/alert.php';

use DB\DB;

$db = new DB();


//////---------Saving And updating hero section--------------////////////////////////////////////////////////
$carrer = $db->db("SELECT * FROM carrer_page WHERE section_name = 'hero'");

if (isset($_POST['save_hero_section'])) {
    $title = filter($_POST['title']);
    $main_title = filter($_POST['main_title']);
    $main_image = $_POST['main_image'];
    if (mysqli_num_rows($carrer) > 0) {
        $res = $db->db("UPDATE carrer_page SET title='$title',main_title='$main_title',main_image='$main_image' WHERE section_name='hero'");
        if ($res) {
            alert("Updated", "Hero Section Updated Successfully", "success");
        }
    } else {
        $res = $db->db("INSERT INTO carrer_page (section_name,main_title,title,main_image) VALUES ('hero','$main_title','$title','$main_image')");
        if ($res) {
            alert("Added", "Hero Section Added Successfully", "success");
        }
    }
}
$careerData = false;
$carrer = $db->db("SELECT * FROM carrer_page WHERE section_name = 'hero'");
if (mysqli_num_rows($carrer) > 0) {
    $careerData = mysqli_fetch_assoc($carrer);
}

////////////--------saving and updating section two ---------------////////////////////////////////////////////////////////////////
$section_two = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_two'");
$sectionTwoTemp = false;
if ($section_two) {
    $sectionTwoTemp = mysqli_fetch_assoc($section_two);
}

if (isset($_POST['save_section_two'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    $main_image = $_POST['main_image'];
    $main_image_alt = filter($_POST['main_image_alt']);
    if (mysqli_num_rows($section_two) > 0) {
        $res = $db->db("UPDATE carrer_page SET main_title='$main_title',main_image='$main_image',main_description='$main_description',main_image_alt='$main_image_alt' WHERE section_name='section_two'");
        if ($res) {
            alert("Updated", "Section Two Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO carrer_page (section_name,main_title,main_image,main_description,main_image_alt) VALUES ('section_two','$main_title','$main_image','$main_description','$main_image_alt')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Section Two Added Successfully", "success");
        }
    }
}
$section_two_data = false;
$section_two = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_two'");
if (mysqli_num_rows($section_two) > 0) {
    $section_two_data = mysqli_fetch_assoc($section_two);
}

////////////saving and updating section three

$section_three = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_three'");
if (isset($_POST['save_section_three'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    $main_image = $_POST['main_image'];

    // $main_image = $_FILES['main_image']['name'];
    // $main_image_tmp = $_FILES['main_image']['tmp_name'];
    // move_uploaded_file($main_image_tmp,"cmsimages/".$main_image);
    if (mysqli_num_rows($section_three) > 0) {
        $res = $db->db("UPDATE carrer_page SET main_title='$main_title',main_image='$main_image',main_description='$main_description' WHERE section_name='section_three'");
        if ($res) {
            alert("Updated", "Section Three Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO carrer_page (section_name,main_title,main_image,main_description)
        VALUES ('section_three','$main_title','$main_image','$main_description')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Section Three Added Successfully", "success");
        }
    }
}
$section_three_data = false;
$section_three = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_three'");
if (mysqli_num_rows($section_two) > 0) {
    $section_three_data = mysqli_fetch_assoc($section_three);
}

////////////saving and updating section four

$section_four = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_four'");
if (isset($_POST['save_section_four'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    $main_image = $_POST['main_image'];

    // $main_image = $_FILES['main_image']['name'];
    // $main_image_tmp = $_FILES['main_image']['tmp_name'];
    // move_uploaded_file($main_image_tmp,"cmsimages/".$main_image);
    if (mysqli_num_rows($section_four) > 0) {
        $res = $db->db("UPDATE carrer_page SET main_title='$main_title',main_image='$main_image',main_description='$main_description' WHERE section_name='section_four'");
        if ($res) {
            alert("Updated", "Section Four Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO carrer_page (section_name,main_title,main_image,main_description)
        VALUES ('section_four','$main_title','$main_image','$main_description')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Section Four Added Successfully", "success");
        }
    }
}
$section_four_data = false;
$section_four = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_four'");
if (mysqli_num_rows($section_two) > 0) {
    $section_four_data = mysqli_fetch_assoc($section_four);
}

////////////saving and updating section five

$section_five = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_five'");
if (isset($_POST['save_section_five'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    $main_image = $_POST['main_image'];

    // $main_image = $_FILES['main_image']['name'];
    // $main_image_tmp = $_FILES['main_image']['tmp_name'];
    // move_uploaded_file($main_image_tmp,"cmsimages/".$main_image);
    if (mysqli_num_rows($section_five) > 0) {
        $res = $db->db("UPDATE carrer_page SET main_title='$main_title',main_image='$main_image',main_description='$main_description' WHERE section_name='section_five'");
        if ($res) {
            alert("Updated", "Section Five Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO carrer_page (section_name,main_title,main_image,main_description) VALUES ('section_five','$main_title','$main_image','$main_description')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Section Five Added Successfully", "success");
        }
    }
}
$section_five_data = false;
$section_five = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_five'");
if (mysqli_num_rows($section_five) > 0) {
    $section_five_data = mysqli_fetch_assoc($section_five);
}

////////////saving and updating section six

$section_six = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_six'");
if (isset($_POST['save_section_six'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    $main_image = $_POST['main_image'];

    // $main_image = $_FILES['main_image']['name'];
    // $main_image_tmp = $_FILES['main_image']['tmp_name'];
    // move_uploaded_file($main_image_tmp,"cmsimages/".$main_image);
    if (mysqli_num_rows($section_six) > 0) {
        $res = $db->db("UPDATE carrer_page SET main_title='$main_title',main_image='$main_image',main_description='$main_description' WHERE section_name='section_six'");
        if ($res) {
            alert("Updated", "Section Six Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO carrer_page (section_name,main_title,main_image,main_description)
        VALUES ('section_six','$main_title','$main_image','$main_description')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Section Six Added Successfully", "success");
        }
    }
}
$section_six_data = false;
$section_six = $db->db("SELECT * FROM carrer_page WHERE section_name = 'section_six'");
if (mysqli_num_rows($section_six) > 0) {
    $section_six_data = mysqli_fetch_assoc($section_six);
}

////////////saving and updating section five

$section_meta = $db->db("SELECT * FROM carrer_page WHERE section_name = 'meta'");
if (isset($_POST['save_meta'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    if (mysqli_num_rows($section_meta) > 0) {
        $res = $db->db("UPDATE carrer_page SET main_title='$main_title',main_description='$main_description' WHERE section_name='meta'");
        if ($res) {
            alert("Updated", "Meta Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO carrer_page (section_name,main_title,main_description)
        VALUES ('meta','$main_title','$main_description')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Meta Added Successfully", "success");
        }
    }
}
$meta_data = false;
$meta = $db->db("SELECT * FROM carrer_page WHERE section_name = 'meta'");
if (mysqli_num_rows($section_six) > 0) {
    $meta_data = mysqli_fetch_assoc($meta);
}
?>
<div class="d-flex align-items-center mb-4 flex-wrap">
    <h4 class="fs-20 font-w600  me-auto">CMS Carrer</h4>
</div>
<!-- Meta Details -->

<div class="row">
    <div class="col-xl-12">
        <form method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="bg-primary sec-head">
                    <h4 class="text-white p-3 bg-primary d-inline-block">Meta Details</h4>
                    <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                        <input class="form-check-input" onchange="changeStatus('carrer_page', <?php echo $meta_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $meta_data['status'] === '1' ? 'checked' : '' ?>>
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
                            <input class="form-check-input" onchange="changeStatus('carrer_page', <?php echo $careerData['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $careerData['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Sub Ttile<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="title" placeholder="Sub Title" aria-label="name" <?php if ($careerData) { ?> value="<?php echo $careerData['title'] ?>" <?php } ?>>
                            </div>

                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($careerData) { ?> value="<?php echo $careerData['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Background Image<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" name="main_image" class="form-control solid" aria-label="name" placeholder="Enter Image Url" value="<?php echo $careerData ? $careerData['main_image'] : '' ?>">
                                </div>
                            </div>
                            <input type="hidden" name="save_hero_section">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <?php if ($careerData) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $careerData['main_image'] ?>" height="150" width="400">
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

    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 2</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('carrer_page', <?php echo $section_two_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_two_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_two_data) { ?> value="<?php echo $section_two_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Image<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" name="main_image" class="form-control solid" aria-label="name" value="<?php echo $section_two_data ? $section_two_data['main_image'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-xl-4  col-md-6 mb-4">
                                <label class="form-label font-w600">Image Alt<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_image_alt" placeholder="Main Title" aria-label="name" <?php if ($section_two_data) { ?> value="<?php echo $section_two_data['main_image_alt'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea height="300px" id="editor1" required name="main_description" class="form-control solid" aria-label="name">
                                <?php if ($section_two_data) {
                                    echo $section_two_data['main_description'];
                                } ?>
                            </textarea>
                            </div>
                            <input type="hidden" name="save_section_two">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <?php if ($section_two_data) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $section_two_data['main_image'] ?>" height="150" width="400">
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


    <!------------- Section three --------- -->

    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 3</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('carrer_page', <?php echo $section_three_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_three_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_three_data) { ?> value="<?php echo $section_three_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Background Image<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" name="main_image" class="form-control solid" aria-label="name" placeholder="Enter Image Url" value="<?php echo $section_three_data ? $section_three_data['main_image'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea height="300px" id="editor2" required name="main_description" class="form-control solid" aria-label="With textarea">
                                <?php if ($section_three_data) {
                                    echo $section_three_data['main_description'];
                                } ?>
                            </textarea>
                            </div>
                            <input type="hidden" name="save_section_three">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <?php if ($section_three_data) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $section_three_data['main_image'] ?>" height="150" width="400">
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

    <!------------- Section four --------- -->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 4</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('carrer_page', <?php echo $section_four_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_four_data['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Section Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input required type="text" class="form-control solid" name="main_title" placeholder="Main Title" aria-label="name" <?php if ($section_four_data) { ?> value="<?php echo $section_four_data['main_title'] ?>" <?php } ?>>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Background Image<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" name="main_image" class="form-control solid" aria-label="name" placeholder="Enter Image Url" value="<?php echo $section_four_data ? $section_four_data['main_image'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea height="300px" id="editor3" required name="main_description" class="form-control solid" aria-label="With textarea">
                                <?php if ($section_four_data) {
                                    echo $section_four_data['main_description'];
                                } ?>
                            </textarea>
                            </div>
                            <input type="hidden" name="save_section_four">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <?php if ($section_four_data) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $section_four_data['main_image'] ?>" height="150" width="400">
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

    <!------------- Section Five --------- -->

    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 5</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('carrer_page', <?php echo $section_five_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_five_data['status'] === '1' ? 'checked' : '' ?>>
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
                                <label class="form-label font-w600">Background Image<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" name="main_image" class="form-control solid" aria-label="name" placeholder="Enter Image Url" value="<?php echo $section_five_data ? $section_five_data['main_image'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea height="300px" id="editor4" required name="main_description" class="form-control solid" aria-label="With textarea">
                                <?php if ($section_five_data) {
                                    echo $section_five_data['main_description'];
                                } ?>
                            </textarea>
                            </div>
                            <input type="hidden" name="save_section_five">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <?php if ($section_five_data) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $section_five_data['main_image'] ?>" height="150" width="400">
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


    <!------------- Section Six --------- -->
    <div class="row">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="bg-primary sec-head">
                        <h4 class="text-white p-3 bg-primary d-inline-block">Section 6</h4>
                        <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                            <input class="form-check-input" onchange="changeStatus('carrer_page', <?php echo $section_six_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $section_six_data['status'] === '1' ? 'checked' : '' ?>>
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
                                <label class="form-label font-w600">Background Image<span class="text-danger scale5 ms-2">*</span></label>

                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input required type="text" name="main_image" class="form-control solid" aria-label="name" placeholder="Enter Image Url" value="<?php echo $section_six_data ? $section_six_data['main_image'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea height="300px" id="editor5" required name="main_description" class="form-control solid" aria-label="With textarea">
                                <?php if ($section_six_data) {
                                    echo $section_six_data['main_description'];
                                } ?>
                            </textarea>
                            </div>
                            <input type="hidden" name="save_section_six">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <?php if ($section_six_data) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $section_six_data['main_image'] ?>" height="150" width="400">
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
        ClassicEditor
            .create(document.querySelector('#editor5'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor6'))
            .catch(error => {
                console.error(error);
            });
    </script>