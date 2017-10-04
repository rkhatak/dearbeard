<?php
require_once('header.php');
$useremail = $_SESSION['UserEmail'];
$UserId = $_SESSION['UserId'];
$user_data = user_info($con,$useremail);

?>
<!--sticky div-->    
	<!--Account-->
    <div id="myaccount">
    	<div class="container">
        	<div class="row">
            	<ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">My Account</a></li>
                </ol>
                
                <div class="login-top">
                	<div class="row">
                    	<div class="col-sm-3">
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
                        <div class="col-sm-9">
                            <div class="col-right">
                            	<div class="download-status">
                                	<i class="fa fa-window-maximize" aria-hidden="true"></i> NO DOWNLOADS AVAILABLE YET.
									<a href="../products.php"><button type="submit" class="shop-btn">go shop</button></a>
                                </div>
                            </div>
                        </div>
		            </div>
                </div>
                <div class="login-middle">
                	<div class="row">
                    	<div class="col-sm-3">
                        	
                        </div>
                        <div class="col-sm-9">
                        	<div class="middle-content">
                            	 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>
                </div><!--login middle-->
        </div><!--container-->
   </div><!--account-->

   <div class="clearfix"></div>
	
    <!--footer-->
<?php
		require('footer.php');
		?>  