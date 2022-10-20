<?php
namespace SMS;

class Sms_Admagister{
    
    public function sendOTP($mobile, $otp) {
        $success = false;
        $message = "Something went wrong!";

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://admagister.net/api/mt/SendSMS?user=eulermotors2020&password=eulermotors2020&senderid=EULERM&channel=Trans&DCS=0&flashsms=0&number='.$mobile.'&text=Your%20One%20Time%20Password%20(OTP)%20is%20'.$otp.'-%20EULER',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response);
        if(isset($result -> ErrorMessage) && $result -> ErrorMessage == 'Done')
        {
            $success = true;
            $message = "otp sent";
        }
        return [
            "success" => $success,
            "message" => $message,
        ];
    }
}

?>