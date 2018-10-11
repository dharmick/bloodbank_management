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
  if($_SESSION['post'] != 1)
  {
    // echo "<script>alert('Sign Up successful')</script>";
    die("Not authorized to access this page! Please go back to previous page");
  }
?>

<?php 

$query = "SELECT * FROM hospitals";
$result = mysqli_query($conn,$query);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="./css/navbar_style.css">
  <link rel="stylesheet" type="text/css" href="./css/main.css">

  <link rel="shortcut icon" href="./images/favicon.png">

  <style type="text/css">
     .box {
      box-shadow: 0 0 10px 0 rgba(0,0,0,0.3);
      margin-top: 0px;
      padding: 15px;
      border-radius: 5px;
      margin: 20px;
      margin-top: 68px;
    }
    table {
      border: 2px solid #ad1457 !important;
      font-family: 'Verdana', sans-serif;
      margin-bottom: 0px !important;
    }
    .table-bordered>thead>tr>th {
    border: 1px solid #ddd !important;
	}
    th {
      background-color: #ad1457;
      color: white;
      cursor: pointer;
    }
    th, td {

      padding: 12px !important;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    tr:hover
    {
      background-color: #efe8dc;
      color: #ad1457;
    }
    .btn-primary {
      color: #fff !important;
      background-color: #ad1457 !important;
      border-color: #ad1457 !important;
    }
     .btn-primary:hover {
      color: #fff !important;
      background-color: #93134b !important;
      border-color: #93134b !important;
    }
  </style>
</head>
<body>
  
  <?php include('./sidenav.php')?>
  <div id="main" class="shrink">
    <?php include('./horizontal-nav.php')?>
    <div class="box">
      <div class="table-responsive">
        <table class="table table-bordered ">
          <thead>
          <tr>
            <th>Hospital Name</th>
            <th>Email ID</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Certificate</th>
            <th>Status</th>
          </tr>
          </thead>
          
          <?php 

          if(mysqli_num_rows($result)>0)
          {
            //we have data to display 
            while($row =mysqli_fetch_assoc($result))
            {

              echo "<tr>";
              echo "<td>".$row['Hospital_name']."</td>";
              echo "<td>".$row['Hosp_email']."</td>";
              echo "<td>".$row['Contact']."</td>";
              echo "<td>".$row['address']."</td>";
              echo "<td>".'<img src="data:image/jpeg;base64,'.base64_encode( $row['Hosp_certi'] ).'" width=60 height=60/>'."</td>";
              echo "<td>".$row['Status']."</td>";
              echo"</tr>";
            }
          }
          else
          {
            //if ther are no entries
            echo "<div class='alert alert-warning'>No data to display</div>";
          }
          ?>
        </table>
      </div>
    </div>
    <!--footer-->
   <?php include_once("footer.php") ?>
    <!--footer ends-->
  </div>
  </div>
</body>