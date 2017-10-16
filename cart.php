		<?php
		require_once('header.php');
		$item_total = 0;
		$shipping = 0;

		// Signup Sidebar

		$run_signup = signupcontent($con);
		// Logo Sidebar

		$run_logo = logocontent($con);

		/*  Product Code */

		$run_product = showproduct($con);
		
		// cart product
		
		$run_cart = showcart($con,$session_id);
		
		
		?>
		<!--sticky div-->    
		<!--your cart-->
		<div id="your-cart">
		<div class="container">
		<div class="row">
		<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Hair Care</a></li>
		<li><a href="#">Shower Starter Kit</a></li>
		</ol>
		<?php
		
		// Check Cart Product Exist Or Not 
		
		$total_cart = mysqli_num_rows($run_cart);
		if($total_cart>=1)
		{
		?>
		<h1>your cart</h1>
		<div class="free">Free US shipping and deluxe samples for orders over $50. Applies to subtotal after discounts.
		Free Shipping on all domestic Auto-Replenishment orders.</div>
                <h3>items in cart</h3>
		<div class="col-left">
                    
		<?php
		while($cart_item = mysqli_fetch_array($run_cart))
		{

		?>
		<div class="item-in-cart">
		
		<div class="item-one">
		<div class="left-one">	
		<div class="product">
		<img src="admin/product_pic/<?php echo $cart_item['product_image'];?>" alt="<?php echo $cart_item['product_name'];?>">
			
		</div>
		</div>
		<div class="right-two">
		<p><?php echo $cart_item['product_name'];?></p>
		</div>
		</div>
		<div class="item-two">
		<h4>quantity</h4>
		<div class="button-quantity">
		<button type="submit" class="addcartpage" data-id="<?php echo $cart_item['cart_id']?>">+</button><input id="r_cartpage_update_quantity<?php echo $cart_item['cart_id'] ?>" type="text" class="ex-no" value="<?php echo $cart_item['product_quantity'];?>"><button type="submit" class="minuscartpage" data-id="<?php echo $cart_item['cart_id']?>">-</button>
		</div>
		</div>
		<div class="item-three">
		<h4><?php echo "$<span class='r_cartpage_price_total".$cart_item['cart_id']."'>".$cart_item['product_quantity']*$cart_item['product_price'].'</span>';?></h4>                  	
		</div>
		<div class="item-four">
		<button type="submit" class="stop" value="<?php echo $cart_item['product_id'];?>" onclick='removecart(this.value)'>X</button>
		</div>
		<div class="clearfix"></div>
		<button type="submit" class="update-cart" value="<?php echo $cart_item['cart_id'];?>" onclick='updatecart(this.value)' >update</button>
		<div class="clearfix"></div>
		</div>
                 <input type="hidden" class="r_cartpage_price_total_hidden<?php echo $cart_item['cart_id']?>" value="<?php echo $cart_item['product_price'];?>"/>
		<?php
		$item_total += ($cart_item["product_price"]*$cart_item['product_quantity']);
		$shipping += $cart_item['product_shipping'];
		}
		?>


		</div>
		<div class="col-right">
		<div class="order-summary">
		<h4>order summary</h4>
		<h6><span>order subtotal</span><?php echo "$".$item_total;?></h6>
		<h6><span>shipping</span><?php echo "$".$shipping;?></h6>
		
		<div class="order-total">
		
		<h6 class="total"><span>order total</span><?php echo ($item_total + $shipping); ?></h6>
		</div>
		<a href="checkout.php"><button type="submit" class="btn">secure checkout</button></a>
		</div>
		</div>
		<?php
		}else{
			
			echo "<h5>Please Select Product</h5>";
		}
		?>
		</div>
		</div>
		</div>
		
		<!--your cart-->
		<div class="clearfix"></div>
		<!--probably-->
		<div id="probably">
		<div class="container">
		<div class="row">
		<h4>YOU’LL PROBABLY ALSO LOVE THIS STUFF</h4>
		<div class="running-cart">
		<div id="cart-slider" class="owl-carousel owl-theme">
		<!------- Slider Start----->
		<?php
		while($data_product = mysqli_fetch_array($run_product))
		{
		?>
		<div class="item">

		<div class="cart-item">
		<div class="cart-image"><img src="admin/product_pic/<?php echo $data_product['product_featureimg'];?>" alt="<?php echo $data_product['product_name'];?>"></div>
		</div>
		<div class="cart-info">
		<h4><?php echo $data_product['product_name'];?></h4>
		<ul>
		<li><a href="#"><img src="images/star-symbol.svg" alt="start"></a></li>
		<li><a href="#"><img src="images/star-symbol.svg" alt="start"></a></li>
		<li><a href="#"><img src="images/star-symbol.svg" alt="start"></a></li>
		<li><a href="#"><img src="images/star-symbol.svg" alt="start"></a></li>
		<li><a href="#"><img src="images/grey-symbol.svg" alt="start"></a></li>
		</ul>
		<h6><?php echo "$".$data_product['product_price'];?></h6>
		<button type="submit" id="addto-cartslide" class="cart-add" value="<?php echo $data_product['product_id'];?>">add to cart</button>
		</div>

		</div>

		<?php
		}
		?>
		<!------- Slider End----->
		</div>


		</div>

		</div>

		</div>

		</div>
		<!--replenish program-->
		<div id="replenish-program">

		<div class="container">
		<div class="col-left">
		<?php 
		$signup_data = mysqli_fetch_array($run_signup);
		?>
		<h5><?php echo $signup_data['sidebar_title'];?></h5>
		<p><?php echo $signup_data['sidebar_desc'];?></p>
		<button type="submit" class="replenish-sign">sign up</button>
		</div>
		<div class="col-right">
		<img src="admin/sidebar_pic/<?php echo $signup_data['sidebar_imgname'];?>" alt="replenish">
		</div>
		</div>
		</div>
		<!--replenish program-->
		<!--quality-->	
		<div id="quality">
		<div class="container">
		<?php 
		while($logo_data = mysqli_fetch_array($run_logo))
		{
		?>
		<div class="col-left">
		<img src="admin/logo_pic/<?php echo $logo_data['logo_imgname']?>" alt="<?php echo $logo_data['logo_title']?>">
		<h5><?php echo $logo_data['logo_title']?></h5>
		<p><?php echo $logo_data['logo_desc']?></p>
		</div>
		<?php
		}
		?>
		</div>
		</div>
		<!--quality-->
		<div class="clearfix"></div>
		<!--footer-->
		<?php
		require('footer.php');
		?>