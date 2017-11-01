		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/ajax-sumit.js"></script>
		<script src="js/custom.js"></script> -->
		<?php
		require_once('admin/config.php');
        $cat_value = $_POST['subcat_value'];
        
        $condition="";
         $counter=0;
         $joinTag=" inner join product_tag on (product.product_id=product_tag.pId) and ";
        $joinTagCon="";
         $categoryCounter=0;
        $subCategoryCounter=0;
        $tagCounter=0;
       if($cat_value=='all'){
            $condition.=$condition; 
        }else{
            
                       if(count($cat_value)==1){
                           
                           if(isset($cat_value[0]['category']) && $cat_value[0]['category']!=''){
                               $condition.="AND product_cat_id = '".$cat_value[0]['category']."'";  
                           }
                           
                           if(isset($cat_value[0]['subcategory']) && $cat_value[0]['subcategory']!=''){
                               $condition.="AND subproduct_cat_id = '".$cat_value[0]['subcategory']."'";  
                           }
                          
                           if(isset($cat_value[0]['tag']) && $cat_value[0]['tag']!=''){
                                $joinTagCon.="tId = '".$cat_value[0]['tag']."'";
                           }
                        }else{
                                $condition.=" ";
                                foreach($cat_value as $key=>$v){
                                        if(count($cat_value)==$key+1){
                                                        if (isset($v['category']) && $v['category'] != '') {
                                                        if($categoryCounter>=1){
                                                            $condition .= " and product_cat_id = '".$v['category']."'";
                                                        }else{
                                                            $condition .= " and product_cat_id = '".$v['category']."' ";
                                                        }
                                                        }
                                                        if (isset($v['subcategory']) && $v['subcategory'] != '') {
                                                            if($subCategoryCounter>=1){
                                                                $condition .= " and subproduct_cat_id = '".$v['subcategory'] ."'";
                                                            }else{
                                                                $condition .= " and subproduct_cat_id = '".$v['subcategory'] ."'";
                                                            }
                                                        }
                                                        if (isset($v['tag']) && $v['tag'] != '') {
                                                            if($tagCounter>=1){
                                                                $joinTagCon .= " or tId= '".$v['tag']."'";
                                                            }else{
                                                                $joinTagCon .= " tId= '".$v['tag']."'";
                                                            }
                                                        }
                                                    }else{
                                                    
                                                     if (isset($v['category']) && $v['category'] != '') {
                                                        if($categoryCounter>=1){
                                                            $condition .= " and product_cat_id = '".$v['category']."'";
                                                        }else{
                                                            $condition .= " and product_cat_id = '".$v['category']."' ";
                                                        }
                                                        $categoryCounter+=1;
                                                        }
                                                        if (isset($v['subcategory']) && $v['subcategory'] != '') {
                                                            if($subCategoryCounter>=1){
                                                                $condition .= " and subproduct_cat_id = '".$v['subcategory'] ."'";
                                                            }else{
                                                                $condition .= " and subproduct_cat_id = '".$v['subcategory'] ."'";
                                                            }
                                                            $subCategoryCounter+=1;
                                                        }
                                                        if (isset($v['tag']) && $v['tag'] != '') {
                                                            if($tagCounter>=1){
                                                                $joinTagCon .= " or tId= '".$v['tag']."'";
                                                            }else{
                                                                $joinTagCon .= " tId= '".$v['tag']."'";
                                                            }                                                          
                                                            
                                                            $tagCounter+=1;
                                                        }
                                                }
                                            }
                        }
            
        }


		// List View
                if($joinTagCon!=''){
                 $joinTag=$joinTag. '('.$joinTagCon.')';
                }else{
                  $joinTag="";
                }
                if($condition!='AND ' && $condition!=''){
                    $condition=$condition;
                }else{
                    $condition="";
                }

		$sql_catproduct= "SELECT *FROM product $joinTag WHERE status = 'Publish' $condition group by product_id";
		$run_catproduct = mysqli_query($con,$sql_catproduct) or die(mysqli_error($con));
		$total_productlist = mysqli_num_rows($run_catproduct);

		// Windows View

		$sql_winproduct= "SELECT *FROM product $joinTag WHERE status = 'Publish' $condition group by product_id";
		$cat_product_win = mysqli_query($con,$sql_winproduct) or die(mysqli_error($con));
		$total_productwin = mysqli_num_rows($cat_product_win);


		?>
		
        <div class="sort_section">
        <div class="window"><i class="glyphicon glyphicon-th-large gly_window" ></i></div>
       
        <p class="products12">There <?php echo $total_productlist;?> products</p>
      
        
        <div class="best-form_cat" >  <p class="sort_by">Sort By &nbsp; </p>
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
        while($data_catproduct = mysqli_fetch_array($run_catproduct))
        {
            $counter+=1;  
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
            $counter+=1;  
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
         if($counter==0){
            echo 'No product found';
        }
        ?>
        
        </div>
        
       



