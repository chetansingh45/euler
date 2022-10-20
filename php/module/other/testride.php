<?php
session_start();
    $success = false;
    $message = "Something went wrong!";
    
    require('./../../helper/db/db.php');
    require('./../../helper/sms/sms_admagister.php');
    require './../../../phpmailer/autoload.php';
    require('./../../helper/mailer/emailer.php');

    use DB\DB;
    use SMS\Sms_Admagister;
    use Mailer\Emailer;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception; 
    $DB = new DB();
    $temp_request_for = false;
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(!isset($_POST['request_for'])) $message = "Something went wrong! Pls Try again later";
        else
        {
            $flag = 1;
            $required = ["name", "mobile", "email", "state", "city", "pincode", "purchaseplan", "vehicle_owned"];
            foreach($required as $validate)
            {
                if(!isset($_POST[$validate]) || $_POST[$validate] === '') 
                {
                    $flag = 0;
                    $message = "{$validate} is required";
                    break;
                }
            }
            
            if($flag)
            {
                $request_for = $DB -> input($_POST['request_for']);
                $mobile = $DB -> input($_POST['mobile']);
                
                /*
                |Request for otp or resend otp
                ============================== */
                if($request_for === 'otp' || $request_for === 'resend')
                {
                    if(!isset($_POST['mobile'])) $message = "Mobile number is required";
                    else
                    {
                        $otp = rand(1000,9999);
                        $sms_magister = new Sms_Admagister();
                        $request = $sms_magister -> sendOTP($mobile, $otp);
                        if($request['success'])
                        {
                            $success = true;
                            $message = "OTP Sent";
                            $temp_request_for = 'verify';
                            $_SESSION['testride_otp'] = (object)['mobile' => $mobile, 'otp' => $otp];
                        } else $message = "Unable to send OTP! Pls try again later";
                    }
                } else if(isset($_SESSION['testride_otp']) && $request_for === 'verify')
                {
                    $name = $DB -> input($_POST['name']);
                    $mobile = $DB -> input($_POST['mobile']);
                    $otp = $DB -> input($_POST['otp']);
                    $email = $DB -> input($_POST['email']);
                    $state = $DB -> input($_POST['state']);
                    $city = $DB -> input($_POST['city']);
                    $pincode = $DB -> input($_POST['pincode']);
                    $purchaseplan = $DB -> input($_POST['purchaseplan']);
                    $vehicle_owned = $DB -> input($_POST['vehicle_owned']);
                    $vehicle_owned_type = $DB -> input($_POST['vehicle_owned_type']);
                    $vehicle_owned_brand = $DB -> input($_POST['vehicle_owned_brand']);
                    $vehicle_owned_model = $DB -> input($_POST['vehicle_owned_model']);
                    
                    if($vehicle_owned_brand === 'others') $vehicle_owned_brand = $DB -> input($_POST['vehicle_owned_brand_other']);
                    if($vehicle_owned_model === 'others') $vehicle_owned_model = $DB -> input($_POST['vehicle_owned_model_other']);
                    
                    if($_SESSION['testride_otp'] -> mobile != $mobile) $message = "You might have changed your mobile number! Pls verify again";
                    else if((int)$_SESSION['testride_otp'] -> otp != (int)$otp) $message = "Incorrect OTP";
                    else if((int)$_SESSION['testride_otp'] -> otp == (int)$otp && $_SESSION['testride_otp'] -> mobile == $mobile)
                    {
                        do{
                            $testride_id = 'RIDE'.time().rand(0,1000);
                            $res = $DB -> db("select id from testride where testride_id = '$testride_id'");
                        } while(mysqli_num_rows($res) === 1);
                        
                        $res = $DB -> db("insert into testride (name, testride_id, mobile, email, state, city, pincode, purchaseplan, vehicle_owned, vehicle_owned_type, vehicle_owned_brand, vehicle_owned_model) values('$name', '$testride_id', '$mobile', '$email', '$state', '$city', '$pincode', '$purchaseplan', '$vehicle_owned', '$vehicle_owned_type', '$vehicle_owned_brand', '$vehicle_owned_model')");
                        if($res)
                        {
                            $success = true;
                            $message = "Thank you for booking a Test Drive. We will notify you soon.";
                            unset($_SESSION['testride_otp']);
                            $sendMail = new Emailer();
                            ob_start();
                            include('./../../../thankyou-emailer-testride.php');
                            $mailBody = ob_get_contents();
                            $sendMail -> sendMail((object)[
                                'to' => $email,
                                'subject' => 'Euler Test Ride Booking',
                                'body' => $mailBody,
                            ]);
                            ob_end_clean();
                        }
                    } else $message = "Incorrect OTP!";
                } else $message = "Resend OTP";
            }
        }
    } else $message = "Request method not supported!";

echo  json_encode([
    "success" => $success,
    "message" => $message,
    "testride" => $testride_id ?? false,
    "request_for" => $temp_request_for
]);
?>