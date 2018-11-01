<?php
ob_start();
session_start();
include_once("connection.php");
?>

<?php 

if(isset($_SESSION['Emp_email'])){
    //send them to login page
    //echo "<script>alert('You are not logged in')</script>";
    header("location:logout.php");
}

?>

<?php

$loginsuccess = 0;
$flag = 2;
$f = 1;

if(isset($_POST['login']))
{
	$Username=$_POST['email'];
	$Password=$_POST['password'];

	$query="SELECT * from employees where Emp_email='$Username'";
	$result=mysqli_query($conn,$query);

	if(mysqli_num_rows($result) == 1)
	{
		$row=mysqli_fetch_assoc($result);
		$pid = $row['P_id'];
		$pass=$row['Password'];
		$postid = $row['Post_id'];

		//password_verify($Password,$pass)
		if(password_verify($Password,$pass))
		{
			$loginsuccess = 1;
		}

		$flag = 1;
	}

	if($flag != 1)
	{
		$query="SELECT * from hospitals where Hosp_email='$Username' and Status = 'Registered' ";
		$result=mysqli_query($conn,$query);

		if(mysqli_num_rows($result) == 1)
		{
			$row=mysqli_fetch_assoc($result);
			$hid = $row['Hospital_id'];
			$pass=$row['Hosp_passwd'];
			$postid = $row['Post_id'];

			if(password_verify($Password,$pass))
			{
				$loginsuccess = 1;
			}

			$flag = 0;
		}
		else
		{
			//echo "<script>alert('Error!')</script>";
			$f = 0;

		}
	}

	if($loginsuccess == 1 && $flag == 1)
	{
		$_SESSION['Emp_email']  = $row['Emp_email'];
		$_SESSION['passwordchanged'] = $row['password_changed'];
		$_SESSION['post'] = $row['Post_id'];
		$_SESSION['Pid']  = $row['P_id'];
		$_SESSION['Eid'] = $row['Emp_id'];

		$sql = "SELECT Name from person where P_id = $pid";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 1)
		{
			$row=mysqli_fetch_assoc($result);
			$_SESSION['Ename']  = $row['Name'];
			$loginsuccess = 1;
		}

			switch ($postid) {

				case 1:
					header("location:inventory_admin.php");
					break;

				case 2:
					header("location:lt.php");
					break;

				case 3:
					header("location:rp.php");
					break;

				case 4:
					header("location:ds.php");
					break;

				default:
					break;
			}

		}
		elseif ($loginsuccess == 1 && $flag != 1)
		{
			$_SESSION['Emp_email']  = $row['Hosp_email'];
			$_SESSION['hid'] = $row['Hospital_id'];
			$_SESSION['passwordchanged'] = $row['passwd_change'];
			$_SESSION['post'] = $row['Post_id'];
			$_SESSION['Ename'] = $row['Hospital_name'];

			header("location:order_hosp.php");

		}
		elseif($flag != 0 && $flag != 1)
		{
			$_SESSION['message'] = "User does not Exist";
		}
		else
		{
			if($f!=0)
			$_SESSION['message'] = "Password Incorrect";
		}





}


?>









<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	 <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="./css/main.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Lato:900" rel="stylesheet">

  <script src="js/main.js"></script>

    <link rel="shortcut icon" href="./images/favicon.png">

	<style>
		body {
			background: #f5f5f5;
			font-family: Lato;
			color: #d32370 !important;
		}
		.form-control-feedback {
			top: 3px;
			right: 2px;
		}
		.form-group
		{
			position: relative;
		}
		.login {
			height:80vh;
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
			margin: 10vh;
			background: white;
			border-radius: 5px;
			position: relative;
			overflow: hidden;
			display: flex;
			justify-content: center;
			align-items: center;

		}
		.login:before {
			content: "";
			z-index: 1;
			width: 700px;
			height:700px;
			border-radius: 50%;
            background-image: linear-gradient(#c63374,#ad1457);
			position: absolute;
			bottom:-300px;
			left: -300px;
		}
		.login:after {
			content: "";
			width: 300px;
			height:400px;
			border-radius: 50px;
			background-image: linear-gradient(#c63374,#ad1457);
			position: absolute;
			top:-100px;
			right: -100px;
			transform: rotateZ(-30deg);
		}
		.login form {
			width: 300px;
		}
		.login input {
			padding: 20px;
			border-radius: 20px;
			position: relative;
		}
		.login button[type="submit"] {
			background-color: #ad1457;
			color: white;
			width: 100%;
			border-radius: 20px;
			padding: 10px;
			margin-top: 15px;
			font-weight: bold;
			font-size: 15px;
		}
		.login button[type="submit"]:hover, .login button[type="submit"]:active{
			background-color: #a01150;
			color: white;
      		box-shadow: 0 0 10px 0 #d32e77;
      		outline: 0 none !important;
		}
		.login h2 {
			font-size: 45px;
			margin-bottom: 25px;
			font-weight: bold;
			color: #797d7f;
			text-transform: uppercase;
			font-family: Lato;
		}
		.login input:focus{
			outline: 0 none !important;
			box-shadow: 0 0px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(173, 20, 87,0.6);
			border-color:  rgba(173, 20, 87,0.6);
		}
		.hover-scale{
			position: absolute;
			top: 35px;
			left: 25px;
			font-size: 20px;
			color: #ad1457;

		}
		.hover-scale:before {
			width: 40px;
			height: 40px;
			transform: translate(-9px,-9px) scale(0.7);
			content: "";
			border-radius: 50%;
			position: absolute;
			background: #ccc;
			transition: all 250ms;
			opacity: 0;
		}
		.hover-scale:hover:before {
			transform: translate(-9px,-9px) scale(1);
			opacity: 1;
		}

		.alert{
      padding: 0;
      border-width: 0;
      border-radius: 15px;
    }

    .alert p {
      padding: 5px;
    }

    .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

	#pwcheck {

	}
	</style>
</head>
<body>
	  <div class="alert-box"></div>
	  <?php
	  //echo "<script>alert('Else')</script>";
	  if(isset($_SESSION['message']))
	    {
	    	//echo "<script>alert('Else')</script>";
	      echo "<script>showAlert('".$_SESSION['message']."')</script>";
	      unset($_SESSION['message']);
	    }
	  ?>
	<section class="login">
		<div class="hover-scale">
			<a style="text-decoration: none;" href="index.php" class="glyphicon glyphicon-arrow-left"></a>
		</div>

		<form action="" role="form" method="POST">
			<h2>Login</h2>
			<div class="form-group">
  			 <input type="text" class="form-control email" id="exampleInputEmail1" placeholder="Email" name="email" autocomplete="false">
  			 <div class="alert alert-danger"></div>
  			</div>
 			 <div class="form-group">
    		<input type="password" id="pwinput" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    		<!-- <i class="glyphicon glyphicon-eye-close form-control-feedback toggle-password" ></i> -->
    		<div class="alert alert-danger"></div>
    		</div>
    		<div class="form-group">
    			<input type="checkbox" name="" id="pwcheck"> Show Password
    		</div>
    		<a href="forgotpass.php">Forgot Password</a>
    		<button type="submit" class="btn" name="login">LOGIN</button>
		</form>
	</section>
	<script src="js/validations.js"></script>
	<script type="text/javascript">

	$(document).ready(function(){

    $("#pwinput").focus();

    $("#pwcheck").click(function(){
    	$(".toggle-password").toggleClass("glyphicon glyphicon-eye-open");
        var pw = $("#pwinput").val();
        if ($("#pwcheck").is(":checked"))
        {
            $("#pwinput").prop('type','text');
        }
        else
        {
            $("#pwinput").prop('type','password');
        }

    });
});

	</script>
	
</body>
</html>
