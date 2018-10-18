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

$rem = "";
$s1 = "";
$s2 = "";
$flag = "";

if(isset($_POST['id']))
{
	
	$id = $_POST['id'];

	$query = "SELECT * FROM orders WHERE Order_id = $id";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) == 1)
	{
		$row =mysqli_fetch_assoc($result);
		if(isset($_GET['alert']))
		{
			if($_GET['alert'] == 'ok')
			{
				$units = $row['Units'];
				$bg = $row['Blood_group'];
				$rem = $units;	

				$sql = "SELECT * FROM inventory WHERE Blood_group = '$bg'";
				$result1 = mysqli_query($conn,$sql);
				//$n = mysqli_num_rows($result1);
				//echo "<script>alert('$n')</script>";
				if(mysqli_num_rows($result1)>0)
				{
					//echo "<script>alert('Sign Up successful')</script>";
					while(($row1 =mysqli_fetch_assoc($result1)) && ($rem > 0))
					{
						//echo "<script>alert('Sign Up successful')</script>";
						$rem = $rem - $row1['Units'];
						if($rem == 0)
						{
							$s1 = $s1.$row1['Inv_id'];
							$s2 = $s2.$row1['Units'];
							$flag = 1;
							//echo "<script>alert('$s1')</script>";
							//echo "<script>alert('$s2')</script>";
						}
						elseif($rem>0)
						{
							$s1 = $row1['Inv_id'].",";
							$s2 = $row1['Units'].",";
							//echo "<script>alert('$s1')</script>";
							//echo "<script>alert('$s2')</script>";
							//echo "<script>alert('$flag')</script>";

						}
						else
						{
							$s1 = $s1.$row1['Inv_id'];
							$s2 = $s2.($rem + $row1['Units']);
							$flag = 1;
							//echo "<script>alert('$s1')</script>";
							//echo "<script>alert('$s2')</script>";
						}
						//echo "<script>alert('$rem')</script>";
					}

					if($flag == 1)
					{
						//echo "<script>alert('Sign Up successful')</script>";
						$sql = "SELECT * FROM employees WHERE Post_id = 4 ORDER BY RAND() LIMIT 1";
						$result = mysqli_query($conn,$sql);
						if($result)
						{
							$row2 = mysqli_fetch_assoc($result);
							$empid = $row2['Emp_id'];
							$token = bin2hex(openssl_random_pseudo_bytes(6));
							//echo "<script>alert('$empid')</script>";
							$sql = "update orders set Blood_IDs = '$s1', 
											  Blood_Units = '$s2', 
											  status = 'Accepted', 
											  Token = '$token',
											  Delivered_by = '$empid' 
											  WHERE Order_id = $id";
							$result = mysqli_query($conn,$sql);
							if($result)
							{
								//echo "<script>alert('Sign Up successful')</script>";
								$_SESSION['message'] = "Order Accepted Successfully";
								header("location: view_order.php");
							}
						}
					}
					else
					{
						$sql = "update orders set status = 'Pending',
										  Delivery_status = 'Pending' 
										  WHERE Order_id = $id";
						$result = mysqli_query($conn,$sql);
						if($result)
						{
							$_SESSION['message'] = "Quantity of bloodgroup ".$bg." Not Availiable";
							header("location: view_order.php");
						}
					}	
				}
				else
				{
					
					$sql = "update orders set status = 'Pending',
										  Delivery_status = 'Pending' 
										  WHERE Order_id = $id";
					$result = mysqli_query($conn,$sql);
					if($result)
					{
						$_SESSION['message'] = "Blood with bloodgroup ".$bg." Not available";
						header("location: view_order.php");
					}
				}
			}
			elseif($_GET['alert'] == 'remove')
			{
				$sql = "update orders set status = 'Rejected',
									  Delivery_status = 'Rejected' 
									  WHERE Order_id = $id";
				$result = mysqli_query($conn,$sql);
				if($result)
				{
					$_SESSION['message'] = "Order Rejected!";
					header("location: view_order.php");
				}	
			}
		}
		

	}

}
?>