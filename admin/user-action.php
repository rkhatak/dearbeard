<?php
session_start();
require('config.php');
require('session.php');
require('function.php');
if($_GET['active_uid'])
{
$id = $_GET['active_uid'];
$sql_action = "UPDATE users SET Userstatus = 'Active' WHERE UserID = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: users-list.php');
}
}
if($_GET['deactive_uid'])
{
$id = $_GET['deactive_uid'];
$sql_action = "UPDATE users SET Userstatus = 'Deactive' WHERE UserID = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));
if($run_action == true)
{
	header('Location: users-list.php');
}		
}

if($_GET['delete_uid'])
{
$id = $_GET['delete_uid'];
$sql_action = "DELETE FROM users  WHERE UserID = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: users-list.php');
}	
}

?>