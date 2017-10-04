<?php
session_start();
$session_id  = session_id();
require('function.php');
$product_id = $_GET['product_id'];
$sql_delete = "DELETE FROM cart WHERE product_id = '$product_id' AND session_id = '$session_id'";
$run_cart = mysqli_query($con,$sql_delete) or die(mysqli_error($con));

// Delete Fronm Order

$sql_orddelete = "DELETE FROM orders WHERE order_proid = '$product_id' AND session_id = '$session_id'";
$run_ordcart = mysqli_query($con,$sql_orddelete) or die(mysqli_error($con));

?>