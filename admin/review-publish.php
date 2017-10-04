<?php
session_start();
require('config.php');
require('session.php');
require('function.php');
if($_GET['review_id'])
{
$id = $_GET['review_id'];
$sql_action = "UPDATE product_review SET review_status = 'Publish' WHERE review_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: userreview-list.php');
}
}
?>