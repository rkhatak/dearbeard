<?php
require('config.php');
require('function.php');
session_start();
if(isset($_POST['submit']))
{
	$username = $_POST['uname'];
	$password = md5($_POST['psw']);
	$login_arrays = array( 'username' => $username,
						   'password' => $password
						   );
		
	$login_result = loginuser($con,$login_arrays);
	
	if($login_result == 1)
	{
		$_SESSION['uname'] = $username;
		$sql_admin = "SELECT user_id FROM admininfo WHERE username = '$username' ";
		$run_admin = mysqli_query($con,$sql_admin) or die(mysqli_error($con));
		$data_admin = mysqli_fetch_array($run_admin) ;
		$id = $data_admin['user_id'];
		$_SESSION['id'] = $id;
		header('Location: admin.php'); 
		
	}else{
		$error = "User Not Exist";
		header('Location: index.php?error='.$error);
	}
	
	
	
}

?>