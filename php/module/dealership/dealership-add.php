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
        $required = [
            "genderprefix" => "Soultion",
            "name" => "Name",
            "email" => "Email",
            "phone" => "Phone",
            "dob" => "Date of Birth",
            "qualification" => "Educational Qualification",
            "address" => "Address",
            "state" => "State",
            "city" => "City",
            "pincode" => "Pincode",
            "partnership" => "Partnership",
            "state_applied_for" => "State Applied For",
            "city_applied_for" => "City Applied For",
            "current_business_detail" => "Current Business Details",
            "experience" => "Automotive industry experience",
            "years" => "Number of years in business",
            "partnered_with" => "Which companies have you partnered with?",
            "annual_turnover" => "Annual turnover of your business",
            "land_detail" => "Land Details",
            "amount_willing_to_invest" => "Approximate amount you are willing to invest",
        ];
        foreach($required as $validate => $validateerr)
        {
            if(!isset($_POST[$validate]) || $_POST[$validate] === '') 
            {
                $flag = 0;
                $message = "{$validateerr} is required";
                break;
            }
        }
        if($flag)
        {
            $genderprefix = $DB -> input($_POST['genderprefix']);
            $name = $DB -> input($_POST['name']);
            $email = $DB -> input($_POST['email']);
            $phone = $DB -> input($_POST['phone']);
            $dob = $DB -> input($_POST['dob']);
            $qualification = $DB -> input($_POST['qualification']);
            $address = $DB -> input($_POST['address']);
            $state = $DB -> input($_POST['state']);
            $city = $DB -> input($_POST['city']);
            $pincode = $DB -> input($_POST['pincode']);
            $partnership = $DB -> input($_POST['partnership']);
            $state_applied_for = $DB -> input($_POST['state_applied_for']);
            $city_applied_for = $DB -> input($_POST['city_applied_for']);
            $current_business_detail = $DB -> input($_POST['current_business_detail']);
            $experience = $DB -> input($_POST['experience']);
            $years = $DB -> input($_POST['years']);
            $partnered_with = $DB -> input($_POST['partnered_with']);
            $annual_turnover = $DB -> input($_POST['annual_turnover']);
            $land_detail = $DB -> input($_POST['land_detail']);
            $comment = $DB -> input($_POST['comment']);
            $amount_willing_to_invest = $DB -> input($_POST['amount_willing_to_invest']);

            $res = $DB -> db("insert into dealership (genderprefix, name, email, phone, dob, qualification, address, state, city, pincode, partnership, state_applied_for, city_applied_for, current_business_detail, experience, years, partnered_with, annual_turnover, land_detail, comment, amount_willing_to_invest) values('$genderprefix', '$name', '$email', '$phone', '$dob', '$qualification', '$address', '$state', '$city', '$pincode', '$partnership', '$state_applied_for', '$city_applied_for', '$current_business_detail', '$experience', '$years', '$partnered_with', '$annual_turnover', '$land_detail', '$comment', '$amount_willing_to_invest')");
            $res = $DB -> db("insert into dealership (genderprefix, name, email, dob, qualification, address, state, city, pincode, partnership, state_applied_for, city_applied_for, current_business_detail, experience, years, partnered_with, annual_turnover, land_detail, comment, amount_willing_to_invest) values('$genderprefix', '$name', '$email', '$dob', '$qualification', '$address', '$state', '$city', '$pincode', '$partnership', '$state_applied_for', '$city_applied_for', '$current_business_detail', '$experience', '$years', '$partnered_with', '$annual_turnover', '$land_detail', '$comment', '$amount_willing_to_invest')");

            $res = $DB -> db("insert into dealership (genderprefix, name, email, dob, qualification, address, state, city, pincode, partnership, state_applied_for, city_applied_for, current_business_detail, experience, years, partnered_with, annual_turnover, land_detail, comment, amount_willing_to_invest) values('$genderprefix', '$name', '$email', '$dob', '$qualification', '$address', '$state', '$city', '$pincode', '$partnership', '$state_applied_for', '$city_applied_for', '$current_business_detail', '$experience', '$years', '$partnered_with', '$annual_turnover', '$land_detail', '$comment', '$amount_willing_to_invest')");

            if($res)
            {
                $success = true;
                $message = "Thank you for showing interest in a retail partnership with Euler Motors. Our team will reach out to you for more details.";
                $sendMail = new Emailer();
                ob_start();
                include('./../../../thankyou-emailer-dealership.php');
                $mailBody = ob_get_contents();
                $sendMail -> sendMail((object)[
                    'to' => $email,
                    'subject' => 'Euler Dealership',
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
