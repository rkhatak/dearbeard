<?php
session_start();
require('function.php');
if(isset($_POST['subscribe'])) 
{
$email = mysqli_real_escape_string($con,$_POST['email']);	
if(filter_var($email, FILTER_VALIDATE_EMAIL))
{
	$total_email = countemail($con,$email);
	if($total_email >=1)
	{
	echo "You Are Allready Subscribe";	
	}
	else{
		
	$result = subscribemail($con,$email);
	if($result == true)
	{
	echo "You Are Subscribe";	
	}else{
		
		echo "Please Enter Valid Email";
		
	}
		
	}
	
}else{
	
	echo "Please Enter Valid Email";
}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input name="email" class="email" type="text" placeholder="Enter your email address ...">
    <button type="submit" class="btn_email" name="subscribe">Subscribe</button>
</form>