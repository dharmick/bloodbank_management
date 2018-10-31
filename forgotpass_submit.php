<?php
if(isset($_POST['requestmail'])) {

  include 'connection.php';
  session_start();
  $email = $_POST['email'];
echo $email;
  // check for employee in DB
  $sql = "SELECT Emp_id, Emp_email from employees where Emp_email = '$email'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)==1) {
  	$row=mysqli_fetch_assoc($result);
  	$eid = $row['Emp_id'];
    // employee found
    $type = "employee";
    // $token = "1234";
    $token = bin2hex(openssl_random_pseudo_bytes(10));
    $time = time();
    $query = "INSERT INTO forgotpass (Emp_id, token, recorded_time) values ('$eid', '$token','$time')";
  	if(mysqli_query($conn,$query))
  	{
        // echo "<script>console.log('".$token."')</script>";
      include 'Email/forgot_mail.php';
      $_SESSION['message'] = "Email Sent";
      header("location: ./forgotpass.php");
      exit();
  	}
  } else {
    //  check for hospital in DB
    $sql = "SELECT * from hospitals where Hosp_email = '$email' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1) {
      $row=mysqli_fetch_assoc($result);
      $hid = $row['Hospital_id'];
       // hospital found
      $type = "hospital";
      $token = bin2hex(openssl_random_pseudo_bytes(10));
      $time = time();
      $query = "INSERT INTO forgotpass (Emp_id, token, recorded_time) values ('$hid','$token','$time')";
    	if(mysqli_query($conn,$query))
    	{
          // echo "<script>console.log('".$token."')</script>";
        include 'Email/forgot_mail.php';
        $_SESSION['message'] = "Email Sent";
        header("location: ./forgotpass.php");
        exit();
    	}
    } else {
      // no user found
      $_SESSION['message'] = "User not found";
      header("location: ./forgotpass.php");
      exit();
    }
  }
} else {
  echo "invalid request";
}
 ?>
