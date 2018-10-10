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



<!-- <?php $link = $_SERVER['REQUEST_URI']; ?> -->


<?php
  if($_SESSION['post'] != 1)
  {
    // echo "Hii";

    // echo "<script>alert('Sign Up successful')</script>";
    // echo "<script>alert('$link')</script>";
    die("Not authorized to access this page! \n Please go back to previous page");
  }
?>



<?php

if(isset($_POST['sign']))
{
	$fname = $_POST['name'];
	$mob = $_POST['contact'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$position = $_POST['post'];
	$email = $_POST['email'];

	$query = "INSERT INTO person(Name,Contact,Address,Gender) values ('$fname','$mob','$address','$gender')";
	if(mysqli_query($conn,$query))
	{
		$flag = 1;
	}

	if($flag == 1)
	{

		$query = "SELECT P_id from person where Contact = '$mob'";
		$result = mysqli_query($conn,$query);
		if($result);
		{
		$row =mysqli_fetch_assoc($result);
		$pid = $row['P_id'];
		}

			$query = "INSERT INTO employees(P_id,Emp_email,Post_id) values ('$pid','$email','$position')";
			if(mysqli_query($conn,$query))
			{
				echo "<script>alert('Sign Up successful')</script>";
				$success=1;
				$_SESSION['success'] = $success;
        include 'Email/signup_mail.php';
			}
	}
}
?>
