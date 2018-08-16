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

  <link rel="shortcut icon" href="./images/favicon.png">


  <style type="text/css"> 
    #footer {
    background: #ad1457;
    height: 60px;
    font-family: 'Verdana', sans-serif;
    color: #FFFFFF;
    padding: 20px;
    }
    .tab {
      height:80vh;
      margin:10vh;
      box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
      margin-top: 0px;
      padding: 15px;
      border-radius: 5px;
    }
    table{
      border-style: solid;
      border-radius: 15px;
      font-family: 'verdana', sans-serif;
    }
    table th{
      font-size: 15px;
       
    }
  </style>
</head>
<?php include_once("navbar.php") ?>
  <div class="container tab">
    <table class="table table-striped table-bordered table-hover">
      <tr>
        <th>Name <i class="glyphicon glyphicon-sort"></i></th>
        <th>Contact <i class="glyphicon glyphicon-sort"></i></th>
        <th>Gender <i class="glyphicon glyphicon-sort"></i></th>
        <th>Email Id <i class="glyphicon glyphicon-sort"></i></th>
        <th>Age <i class="glyphicon glyphicon-sort"></i></th>
        <th>Weight <i class="glyphicon glyphicon-sort"></i></th>
        <th>Blood Group <i class="glyphicon glyphicon-sort"></i></th>
        <th>Date <i class="glyphicon glyphicon-sort"></i></th>
        <th>Status <i class="glyphicon glyphicon-sort"></i></th>
      </tr>
       <tr>
        <td>Parth</td>
        <td>7977263730</td>
        <td>Male</td>
        <td>parth.js@somaiya.edu</td>
        <td>20</td>
        <td>65</td>
        <td>O+</td>
        <td>15/08/2018</td>
        <td>Accepted</td>
      </tr>
      <tr>
        <td>Parth</td>
        <td>7977263730</td>
        <td>Male</td>
        <td>parth.js@somaiya.edu</td>
        <td>20</td>
        <td>65</td>
        <td>O+</td>
        <td>15/08/2018</td>
        <td>Accepted</td>
      </tr>
      <tr>
        <td>Parth</td>
        <td>7977263730</td>
        <td>Male</td>
        <td>parth.js@somaiya.edu</td>
        <td>20</td>
        <td>65</td>
        <td>O+</td>
        <td>15/08/2018</td>
        <td>Accepted</td>
      </tr>
      <tr>
        <td>Parth</td>
        <td>7977263730</td>
        <td>Male</td>
        <td>parth.js@somaiya.edu</td>
        <td>20</td>
        <td>65</td>
        <td>O+</td>
        <td>15/08/2018</td>
        <td>Accepted</td>
      </tr>
      <tr>
        <td>Parth</td>
        <td>7977263730</td>
        <td>Male</td>
        <td>parth.js@somaiya.edu</td>
        <td>20</td>
        <td>65</td>
        <td>O+</td>
        <td>15/08/2018</td>
        <td>Accepted</td>
      </tr>
    </table>
  </div>

  <!--footer-->
  <footer id="footer">
    <span class="pull-right"><strong>Version</strong> 1.0.0</span>
    <p><b>Copyright&nbsp;</b>&copy; DharVirPa | Design and Development. All Rights Reserved.</p>
  </footer>
  <!--footer ends-->
  <script type="text/javascript">
    function myfunction1()
    {
      document.getElementById("home").classList.add("current");
      document.getElementById("aboutus").classList.remove("current");
      document.getElementById("faq").classList.remove("current");
      document.getElementById("contact").classList.remove("current");
      document.getElementById("login").classList.remove("current");
    }
    function myfunction2()
    {
      document.getElementById("aboutus").classList.add("current");
      document.getElementById("home").classList.remove("current");
      document.getElementById("faq").classList.remove("current");
      document.getElementById("contact").classList.remove("current");
      document.getElementById("login").classList.remove("current");
    }
    function myfunction3()
    {
      document.getElementById("faq").classList.add("current");
      document.getElementById("home").classList.remove("current");
      document.getElementById("aboutus").classList.remove("current");
      document.getElementById("contact").classList.remove("current");
      document.getElementById("login").classList.remove("current");
    }
    function myfunction4()
    {
      document.getElementById("contact").classList.add("current");
      document.getElementById("home").classList.remove("current");
      document.getElementById("aboutus").classList.remove("current");
      document.getElementById("faq").classList.remove("current");
      document.getElementById("login").classList.remove("current");
    }
     function myfunction5()
    {
      document.getElementById("login").classList.add("current");
      document.getElementById("home").classList.remove("current");
      document.getElementById("aboutus").classList.remove("current");
      document.getElementById("faq").classList.remove("current");
      document.getElementById("contact").classList.remove("current");
    }
  </script>