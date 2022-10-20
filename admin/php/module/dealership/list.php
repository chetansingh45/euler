<?php
require('./../../../php/helper/db.php');

use DB\DB;
$DB = new DB();

$filter = '';

if(isset($_GET['filter']) && $_GET['filter'] != '' && $_GET['filter'] != null){
    $filter_req = strtoupper($_GET['filter']);
    $filter = "WHERE `created_at` > DATE_SUB(NOW(), INTERVAL 1 $filter_req)";
}

if(isset($_GET['from']) && $_GET['from'] != '' && $_GET['from'] != null && isset($_GET['to']) && $_GET['to'] != null && $_GET['to']!=""){
    $from = $_GET['from'];
    $to = $_GET['to'];
    $filter = "WHERE created_at >= '$from' AND created_at <= '$to'";
}

$query = "SELECT * FROM `dealership` $filter ORDER BY `id` DESC";

$res = $DB -> db($query);
$data = [];
$index = 0;
while($row = mysqli_fetch_assoc($res)) {
    $row['sno'] = ++$index;
    $row['created_at'] = date('d M Y', strtotime($row['created_at']));
    $data[] = $row;
}
echo json_encode((object)["data" => $data]);
?>