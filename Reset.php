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











<!DOCTYPE html>
<html>
<head>
	<title> Reset Password</title>
	 <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="js/main.js" charset="utf-8"></script>

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
<div class="alert-box"></div>
<?php include('./sidenav.php');
if(isset($_SESSION['message'])) {
  echo "<script>showAlert('".$_SESSION['message']."')</script>";
  unset($_SESSION['message']);
}
?>
<div id="main" class="shrink">
  <?php include('./horizontal-nav.php')?>
 <div class="">
 <div class= "col-md-8 col-md-offset-2" style="margin-top: 50px;">
    <div class="panel panel-primary">
      <div class="panel-heading" style="font-family: Lato;"><b>Reset Password</b></div>
        <div class="panel-body log">
          <div class="dform">
          <form id="form1" role="form" action="reset_submit.php" method="POST">

            <div class="form-group has-feedback">
	            <label for="Oldpass">Current Password:</label>
	            <input type="Password" class="form-control" id= "pwinput" name="Oldpass" placeholder="Current Password" required>
							<div class="alert alert-danger"></div>
            </div>

            <div class="form-group">
              <input type="checkbox" name="" id="pwcheck"> Show Password
            </div>

            <div class="form-group has-feedback">
              <label for="Newpass">New Password:</label>
              <input type="Password" class="form-control" id= "pwinput1" name="Newpass" placeholder="New Password" required>
              <div class="alert alert-danger"></div>
            </div>

          <div class="form-group">
            <input type="checkbox" name="" id="pwcheck1"> Show New Password
          </div>

            <div class="form-group has-feedback">
              <label for="Confirmpass">Confirm New Password:</label>
              <input type="Password" class="form-control" id= "Confirmpass" name="Confirmpass" placeholder="Confirm Password" required>
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

    $(document).ready(function(){

    $("#pwinput1").focus();

    $("#pwcheck1").click(function(){
      $(".toggle-password").toggleClass("glyphicon glyphicon-eye-open");
        var pw = $("#pwinput1").val();
        if ($("#pwcheck1").is(":checked"))
        {
            $("#pwinput1").prop('type','text');
        }
        else
        {
            $("#pwinput1").prop('type','password');
        }

    });
});
  </script>

</body>
</html>
