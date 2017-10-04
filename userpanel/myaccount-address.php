		<?php
		require_once('header.php');
		$useremail = $_SESSION['UserEmail'];
		$UserId = $_SESSION['UserId'];
		$user_data = user_info($con,$useremail);
		$user_shipdata = usership_info($con,$UserId);
		?>
		<!--sticky div-->    
		<!--Account-->
		<div id="myaccount">
		<div class="container">
		<div class="row">
		<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Edit Address</a></li>
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

		</div><!--col-sm-3-->
		<div class="col-sm-9">
		<div class="edit-address">
		The following addresses will be used on the checkout page by default.
		<div class="row">
		<div class="col-sm-6">
		<div class="billing">
		<h4>billing address</h4>
		<p>
		<?php echo $user_data['UserAddress']."<br/>".$user_data['UserCity']."<br/>".$user_data['UserState']."<br/>".$user_data['UserState']."-".$user_data['UserZip'].",".$user_data['UserCountry'];?>
		</p>
		<a href="billing-address.php" class="edit-one">Edit</a>
		</div><!--billing-->
		</div><!--col-sm-6-->
		<div class="col-sm-6">
		<div class="billing">
		<h4>shipping address</h4>
		<?php echo $user_shipdata['ShipingAddress']."<br/>".$user_shipdata['ShipingCity']."<br/>".$user_shipdata['ShipingState']."<br/>".$user_shipdata['ShipingState']."-".$user_shipdata['ShipingZip'].",".$user_shipdata['ShipingCountry'];?>
		<a href="shipping-address.php" class="edit-two">Edit</a>
		</div><!--billing-->
		</div><!--col-sm-6-->
		</div><!--row-->
		</div><!--edit address-->
		</div><!--col-sm-9-->
		</div><!--row-->
		</div><!--login top-->

		</div><!--container-->
		</div><!--account-->

		<div class="clearfix"></div>

		<!--footer-->
		<?php
		require('footer.php');
		?>   