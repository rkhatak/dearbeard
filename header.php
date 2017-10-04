	<?php
	ob_start();
	require_once('function.php');
	session_start();
	$session_id = session_id();

	/*  show menu 1 to 4 */

	$sql_menulist = "SELECT menu_name , url FROM menu WHERE status = 'Active' ORDER BY order_list ASC Limit 0,4";
	$run_menulist = mysqli_query($con,$sql_menulist) or die(mysqli_error($con));

	/*  show menu 5 to last menu */

	$sql_menulistlast = "SELECT menu_name , url FROM menu WHERE status = 'Active' ORDER BY order_list ASC Limit 4,10";
	$run_menulistlast = mysqli_query($con,$sql_menulistlast) or die(mysqli_error($con));

	if(isset($_POST['home-login']))
	{
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = md5(mysqli_real_escape_string($con,$_POST['password']));
	$login_arrays = array( 'UserEmail' => $username,
	'UserPassword' => $password
	);

	$login_result = loginuser($con,$login_arrays);

	if($login_result == 1)
	{
	$_SESSION['uname'] = $username;
	$sql_user = "SELECT UserEmail , UserID FROM users WHERE UserEmail = '$username' ";
	$run_user = mysqli_query($con,$sql_user) or die(mysqli_error($con));
	$data_user = mysqli_fetch_array($run_user) ;
	$UserEmail = $data_user['UserEmail'];
	$UserId = $data_user['UserID'];
	
	$_SESSION['UserEmail'] = $UserEmail;
	$_SESSION['UserId'] = $UserId;
	
	
	//header('Location: userpanel/index.php'); 
	echo '<script type="text/javascript">';
        echo 'window.location.href="userpanel/index.php";';
        echo '</script>';

	}else{

	echo "<script>alert('Username Or Password Incorect')</script>";
	}
	}
	
	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Dear Beard</title>
	<!-- favicon -->
	<link href="images/favicon.png" rel="icon">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- fontawesome -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- star rating -->
	<link href="css/star-rating.css" rel="stylesheet">
	<!--owl carousel-->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">    
	<!--style-->
	<link href="css/style.css" rel="stylesheet">
	<!--style-->
	<link href="css/responsive.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/ajax-sumit.js"></script>
	<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="js/form-validation.js"></script>
	</head>
	<body>
	<!--<div class="container">
	<a href="#" class="btn">add to cart<span>$12</span></a>
	</div>-->
	<!--header-->
	<div id="sticky_div">
	<header>
	<!--top-->
	<div id="top">
	<div class="col-left">
	<div class="shipping">
	<?php 
	if($header_name = 'Header-1')
	{
	$top_header = showheader($con,$header_name);
	echo $top_header['content']; 
	}
	?>
	</div>
	</div>
	<div class="col-right">
	<div class="signup">
	<?php 
	if($header_name = 'Header-2')
	{
	$top_header = showheader($con,$header_name);
	echo $top_header['content']; 
	}
	?>
	</div>
	<div class="top-right">
	<?php 
	if($header_name = 'Header-3')
	{
	$top_header = showheader($con,$header_name);
	?>
	<form method="post" action="#">
	<div class="form-group">
	<input type="text" name="find-product" class="form-control product" placeholder="<?php echo $top_header['content'];?>">
	<button name="login" type="submit" class="btn-form"></button>
	</div>
	</form>

	<?php
	}
	?>
	</div>
	</div>
	</div>
	<!--top-->
	</header>
	<!--header-->
	<div class="clearfix"></div>
	<!--menu-->
	<div id="menu" class="remove">
	<nav class="navbar navbar-default">
	<div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</button>
	</div>
	<div class="logo-mobile"><a href="#"><img src="images/logo-img.png" alt="logo"></a></div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav">
	<?php
	while($menus = mysqli_fetch_array($run_menulist))
	{			  
	?>
	<li class="active"><a href="<?php echo $menus['url'];?>"><?php echo $menus['menu_name'];?></a></li>									
	<?php
	}
	?>
	<li class="dear-bird"><a href="index.php">dear<br/>beard</a></li> 
	<?php
	while($menuslast = mysqli_fetch_array($run_menulistlast))
	{			  
	?>
	<li class="active"><a href="<?php echo $menuslast['url'];?>"><?php echo $menuslast['menu_name'];?></a></li>									
	<?php
	}
	?>
	</ul>
	</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
	</nav>
	<ul class="icon-set">
	<li class="search dropdown mega-dropdown">
	<a href="#"><img src="images/search-img.svg" alt="icon" class="icon"></a>
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>				
	<div class="dropdown-menu mega-dropdown-menu">

	<form method="post" action="">
	<div class="form-group">
	<input type="text" class="form-control" placeholder="SEARCH">
	</div>
	<div class="form-group">
	<button type="submit" class="search-button"></button>
	</div>
	</form>
	</div>	
	</li>
	<li class="cart dropdown mega-dropdown"><a href="cart.php"><img src="images/cart-img.svg" alt="icon" class="icon">
	<span class="quantity">
	<?php														
	echo tottalcart($con,$session_id);
	?>
	</span>
	</a>
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>				
	<div class="dropdown-menu mega-dropdown-menu">
	Your Baxter of California shopping bag is empty.Shop now to find your favorite Baxter of California products.

	</div>
	</li>
	<li class="login dropdown mega-dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/person-icon.svg" alt="icon" class="icon"></a>
	<ul class="dropdown-menu mega-dropdown-menu">
	<div class="col-sm-6">
	<div class="login-part">
	<form name="login-form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<div class="form-group">
	<input type="text" name="username" id="header-username" class="form-control" placeholder="Email">
	<div class="headeruValid"></div>
	</div>
	<div class="form-group">
	<input type="password" name="password" id="header-password" class="form-control" placeholder="Password">
	<div class="headerpValid"></div>
	</div>
	<div class="form-group">
	<button type="submit" name="home-login" class="header-login">login</button>
	<a href="forgot-password.php" class="forgot">forgot password ?</a>
	</div>
	</form>
	</div>
	</div>
	<div class="col-sm-6">
	<div class="registration">
	<h4>creat a new account</h4>
	<p>Create a new account to access order history,order tracking and faster future checkouts.</p>
	<a href="registration.php"><button type="submit"  class="header-registration">create account</button></a>
	</div>
	</div>
	</ul>
	</li>
	</ul>
	</div>
	<!--menu-->
	<div class="clearfix"></div>
	</div>