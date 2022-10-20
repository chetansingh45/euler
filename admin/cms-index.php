<?php
include('php/helper/db.php');
include('php/helper/alert.php');

use DB\DB;

$db = new DB();
$cover = [];
$query = $db->db("SELECT * FROM home_page WHERE section_name='cover'");
$cover = mysqli_fetch_assoc($query);
if (isset($_POST['save_cover'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = $db->db("SELECT * FROM home_page WHERE section_name='cover'");
    if (mysqli_num_rows($query) > 0) {
        $sql = "UPDATE home_page SET main_title='$title', main_description='$description' WHERE section_name='cover'";
        $res = $db->db($sql);
        if ($res) {
            $_SESSION['cover_success'] = "Updated Successfully";
        }
    } else {
        $sql = "INSERT INTO home_page (main_title,main_description,section_name)VALUES('$title', '$description','cover')";
        $res = $db->db($sql);
        if ($res) {
            $_SESSION['cover_success'] = "Added Successfully";
        }
    }
}
//saving find out more 
$query = $db->db("SELECT * FROM home_page WHERE section_name='find_out_more'");
$find_out_more = mysqli_fetch_assoc($query);

if (isset($_POST['save_find_out_more'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    if (mysqli_num_rows($query) > 0) {
        $sql = "UPDATE home_page SET main_title='$title', main_description='$description',btn_link='$link' WHERE section_name='find_out_more'";
        $res = $db->db($sql);
        if ($res) {
            $_SESSION['cover_success'] = "Updated Successfully";
        }
    } else {
        $sql = "INSERT INTO home_page (main_title,main_description,btn_link,section_name)VALUES('$title', '$description','$link','find_out_more')";
        $res = $db->db($sql);
        if ($res) {
            $_SESSION['cover_success'] = "Added Successfully";
        }
    }
}

///saving slider main main_title
$query = $db->db("SELECT * FROM `home_page` WHERE `section_name` = 'slider' AND main_title IS NOT NULL");
$slideMainTitle = $query;

$slideMainTitleData = mysqli_fetch_assoc($slideMainTitle);
if (isset($_POST['save_slider_main_title'])) {
    $main_title = $_POST['main_title'];
    // $query = $db->db("SELECT * FROM home_page WHERE section_name='slider' AND main_title IS NOT NULL");
    if (mysqli_num_rows($query) > 0) {
        $sql = $db->db("UPDATE home_page SET main_title='$main_title' WHERE section_name='slider' AND main_title IS NOT NULL");
    } else {
        $sql = $db->db("INSERT INTO home_page (section_name,main_title) VALUES ('slider','$main_title')");
    }
    header('location:cms-index.php?section=slider');
}

////saving sliders////

if (isset($_POST['save_slider'])) {
    if (mysqli_num_rows($db->db("SELECT * FROM `home_page` WHERE `section_name` = 'slider' AND `main_title` IS NULL")) < 3) {
        $description = $_POST['slide_description'];
        $slide_title = $_POST['slide_title'];
        $slide_footer_title = $_POST['slide_footer_title'];
        //slide main  image
        $slide_image = $_POST['slide_image'];
        $slide_logo = $_POST['slide_logo'];

        print_r($_POST);

        // move_uploaded_file($slide_logo_temp, "cmsimages/" . $slide_logo);
        // move_uploaded_file($slide_image_temp, "cmsimages/" . $slide_image);
        $sql = "INSERT INTO `home_page` (`section_name`, `title`, `description`, `footer_title` ,`main_image`, `logo`) VALUES ('slider', '$slide_title', '$description', '$slide_footer_title', '$slide_image', '$slide_logo')";
        $query = $db->db($sql);

        if ($query) {
            $_SESSION['cover_success'] = "Added Successfully";
        }
    } else {
        $_SESSION['slider_limit_error'] = "Can not add more than three slide";
    }

    header('location:cms-index.php?section=slider');
}

//deleteing sliders
if (isset($_GET["section"]) && $_GET["section"] == "slider" && isset($_GET['slider_id'])) {
    $id = $_GET["slider_id"];
    $sql = "DELETE FROM home_page WHERE section_name='slider' AND id='$id'";
    $query = $db->db($sql);
    if ($query) {
        $_SESSION['cover_success'] = "Deleted Successfully";
        header('location:cms-index.php?section=slider');
    }
}

//saving asset main title
$assets = $db->db("SELECT * FROM home_page WHERE section_name='assets' AND main_title is not null");
$assetsTitle = mysqli_fetch_assoc($assets);

if (isset($_POST["save_main_title"])) {
    $main_title = $_POST["main_title"];
    if (mysqli_num_rows($assets) > 0) {
        $sql = "UPDATE home_page SET main_title='$main_title' WHERE section_name='assets' AND main_title IS NOT NULL";
        $res = $db->db($sql);
        if ($res) {
            $_SESSION['cover_success'] = "Updated Successfully";
        }
    } else {
        $sql = "INSERT INTO home_page (main_title,section_name)VALUES('$main_title','assets')";
        $res = $db->db($sql);
        if ($res) {
            $_SESSION['cover_success'] = "Added Successfully";
        }
    }

    header('location:cms-index.php?section=assets');
}
///saving assets logo

if (isset($_POST["save_asset_logo"])) {
    $logo = $_POST['asset_logo'];
    $sql = $db->db("INSERT INTO home_page (`section_name`, `logo`) VALUES ('assets', '$logo')");
    $_SESSION['cover_success'] = "Added Successfully";
    header('location:cms-index.php?section=assets');

    // if (move_uploaded_file($logo_temp, "cmsimages/" . $logo)) {
    //     $query = $db->db($sql);
    //     if ($query) {
    //     }
    // }
}
///deleting asset logo

if (isset($_GET["section"]) && $_GET["section"] == "assets" && isset($_GET['assets_logo_id'])) {
    $id = $_GET["assets_logo_id"];
    $sql = "DELETE FROM home_page WHERE section_name='assets' AND id='$id'";
    $query = $db->db($sql);
    if ($query) {
        $_SESSION['cover_success'] = "Deleted Successfully";
        header('location:cms-index.php?section=assets');
    }
}


///saving news main title
$newsMainTitle = $db->db("SELECT * FROM home_page WHERE section_name='news' AND main_title is not null");
$newsMainTitle = mysqli_fetch_assoc($newsMainTitle);

if (isset($_POST["save_news_main_title"])) {
    $mainTitle = $_POST["main_title"];
    $query = $db->db("SELECT * FROM home_page WHERE section_name='news' AND main_title IS NOT NULL");
    if (mysqli_num_rows($query) > 0) {
        $sql = "UPDATE home_page SET main_title='$mainTitle' WHERE section_name='news' AND main_title IS NOT NULL";
        $res = $db->db($sql);
        if ($res) {
            $_SESSION['cover_success'] = "Updated Successfully";
        }
    } else {
        $sql = "INSERT INTO home_page (main_title,section_name)VALUES('$mainTitle','news')";
        $res = $db->db($sql);
        if ($res) {
            $_SESSION['cover_success'] = "Added Successfully";
        }
    }
    header('location:cms-index.php?section=news');
}

////saving news

if (isset($_POST['add_news'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $main_image = $_POST['main_image'];
    // $main_image_temp = $_FILES['main_image']['tmp_name'];
    $button_link = $_POST['button_link'];
    $button_text = $_POST['button_title'];
    $query = $db->db("INSERT INTO home_page (section_name,main_image,title,description,btn_link,btn_text) VALUES ('news','$main_image','$title','$description','$button_link','$button_text')");
    $_SESSION['cover_success'] = "Added Successfully";

    // if (move_uploaded_file($main_image_temp, 'cmsimages/' . $main_image)) {
    //     if ($query) {
    //     }
    // }
    header('location:cms-index.php?section=news');
}
////deliting news
if (isset($_GET["section"]) && $_GET["section"] == "news" && isset($_GET['news_id'])) {
    $id = $_GET["news_id"];
    $sql = "DELETE FROM home_page WHERE section_name='news' AND id='$id'";
    $query = $db->db($sql);
    if ($query) {
        $_SESSION['cover_success'] = "Deleted Successfully";
        header('location:cms-index.php?section=news');
    }
}

///saving accolades title

$accoladesMainTitle = $db->db("SELECT * FROM home_page WHERE section_name='accolades' AND main_title is not null");
$accoladesMainTitle = mysqli_fetch_assoc($accoladesMainTitle);

if (isset($_POST["save_accolades_main_title"])) {
    $mainTitle = $_POST["main_title"];
    $query = $db->db("SELECT * FROM home_page WHERE section_name='accolades' AND main_title IS NOT NULL");
    if (mysqli_num_rows($query) > 0) {
        $sql = "UPDATE home_page SET main_title='$mainTitle' WHERE section_name='accolades' AND main_title IS NOT NULL";
        $res = $db->db($sql);
        if ($res) {
            $_SESSION['cover_success'] = "Updated Successfully";
        }
    } else {
        $sql = "INSERT INTO home_page (main_title,section_name)VALUES('$mainTitle','accolades')";
        $res = $db->db($sql);
        if ($res) {
            $_SESSION['cover_success'] = "Added Successfully";
        }
    }
    header('location:cms-index.php?section=accolades');
}

////saving accolades

if (isset($_POST['add_accolade'])) {
    error_reporting(E_ALL);
    $title = $_POST['title'];
    $description = filter($_POST['description']);
    $main_image = $_POST['main_image'];


    // print_r($_POST);
    $query = $db->db("INSERT INTO home_page (`section_name`, `main_image`, `title`, `description`) VALUES ('accolades','$main_image', '$title', '$description')");
    $_SESSION['cover_success'] = "Added Successfully";
    // header('location:cms-index.php?section=accolades');



    // $main_image_temp = $_FILES['main_image']['tmp_name'];
    // if (move_uploaded_file($main_image_temp, 'cmsimages/' . $main_image)) {
    //     if ($query) {
    //     }
    // }
}
////deliting accolades
if (isset($_GET["section"]) && $_GET["section"] == "accolades" && isset($_GET['accolade_id'])) {
    $id = $_GET["accolade_id"];
    $sql = "DELETE FROM home_page WHERE section_name='accolades' AND id='$id'";
    $query = $db->db($sql);
    if ($query) {
        $_SESSION['cover_success'] = "Deleted Successfully";
        header('location:cms-index.php?section=accolades');
    }
}


///saving network
$network = $db->db("SELECT * FROM home_page WHERE section_name='network'");
$networkData = mysqli_fetch_assoc($network);
if (isset($_POST['save_network'])) {

    $main_title = $_POST['main_title'];
    $main_description = $_POST['main_description'];
    $main_image = $_POST['main_image'];
    // $main_image_temp = $_FILES['main_image']['tmp_name'];

    // if (move_uploaded_file($main_image_temp, "cmsimages/" . $main_image)) {
    // }

    if (mysqli_num_rows($network) > 0) {
        $sql = "UPDATE home_page SET main_title ='$main_title',main_description='$main_description',main_image='$main_image' WHERE section_name = 'network'";
        // echo $sql;
        // die; 
        $sql = $db->db($sql);
        if ($sql) {
            $_SESSION['cover_success'] = "Updated Successfully";
        }
    } else {
        $sql = $db->db("INSERT INTO home_page (section_name,main_title,main_description,main_image) VALUES ('network','$main_title','$main_description','$main_image')");
        if ($sql) {
            $_SESSION['cover_success'] = "Added Successfully";
        }
    }
    header('location: cms-index.php?section=network');
}

/////////////meta 
$section_meta = $db->db("SELECT * FROM home_page WHERE section_name = 'meta'");
if (isset($_POST['save_meta'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    if (mysqli_num_rows($section_meta) > 0) {
        $res = $db->db("UPDATE home_page SET main_title='$main_title',main_description='$main_description' WHERE section_name='meta'");
        if ($res) {
            alert("Updated", "Meta Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO home_page (section_name,main_title,main_description)
        VALUES ('meta','$main_title','$main_description')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Meta Added Successfully", "success");
        }
    }
}
$meta_data = false;
$meta = $db->db("SELECT * FROM home_page WHERE section_name = 'meta'");
if (mysqli_num_rows($meta) > 0) {
    $meta_data = mysqli_fetch_assoc($meta);
}
include 'includes/header.php';
?>

<?php
if (isset($_GET['section']) && $_GET['section'] == 'meta') : ?>
    <form action="" method="post">
        <div class="card my-5" style="background: #dfdfdf;">
            <div class="bg-primary">
                <h4 class="text-white p-3 bg-primary sec-head d-inline-block">Meta Details</h4>
                <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                    <input class="form-check-input" onchange="changeStatus('home_page', <?php echo $meta_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $meta_data['status'] === '1' ? 'checked' : '' ?>>
                    <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label font-w600">Meta Title<span class="text-danger scale5 ms-2">*</span></label>
                        <input required type="text" class="form-control solid" name="main_title" placeholder="Meta Title" aria-label="name" <?php if ($meta_data) { ?> value="<?php echo $meta_data['main_title'] ?>" <?php } ?>>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label font-w600">Meta Description<span class="text-danger scale5 ms-2">*</span></label>
                        <textarea height="300px" id="editor6" required name="main_description" class="form-control solid" aria-label="name"><?php echo isset($meta_data) ? $meta_data['main_description'] : ''; ?></textarea>
                    </div>
                    <input type="hidden" name="save_meta">
                </div>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-secondary" type="submit">Save</button>
            </div>
        </div>
    </form>
<?php elseif (isset($_GET['section']) && $_GET['section'] == 'cover') : ?>
    <form method="post" enctype="multipart/form-data">
        <div class="card my-5" style="background: #dfdfdf;">
            <div class="bg-primary">
                <h4 class="text-white p-3 bg-primary sec-head d-inline-block">Cover Details</h4>
                <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                    <input class="form-check-input" onchange="changeStatus('home_page', <?php echo $cover['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $cover['status'] === '1' ? 'checked' : '' ?>>
                    <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label class="control-label">Title</label>
                        <input <?php if (array_key_exists('main_title', $cover)) { ?> value="<?php echo $cover['main_title'] ?>" <?php }  ?> type="text" class="form-control" placeholder="Title" name="title">
                    </div>
                    <div class="col-md-8">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" placeholder="Description" name="description" id="editor1"><?php echo array_key_exists('main_description', $cover) ? $cover['main_description'] : '' ?></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <input type="submit" class="form-group btn btn-secondary" name="save_cover" value="Save">
            </div>
        </div>
    </form>
<?php elseif (isset($_GET['section']) && $_GET['section'] == 'find-out-more') : ?>
    <form method="post">
        <div class="card my-4" style="background: #dfdfdf;">
            <div class="bg-primary">
                <h4 class="text-white p-3 bg-primary sec-head d-inline-block">Find Out More Details</h4>
                <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                    <input class="form-check-input" onchange="changeStatus('home_page', <?php echo $find_out_more['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $find_out_more['status'] === '1' ? 'checked' : '' ?>>
                    <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label">Title</label>
                        <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo array_key_exists('main_title', $find_out_more) ? $find_out_more['main_title'] : '' ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Button Link</label>
                        <input class="form-control" placeholder="https://www.eulermotors.com/" name="link" value="<?php echo array_key_exists('btn_link', $find_out_more) ? $find_out_more['btn_link'] : '' ?>">
                    </div>
                    <div class="col-md-12 mt-5">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" placeholder="Description" name="description" id="editor1"><?php echo array_key_exists('main_description', $find_out_more) ? $find_out_more['main_description'] : '' ?></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <input type="submit" class="form-group btn btn-secondary" name="save_find_out_more" value="Save">
            </div>
        </div>
    </form>
<?php elseif (isset($_GET['section']) && $_GET['section'] == 'network') : ?>
    <form method="post" enctype="multipart/form-data">
        <div class="card my-4" style="background: #dfdfdf;">
            <div class="bg-primary">
                <h4 class="text-white p-3 bg-primary sec-head d-inline-block">Network Details</h4>
                <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                    <input class="form-check-input" onchange="changeStatus('home_page', <?php echo $networkData['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $networkData['status'] === '1' ? 'checked' : '' ?>>
                    <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label">Title</label>
                        <input type="text" required class="form-control" placeholder="Title" name="main_title" <?php if ($network) { ?> value="<?php echo $networkData['main_title'] ?>" <?php } ?>>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Image</label>
                        <input type="text" class="form-control" name="main_image" value="<?php echo $network ? $networkData['main_image'] : '' ?>" placeholder="Enter Image Url" required>
                    </div>
                    <div class="col-md-12 mt-5">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" placeholder="Description" name="main_description" id="editor1"> <?php if ($network) { ?> <?php echo $networkData['main_description'] ?> <?php } ?></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <input type="submit" class="form-group btn btn-secondary" name="save_network" value="Save">
            </div>
        </div>
    </form>

<?php elseif (isset($_GET['section']) && $_GET['section'] == 'slider') : ?>
    <!-- /save_slider_main_title -->
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background: #dfdfdf;">
                <form action="" method="post">
                    <div class="card-body">
                        <label class="control-label">Main Title</label>
                        <input type="text" required class="form-control" placeholder="Title" name="main_title" value="<?php echo $slideMainTitleData ? $slideMainTitleData['main_title'] : '' ?>">
                    </div>
                    <div class="card-footer text-end">
                        <input type="submit" class="form-group btn btn-secondary" name="save_slider_main_title" value="Save">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card" style="background: #dfdfdf;">
                <div class="card-body">
                    <form action="" method="post" enctype="">
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <label class="control-label">Slide Head Title</label>
                                <input type="text" required class="form-control" placeholder="slide one title" name="slide_title">
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="control-label">Slide Footer Title</label>
                                <input type="text" required class="form-control" placeholder="slide one footer title" name="slide_footer_title">
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="control-label">Slide Image</label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Enter Image Url" name="slide_image" required>
                                </div>

                            </div>
                            <div class="col-md-6 my-2">
                                <label class="control-label">Slide Logo</label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Enter Logo Url" name="slide_logo" required>
                                </div>
                            </div>
                            <div class="col-md-12 my-2">
                                <label class="control-label">Slide Description</label>
                                <textarea placeholder="Description" name="slide_description" id="editor1"></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-end my-2">
                            <input type="submit" class="form-group btn btn-secondary" name="save_slider" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <form action="" method="post" class="mb-5">
        <div class="card my-1" style="background: #dfdfdf;">
            <h4 class="text-white p-3 bg-primary sec-head">Slider Details</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 my-3">

                    </div>

                </div>
            </div>
            <div class="card-footer text-end">
                <input type="submit" class="form-group btn btn-secondary" name="save_slider" value="Save">
            </div>
        </div>
    </form> -->
    <!-- <div class="form-group">
                <input type="submit" class="form-group btn btn-info" name="save_slider_main_title" value="Save">
            </div> -->
    <div class="col-md-12" style="margin-top: 6rem;">
        <table class="table table-hover">
            <tr class="bg-primary text-white">
                <th class="text-nowrap">Slide Title</th>
                <th class="text-nowrap">Slide Footer Title</th>
                <th class="text-nowrap">Slide Image</th>
                <th class="text-nowrap">Slide Logo</th>
                <th class="text-nowrap">Slide Description</th>
                <th class="text-nowrap text-center">Action</th>
            </tr>
            <?php
            $query  = $db->db("SELECT * FROM home_page WHERE section_name='slider' AND main_title IS NULL");
            while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['footer_title'] ?></td>
                    <td><img height="100px" widht="70px" src="<?php echo $row['main_image'] ?>"></td>
                    <td><img height="100px" widht="100px" src="<?php echo $row['logo'] ?>"></td>
                    <td><?php echo $row['description'] ?></td>
                    <td class="text-nowrap">
                        <a href="cms-index.php?section=slider&slider_id=<?php echo $row['id'] ?>"><button class="btn btn-danger">Delete</button></a>
                        <a href="javascript:void(0);"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#slideModel" onclick="editSlide(<?php echo $row['id'] ?>)">Edit</button></a>
                        <div class="form-check d-inline-block form-switch px-2" style="margin-left: 30px;">
                            <input class="form-check-input" onchange="changeStatus('home_page', <?php echo $row['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $row['status'] === '1' ? 'checked' : '' ?>>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

<?php elseif (isset($_GET['section']) && $_GET['section'] == 'assets') : ?>
    <div class="row my-3">
        <div class="col-md-6">
            <form method="post" enctype="multipart/form-data">
                <div class="card" style="background: #dfdfdf;">
                    <div class="card-body">
                        <label class="control-label">Assets Main Title</label>
                        <input type="text" <?php if ($assetsTitle) { ?> value="<?php echo $assetsTitle['main_title'] ?>" <?php } ?> required class="form-control" placeholder="Title" name="main_title">
                    </div>
                    <div class="card-footer text-end">
                        <input type="submit" class=" btn btn-secondary" name="save_main_title" value="Save">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form method="post">
                <div class="card" style="background: #dfdfdf;">
                    <div class="card-body">
                        <label class="control-label">Assets Logo</label>
                        <div class="input-group">
                            <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                    <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                </svg>
                            </span>
                            <input type="text" class="form-control" name="asset_logo" placeholder="Enter Logo Url" required>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <input type="submit" class=" btn btn-secondary" name="save_asset_logo" value="Add">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <?php
        $query  = $db->db("SELECT * FROM home_page WHERE section_name='assets' AND main_title IS NULL");
        $i = 1;
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="jobs2 text-center card-body">
                        <div class="text-center">
                            <span class="job_list_icon">
                                <img height="100px" widht="100px" src="<?php echo $row['logo'] ?>">

                            </span>
                            <h4 class="fs-20 mb-0"><?php echo $row['title'] ?></h4>
                            <span class="text-primary mb-3 d-block"><?php echo $row['footer_title'] ?></span>
                        </div>
                        <div class="mb-3">

                        </div>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-index.php?section=assets&assets_logo_id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success light" data-bs-toggle="modal" data-bs-target="#assetModel" onclick="editAsset('<?php echo $row['logo'] ?>',<?php echo $row['id'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                            </a>
                            <div class="form-check d-inline-block form-switch px-2" style="margin: 10px 0px 0px 30px">
                                <input class="form-check-input" onchange="changeStatus('home_page', <?php echo $row['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $row['status'] === '1' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
<?php elseif (isset($_GET['section']) && $_GET['section'] == 'news') : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background: #dfdfdf;">
                <form action="" method="post">
                    <div class="card-body">
                        <label class="control-label">Main Title</label>
                        <input type="text" <?php if ($newsMainTitle) { ?> value="<?php echo $newsMainTitle['main_title'] ?>" <?php } ?> required class="form-control" placeholder="Title" name="main_title">
                    </div>
                    <div class="card-footer text-end">
                        <input type="submit" class=" btn btn-secondary" name="save_news_main_title" value="Save">
                    </div>
                </form>
            </div>
        </div>
        <div class="colmd-12">
            <div class="card" style="background: #dfdfdf;">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <label class="control-label">Title</label>
                                <input type="text" required class="form-control" name="title" placeholder="Title">
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="control-label">Image Url</label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" required class="form-control" name="main_image" placeholder="Type Image Url">
                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="control-label">Button Title</label>
                                <input type="text" required class="form-control" name="button_title" placeholder="Button Title">
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="control-label">Button Link</label>
                                <input type="text" required class="form-control" name="button_link" placeholder="http://eulermotores.com">
                            </div>
                            <div class="col-md-12 my-2">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" id="editor1" name="description"></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-end mt-3">
                            <input type="submit" class="btn btn-secondary" name="add_news" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-5">
        <table class="table table-hover">
            <tr class="bg-primary text-white">
                <th class="text-nowrap">#</th>
                <th class="text-nowrap">Image</th>
                <th class="text-nowrap">Title</th>
                <th class="text-nowrap">Description</th>
                <th class="text-nowrap">Button Link </th>
                <th class="text-nowrap">Button Text</th>
                <th class="text-nowrap">Action</th>
            </tr>
            <?php
            $query  = $db->db("SELECT * FROM home_page WHERE section_name='news' AND main_title IS NULL");
            $i = 1;
            while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?php echo $i;
                        $i++; ?></td>

                    <td><img height="100px" widht="100px" src="<?php echo $row['main_image'] ?>"></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['btn_link'] ?></td>
                    <td><?php echo $row['btn_text'] ?></td>
                    <td class="text-nowrap">
                        <?php $json = json_encode($row); ?>
                        <a href="cms-index.php?section=news&news_id=<?php echo $row['id'] ?>"><button class="btn btn-danger">Delete</button></a>
                        <a href="javascript:void(0);" class="editNews" data-json='<?php echo $json; ?>'><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newsModel">Edit</button></a>
                        <div class="form-check d-inline-block form-switch px-2" style="margin: 10px 0px 0px 30px">
                            <input class="form-check-input" onchange="changeStatus('home_page', <?php echo $row['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $row['status'] === '1' ? 'checked' : '' ?>>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php elseif (isset($_GET['section']) && $_GET['section'] == 'accolades') : ?>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <div class="card" style="background: #dfdfdf;">
                    <div class="card-body">
                        <div class="card-body">
                            <label class="control-label">Main Title</label>
                            <input type="text" <?php if ($accoladesMainTitle) { ?> value="<?php echo $accoladesMainTitle['main_title'] ?>" <?php } ?> required class="form-control" placeholder="Title" name="main_title">
                        </div>
                        <div class="card-footer text-end">
                            <input type="submit" class=" btn btn-secondary" name="save_accolades_main_title" value="Save">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="card" style="background: #dfdfdf;">
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <label class="control-label">Title</label>
                                <input type="text" required class="form-control" name="title" placeholder="Title">
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="control-label">Image</label>
                                <div class="input-group">
                                    <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" required class="form-control" name="main_image" placeholder="Type Imge Url">
                                </div>
                            </div>
                            <div class="col-md-12 my-2">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" id="editor1" name="description"></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-end mt-3">
                            <input type="submit" class=" btn btn-secondary" name="add_accolade" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-5">
        <table class="table table-hover">
            <tr class="text-white bg-primary">
                <th class="text-nowrap">#</th>
                <th class="text-nowrap">Image</th>
                <th class="text-nowrap">Title</th>
                <th class="text-nowrap">Description</th>
                <th class="text-nowrap">Action</th>
            </tr>
            <?php
            $query  = $db->db("SELECT * FROM home_page WHERE section_name='accolades' AND main_title IS NULL");
            $i = 1;
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?php echo $i;
                        $i++;
                        $json = json_encode($row); ?></td>

                    <td><img height="100px" widht="100px" src="<?php echo $row['main_image'] ?>"></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td class="text-nowrap">
                        <a href="cms-index.php?section=accolades&accolade_id=<?php echo $row['id'] ?>"><button class="btn btn-danger">Delete</button></a>
                        <a href="javascript:void(0);" class="editAccolade" data-json='<?php echo $json; ?>'><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#accoladeModel">Edit</button></a>
                        <div class="form-check d-inline-block form-switch px-2" style="margin: 10px 0px 0px 30px">
                            <input class="form-check-input" onchange="changeStatus('home_page', <?php echo $row['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $row['status'] === '1' ? 'checked' : '' ?>>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php endif; ?>
</div>
</div>
<!-- Models -->
<!-- slider Model -->
<div class="modal fade" id="slideModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Slide</h5>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="label">Slide Head Title</label>
                        <input type="text" id="slide_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Slide Footer Title</label>
                        <input type="text" id="slide_footer_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Slide Image Url</label>
                        <div class="input-group">
                            <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                    <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                </svg>
                            </span>
                            <input type="text" id="slide_image_url" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Slide Logo Url</label>
                        <div class="input-group">
                            <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                    <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                </svg>
                            </span>
                            <input type="text" id="slide_logo_url" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Slide Head Title</label>
                        <textarea class="form-control" id="slide_description"></textarea>
                    </div>
                    <input type="hidden" id="slider_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_slider">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Assets Model -->

<div class="modal fade" id="assetModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Assets</h5>
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
                            <input type="text" id="asset_image_url" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" id="asset_image_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_asset">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- News Model -->

<div class="modal fade" id="newsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit News</h5>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="label">Title</label>
                        <input type="text" id="news_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Image Url</label>
                        <div class="input-group">
                            <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                    <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                </svg>
                            </span>
                            <input type="text" id="news_image" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Button Link</label>
                        <input type="text" id="news_btn_link" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Button Text</label>
                        <input type="text" id="news_btn_text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Description</label>
                        <textarea id="news_description" class="form-control"></textarea>
                    </div>
                    <input type="hidden" id="news_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_news">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Accolades Model -->

<div class="modal fade" id="accoladeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Accolade</h5>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="label">Title</label>
                        <input type="text" id="accolade_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Image Url</label>
                        <div class="input-group">
                            <span class="input-group-text open_gallery" id="basic-addon1" title="Choose from gallery">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                    <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"></path>
                                </svg>
                            </span>
                            <input type="text" id="accolade_image" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Description</label>
                        <textarea id="accolade_description" class="form-control"></textarea>
                    </div>
                    <input type="hidden" id="accolade_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_accolade">Update</button>
                </div>
            </form>
        </div>
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

    function editSlide(id) {
        $.post("ajax-request.php", {
            'id': id,
            'page': 'cms-index',
            'action': 'edit-slider'
        }, function(data, status) {
            data = JSON.parse(data);
            $("#slide_title").val(data.title)
            $("#slide_footer_title").val(data.footer_title)
            $("#slide_image_url").val(data.main_image)
            $("#slide_logo_url").val(data.logo)
            $("#slide_description").html(data.description)
            $("#slider_id").val(data.id)
        })
    }

    $(".update_slider").click(function() {
        let slide_title = $("#slide_title").val()
        let footer_title = $("#slide_footer_title").val()
        let image_url = $("#slide_image_url").val()
        let logo = $("#slide_logo_url").val()
        let description = $("#slide_description").val()
        let id = $("#slider_id").val()
        $.post("ajax-request.php", {
                id: id,
                slide_title: slide_title,
                footer_title: footer_title,
                description: description,
                logo: logo,
                image: image_url,
                page: 'cms-index',
                'action': 'update-slider'
            },
            function(data) {
                console.log(data);
                if (data == 1) {
                    $(".close").click();
                    location.reload();
                }
            })
    })

    function editAsset(logo, id) {
        $("#asset_image_url").val(logo)
        $("#asset_image_id").val(id)
    }

    $(".update_asset").click(function() {
        let logo = $("#asset_image_url").val();
        let id = $("#asset_image_id").val();
        // alert(id);
        $.post("ajax-request.php", {
                id: id,
                logo: logo,
                page: 'cms-index',
                'action': 'update-asset'
            },
            function(data) {
                console.log(data);
                if (data == 1) {
                    $(".close").click();
                    location.reload();
                }
            })
    })

    function editNews(data) {
        console.log(data.attributes.json);
    }

    $(".editNews").click(function() {
        data = $(this).data("json");
        console.log(data);
        $("#news_title").val(data.title)
        $("#news_image").val(data.main_image)
        $("#news_description").val(data.description)
        $("#news_btn_link").val(data.btn_link)
        $("#news_btn_text").val(data.btn_text)
        $("#news_id").val(data.id)
    })

    $(".update_news").click(function() {
        let title = $("#news_title").val()
        let news_image = $("#news_image").val()
        let news_btn_link = $("#news_btn_link").val()
        let news_btn_text = $("#news_btn_text").val()
        let description = $("#news_description").val()
        let id = $("#news_id").val()
        $.post("ajax-request.php", {
                id: id,
                title: title,
                news_btn_link: news_btn_link,
                description: description,
                news_btn_text: news_btn_text,
                image: news_image,
                page: 'cms-index',
                'action': 'update-news'
            },
            function(data) {
                console.log(data);
                if (data == 1) {
                    $(".close").click();
                    location.reload();
                }
            })
    })

    $(".editAccolade").click(function() {
        data = $(this).data("json");
        console.log(data);
        $("#accolade_title").val(data.title)
        $("#accolade_image").val(data.main_image)
        $("#accolade_description").val(data.description)
        $("#accolade_id").val(data.id)
    })


    $(".update_accolade").click(function() {
        let title = $("#accolade_title").val()
        let image = $("#accolade_image").val()
        let description = $("#accolade_description").val()
        let id = $("#accolade_id").val()
        $.post("ajax-request.php", {
                id: id,
                title: title,
                description: description,
                image: image,
                page: 'cms-index',
                'action': 'update-accolade'
            },
            function(data) {
                console.log(data);
                if (data == 1) {
                    $(".close").click();
                    location.reload();
                }
            })
    })
</script>