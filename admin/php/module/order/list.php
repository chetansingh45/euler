<?php
require('./../../../php/helper/db.php');

use DB\DB;
$DB = new DB();

// if(!isset($_SESSION['admin'])) {
//     header("Location: ../../login.php");
// }
$filter = '';
if(isset($_GET['filter']) && $_GET['filter'] != '' && $_GET['filter'] != null){
    $filter_req = strtoupper($_GET['filter']);
    $filter = "AND o.created_at > DATE_SUB(NOW(), INTERVAL 1 $filter_req)";
}

if(isset($_GET['from']) && $_GET['from'] != '' && $_GET['from'] != null && isset($_GET['to']) && $_GET['to'] != null && $_GET['to']!=""){
    $from = $_GET['from'];
    $to = $_GET['to'];
    $filter = "AND o.created_at >=  '$from' AND o.created_at <= '$to'";
}

$query = "SELECT o.id, o.status, o.booking_id, o.transaction_id, o.transaction_detail, o.invoice_no, o.total_amount,
 o.actual_amount, o.finance, o.email, o.firstname, o.lastname, o.phone, o.pincode, o.created_at, 
 p.name AS product_name, p.sku_name FROM orders AS o, product_sku AS p WHERE o.transaction_id IS NOT NULL
&& o.transaction_id != '' && p.id = o.product_sku_id $filter ORDER BY o.id DESC";

$res = $DB->db($query);
$data = [];
$index = 0;
while($row = mysqli_fetch_assoc($res)) {
    $row['sno'] = ++$index;
    $row['created_at'] = date('d M Y', strtotime($row['created_at']));
    $data[] = $row;
}
echo json_encode((object)["data" => $data]);
?>