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



<!-- <?php $link = $_SERVER['REQUEST_URI']; ?> -->


<?php
  if($_SESSION['post'] != 1)
  {
    
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
	$pass =  bin2hex(openssl_random_pseudo_bytes(4));

	$options = array("cost"=>4);
	$hashPassword = password_hash($pass,PASSWORD_BCRYPT,$options);

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

			$query = "INSERT INTO employees(P_id,Emp_email,Post_id, Password) values ('$pid','$email','$position',
			'$hashPassword')";
			if(mysqli_query($conn,$query))
			{
				echo "<script>alert('Sign Up successful')</script>";
				$success=1;
				$_SESSION['success'] = $success;
        		include 'Email/signup_mail.php';
        	 	header("location: view_emp.php");
			}
      else {
        $_SESSION['message'] = "Something went wrong. please try again";
        header("location: view_emp.php");
      }
	}
}
?>
