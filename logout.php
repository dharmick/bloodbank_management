
<?php

// if(!isset($_SESSION['Emp_email'])){
//     //send them to login page
//     echo "<script>alert('You are not logged in')</script>";
//     header("location:login.php");
// }
// else
// {
	// Inialize session
	session_start();

	// Delete certain session
	unset($_SESSION['Emp_email']);
	// Delete all session variables
	 session_destroy();

	// Jump to login page
	header('Location: index.php');
// }

?>

<?php

?>