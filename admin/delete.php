<?php
session_start();
require('config.php');
require('session.php');
require('function.php');

/*Logo Delete */

if(isset($_GET['logo_id']))
{
$id = $_GET['logo_id'];
$sql_action = "DELETE FROM logo_widgets WHERE logo_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: logo-list.php');
}	
}

/*Admin Delete */

if($_GET['admin_id'])
{
$id = $_GET['admin_id'];
$sql_action = "DELETE FROM admininfo  WHERE user_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: admin-list.php');
}	
}

/* Category Delete */

if($_GET['category_id'])
{
$id = $_GET['category_id'];
$sql_action = "DELETE FROM category  WHERE cat_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: category-list.php');
}	
}

/*Coupon Delete */

if(isset($_GET['coupon_id']))
{
$id = $_GET['coupon_id'];
$sql_action = "DELETE FROM coupon  WHERE coupon_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: coupon-list.php');
}	
}

/*Header Delete */

if(isset($_GET['header_id']))
{
$id = $_GET['header_id'];
$sql_action = "DELETE FROM topheader  WHERE header_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: top-header.php');
}	
}

/*Order Delete */

if(isset($_GET['order_id']))
{
$id = $_GET['order_id'];
$sql_action = "DELETE FROM orders  WHERE order_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: order-list.php');
}	
}

/*Payment Delete */

if(isset($_GET['payment_id']))
{
$id = $_GET['payment_id'];
$sql_action = "DELETE FROM transactions  WHERE payment_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: payment-list.php');
}	
}

/*page Delete */

if(isset($_GET['page_id']))
{
$id = $_GET['page_id'];
$sql_action = "DELETE FROM pages  WHERE page_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: page-list.php');
}	
}

/*Slider Delete */

if(isset($_GET['slider_id']))
{
$id = $_GET['slider_id'];
$sql_action = "DELETE FROM slider  WHERE slider_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: slider-list.php');
}	
}

/*Subscribe Email Delete */

if(isset($_GET['subscribe_id']))
{
$id = $_GET['subscribe_id'];
$sql_action = "DELETE FROM subscribe  WHERE email_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: subscribe-email.php');
}	
}

/*Subscribe Content Delete */

if(isset($_GET['content_id']))
{
$id = $_GET['content_id'];
$sql_action = "DELETE FROM subscribe_sidebar  WHERE subscontent_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: subscribe-contentlist.php');
}	
}

/*Footer Widgets Delete */

if(isset($_GET['widgets_id']))
{
$id = $_GET['widgets_id'];
$sql_action = "DELETE FROM  footer_widgets  WHERE widgets_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: footer-widgets.php');
}	
}


if(isset($_GET['signupbar_id']))
{
$id = $_GET['signupbar_id'];
$sql_action = "DELETE FROM  signup_sidebar  WHERE sidebar_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: sidebar-list.php');
}	
}


// Delete review

if(isset($_GET['review_id']))
{
$id = $_GET['review_id'];
$sql_action = "DELETE FROM  product_review  WHERE review_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: userreview-list.php');
}	
}

// Delete tax

if(isset($_GET['tax_id']))
{
$id = $_GET['tax_id'];
$sql_action = "DELETE FROM  sales_tax WHERE sales_tax_id = '$id' ";
$run_action = mysqli_query($con,$sql_action) or die(mysqli_error($con));	
if($run_action == true)
{
	header('Location: salestax-list.php');
}	
}

?>