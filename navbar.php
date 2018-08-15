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
  </style>
  <div id="nav-main">
    <img src="./images/logo.png" alt="Blood Bank" height="75" style="margin-left: 5px;">
    <ul>
      <li class="current" onclick="myfunction1()" id="home"><a href="index.php">HOME</a></li>
      <li onclick="myfunction2()" id="aboutus" class=""><a href="#">ABOUT US</a></li>
      <li onclick="myfunction3()" id="faq" class=""><a href="faq.php">FAQs</a></li>
      <li onclick="myfunction4()" id="contact" class=""><a href="contactus.php">CONTACT US</a></li>
      <li onclick="myfunction5()" id="login" class=""><a href="#">LOGIN</a></li>
    </ul>
  </div>
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