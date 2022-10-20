<?php
session_start();
require('./../../../php/helper/db.php');

use DB\DB;

if (!isset($_SESSION['user'])) $message = "You are not LoggedIn";
else {

    $DB = new DB();

    $success = false;
    $message = "Something went wrong!";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $DB = new DB();
        $id = $DB->input($_GET['id']);

        $res = $DB->db("select id, partnership, state_applied_for, city_applied_for, current_business_detail, experience, years, partnered_with, annual_turnover, land_detail, comment, amount_willing_to_invest from dealership where id = '$id'");

        if (mysqli_num_rows($res) === 1) {
            $row = mysqli_fetch_assoc($res);
            $success = true;
            $message = "success";
        } else $message = "No records found!";
    } else $message = "Request method not accepted";
}

echo json_encode(["success" => $success, "message" => $message, "data" => $row ?? false]);
