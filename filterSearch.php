<?php
        require_once('admin/config.php');
        $cat_value = $_POST['cat_value'];
        $cat_name=isset($_POST['category'])?$_POST['category']:'';
        $sub_cat_name=isset($_POST['subcategory'])?$_POST['subcategory']:'';
        $tags=isset($_POST['tag'])?$_POST['tag']:'';
        $condition="";
        if( $cat_value=='l-h'){
            $condition=" order by product_price ASC";
        }
        if( $cat_value=='h-l'){
            $condition=" order by product_price DESC";
        }
        

        $condition1="";
        
            if($cat_name!='' && $sub_cat_name!='' && $tags!=''){
                $condition1=" and product_cat_id = '$cat_name' OR subproduct_cat_id = '$sub_cat_name' OR product_tag = '$tags'";
            }
            if($cat_name!='' && $sub_cat_name!='' && $tags==''){
                $condition1=" and product_cat_id = '$cat_name' OR subproduct_cat_id = '$sub_cat_name'";
            }
            if($cat_name=='' && $sub_cat_name!='' && $tags!=''){
                $condition1=" and subproduct_cat_id = '$sub_cat_name' OR product_tag = '$tags'";
            }
            if($cat_name!='' && $sub_cat_name=='' && $tags!=''){
                $condition1=" and product_cat_id = '$cat_name' OR product_tag = '$tags'";
            }
        
            if($cat_name!='' && $sub_cat_name=='' && $tags==''){
                $condition1=" and product_cat_id = '$cat_name'";
            }
            if($cat_name=='' && $sub_cat_name!='' && $tags==''){
                $condition1=" and subproduct_cat_id = '$sub_cat_name'";
            }
            if($cat_name=='' && $sub_cat_name=='' && $tags!=''){
                $condition1=" and product_tag = '$tags'";
            }
        $condition= $condition1.$condition;     

	 $sql_catproduct= "SELECT *FROM product WHERE status = 'Publish' $condition";
		$run_catproduct = mysqli_query($con,$sql_catproduct) or die(mysqli_error($con));
        $total_productlist = mysqli_num_rows($run_catproduct);		

		?>
        <div>
        
        <?php 
        while($data_catproduct_win = mysqli_fetch_array($run_catproduct))
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
        <ul class="ratings">
        <li><img src="images/grey-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        <li><img src="images/yellow-star.png" alt="star"></li>
        </ul>
        </a>
        <button href="#" class="btn wcat-cart" value="<?php echo $data_catproduct_win['product_id'];?>">add to cart<span><?php echo "$".$data_catproduct_win['product_price'];?></span></button>
        </div>
        </div>
        </div>
        <?php
        }
        ?>
        
        </div>