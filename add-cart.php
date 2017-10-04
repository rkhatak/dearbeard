<?php
session_start();
$sessionid =  session_id();
require('function.php');
$product_id = $_GET['data'];
$product_Q = $_GET['itemno'];
$sql_addcart = "SELECT *FROM cart WHERE product_id = '$product_id' AND session_id = '$sessionid' ";
$run_addcart = mysqli_query($con,$sql_addcart) or die(mysqli_error($con));
$count_row = mysqli_num_rows($run_addcart);
if($count_row==0 || $count_row<1 )
{
$sql_cart = "SELECT *FROM product WHERE product_id = '$product_id'";
$run_cart = mysqli_query($con,$sql_cart) or die(mysqli_error($con));
$data_cart = mysqli_fetch_array($run_cart);
$product_id = $data_cart['product_id'];
$product_name = $data_cart['product_name'];
$product_price = $data_cart['product_price'];
$product_image = $data_cart['product_featureimg'];
$product_shipping = $data_cart['product_shipping'];

 
 	 $cart = array(
	 'session_id' => $sessionid ,
	 'product_id' => $product_id ,
	 'product_name' => $product_name ,
	 'product_price' => $product_price ,
	 'product_quantity' => $product_Q ,
	 'product_shipping' => $product_shipping ,
	 'product_image' => $product_image
	);
	$result = cartinsert($con , $cart);
				
}else if($count_row>=1)
{
 	 $cart = array(
	 'product_quantity' => $product_Q
	);
	$result = cartupdate($con,$sessionid,$cart);
	
}





?>