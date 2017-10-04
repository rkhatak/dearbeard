		<?php
		require_once('header.php');
		require_once('session.php');
		$UserEmail = $_SESSION['UserEmail'];
		$UserID = $_SESSION['UserID'];
		if(isset($_GET['product_id']))
		{
		$product_id = $_GET['product_id'];
		$total_items = 1;
		
		// Product Info
		
		$sql_quick = "SELECT *FROM product WHERE product_id = '$product_id'";
		$run_quick = mysqli_query($con,$sql_quick) or die(mysqli_error($con));
		$data_quick = mysqli_fetch_array($run_quick);
		$product_price = $data_quick['product_price'];
		$product_ship = $data_quick['product_shipping'];
		
		// User Information 

		$user_info = userinfo($con,$UserEmail);
		$user_data = mysqli_fetch_array($user_info);
		$shipping_add = $user_data['UserAddress'];
		$shipping_state = $user_data['UserState'];

		$sql_tax = "SELECT tax_amount FROM sales_tax WHERE sales_state = '$shipping_state'";
		$run_tax = mysqli_query($con,$sql_tax) or die(mysqli_error($con));
		$tax_data = mysqli_fetch_array($run_tax);
		$product_tax = $tax_data['tax_amount'];

		?>
		<!--sticky div-->    
		<div id="checkout">
		<div class="container">
		<div class="row">
		<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Checkout</a></li>
		</ol>
		<div class="row">
		
		<div class="col-sm-4">
		<h4>shipping address</h4>		
		<p><?php echo $shipping_add ;?></p>
		</div><!--col-sm-4-->
		<div class="col-sm-4">
		<h4>payment method</h4>
		<div class="payment-method">
		<form method="post" action="#">
		<div class="form-group">
		<select class="form-control down">
		<option>Change Method</option>
		<option>Paypal</option>
		<option>Credit Card</option>
		<option>Bitcoin</option>
		</select>
		</div>
		<a href="#" class="cod">Cash On Delivery</a>
		</form>
		</div>
		</div><!--col-sm-4-->
		<div class="col-sm-4">

		<h4>place your order</h4>
		<div class="order-summary">
		<h6><span>order subtotal</span><?php echo "$".$product_price;?></h6>
		<h6><span>shipping</span><?php echo "$".$product_ship;?></h6>
		<h6><span>estimate sales tax</span><?php echo "$".$product_tax;?></h6>
		<h6><span>Total Items</span><?php echo $total_items;?></h6>
		<div class="order-total">
		<h6 class="total"><span>order total</span><?php echo "$".($product_price + $product_ship + $product_tax); ?></h6>
		</div>
		<form name="payment" method="POST" action="quick-payment.php">
		<input type="hidden" name="useremail" value="<?php echo $UserEmail;?>">
		<input type="hidden" name="amount" value="<?php echo ($product_price + $product_ship + $product_tax); ?>">
		<input type="hidden" name="tax" value="<?php echo $product_tax; ?>">
		<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

		<button type="submit" name="pay" class="btn">Place your order</button>
		</form>
		</div>
		</div><!--col-sm-4--> 
							
		</div><!--row 2-->

		</div><!--row-->
		</div>
		</div>
		<?php
		}
		?>
		<div class="clearfix"></div>
		<!--footer-->
		<?php
		require('footer.php');
		?>

