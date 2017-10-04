		<?php
		require_once('header.php');
		$useremail = $_SESSION['UserEmail'];
		$UserId = $_SESSION['UserId'];
		$user_data = user_info($con,$useremail);
		
		if(isset($_POST['send']))
{
	   $username = mysqli_real_escape_string($con,$_POST['username']);
	   $to = mysqli_real_escape_string($con,$_POST['email']);
	   $subject = mysqli_real_escape_string($con,$_POST['subject']);
	   $msg = mysqli_real_escape_string($con,$_POST['message']);
	   $headers = "From: panchal061090@gmail.com";
	 $mail_send = mail($to,$subject,$msg,$headers);
	 if($mail_send == true)
	 {
		 $msg = "<p style='text-align: center;color: green;'>Message Sent Sucsessfully</p>";	
	 }else{
		$msg = "<p style='text-align: center;color: green;'>Message Not Sent</p>";	 
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
		<li><a href="#">Contact Form</a></li>
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
		<div class="myaccount-address">
		<?php if(isset($msg)){echo $msg;}?>
		<form method="post" action="">
		<div class="form-group">
		<label for="">Your Name (required)</label>
		<input type="text" name="username" id="username" class="form-control">
		<div class="usernameValid"></div>
		</div>
		<div class="form-group">
		<label for="">Your Email (required)</label>
		<input type="email" name="email" id="email" class="form-control">
		<div class="emailValid"></div>
		</div>
		<div class="form-group">
		<label for="">Subject</label>
		<input type="text" name="subject" class="form-control">
		</div>
		<div class="form-group">
		<label for="">Your Message</label>
		<textarea class="form-control" name="message" rows="7"></textarea>
		</div>
		<div class="form-group">
		<button type="submit" name="send" class="send-btn">send</button>
		</div>
		</form>

		</div><!--address-->
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