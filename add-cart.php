<?php
session_start();
$sessionid =  session_id();
require('function.php');
$product_id = $_GET['data'];
$product_Q = $_GET['itemno'];

if (array_key_exists('UserId', $_SESSION) && $_SESSION['UserId'] != null) {
	$UserID = $_SESSION['UserId'];
	$sql_addcart = "SELECT * FROM cart WHERE product_id = '$product_id' AND user_id = '$UserID'";
}
else
{
	$sql_addcart = "SELECT * FROM cart WHERE product_id = '$product_id' AND session_id = '$sessionid' ";
}

$run_addcart = mysqli_query($con,$sql_addcart) or die(mysqli_error($con));
$count_row = mysqli_num_rows($run_addcart);
if($count_row == 0 || $count_row < 1 )
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

 	if (isset($_SESSION['UserId'])) {
 		$cart['user_id'] = $UserID;
 	}

	$result = cartinsert($con , $cart);
				
}
else if($count_row >= 1)
{
	$result = $con->query($sql_addcart);

	if ($result->num_rows > 0) {
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
        	$quantity = $row["product_quantity"];
        	$cartId = $row["cart_id"];
    	}
	}

 	$cart = array(
	 'product_quantity' => $quantity + 1
	);

	$result = cartmodify($con,$sessionid,$cartId,$cart);
}
?>