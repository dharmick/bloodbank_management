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

if(isset($_POST['sign']))
{
	$fname = $_POST['name'];
	$mob = $_POST['contact'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$position = $_POST['post'];
	$email = $_POST['email'];

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

			$query = "INSERT INTO employees(P_id,Emp_email,Post_id) values ('$pid','$email','$position')";
			if(mysqli_query($conn,$query))
			{
				echo "<script>alert('Sign Up successful')</script>";
				$success=1;
				$_SESSION['success'] = $success;
			}
	}
}
?>













<!-- <?php $link = $_SERVER['REQUEST_URI']; ?> -->


<?php 
  if($_SESSION['post'] != 1)
  {
    // echo "Hii";
    
    // echo "<script>alert('Sign Up successful')</script>";
    // echo "<script>alert('$link')</script>";
    die("Not authorized to access this page! \n Please go back to previous page");
  }
?>




<!DOCTYPE html>
<html>
<head>
	<title> Sign up Form </title>
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
  
  
  
    .panel-primary>.panel-heading  {
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

    .dform input[type="text"], .dform input[type="email"] {
      width: 95%;
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
    .dform option:hover{
      background-color: #ad1457;
      color: white;
    }

    .log {
      box-shadow: 0 0 10px 0 rgba(0,0,0,0.3);
      font-family: Lato;
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
      <div class="panel-heading" style="font-family: Lato;"><b>
      Signup Form</b></div>
        <div class="panel-body log">
          <div class="dform">
          <form id="form1" role="form" action="" method="post">
            <div class="form-group has-feedback">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" id= "Name" name="name" placeholder="Name">
            </div>
            <div class="form-group has-feedback">
            <label for="Contact">Contact No:</label>
            <input type="text" class="form-control" id= "Contact" placeholder="Contact No." name="contact">
            </div>
            <div class="form-group has-feedback">
            <label for="Address">Address:</label>
            <textarea style="width: 95%;" type="text" class="form-control" id= "Address" placeholder="Address" name="address"></textarea>
            </div>
            <div class="form-group has-feedback">
            <label for="Gender">Gender:</label>
            &nbsp; <label>
                <input type="radio" name="gender" id="optionsRadios1" value="Male" checked> Male
            </label>
            &nbsp; <label>
                <input type="radio" name="gender" id="optionsRadios1" value="Female"> Female
            </label>
            <div class="form-group has-feedback">
            <label for="Position">Position:</label>
             <select name="post" class="form-control"  style="width: 95%;">
                <option value="2">Lab Assistant</option>
                <option value="3">Receptionist</option>
                <option value="4">Delivery Staff</option>
                 </select>
            </div>
            <div class="form-group has-feedback">
            <label for="Email">Email:</label>
            <input type="email" class="form-control" id= "Email" placeholder="Email" name="email">
            </div>
            
            
            <button type="submit" class="btn" style="margin-bottom: 15px;" name="sign">Submit</button>
          </form>
        </div>
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>

