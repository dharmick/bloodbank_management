<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<section class="donationform">
		<form action="">
			<h2>Donation Form</h2>
			<div class="form-group">
  			 Name:<input type="text" class="form-control" id="name" placeholder="Name">
  			</div>
 			 <div class="form-group">
    		Contact No.<input type="text" class="form-control" id="contact" placeholder="Contact">
    		</div>
    		 <div class="form-group">
    		Address:<textarea class="form-control" rows="3"></textarea>
    		</div>
    		<div class="radio">
  			<label>
    		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> Male
  			</label>
  			<label>
    		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Female
  			</label>
			</div>
			 <div class="form-group">
    		Age:<input type="text" class="form-control" id="age" placeholder="Age">
    		</div>
    		 <div class="form-group">
    		Email:<input type="email" class="form-control" id="email" placeholder="Email">
    		</div>
    		 <div class="form-group">
    		Weight:<input type="text" class="form-control" id="weight" placeholder="Weight">
    		</div>
    		<div>
    		Blood Group:<select class="form-control">
			  <option>A+</option>
			  <option>B+</option>
			  <option>AB+</option>
			  <option>A-</option>
			  <option>B-</option>
			   <option>AB-</option>
			  <option>O+</option>
			  <option>O-</option>
			</select>
			</div>

    		<button type="submit" class="btn btn-primary">Login</button>

		</form>
	</section>
</body>
</html>