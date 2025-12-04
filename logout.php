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

<?php include 'navbar.php'; ?>


<?php
session_start();

//check to see if user is logged in
if (isset($_SESSION['username'])) {
    //unset all session variables
    session_unset();
    
    echo "<p>You have been logged out successfully.</p>";
    echo "<p><a href='login.html'>Click here to login again</a></p>";
    echo "<p><a href='index.php'>Click here to return to the main page</a></p>";
   
} else {
    //user not logged in, show error and link to login
    echo "<p>Error: You are not logged in.</p>";
    echo "<p><a href='login.html'>Click here to login</a></p>";
    echo "<p><a href='index.php'>Click here to return to the main page</a></p>";

}
?>
