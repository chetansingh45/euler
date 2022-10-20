<?php
namespace DB;
class DB{
    public $last_id;
    
/*
|Database function
===================== */
    public function db($sql){
        global $last_id, $response;
        $conn = mysqli_connect("localhost", "root", "", "euler") or die('connection error');
        // $response['error'] = $sql;
        $res = $conn -> query($sql);
        $this->last_id = $conn -> insert_id;
        $conn->close();
        return $res;
    }
/*
|To filter user input
===================== */
    public function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data=  addslashes($data);
        return $data;
    }

/*
|Decode the filter
===================== */
    public function input_decode($str) {
        $clear = strip_tags($str);
        $clear = html_entity_decode($clear);
        $clear = urldecode($clear);
        $clear = preg_replace('/ +/', ' ', $clear);
        $clear = trim($clear);
        return $clear;
    }


/*
|Global error file
===================== */
    public function error($success, $message){
        global $response;
        $response['success'] = $success;
        $response['message'] = $message;
    }

/*
|Application Path
===================== */
    public function getPath() {
        $domain = "http://".$_SERVER['HTTP_HOST'];
        $domain .= "/Euler/admin/";
        return $domain;
    }

/*
|Check null
===================== */
    public function checkNull($data) {
        if($data != null && $data != '') return true;
        return false;
    }
}

/*
|Constant
===================== */
// Paytm
define("MID_STAGING", "EULERM32852334471090");
define("MKEY_STAGING", "pfrA_Rj1Oic#00j0");

// Application
define("APP_NAME", "EULER");

define("APP_URL", "https://www.eulermotors.com/");

// Booking
define("BOOKING_AMOUNT", 999);

// Sms Api
define("SMS_URL", "https://admagister.net/api/mt/SendSMS?user=eulermotors2020&password=eulermotors2020&senderid=EULERM&channel=Trans&DCS=0&flashsms=0");
define("DB_NAME", "euler");

?>
