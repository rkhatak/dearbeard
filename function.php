<?php
require_once('admin/config.php');

function loginuser($con,$login_arrays)
{
	$sql = "SELECT *FROM users WHERE";
	foreach($login_arrays as $key=>$value)
	{
	 $sql = $sql." $key ='$value' AND ";
	}
	$sql_main = rtrim($sql," AND");
	$run = mysqli_query($con,$sql_main) or die(mysqli_error($con)) ;
	
	$row_count = mysqli_num_rows($run);
	return $row_count;
}

function showslider($con)
{
	$sql_slider = "SELECT *FROM slider WHERE slider_type = 'dynamic'";
	$run_slider = mysqli_query($con,$sql_slider) or die(mysqli_error($con));
	return $run_slider;
}

function showstaticslider($con)
{
	$sql_slider2 = "SELECT *FROM slider WHERE slider_type = 'static'";
	$run_slider2 = mysqli_query($con,$sql_slider2) or die(mysqli_error($con));
	return $run_slider2;
}

/// Product Show


function showproduct($con)
{
	$sql_product= "SELECT *FROM product WHERE status = 'Publish'";
	$run_product = mysqli_query($con,$sql_product) or die(mysqli_error($con));
	return $run_product;
}


// Category Product

function categoryproduct($con)
{
	$sql_catproduct= "SELECT *FROM product WHERE status = 'Publish'";
	$run_catproduct = mysqli_query($con,$sql_catproduct) or die(mysqli_error($con));
	return $run_catproduct;
}


// Window Category Product

function categoryproduct_win($con)
{
	$sql_catproduct= "SELECT *FROM product WHERE status = 'Publish'";
	$run_catproduct = mysqli_query($con,$sql_catproduct) or die(mysqli_error($con));
	return $run_catproduct;
}

// top header

function showheader($con,$header_name)
{
$sql = "SELECT *FROM topheader WHERE header_name = '$header_name'";	
$run = mysqli_query($con,$sql) or die(mysqli_error($con)) ;
$headerinfo = mysqli_fetch_array($run);
return $headerinfo;
}
// Subscribe email

function countemail($con,$email)
{
	$check_emailsql = "SELECT email FROM subscribe WHERE email = '$email'";
	$check_runsql = mysqli_query($con,$check_emailsql) or die(mysqli_error($con));
	$count_email = mysqli_num_rows($check_runsql);
	return $count_email;
}

function subscribemail($con,$email)
{
	$emailsql = "INSERT INTO subscribe SET email = '$email'";
	$runsql = mysqli_query($con,$emailsql) or die(mysqli_error($con));
	return $runsql;
}

// Show Carousel

function showcarousel($con)
{
	$sql_carousel = "SELECT *FROM minislider WHERE minislider_status = 'Aproved'";
	$run_carousel = mysqli_query($con,$sql_carousel) or die(mysqli_error($con));
	return $run_carousel;
}

// Subscribe Email Content

function subscribecontent($con)
{
	$sql_subscribe = "SELECT *FROM subscribe_sidebar";
	$run_subscribe = mysqli_query($con,$sql_subscribe) or die(mysqli_error($con));
	return $run_subscribe;
}

// Signupcontent

function signupcontent($con)
{
	$sql_signup = "SELECT *FROM signup_sidebar";
	$run_signup = mysqli_query($con,$sql_signup) or die(mysqli_error($con));
	return $run_signup;
}

//Logo Sidebar

function logocontent($con)
{
	$sql_logo = "SELECT *FROM logo_widgets";
	$run_logo = mysqli_query($con,$sql_logo) or die(mysqli_error($con));
	return $run_logo;
}

// Footer Widgets

function showfooter($con,$widgets_name)
{
	$sql_footer = "SELECT *FROM footer_widgets WHERE widget_name = '$widgets_name'";
	$run_footer = mysqli_query($con,$sql_footer) or die(mysqli_error($con));
	return $run_footer;
}

// Page Content

function pagecontent($con,$pagename)
{
	$sql_page = "SELECT *FROM  pages WHERE page_menu = '$pagename'";
	$run_page = mysqli_query($con,$sql_page) or die(mysqli_error($con));
	$page_content = mysqli_fetch_array($run_page);
	return $page_content;
}

// ADD WISHLIST

function insert_wishlist($con,$wishlist_info)
{
	$sql = "INSERT INTO wishlist SET";
	foreach($wishlist_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

// Show product detail

function productdetail($con,$product_id)
{
	$sql_productdetail= "SELECT *FROM product WHERE status = 'Publish' AND product_id = '$product_id'";
	$run_productdetail = mysqli_query($con,$sql_productdetail) or die(mysqli_error($con));
	return $run_productdetail;
}



function addreview($con,$product_review)
{
	
	$sql = "INSERT INTO product_review SET";
	foreach($product_review as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

// Show product Review

function showreviews($con,$product_id)
{
	$sql_productviews= "SELECT *FROM product_review WHERE product_id='".$product_id."' AND review_status = 'Publish'";
	$run_productviews = mysqli_query($con,$sql_productviews) or die(mysqli_error($con));
	return $run_productviews;
}

// cart addcslashes



function cartinsert($con , $cart)
{
	
	$sql = "INSERT INTO cart SET";
	foreach($cart as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}




function cartupdate($con,$session_id,$product_id,$cart)
{
	
	$sql = "UPDATE cart SET" ;
	foreach($cart as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE product_id = '$product_id' AND session_id = '$session_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}




function showcart($con,$session_id)
{
	$sql_productcart= "SELECT *FROM cart WHERE session_id = '$session_id'";
	$run_productcart = mysqli_query($con,$sql_productcart) or die(mysqli_error($con));
	return $run_productcart;
}


function tottalcart($con,$session_id)
{
	$sql_tottalcart= "SELECT *FROM cart WHERE session_id = '$session_id'";
	$run_tottalcart = mysqli_query($con,$sql_tottalcart) or die(mysqli_error($con));
	$tottal = mysqli_num_rows($run_tottalcart);
	
	return $tottal;
}

function registration($con,$user_info)
{
	$sql = "INSERT INTO users SET";
	foreach($user_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}




function showcountry($con)
{
	$sql_country = "SELECT *FROM countries";
	$run_country = mysqli_query($con,$sql_country) or die(mysqli_error($con));
	
	return $run_country;
}

function checkemail($con,$email)
{
	$sql_email = "SELECT *FROM users WHERE UserEmail = '$email'";
	$run_email = mysqli_query($con,$sql_email) or die(mysqli_error($con));
	$count_email = mysqli_num_rows($run_email);
	return $count_email;
}


function totalitem($con,$session_id)
{
	$sql_cartitem = "SELECT   SUM(product_quantity) AS item FROM cart WHERE session_id = '$session_id'";
	$run_cartitem  = mysqli_query($con,$sql_cartitem ) or die(mysqli_error($con));
	$tottal = mysqli_fetch_array($run_cartitem);
	return $tottal;
}

// Session User Info




function userinfo($con,$UserEmail)
{
	$sql_userinfo = "SELECT *FROM users WHERE UserEmail = '$UserEmail' AND Userstatus = 'Active'";
	$run_userinfo = mysqli_query($con,$sql_userinfo) or die(mysqli_error($con));
	return $run_userinfo;
}


function insert_order($con,$order_array)
{
	$sql = "INSERT INTO orders SET";
	foreach($order_array as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}



function trans_insert($con,$transactions)
{
	$sql = "INSERT INTO transactions SET";
	foreach($transactions as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

//Show Category

function showcategory($con)
{
$sql = "SELECT DISTINCT cat_name  FROM category";	
$run = mysqli_query($con,$sql) or die(mysqli_error($con)) ;

return $run;
}

// Show Sub Category

function showsubcategory($con)
{
$sql_sub = "SELECT DISTINCT sub_cat_name  FROM category";	
$run_sub = mysqli_query($con,$sql_sub) or die(mysqli_error($con)) ;

return $run_sub;
}



function countproduct($con,$cat_name)
{
	$sql_countproduct= "SELECT *FROM product WHERE status = 'Publish' AND product_cat_id = '$cat_name' ";
	$run_countproduct = mysqli_query($con,$sql_countproduct) or die(mysqli_error($con));
	$run_count = mysqli_num_rows($run_countproduct);
	return $run_count;
}

function usership_info($con,$UserId)
{
	$sql_shipuser= "SELECT *FROM users_shiping WHERE UserId = '$UserId'";
	$run_shipuser = mysqli_query($con,$sql_shipuser) or die(mysqli_error($con));
	$shipinfo = mysqli_fetch_array($run_shipuser);
	return $shipinfo;
}

//forget Password

function validate_email($con,$useremail)
{
	$sql_email= "SELECT *FROM users WHERE UserEmail = '$useremail'";
	$run_email = mysqli_query($con,$sql_email) or die(mysqli_error($con));
	return $run_email;
}

 function emailsubscribe($con,$email)
 {
   $sqlemail = "INSERT INTO subscribe SET email = '$email'";  
    $run = mysqli_query($con,$sqlemail) or die(mysqli_error($con));
	return $run;
 }

	

function searchproduct($con,$cat_name,$sub_cat_name)
{
	$sql_search= "SELECT *FROM product WHERE product_cat_id = '$cat_name' OR subproduct_cat_id = '$sub_cat_name'";
	$run_search = mysqli_query($con,$sql_search) or die(mysqli_error($con));
	return $run_search;
}

function contactUs($con,$data=''){
	$name=$data['name'];
    $email=$data['email'];
    $phone=$data['phonenumber'];
	$message=$data['message'];
	$sqlemail = "INSERT INTO contact_us SET name = '$name',email = '$email',phone = '$phone',message = '$message'";  
    $run = mysqli_query($con,$sqlemail) or die(mysqli_error($con));
	return $run;

}



?>