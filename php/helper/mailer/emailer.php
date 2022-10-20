<?php
namespace Mailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Emailer{
    
    public function sendMail($email) {
        $success = false;
        $message = "Something went wrong!";

        $mail = new PHPMailer;
        $mail->SMTPDebug = 2; 
        // $mail->IsSMTP();
        $mail->Host = 'ssl://smtp.sendinblue.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'marketing@eulermotors.com';
        $mail->Password = 'Euler@12345';
        $mail->SMTPSecure = 'TLS';
        $mail->Port = 587;
        $mail->setFrom('marketing@eulermotors.com', 'Euler');
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'anku.pathak@webeesocial.com';
        $mail->Password = 'webeesocial2020';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('info@euler.com', 'Euler');
        $mail->addAddress($email -> to);
        $mail->isHTML(true);
        $mail->Subject = $email -> subject;
        $mail->Body = $email -> body;
        if($mail->send()) 
        if ($mail->send()) 
        if ($mail->send()) 
        {
            $success = true;
            $message = "success";
        }

        return [
            "success" => $success,
            "message" => $message,
            // "data" => $data
        ];
    }
}

?>