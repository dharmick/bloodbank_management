<?php
ob_start();
// session_start();
include_once("connection.php");
?>

<?php

if(!isset($_SESSION['Emp_email'])){
    //send them to login page
    echo "<script>alert('You are not logged in')</script>";
    header("location:index.php");
}

?>






<link href="https://fonts.googleapis.com/css?family=Lato:900" rel="stylesheet">

<style media="screen">
ul#navbar {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #fff;
  position: fixed;
  top:0;
  width: 100%;
  z-index: 1;
}

.custom-nav {
  margin-bottom: 20px;
  /*padding:2px 0;*/
  /* box-shadow: 0 2px 4px 0 rgba(0,0,0,.1); */
}

#navbar li {
  float: right;
  cursor: pointer;
}

#navbar li a {
  display: block;
  color: #ad1459;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
}

/* Change the link color to #111 (black) on hover */
#navbar li a:hover {
  background-color: #ad1457;
  text-decoration: none;
  color: #fff;
}

.glyphicon-menu-hamburger {
  font-size: 23px;
  cursor: pointer;
}

</style>

<div class="custom-nav">
  <ul id="navbar" class="reduce">
    <!-- Use any element to open the sidenav -->
    <li style="float: left"><a onclick="toggleNav()"><span class="glyphicon glyphicon-menu-hamburger"></span></a></li>
    <li style="float: left"><img src="./images/logo.png" alt="Blood Bank" height="57"></li>
    <!-- <li><a href="default.asp">Home</a></li>
    <li><a href="news.asp">News</a></li>
    <li><a href="contact.asp">Contact</a></li> -->
    <li><a href="logout.php" style="font-family: Lato; float: right;"><b>Logout</b></a></li>
  </ul>
</div>
