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
            <th>Name <i class="glyphicon glyphicon-sort"></i></th>
            <th>Contact &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-sort"></i></th>
            <th>Gender <i class="glyphicon glyphicon-sort"></i></th>
            <th>Email Id <i class="glyphicon glyphicon-sort"></i></th>
            <th>Age <i class="glyphicon glyphicon-sort"></i></th>
            <th>Weight <i class="glyphicon glyphicon-sort"></i></th>
            <th>Blood Group <i class="glyphicon glyphicon-sort"></i></th>
            <th>Date <i class="glyphicon glyphicon-sort"></i></th>
            <th>Status <i class="glyphicon glyphicon-sort"></i></th>
            <th>Edit</th>
          </tr>
          </thead>
         <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
         <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
         <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
         <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
         <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
         <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
        <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
        <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
        <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
        <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
            <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
            <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
            <tr>
          <td>Parth</td>
          <td>7977263730</td>
          <td>Male</td>
          <td>parth.js@somaiya.edu</td>
          <td>20</td>
          <td>65</td>
          <td>O+</td>
          <td>15/08/2018</td>
          <td>Accepted</td>
          <td><button type = 'submit' class = 'btn btn-primary btn-sm'>
                <span class='glyphicon glyphicon-edit'></span>
          </button></td>
        </tr>
        </table>
      </div>
    </div>
    <!--footer-->
   <?php include_once("footer.php") ?>
    <!--footer ends-->
  </div>
  </div>
</body>