<?php
include "php/helper/db.php";
use DB\DB;
$db = new DB();
if(isset($_POST['credentials'])){
    $email = filter_var($_POST['credentials']['email'],FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['credentials']['password'],FILTER_SANITIZE_STRING);
    $login = $db->db("SELECT * FROM users WHERE email = '$email' AND password = '$password' AND status='1'");
    if(mysqli_num_rows($login) > 0){
        session_start();
        $row = mysqli_fetch_assoc($login);
        $_SESSION['user'] = $row;
        echo "1";
    }else{
        echo "0";
    }
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Euler-Login</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">

    <!-- Style css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center h-100 mt-5">
            <div class="col-md-4 shadow-sm p-5 border">
                <form method="post" id="login">
                    <div class="text-center mt-2 mb-2"><span class="bg-dark p-3"><img class="blur-up lazyloaded" src="https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/logo.png" alt=""></span></div>
                    <div class="form-group mb-2">
                        <label><b>Email</b></label>
                        <input type="email" name="email" id="email" required class="form-control" placeholder="Enter Email">
                        <span class="text-danger emailErr"></span>
                    </div>
                    <div class="form-group mb-2">
                        <label><b>Password</b></label>
                        <input type="password" name="password" id="password" required class="form-control" placeholder="Enter Password">
                        <span class="text-danger passwordErr"></span>
                    </div>
                    <div class="form-group mb-2 mt-4">
                        <button type="submit" id="loginBtn" class="btn btn-sm btn-outline-dark">Login</button>
                    </div>
                    <small class="d-block text-danger p-3 text-center credentialErr" data-error="signin"></small>
                </form>
            </div>
        </div>
    </div>

    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <!-- <script src="js/custom.min.js"></script> -->
    <script src="js/dlabnav-init.js"></script>
    <!-- <script src="js/demo.js"></script>
    <script src="js/common.js"></script> -->
    <script>
        $("#login").submit(function(event){
            $("#loginBtn").html('Validating');
            event.preventDefault();
            let email = $("#email");
            let password = $("#password");
            let credentials = {email:email.val(),password:password.val()};
            $.post("login.php",{credentials:credentials},function(data,status){
                if(data==1){
                    location.href = "index.php";
                }else{
                    $(".credentialErr").html("Invalid credentials");
                    $("#loginBtn").html('Login');
                    $("#password").val('');
                }
            });
        });

        function resetError() {
            $(".emailErr").html('');
            $(".passwordErr").html('');
            $(".credentialErr").html('');
        }
    </script>
</body>

</html>
