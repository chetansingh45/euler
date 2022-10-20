<?php
session_start();
    $success = false;
    $message = "Something went wrong!";
    $txnToken = false;
    
    use DB\DB;
    use Payment\Paytm;
    use Mailer\Emailer;

    require('./../../helper/db/db.php');
    require('./../../helper/payment/paytm.php');
    require('./../../helper/mailer/emailer.php');
    require_once("./../../../vendor/paytm/paytmchecksum/PaytmChecksum.php");
    require './../../../phpmailer/autoload.php';

    
    $DB = new DB();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;  

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $order_id = $DB -> input($_POST['ORDERID']);
        $res = $DB->db("select o.id, o.status, o.booking_id,  o.invoice_no, o.total_amount, o.actual_amount, o.state, o.city, o.showroom, o.finance, o.email, o.firstname, o.lastname, o.phone, p.image_url, p.name as product_name, p.sku_name from orders as o, product_sku as p where o.booking_id = '$order_id' && p.id = o.product_sku_id");
        if(mysqli_num_rows($res) === 0)
        {
            $message = "Booking Id connected to transaction is Invalid!";
        } else
        {
            $orderdetails = mysqli_fetch_assoc($res);

            $updated_at = date('Y-m-d h:i:s');
            $invoice_no = "";
            
            do{
                $invoice_no = 'INV'.time().rand(0,1000);
                $res = $DB -> db("select id from orders where invoice_no = '$invoice_no'");
            } while(mysqli_num_rows($res) === 1);

            $transaction_id = false;
            if($_POST['STATUS'] === 'TXN_SUCCESS') $transaction_id = $_POST['TXNID'];
            else if($_POST['STATUS'] === 'TXN_FAILURE') $transaction_id = "failed";
            else if($_POST['STATUS'] === 'PENDING') $transaction_id = "pending";

            $transaction_detail = json_encode($_POST);

            
            $res = $DB -> db("update orders set transaction_id = '$transaction_id', invoice_no = '$invoice_no', transaction_detail = '$transaction_detail', updated_at = '$updated_at' where booking_id = '$order_id'");
            if($res)
            {
                $sendMail = new Emailer();
                ob_start();
                include('./../../../thankyou-emailer.php');
                $mailBody = ob_get_contents();
                $sendMail -> sendMail((object)[
                    'to' => $orderdetails['email'],
                    'subject' => 'Euler',
                    'body' => $mailBody,
                ]);
                ob_end_clean();

                $success = true;
                $message = "success";
            }

            $_SESSION['payment'] = (object)[
                "success" => $success,
                "message" => $message,
                "payment" => $transaction_id ?? false,
                "order_id" => $order_id
            ];
        }
        header("Location: ./../../../thankyou.php");
    } else $message = "Request method not supported!";
?>