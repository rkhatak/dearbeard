<?php
session_start();
require('config.php');
require('session.php');
require('function.php');
if($_GET['active_id'])
{
$id = $_GET['active_id'];
$sql_action = "UPDATE menu SET status = 'Active' WHERE id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: menu-list.php');
}
}
if($_GET['deactive_id'])
{
$id = $_GET['deactive_id'];
$sql_action = "UPDATE menu SET status = 'Deactive' WHERE id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));
if($run_action == true)
{
	header('Location: menu-list.php');
}		
}

if($_GET['delete_id'])
{
$id = $_GET['delete_id'];
$sql_action = "DELETE FROM menu  WHERE id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: menu-list.php');
}	
}

//User Action 

if($_GET['active_uid'])
{
$id = $_GET['active_uid'];
$sql_action = "UPDATE admininfo SET status = 'Active' WHERE user_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: users-list.php');
}
}
if($_GET['deactive_uid'])
{
$id = $_GET['deactive_uid'];
$sql_action = "UPDATE admininfo SET status = 'Dective' WHERE user_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));
if($run_action == true)
{
	header('Location: users-list.php');
}		
}

if($_GET['delete_uid'])
{
$id = $_GET['delete_uid'];
$sql_action = "DELETE FROM admininfo  WHERE user_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: users-list.php');
}	
}

?>