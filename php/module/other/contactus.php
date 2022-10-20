<?php
    $success = false;
    $message = "Something went wrong!";
    
    require('./../../helper/db/db.php');
    require './../../../phpmailer/autoload.php';
    require('./../../helper/mailer/emailer.php');

    use DB\DB;
    use Mailer\Emailer;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    $DB = new DB();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $flag = 1;
        $required = ["name", "mobile", "email", "enquiry_type", "message"];
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
            $name = $DB -> input($_POST['name']);
            $mobile = $DB -> input($_POST['mobile']);
            $email = $DB -> input($_POST['email']);
            $enquiry_type = $DB -> input($_POST['enquiry_type']);
            $msg = $DB -> input($_POST['message']);

            $res = $DB -> db("insert into contactus (name, mobile, email, enquiry_type, message) values('$name', '$mobile', '$email', '$enquiry_type', '$msg')");
            if($res)
            {
                $success = true;
                $message = "Thank you for contacting us. We will get back to you soon.";
                
                $sendMail = new Emailer();
                ob_start();
                include('./../../../thankyou-emailer-contact.php');
                $mailBody = ob_get_contents();
                $sendMail -> sendMail((object)[
                    'to' => $email,
                    'subject' => 'Euler Contact Us',
                    'body' => $mailBody,
                ]);
                ob_end_clean();
            }
        }
    } else $message = "Request method not supported!";

echo  json_encode([
    "success" => $success,
    "message" => $message
]);
?>