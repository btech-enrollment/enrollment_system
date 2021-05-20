<?php

    // sleep(2);
    session_start();
    include "database.php";

    if (isset($_POST['login'])) {
        
        $sno = $_POST['sno'];
        $pass = $_POST['pass'];

        $query = "SELECT * FROM students1 WHERE username='$sno' AND password='$pass'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_num_rows($result);

        $_SESSION['login-status'] = false;

        if ($row == 1) {
            while ($names = mysqli_fetch_assoc($result)) {
                $_SESSION['students'] = $names['id'];
                $_SESSION['name'] = $names['name'];
                $_SESSION['course'] = $names['course'];
                $_SESSION['year_level'] = $names['year_level'];
                $_SESSION['section'] = $names['section'];
                $_SESSION['email'] = $names['email'];
                $_SESSION['birthday'] = $names['birthday'];
                $_SESSION['guardian'] = $names['guardian'];
                $_SESSION['status'] = $names['status'];
                $_SESSION['password'] = $names['password'];
            }
            $_SESSION['sno'] = $sno;
            $_SESSION['login-status'] = true;
            // $_SESSION['students'] = $row['id'];
            // sleep(3);
            
            $URL="option.php";
            echo "<script>location.href='$URL'</script>";
            exit;

        } else {
            // sleep(2);
            $msg="<div class='alert alert-danger text-center' role='alert'>Invalid Student ID or Password</div>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login | Online Enrollment Application for Baliwag Polytechnic College</title>
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
        <a href="admin-login.php">Admin Login</a>
    </div>

    <form action="login.php" method="POST" name="login_form">
        <img src="img/logo.png" alt="">
        <table width="400" cellpadding="15" cellspacing="1" class="Table">
            <?php if(isset($msg)){?>
                <tr>
                    <td colspan="2"><?php echo $msg;?></td>
                </tr>
            <?php } ?>

            <tr>
                <td class="text-center"><h2>Student Login</h2></td>
            </tr>

            <div class="std-login mb-5">
                
            </div>
            
            <tr>
                <td><input type="text" name="sno" class="form-control" placeholder="Student Number" required autocomplete="off"></td>
            </tr>

            <tr>
                <td><input type="password" name="pass" class="form-control" placeholder="Password" required autocomplete="off"></td>
            </tr>

            <tr>
                <td><input type="checkbox" name="" id="remember_me">
                    <label for="remember_me">Remember me</label>
                </td>
            </tr>

            <tr>
                <td><input type="submit" name="login" value="Sign In" class="btn btn-primary form-control"></td>
            </tr>
            
            <tr>
                <td class="text-center"><a href="#">Forgot Password?</a></td>
            </tr>
        </table>
    </form>

</body>
</html>