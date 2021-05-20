<?php

    // sleep(2);
    session_start();
    include "database.php";

    if (!$_SESSION['login-status1']) {
        header('location: admin-login.php');
        exit;
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Registrar</title>
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
</head>

<body>

    <div class="container-fluid bg-dark pt-2 pl-5 pb-2 pr-5 mb-5 d-inline-block">
        <div class="logo d-flex float-left">
            <img src="img/logo.png" height="70" alt="">
            <h3 class="text-light mt-3 ml-3">Baliwag Polytechnic College</h3>
        </div>
        <div class="logout d-flex float-right mt-3">
            <a href="dashboard.php"><button class="btn btn-secondary status-toggle mr-3">Back to home</button></a>
            <a href="admin-change-password.php" class="mr-3"><button class="btn btn-success">Change Password</button></a>
            <form action="dashboard.php" method="POST">
                <input type="submit" name="dashboardlogout" value="Logout" class="btn btn-danger">
            </form>
        </div>
    </div>

    <div class="container" style="width: 600px;">
        <div class="jumbotron">
            <h2 class="text-center">Update Student's Information</h2>
            <div class="card mb-4"></div>
            
            <div class="form-group">
                <label for="editname">Name</label>
                <input type="text" name="editname" id="editname" class="form-control">
            </div>

            <div class="form-group">
                <label for="editsno">Student Number</label>
                <input type="number" name="editsno" id="editsno" class="form-control">
            </div>

            <div class="form-group">
                <label for="editpass">Password</label>
                <input type="text" name="editpass" id="editpass" class="form-control">
            </div>

            <div class="form-group">
                <label>Course</label>
                <select class="form-control" name="editcourse">
                    <option>BSIT</option>
                    <option>BSHM</option>
                    <option>BSED</option>
                    <option>BAFM</option>
                    <option>BAMM</option>
                </select>
            </div>

            <div class="form-group">
                <label for="edityearlevel">Year Level</label>
                <input type="number" name="edityearlevel" id="edityearlevel" class="form-control">
            </div>

            <div class="form-group">
                <label for="editsection">Section</label>
                <input type="text" name="editsection" id="editsection" class="form-control">
            </div>

            <div class="form-group">
                <label for="editbirthday">Birthday</label>
                <input type="text" name="editbirthday" id="editbirthday" class="form-control">
            </div>

            <div class="form-group">
                <label for="editaddress">Complete Address</label>
                <input type="text" name="editaddress" id="editaddress" class="form-control">
            </div>

            <div class="form-group">
                <label for="editnumber">Mobile Number</label>
                <input type="number" name="editnumber" id="editnumber" class="form-control">
            </div>

            <div class="form-group">
                <label for="editguardian">Guardian Name</label>
                <input type="text" name="editguardian" id="editguardian" class="form-control">
            </div>

            <div class="form-group">
                <label for="editguardiannumber">Guardian Number</label>
                <input type="number" name="editguardiannumber" id="editguardiannumber" class="form-control">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="editstatus" id="editstatus" class="form-control">
                    <option value="">unenrolled</option>
                    <option value="">enrolled</option>
                </select>
            </div>

            <hr>
            <input type="button" value="Update" class="btn btn-primary float-right">
            <a href="dashboard.php"><input type="submit" value="Cancel" class="btn btn-secondary float-right mr-3"></a>

        </div>
    </div>

</body>
</html>