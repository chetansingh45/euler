<?php
namespace Payment;
use DB\DB;
use PaytmChecksum;

class Paytm extends DB{
    
    public function getTxnToken($order) {
        $success = false;
        $message = "Something went wrong!";
        
        $paytmParams = array();

        $paytmParams["body"] = array(
            "requestType"   => "Payment",
            "mid"           => MID_STAGING,
            "websiteName"   => "Euler",
            "orderId"       => $order['order_id'],
            "callbackUrl"   => "https://www.eulermotors.com/php/module/order/pay_callback.php",
            "txnAmount"     => array(
                "value"     => BOOKING_AMOUNT,
                "currency"  => "INR",
            ),
            "userInfo"      => array(
                "custId"    => $order['customer_name'],
            ),
        );

        $checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY_STAGING);
        $paytmParams["head"] = array(
            "signature"    => $checksum
        );

        $url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=".MID_STAGING."&orderId={$order['order_id']}";
        //$url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=".MID_STAGING."&orderId={$order['order_id']}";
      
        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        $data = $result;
        //echo '<pre>'; print_r($result); echo '</pre>';
	if($result['body']['resultInfo']['resultMsg'] === 'Success')
        {
            $success = true;
            $message = "Success";
            
        } else $message = $result['body']['resultInfo']['resultMsg'];

        return [
            "success" => $success,
            "message" => $message,
            "data" => $data
        ];
    }

    public function getTxnTokenforEmi($order) {
        $paytmParams = array();

        $paytmParams["body"] = array(
            "mid"           => MID_STAGING,
            "referenceId"   => $order['order_id']
        );

        $checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY_STAGING);

        $paytmParams["head"] = array(
            "tokenType"     => "CHECKSUM",
            "token"	    => $checksum
        );

        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

        /* for Staging */
        // $url = "https://securegw-stage.paytm.in/theia/api/v1/token/create?mid=".MID_STAGING."&referenceId={$order['order_id']}";

        /* for Production */
        $url = "https://securegw.paytm.in/theia/api/v1/token/create?mid={mid}&referenceId=ref_987654321";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        $data = $result;

        if($result['body']['resultInfo']['resultMsg'] === 'Success')
        {
            $success = true;
            $message = "Success";
            
        } else $message = $result['body']['resultInfo']['resultMsg'];

        return [
            "success" => $success,
            "message" => $message,
            "data" => $data
        ];    
    }

    public function bankEmiSubvention($product, $order) {
        $paytmParams = array();

        $paytmParams["body"] = array(
            "mid" => MID_STAGING,
            "items" => array(
                    array(
                    "id" => $product['id'],
                    "productId" => $product['reference_id'],
                    // "brandId"        => "BRANDID_98765",
                    "categoryList" => array($product['category_name']),
                    "quantity" => "1",
                    "price" => $product['selling_price'],
                    "verticalId" => "PAYTM_EMI",
                    "isEmiEnabled" => true
                        )
            ),
        );

        /*
        * Generate checksum by parameters we have in body
        * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
        */
        $checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY_STAGING);

        $paytmParams["head"] = array(
            "channelId"     => 'WEB',
            "requestId"     => $order['order_id'],
            "tokenType"     => 'CHECKSUM',
            "token"         => $checksum
        );

        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

        /* for Staging */
        // $url = "https://securegw-stage.paytm.in/theia/api/v1/emiSubvention/banks?mid=".MID_STAGING;

        /* for Production */
        $url = "https://securegw.paytm.in/theia/api/v1/emiSubvention/banks?mid=YOUR_MID_HERE";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        return $result;
    }

    public function fetchPaymentOptionAPi($product, $order, $txn) {
        $paytmParams = array();
        $paytmParams["head"] = array(
        "tokenType" => "TXN_TOKEN",
        'token'     => $txn['data']['body']['txnToken']
        );
        $paytmParams["body"] = array(
        "mid" => MID_STAGING
        );
        /* prepare JSON string for request */
        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
        /* for Staging */
        $url = "https://securegw-stage.paytm.in/theia/api/v2/fetchPaymentOptions?mid=".MID_STAGING."&orderId=".$order['order_id'];

        /* for Production */
        //$url = "https://securegw.paytm.in/theia/api/v2/fetchPaymentOptions?mid=YOUR_MID_HERE&orderId=ORDERID_98765";


        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
        $response = curl_exec($ch);
        // print_r($response);   
        $result = json_decode($response, true);
        return $result;
    }

    public function Paytmcallback($order) {
        $success = false;
        $message = "Something went wrong!";

        $updated_at = date('Y-m-d h:i:s');
        $invoice_no = "";
        do{
            $invoice_no = 'INV'.time().rand(0,1000);
            $res = $this -> db("select id from orders where invoice_no = '$invoice_no'");
        } while(mysqli_num_rows($res) === 1);

        
        $transaction_id = "pending";
        if($order['STATUS'] === 'TXN_SUCCESS')
        {
            $transaction_id = $order['TXNID'];
        }
        $transaction_detail = json_encode($order);
        $res = $this -> db("insert into orders (order_id, customer_id, product_sku_id, transaction_id, invoice_no, billing_address, total_amount, actual_amount, transaction_detail, updated_at) values('{$order['ORDERID']}', '1', '1', '$transaction_id', '$invoice_no', ' ', '{$order['TXNAMOUNT']}', '{$order['TXNAMOUNT']}', '$transaction_detail', '$updated_at')");
        if($res)
        {
            $success = true;
            $message = "success";
        }

        return [
            "success" => $success,
            "message" => $message,
            "order_status" => $order['STATUS']
        ];
    }
}

?>
