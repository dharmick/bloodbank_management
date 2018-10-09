<?php
ob_start();
session_start(); 
include_once("connection.php");
?>

<?php

if(!isset($_SESSION['Emp_email'])){
    //send them to login page
    echo "<script>alert('You are not logged in')</script>";
    header("location:index.php");
}

?>

<?php

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
        $_SESSION['success'] = $success;
      }


    // You need to install the sendgrid client library so run:     
    // composer require sendgrid/sendgrid
    require './vendor/autoload.php';
    
    // contains a variable called: $API_KEY that is the API Key.
    // You need this API_KEY created on the Sendgrid website.
    $API_KEY="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";
    
    $FROM_EMAIL = 'dharmik.joshi@somaiya.edu';
    // they dont like when it comes from @gmail, prefers business 
    // emails
    
    $TO_EMAIL = 'parth.js@somaiya.edu';
    // Try to be nice. Take a look at the anti spam laws. In most
    // cases, you must have an unsubscribe. You also cannot be 
    // misleading.
    $subject = "YOUR_SUBJECT";
    $from = new SendGrid\Email(null, $FROM_EMAIL);
    $to = new SendGrid\Email(null, $TO_EMAIL);
    $htmlContent = '';
    // Create Sendgrid content
    $content = new SendGrid\Content("text/html",$htmlContent);
    // Create a mail object
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    
    $sg = new \SendGrid($API_KEY);
    $response = $sg->client->mail()->send()->post($mail);
      
    if ($response->statusCode() == 202) {
     // Successfully sent
     echo 'done';
    } else {
     echo 'false';
    }




  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Set New Password</title>
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
      <div class="panel-heading" style="font-family: Lato;"><b>Set New Password</b></div>
        <div class="panel-body log">
          <div class="dform">
          <form id="form1" role="form" action="" method="POST">

            
            
            <div class="form-group has-feedback">
              <label for="Newpass">New Password:</label>
              <input type="Password" class="form-control" id= "Newpass" name="Newpass" placeholder="New Password" required>
              <div class="alert alert-danger"></div>
            </div>

            <div class="form-group has-feedback">
              <label for="Confirmpass">Confirm New Password:</label>
              <input type="Password" class="form-control" id= "Confirmpass" name="Confirmpass" placeholder="Confirm Password" required>
              <div class="alert alert-danger"></div>
            </div>

            
            
            
            <button type="submit" class="btn" style="margin-bottom: 15px;" name="save">Save</button>
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