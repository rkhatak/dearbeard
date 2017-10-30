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
        
        // Show Category
        
        $category = showcategory($con);
        
        // Show Sub Category
        
        $subcategory = showsubcategory($con);
        
         $tags = showtags($con);
        
       ?>
        <!--sticky div-->    
        
        <div class="container cat-main" >
        
        <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Product</a></li>
        </ol>
        
        
        <div class="left_sec  r_left_sec">
        
        <p class="left_heading">FILTER BY category</p>
        <hr class="left_hr">
        
        <button class="clear_all" onclick="clearAll()"><i class="glyphicon glyphicon-remove gly_clear"></i> Clear All</button>
        
        <?php
        while($cat_name = mysqli_fetch_array($category))
        {
        ?>
        <label class="control control--checkbox first_check"><?php echo $cat_name['cat_name'];?>
        <input type="checkbox" name="cat_name" value="<?php echo $cat_name['cat_name'];?>" class="category_name" >
        <div class="control__indicator"></div>
        </label>
        <?php
        }
        ?>
        
        <p class="left_heading left_sec_heading">filter by TAGS</p>
        <hr class="left_hr">
        
        <?php
        while($subcat_name = mysqli_fetch_array($tags))
        {
        ?>
        <label class="control control--checkbox"><?php echo $subcat_name['name'];?>
        <input type="checkbox" name="tags" value="<?php echo $subcat_name['id'];?>" class="tags">
        <div class="control__indicator"></div>
        </label>
        <?php
        }
        ?>
        
        <p class="left_heading left_third_heading">Filter by Sub-category</p>
        <hr class="left_hr">
        
        <?php
        while($subcat_name = mysqli_fetch_array($subcategory))
        {
        ?>
        <label class="control control--checkbox"><?php echo $subcat_name['sub_cat_name'];?>
        <input type="checkbox" name="sub_cat_name" value="<?php echo $subcat_name['sub_cat_name'];?>" class="sub_cat_name">
        <div class="control__indicator"></div>
        </label>
        <?php
        }
        ?>
        </form>
        
        
        </div>
        
        <div class="right_sec">
        <div class="cat_banner_img"></div>
        <div class="cat_section">
        <div class="sort_section">
        <div class="window"><i class="glyphicon glyphicon-th-large gly_window" ></i></div>
        
        
        
   
      
        
        <div class="best-form_cat"><p class="sort_by">Sort By &nbsp; </p>
        <form>
        <div class="form-group">
        
       <select class="form_control_cat form-control drop" id="r_product_filter">
        <option>Default </option>
        <option value="l-h">Price (Low-High)</option>
        <option value="h-l">Price (High-low)</option>
        </select>
        
        </div>
        </form>
        </div>
        
        
        </div>
        
        
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
        <button type="submit" class="listcat-cart" value="<?php echo $data_catproduct['product_id'];?>"><i class="fa fa-shopping-cart"></i></button>	
        <h5><?php echo $data_catproduct['product_name'];?></h5>
        <h3><?php echo "$".$data_catproduct['product_price'];?></h3>
        
        <ul class="ratings" >
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/grey-star.png" alt="star"></li>        
        </ul>
        <?php  if($data_catproduct['short_description']){?>
        <p><?php echo $data_catproduct['short_description'];?></p>
        <?php } ?>
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
        <div class="thick-hair thick_background effect">
       <!--abc-->
        
        <div class="effect_box">
        <ul class="effect_icons">
                <li><a href="#normalModal" data-toggle="modal" class="quick"><i class="fa fa-eye" aria-hidden="true"></i><span>Quick View</span></a></li>
                <li><i class="fa fa-cart-plus" aria-hidden="true"></i><button href="#" class="wcatwishlist" value="<?php echo $data_catproduct_win['product_id'];?>">Add to<br/> Wishlist</button></li>
                <li><a  href="quick-checkout.php?product_id=<?php echo $data_catproduct_win['product_id']; ?>"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Quick Checkout</span></a></li>
                </ul>
        
        </div>
        
        <!--abc-->
        <h6><a  href="product-detail.php?product_id=<?php echo $data_catproduct_win['product_id']; ?>" data-toggle="modal" class="quick"><?php echo $data_catproduct_win['product_name'];?></a></h6>
        <div class="shampoo-image">
        <img src="admin/product_pic/<?php echo $data_catproduct_win['product_featureimg'];?>" alt="<?php echo $data_catproduct_win['product_name'];?>">
        </div>
								<?php if($data_catproduct_win['short_description'] !=''){ ?>
        <p><?php echo $data_catproduct_win['short_description'];?></p>
								<?php } ?>
        <ul class="ratings">
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/grey-star.png" alt="star"></li>
        </ul>
        
        <button href="#" class="btn wcat-cart" value="<?php echo $data_catproduct_win['product_id'];?>">add to cart<span><?php echo "$".$data_catproduct_win['product_price'];?></span></button>
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
								
								<!--pop up-->
                <div class="modal fade product_view" id="normalModal">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Thick Hair Shampoo</h3>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img src="images/camera.jpg" class="modal-pic">
                    </div>
                    <div class="col-md-6 product_content">
                        <h4>Product Id: <span>51526</span></h4>
                        <div class="rating">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            (10 reviews)
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        <h3 class="cost"><span class="glyphicon glyphicon-usd"></span> 75.00</h3>
                        
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <button type="button" class="btn"><i class="fa fa-cart-plus" aria-hidden="true"></i>Add To Cart</button>
                            
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <!--pop up-->
        
        <!--footer-->
        <?php
        require('footer.php');
        ?>