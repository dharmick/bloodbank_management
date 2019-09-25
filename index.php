<!DOCTYPE html>
<html>
<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148751040-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-148751040-1');
  </script>

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
    .color
    {
      background-color: #ffffff;
      height:10px !important;
      margin: auto;
    }
    body
    {
      background-color: ;
      font-family:'Open-Sans', sans-serif;
      font-size: 14px;
      line-height: 22px;
    }
   
   /* #footer {
    background: #ad1457;
    height: 60px;
    font-family: 'Verdana', sans-serif;
    color: #FFFFFF;
    padding: 20px;
    }*/
    .valign
    {
    font-family: 'Verdana', sans-serif;
    display: flex;
	  height:100vh;
    align-items: center;
	  background: url('images/1111.png') no-repeat right;
    }
    .content p
    {
      margin-top: ;
      font-family: 'Verdana', serif;
      font-size: 15px;
    }
    .btn {
      background-color: #ad1457;
      color: white;
      padding: 10px 20px;
      border-radius: 20px;
      margin-top: 25px;
      font-family: 'Verdana', sans-serif;
      margin-right: 15px;
    }
    .btn:hover {
      background-color: #a01150;
      color: white;
      box-shadow: 0 0 10px 0 #d32e77;
      transform: scale(1.05);
    }
    h1 {
      text-shadow: 1px 1px 1px #e899bb;
    }
	.banner-img {
		width:100%;
		height: 100%;
		
	}
	.content {
		width: 100%;
		
	}
  </style>
</head>
<body>

	<?php include_once("navbar.php") ?>
  <!--content-->
  <div class="container valign">
    <div class="content">
		<div class="col-sm-6">
			<h1>Blood is meant to circulate.<br>Pass it around.</h1>
			<br><br><p>Their are number of countries who don't have adequate number<br>of blood suppliers and face the challenge of blood supply.We are<br>trying to make available adequate blood to needy patients all<br>over the world.</p>
			<a href="./faq.php#donate" class="btn">I want to Donate</a>
			<a href="./faq.php#request" class="btn">Request for Blood</a>
		</div>
		<!--<div class="col-sm-6">
			<img src="images/1111.png" class="banner-img">
		</div>-->
    </div>
  </div>
  <!--content ends-->
  <!--footer-->
    <?php include_once("footer.php") ?>

  <!--footer ends-->

  <script type="text/javascript">
  </script>
  

</body>
</html>

