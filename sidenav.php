<style media="screen">
/* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #fff; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
  box-shadow: 0 2px 4px 0 rgba(0,0,0,.1);
  white-space: nowrap ;
}

/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 12px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #ad1457;
  background: #fafafa;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.open-sidenav {
  width: 250px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s;
}

#main.shrink {
  margin-left: 250px;
}

.avatar-wrapper {
  height: 150px;
  background: #555;
  position: relative;
  padding: 10px;
}

.avatar-wrapper h6 {
  font-size: 20px;
  color: #eee;
  font-weight: bold;
  margin-top: 20px;
}

.avatar {
  border: 2px solid #ddd;
  border-radius: 50%;
  display: inline-block;
  position: absolute;
  bottom: 20px;
  left: 10px;
  /* padding: 5px; */
}

.avatar img {
  border-radius: 50%;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav a {font-size: 18px;}
}
</style>


<div id="mySidenav" class="sidenav">
  <div class="avatar-wrapper">
    <h6>Dharmik Joshi</h6>
    <div class="avatar">
      <img src="./images/boy.png" height="50" alt="avatar">
    </div>
  </div>
  <a href="#">View Donor Status</a>
  <a href="#">Donation Form</a>
  <a href="#">Logout</a>
</div>



<script>
function toggleNav() {
  $('#mySidenav').toggleClass('open-sidenav');
  $('#main').toggleClass('shrink');
}
</script>
