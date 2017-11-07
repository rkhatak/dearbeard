<?php
require_once('header.php');
require_once('session.php');
		$UserEmail = $_SESSION['UserEmail'];
		$UserID = $_SESSION['UserID'];
		$item_total = 0;
		$shipping = 0;
		
		// cart product
		
		$run_cart = showcart($con,$session_id);
		
		while($cart_item = mysqli_fetch_array($run_cart))
		{

		$item_total += ($cart_item["product_price"]*$cart_item['product_quantity']);
		$shipping += $cart_item['product_shipping'];
		}
		
		// Total Items
		
		$total_items = totalitem($con,$session_id);
		
		// User Information 
		
		$user_shipdata = usership_info($con,$UserID);
		
		$shipping_state = $user_shipdata['ShipingState'];
		
		$sql_tax = "SELECT tax_amount FROM sales_tax WHERE sales_state = '$shipping_state'";
		$run_tax = mysqli_query($con,$sql_tax) or die(mysqli_error($con));
		$tax_data = mysqli_fetch_array($run_tax);
		$product_tax = $tax_data['tax_amount'];
		if(empty($product_tax))
		{
		$product_tax = 0;	
		}
		
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
				<?php if(!empty($total_items['item']) && ($total_items['item'] != ''))
				{
					?>
                	<div class="col-sm-6">
                		<h4>shipping address</h4>		
                    	<p><?php echo $user_shipdata['UserFirstName']." ".$user_shipdata['UserLastName']."<br/>". $user_shipdata['ShipingAddress']."<br/>".$user_shipdata['ShipingCity']."<br/>".$user_shipdata['ShipingState']."<br/>".$user_shipdata['ShipingState']."-".$user_shipdata['ShipingZip'].",".$user_shipdata['ShipingCountry'];?></p>
                    </div><!--col-sm-4-->
                   <!--col-sm-4-->
                    <div class="col-sm-6">
					
                        <h4>place your order</h4>
                        <div class="order-summary">
                        <h6><span>order subtotal</span><?php echo "$".$item_total;?></h6>
                        <h6><span>shipping</span><?php echo "$".$shipping;?></h6>
                        <h6><span>estimate sales tax</span><?php echo "$".$product_tax;?></h6>
                        <h6><span>Total Items</span><?php echo $total_items['item'];?></h6>
                        <div class="order-total">
                        <h6 class="total"><span>order total</span><?php echo "$".($item_total + $shipping + $product_tax); ?></h6>
                        </div>
						<form name="payment" method="POST" action="payment.php">
						<input type="hidden" name="useremail" value="<?php echo $UserEmail;?>">
						<input type="hidden" name="amount" value="<?php echo ($item_total + $shipping + $product_tax); ?>">
						<input type="hidden" name="tax" value="<?php echo $product_tax; ?>">
						
                        <button type="submit" name="pay" class="btn">Place your order</button>
						</form>
                    </div>
                    </div><!--col-sm-4--> 
<?php
				}else{
					echo "<h5>Please Select Product</h5>";
				}
?>					
                </div><!--row 2-->
            	
            </div><!--row-->
        </div>
    </div>
    <div class="clearfix"></div>
	<!--footer-->
		<?php
		require('footer.php');
		?>

