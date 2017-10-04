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
                  <li><a href="#">My Content</a></li>
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
                            
                        </div><!--col-left-3-->
                        <div class="col-sm-9">
                            <div class="content-account">
                            	<h3>The Lorem Ipsum</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s.</p>
                            </div><!--content-account-->
        	        	</div><!--col-sm-9-->
            		</div><!--row-->
        		</div><!--login-top-->
                
        </div><!--container-->
   </div><!--account-->
</div><!--myaccount-->
   <div class="clearfix"></div>
	
    <!--footer-->
	<?php
		require('footer.php');
		?>     