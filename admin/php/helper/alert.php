<?php
 
    function alert($title, $message,$color){
        echo "
            <script>swal('$title','$message','$color')</script>
        ";
    }

    function filter($value){
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        return $value;
    }

    function redirect($page){
        if($_SERVER['SERVER_NAME']=='localhost'){
            // $adminUrl = "http://localhost/euler-fork/admin/";
            $adminUrl = "http://localhost/euler-new1/admin/";
        }else{
            $adminUrl = "https://www.eulermotors.com/admin/";
        }
        
        echo "
        <script>location.href='".$adminUrl.$page."'</script>
    ";
    }

    function isNull($data){
        if($data=="" || $data==null){
            return true;
        }
        return false;
    }

    // function exists($tbl_name,$condition){
    //     $conn = mysqli_connect("localhost", "root", "", "euler") or die('connection error');
    //     $sql = "SELECT * FROM $tbl_name WHERE $condition";
    //     $query = mysqli_query($conn,$sql);
    //     if(mysqli_num_rows($query) > 0){
    //         return true;
    //     }
    //     return false;
    // }

    function console($sql){
        echo '<script>console.log("'.$sql.'")</script>';
        die();
    }
?>
