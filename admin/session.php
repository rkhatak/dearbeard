<?php
require('config.php');

$user_check = $_SESSION['uname'];

$ses_sql= "SELECT *FROM admininfo WHERE username ='$user_check'";
$ses_run = mysqli_query($con,$ses_sql) or die(mysqli_error($con)) ;
$ses_user = mysqli_fetch_array($ses_run);
$login_session =$ses_user['username'];
if(!isset($login_session)){
mysqli_close($con); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>