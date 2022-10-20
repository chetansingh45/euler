<?php
session_start();

// if(isset($_SESSION['admin'])) header("Location: ./../../../login.php");

require('./../../../php/helper/db.php');

use DB\DB;
$DB = new DB();

$success = false;
$message = "Something went wrong!";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $required = ['email', 'password'];
    $flag = 1;
    foreach($required as $value)
    {
        if($_POST[$value] == ''){
            $message = "$value is required!";
            $flag = 0; break;
        }
    }
    if($flag)
    {
        $DB = new DB();
        $email = $DB -> input($_POST['email']);
        $password = $DB -> input($_POST['password']);
        /*
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $updated_at = date('Y-m-d');
        $res = $DB -> db("insert into admin (name, email, password, updated_at) values('Super Admin', '$email', '$hash_password', '$updated_at')");
        die();
        */
        $res = $DB -> db("select id, email, name, password from admin where email = '$email'");

        if(mysqli_num_rows($res) === 1)
        {
            $row = mysqli_fetch_assoc($res);
            if(password_verify($password, $row['password']))
            {
                $_SESSION['admin'] = (object)[
                    'id' => $row['id'],
                    'email' => $row['email'],
                    'name' => $row['name']
                ];
                $success = true; 
                $message = "Successfully LoggedIn";
            } else $message = "Either email or password is incorrect!";
        } else $message = "Either email or password is incorrect!";
    }

} else $message = "Request method not accepted";

echo json_encode(["success" => $success, "message" => $message]);
?>