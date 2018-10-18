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


<?php

if(isset($_POST['submit'])) {
  $oldpass = $_POST['Oldpass'];
  $newpass = $_POST['Newpass'];
  $confirmpass = $_POST['Confirmpass'];

  if(isset($_SESSION['Eid']))
  {    
        // logged in as an employee
        $sql = "SELECT Password from employees where Emp_id = {$_SESSION['Eid']}";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==1){
          $row = mysqli_fetch_assoc($result);
          if(password_verify($oldpass,$row['Password'])) {
            
             $options = array("cost"=>4);
             $hashPassword = password_hash($newpass,PASSWORD_BCRYPT,$options);
    
            // old password is CORRECT
            $sql_update = "UPDATE employees SET Password = '$hashPassword', password_changed = 1 where Emp_id = {$_SESSION['Eid']}";
            $result = mysqli_query($conn, $sql_update);
            $error = mysqli_error($conn);
    
            if($result) {
              $_SESSION['passwordchanged'] = 1;
              $_SESSION['message'] = "Password updated succesfully";
              header("location: ./reset.php");
              exit();
            }
          } else {
            // old password is INCORRECT
            $_SESSION['message'] = "old password is incorrect";
            header("location: ./reset.php");
            exit();
          }
        }

  } 
  else {
        //  logged in as a hospital
        $sql = "SELECT Hosp_passwd from hospitals where Hospital_id = {$_SESSION['hid']}";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==1){
          $row = mysqli_fetch_assoc($result);
          if(password_verify($oldpass,$row['Hosp_passwd'])) {
             $options = array("cost"=>4);
             $hashPassword = password_hash($newpass,PASSWORD_BCRYPT,$options);
            // old password is CORRECT
            $sql_update = "UPDATE hospitals SET Hosp_passwd = '$hashPassword', passwd_change = 1 where Hospital_id = {$_SESSION['hid']}";
            if(mysqli_query($conn, $sql_update)) {
              $_SESSION['passwordchanged'] = 1;
              $_SESSION['message'] = "Password updated succesfully";
              header("location: ./reset.php");
              exit();
            }
          } else {
            // old password is INCORRECT
            $_SESSION['message'] = "old password is incorrect";
            header("location: ./reset.php");
            exit();
          }
        }
  }
} else {
  echo "invalid request";
}

?>
