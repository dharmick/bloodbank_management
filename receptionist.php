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
  	 #nav-main {
    background-color: transparent; 
    width: 100%;
    display: block;
    margin: 0px auto;
    padding-top: 10px;
    padding-bottom: 10px;
    }
    #nav-main ul li a {
    padding: 5px 10px 6px 10px;
    display: inline;
    line-height: 46px;
    margin: 0px auto;
    } 
    #nav-main a {
    font-family: 'Open Sans', sans-serif;
    font-size: 14px;
    text-decoration: none;
    font-weight: 700;
    text-align: center;
    color: #333333;
    }
    #nav-main ul {
    width: 560px;
    float: right;
    display: block;
    overflow: hidden;
    text-align: center;
    margin: 0 auto;
    margin-left: 0px;
    padding: 0;
    }
    #nav-main:after
    {
      content: '';
      display: block;
      clear:both;
    }
    #nav-main ul li {
    list-style: none;
    display: inline;
    position: relative;
    padding: 0 1px;
    }
    #nav-main ul li a:hover {
    color:white;
    background-color: #ad1457;
    border-radius: 3px;
    box-shadow: inset 0 0px 3px #608a0f;
    }
    ul li.current > a {
    color: white !important;
    background: #ad1457;
    border-radius: 3px;
    box-shadow: inset 0 0px 3px #608a0f;
    }
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
      box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
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
  <div id="nav-main">
    <img src="./images/logo.png" alt="Blood Bank" height="75" style="margin-left: 5px;">
    <ul>
      <li class="current" onclick="myfunction2()" id="dashboard" class=""><a href="#">View Donor Status</a></li>
      <li onclick="myfunction1()" id="donate"><a href="#">Donation form</a></li>
      <li onclick="myfunction3()" id="logout" class=""><a href="#">LOGOUT</a></li>
    </ul>
  </div>

  <div class="container tab">
    <table class="table table-striped table-bordered table-hover">
      <tr>
        <th>Name <i class="glyphicon glyphicon-sort"></i></th>
        <th>Contact</th>
        <th>Gender</th>
        <th>Email Id</th>
        <th>Age</th>
        <th>Weight</th>
        <th>Blood Group</th>
        <th>Date</th>
        <th>Status</th>
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