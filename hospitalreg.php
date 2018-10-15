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

if(isset($_POST['id']))
{
	//echo "<script>alert('Sign Up successful')</script>";
	$id = $_POST['id'];
	$query = "SELECT * FROM hospitals where Hospital_id = $id";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) == 1)
	{
		//echo "<script>alert('Sign Up successful')</script>";
		if(isset($_GET['alert']))
		{
			//echo "<script>alert('Sign Up successful')</script>";
			if($_GET['alert']=="ok")
			{
				$sql = "update hospitals set Status = 'Registered' WHERE Hospital_id = $id";
				$result = mysqli_query($conn,$sql);
				if($result)
				{
					$_SESSION['message'] = "Hospital Successfully Registered";
					header("location: view_hosp.php");
				}
			}
			elseif($_GET['alert']=="remove")
			{
				$sql = "update hospitals set Status = 'Rejected' WHERE Hospital_id = $id";
				$result = mysqli_query($conn,$sql);
				if($result)
				{
					$_SESSION['message'] = "Hospital Registration cancelled";
					header("location: view_hosp.php");
				}
			}
			// else
			// {
			// 	echo "<script>alert('Sign Up successful')</script>";
			// 	$sql = "delete from hospitals WHERE Hospital_id = $id";
			// 	// $result = mysqli_query($conn,$sql);
			// 	echo "<script>alert('$id')</script>";
			// 	if($conn->query($sql) === TRUE)
			// 	{
			// 		echo "<script>alert('Sign Up successful')</script>";
			// 		$_SESSION['message'] = "Hospital Record Deleted";
			// 		header("location: view_hosp.php");
			// 	}
			// 	else
			// 	{
			// 		$error = mysqli_error($conn);
			// 		echo "<script>alert('$error')</script>";
			// 	}
			// }
		}
		else
		{
			$error = mysqli_error($conn);
			echo "<script>alert('$error')</script>";
		}
	}
}

?>