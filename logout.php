<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Physical Fitness Aid">
  <meta name="keywords" content="11th Company, Fitness, PMO, PRT, Running">
  <meta name="author" content="MIDN 1/C Kephart">
  <title>Logout</title>
  <link rel="stylesheet" href="styles.css">
</head>
<nav class='navbar'>
  <ul class='nav-list'>
    <li><a href='index.html' class='nav-link'>Home</a></li>
    <li><a href='schedule.html' class='nav-link'>Schedule</a></li>
    <li><a href='requestReport.php' class='nav-link'>Get Report</a></li>
    <li><a href='registration.html' class='nav-link'>Register</a></li>
    <li><a href='login.html' class='nav-link'>Login</a></li>
    <li><a href='logout.php' class='nav-link'>Logout</a></li>
  </ul>
</nav>

<?php
session_start();

//check to see if user is logged in
if (isset($_SESSION['username'])) {
    //unset all session variables
    session_unset();
    
    echo "<p>You have been logged out successfully.</p>";
    echo "<p><a href='login.html'>Click here to login again</a></p>";
    echo "<p><a href='index.html'>Click here to return to the main page</a></p>";
   
} else {
    //user not logged in, show error and link to login
    echo "<p>Error: You are not logged in.</p>";
    echo "<p><a href='login.html'>Click here to login</a></p>";
    echo "<p><a href='index.html'>Click here to return to the main page</a></p>";

}
?>
