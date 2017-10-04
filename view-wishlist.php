<?php
session_start();
require('function.php');

$sql_wishlist = "SELECT *FROM wishlist WHERE wishlist_uesrid = '1'";
$run_wishlist = mysqli_query($con,$sql_wishlist) or die(mysqli_error($con));

while($data_wishlist = mysqli_fetch_array($run_wishlist))
{
	echo $data_wishlist['wishlist_uesrid'];
	echo "<br/>";
	echo $data_wishlist['wishlist_user_email'];
	echo "<br/>";
	echo $data_wishlist['wishlist_username'];
	echo "<br/>";
	echo $data_wishlist['wishlist_product_id'];
	echo "<br/>";
	echo $data_wishlist['wishlist_product'];
	echo "<br/>";
	echo $data_wishlist['wishlist_product_desc'];
	echo "<br/>";
	echo $data_wishlist['wishlist_short_description'];
	echo "<br/>";
	echo $data_wishlist['wishlist_product_price'];
	echo "<br/>";
	echo $data_wishlist['wishlist_product_cat_id'];
	echo "<br/>";
	echo $data_wishlist['wishlist_subproduct_cat_id'];
	echo "<br/>";
	echo $data_wishlist['wishlist_product_img'];
	
}

?>