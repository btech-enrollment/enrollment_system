<?php

    // sleep(2);
    session_start();
    include "database.php";

    if (!$_SESSION['login-status1']) {
        header('location: admin-login.php');
        exit;
    }

    if (isset($_POST['changePass'])) {

        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $confirmPass = $_POST['confirmPass'];
        $admin_id =  $_POST['admin_id'];

        $admin = "SELECT * FROM admin WHERE adminid =" . $admin_id;

        if ($oldPass == $_SESSION['password'] && $newPass == $confirmPass) {
            $updateQuery = "UPDATE admin SET password='$newPass' WHERE adminid='{$admin_id}'";
            $updateRun = mysqli_query($connection, $updateQuery);
            echo '<script>alert("Password changed successfully.\nPlease login again.");</script>';
            $url="admin-login.php";
            echo "<script>location.href='$url'</script>";
        } else {
            $msg="<div class='alert alert-danger text-center' role='alert'>Invalid input details</div>";
        }

    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Change Password</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- POPPER JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- BOOTSTRAP JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/option.css">
</head>

<style>
        @media screen and (max-width: 999px) {
            .logo-text {
                display: none;
            }
        }
    </style>

<body>

<div class="container-fluid p-2 pl-5 pr-5 bg-dark d-inline-block">
    <div class="logo float-left d-flex">
        <img src="img/logo.png" class="img" height="60" alt="">
        <h2 class="text-light m-2 logo-text">Baliwag Polytechnic College</h2>
    </div>
    <div class="name float-right d-flex">
        <p class="text-light m-3"><?php
            $SELECT = "SELECT name FROM admin";
        echo strtoupper($_SESSION['name']); ?></p>
        <form action="admin-change-password.php" method="POST">
            <input type="submit" class="btn btn-danger mt-2" value="Logout" name="logout">
        </form>
    </div>
</div>

<div class="box shadow-lg rounded text-center" style="width: 500px;">

    <h2>Admin Change Password</h2>
    <hr>
    <form action="admin-change-password.php" method="POST" class="text-left">
        
    <input type="hidden" name="admin_id" value="<?php echo $_SESSION['adminid']; ?>">
        <?php if(isset($msg)) { ?>
            <?php echo $msg; ?>
        <?php } ?>
        <div class="form-group">
            <label for="oldPass">Old Password</label>
            <input type="password" name="oldPass" id="oldPass" class="form-control">
        </div>
        <div class="form-group">
            <label for="newPass">New Password</label>
            <input type="text" name="newPass" id="newPass" class="form-control">
        </div>
        <div class="form-group">
            <label for="confirmPass">Confirm Password</label>
            <input type="text" name="confirmPass" id="confirmPass" class="form-control">
        </div>
        <hr>
        <div class="form-group float-right">
            <a href="option.php"><input type="button" name="cancel" id="cancel" class="btn btn-secondary" value="Cancel"></a>
            <input type="submit" name="changePass" id="changePass" class="btn btn-primary">
        </div>
    </form>

</div>

</body>

</html>
