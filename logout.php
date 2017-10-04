<?php
require('admin/config.php');
session_start();
$ses_id =  session_id();
$sql_delete = "DELETE FROM cart WHERE session_id = '$ses_id'";
$run_delete = mysqli_query($con,$sql_delete) or die(mysqli_error($con));
if(session_destroy()) 
{
header("Location: index.php"); // Redirecting To Home Page
}
?>

