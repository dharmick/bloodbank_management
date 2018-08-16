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

	<link rel="shortcut icon" href="./images/favicon.png">

	<style type="text/css">
	body
    {
      font-family:'Open-Sans', sans-serif;
      font-size: 14px;
      line-height: 22px;
    }
     #nav-main {
        background-color: transparent; 
        width: 100%;
        display: block;
        margin: 0px auto;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    #footer {
    background: #ad1457;
    height: 60px;
    font-family: 'Verdana', sans-serif;
    color: #FFFFFF;
    padding: 20px;
	}
	#bradcrumb
	{
 		font-family: 'Verdana', sans-serif;
 		margin-top: 5px;
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
</head>
<body>
  <div id="nav-main">
    <img src="./images/logo.png" alt="Blood Bank" height="75" style="margin-left: 5px;">
    <ul>
      <li  class = "tab" ><a href="index.php">HOME</a></li>
      <li  class = "tab"><a href="#">ABOUT US</a></li>
      <li  class = "tab"><a href="faq.php">FAQs</a></li>
      <li  class = "tab current"><a href="contactus.php">CONTACT US</a></li>
      <li  class = "tab"><a href="login.php">LOGIN</a></li>
    </ul>
  </div>
	<!-- <?php include_once ("navbar.php");?> -->

	<!--breadcrumb-->
  <div class="container" id="bradcrumb">
	  <ol class="breadcrumb">
	    <li><a href="index.php" id="home" style="color: black;">Home</a></li>
	    <li class="active">CONTACT Us</li>
	  </ol>
  </div>
  <!--breadcrumb ends-->

  <section class="container">
  	<h3><strong>CONTACT Us</strong></h3>
  	<br><h4><b>Address</b></h4>
  	<p>Somaiya Blood Bank,<br>3rd Floor, Somaiya Satsang Bhavan,<br>Western Express Highway,
  		<br>Dr. R P Road, Andheri(East),<br>Mumbai-400069(INDIA)
  	</p>
  	<br>
  	<h4><b>Contact No.</b></h4>
 	<p>022-22881155 | 09988776655.</p>

 	<br>
 	<h4><b>Email Id</b></h4>
 	<p>somaiya-bloodbank@somaiya.edu</p>

 	<br>
 	<h4><b>License Number</b></h4>
 	<p>MH004755</p>
  </section>


  <footer id="footer" style="margin-top: 5px;">
    <span class="pull-right"><strong>Version</strong> 1.0.0</span>
    <p><b>Copyright&nbsp;</b>&copy; DharVirPa | Design and Development. All Rights Reserved.</p>
  </footer>

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