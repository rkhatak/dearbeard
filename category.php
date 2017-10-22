<?php
		// Call header

		require('header.php');
		
				
		/*   List Category Product Code */

		$cat_product = categoryproduct($con);
		
		/*  Window Category Product Code */
		
		$cat_product_win = categoryproduct_win($con);
		
				// Signup Sidebar

		$run_signup = signupcontent($con);
		
		// Logo Sidebar

		$run_logo = logocontent($con);
		
				/*  Product slider Code */

		$run_product = showproduct($con);
		
		// Show Category
		
		$category = showcategory($con);
		
		// Show Sub Category
		
		$subcategory = showsubcategory($con);
		
		// Total Product
		
		$total_product = countproduct($con);
		
		
		?>
<!--sticky div-->    

<div class="container cat-main" >
       
         <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Hair Care</a></li>
              <li><a href="#">Shower Starter Kit</a></li>
            </ol>
       
        
        <div class="left_sec">
         
        <p class="left_heading">FILTER BY</p>
        <hr class="left_hr">
    
    <button class="clear_all" onclick="clearAll()"><i class="glyphicon glyphicon-remove gly_clear"></i> Clear All</button>
    
	<?php
	while($cat_name = mysqli_fetch_array($category))
	{
	?>
    <label class="control control--checkbox first_check"><?php echo $cat_name['cat_name'];?>
      <input type="checkbox" name="cat_name" value="<?php echo $cat_name['cat_name'];?>" checked="checked" class="category_name" >
      <div class="control__indicator"></div>
      </label>
      <?php
	}
	  ?>
	  
   
       <p class="left_heading left_sec_heading">HAIR TYPE</p>
        <hr class="left_hr">
    <?php
	while($subcat_name = mysqli_fetch_array($subcategory))
	{
	?>
      <label class="control control--checkbox"><?php echo $subcat_name['sub_cat_name'];?>
      <input type="checkbox" name="sub_cat_name" value="<?php echo $subcat_name['sub_cat_name'];?>" checked="checked" class="sub_cat_name">
      <div class="control__indicator"></div>
      </label>
	  <?php
	}
	  ?>
      
      
        </div>
		
        <div class="right_sec">
        <div class="cat_banner_img"></div>
        
        <div class="sort_section">
        <div class="window"><i class="glyphicon glyphicon-th-large gly_window" ></i></div>
        <div class="list"><i class="glyphicon glyphicon-th-list gly_list"></i></div>
        
        
        <p class="products12">There <?php echo $total_product;?> products</p>
    <p class="sort_by">Sort By &nbsp;:</p>
    <div class="best-form best-form_cat" >
    <form>
        <div class="form-group">
        
                        	<select class="form_control_cat form-control drop" >
                               
					<option>Default </option>
                                <option>Default 2</option>
                                <option>Default 3</option>
                                <option>Default 4</option>
                                <option>Default 5</option>
                            </select>
                           
                        </div>
                         </form>
                         </div>
        </div>
        
        <div class="cat_section">
       <div class="list_view">
	   <?php 
	   while($data_catproduct = mysqli_fetch_array($cat_product))
	   {
	   ?>
       <div class="list1">
     <div class="list_img">
	 <img src="admin/product_pic/<?php echo $data_catproduct['product_featureimg'];?>" alt="<?php echo $data_catproduct['product_name'];?>">
	 </div>
     <div class="list_detail">
		<button type="submit" class="cat-cart" value="<?php echo $data_catproduct['product_id'];?>"><i class="fa fa-shopping-cart"></i></button>	
		<h5 ><?php echo $data_catproduct['product_name'];?></h5>
		<h3  ><?php echo "$".$data_catproduct['product_price'];?></h3>
		
						<ul class="ratings" >
                        	<li><img src="images/grey-star.png" alt="star"></li>
                        	<li><img src="images/yellow-star.png" alt="star"></li>
                            <li><img src="images/yellow-star.png" alt="star"></li>
                            <li><img src="images/yellow-star.png" alt="star"></li>
                            <li><img src="images/yellow-star.png" alt="star"></li>
                        </ul>
                        
                         <p><?php echo $data_catproduct['short_description'];?></p>
                        
     </div>
     </div>
<?php
	   }
?>
       </div>
       
       <div class="window_view">
       
	   <?php 
	   while($data_catproduct_win = mysqli_fetch_array($cat_product_win))
	   {
	   ?>
	   <div class="owl-item owl_item_first">
	   <div class="item">
                    <a href="#"></a><div class="thick-hair thick_background effect"><a href="#">
                     <div class="effect_box" >
                   
                    
                    <ul class="effect_icons">
                   <li></li>
                   <li></li>
                   <li></li>
                    </ul>
                    <ul class="effect_text">
                   <li><a href="product-detail.php?product_id=<?php echo $data_catproduct_win['product_id']; ?>" >Quick View</a></li>
                   <li id="btnwishlist">Add to Wishlist</li>
                   <li>Quick Checkout</li>
                    </ul>
                    
					<button type="submit" class="cat-cart" value="<?php echo $data_catproduct_win['product_id'];?>">add to cart<span><?php echo "$".$data_catproduct_win['product_price'];?></span></button>	
                    </div>
                    	<h6><?php echo $data_catproduct_win['product_name'];?></h6>
                        <div class="shampoo-image">
                        	<img src="admin/product_pic/<?php echo $data_catproduct_win['product_featureimg'];?>" alt="<?php echo $data_catproduct_win['product_name'];?>">
                        </div>
                        <p><?php echo $data_catproduct_win['short_description'];?></p>
                        <?php
							$sql_avrageviews= "SELECT AVG(review_value) AS total FROM product_review WHERE product_id='".$data_catproduct_win['product_id']."' AND review_status = 'Publish'";
							$run_avrageviews = mysqli_query($con,$sql_avrageviews) or die(mysqli_error($con));
							$review_value = mysqli_fetch_array($run_avrageviews);
							$total_avrege = $review_value['total'];
						?>
						<ul>
						<li><input type="text" disabled="true" name="rating_value"  id="input-21b" value="<?php echo $total_avrege;?>" class="rating"></li>
						</ul>
                        </a>
						<a href="#" class="btn">add to cart<span><?php echo "$".$data_catproduct_win['product_price'];?></span></a>
                    </div>
                    </div>
                    </div>
					<?php
	   }
					?>
					
                    </div>
                  
        </div>
        </div>
        </div>


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