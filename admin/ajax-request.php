<?php
include('php/helper/db.php');
use DB\DB;
$db = new DB();

/*----------------------------------
Cms Index Page
----------------------------------*/

if(isset($_POST['page']) && $_POST['page']=='cms-index'){
    $action = '';
    $id = '';

    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(isset($_POST['id'])){
        $id =  $_POST['id'];
    }
   
    if($id == '' || $id==null || $action == '' || $action ==null){
        echo exit(json_encode("invalid request"));
    }
    ///edit slider
    if($action=='edit-slider'){
        $res = $db->db("SELECT * FROM home_page WHERE id='$id'");
        $res = mysqli_fetch_assoc($res);
        echo exit(json_encode($res));
    }
    ////update slider
    if($action=='update-slider'){
        $image = $_POST['image'];
        $logo = $_POST['logo'];
        $description = $_POST['description'];
        $slide_title = $_POST['slide_title'];
        $footer_title = $_POST['footer_title'];
        $sql = "UPDATE home_page SET main_image='$image',logo='$logo',description='$description',title='$slide_title',footer_title='$footer_title' WHERE id='$id'";
        $res = $db->db($sql);
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
        }

    //update asset

    if($action=='update-asset'){
        $logo = $_POST['logo'];
        $sql = "UPDATE home_page SET logo='$logo' WHERE id='$id'";
        $res = $db->db($sql);
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }

    ///update news

    if($action=='update-news'){
        $image = $_POST['image'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $news_btn_text = $_POST['news_btn_text'];
        $news_btn_link = $_POST['news_btn_link'];

        $sql = "UPDATE home_page SET title='$title',main_image='$image',btn_link='$news_btn_link',description='$description',btn_text='$news_btn_text' WHERE id='$id'";
        $res = $db->db($sql);
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }

    ///update accolade

    if($action=='update-accolade'){
        $image = $_POST['image'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $sql = "UPDATE home_page SET title='$title',main_image='$image',description='$description' WHERE id='$id'";
        $res = $db->db($sql);
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }
}

/*------------------------------------
Cms Telematics Page
-------------------------------------*/

if(isset($_POST['page']) && $_POST['page']=='cms-telematics'){
    $action = '';
    $id = '';

    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(isset($_POST['id'])){
        $id =  $_POST['id'];
    }
   
    if($id == '' || $id==null || $action == '' || $action ==null){
        echo exit(json_encode("invalid request"));
    }

    ///update section second left logo

    if($action=='update-section-second-left'){
        $title = $_POST['title'];
        $logo = $_POST['logo'];
        $res = $db->db("UPDATE telematics_page SET title='$title',logo='$logo' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }
}

/*------------------------------------
Cms Technology Page
-------------------------------------*/

if(isset($_POST['page']) && $_POST['page']=='cms-technology'){
    $action = '';
    $id = '';

    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(isset($_POST['id'])){
        $id =  $_POST['id'];
    }
   
    if($id == '' || $id==null || $action == '' || $action ==null){
        echo exit(json_encode("invalid request"));
    }

    ///update section second

    if($action=='update-section-second'){
        $title = $_POST['title'];
        $logo = $_POST['logo'];
        $res = $db->db("UPDATE technology_page SET title='$title',logo='$logo' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }

    //update section three

    if($action=='update-section-three'){
        $title = $_POST['title'];
        $logo = $_POST['logo'];
        $res = $db->db("UPDATE technology_page SET title='$title',logo='$logo' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }

    //update section four

    if($action=='update-section-four'){
        $title = $_POST['title'];
        $logo = $_POST['logo'];
        $res = $db->db("UPDATE technology_page SET title='$title',logo='$logo' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }
}

/*------------------------------------
Cms Euler-Mobility Page
-------------------------------------*/

if(isset($_POST['page']) && $_POST['page']=='cms-euler-mobility'){
    $action = '';
    $id = '';

    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(isset($_POST['id'])){
        $id =  $_POST['id'];
    }
   
    if($id == '' || $id==null || $action == '' || $action ==null){
        echo exit(json_encode("invalid request"));
    }

    // update section second

    if($action=='update-section-second'){
        $title = $_POST['title'];
        $logo = $_POST['logo'];
        $res = $db->db("UPDATE mobility_page SET title='$title',logo='$logo' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }

    // update section three

    if($action=='update-section-three'){
        $title = $_POST['title'];
        $logo = $_POST['logo'];
        $res = $db->db("UPDATE mobility_page SET title='$title',logo='$logo' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }

    // update section four

    if($action=='update-section-four'){
        $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
        $logo = $_POST['logo'];
        $res = $db->db("UPDATE mobility_page SET description='$title',logo='$logo' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }
}

/*------------------------------------
Cms Charging Station Page
-------------------------------------*/

if(isset($_POST['page']) && $_POST['page']=='cms-charging-station'){
    $action = '';
    $id = '';

    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(isset($_POST['id'])){
        $id =  $_POST['id'];
    }
   
    if($id == '' || $id==null || $action == '' || $action ==null){
        echo exit(json_encode("invalid request"));
    }

    if($action=='update-section-icon'){
        $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
        $logo = $_POST['logo'];
        $res = $db->db("UPDATE charging_station_page SET title='$title',logo='$logo' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }
}


/*------------------------------------
Cms Charging Station Page
-------------------------------------*/

if(isset($_POST['page']) && $_POST['page']=='cms-hiload'){
    $action = '';
    $id = '';

    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(isset($_POST['id'])){
        $id =  $_POST['id'];
    }
   
    if($id == '' || $id==null || $action == '' || $action ==null){
        echo exit(json_encode("invalid request"));
    }
    ///update hero section
    if($action=='update-hero'){
        $image_alt = $_POST['image_alt'];
        $image = $_POST['image'];
        $res = $db->db("UPDATE hiload_page SET main_image='$image',main_image_alt='$image_alt' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }

    //update all section
    if($action=='update-section'){
        $logo_alt = $_POST['logo_alt'];
        $title = $_POST['title'];
        $description =  filter_var($_POST['description'],FILTER_SANITIZE_STRING);
        $logo = $_POST['logo'];
        $res = $db->db("UPDATE hiload_page SET logo='$logo',logo_alt='$logo_alt',description='$description',title='$title' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }
}



/*------------------------------------
Cms About Us Page
-------------------------------------*/

if(isset($_POST['page']) && $_POST['page']=='cms-about-us'){
    $action = '';
    $id = '';

    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(isset($_POST['id'])){
        $id =  $_POST['id'];
    }
   
    if($id == '' || $id==null || $action == '' || $action ==null){
        echo exit(json_encode("invalid request"));
    }

    if($action=='update-year'){
        $title = $_POST['title'];
        $description =  filter_var($_POST['description'],FILTER_SANITIZE_STRING);
        $logo = $_POST['logo'];
        $res = $db->db("UPDATE about_page_items SET logo='$logo',description='$description',title='$title' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }

    if($action=='delete-year'){
        $res = $db->db("DELETE FROM about_page_items WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }

    if($action=='update-section'){
        $logo = $_POST['logo'];
        $title = $_POST['title'];
        $res = $db->db("UPDATE about_page SET logo='$logo',title='$title' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }

    if($action=='update-team'){
        $logo = $_POST['logo'];
        $logo_alt = $_POST['logo_alt'];
        $res = $db->db("UPDATE about_page SET logo='$logo',logo_alt='$logo_alt' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }
}


/*------------------------------------
Cms Charging Station Page
-------------------------------------*/

if(isset($_POST['page']) && $_POST['page']=='cms-faq'){
    $action = '';
    $id = '';

    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(isset($_POST['id'])){
        $id =  $_POST['id'];
    }
   
    if($id == '' || $id==null || $action == '' || $action ==null){
        echo exit(json_encode("invalid request"));
    }

    if($action=='update-section'){
        $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
        $res = $db->db("UPDATE faq_page SET title='$title',description='$description' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }
}

//changing section status using get requeset
if(isset($_GET['page_name']) && isset($_GET['section_id']) && isset($_GET['section_status'])){
    $page_name = filter_var($_GET['page_name'],FILTER_SANITIZE_STRING);
    $section_id = filter_var($_GET['section_id'],FILTER_SANITIZE_STRING);
    $section_status = filter_var($_GET['section_status'],FILTER_SANITIZE_STRING);
    $process = $db->db("UPDATE `$page_name` SET `status` = '$section_status' WHERE `id` = '$section_id'");
    if($process){
        $respose = json_encode(array("status" => "success", "msg" => "Element status updated."));
    }else{
        $respose = json_encode(array("status" => "failed", "msg" => "Something went wrong."));
    }
    echo $respose;
}

///submit_popup_form
if(isset($_POST['action'])  && $_POST['action']=='save_popup_form'){
    $data = $_POST['data'];
    $columns = '';
    $values = '';
    foreach($data as $key => $value){
        $columns .=$value['name'].',';
        $values .="'{$value['value']}',";
    }
    $columns = rtrim($columns,',');
    $values = rtrim($values,',');
    $sql = "INSERT INTO form_data ($columns) VALUES ($values)";
    $res = $db->db($sql);
    if($res){
        echo exit(json_encode(['success'=>true]));
    }
}

/*------------------------------------
Cms EEP  Page
-------------------------------------*/

if(isset($_POST['page']) && $_POST['page']=='cms-eep'){
    $action = '';
    $id = '';

    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(isset($_POST['id'])){
        $id =  $_POST['id'];
    }
   
    if($id == '' || $id==null || $action == '' || $action ==null){
        echo exit(json_encode("invalid request"));
    }

    if($action=='update-section-two'){
        $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
        $res = $db->db("UPDATE eep_page SET title='$title' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }

    if($action=='update-section-icon'){
        $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
        $logo = $_POST['logo'];
        $res = $db->db("UPDATE eep_page SET title='$title',logo='$logo' WHERE id='$id'");
        if($res){
            echo "1";
            exit();
        }else{
            echo "0";
            exit();
        }
    }
}

?>