<?php
include('php/helper/db.php');
include 'php/helper/alert.php';

use DB\DB;
$db = new DB();

if(isset($_POST['action']) && $_POST['action']=='saveForm'){
    $form_data = $_POST['formData'];
    $json = json_decode($form_data);
    $columns = '';

    foreach($json as $key => $value){
        $temp_column = $value->name;
        $temp_column = preg_replace('/\s+/', '', $temp_column);
        if($value->type !='header'){
            $columns.="{$temp_column} VARCHAR(255) NULL ,";
        }
    }
    $drop = 'DROP TABLE IF EXISTS '.DB_NAME.'.`form_data`';
    $db->db($drop);

    $sql = "CREATE TABLE form_data (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        $columns
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    $res = $db->db($sql);
    $res = $db->db("INSERT INTO form (form_data) VALUES ('$form_data')");
    if($res){
        echo exit(json_encode(['success'=>true]));
    }
}

//get variants
if(isset($_POST['action']) && $_POST['action']=='getVariants'){
    $res = $db->db("SELECT * from variants ORDER BY variant_order ASC");
    $data =[];
    while($row = mysqli_fetch_assoc($res)){
        $data[] = ['label'=>$row['variant'],'value'=>$row['variant']];
    }
    echo json_encode($data);
    exit();
}

if(isset($_GET['action']) && $_GET['action']=='change_status'){
    $status = $_GET['status'];
    $res = $db->db("UPDATE form SET status = '$status'");
    if($res){
        redirect('form.php');
    }
}

if(isset($_GET['action']) && $_GET['action']=='delete_form'){
    $res = $db->db("Delete FROM form");
    if($res){
        redirect('form.php');
    }
}


include 'includes/header.php';

?>
<div class="d-flex align-items-center mb-4 flex-wrap">
    <h4 class="fs-20 font-w600  me-auto">Build Form</h4>
</div>

<div class="row">



<?php
$res = $db->db("SELECT * FROM form");
if(mysqli_num_rows($res) > 0){
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <td>S.No</td>
                    <td>View Submissions</td>
                    <td>Status</td>
                    <td>Actions</td>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                        while($row = mysqli_fetch_array($res)){
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><a href="submissions.php" class='btn btn-primary'>View</a></td>
                        <td>
                            <?php
                                if($row['status']=='1'){
                            ?>
                                <a href="form.php?action=change_status&status=0" class='btn btn-secondary'>Active</a>
                            <?php }else{?>
                                <a href="form.php?action=change_status&status=1" class='btn btn-danger'>In-Active</a>
                            <?php }?>
                        </td>
                        <td>
                            <a href="edit-form.php" class='btn btn-primary'>Edit Form</a>
                            <a href="form.php?action=delete_form" class='btn btn-danger'>Delete Form</a>
                        </td>
                    </tr>
                    <?php $i++; }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php }else{?>
    <div class="card">
        <div class="card-body">
            <div class="build-wrap"></div>
        </div>
    </div>
<?php }?>

<!-- <button type="button" id="abcd">abc</button> -->
<?php include 'includes/footer.php' ?>
<script>


    


    $(document).ready(function(){
        var optionsList = '';
        $.post('form.php',{action:'getVariants'},function(data, status){
            data = JSON.parse(data)
            optionsList = data;
            var options = {
            disableFields: ['autocomplete','file','date','textbox-group','hidden','paragraph','button'],
            defaultFields: [{
                className: "form-control",
                label: "Variants",
                name: "Variant",
                type: "select",
                required: true,
                values: optionsList
            },
            {
                className: "form-control",
                label: "Email",
                name: "Email",
                type: "text",
                placeholder: "Don't use (-) OR (SPACE) in name",
                required: true
            }
        ],
            onSave: function(evt, formData) {
                $.post('form.php',{formData: formData,action:'saveForm'},function(data, status){
                    location.reload();
                    console.log(data);
                })
                },
            disabledActionButtons: ['data'],
            };
            createFormBuilder(options);
        })
    })

    function createFormBuilder(options){
        var build = $('.build-wrap');
        $(build).formBuilder(options);
    }

</script>