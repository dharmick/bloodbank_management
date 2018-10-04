<?php

// Inialize session
session_start();

// Delete certain session
unset($_SESSION['Emp_email']);
// Delete all session variables
 session_destroy();

// Jump to login page
header('Location: index.php');

?>