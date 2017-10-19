<?php
        require_once('admin/config.php');
        $cat_value = $_POST['cat_value'];
        $categoryFilter=$_POST['categoryFilter'];
        
        $condition="";
        $counter=0;
        if( $cat_value=='l-h'){
            $condition=" order by product_price ASC";
        }
        if( $cat_value=='h-l'){
            $condition=" order by product_price DESC";
        }
        
        //echo '<pre>';        print_r($categoryFilter);die;
        
        if(count($categoryFilter)==1){
                           
                            $condition1="";
                            $cat_name=isset($categoryFilter[0]['category']) && $categoryFilter[0]['category']!=''?$categoryFilter[0]['category']:'';
                            $sub_cat_name=isset($categoryFilter[0]['subcategory']) && $categoryFilter[0]['subcategory']!=''?$categoryFilter[0]['subcategory']:'';;
                            $tags=isset($categoryFilter[0]['tag']) && $categoryFilter[0]['tag']!=''?$categoryFilter[0]['tag']:'';;
        
                            if($cat_name!='' && $sub_cat_name!='' && $tags!=''){
                                $condition1=" and product_cat_id = '$cat_name' and subproduct_cat_id = '$sub_cat_name' and product_tag = '$tags'";
                            }
                            if($cat_name!='' && $sub_cat_name!='' && $tags==''){
                                $condition1=" and product_cat_id = '$cat_name' and subproduct_cat_id = '$sub_cat_name'";
                            }
                            if($cat_name=='' && $sub_cat_name!='' && $tags!=''){
                                $condition1=" and subproduct_cat_id = '$sub_cat_name' and product_tag = '$tags'";
                            }
                            if($cat_name!='' && $sub_cat_name=='' && $tags!=''){
                                $condition1=" and product_cat_id = '$cat_name' and product_tag = '$tags'";
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
            
                        }else{
                                $condition1="";
                                $condition1.="AND ";
                                foreach($categoryFilter as $key=>$v){
                                        if(count($categoryFilter)==$key+1){
                                                        
                            $cat_name=isset($v['category']) && $v['category']!=''?$v['category']:'';
                            $sub_cat_name=isset($v['subcategory']) && $v['subcategory']!=''?$v['subcategory']:'';
                            $tags=isset($v['tag']) && $v['tag']!=''?$v['tag']:'';
        
                            if($cat_name!='' && $sub_cat_name!='' && $tags!=''){
                                $condition1.=" product_cat_id = '$cat_name' and subproduct_cat_id = '$sub_cat_name' and product_tag = '$tags'";
                            }
                            if($cat_name!='' && $sub_cat_name!='' && $tags==''){
                                $condition1.=" product_cat_id = '$cat_name' and subproduct_cat_id = '$sub_cat_name'";
                            }
                            if($cat_name=='' && $sub_cat_name!='' && $tags!=''){
                                $condition1.=" subproduct_cat_id = '$sub_cat_name' and product_tag = '$tags'";
                            }
                            if($cat_name!='' && $sub_cat_name=='' && $tags!=''){
                                $condition1.=" product_cat_id = '$cat_name' and product_tag = '$tags'";
                            }

                            if($cat_name!='' && $sub_cat_name=='' && $tags==''){
                                $condition1.=" product_cat_id = '$cat_name'";
                            }
                            if($cat_name=='' && $sub_cat_name!='' && $tags==''){
                                $condition1.=" subproduct_cat_id = '$sub_cat_name'";
                            }
                            if($cat_name=='' && $sub_cat_name=='' && $tags!=''){
                                $condition1.=" product_tag = '$tags'";
                            }
                                                    }else{
                                                    
                                                            
                            $cat_name=isset($v['category']) && $v['category']!=''?$v['category']:'';
                            $sub_cat_name=isset($v['subcategory']) && $v['subcategory']!=''?$v['subcategory']:'';
                            $tags=isset($v['tag']) && $v['tag']!=''?$v['tag']:'';
        
                            if($cat_name!='' && $sub_cat_name!='' && $tags!=''){
                                $condition1.=" product_cat_id = '$cat_name' and subproduct_cat_id = '$sub_cat_name' and product_tag = '$tags' and ";
                            }
                            if($cat_name!='' && $sub_cat_name!='' && $tags==''){
                                $condition1.=" product_cat_id = '$cat_name' and subproduct_cat_id = '$sub_cat_name'  and ";
                            }
                            if($cat_name=='' && $sub_cat_name!='' && $tags!=''){
                                $condition1.=" subproduct_cat_id = '$sub_cat_name' and product_tag = '$tags'  and ";
                            }
                            if($cat_name!='' && $sub_cat_name=='' && $tags!=''){
                                $condition1.=" product_cat_id = '$cat_name' and product_tag = '$tags'  and ";
                            }

                            if($cat_name!='' && $sub_cat_name=='' && $tags==''){
                                $condition1.=" product_cat_id = '$cat_name'  and ";
                            }
                            if($cat_name=='' && $sub_cat_name!='' && $tags==''){
                                $condition1.=" subproduct_cat_id = '$sub_cat_name'  and ";
                            }
                            if($cat_name=='' && $sub_cat_name=='' && $tags!=''){
                                $condition1.=" product_tag = '$tags'  and ";
                            }
                                                }
                                            }
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