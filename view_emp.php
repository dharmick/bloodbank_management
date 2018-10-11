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
  if($_SESSION['post'] != 1)
  {
    // echo "<script>alert('Sign Up successful')</script>";
    die("Not authorized to access this page! Please go back to previous page");
  }
?>

<?php 

$query = "SELECT * FROM employees inner join person where employees.P_id = person.P_id and Post_id != 1";
$result = mysqli_query($conn,$query);

$successMessage="";
if(isset($_GET['alert']))
{
    if($_GET['alert']=="success")
    {
        $successMessage='<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
            </button>
        <strong>Signup successful</strong>
        </div>';  

    }
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
  	/* #nav-main {
    background-color: transparent;
    width: 100%;
    display: block;
    margin: 0px auto;
    padding-top: 10px;
    padding-bottom: 10px;
    } */
    .alert-success {
    color: #ad1457;
    background-color: #e8dae1;
    border-color: #e8dae1;
    margin: 60px 15px 0px 15px;
    }

    .box {
      box-shadow: 0 0 10px 0 rgba(0,0,0,0.3);
      margin-top: 0px;
      padding: 15px;
      border-radius: 5px;
			margin: 20px;
      margin-top: 62px;
    }
    table {
    	border: 2px solid #ad1457 !important;
    	font-family: 'Verdana', sans-serif;
      margin-bottom: 0px !important;
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
  </style>
</head>
<body>

<?php include('./sidenav.php')?>
  <div id="main" class="shrink">
    <?php include('./horizontal-nav.php')?>
    <?php 
        echo $successMessage;
    ?> 
    <div class="box">
      <div class="table-responsive">
        <table class="table table-bordered ">
          <thead>
            <tr>
              <th>Name</th>
              <th>Contact</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Email Id</th>
              <th>Post</th>
             </tr> 
          </thead>

          <?php 

          if(mysqli_num_rows($result)>0)
          {
            //we have data to display 
            while($row =mysqli_fetch_assoc($result))
            {

              echo "<tr>";
              echo "<td>".$row['Name']."</td>";
              echo "<td>".$row['Contact']."</td>";
              echo "<td>".$row['Gender']."</td>";
              echo "<td>".$row['Address']."</td>";
              echo "<td>".$row['Emp_email']."</td>";

              switch ($row['Post_id']) {
              	case 2:
              		echo "<td>Lab Technician</td>";
              		break;

              	case 3:
              		echo "<td>Receptionist</td>";
              		break;

              	case 4:
              		echo "<td>Delivery Staff</td>";
              		break;
              	
              	default:
              		break;
              }
              echo"</tr>";
            }
          }
          else
          {
            //if ther are no entries
            echo "<div class='alert alert-warning'>No data to display for donors</div>";
          }

          ?>
        
      
        </table>
      </div>
    </div>
		<!--footer-->
	 <?php include_once("footer.php") ?>
	  <!--footer ends-->
  </div>



  <script type="text/javascript">
    var header = document.getElementById("nav-main");
    var btns = header.getElementsByClassName("tab");
    console.log(btns);
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("current");
    current[0].className = current[0].className.replace("current", "");
    this.className += " current";
    });
  }
  </script>
</body>
</html>