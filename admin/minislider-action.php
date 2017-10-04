<?php
session_start();
require('config.php');
require('session.php');
require('function.php');

if($_GET['aproved_id'])
{
$id = $_GET['aproved_id'];
$sql_action = "UPDATE minislider SET minislider_status = 'Aproved' WHERE minislider_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: mini-slider.php');
}
}

if($_GET['unaproved_id'])
{
$id = $_GET['unaproved_id'];
$sql_action = "UPDATE minislider SET minislider_status = 'Unaproved' WHERE minislider_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: mini-slider.php');
}
}


if($_GET['delete_id'])
{
$id = $_GET['delete_id'];
$sql_action = "DELETE FROM minislider  WHERE minislider_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: mini-slider.php');
}	
}
?>