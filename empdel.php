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
	$id = $_POST['id'];
	$query = "SELECT * FROM employees inner join person where Emp_id = $id and employees.P_id = person.P_id";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) == 1)
	{
		$row =mysqli_fetch_assoc($result);
		$pid = $row['P_id'];
		if(isset($_GET['alert']))
		{
			if($_GET['alert']=="delete")
			{
				// echo "<script>alert('Sign Up successful')</script>";
				$sql = "delete from employees WHERE Emp_id = $id";
				$result = mysqli_query($conn,$sql);
				//echo "<script>alert('$id')</script>";
				if($result)
				{
					$sql = "delete from person WHERE P_id = $pid";
					$result = mysqli_query($conn,$sql);
					if($result)
					{
						//echo "<script>alert('Sign Up successful')</script>";
						$_SESSION['message'] = "Employee Record Deleted";
						header("location: view_emp.php");
					}
				}
				else
				{
					$error = mysqli_error($conn);
					echo "<script>alert('$error')</script>";
				}
			}
		}
		else
		{
			$error = mysqli_error($conn);
			echo "<script>alert('$error')</script>";
		}
	}
}

?>