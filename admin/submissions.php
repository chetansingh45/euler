<?php
include('php/helper/db.php');
include 'php/helper/alert.php';

use DB\DB;
$db = new DB();

include 'includes/header.php';

?>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
        <button class="btn btn-primary" onclick="ExportToExcel('booking.xlsx')">Download</button>
            <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id='tableList'>
                <thead>
                <?php
                    $fields = $db->db("SHOW COLUMNS FROM form_data");
                    while($row = mysqli_fetch_assoc($fields)){
                ?>
                    <td><?php echo $row['Field']; ?></td>
                <?php }?>
                </thead>
                <tbody>
                <?php
                    $submissions = $db->db("SELECT * FROM form_data");
                    while($row = mysqli_fetch_assoc($submissions)){
                ?>
                <tr>
                    <?php
                        foreach($row as $key => $value){
                    ?>
                    <td><?php echo $row[$key]; ?></td>
                    <?php }?>
                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
 <?php 
  $fields = $db->db("SHOW COLUMNS FROM form_data");
 $temp = [];
 while($row = mysqli_fetch_assoc($fields)){
    $temp[] = $row['Field'];
 }
 ?>
 <input type="hidden" id="josn_object" value='<?php echo json_encode($temp);?>'>
<!-- <button type="button" id="abcd">abc</button> -->
<?php include 'includes/footer.php' ?>
<script type="text/javascript">
    window.onload = () => {
        let col = $("#josn_object").val();
        col = JSON.parse(col)
        const columns = [];
        for(x in col){
            columns.push({data:`${col[x]}`})
        }
        console.log(columns)
        initializeDatatable({
            Url: "./php/module/submissions/list.php",
            columns
        });

    }
</script>