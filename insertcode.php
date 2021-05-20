<?php 

    include "database.php";
    
    if (isset($_POST['insertdata'])) {

        $addusername = $_POST['addusername'];
        $addname = $_POST['addname'];
        $addcourse = $_POST['addcourse'];
        $addyearlevel = $_POST['addyearlevel'];
        $addsection = $_POST['addsection'];
        $addbday = $_POST['addbday'];
        $addcompleteaddress = $_POST['addcompleteaddress'];
        $addemail = $_POST['addemail'];
        $addstudentmobile = $_POST['addstudentmobile'];
        $addguardian = $_POST['addguardian'];
        $addguardiannumber = $_POST['addguardiannumber'];
        $addstatus = $_POST['addstatus'];
        $addpass = $_POST['addpass'];

        $insertQuery = "INSERT INTO students1 (`username`, `name`, `course`, `year_level`, `section`, `birthday`, `complete_address`, `mobile_number`,
        `guardian`, `guardian_mobile_number`, `email`, `status`, `password`)
        VALUES ('$addusername', '$addname', '$addcourse', '$addyearlevel', '$addsection', '$addbday', '$addcompleteaddress', '$addemail', '$addstudentmobile',
        '$addguardian', '$addguardiannumber', '$addstatus', '$addpass')";

        $qryrun = mysqli_query($connection, $insertQuery);

        if ($qryrun) {
            $msg="<div class='alert alert-success text-center' role='alert'>Data Successfully Added!</div>";
            $redirect="dashboard.php";
            echo "<script>location.href='$redirect'</script>";
            exit;
        } else {
            $msg="<div class='alert alert-danger text-center' role='alert'>Data not inserted!</div>";
            echo '<script>alert("Error!");</script>';
        }

    }

?>