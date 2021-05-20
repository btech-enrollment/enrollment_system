    <?php
        // sleep(2);
        session_start();
        
        if (!$_SESSION['login-status']) {
            
            header('location: login.php');
            exit;
            // $LOGIN="login.php";
            // echo "<script>location.href='$LOGIN'</script>";

        }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose an option | BTECH </title>
        <!-- CSS -->
        <link rel="stylesheet" href="css/option.css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>

    <style>
        @media screen and (max-width: 999px) {
            
            .logo-text {
                display: none;
                float: left;
            }
        }
        @media screen and (max-width: 577px) {
            .logo img {
                display: none;
            }
        }
    </style>

    <body>
    <div class="container-fluid p-2 pl-5 pr-5 bg-dark d-inline-block">
        <div class="logo float-left d-flex">
            <img src="img/logo.png" height="60" alt="">
            <h2 class="text-light m-2 logo-text">Baliwag Polytechnic College</h2>
        </div>
        <div class="name float-right d-flex">
            <p class="text-light m-3 name-p"><?php echo strtoupper($_SESSION['name']); ?></p>
            <a href="change-password.php" class="mt-2 mr-3"><button class="btn btn-success">Change Password</button></a>
            <form action="option.php" method="POST">
                    <input type="submit" class="btn btn-danger mt-2" value="Logout" name="logout">
            </form>
        </div>
    </div>

        <div class="box shadow-lg rounded text-center">

            <h2>Choose Between</h2>
            <hr>
            <?php 
            
                if ($_SESSION['status'] == 'processing') echo '<button class="btn btn-secondary disabled enroll" name="enroll">PROCESSING ENROLLMENT</button>';
                elseif ($_SESSION['status'] == 'enrolled') echo '<button class="btn btn-secondary disabled enroll" name="enroll">ENROLLED</button>';
                else echo '<a href="enrollment-form.php"><button class="btn btn-primary enroll" name="enroll">ENROLL</button></a>';
            
            ?>
            
            <br>
            <?php
            
                if ($_SESSION['status'] == 'processing') echo '<button class="btn btn-secondary disabled enroll">SHIFT</button>';
                elseif ($_SESSION['status'] == 'enrolled') echo '<button class="btn btn-secondary disabled enroll">SHIFT</button>';
                else echo '<button class="btn btn-primary enroll" name="shift">SHIFT</button>';
            
            ?>


            <hr>
            Name: <br>
            <strong class="text-success student-name"><?php echo $_SESSION['name'];  ?></strong>
            <div class="account d-block">
                Student No:
                <?php echo " "?><p class="text-success"><strong>
                    <?php echo $_SESSION['sno']; ?>
                </p></strong>
            </div>
            <p>Status:  <br>
            <strong class=<?php
            if($_SESSION['status'] == 'processing') echo 'text-warning';
            else if($_SESSION['status'] == 'unenrolled') echo 'text-danger';
            else echo 'text-success';
            ?>><?php echo strtoupper($_SESSION['status']); ?></p></strong>
            <hr>
        </div>

    </body>
    </html>

    <?php

        if (isset($_POST['logout'])) {

            header("Location: logout.php");
            
        }

    ?>