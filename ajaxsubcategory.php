		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/ajax-sumit.js"></script>
		<script src="js/custom.js"></script> -->
		<?php
		require_once('admin/config.php');
        $subcat_value = $_POST['subcat_value'];
        
        $condition="";
        if($subcat_value=='all'){
            $condition.=$condition; 
        }else{
            
                       if(count($subcat_value)==1){
                            $condition.="AND subproduct_cat_id = '$subcat_value[0]'";  
                        }else{
                                $condition.="AND ";
                                foreach($subcat_value as $key=>$v){
                                        if(count($subcat_value)==$key+1){
                                                $condition.="subproduct_cat_id = '$v'";    
                                            }else{
                                                    $condition.="subproduct_cat_id = '$v' OR ";  
                                                }
                                            }
                        }
            
        }


		// List View

		$sql_catproduct= "SELECT *FROM product WHERE status = 'Publish' $condition";
		$run_catproduct = mysqli_query($con,$sql_catproduct) or die(mysqli_error($con));
		$total_productlist = mysqli_num_rows($run_catproduct);

		// Windows View

		$sql_winproduct= "SELECT *FROM product WHERE status = 'Publish' $condition";
		$cat_product_win = mysqli_query($con,$sql_winproduct) or die(mysqli_error($con));
		$total_productwin = mysqli_num_rows($cat_product_win);


		?>
		
        <div class="sort_section">
        <div class="window"><i class="glyphicon glyphicon-th-large gly_window" ></i></div>
        <div class="list"><i class="glyphicon glyphicon-th-list gly_list"></i></div>
        <p class="products12">There <?php echo $total_productlist;?> products</p>
        <p class="sort_by">Sort By &nbsp; </p>
        
        <div class="best-form_cat" >
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
        
        
        <div class="list_view">
        <?php 
        while($data_catproduct = mysqli_fetch_array($run_catproduct))
        {
        ?>
        <div class="list1">
        <div class="list_img">
        <img src="admin/product_pic/<?php echo $data_catproduct['product_featureimg'];?>" alt="<?php echo $data_catproduct['product_name'];?>">
        </div>
        <div class="list_detail">
        <button type="submit" class="listcat-cart" value="<?php echo $data_catproduct['product_id'];?>"><i class="fa fa-shopping-cart"></i></button>	
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
        
       



