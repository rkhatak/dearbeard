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
                            <div class="signout">
                            	<p>Hello <?php echo $user_data['UserEmail'];?> (not <?php echo $user_data['UserEmail'];?>? <a href="logout.php" class="out"> Sign out </a>)</p>
                                
                                <p>From your account dashboard you can view your <a href="myaccount-order.php" class="out">recent orders</a>, manage your <a href="myaccount-address.php" class="out">shipping and billing addresses </a> and <a href="myaccount-account.php" class="out">edit your password and account details</a>.</p>
                                
                            </div><!--signout-->
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