<?php
include('php/helper/db.php');
include 'php/helper/alert.php';

use DB\DB;
$db = new DB();

if(isset($_POST['action']) && $_POST['action']=='updateForm'){
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
    $res = $db->db("UPDATE form SET form_data='$form_data'");
    if($res){
        echo exit(json_encode(['success'=>true]));
    }
}
$res = $db->db("SELECT * FROM form");
$form = mysqli_fetch_assoc($res);

include 'includes/header.php';

?>

<div class="row">
<div class="card">
        <div class="card-body">
            <div id="build-wrap"></div>
        </div>
</div>

    <button type="submit" id="setData" style="display: none"></button>

<!-- <button type="button" id="abcd">abc</button> -->
<?php include 'includes/footer.php' ?>
<script>
    var options = {
      disableFields: ['autocomplete','file','date','textbox-group','hidden','paragraph'],
      onSave: function(evt, formData) {
          $.post('edit-form.php',{formData: formData,action:'updateForm'},function(data, status){
            console.log(data);
            location.reload();
          })
        },
        disabledActionButtons: ['data'],
    };
    var fbEditor = document.getElementById('build-wrap');
    var formBuilder = $(fbEditor).formBuilder(options);
    var formData = '<?php echo $form['form_data']?>';
    console.log(formData);
    document.getElementById('setData').addEventListener('click', function() {
        formBuilder.actions.setData(formData);
    });

    $(document).ready(function(){
        $("#setData").click()
    })
</script>