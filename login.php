<?php
session_start();
error_reporting(0);
include "config/dbconfig.php"; 
$error = '<div class="col-md-12 text-primary">Enter your Login details.</div>';

if(isset($_POST['email']) && $_POST['pword']){
    $email = $_POST['email'];
    $password = $_POST['pword'];

    $sqli = "SELECT * FROM `tbl_users` WHERE `u_email` ='$email'";
    //$conn = new databaseconfig();
    $res = $conn->query($sqli);
    if($res){
        //$error = 'User Confirmed';
        $row = mysqli_fetch_assoc($res);
        $role = intval($row['u_role']);
        if ($row['u_pword'] == $password) {
             if ($role == 1) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['name'] = $row['u_fname'].' '.$row['u_lname'];
                header("Location:admin/dashboard.php");
            } else if ($role == 0) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['name'] = $row['u_fname'].' '.$row['u_lname'];
                header("Location:dashboard.php");
            } 
        }else{
                $error = '<span class="bg-warning" style="color: red; border: 1px solid inherit; border-radius: 4px; padding: 4px; margin-bottom: 4px;">Incorrect Username/Password </span>'.$conn->error;
            }
    }
    else{
        $error = "Could Not find user.".$conn->error;
    }




}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Examination Timetable Allocation System</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6 col-xl-6">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome !</h4>
                                        <div class="row">
                                            <div class="col-md-12" style="padding-bottom: 7px;"><center><?php echo $error?></center></div>
                                        </div>
                                    </div>
                                    <form class="user" action="login.php" method="POST">
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="pword" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1">
                                                    <label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-block text-white btn-user" name="login" type="submit">Login</button>
                                        <hr><hr>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-6 text-center"><a class="small" href="register.php">Create an Account!</a></div>
                                        <div class="col-md-6 text-center pull-right" style="justify-content: right;"><a class="small" href="forgot-password.php">Forgot Password?</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>