		<?php
		require_once('header.php');
		
		if(isset($_POST['login_user']))
		{
                $useremail = mysqli_real_escape_string($con,$_POST['useremail']);
		$password = md5(mysqli_real_escape_string($con,$_POST['pwd']));
		$login_arrays = array( 'UserEmail' => $useremail,
		'UserPassword' => $password,'Userstatus'=>'Active'
		);

		$login_result = loginuser($con,$login_arrays);

		if($login_result == 1)
		{
		$sql_user = "SELECT *FROM users WHERE UserEmail = '$useremail' ";
		$run_user = mysqli_query($con,$sql_user) or die(mysqli_error($con));
		$data_user = mysqli_fetch_array($run_user) ;
		$UserEmail = $data_user['UserEmail'];
		$UserID = $data_user['UserID'];

		$_SESSION['UserEmail'] = $UserEmail;
		$_SESSION['UserID'] = $UserID;

		//header('Location: checkout.php'); 
		echo "<script>window.location ='checkout.php';</script>";

		}else{

		$msg = "<p style='text-align: center;color: red;'>Please Create Your Account</p>";
		}
		}
		?>

		<!--sticky div-->    
		<!--registration-->
		<div id="login">
		<div class="container">
		<div class="row">
		<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Login</a></li>
		</ol>
		<div class="login-box">
		<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
		<?php
		if(isset($msg))
		{
			echo $msg ;
		}
		?>
		<div class="login-part">
		<form name="login-form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="useremail" id="useremail" class="form-control" placeholder="Email">
		<div class="useremailValid"></div>
		</div>
		<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password">
		<div class="passwordValid"></div>
		</div>
		<div class="form-group">
		<button type="submit" name="login_user" class="login-button">login</button>
		<a href="forgot-password.php" class="forgot">forgot password ?</a>

		</div>
		</form>
		<div class="clearfix"></div>
		<h6>New to DEARBEARD account</h6>
		<a href="registration.php"><button type="submit" class="registration-link">Create Your DEARBEARD Account</button></a>
		</div>
		</div>

		</div>
		</div><!--login box-->
		</div>
		</div>
		</div>

		<div class="clearfix"></div>

		<!--footer-->
		<?php
		require('footer.php');
		?>