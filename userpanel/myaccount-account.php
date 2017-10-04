		<?php
		require_once('header.php');
		$useremail = $_SESSION['UserEmail'];
		$UserId = $_SESSION['UserId'];
		$user_data = user_info($con,$useremail);

		if(isset($_POST['edit_acount']))
		{
		$f_name = mysqli_real_escape_string($con,$_POST['f_name']);
		$l_name = mysqli_real_escape_string($con,$_POST['l_name']);
		$passowrd = $_POST['passowrd'];
		$id = $_POST['id'];
		$c_passowrd = md5(mysqli_real_escape_string($con,$_POST['c_passowrd']));
		$n_passowrd = md5(mysqli_real_escape_string($con,$_POST['n_passowrd']));
		$r_passowrd = md5(mysqli_real_escape_string($con,$_POST['r_passowrd']));
		if($n_passowrd == $r_passowrd )
		{
		if($passowrd == $c_passowrd )
		{
		$user_editinfo = array(
		'UserFirstName' => $f_name,	 
		'UserLastName' => $l_name,	 
		'UserPassword' => $n_passowrd,	 
		);
		$result = update_users($con,$id,$user_editinfo);
		if($result == true)
		{
		$msg = "<p style='text-align: center;color: green;'>Your Account Updated</p>";
		}	 

		}else{
		$msg = "<p style='text-align: center;color: red;'>Please Enter Correct Old Password</p>"; 
		}
		}else{

		$msg = "<p style='text-align: center;color: red;'>Password Not Match</p>"; 
		}
		}

		?>
		<!--sticky div-->    
		<!--Account-->
		<div id="myaccount">
		<div class="container">
		<div class="row">
		<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Edit Account</a></li>
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
		<div class="col-sm-9">
		<div class="col-right">
		<div class="form-edit">
		<?php if(isset($msg))
		{
			echo $msg;
		}
		?>
		<form name="rdit-acount" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<div class="row">
		
		<div class="col-sm-6">
		<div class="form-group">
		<label for="firstname">First Name*</label>
		<input type="text" name="f_name" id="f_name" class="form-control" value="<?php echo $user_data['UserFirstName']; ?>">
		</div>
		<div class="f_nameValid"></div>
		</div>     
		<div class="col-sm-6">
		<div class="form-group">
		<label for="lastname">Last Name*</label>
		<input type="text" name="l_name" id="l_name" class="form-control" value="<?php echo $user_data['UserLastName']; ?>">
		</div>
		<div class="l_nameValid"></div>
		</div>
		<div class="col-sm-12">
		<div class="form-group">
		<label for="email">Email Address*</label>
		<input type="email"  class="form-control"  value="<?php echo $user_data['UserEmail']; ?>" readonly>
		</div>
		</div>
		<div class="col-sm-12">
		<div class="form-group">
		<label for="currentpassword">Current password (leave blank to leave unchanged)</label>
		<input type="password" name="c_passowrd" id="c_passowrd" class="form-control">
		</div>
		<div class="c_passowrdValid"></div>
		</div>
		<div class="col-sm-12">
		<div class="form-group">
		<label for="newpassword">New password (leave blank to leave unchanged)</label>
		<input type="password" name="n_passowrd" id="n_passowrd" class="form-control">
		</div>
		<div class="n_passowrdValid"></div>
		</div>
		<div class="col-sm-12">
		<div class="form-group">
		<label for="confirmpassword">Confirm New password</label>
		<input type="password" name="r_passowrd" id="r_passowrd" class="form-control">
		</div>
		<div class="r_passowrdValid"></div>
		</div>
		<div class="col-sm-12">
		<div class="form-group">
		<input type="hidden" name="passowrd" class="form-control" value="<?php echo $user_data['UserPassword']; ?>">
		<input type="hidden" name="id" class="form-control" value="<?php echo $user_data['UserID']; ?>">
		</div>
		<div class="form-group">
		<button type="submit" name="edit_acount"  class="save-btn">save changes</button>
		</div>
		</div>
		</div>
		</form>       
		</div>
		</div>
		</div>
		</div>
		</div>

		</div><!--container-->
		</div><!--account-->
		</div><!--myaccount-->
		<div class="clearfix"></div>
		<!--footer-->
		<?php
		require('footer.php');
		?>    