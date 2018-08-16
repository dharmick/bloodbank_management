<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	 <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Lato:900" rel="stylesheet">
	<style>
		body {
			background: #f5f5f5;
		}
		.login {
			height:80vh;
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
			margin: 10vh;
			background: white;
			border-radius: 5px;
			position: relative;
			overflow: hidden;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.login:before {
			content: "";
			z-index: 1;
			width: 700px;
			height:700px;
			border-radius: 50%;
            background-image: linear-gradient(#c63374,#ad1457);
			position: absolute;
			bottom:-300px;
			left: -300px;
		}
		.login:after {
			content: "";
			width: 300px;
			height:400px;
			border-radius: 50px;
			background-image: linear-gradient(#c63374,#ad1457);
			position: absolute;
			top:-100px;
			right: -100px;
			transform: rotateZ(-30deg);
		}
		.login form {
			width: 300px;
		}
		.login input {
			padding: 20px;
		}
		.login button[type="submit"] {
			background-color: #ad1457;
			color: white;
			width: 100%;
			border-radius: 20px;
			padding: 10px;
			margin-top: 15px;
			font-weight: bold;
			font-size: 15px;
		}
		.login button[type="submit"]:hover {
			background-color: #a01150;
			color: white;
      		box-shadow: 0 0 10px 0 #d32e77;
		}
		.login h2 {
			font-size: 45px;
			margin-bottom: 30px;
			font-weight: bold;
			color: #797d7f;
			text-transform: uppercase;
			font-family: Lato;
		}
		.login input:focus {
			outline: 0 none !important;
			box-shadow: 0 0px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(173, 20, 87,0.6);
			border-color:  rgba(173, 20, 87,0.6);
		} 
	</style>
</head>
<body>
	<section class="login">
		<form action="">
			<h2>Login</h2>
			<div class="form-group">
  			 <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  			</div>
 			 <div class="form-group">
    		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    		</div>
    		<button type="submit" class="btn">Login</button>
		</form>
	</section>
</body>
</html>