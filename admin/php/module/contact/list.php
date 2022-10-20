<?php
require('./../../../php/helper/db.php');

use DB\DB;
$DB = new DB();

if(isset($_GET['filter']) && $_GET['filter'] != '' && $_GET['filter'] != null){
    $filter_req = strtoupper($_GET['filter']);
    $filter = "WHERE `created_at` > DATE_SUB(NOW(), INTERVAL 1 $filter_req)";
}else{
    $filter = '';
}

$query = "SELECT * FROM `contactus` $filter ORDER BY `id` DESC";

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