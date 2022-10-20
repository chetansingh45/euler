<?php
session_start();
require('./../../../php/helper/db.php');

use DB\DB;
if(!isset($_SESSION['admin'])) $message = "You are not LoggedIn";
else
{

    $DB = new DB();
    
    $success = false;
    $message = "Something went wrong!";
    
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $DB = new DB();
        $id = $DB -> input($_GET['id']);
        
        $res = $DB -> db("select id from getupdates where id = '$id'");

        if(mysqli_num_rows($res) === 1)
        {
            $row = mysqli_fetch_assoc($res);
            $res = $DB -> db("delete from getupdates where id = '{$row['id']}'");
            $success = true; 
            $message = "Successfully deleted";
        } else $message = "Record you are trying to delete does not exist in our database!";

    } else $message = "Request method not accepted";
}

echo json_encode(["success" => $success, "message" => $message]);
?>