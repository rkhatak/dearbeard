        <?php
        // Call header
        require_once('header.php');
        $useremail = $_SESSION['UserEmail'];
        $UserId = $_SESSION['UserId'];
        $sql_wishlist = "SELECT *FROM wishlist WHERE wishlist_uesrid = '$UserId'";
        $run_wishlist = mysqli_query($con,$sql_wishlist) or die(mysqli_error($con));
        ?>
        
        <!--sticky div-->    
        
        <div id="wishlist" >
        <div class="container">
        
        <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Wishlish</a></li>
        
        </ol>
        <h3>My Wishlist</h3>
        <button class="clear_wishlist" data-toggle="modal" data-target="#clearModal" data-backdrop="false">Clear All</button>
        <div id="clearModal" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Clear This Wishlist?</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
        <button type="button" class="clear_wishlist2 wish_yes" data-dismiss="modal" onclick="clearWishlist()">Yes</button>
        <button type="button" class="clear_wishlist2" data-dismiss="modal" autofocus>No</button>
        </div>
        </div>
        
        </div>
        </div>
        </div>
        
        
        <div class="container">
        <!--ekta 22-09-17-->
        <div class="wish_view">
        <?php 
        while($data_wishlist = mysqli_fetch_array($run_wishlist))
        {
        ?>
        <div class="owl-item owl_item_first wish_items"><div class="item">
        <a href="#"></a><div class="thick-hair thick_background effect"><a href="#">
        <div class="effect_box" >
        
        
        <ul class="effect_icons">
        <a  href="#normalModal" data-toggle="modal" class="quick"><li><i class="fa fa-eye" aria-hidden="true"></i></li></a>
        <a class="remove_wish"><li><i class="fa fa-trash" aria-hidden="true"></i></li></a>
        <li><i class="fa fa-clock-o" aria-hidden="true"></i></li>
        </ul>
        <ul class="effect_text">
        <li><a href="product-detail.php?product_id=<?php echo $data_wishlist['wishlist_product_id']; ?>" >Quick View</a></li>
        <button href="#" class="wcatwishlist" value="<?php echo $data_wishlist['wishlist_product_id'];?>">Add to<br/> Wishlist</button>
        <li><a  href="quick-checkout.php?product_id=<?php echo $data_wishlist['wishlist_product_id']; ?>">Quick Checkout</a></li>
        </ul>
        </div>
        <h6><?php echo $data_wishlist['wishlist_product'];?></h6>
        <div class="shampoo-image">
        <img src="../admin/product_pic/<?php echo $data_wishlist['wishlist_product_img'];?>" alt="<?php echo $data_wishlist['wishlist_product'];?>">
        </div>
        <p><?php echo $data_wishlist['wishlist_short_description'];?></p>
        <p><?php echo $data_product['short_description'];?></p>
        <?php
            $sql_avrageviews= "SELECT AVG(review_value) AS total FROM product_review WHERE product_id='".$data_wishlist['wishlist_product_id']."' AND review_status = 'Publish'";
            $run_avrageviews = mysqli_query($con,$sql_avrageviews) or die(mysqli_error($con));
            $review_value = mysqli_fetch_array($run_avrageviews);
            $total_avrege = $review_value['total'];
        ?>
        <ul>
        <li><input type="text" disabled="true" name="rating_value"  id="input-21b" value="<?php echo $total_avrege;?>" class="rating"></li>
        </ul>
        </a><button href="#" class="btn wcat-cart" value="<?php echo $data_wishlist['wishlist_product_id'];?>">add to cart<span><?php echo "$".$data_wishlist['wishlist_product_price'];?></span></button>
        </div>
        </div>
        </div>
        <?php
        }
        ?>
        
        </div>
        <!--ekta 22-09-17-->
        <div class="clear_message">
        <p>There is no item in your wishlist.</p>
        </div>
        </div>
        </div>
        
        
        
        <div class="clearfix"></div>
        
        <!--footer-->
        <?php
        require_once('footer.php');
        ?>