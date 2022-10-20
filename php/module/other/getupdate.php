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
        $required = ["genderprefix", "firstname", "lastname", "email", "mobile", "designation", "industry", "organization"];
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
            $genderprefix = $DB -> input($_POST['genderprefix']);
            $firstname = $DB -> input($_POST['firstname']);
            $lastname = $DB -> input($_POST['lastname']);
            $email = $DB -> input($_POST['email']);
            $mobile = $DB -> input($_POST['mobile']);
            $designation = $DB -> input($_POST['designation']);
            $industry = $DB -> input($_POST['industry']);
            $organization = $DB -> input($_POST['organization']);

            $res = $DB -> db("select id from getupdates where email = '$email'");
            if(mysqli_num_rows($res) === 0)
            {
                $res = $DB -> db("insert into getupdates (genderprefix, firstname, lastname, email, mobile, designation, industry, organization) values('$genderprefix', '$firstname', '$lastname', '$email', '$mobile', '$designation', '$industry', '$organization')");
                if($res)
                {
                    $success = true;
                    $message = "Thank you for subscribing our Newsletter.";
                    
                    $sendMail = new Emailer();
                    ob_start();
                    include('./../../../thankyou-emailer-newsletter.php');
                    $mailBody = ob_get_contents();
                    $sendMail -> sendMail((object)[
                        'to' => $email,
                        'subject' => 'Euler Newsletter',
                        'body' => $mailBody,
                    ]);
                    ob_end_clean();
                }
            } else $message = "You have already subscribed to our Newsletter";
        }
    } else $message = "Request method not supported!";

echo  json_encode([
    "success" => $success,
    "message" => $message
]);
?>