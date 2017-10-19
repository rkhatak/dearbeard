<?php

require('function.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$rating_value = $_POST['rating_value'];
$rating_title = $_POST['rating_title'];
$rating_desc = $_POST['rating_desc'];
$product_id = $_POST['product_id'];
$user_id = $_POST['user_id'];
if(!empty($user_id))
{
$product_review = array(
			'user_id'  => $user_id,
			'product_id ' => $product_id,
			'review_value' => $rating_value,
			'review_title' => $rating_title,
			'review_desc' => $rating_desc						
			);
			
$result = addreview($con,$product_review);
if($result == TRUE)
{
	echo "TRUE";
}else{
	echo "ERROR";
}
}
else{
	echo "FALSE";
}
}


		



?>