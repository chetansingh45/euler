<?php
include('php/helper/db.php');
include 'php/helper/alert.php';

use DB\DB;

$db = new DB();

////order sortings

if(isset($_POST['ids'])){
    $ids = $_POST['ids'];
    $ids = explode(',', $ids);
    for($i=1; $i<=count($ids); $i++){
        $id = $ids[$i-1];
        $res = $db->db("UPDATE variants SET variant_order='$i' WHERE id='$id'"); 
    }
    die();
}

//update status
if (isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $res = $db->db("UPDATE variants SET status='$status' WHERE id='$id'");
    if ($res) {
        echo exit(json_encode(array('success' => true)));
    } else {
        echo exit(json_encode(array('success' => false)));
    }
}

if (isset($_POST['action'])) {
    $id = $_POST['id'];
    $res = $db->db("DELETE FROM variants WHERE id='$id'");
    if ($res) {
        echo exit(json_encode(array('success' => true)));
    } else {
        echo exit(json_encode(array('success' => true)));
    }
}
///save variant
if (isset($_POST['save_variant'])) {
    $variant = filter($_POST['variant']);
    $count = mysqli_num_rows($db->db("SELECT * FROM variants"));
    $variant_order = $count++;
    $res = $db->db("INSERT INTO variants (variant,variant_order) VALUES('$variant','$variant_order')");
    if ($res) {
        alert("Variant Created Successfully", "Variant Created", 'success');
    }
}

//update variants
if(isset($_POST['variant_id'])){
    $id = $_POST['variant_id'];
    $variant = filter($_POST['variant']);
    $res = $db->db("UPDATE variants SET variant='$variant' WHERE id='$id'");
    if ($res) {
        alert("Variant Updated Successfully", "Variant Updated", 'success');
    }
}

if (isset($_POST['user_id_for_role'])) {
    $user_id = $_POST['user_id_for_role'];
    $role = $_POST['role'];
    if ($role != '1' && $role != '' && $role != null) {
        $res = $db->db("UPDATE users SET type = '$role' WHERE id='$user_id'");
        if ($res) {
            echo exit(json_encode(array('success' => true)));
        }
        echo exit(json_encode(array('success' => false)));
    }
}


include 'includes/header.php';
if (!isAdmin()) {
    redirect('index.php');
}
?>


<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <button class="btn btn-primary btn-sm addVariant">Add New</button>
            <div class="text-success  success_msg"></div>
            <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table mt-3" id="tableList">

                <thead>
                    <tr>
                        <th class="text-nowrap">SL No.</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                    <tbody id="sortable">
                    <?php
                    $users = $db->db("SELECT * FROM variants ORDER BY variant_order ASC");
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($users)) {
                        $i++;
                    ?>
                        <tr id="user<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>" class="cursor-move">
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['variant'] ?></td>
                            <td>
                                <?php
                                    if ($row['status'] == '1') {
                                ?>
                                        <button onclick="changeVariantStatus(<?php echo $row['id'] ?>,0)" class="btn btn-primary">Active</button>
                                    <?php } else { ?>
                                        <button onclick="changeVariantStatus(<?php echo $row['id'] ?>,1)" class="btn btn-danger">In-Active</button>
                                <?php }?>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary" onclick="editVariant('<?php echo $row['id']; ?>','<?php echo $row['variant']?>','<?php echo $row['variant_order']?>')"><i class="fa fa-pen"></i></a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger" onclick="deleteVariant(<?php echo $row['id']; ?>)"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="variantModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add New Variant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" required name="variant" class="form-control" placeholder="Variant Name">
                    </div>
                    <input type="hidden" name="save_variant">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- edit variantModal-->
<div class="modal fade" id="editVariantModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Variant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" required name="variant" class="form-control" placeholder="Variant Name" id="variant_name">
                    </div>
                    <input type="hidden" name="variant_id" id="variant_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>
<script>
    $(function() {
        let ids = '';
        $("#sortable").sortable({
            stop: function(e) {
                ids = '';
               $("#sortable tr").each(function() {
                   if(ids==''){
                        ids = $(this).data("id");
                   }else{
                    ids += ','+$(this).data("id");
                   }
               })
               $.post("variants.php",{ids:ids},function(data){
                   console.log(data)
               })
            },
            start:function(e){
                console.log(e)
            }
        });
    });

    function changeVariantStatus(id, status) {
        $.post('variants.php', {
            id: id,
            status: status
        }, function(data, status) {
            data = JSON.parse(data);
            if (data.success) {
                location.href = 'variants.php';
            } else {
                swal('Oppss', 'Someting Went wrong');
            }
        });
    }

    function editVariant(id,name){
        console.log(id)
        $("#variant_name").val(name)
        $("#variant_id").val(id)
        $("#editVariantModal").modal('show');
    }

    function deleteVariant(id) {
        $.post('variants.php', {
            id: id,
            action: 'delete'
        }, function(data, status) {
            data = JSON.parse(data);
            if (data.success) {
                $("#user" + id).hide();
            } else {
                swal('Oppss', 'Someting Went wrong');
            }
        });
    }

    $(".addVariant").click(function() {
        $('#variantModal').modal('show');
    })
    
</script>
