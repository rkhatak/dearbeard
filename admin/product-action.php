<?php
session_start();
require('config.php');
require('session.php');
require('function.php');

if($_GET['publish_uid'])
{
$id = $_GET['publish_uid'];
$sql_action = "UPDATE product SET status = 'Publish' WHERE product_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: product-list.php');
}
}


if($_GET['delete_uid'])
{
$id = $_GET['delete_uid'];
$sql_action = "DELETE FROM product  WHERE product_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));

$sql_action = "DELETE FROM product_tag  WHERE pId = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));
if($run_action == true)
{
	header('Location: product-list.php');
}	
}




?>