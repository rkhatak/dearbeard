        <?php
        // Call header
        
        require_once('header.php');
        
        /* Slider Code */
        $run_slider = showslider($con);
        
        /* Static Slider Code */
        $run_slider2 = showstaticslider($con);
        
        /*  Product Code */
        
        $run_product = showproduct($con);
        
        // Carousel Slider
        
        $run_carousel = showcarousel($con);
        
        // subscribe email
        
        $run_subscribe = subscribecontent($con);
        
        // Signup Sidebar
        
        $run_signup = signupcontent($con);
        
        // Logo Sidebar
        
        $run_logo = logocontent($con);
        
        // Page Content
        if($pagename = 'Home Page')
        {
        $page_content = pagecontent($con,$pagename);
        }
        
        // Subscribe Email
        
        if(isset($_POST['email_button']))
        {
        $email = $_POST['sub_email'];
        $result = emailsubscribe($con,$email);
        if($result == TRUE)
        {
        echo "<script>alert('Thanks For Subscription')</script>";
        }else{
        echo "<script>alert('Try Again For Subscription')</script>";
        }
        }
        
        // Category
        
        $sql_list = "SELECT DISTINCT cat_name FROM category";
        $run_list = mysqli_query($con,$sql_list) or die(mysqli_error($con));
        
        //Sub Category
        
        // Category
        
        $sql_listsub = "SELECT DISTINCT sub_cat_name FROM category";
        $run_listsub = mysqli_query($con,$sql_listsub) or die(mysqli_error($con));
        
        ?>
        
        
        
        <!--sticky div-->
        <!--banner-slider-->
        <div id="banner-slider">
        <div id="banner-move" class="owl-carousel owl-theme first">
        <?php
        while($data_slider = mysqli_fetch_array($run_slider))
        {
        if($data_slider['button_status'] == 'Active')
        {
        ?>
        <div class="item">
        <a href="<?php echo $data_slider['slider_link'];?>">
        <img src="admin/slider_pic/<?php echo $data_slider['slider_img'];?>" alt="<?php echo $data_slider['button_title'];?>">
        <div class="caption-overlay">
        <h2><?php echo $data_slider['button_title'];?></h2>
        </div>
        <div class="overlay"></div>
        </a>
        </div>	
        <?php
        }
        }
        ?>   
        </div>
        </div>
        <!--banner-slider-->
        <div class="clearfix"></div>
        
        <!--banner bottom bg-->
        <?php
        $data_backslider = mysqli_fetch_array($run_slider2);
        
        ?>
        <div id="banner-bottom" style="background:url(images/<?php echo $data_backslider['slider_img'];?>) no-repeat center top;background-size:cover;min-height:283px;position:relative;">
        <!--<div class="overlay"></div>-->
        <a href="<?php echo $data_backslider['slider_link'];?>">
        <div class="caption-overlay">
        <h3><?php echo $data_backslider['button_title'];?></h3>
        </div>
        </a>
        </div>
        <!--banner bottom bg-->
        <div class="clearfix"></div>
        <!--best solution-->
        <section id="best-solution">
        <h1><?php echo $page_content['page_title'];?></h1>
        <div class="divider"></div>
        <p class="help"><?php echo $page_content['content'];?></p>
        <!--form-carousel-->
        <div class="form-carousel">
        <div class="col-left">
        <div class="best-form">
        <form name="product_search" method="GET" action="product-serach.php">
        <div class="form-group">
        <select name="category" class="form-control drop">
        <option value="">SELECT YOUR HAIR TEXTURE</option>
        <?php
        while($data_list = mysqli_fetch_array($run_list))
        {
        ?>
        <option value="<?php echo $data_list['cat_name'];?>"><?php echo $data_list['cat_name'];?></option>
        <?php
        }
        ?>
        
        </select>
        </div>
        <div class="form-group">
        <select name="subcategory" class="form-control drop">
        <option value="">SELECT YOUR BEARD TEXTURE</option>
        <?php
        while($data_listsub = mysqli_fetch_array($run_listsub))
        {
        ?>
        <option value="<?php echo $data_listsub['sub_cat_name'];?>"><?php echo $data_listsub['sub_cat_name'];?></option>
        <?php
        }
        ?>
        </select>
        </div>
        <button type="submit"  class="form-submit">search product</button>
        </form>
        </div>
        </div>
        <div class="col-right">
        <div id="form-slider" class="owl-carousel owl-theme">
        <?php
        while($data_product = mysqli_fetch_array($run_product))
        {
        ?>
        <div class="item window_view">
        <div class="thick-hair thick_background effect">
        <div class="effect_box">
        <ul class="effect_icons">
                <li><a href="#normalModal" data-toggle="modal" class="quick"><i class="fa fa-eye" aria-hidden="true"></i><span>Quick View</span></a></li>
                <li><i class="fa fa-cart-plus" aria-hidden="true"></i><button href="#" class="wcatwishlist" value="<?php echo $data_catproduct_win['product_id'];?>">Add to<br/> Wishlist</button></li>
                <li><a  href="quick-checkout.php?product_id=<?php echo $data_catproduct_win['product_id']; ?>"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Quick Checkout</span></a></li>
                </ul>
        
        </div>
        <h6><?php echo $data_product['product_name'];?></h6>
        <div class="shampoo-image">
        <img src="admin/product_pic/<?php echo $data_product['product_featureimg'];?>" alt="<?php echo $data_product['product_name'];?>">
        </div>
        <p><?php echo $data_product['short_description'];?></p>
        <ul class="ratings">
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/grey-star.png" alt="star"></li>
        </ul>
        <button href="#" class="btn home-cart" value="<?php echo $data_product['product_id'];?>">add to cart<span><?php echo "$".$data_product['product_price'];?></span></button>
        </div>
        </div>
        <?php
        }
        ?>
        
        </div><!--fomr slider-->
        </div>
        <div class="clearfix"></div>
        </div>
        <!--form-carousel-->
        </section>
        <!--best solution-->
        <div class="clearfix"></div>
        <!--tagdear-->	
        <div id="tag-dear">
        <div class="container">
        <h2>tag dear beard in real life #dearbeard</h2>
        <div id="tag-slider" class="owl-carousel owl-theme">
        <?php while($data_carousel = mysqli_fetch_array($run_carousel))
        {
        ?>
        <div class="item"><a href="#"><div class="real-life"><img src="admin/photo/<?php echo $data_carousel['minislider_image']?>" alt="tag"></div></a></div>
        <?php
        }
        ?>    
        </div>
        <div class="area">
        <!--<a href="#" class="area-btn"><img src="images/camera-icon.png" alt="camera">add a photo</a>-->
        <form name="photo" action="photo-upload.php" id="formphoto" method="POST"  enctype=	"multipart/form-data" >
        <div class="new_Btn"><i class="fa fa-camera" aria-hidden="true"></i><span>add a photo</span></div>
        <input id="html_btn" name="photo" type="file" />
        </form>
        </div>
        </div>
        </div>
        <!--tagdear-->	
        <div class="clearfix"></div>
        <!--subscribe area-->
        <div id="subscribe-area">
        <div class="container">
        <div class="col-left">
        <?php
        $subscribe_data = mysqli_fetch_array($run_subscribe);
        ?>
        <h4><?php echo $subscribe_data['subscontent_title'];?></h4>
        <p><?php echo $subscribe_data['subscontent_content'];?></p>
        
        <div class="email-form">
        <form name="subscribe-email" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="form-group">
        <input type="email" name="sub_email" class="form-control email" placeholder="Enter your email address" required>
        </div>
        <button type="submit" name="email_button" class="email-button"></button>
        </form>
        </div>
        
        </div>
        <div class="col-right">
        <?php 
        $signup_data = mysqli_fetch_array($run_signup);
        
        ?>
        <h5><?php echo $signup_data['sidebar_title'];?></h5>
        <div class="col-sub-left">
        <p><?php echo $signup_data['sidebar_desc'];?></p>
        <a href="#" class="button-signup">sign up</a>
        </div><!--col-sub-left-->
        <div class="col-sub-right">
        <img src="admin/sidebar_pic/<?php echo $signup_data['sidebar_imgname'];?>" alt="replenishment">
        </div>
        </div>
        </div>
        </div>
        <!--subscribe area-->
        <div class="clearfix"></div>
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