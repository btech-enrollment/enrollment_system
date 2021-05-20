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
            <a href="dashboard-edit.php" class="mr-3"><button class="btn btn-success">Edit</button></a>
            <a href="admin-change-password.php" class="mr-3"><button class="btn btn-success">Change Password</button></a>
            <form action="dashboard.php" method="POST">
                <input type="submit" name="dashboardlogout" value="Logout" class="btn btn-danger">
            </form>
        </div>
    </div>

    <div class="container" style="width: 80%">
        <div class="jumbotron">
        <h2 class="text-center">Student's Information</h2>
            <div class="card mb-3"></div>
                <div class="add float-left mb-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i> Add Student</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header bg-dark">
                                <h5 class="modal-title text-light" id="exampleModalLongTitle">Add Student's Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-light">&times;</span>
                                </button>
                            </div>   
                            <form action="insertcode.php" method="POST">
                                <div class="modal-body">
                                
                                    <div class="form-group">
                                        <label for="addusername">Student Number</label>
                                        <input type="number" required class="form-control" id="addusername" name="addusername">
                                    </div>
                                    <div class="form-group">
                                        <label for="addname">Student's Name</label>
                                        <input type="text" required class="form-control" id="addname" name="addname">
                                    </div>
                                    <div class="form-group">
                                    <label>Course</label>
                                        <select class="form-control" name="addcourse">
                                            <option>BSIT</option>
                                            <option>BSHM</option>
                                            <option>BSED</option>
                                            <option>BAFM</option>
                                            <option>BAMM</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="addyearlevel">Year Level</label>
                                        <input type="number" required class="form-control" id="addyearlevel" name="addyearlevel">
                                    </div>
                                    <div class="form-group">
                                        <label for="addsection">Section</label>
                                        <input type="text" required class="form-control" id="addsection" name="addsection">
                                    </div>
                                    <div class="form-group">
                                        <label for="addbday">Birthday (mm/dd/yy)</label>
                                        <input type="text" required class="form-control" id="addbday" name="addbday">
                                    </div>
                                    <div class="form-group">
                                        <label for="addcompleteaddress">Complete Address</label>
                                        <input type="text" required class="form-control" id="addcompleteaddress" name="addcompleteaddress">
                                    </div>
                                    <div class="form-group">
                                        <label for="addemail">Email Address</label>
                                        <input type="email" required class="form-control" id="addemail" name="addemail">
                                    </div>
                                    <div class="form-group">
                                        <label for="addstudentmobile">Student's Mobile Number</label>
                                        <input type="number" required class="form-control" id="addstudentmobile" name="addstudentmobile">
                                    </div>
                                    <div class="form-group">
                                        <label for="addguardian">Guardian's Name</label>
                                        <input type="text" required class="form-control" id="addguardian" name="addguardian">
                                    </div>
                                    <div class="form-group">
                                        <label for="addguardiannumber">Guardian's Mobile Number</label>
                                        <input type="number" required class="form-control" id="addguardiannumber" name="addguardiannumber">
                                    </div>
                                    <div class="form-group">
                                    <label>Status</label>
                                        <select class="form-control" name="addstatus">
                                            <option>enrolled</option>
                                            <option>unenrolled</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="addpass">Set Password</label>
                                        <input type="text" required class="form-control" id="addpass" name="addpass">
                                    </div>
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            

            <div class="disable-all float-right">
                <form action="dashboard.php" method="post">
                    <button class="btn btn-danger"><i class="fas fa-times"></i> Unenroll All</button>
                </form>
            </div>
            <div class="table-responsive">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "enrollment");
                $query1 = "SELECT * FROM students1";
                $query_run = mysqli_query($conn, $query1);

                ?>
                <table class="table table-striped table-dark rounded">
                    <thead>
                        <tr>
                            <th scope="col">Student Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Year/Sec</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($query_run) > 0) {
                            
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['course'];
                                        echo " ";
                                        echo $row['year_level'];
                                        echo "-";
                                        echo $row['section']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <?php

                                        
                                        // echo "{$row['status']}";
                                        // $test = 1;

                                        if ($row['status'] == 'processing') {
                                            // echo '<button class="btn btn-primary" onclick="updateStatus()">Enroll</button>';
                                            
                                            echo "<form action='dashboard.php' method='POST'>
                                            <input type='hidden' name='enrollStudentValue' value=".$row['id'].">
                                            
                                            <input type='submit' name='enrollStudent' value='Enroll' class='btn btn-primary'>
                                        </form>";

                                            // {$row[\'id\']}

                                        } elseif ($row['status'] == 'enrolled') {
                                            echo '<button class="btn btn-secondary" disabled>Enrolled</button>';
                                        } else {
                                            //nothing
                                        }

                                        ?>
                                    </td>

                                </tr>
                        <?php }
                        } else {
                            echo "No record found.";
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
         <?php if (isset($msg)) { ?>
             <?php echo $msg; ?>
         <?php } ?>
    </div>

</body>
</html>

<?php


if (isset($_POST['enrollStudent'])) {

    // echo "<script type='text/javascript'>alert('{$_POST['enrollStudentValue']}');</script>";
    $updateQuery = "UPDATE students1 SET status=\"enrolled\" WHERE id={$_POST['enrollStudentValue']}";
    $updateRun = mysqli_query($conn, $updateQuery);
    echo "<meta http-equiv='refresh' content='0'>";
    
    // $URL1 = "dashboard.php";
    // echo "<script>location.href='$URL1'</script>";
}

if (isset($_POST['dashboardlogout'])) {
    session_unset();
    session_destroy();

    // sleep(2);

    // header('location: login.php?successfully+logout');
    $URL = "admin-login.php";
    echo "<script>location.href='$URL'</script>";
    exit;
}

?>