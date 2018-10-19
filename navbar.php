    <head>
        <link rel="stylesheet" type="text/css" href="./css/navbar_style.css">
    <style type="text/css">
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
    </style>
    </head>
    <body>
  <div id="nav-main">
    <a href="index.php"><img src="./images/logo.png" alt="Blood Bank" height="65" style="margin-left: 5px;"></a>
    <ul>
      <li  class = "tab current" ><a href="index.php">HOME</a></li>
      <li  class = "tab"><a href="aboutus.php">ABOUT US</a></li>
      <li  class = "tab"><a href="faq.php">FAQs</a></li>
      <li  class = "tab"><a href="contactus.php">CONTACT US</a></li>
      <li  class = "tab"><a href="hospitalsignup.php">HOSPITAL SIGNUP</a></li>
      <li  class = "tab"><a href="login.php">LOGIN</a></li>
    </ul>
  </div>
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