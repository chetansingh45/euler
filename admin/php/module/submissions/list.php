<?php
require('./../../../php/helper/db.php');

use DB\DB;
$DB = new DB();
$res = $DB->db("SELECT * FROM form_data");
$index=0;
$data = [];
while($row = mysqli_fetch_assoc($res)) {
    $row['sno'] = ++$index;
    $row['created_at'] = date('d M Y', strtotime($row['created_at']));
    $data[] = $row;
}
echo json_encode((object)["data" => $data]);
?>