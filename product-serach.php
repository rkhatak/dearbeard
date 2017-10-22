        <?php
        // Call header
        
        require_once('header.php');
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
        
       
        //Serach Result
       
        if(isset($_GET['category']) || isset($_GET['subcategory']) || isset($_GET['tag']) )
        {
      
        $cat_name = isset($_GET['category'])?$_GET['category']:'';
        $sub_cat_name = isset($_GET['subcategory'])?$_GET['subcategory']:'';
        $sub_tags = isset($_GET['tag'])?$_GET['tag']:'';
        $search_result = searchproduct($con,$cat_name,$sub_cat_name,$sub_tags);
        $total_product = mysqli_num_rows($search_result);
        }
       
       ?>
        <!--sticky div-->    
        
        <div class="container search" >
        
        <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Product Search</a></li>
        </ol>
     
        <div class="cat_banner"><img src="images/cat-banner.png" alt="cat-banner"></div>
        <div class="cat_section">
        <div class="sort_section">
        <div class="window"><i class="glyphicon glyphicon-th-large gly_window" ></i></div>
        <div class="list"><i class="glyphicon glyphicon-th-list gly_list"></i></div>
        
        
        <p class="products12">There <?php echo $total_product;?> products</p>
        <p class="sort_by">Sort By &nbsp; </p>
        
        <div class="best-form_cat" >
        <form>
        <div class="form-group">
        
        <select class="form_control_cat form-control drop"  id="r_search_filter">
        <option>Default </option>
        <option value="l-h">Price (Low-High)</option>
        <option value="h-l">Price (High-low)</option>
        </select>
        
        </div>
        </form>
        </div>
        
        
        </div>
        
        
        
        
        <div class="window_view">
        
        <?php 
        if(!empty($total_product))
        {
        while($data_catproduct_win = mysqli_fetch_array($search_result))
        {
        ?>
        <div class="owl-item owl_item_first">
        <div class="item">
        <a href="#"></a><div class="thick-hair thick_background effect"><a href="#">
        <div class="effect_box" >
        
        
        <ul class="effect_icons">
        <a  href="#normalModal" data-toggle="modal" class="quick"><li><i class="fa fa-eye" aria-hidden="true"></i></li></a>
        <li><i class="fa fa-cart-plus" aria-hidden="true"></i></li>
        <li><i class="fa fa-clock-o" aria-hidden="true"></i></li>
        </ul>
        <ul class="effect_text">
        <li><a href="product-detail.php?product_id=<?php echo $data_catproduct_win['product_id']; ?>" >Quick View</a></li>
        <button href="#" class="wcatwishlist" value="<?php echo $data_catproduct_win['product_id'];?>">Add to<br/> Wishlist</button>
        <li><a  href="quick-checkout.php?product_id=<?php echo $data_catproduct_win['product_id']; ?>">Quick Checkout</a></li>
        </ul>
        
        
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
        <button href="#" class="btn wcat-cart" value="<?php echo $data_catproduct_win['product_id'];?>">add to cart<span><?php echo "$".$data_catproduct_win['product_price'];?></span></button>
        </div>
        </div>
        </div>
        <?php
        }
        }else{
            echo "<h3>No Result Found....</h3>";
        }
        ?>
        
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