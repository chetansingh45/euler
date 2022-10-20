<?php
include('php/helper/db.php');
include 'includes/header.php';
include 'php/helper/alert.php';
include '../includes/OpenGraph.php';

use DB\DB;

$db = new DB();

////////////saving and updating section Meta

$section_meta = $db->db("SELECT * FROM media_coverage_page WHERE section_name = 'meta'");
if (isset($_POST['save_meta'])) {
    $main_title = filter($_POST['main_title']);
    $main_description = filter($_POST['main_description']);
    if (mysqli_num_rows($section_meta) > 0) {
        $res = $db->db("UPDATE media_coverage_page SET main_title='$main_title',main_description='$main_description' WHERE section_name='meta'");
        if ($res) {
            alert("Updated", "Meta Updated Successfully", "success");
        }
    } else {
        $sql = "INSERT INTO media_coverage_page (section_name,main_title,main_description)
        VALUES ('meta','$main_title','$main_description')";

        $res = $db->db($sql);
        if ($res) {
            alert("Added", "Meta Added Successfully", "success");
        }
    }
}
$meta_data = false;
$meta = $db->db("SELECT * FROM media_coverage_page WHERE section_name = 'meta'");
if (mysqli_num_rows($meta) > 0) {
    $meta_data = mysqli_fetch_assoc($meta);
}

//////---------Saving And updating hero section--------------////////////////////////////////////////////////
$carrer = $db->db("SELECT * FROM media_coverage_page WHERE section_name = 'hero'");
$heroTemp = mysqli_fetch_assoc($carrer);
if (isset($_POST['save_hero_section'])) {
    $main_title = filter($_POST['main_title']);
    $main_image = $_POST['main_image'];
    if (mysqli_num_rows($carrer) > 0) {
        $res = $db->db("UPDATE media_coverage_page SET main_title='$main_title',main_image='$main_image' WHERE section_name='hero'");
        if ($res) {
            alert("Updated", "Hero Section Updated Successfully", "success");
        }
    } else {
        $res = $db->db("INSERT INTO media_coverage_page (section_name,main_title,main_image)
                VALUES ('hero','$main_title','$main_image')");
        if ($res) {
            alert("Added", "Hero Section Added Successfully", "success");
        }
    }
}
$careerData = false;
$carrer = $db->db("SELECT * FROM media_coverage_page WHERE section_name = 'hero'");
if (mysqli_num_rows($carrer) > 0) {
    $careerData = mysqli_fetch_assoc($carrer);
}

////////////--------saving and updating section two ---------------////////////////////////////////////////////////////////////////
$section_two = $db->db("SELECT * FROM media_coverage_page WHERE section_name = 'section_two'");
$sectionTwoTemp = false;
if ($section_two) {
    $sectionTwoTemp = mysqli_fetch_assoc($section_two);
}

if (isset($_POST['save_section_two'])) {
    $iframe = $_POST['iframe'];
    $sql = "INSERT INTO media_coverage_page (section_name,iframe)
    VALUES ('section_two','$iframe')";
    $res = $db->db($sql);
    if ($res) {
        alert("Added", "Section Two Added Successfully", "success");
    }
}
$section_two_data = false;
$section_two = $db->db("SELECT * FROM media_coverage_page WHERE section_name = 'section_two'");
if (mysqli_num_rows($section_two) > 0) {
    $section_two_data = mysqli_fetch_assoc($section_two);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = $db->db("DELETE FROM media_coverage_page WHERE id = '$id'");
    if ($res) {
        redirect('cms-media-coverage.php');
    }
}

?>
<div class="d-flex align-items-center mb-4 flex-wrap">
    <h4 class="fs-20 font-w600  me-auto">CMS Media Coverage</h4>
</div>
<!-- Meta Details -->

<div class="row">
    <div class="col-xl-12">
        <form method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="bg-primary sec-head">
                    <h4 class="text-white p-3 bg-primary d-inline-block">Meta Details</h4>
                    <div class="form-check form-switch float-end d-inline-block my-3 px-4">
                        <input class="form-check-input" onchange="changeStatus('media_coverage_page', <?php echo $meta_data['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $meta_data['status'] === '1' ? 'checked' : '' ?>>
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
                            <input class="form-check-input" onchange="changeStatus('media_coverage_page', <?php echo $careerData['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $careerData['status'] === '1' ? 'checked' : '' ?>>
                            <label class="form-check-label text-white" for="flexSwitchCheckDefault">Hide/Show</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
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
                                    <input required type="text" name="main_image" class="form-control solid" aria-label="name" <?php if ($careerData) { ?> value="<?php echo $careerData['main_image'] ?>" <?php } ?>>
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
            <h4 class="mt-4 text-white p-3 bg-primary sec-head">Media Coverage</h4>
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12  col-md-6 mb-4">
                                <label class="form-label font-w600">Page URL<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" placeholder="page URL" required name="iframe" class="form-control solid" aria-label="name">
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

    <div class="row">
        <?php
        $seectionThreeLines = $db->db("SELECT * FROM media_coverage_page WHERE main_title IS NULL AND section_name='section_two'");
        while ($row = mysqli_fetch_assoc($seectionThreeLines)) {
            $article = OpenGraph::fetch($row['iframe']);
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="jobs2 text-center card-body">
                        <div class="text-center">
                            <span class="">
                                <img height="50px" widht="50px" src="<?php echo $article->image ?>">
                            </span>
                            <h4 class="fs-20 mb-0"></h4>
                            <span class="text-primary mb-3 d-block"></span>
                        </div>
                        <div class="mb-3">
                            <h6><?php echo $article->title ?></h6>
                        </div>
                        <div class="action-buttons d-flex justify-content-center">
                            <a href="cms-media-coverage.php?id=<?php echo $row['id'] ?>" class="btn btn-danger light">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </a>
                            <div class="form-check form-switch d-flex align-items-center mx-1">
                                <input class="form-check-input" onchange="changeStatus('media_coverage_page', <?php echo $row['id'] ?>, this)" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 2.5em;" <?php echo $row['status'] === '1' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
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
            .then(editor => {
                editor.ui.view.editable.element.style.height = '500px';
            })
            .catch(error => {
                console.error(error);
            });
        // ClassicEditor
        // .create(document.querySelector('#editor3'))
        // .catch(error => {
        //     console.error(error);
        // });
        // ClassicEditor
        // .create(document.querySelector('#editor4'))
        // .catch(error => {
        //     console.error(error);
        // });
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