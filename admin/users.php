<?php
include('php/helper/db.php');
include 'php/helper/alert.php';

use DB\DB;

$db = new DB();
if (isset($_POST['user_id'])) {
    $id = $_POST['user_id'];
    $user_status = $_POST['user_status'];
    $res = $db->db("UPDATE users SET status='$user_status' WHERE id='$id'");
    if ($res) {
        echo exit(json_encode(array('success' => true)));
    } else {
        echo exit(json_encode(array('success' => false)));
    }
}
if (isset($_POST['action'])) {
    $id = $_POST['id'];
    $res = $db->db("DELETE FROM users WHERE id='$id'");
    if ($res) {
        echo exit(json_encode(array('success' => true)));
    } else {
        echo exit(json_encode(array('success' => true)));
    }
}

if (isset($_POST['save_user'])) {
    $username = filter($_POST['username']);
    $email = filter($_POST['email']);
    $password = filter($_POST['password']);
    $role = $_POST['role'];
    $res = $db->db("INSERT INTO users (user_name,email,password,type) VALUES('$username','$email','$password','$role')");
    if ($res) {
        alert("User created successfully", "user created", 'success');
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
            <button class="btn btn-primary btn-sm addUser">Add New</button>
            <div class="text-success  success_msg"></div>
            <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table mt-3" id="tableList">

                <thead>
                    <tr>
                        <th class="text-nowrap">SL No.</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Role</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                    <?php
                    $users = $db->db("SELECT * FROM users");
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($users)) {
                        $i++;
                    ?>
                        <tr id="user<?php echo $row['id'] ?>">
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['user_name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td>
                                <?php if ($row['type'] != 1) : ?>
                                    <select name="user_type" class="form-control-sm" onchange="changeRole(this.value,<?php echo $row['id']; ?>)" id="user_type">
                                        <option disabled>Select Role..</option>
                                        <?php
                                        $publisher_select = '';
                                        $viewer_select = '';
                                        $jr_admin_select = '';
                                        if ($row['type'] == '2') {
                                            $publisher_select = 'selected';
                                        } elseif ($row['type'] == '3') {
                                            $viewer_select = 'selected';
                                        } elseif ($row['type'] == '4') {
                                            $jr_admin_select = 'selected';
                                        }
                                        ?>
                                        <option value='4' <?php echo $jr_admin_select ?>>Admin</option>
                                        <option value='2' <?php echo $publisher_select ?>>Publisher</option>
                                        <option value='3' <?php echo $viewer_select ?>>Viewer</option>

                                    </select>
                                <?php else: ?>
                                    <span>Super Admin</span>
                                <?php endif; ?>    
                            </td>
                            <td>
                                <?php
                                if ($row['id'] != $_SESSION['user']['id']) {
                                    if ($row['status'] == '1') {
                                ?>
                                        <button onclick="changeStatus(<?php echo $row['id'] ?>,0)" class="btn btn-primary">Active</button>
                                    <?php } else { ?>
                                        <button onclick="changeStatus(<?php echo $row['id'] ?>,1)" class="btn btn-danger">In-Active</button>
                                <?php }
                                } ?>
                            </td>
                            <td>
                                <?php if ($row['id'] != $_SESSION['user']['id']) { ?>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger" onclick="deleteUser(<?php echo $row['id']; ?>)"><i class="fa fa-trash"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="dealershipModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username" id="username" class="col-sm-2 control-label">Username</label>
                        <input type="text" required name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <input type="email" required name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">Password</label>
                        <input type="text" required name="password" minlength='6' class="form-control" placeholder="*******">
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Role</label>
                        <select class="form-control" name="role" id="role" required>
                            <option value="">Select Role</option>
                            <option value='4'>Admin</option>
                            <option value="2">Publisher</option>
                            <option value="3">Viewer</option>
                        </select>
                    </div>
                    <input type="hidden" name="save_user">
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
    function changeStatus(id, user_status) {
        $.post('users.php', {
            user_id: id,
            user_status: user_status
        }, function(data, status) {
            data = JSON.parse(data);
            if (data.success) {
                location.href = 'users.php';
            } else {
                swal('Oppss', 'Someting Went wrong');
            }
        });
    }

    function deleteUser(id) {
        $.post('users.php', {
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

    $(".addUser").click(function() {
        $('#dealershipModal').modal('show');
    })

    function changeRole(role, id) {
        if (role != '' && role != null && role != '' && role != null) {
            $.post('users.php', {
                user_id_for_role: id,
                role: role
            }, function(data, status) {
                data = JSON.parse(data);
                if (data.success) {
                    $(".success_msg").html("Role Changed");
                    setTimeout(function() {
                        $(".success_msg").html("");
                    }, 3000)
                }
            })
        }
    }
</script>
