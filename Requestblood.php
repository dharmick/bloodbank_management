<?php
ob_start();
session_start();
include_once("connection.php");
?>

<?php

if(!isset($_SESSION['Emp_email'])){
    //send them to login page
    echo "<script>alert('You are not logged in')</script>";
    header("location:login.php");
}

?>

<?php
  if($_SESSION['post'] != 5)
  {
    // echo "<script>alert('Sign Up successful')</script>";
    die("Not authorized to access this page! \n Please go back to previous page");
  }
?>

<?php
if($_SESSION['passwordchanged']==0){
  $_SESSION['message'] = "Reset your password to proceed";
  header("location: ./reset.php");
  exit();
}


$success = 0;

date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['submit']))
{
  $hname = $_POST['hname'];
  $units = $_POST['units'];
  $bloodgroup = $_POST['bg'];
  $comment = $_POST['comment'];

  $query = "SELECT Hospital_id from hospitals where Hospital_name = '$hname'";
  $result = mysqli_query($conn,$query);
    if($result);
    {
    $row =mysqli_fetch_assoc($result);
    $hid = $row['Hospital_id'];
    $flag = 1;
    }

    if($flag == 1)
    {
      $query = "INSERT INTO orders(Hospital_id,Units,Blood_group,Comments) values ('$hid','$units','$bloodgroup','$comment')";
      if(mysqli_query($conn,$query))
      {
        echo "<script>alert('Order request sent successfully')</script>";
        $success = 1;
      }

      if($success == 1)
      {
        $_SESSION['message'] = "Order request sent successfully";
        header("location: order_hosp.php");
      }
    }
}

?>










<!DOCTYPE html>
<html>
<head>
	<title> Request Blood </title>
	 <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Lato:900" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="./css/main.css">

  <link rel="shortcut icon" href="./images/favicon.png">
  <!-- <link rel="stylesheet" type="text/css" href="./css/main.css"> -->


  <style type="text/css">

    .panel-primary>.panel-heading {
      background-color: #ad1457;
      color: white;
      border-color: #ad1457;
    }
    .btn {
      background-color: #ad1457;
      color: white;
      width: 125px;
      border-radius: 10px;
      transition: .05s ease-in-out;
    }
   /* .btn:hover {
      background-color: #9e0045;
      color: white;
      transform: scale(1.05);
      box-shadow: 0 0 10px 0 #d32e77;
    }*/

    .dform button[type="submit"]:hover, .dform button[type="submit"]:active{
      background-color: #a01150;
      color: white;
      box-shadow: 0 0 10px 0 #d32e77;
      transform: scale(1.05);
      outline: 0 none !important;
    }
    .panel-primary {
      border-color: #ad1457;
    }

    /*.dform input[type="text"], .dform input[type="email"] {
      width: 95%;
    }*/

   .col-md-8 {
    /*z-index: -1 !important;*/
   }

   .dform input:focus{
      outline: 0 none !important;
      box-shadow: 0 0px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(173, 20, 87,0.6);
      border-color:  rgba(173, 20, 87,0.6);
    }

     .dform textarea:focus{
      outline: 0 none !important;
      box-shadow: 0 0px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(173, 20, 87,0.6);
      border-color:  rgba(173, 20, 87,0.6);
    }
     .dform select:focus{
      outline: 0 none !important;
      box-shadow: 0 0px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(173, 20, 87,0.6);
      border-color:  rgba(173, 20, 87,0.6);
    }
    .dform select option:hover{
      background-color: #ad1457 !important;
      color: white !important;
    }

    .log {
      box-shadow: 0 0 10px 0 rgba(0,0,0,0.3);
      font-family: Lato;
    }

    .alert{
      padding: 0;
      border-width: 0;
    }

    .alert p {
      padding: 5px;
    }

  </style>
</head>

<body>

<?php include('./sidenav.php')?>
<div id="main" class="shrink">
  <?php include('./horizontal-nav.php')?>
 <div class="">
 <div class= "col-md-8 col-md-offset-2" style="margin-top: 50px;">
    <div class="panel panel-primary">
      <div class="panel-heading" style="font-family: Lato;"><b>Request Blood</b></div>
        <div class="panel-body log">
          <div class="dform">
          <form id="form1" role="" action="" method="POST">
            <div class="form-group has-feedback">
            <label for="HospitalName">Hospital Name:</label>
            <input type="text" class="form-control" id= "HospitalName" placeholder="Name" name="hname" value = '<?php echo
            $_SESSION['Ename']; ?>' readonly>
            </div>

            <div class="form-group has-feedback">
            <label for="Unitsrequired">No of units required:</label>
            <input type="text" class="form-control" id= "Unitsrequired" placeholder="Enter required number of units in liter" name="units" required>
            <div class="alert alert-danger"></div>
            </div>

            <div class="form-group has-feedback">
            <label for="Blood Group">Blood Group:</label>
             <select class="form-control" name="bg" >
                <option value="A+">A+</option>
                <option value="B+">B+</option>
                <option value="AB+">AB+</option>
                <option value="A-">A-</option>
                <option value="B-">B-</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
              </select>
            </div>

            <div class="form-group has-feedback">
            <label for="Address">Comments:</label>
            <textarea type="text" class="form-control" id= "Address" placeholder="Comments, if any" name="comment"></textarea>
            <div class="alert alert-danger"></div>
            </div>
            <button type="submit" class="btn" style="margin-bottom: 15px;" name="submit">Submit</button>
          </form>
        </div>
    </div>
  </div>
</div>
</div>
</div>
<script src="js/validations.js"></script>
</body>
</html>
