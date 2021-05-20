<?php

    // sleep(2);
    session_start();
    include "database.php";

    if (isset($_POST['admin-login'])) {
        
        $adminuser = $_POST['adminuser'];
        $adminpass = $_POST['adminpass'];

        $query = "SELECT * FROM admin WHERE username='$adminuser' AND password='$adminpass'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_num_rows($result);

        $_SESSION['login-status1'] = false;

        if ($row == 1) {
            while ($names = mysqli_fetch_assoc($result)) {
                $_SESSION['login-status1'] = true;
                $_SESSION['adminid'] = $names['adminid'];
                $_SESSION['username'] = $names['username'];
                $_SESSION['password'] = $names['password'];
                $_SESSION['name'] = $names['name'];
                // sleep(3);
            }
            $URL="dashboard.php";
            echo "<script>location.href='$URL'</script>";
            exit;

        } else {
            // sleep(2);
            $msg1="<div class='alert alert-danger text-center' role='alert'>Invalid Admin Username or Password</div>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Online Enrollment Application for Baliwag Polytechnic College</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- POPPER JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- BOOTSTRAP JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
    
    <div class="admin float-right m-5">
        <a href="login.php">Student Login</a>
    </div>

    <form action="admin-login.php" method="POST" name="login_form">
        <img src="img/logo.png" alt="">
        <table width="400" cellpadding="15" cellspacing="1" class="Table">
            <?php if(isset($msg1)){?>
                <tr>
                    <td colspan="2"><?php echo $msg1;?></td>
                </tr>
            <?php } ?>

            <tr>
                <td class="text-center"><h2>Admin Login</h2></td>
            </tr>

            <div class="std-login mb-5">
                
            </div>
            
            <tr>
                <td><input type="text" name="adminuser" class="form-control" placeholder="Admin Username" required autocomplete="off"></td>
            </tr>

            <tr>
                <td><input type="password" name="adminpass" class="form-control" placeholder="Password" required autocomplete="off"></td>
            </tr>

            <tr>
                <td><input type="checkbox" name="" id="remember_me">
                    <label for="remember_me">Remember me</label>
                </td>
            </tr>

            <tr>
                <td><input type="submit" name="admin-login" value="Sign In" class="btn btn-primary form-control"></td>
            </tr>
            
            <tr>
                <td class="text-center"><a href="#">Forgot Password?</a></td>
            </tr>
        </table>
    </form>

</body>
</html>