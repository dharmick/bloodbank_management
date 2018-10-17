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

$successMessage="";
if(isset($_GET['alert']))
{
    if($_GET['alert']=="success")
    {
      //echo "<script>alert('".$_SESSION['oid']."')</script>";
        // $successMessage='<div class="alert alert-success">
        //     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        //     </button>
        // <strong>Order Delivered Successfully</strong>
        // </div>';

        $query1 = "SELECT * from orders where Order_id = '".$_SESSION['oid']."' ;"; 
        $result2 = mysqli_query($conn,$query1);
        if(mysqli_num_rows($result2)==1)
        {
            //echo "<script>alert('".$_SESSION['oid']."')</script>";
            $ddate = $_SESSION['ddate'];
            $sql = "UPDATE orders set Delivery_status='Delivered', Delivery_date = '$ddate' where Order_id = '".$_SESSION['oid']."' ;";
            $result2 = mysqli_query($conn,$sql);
        }
    }
}

$query = "SELECT * FROM orders where Delivered_by =  '".$_SESSION['Eid']."' ;";
$result = mysqli_query($conn,$query);
$_SESSION['rows'] = mysqli_num_rows($result);
?>






<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

       <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/navbar_style.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <script type="text/javascript" src="./js/main.js"></script>

    <link rel="shortcut icon" href="./images/favicon.png">

  <style type="text/css">
     .box {
      box-shadow: 0 0 10px 0 rgba(0,0,0,0.3);
      margin-top: 0px;
      padding: 15px;
      border-radius: 5px;
      margin: 20px;
      margin-top: 62px;
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

     .alert-success {
    color: #ad1457;
    background-color: #e8dae1;
    border-color: #e8dae1;
    margin: 60px 15px 0px 15px;
    }


    table.dataTable {
    border-color: #ad1457 !important;
  }
  
  .table-bordered {
    border: 2px solid #ad1457 !important;
  }
  
  .table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th{
    background-color: #ad1457;
    color: white;
  }
  .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
    background-color: #ad1457;
    border-color: #ad1457;
  }
  </style>
</head>
<body>
 <div class="alert-box"></div> 
  <?php include('./sidenav.php');
  if(isset($_SESSION['message']))
  {
    echo "<script>showAlert('".$_SESSION['message']."')</script>";
    unset($_SESSION['message']);
  }
  ?>
  <div id="main" class="shrink">
    <?php include('./horizontal-nav.php')?>
    <div class="box">
      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
          <thead>
          <tr>
            <th>OrderID</th>
            <th>Hospital Name</th>
            <th>Hospital Contact</th>
            <th>Hospital Address</th>
            <th>Blood Group</th>
            <th>Units</th>
            <th>Delivery Status</th>
          </tr>
          </thead>
        
        <?php 

          if(mysqli_num_rows($result)>0)
          {
          	$_SESSION['delstat'] = 0;
            //we have data to display 
            while($row = mysqli_fetch_assoc($result))
            {
              
              $hid = $row['Hospital_id'];

              $sql = "SELECT * from hospitals where Hospital_id = '$hid'";
              $result1 = mysqli_query($conn,$sql);
              
              if(mysqli_num_rows($result1) == 1)
              {
                $row1 = mysqli_fetch_assoc($result1);
                echo "<tr>";
                echo "<td>".$row['Order_id']."</td>";
                echo "<td>".$row1['Hospital_name']."</td>";
                echo "<td>".$row1['Contact']."</td>";
                echo "<td>".$row1['address']."</td>";
                echo "<td>".$row['Blood_group']."</td>";
                echo "<td>".$row['Units']."</td>";
                echo "<td>".$row['Delivery_status']."</td>";
                if($row['Delivery_status'] != "Delivered")
                {
                  $_SESSION['delstat'] = 1;
                }
                echo"</tr>";
              }
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
  <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
    } );
  </script>
</body>