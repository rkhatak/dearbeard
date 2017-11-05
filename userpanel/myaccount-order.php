<?php
require_once('header.php');
$useremail = $_SESSION['UserEmail'];
$UserId = $_SESSION['UserId'];
$user_data = user_info($con,$useremail);

// Order Information

$order_data = order_info($con,$UserId);



?>
<!--sticky div-->    
	<!--Account-->
    <div id="myaccount">
    	<div class="container">
        	<div class="row">
            	<ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">My Orders</a></li>
                </ol>
                
                <div class="login-top">
                	<div class="row">
                    	<div class="col-md-3">
                            <div class="col-left">
								<p><?php if(isset($_GET['error'])){echo $_GET['error']; }?></p>
                            	<form name="profile" action="profile-upload.php" id="formpic" method="POST"  enctype=	"multipart/form-data" >
                                	<div class="pic_button"><img src="profile_pic/<?php echo $user_data['Userpic'];?>" alt="person" class="img-circle"></div>
                                    <input type="file" name="photo" id="my_file" style="display: none;" />
                                    <input type="text" name="id" value="<?php echo $UserId; ?>" style="display: none;" />
									
                                    <h6><?php echo $user_data['UserEmail'];?></h6>
                                </form>
                             </div>
                            
                            <?php require('menu.php');?><!--dashboard-->
                            
                        </div>
                        <div class="col-md-9">
                         <div class="order-detail">
                            	<div class="que">
                                	<div class="que-one">
                                    	order
                                    </div>
                                    <div class="que-two">
                                    	date
                                    </div>
                                    <div class="que-three">
                                    	status
                                    </div>
                                    <div class="que-four">
                                    	total
                                    </div>
                                    <div class="que-five">
                                    	actions
                                    </div>
									</div>
									<?php 
									while($orders = mysqli_fetch_array($order_data))
									{
									?>
                                    <div class="que">
                                        <div class="common-que">
                                            <a href="#"><?php echo $orders['order_id'];?></a>
                                        </div>
                                        <div class="common-que">
                                           <?php echo $orders['order_date'];?>
                                        </div>
                                        <div class="common-que">
                                            <?php echo $orders['order_status'];?>
                                        </div>
                                        <div class="common-que">
                                           <?php echo $orders['total_amount'];?>
                                        </div>
                                        <div class="common-que">
                                            <a href="404.php?order_id=<?php echo $orders['order_id']; ?>"><button type="submit" class="view">view</button></a>
                                        </div>
                                    </div>
                                    <?php
									}
									?>
                                    <div class="clearfix"></div>
                                </div>					  

                          </div>
                           <button type="submit" class="next">Next</button>
                        </div>
		            </div>
                </div>
                
        </div><!--container-->
   </div><!--account-->

   <div class="clearfix"></div>
	
    <!--footer-->
	<?php
		require('footer.php');
		?>  