<?php
$user_check=$_SESSION['UserEmail'];
$ses_sql= "SELECT UserEmail FROM users WHERE UserEmail='$user_check'";
$ses_run = mysqli_query($con,$ses_sql)or die(mysqli_error($con));
$row = mysqli_fetch_array($ses_run);
$login_session =$row['UserEmail'];
if(!isset($login_session)){
mysqli_close($con); // Closing Connection
header('Location: login.php'); // Redirecting To Home Page
echo "<script>window.location ='login.php';</script>";
}

?>