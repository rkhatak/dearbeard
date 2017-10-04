<?php
session_start();
require('function.php');
$product_id = $_GET['wishlist'];
$product_Q = $_GET['itemno'];
$sql_wishlist = "SELECT *FROM product WHERE product_id = '$product_id'";
$run_wishlist = mysqli_query($con,$sql_wishlist) or die(mysqli_error($con));

$data_wishlist = mysqli_fetch_array($run_wishlist);

$product_id = mysqli_real_escape_string($con,$data_wishlist['product_id']);
$product_name = mysqli_real_escape_string($con,$data_wishlist['product_name']);
$product_desc = mysqli_real_escape_string($con,$data_wishlist['product_desc']);
$short_description = mysqli_real_escape_string($con,$data_wishlist['short_description']);
$product_price = mysqli_real_escape_string($con,$data_wishlist['product_price']);
$product_cat_id = mysqli_real_escape_string($con,$data_wishlist['product_cat_id']);
$subproduct_cat_id = mysqli_real_escape_string($con,$data_wishlist['subproduct_cat_id']);
$product_img = mysqli_real_escape_string($con,$data_wishlist['product_img']);
$uesrid = $_SESSION['UserId'];
$user_email = $_SESSION['UserEmail'];
$username = "";

$wishlist_info = array(
						'wishlist_uesrid'  => $uesrid,
						'wishlist_user_email' => $user_email,
						'wishlist_username' => $username,
						'wishlist_product_id' => $product_id,
						'wishlist_product' => $product_name,
						'wishlist_quantity' => $product_Q,
						'wishlist_product_desc' => $product_desc,
						'wishlist_short_description' => $short_description,
						'wishlist_product_price' => $product_price,
						'wishlist_product_cat_id'  => $product_cat_id,
						'wishlist_subproduct_cat_id' => $subproduct_cat_id,
						'wishlist_product_img' => $product_img				

						);
						
$run_wishlist = insert_wishlist($con,$wishlist_info);						



?>