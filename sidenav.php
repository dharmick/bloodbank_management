<?php
ob_start();
// session_start();
include_once("connection.php");
?>

<?php

if(!isset($_SESSION['Emp_email'])){
    //send them to login page
    echo "<script>alert('You are not logged in')</script>";
    header("location:login.php");
}

?>





<link href="https://fonts.googleapis.com/css?family=Lato:900" rel="stylesheet">

<style media="screen">
/* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #fff; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
  box-shadow: 0 2px 4px 0 rgba(0,0,0,.1);
  white-space: nowrap ;
  font-family: Lato;
}

/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 12px;
  text-decoration: none;
  font-size: 18px;
  color: #777373;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #ad1457;
  background: #f4eff2;
  border-left: 4px solid #ad1457;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.open-sidenav {
  width: 250px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s;
  /*position: relative;*/
}

#main.shrink {
  margin-left: 250px;
}

#navbar {
  transition: width .5s;
}

#navbar.reduce {
  width:calc(100% - 250px);
}

.avatar-wrapper {
  height: 150px;
  background: #a8215c;
  position: relative;
  padding: 10px;
}

.avatar-wrapper h6 {
  font-size: 20px;
  color: #f7f7f7;
  font-weight: bold;
  margin-top: 20px;
}

.avatar {
  border: 2px solid #ddd;
  border-radius: 50%;
  display: inline-block;
  position: absolute;
  bottom: 20px;
  left: 10px;
  /* padding: 5px; */
}

.avatar img {
  border-radius: 50%;
}

.borderl{
  border-right: 4px solid #ad1457;
  height: 100%;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav a {font-size: 18px;}
}

.current {
  color: #ad1457;
  background: #f4eff2;
  border-left: 4px solid #ad1457;
}

</style>

<div id="mySidenav" class="sidenav open-sidenav">
  <div class="borderl">
    <div class="avatar-wrapper">
        <h6><?php echo $_SESSION['Ename']; ?></h6>
        <div class="avatar">
          <img src="./images/male.png" height="50" alt="avatar">
        </div>
      </div>
      <div class="">

      <?php
        switch ($_SESSION['post'])
        {
        case 1:
      ?>
      <a href="inventory_admin.php" class="tab">View Inventory</a>
      <a href="view_order.php" class="tab">View Orders</a>
      <a href="view_emp.php" class="tab">View Employee Details</a>
      <a href="view_hosp.php" class="tab">View Hospitals</a>
      <a href="signup.php" class="tab">Employee Signup Form</a>
      <a href="reset.php" class="tab">Reset Password</a>
      <a href="logout.php" class="tab">Logout</a>

      <?php
        break;
        case 2:
      ?>
      <a href="lt.php" class="tab">View Donors</a>
      <a href="reset.php" class="tab">Reset Password</a>
      <a href="logout.php" class="tab">Logout</a>

      <?php
        break;
        case 3:
      ?>
      <a href="rp.php" class="tab">View Donor Status</a>
      <a href="registrationform.php" class="tab">Donation Form</a>
      <a href="reset.php" class="tab">Reset Password</a>
      <a href="logout.php" class="tab">Logout</a>

      <?php
        break;
        case 4:
      ?>
      <a href="ds.php" class="tab">View Deliveries</a>
      <a href="Deliveryform.php" class="tab">Delivery Form</a>
      <a href="reset.php" class="tab">Reset Password</a>
      <a href="logout.php" class="tab">Logout</a>

      <?php
        break;
        case 5:
      ?>
      <a href="inventory_hosp.php" class="tab">View Inventory</a>
      <a href="order_hosp.php" class="tab">View orders</a>
      <a href="Requestblood.php" class="tab">Order form</a>
      <a href="reset.php" class="tab">Reset Password</a>
      <a href="logout.php" class="tab">Logout</a>

      <?php
        break;
        default:
          break;
        }
      ?>




    </div>
  </div>
</div>



<script>
function toggleNav() {
  $('#mySidenav').toggleClass('open-sidenav');
  $('#main').toggleClass('shrink');
  $('#navbar').toggleClass('reduce');
}
</script>
