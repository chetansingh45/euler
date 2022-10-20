<?php
    $success = false;
    $message = "Something went wrong!";
    $txnToken = false;
    
    require('./../../helper/db/db.php');
    require('./../../helper/sms/sms_admagister.php');
    require('./../../helper/payment/paytm.php');
    require_once("./../../../vendor/paytm/paytmchecksum/PaytmChecksum.php");

    use DB\DB;
    use Payment\Paytm;
    use SMS\Sms_Admagister;
    $DB = new DB();
    $temp_request_for = false;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $flag = 1;
        $required = ["state", "city", "showroom", "finance", "email", "firstname", "lastname", "phone", "pincode"];
        foreach($required as $validate)
        {
            if(!isset($_POST[$validate]) || $_POST[$validate] === '') 
            {
                $flag = 0;
                $message = "{$validate} is required";
                break;
            }
        }
        if($flag === 1)
        {
            if(!isset($_POST['product'])) $message = "Product not available! Try again later";
            else
            {
                $product = $DB -> input($_POST['product']);
                
                $res = $DB->db("select s.id, s.reference_id, s.name, s.selling_price, c.name as category_name from product_sku as s, product as p, category as c where s.reference_id = '$product' && p.id=s.product_id && c.id=p.category_id");
                if(mysqli_num_rows($res) === 1)
                {
                    
                    $request_for = $DB -> input($_POST['request_for']);
                    $phone = $DB -> input($_POST['phone']);
                    
                    /*
                    |Request for otp or resend otp
                    ============================== */
                    if($request_for === 'otp' || $request_for === 'resend')
                    {
                        if(!isset($_POST['phone'])) $message = "Phone number is required";
                        else
                        {
                            $otp = rand(1000,9999);
                            $sms_magister = new Sms_Admagister();
                            $request = $sms_magister -> sendOTP($phone, $otp);
                            if($request['success'])
                            {
                                $success = true;
                                $message = "OTP Sent";
                                $temp_request_for = 'verify';
                                $_SESSION['booking_otp'] = (object)['phone' => $phone, 'otp' => $otp];
                            } else $message = "Unable to send OTP! Pls try again later";
                        }
                    } else if(isset($_SESSION['booking_otp']) && $request_for === 'verify')
                    {
                    
                        $product = mysqli_fetch_assoc($res);
    
                        $state = $DB -> input($_POST['state']);
                        $city = $DB -> input($_POST['city']);
                        $showroom = $DB -> input($_POST['showroom']);
                        $finance = $DB -> input($_POST['finance']);
                        $email = $DB -> input($_POST['email']);
                        $firstname = $DB -> input($_POST['firstname']);
                        $lastname = $DB -> input($_POST['lastname']);
                        $phone = $DB -> input($_POST['phone']);
                        $pincode = $DB -> input($_POST['pincode']);
                        $otp = $DB -> input($_POST['otp']);
                        
                        if($_SESSION['booking_otp'] -> phone != $phone) $message = "You might have changed your phone number! Pls verify again";
                        else if((int)$_SESSION['booking_otp'] -> otp != (int)$otp) $message = "Incorrect OTP";
                        else if((int)$_SESSION['booking_otp'] -> otp == (int)$otp && $_SESSION['booking_otp'] -> phone == $phone)
                        {
                            do{
                                $order_id = 'BK'.time();
                                $res = $DB -> db("select id from orders where booking_id = '$order_id'");
                            } while(mysqli_num_rows($res) === 1);
        
                            $updated_at = date('Y-m-d h:i:s');
                            $booking_amount = BOOKING_AMOUNT;
                            $res = $DB -> db("insert into orders (booking_id, product_sku_id, total_amount, actual_amount, state, city, showroom, finance, email, firstname, lastname, phone, pincode, updated_at) values('$order_id', '{$product['id']}', '$booking_amount', '$booking_amount', '$state', '$city', '$showroom', '$finance', '$email', '$firstname', '$lastname', '$phone', '$pincode', '$updated_at')");
                            if($res)
                            {
                                /*
                                |Paytm
                                ======================= */
                                $order_detail = [
                                    'order_id' => $order_id,
                                    "amount" => BOOKING_AMOUNT,
                                    "customer_name" => $firstname.' '.$lastname
                                ];
                                $payment = new Paytm();
                                if($finance && 1==2)
                                {
                                    $txnToken = $payment -> getTxnTokenforEmi($order_detail);
                                    $emiSubventionObject = $payment -> bankEmiSubvention($product, $order_detail);
                                } else $txnToken = $payment -> getTxnToken($order_detail);
                                
        
                                if($txnToken['success'])
                                {
                                    $message = "success"; $success = true; 
                                } else $message = $txnToken['message'];
                            }
                        } else $message = "Incorrect OTP!";
                    } else $message = "Resend OTP";
                    $product = mysqli_fetch_assoc($res);

                    $state = $DB -> input($_POST['state']);
                    $city = $DB -> input($_POST['city']);
                    $showroom = $DB -> input($_POST['showroom']);
                    $finance = $DB -> input($_POST['finance']);
                    $email = $DB -> input($_POST['email']);
                    $firstname = $DB -> input($_POST['firstname']);
                    $lastname = $DB -> input($_POST['lastname']);
                    $phone = $DB -> input($_POST['phone']);
                    $pincode = $DB -> input($_POST['pincode']);

                    do{
                        $order_id = 'BK'.time();
                        $res = $DB -> db("select id from orders where booking_id = '$order_id'");
                    } while(mysqli_num_rows($res) === 1);

                    $updated_at = date('Y-m-d h:i:s');
                    $booking_amount = BOOKING_AMOUNT;
                    $res = $DB -> db("insert into orders (booking_id, product_sku_id, total_amount, actual_amount, state, city, showroom, finance, email, firstname, lastname, phone, pincode, updated_at) values('$order_id', '{$product['id']}', '$booking_amount', '$booking_amount', '$state', '$city', '$showroom', '$finance', '$email', '$firstname', '$lastname', '$phone', '$pincode', '$updated_at')");
                    if($res)
                    {
                        /*
                        |Paytm
                        ======================= */
                        $order_detail = [
                            'order_id' => $order_id,
                            "amount" => BOOKING_AMOUNT,
                            "customer_name" => $firstname.' '.$lastname
                        ];
                        $payment = new Paytm();
                        if($finance && 1==2)
                        {
                            $txnToken = $payment -> getTxnTokenforEmi($order_detail);
                            $emiSubventionObject = $payment -> bankEmiSubvention($product, $order_detail);
                        } else $txnToken = $payment -> getTxnToken($order_detail);
                        
                        
                        if($txnToken['success'])
                        {
                            $message = "success"; $success = true; 
                        } else $message = $txnToken['message'];
                    }
                } else $message = "Product not available! Try again later";
            }
        }

    } else $message = "Request method not supported!";

echo  json_encode([
    "success" => $success,
    "message" => $message,
    "data" => $txnToken['data'] ?? false,
    "order" => $order_detail ?? false,
    "finance" => $finance ?? 0,
    "emiSubventionObject" => $emiSubventionObject ?? false,
    "request_for" => $temp_request_for,
    "emiSubventionObject" => $emiSubventionObject ?? false
]);
?>