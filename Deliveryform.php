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
  if($_SESSION['post'] != 4)
  {
    // echo "<script>alert('Sign Up successful')</script>";
    die("Not authorized to access this page! \n Please go back to previous page");
  }

  if($_SESSION['passwordchanged']==0)
  {
    $_SESSION['message'] = "Reset your password to proceed";
    header("location: ./reset.php");
    exit();
 }
?>

<?php

if(isset($_SESSION['rows'])){
    if($_SESSION['rows'] == 0)
    {
        $_SESSION['message'] = "There are no deliveries!";
        header("location: ds.php");
    }
}

if(isset($_SESSION['delstat'])){
    if($_SESSION['delstat'] == 0)
    {
        $_SESSION['message'] = "There are no Pending deliveries!";
        header("location: ds.php");
    }
}

?>

<?php

$flag = 0;
$f = 0;

date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['submit']))
{
  $hname = $_POST['hname'];
  $oid = $_POST['orderid'];
  $token = $_POST['token'];
  $ddate = $_POST['ddate'];

  $query = "SELECT Hospital_id from hospitals WHERE Hospital_name = '$hname'";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result) == 1)
  {
    $row=mysqli_fetch_assoc($result);
    $hid = $row['Hospital_id'];
    $flag = 1;
    // echo "<script>alert('Registration successful')</script>";
  }
  else
  {
        echo "<script>alert('Hospital not registered with bloodbank')</script>";
  }

  if($flag == 1)
  {
    $query = "SELECT * from orders WHERE Order_id = '$oid' ";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) == 1)
    {
      $row=mysqli_fetch_assoc($result);
      $hospid = $row['Hospital_id'];
      $tokenver = $row['Token'];
      $status = $row['status'];
      $bid = $row['Blood_IDs'];
      $bu = $row['Blood_Units'];
      $bidar = explode (",", $bid);
      $buar = explode (",", $bu);
      $n = sizeof($bidar);

      if(($hospid == $hid) && ($tokenver == $token) && ($status == 'Accepted'))
      {
      	for($i=0; $i<$n; $i++)
      	{
      		$sql = "SELECT * from inventory WHERE Inv_id = $bidar[$i]";
      		$result = mysqli_query($conn,$sql);
      		if($result)
      		{
      			$row = mysqli_fetch_assoc($result);
      			$units = $row['Units'];
      			$date = date("Y-m-d H:i:s");
      			$sql1 = "update inventory set Units = ($units - $buar[$i]),
      									  Udate = '$date'
      									  WHERE Inv_id = $bidar[$i]";
      			$result1 = mysqli_query($conn,$sql1);
      			if(!$result1)
      			{
      				$f = 1;
      				break;
      			}
      		}
      	}

      	if($f == 0)
      	{
	        echo "<script>alert('Delivery successful')</script>";
	        $_SESSION['oid'] = $oid;
	        $_SESSION['ddate'] = $ddate;
	        $_SESSION['message'] = "Delivery Successful";
	        header("location: ds.php?alert=success");
    	}
    	else
    	{
    		$_SESSION['message'] = "Delivery Unsuccessful";
	        header("location: ds.php");
    	}
      }
      else
      {
       		$_SESSION['message'] = "Delivery Unsuccessful";
	        header("location: ds.php");
      }
    }
    else
    {
      echo "<script>alert('Order is not placed with bloodbank')</script>";
    }
  }


}

?>











<!DOCTYPE html>
<html>
<head>
  <title>Delivery Confirmation</title>
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
    /*z-index: -1 !importan t;*/
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
      <div class="panel-heading" style="font-family: Lato;"><b>Delivery Confirmation</b></div>
        <div class="panel-body log">
          <div class="dform">
          <form id="form1" role="form" enctype="multipart/form-data" action="" method="POST">
            <input type="hidden" name="ddate" value="<?php echo date('Y-m-d H:i:s'); ?>" />
            <div class="form-group has-feedback">
            <label for="HospitalName">Hospital Name:</label>
            <?php
              //include("includes/connection.php");

              $query = "SELECT * FROM orders where Delivery_status = 'Pending' and Delivered_by =  '".$_SESSION['Eid']."';";
              $result=mysqli_query($conn,$query);
              if($result)
              {
                echo "<select id= 'HospitalName' name='hname' class='form-control'>";
                while ($row =mysqli_fetch_assoc($result))
                {
                  $hid = $row['Hospital_id'];
                  $query = "SELECT * from hospitals where Hospital_id = $hid";
                  $result1=mysqli_query($conn,$query);
                  if($result1)
                  {
                    $row1 = mysqli_fetch_assoc($result1);
                    echo "<option value='" . $row1['Hospital_name'] ."'>" . $row1['Hospital_name'] ."</option>";
                  }
                }
                echo "</select>";
              }
              
              
            ?>
            <div class="alert alert-danger"></div>
            </div>


            <div class="form-group has-feedback">
            <label for="OrderId">Order ID:</label>
            <!-- <input type="text" class="form-control" id= "OrderId" name="orderid" placeholder="Order ID"> -->

             <?php
              //include("includes/connection.php");

              $query = "SELECT * FROM orders where Delivery_status = 'Pending' and Delivered_by =  '".$_SESSION['Eid']."';";
              $result=mysqli_query($conn,$query);
              if($result)
              {
                echo "<select id= 'OrderId' name='orderid' class='form-control'>";
                while ($row =mysqli_fetch_assoc($result))
                {
                  
                  echo "<option value='" . $row['Order_id'] ."'>" . $row['Order_id'] ."</option>";
                }
                echo "</select>";
              }
              
              
            ?>
            <div class="alert alert-danger"></div>
            </div>

            <div class="form-group has-feedback">
            <label for="Token">Token No:</label>
            <input type="text" class="form-control" id= "Token" name="token" placeholder="Token No">
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