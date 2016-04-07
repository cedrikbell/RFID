<?php

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect('localhost','developer','cisco123','RFID_Database');
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection,"select userName from users where userName='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['userName'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>

<!-- Agarwal, Nareej. "PHP Login Form with Sessions." PHP  Login Form with Sessions. Formget, n.d. Web. 26 Feb. 2016. <http://www.formget.com/login-form-in-php/> -->
