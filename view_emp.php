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

if($_SESSION['passwordchanged']==0){
  $_SESSION['message'] = "Reset your password to proceed";
  header("location: ./reset.php");
  exit();
}

$query = "SELECT * FROM employees inner join person where employees.P_id = person.P_id and Post_id != 1";
$result = mysqli_query($conn,$query);

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
    <?php
        // echo $successMessage;
    ?>
    <div class="box">
      <div class="table-responsive">
      	<div class="scroll">
          <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
	          <thead>
	            <tr>
                <th>Emp. ID</th>
	              <th>Name</th>
	              <th>Contact</th>
	              <th>Gender</th>
	              <th>Address</th>
	              <th>Email Id</th>
	              <th>Post</th>
                <th width="40px;">Delete</th>
	             </tr>
	          </thead>

	          <?php

	          if(mysqli_num_rows($result)>0)
	          {
	            //we have data to display
	            while($row =mysqli_fetch_assoc($result))
	            {

	              echo "<tr>";
                echo "<td>".$row['Emp_id']."</td>";
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
                echo "<td>
                   <form action='empdel.php?alert=delete' method='POST'>
                     <input type = 'hidden' name = 'id' value = '".$row['Emp_id']."'> 
                     <button type = 'submit' class = 'btn btn-primary btn-sm'>
                            <span class='glyphicon glyphicon-trash'></span>
                        </button>
                    </form>      
                </td>";
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
    </div>
		<!--footer-->
	 <?php include_once("footer.php") ?>
	  <!--footer ends-->
  </div>



   <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
    } );
  </script>
  
</body>
</html>
