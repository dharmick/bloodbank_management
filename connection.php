<?php
$server="db4free.net";
$username="hopedrops";
$password="hopedrops";
$db="hopedrops";
$conn = mysqli_connect($server,$username,$password,$db);
if(!$conn){
    die("Connection failed".mysqli_connect_error());
}
?>