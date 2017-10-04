<?php
session_start();
require('function.php');
$session_id  = session_id();
$product_id = $_GET['product_id'];
$product_Q = $_GET['itemno'];
 	 $cart = array(
	 'product_quantity' => $product_Q
	);
	$result = cartupdate($con,$session_id,$product_id,$cart);


?>