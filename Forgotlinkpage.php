<?php
ob_start();
session_start();
include_once("connection.php");
?>

<?php 
//$ty = $_GET['type'];
//echo "<script>alert('$ty')</script>";
if(isset($_GET['type']) && isset($_GET['token']))
{
  //echo "<script>alert('Sign Up successful')</script>";  
  $type = $_GET['type'];
  $token = $_GET['token'];
  $time = time();
  $time = $time - (0.5*60*60) - 60;
  
    //echo "<script>alert('Sign Up successful')</script>";
    $sql = "SELECT * FROM forgotpass WHERE token = '$token' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1)
    {
      //echo "<script>alert('Sign Up successful')</script>";
      $row = mysqli_fetch_assoc($result);
      $otime = $row['recorded_time'];
      $eid = $row['Emp_id'];
      if($time > $otime)
      {
        //echo "<script>alert('Time')</script>";
        $_SESSION['message'] = "Time Limit Exceeded Please try again";
        header("location: ./forgotpass.php");
        exit();
      }
      else
      {
        //echo "<script>alert('Else')</script>";
        if(isset($_POST['login']))
        {
          //echo "<script>alert('Else')</script>";
          $newpass = $_POST['newpass'];
          $confirmpass = $_POST['confirmpass'];
          if($newpass == $confirmpass)
          {
              //echo "<script>alert('Else')</script>";
              $options = array("cost"=>4);
              $hashPassword = password_hash($newpass,PASSWORD_BCRYPT,$options);
              if($type == 'employee')
              {
                $sql = "SELECT * FROM employees WHERE Emp_id = '$eid' ";
              }
              elseif($type == 'hospital')
              {
                $sql = "SELECT * FROM hospitals WHERE Hospital_id = '$eid' ";
              }
              $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 1)
            {
              //echo "<script>alert('Else')</script>";
              if($type == 'employee')
              {
                $query = "update employees set Password = '$hashPassword'
                         WHERE Emp_id = '$eid' ";
              }
              else
              {
                 $query = "update hospitals set Hosp_passwd = '$hashPassword'
                         WHERE Hospital_id = '$eid' ";
              }
              
              $result = mysqli_query($conn, $query);
              //echo "<script>alert('$eid')</script>";
              if($result)
              {
                //echo "<script>alert('Else')</script>";
                $_SESSION['message'] = "Password updated Successfully";
                header("location: ./login.php");
                exit();
              } 
            }
          }
        }
      }
    }
}
else
{
   $_SESSION['message'] = "Kindly get link from Email!!";
    header("location: ./forgotpass.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Set New Password</title>
   <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="./css/main.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Lato:900" rel="stylesheet">

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
      margin-bottom: 30px;
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
  </style>
</head>
<body>
  <div class="alert-box"></div>
  <?php
  if(isset($_SESSION['message']))
    {
      echo "<script>showAlert('".$_SESSION['message']."')</script>";
      unset($_SESSION['message']);
    }
  ?>
  <section class="login">
    <div class="hover-scale">
      <a style="text-decoration: none;" href="#" class="glyphicon glyphicon-arrow-left"></a>
    </div>

    <form action="" role="form" method="POST">
      <h2>Set New Password</h2>

      <div class="form-group">
         <input type="Password" class="form-control" id="pwinput" placeholder="New Password" name="newpass" autocomplete="false">
         <div class="alert alert-danger"></div>
        </div>
        <div class="form-group">
          <input type="checkbox" name="" id="pwcheck"> Show Password
        </div>
       <div class="form-group">
        <input type="password" class="form-control" id="confirmpass" placeholder="Confirm Password" name="confirmpass">
        <div class="alert alert-danger"></div>
        </div>
<!--         <a href="#">Forgot Password</a>
 -->        <button type="submit" class="btn" name="login">Save Changes</button>
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
