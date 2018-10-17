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
  if($_SESSION['post'] != 3)
  {
    // echo "<script>alert('Sign Up successful')</script>";
    die("Not authorized to access this page! Please go back to previous page");
  }

  if($_SESSION['passwordchanged']==0)
  {
	  $_SESSION['message'] = "Reset your password to proceed";
	  header("location: ./reset.php");
	  exit();
 }
?> 

<?php

$f = 0;
date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['submit']))
{
  $fname = $_POST['name'];
  $mob = $_POST['contact'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $weight = $_POST['weight'];
  $bloodgroup = $_POST['bg'];

  $sql = "SELECT * from donor where Email = '$email'";
  $res = mysqli_query($conn,$sql);
  if(mysqli_num_rows($res)>0)
  {
  	$row = mysqli_fetch_assoc($res);
  	$pid = $row['P_id'];
  	$bg = $row['Blood_group'];
  	$f = 1;
  	$query = "INSERT INTO donor(P_id,Email,Weight,Blood_group,Age) values ('$pid','$email','$weight','$bg','$age')";
      if(mysqli_query($conn,$query))
      {
        echo "<script>alert('Registration successful')</script>";
        $success=1;
      }

      if($success == 1)
      {
        $_SESSION['message'] = "Donor Registration Successful";
        header("location: rp.php");
      }

  }
  else
  {
  	 $sql = "SELECT * from employees where Emp_email = '$email'";
  	 $res = mysqli_query($conn,$sql);
  	 if(mysqli_num_rows($res) == 1)
  	 {
  	 	$row = mysqli_fetch_assoc($res);
  		$pid = $row['P_id'];
  		$f = 1;
  		$query = "INSERT INTO donor(P_id,Email,Weight,Blood_group,Age) values ('$pid','$email','$weight','$bloodgroup','$age')";
	      if(mysqli_query($conn,$query))
	      {
	        echo "<script>alert('Registration successful')</script>";
	        $success=1;
	      }

	      if($success == 1)
	      {
	        $_SESSION['message'] = "Donor Registration Successful";
	        header("location: rp.php");
	      }
  	 }
  }

  if($f == 0)
  {
	  $query = "INSERT INTO person(Name,Contact,Address,Gender) values ('$fname','$mob','$address','$gender')";
	  if(mysqli_query($conn,$query))
	  {
	    $flag = 1;
	  }

	  if($flag == 1)
	  {

	    $query = "SELECT P_id from person where Contact = '$mob'";
	    $result = mysqli_query($conn,$query);
	    if($result);
	    {
	    $row =mysqli_fetch_assoc($result);
	    $pid = $row['P_id'];
	    }

	      $query = "INSERT INTO donor(P_id,Email,Weight,Blood_group,Age) values ('$pid','$email','$weight','$bloodgroup','$age')";
	      if(mysqli_query($conn,$query))
	      {
	        echo "<script>alert('Registration successful')</script>";
	        $success=1;
	      }

	      if($success == 1)
	      {
	        $_SESSION['message'] = "Donor Registration Successful";
	        header("location: rp.php");
	      }

	  }
	}
}
?>









<!DOCTYPE html>
<html>
<head>
	<title> Registration Form </title>
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
      <div class="panel-heading" style="font-family: Lato;"><b>Registration Form</b></div>
        <div class="panel-body log">
          <div class="dform">
          <form id="form1" role="form" action="" method="POST">
            <div class="form-group has-feedback">
	            <label for="Name">Name:</label>
	            <input type="text" class="form-control" id= "Name" name="name" placeholder="Name" required>
							<div class="alert alert-danger"></div>
            </div>
            <div class="form-group has-feedback">
            	<label for="Contact">Contact No:</label>
            	<input type="text" class="form-control contact number" id= "Contact" placeholder="Contact No." name="contact" required>
							<div class="alert alert-danger"></div>
            </div>
            <div class="form-group has-feedback">
	            <label for="Address">Address:</label>
	            <textarea type="text" class="form-control" id= "Address" placeholder="Address" name="address" required></textarea>
							<div class="alert alert-danger"></div>
						</div>
            <div class="form-group has-feedback">
	            <label for="Gender">Gender:</label>
	            &nbsp; <label>
	                <input type="radio" name="gender" id="optionsRadios1" value="Male" checked  required> Male
	            </label>
	            &nbsp; <label>
	                <input type="radio" name="gender" id="optionsRadios1" value="Female"  required> Female
	            </label>
            </div>
            <div class="form-group has-feedback">
	            <label for="Age">Age:</label>
	            <input type="text" class="form-control number" id= "Age" placeholder="Age" name="age"  required>
							<div class="alert alert-danger"></div>
            </div>
            <div class="form-group has-feedback">
	            <label for="Email">Email:</label>
	            <input type="text" class="form-control email" id= "Email" placeholder="Email" name="email" required>
							<div class="alert alert-danger"></div>
            </div>
            <div class="form-group has-feedback">
	            <label for="Weight">Weight:</label>
	            <input type="text" class="form-control number" id= "Weight" placeholder="Weight" name="weight" required>
							<div class="alert alert-danger"></div>
            </div>
            <div class="form-group has-feedback">
            <label for="Blood Group">Blood Group:</label>
             <select class="form-control" name="bg" required>
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
