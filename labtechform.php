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
  if($_SESSION['post'] != 2)
  {
    // echo "<script>alert('Sign Up successful')</script>";
    die("Not authorized to access this page! Please go back to previous page");
  }
?> 

<?php

$status = "";
$flag = "";
date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['id']))
{
  $id = $_POST['id'];
  $query = "SELECT * from donor inner join person where donor.D_id = $id and donor.P_id = person.P_id ";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  $name = $row['Name'];
  $contact = $row['Contact'];
  $address = $row['Address'];
  $gender = $row['Gender'];
  $email = $row['Email'];
  $age = $row['Age'];
  $weight = $row['Weight'];
  $bg = $row['Blood_group'];
  $date = $row['Date'];
  $status = $row['Status'];
}
//echo "<script>alert('Registration successful')</script>";
$did = $_POST['id'];
//echo "<script>alert('Registration successful')</script>";
if(isset($_POST['submit']))
{
  
  $status = $_POST['status'];
  if($status == "Accepted")
  {
    $bg1 = $_POST['bg'];
    $rbc = $_POST['rbc'];
    $wbc = $_POST['wbc'];
    $hb = $_POST['hb'];
    $units = $_POST['units'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO inventory(D_id,Wbc,Rbc,Haemoglobin,Blood_group,Units,Comments) values ($did,'$wbc','$rbc','hb','$bg1','$units','$comment')";

    if(mysqli_query($conn,$sql))
    {
      //echo "<script>alert('Registration successful')</script>";
      $flag = 1;
    } 
    else
    {
      $_SESSION['message'] = "Error!";
    }

    if($flag == 1)
    {
      //echo "<script>alert('Registration successful')</script>";
      $sql = "SELECT * from donor where D_id = $did";
      if(mysqli_query($conn,$sql))
      {
        //echo "<script>alert('Registration successful')</script>";
        if($bg == $bg1)
        {
          $sql = "update donor set Status = '$status' 
                  WHERE D_id = $did";
        }
        else
        {
          $sql = "update donor set Status = '$status', Blood_group = '$bg1' 
                  WHERE D_id = $did";
        }

        if(mysqli_query($conn,$sql))
        {
          //echo "<script>alert('Registration successful')</script>";
          $_SESSION['message'] = "Blood Added into Inventory Successfully";
          $success = 1;
          header("location: lt.php");
        }
      }
    }
  }
  elseif ($status == "Rejected") 
  {
    $bg1 = $_POST['bg'];
    $sql = "SELECT * from donor where D_id = $did";
    if(mysqli_query($conn,$sql))
    {
      if($bg == $bg1)
      {
        $sql = "update donor set Status = '$status' 
                WHERE D_id = $did";
      }
      else
      {
        $sql = "update donor set Status = '$status', Blood_group = '$bg1' 
                WHERE D_id = $did";
      }

      if(mysqli_query($conn,$sql))
      {
        //echo "<script>alert('Registration successful')</script>";
        $_SESSION['message'] = "Blood Rejected After Testing";
        header("location: lt.php");
      }
    }
  }
  else
  {
    $_SESSION['message'] = "Please change status from Pending!";
  }
}

?>













<!DOCTYPE html>
<html>
<head>
  <title> Lab Technician Form </title>
   <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Lato:900" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="./css/main.css">

   <script src="js/main.js"></script>

  <link rel="shortcut icon" href="./images/favicon.png">
  <!-- <link rel="stylesheet" type="text/css" href="./css/main.css"> -->


  <style type="text/css">
  
    .panel-primary>.panel-heading {
      background-color: #ad1457;
      color: white;
      border-color: #ad1457;
    }
    .btn {
      background-color: #ad1457;
      color: white;
      width: 125px;
      border-radius: 10px;
      transition: .05s ease-in-out;
    }
   /* .btn:hover {
      background-color: #9e0045;
      color: white;
      transform: scale(1.05);
      box-shadow: 0 0 10px 0 #d32e77;
    }*/

    .dform button[type="submit"]:hover, .dform button[type="submit"]:active{
      background-color: #a01150;
      color: white;
      box-shadow: 0 0 10px 0 #d32e77;
      transform: scale(1.05);
      outline: 0 none !important;
    }
    .panel-primary {
      border-color: #ad1457;
    }

    .dform input[type="text"], .dform input[type="email"] {
      width: 95%;
    }

   .col-md-8 {
    /*z-index: -1 !important;*/
   }

   .dform input:focus{
      outline: 0 none !important;
      box-shadow: 0 0px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(173, 20, 87,0.6);
      border-color:  rgba(173, 20, 87,0.6);
    } 

     .dform textarea:focus{
      outline: 0 none !important;
      box-shadow: 0 0px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(173, 20, 87,0.6);
      border-color:  rgba(173, 20, 87,0.6);
    } 
     .dform select:focus{
      outline: 0 none !important;
      box-shadow: 0 0px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(173, 20, 87,0.6);
      border-color:  rgba(173, 20, 87,0.6);
    }
    .dform select option:hover{
      background-color: #ad1457 !important;
      color: white !important;
    }

    .log {
      box-shadow: 0 0 10px 0 rgba(0,0,0,0.3);
      font-family: Lato;
    }
  </style>
</head>

<body>
    <div class="alert-box"></div>
    <?php
    //echo "<script>alert('Else')</script>";
    if(isset($_SESSION['message']))
      {
        //echo "<script>alert('Else')</script>";
        echo "<script>showAlert('".$_SESSION['message']."')</script>";
        unset($_SESSION['message']);
      }
    ?>

<?php include('./sidenav.php')?>
<div id="main" class="shrink">
  <?php include('./horizontal-nav.php')?>  
 <div class="">   
 <div class= "col-md-8 col-md-offset-2" style="margin-top: 50px;">
    <div class="panel panel-primary">
      <div class="panel-heading" style="font-family: Lato;"><b>Lab Technician Form</b></div>
        <div class="panel-body log">
          <div class="dform">
          <form id="form1" role="" action="" method="POST">
            <input type = 'hidden' name ='id' value = '<?php echo $id; ?>'>
            <div class="form-group has-feedback">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" id= "Name" name="name" placeholder="Name" value = '<?php echo $name;?>'readonly>
            </div>
            <div class="form-group has-feedback">
            <label for="Contact">Contact No:</label>
            <input type="text" class="form-control" id= "Contact" placeholder="Contact No." name="contact" value = '<?php echo $contact; ?>'readonly>
            </div>
            <div class="form-group has-feedback">
            <label for="Address">Address:</label>
            <textarea style="width: 95%;" type="text" class="form-control" id= "Address" placeholder="Address" name="address" readonly><?php echo $address; ?></textarea>
            </div>
            <div class="form-group has-feedback">
            <label for="Gender">Gender:</label>
            &nbsp; <label>
                <input type="radio" name="gender" id="optionsRadios1" value="Male" <?php echo ($gender=='Male')?'checked':'' 
                ?> disabled> Male
            </label>
            &nbsp; <label>
                <input type="radio" name="gender" id="optionsRadios1" value="Female" <?php echo ($gender=='Female')?'checked':'' ?> disabled> Female
            </label>
            </div>
            <div class="form-group has-feedback">
            <label for="Age">Age:</label>
            <input type="text" class="form-control" id= "Age" placeholder="Age" name="age" value = '<?php echo $age;?>'readonly>
            </div>
            <div class="form-group has-feedback">
            <label for="Email">Email:</label>
            <input type="email" class="form-control" id= "Email" placeholder="Email" name="email" value = '<?php echo $email;?>'readonly>
            </div>
            <div class="form-group has-feedback">
            <label for="Weight">Weight:</label>
            <input type="text" class="form-control" id= "Weight" placeholder="Weight" name="weight" value = '<?php 
            echo $weight;?>'readonly>
            </div>
            <div class="form-group has-feedback">
            <label for="Blood Group">Blood Group:</label>
             <select class="form-control" name="bg" style="width: 95%;">
                <option <?php if($bg == "A+") echo "selected = 'selected'" ?> value="A+">A+</option>
                <option <?php if($bg == "B+") echo "selected = 'selected'" ?> value="B+">B+</option>
                <option <?php if($bg == "AB+") echo "selected = 'selected'" ?> value="AB+">AB+</option>
                <option <?php if($bg == "A-") echo "selected = 'selected'" ?> value="A-">A-</option>
                <option <?php if($bg == "B-") echo "selected = 'selected'" ?> value="B-">B-</option>
                <option <?php if($bg == "AB-") echo "selected = 'selected'" ?> value="AB-">AB-</option>
                <option <?php if($bg == "O+") echo "selected = 'selected'" ?> value="O+">O+</option>
                <option <?php if($bg == "O-") echo "selected = 'selected'" ?> value="O-">O-</option>
              </select>
            </div>

            <div class="form-group has-feedback">
            <label for="status">Status:</label>
             <select class="form-control" name="status" style="width: 95%;" id="b-status" required>
                <option value="Pending" selected="Pending" disabled>Pending</option>
                <option value="Accepted">Accepted</option>
                <option value="Rejected">Rejected</option>
              </select>
            </div>  
            
            <div class="form-group has-feedback">
            <label for="RBC">RBC:</label>
            <input type="text" class="form-control" id= "RBC" placeholder="RBC count" name="rbc">
            </div>

           
            <div class="form-group has-feedback">
            <label for="WBC">WBC:</label>
            <input type="text" class="form-control" id= "WBC" placeholder="WBC count" name="wbc">
            </div>

            <div class="form-group has-feedback">
            <label for="Haemoglobin">Haemoglobin:</label>
            <input type="text" class="form-control" id= "Haemoglobin" placeholder="Haemoglobin" name="hb">
            </div>

            <div class="form-group has-feedback">
            <label for="Blood-Units">Blood Units:</label>
            <input type="text" class="form-control" id= "Blood-Units" placeholder="Units in Liter" name="units">
            </div>

            <div class="form-group has-feedback">
            <label for="Comments">Comments:</label>
            <input type="text" class="form-control" id= "Comments" placeholder="Any comments about blood" name="comment">
            </div>

            <script>
           
            $('.b-status').each(function(){
            $('.b-status').on('change',myfunction);
           });
           
           
           
            function myfunction(){
            var x = this.value;
            console.log(x);
            if(x=='Accepted')
            {
        
              //document.getElementById("demo").innerHTML = "You selected:" +x;
              //$(this).parent().next()[0].style.display = "block";
              $(this).parent().next().next()[0].style.display = "block";
            }
            else
            {
              //$(this).parent().next()[0].style.display = "none";
              $(this).parent().next().next()[0].style.display = "none";
            }
            }
           </script>    

            <button type="submit" class="btn" style="margin-bottom: 15px;" name="submit">Submit</button>
          </form>
        </div>
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>