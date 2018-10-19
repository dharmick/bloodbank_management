<!DOCTYPE html>
<html>
<head>
	<title> Blood Bank </title>

	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="./css/navbar_style.css">
  <link rel="stylesheet" type="text/css" href="./css/main.css">

	<link rel="shortcut icon" href="./images/favicon.png">

	<style type="text/css">
	body
    {
      font-family:'Open-Sans', sans-serif;
      font-size: 14px;
      line-height: 22px;
    }
   #nav-main {
    background-color: white; 
    width: 100%;
    display: block;
    position: fixed;
    top:0;
    margin: 0px auto;
    padding-top: 10px;
    padding-bottom: 10px;
  }
   	#bradcrumb
	{
 		font-family: 'Verdana', sans-serif;
 		margin-top: 100px;
 		height :45px; 
 		border-top: 1px solid #ccccc0;
 		border-bottom: 1px solid #ccccc0;
	}
	#bradcrumb ol li a:hover {
    color: #ad1457 !important ;
    text-decoration: none;
    }
    .container
    {
      margin-top: 20px;
      margin-bottom: 10px;
      color: #333330; 
      font-family: 'Verdana', sans-serif;
    }
    .breadcrumb {
    background-color: transparent;
  	}
	</style>

	<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
</head>
<body>
  <div id="nav-main">
    <a href="index.php"><img src="./images/logo.png" alt="Blood Bank" height="65" style="margin-left: 5px;"></a>
    <ul>
      <li  class = "tab" ><a href="index.php">HOME</a></li>
      <li  class = "tab current "><a href="#">ABOUT US</a></li>
      <li  class = "tab"><a href="faq.php">FAQs</a></li>
      <li  class = "tab"><a href="contactus.php">CONTACT US</a></li>
      <li  class = "tab"><a href="hospitalsignup.php">HOSPITAL SIGNUP</a></li>
      <li  class = "tab"><a href="login.php">LOGIN</a></li>
    </ul>
  </div>
	<!-- <?php include_once ("navbar.php");?> -->

	<!--breadcrumb-->
  <div class="container" id="bradcrumb">
	  <ol class="breadcrumb">
	    <li><a href="index.php" id="home" style="color: black;">Home</a></li>
	    <li class="active">ABOUT US</li>
	  </ol>
  </div>
  <!--breadcrumb ends-->
    <div class="container">
    <div class="row">
  <section class="container col-md-4">
  	<h3><strong>ABOUT US</strong></h3>
<!--   	<br><h4><b>Address</b></h4>
 -->  	<p>"Hope Drops" is an organization that brings voluntary blood donors and those in need of blood on to a common platform.  Through this website, we seek donors who are willing to donate blood, as well as provide the timeliest support to those in frantic need of it.
  	</p>
  	<br>
<!--   	<h4><b>Contact No.</b></h4>
 --> 	<p>Started in the year 2018, with the zeal to serve our society, to inspire and spread the word, we dream to fulfill 100% blood need in India.</p>

 	<br>
 	<!-- <h4><b>Email Id</b></h4> -->
<!--  	<p>hopedropsbloodbank@gmail.com</p>
 -->
 	<!-- <br>
 	<h4><b>License Number</b></h4>
 	<p>MH004755</p> -->
  <h4><b>Our Mission</b></h4>
  <p>To fulfill every blood request in the country with a promising web portal and motivated individuals who are willing to donate blood.</p>

    <h4><b>BE A HERO-DONATE</b></h4>




  </section>
    <section class="col-md-8" style="
    padding: 35px 15px 15px 15px;">
         	
    </section>
    </div>
        </div>
 <?php include_once("footer.php") ?>

   <script type="text/javascript">
    var header = document.getElementById("nav-main");
    var btns = header.getElementsByClassName("tab");
    console.log(btns);
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("current");
    current[0].className = current[0].className.replace("current", "");
    this.className += " current";
    });
  }

  
  </script>
</body>
</html>