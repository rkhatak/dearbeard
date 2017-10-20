		<?php		
		require('header.php');
		
		$product_id = $_GET['product_id'];
		$detail = productdetail($con,$product_id);
		$productinfo = mysqli_fetch_array($detail);	
				
		// Show All Product Reviews
		
		$productreviews = showreviews($con,$product_id);
		$total_reviews = mysqli_num_rows($productreviews);
		
		$sql_avrageviews= "SELECT AVG(review_value) AS total FROM product_review WHERE product_id='".$product_id."' AND review_status = 'Publish'";
	    $run_avrageviews = mysqli_query($con,$sql_avrageviews) or die(mysqli_error($con));
		$review_value = mysqli_fetch_array($run_avrageviews);
		$total_avrege = $review_value['total'];
		
		// Signup Sidebar

		$run_signup = signupcontent($con);
		
		// Logo Sidebar

		$run_logo = logocontent($con);
		
		/*  Product slider Code */

		$run_product = showproduct($con);
		?>
		<!--sticky div-->    
		<div id="starter-kit">
		<div class="container">
		<div class="row">

		<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#"><?php echo $productinfo['product_cat_id'];?></a></li>
		<li><a href="#"><?php echo $productinfo['subproduct_cat_id'];?></a></li>
		</ol>
		<div class="col-left">
		<div class="beard-wash-left">
		<img src="admin/product_pic/<?php echo $productinfo['product_featureimg'];?>" alt="<?php echo $productinfo['product_name'];?>">
		</div>

		<div id="product-move" class="owl-carousel owl-theme">
		<?php
		$thumb_img = explode(",",$productinfo['product_img']);
		foreach($thumb_img as $thumb_key=>$thumb_value)
		{
		?>
		<div class="item">
		<a href="#"><div class="product-run"><img src="admin/product_pic/<?php echo $thumb_value;?>" alt="slide"></div></a>
		</div>
		<?php
		}
		?>
		</div>
		</div>
		<div class="col-right">
		<div class="washarea">
		<h1><?php echo $productinfo['product_name'];?></h1>
		<ul>
		<li><input type="text" disabled="true" name="rating_value"  id="input-21b" value="<?php echo $total_avrege;?>" class="rating"></li>
		</ul>
		<div class="rateit">
		5.0 (<?php echo number_format($total_avrege,1);?>)
		</div>
		<div class="reviewnew">	
		<a class="nav-link js-scroll-trigger" href="#summary">Write a Review</a>
		</div>
		<div class="clearfix"></div>
		<p><?php echo substr($productinfo['short_description'],0,90);?></p>
		<?php if($productinfo['product_desc'] != '' && $productinfo['product_desc'] != NULL)
		{ ?>
			<a href="javascript:void(0)" title="show" class="more">more</a>
			<div class="more_content" style="display:none">
				<?php echo $productinfo['product_desc'];?>
			</div>
		<?php
		}
		?>
		
		</div>
		<div class="product-quantity">
		quantity <button type="submit" class="addition">+</button><input type="text" class="itemno" value="1"><button type="submit" class="subtraction">-</button>
		</div>
		<div class="exact-no">
		$<?php echo $productinfo['product_price'];?>
		</div>
		<div class="clearfix"></div>
		<div class="wish-cart">
		<button type="submit" id="addto-cart" class="add-cart" value="<?php echo $productinfo['product_id'];?>" >add to cart</button><button type="submit" id="btnwishlist" class="wishlist" value="<?php echo $productinfo['product_id'];?>" >add to wishlist</button>
		</div>
		<button type="submit" class="auto-replenish">add the auto-replenishment program</button>
		<!--<div class="refer"><a href="#">REFER FRIENDS, GET 20% OFF ></a></div>-->
		</div>
		</div>
		</div>
		</div>
		<!--start kit-->
		<div class="clearfix"></div>   
		<!--product detail-->
		<?php if($productinfo['product_desc'] != '' && $productinfo['product_desc'] != NULL)
		{ ?>
			<div id="product-detail">
				<div class="container">
					<div class="row">
						<h4>product details</h4>
						<div class="product-list">
							<?php echo $productinfo['product_desc'];?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<!--product detail-->
		<div class="clearfix"></div>
		<!--summary-->
		<div id="summary">
		<div class="container">	
		<div class="row">
		<div class="col-sm-6">
		<div class="write-review">
		<h6>write a review</h6>
		<form name="review-form" id="review-form" action="add-review.php"  method="POST" >

		<span class="rateit">rate it</span><input type="text" name="rating_value"  id="input-21b" value="4" class="rating">

		<div class="clearfix"></div>
		<div class="form-group">
		<input type="text" name="rating_title" class="form-control review" placeholder="Review Title" required >
		</div>
		<div class="form-group">
		<textarea class="form-control area" name="rating_desc"   placeholder="Describe your experience" required maxlength="1000" ></textarea>
		</div>
		<div class="form-group">
		<input type="hidden" name="product_id" class="form-control review" value="<?php echo $productinfo['product_id'];?>" >
		</div>
		<div class="form-group">
		<input type="hidden" name="user_id" class="form-control review" value="<?php if(isset($_SESSION['UserId'])){echo $_SESSION['UserId'];}?>" >
		</div>
		<div class="form-group">    
		<button type="submit" id="review"  class="review-submit">submit</button> <a href=""  class="review-cancel">cancel</a>
		</div>
		</form>
		</div>
		</div>
		<div class="col-sm-6">
		<div class="review-summary">
		<h6>review a summary</h6>
		<div class="col-left">
		<ul>
		<li class="one"></li>
		<li class="two"></li>
		<li class="three"></li>
		<li class="two"></li>
		<li class="one"></li>
		</ul>
		</div>
		<div class="col-right">
		<h2><?php echo number_format($total_avrege,1);?></h2>
		<ul>
		<li><input type="text" readonly="true" name="rating_value" id="input-21b" value="<?php echo $total_avrege;?>" class="rating"></li>
		</ul>
		<h6><?php echo $total_reviews;?> reviews</h6>
		</div>
		<div class="clearfix"></div>
		</div>
		</div>

		</div>
		</div>
		</div>
		<!--summary-->
		<div class="clearfix"></div>
		<!--customer review-->
		<div id="customer-review">
		<div class="container">
		<div class="row">
		<?php if($total_reviews > 0){
			echo "<h4>customer reviews</h4>";
		}?>
		
		<?php
		while($review_data = mysqli_fetch_array($productreviews))
		{
		$userid = $review_data['user_id'];
		$sql_userviews= "SELECT *FROM users WHERE UserID = '$userid'";
		$run_userviews = mysqli_query($con,$sql_userviews) or die(mysqli_error($con));
		$userviews_data = mysqli_fetch_array($run_userviews);
		$username = $userviews_data['UserFirstName']." ".$userviews_data['UserLastName']
		?>
		<div class="above">
		<div class="col-left">
		<div class="person">
		<img src="images/person-img.png" alt="person">
		</div>
		<h6><?php echo $username; ?></h6>
		</div>
		<div class="col-mid">
		<h6><?php echo $review_data['review_title']; ?></h6>
		<p><?php echo $review_data['review_desc']; ?></p>
		</div>
		<div class="col-right">
		<h6>Ratings</h6>
		<ul>
		<li><input type="text" name="rating_value" disabled="true" id="input-21b" value="<?php echo $review_data['review_value']; ?>" class="rating"></li>
		</ul>
		</div>
		</div>
		<div class="clearfix"></div>
		<?php
		}
		?>
		</div>
		</div>
		</div>
		<!--customer review-->
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
		<h6>$<?php echo $data_product['product_price'];?></h6>
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