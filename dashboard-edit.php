<?php

    // sleep(2);
    session_start();
    include "database.php";

    if (!$_SESSION['login-status1']) {
        header('location: admin-login.php');
        exit;
    }

    if (isset($_GET['id'])){
        $query = "SELECT * FROM students1 WHERE id = {$_GET['id']}";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 0){
            echo '<script>alert("Invalid student ID.\nPlease try again.");</script>';
            $url="dashboard.php";
            echo "<script>location.href='$url'</script>";
            exit;
        }
        $row = mysqli_fetch_assoc($result);
    }

    if (isset($_POST['update_student_info'])) {

        $id = $_POST['id'];

        $query = "UPDATE students1 SET name = '{$_POST['editname']}', username = '{$_POST['editsno']}', password = '{$_POST['editpass']}', course = '{$_POST['editcourse']}', year_level = '{$_POST['edityearlevel']}', section = '{$_POST['editsection']}', birthday = '{$_POST['editbirthday']}', complete_address = '{$_POST['editaddress']}', mobile_number = '{$_POST['editnumber']}', guardian = '{$_POST['editguardian']}', guardian_mobile_number = '{$_POST['editguardiannumber']}', status = '{$_POST['editstatus']}' WHERE id = '{$id}'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo '<script>alert("Student info updated successfully!");</script>';
            $url="dashboard.php";
            echo "<script>location.href='$url'</script>";
        } else {
            $msg="<div class='alert alert-danger text-center' role='alert'>Error</div>";
        }

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

            <form action="dashboard-edit.php" method="POST">
                <input type="hidden" name="id" id="id" value="<?= $row['id'];?>">

                <div class="form-group">
                    <label for="editname">Name</label>
                    <input type="text" name="editname" id="editname" class="form-control" value="<?= $row['name'];?>">
                </div>

                <div class="form-group">
                    <label for="editsno">Student Number</label>
                    <input type="number" name="editsno" id="editsno" class="form-control" value="<?= $row['username'];?>">
                </div>

                <div class="form-group">
                    <label for="editpass">Password</label>
                    <input type="text" name="editpass" id="editpass" class="form-control" value="<?= $row['password'];?>">
                </div>

                <div class="form-group">
                    <label>Course</label>
                    <select class="form-control" name="editcourse">
                        <option></option>
                        <option <?= $row['course'] == "BSIT" ? 'selected' : "";?> value="BSIT">BSIT</option>
                        <option <?= $row['course'] == "BSHM" ? 'selected' : "";?> value="BSHM">BSHM</option>
                        <option <?= $row['course'] == "BSED" ? 'selected' : "";?> value="BSED">BSED</option>
                        <option <?= $row['course'] == "BAFM" ? 'selected' : "";?> value="BAFM">BAFM</option>
                        <option <?= $row['course'] == "BAMM" ? 'selected' : "";?> value="BAMM">BAMM</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="edityearlevel">Year Level</label>
                    <input type="number" name="edityearlevel" id="edityearlevel" class="form-control" value="<?= $row['year_level'];?>">
                </div>

                <div class="form-group">
                    <label for="editsection">Section</label>
                    <input type="text" name="editsection" id="editsection" class="form-control" value="<?= $row['section'];?>">
                </div>

                <div class="form-group">
                    <label for="editbirthday">Birthday</label>
                    <input type="text" name="editbirthday" id="editbirthday" class="form-control" value="<?= $row['birthday'];?>">
                </div>

                <div class="form-group">
                    <label for="editaddress">Complete Address</label>
                    <input type="text" name="editaddress" id="editaddress" class="form-control" value="<?= $row['complete_address'];?>">
                </div>

                <div class="form-group">
                    <label for="editnumber">Mobile Number</label>
                    <input type="number" name="editnumber" id="editnumber" class="form-control" value="<?= $row['mobile_number'];?>">
                </div>

                <div class="form-group">
                    <label for="editguardian">Guardian Name</label>
                    <input type="text" name="editguardian" id="editguardian" class="form-control" value="<?= $row['guardian'];?>">
                </div>

                <div class="form-group">
                    <label for="editguardiannumber">Guardian Number</label>
                    <input type="number" name="editguardiannumber" id="editguardiannumber" class="form-control" value="<?= $row['guardian_mobile_number'];?>">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="editstatus" id="editstatus" class="form-control">
                        <option></option>
                        <option <?= $row['status'] == "unenrolled" ? 'selected' : "";?> value="unenrolled">Unenrolled</option>
                        <option <?= $row['status'] == "enrolled" ? 'selected' : "";?> value="enrolled">Enrolled</option>
                    </select>
                </div>

                <hr>
                <input type="submit" name="update_student_info" value="Update Student Info" class="btn btn-primary float-right">

                <a href="dashboard.php"><input type="submit" value="Cancel" class="btn btn-secondary float-right mr-3"></a>
            </form>

        </div>
    </div>

</body>
</html>