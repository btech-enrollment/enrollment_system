<?php
    
    session_start();

    if (!$_SESSION['login-status']) {
      
      header('location: login.php');
      exit;
      // $LOGIN="login.php";
      // echo "<script>location.href='$LOGIN'</script>";

    }
    
    include "database.php";

    if ($_SESSION['status'] == 'processing' || $_SESSION['status'] == 'enrolled') {
      echo '<script>alert("You cannot perform to this action.");</script>';
      !$_SESSION['login-status'];
      $redirect="option.php";
      echo "<script>location.href='$redirect'</script>";
      exit;
    }

    if (isset($_POST['submit-enrollment'])) {
      
      echo '<script>alert("Thanks for submitting your application!\nPlease wait to process your request.");</script>';
      
      $address = $_POST['address'];
      $snumber = $_POST['snumber'];
      $gnumber = $_POST['gnumber'];

      $updateQuery = "UPDATE students1 SET status='processing', complete_address='$address', guardian_mobile_number='$gnumber'  WHERE id={$_SESSION['students']}";

      $updateRun = mysqli_query($connection, $updateQuery);
      

      $out="logout.php";
      echo "<script>location.href='$out'</script>";
      exit;


      if ($updateRun != 1) {
        // echo '<script>alert("'.$address. '");</script>';
      }
      echo "<meta http-equiv='refresh' content='0'>";
      
      // UPDATE ADDRESS NUMBER GUARDIAN NUMBER status = processing

    }
      

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enrollment Application | BTECH </title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
body {
    text-align: center;
    background: url(../img/heaven.jpg) center/cover no-repeat;
    height: 100vh;
}
  .topnav {
    width: 100%;
    height: 200px;
    background: linear-gradient(green, greenyellow);
    text-align: center;
    padding: 10px;
    box-shadow: 0px 0px 20px -8px #444;
  }
  .topnav img{
    width: 180px;
    height: 180px;
    
  }
  .info {
    display: inline-block;
  }
  .footer {
    font-size: 12px;
    padding: 0 0 20px 0;
    color: #aaa;
  }
  form {
    background: #fafafa;
    border-radius: 10px;
    width: 600px;
    padding: 40px 0;
    margin: 0 auto;
    margin-top: 50px;
  }
  form input {
    width: 400px;
  }

  .back-button {
      text-decoration: underline;
  }

</style>
<body>

    <div class="topnav">
        <img src="img/logo.png" alt="">
    </div>
  
    <a class="float-left mt-5 ml-5 font-weight-bold back-button" href="<?php  ?>option.php">
    
    <i class="fas fa-angle-double-left"></i>
    
     Back to option</a>
    
    <form action="enrollment-form.php" method="POST">
    
        <div class="container text-center mt-5">
            <h1>Enrollment Form</h1>
        </div>
        <div class="info text-center mb-5 mt-5">
        <label for="">Name : </label>
        <input type="text" disabled placeholder="<?php echo $_SESSION['name']; ?>" name="" id=" " class="form-control">
        <label for="">Course/Year/Sec : </label>
        <input type="text" name="" id=" " disabled placeholder="<?php echo $_SESSION['course']; echo ' '; echo $_SESSION['year_level']; echo ' - '; echo $_SESSION['section']; ?>" class="form-control">
        <label for="">Birthday : </label>
        <input type="text" maxlength="11" disabled placeholder="<?php echo $_SESSION['birthday']; ?>" name="" id=" " class="form-control">
        <label for="">Email Address : </label>
        <input type="email" name="" disabled id=" " placeholder="<?php echo $_SESSION['email']; ?>" class="form-control">
        <label for="">Guardian Name : </label>
        <input type="text" disabled placeholder="<?php echo $_SESSION['guardian']; ?>" name="" id=" " class="form-control">


            <br><br>
        
        <label for="">Complete Address : </label>
        <input type="text" name="address" id=" " class="form-control" required>
        <label for="">Student's Mobile Number : </label>
        <input type="number" required placeholder="" name="snumber" id=" " class="form-control">
        <label for="">Guardian Mobile Number : </label>
        <input type="number" required name="gnumber" id=" " placeholder="" class="form-control">
        <br>
        
        <input type="submit" name="submit-enrollment" value="Submit Enrollment" class="btn btn-primary">
        </div>
    </form>
    <hr>
    <div class="footer text-center mt-5">
        <p>&copy; Online Enrollment Application for Baliwag Polytechnic College</p>
    </div>
  
  
</body>
</html>
