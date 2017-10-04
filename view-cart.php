<?php
session_start();
require('admin/config.php');
require('admin/function.php');
if(isset($_SESSION["product_id"]) && count($_SESSION["product_id"])>0)
{
	
	
	foreach ($_SESSION["product_id"] as $cart_item)
	{
	 echo $product_id = $cart_item['product_id'];
	 echo "<br/>";
	 echo $product_name = $cart_item['product_name'];
	 echo "<br/>";
	 echo $product_desc = $cart_item['product_desc'];
	 echo "<br/>";
	 echo $product_price = $cart_item['product_price'];
	 echo "<br/>";
	 echo $status = $cart_item['status'];
	 echo "<br/>";
	 echo $product_weight = $cart_item['product_weight'];
	 echo "<br/>jjjj";
	 echo $product_q = $_SESSION['quantity'];
	 echo "<br/>";
	 echo "<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>";
	 echo "<br/>";
	
	}
}






?>