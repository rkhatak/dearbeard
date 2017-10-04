<?php
require_once('header.php');
if(isset($_POST['reset-password']))
{
 $userid = base64_decode($_POST['pwd']);
 
 $new_pwd = md5(mysqli_real_escape_string($con,$_POST['new_pwd']));
 $confirm_pwd = md5(mysqli_real_escape_string($con,$_POST['confirm_pwd']));
 if($new_pwd == $confirm_pwd )
 {
  $sql_pwd = "UPDATE users SET UserPassword = '$new_pwd' WHERE UserID = '$userid'";
  $result = mysqli_query($con,$sql_pwd) or die(mysqli_error($con));

  if($result == true)
  {
	  $msg = "<h5 style='text-align: center;color: green;'>Your Password Updated</h5>";
  }	 
  }else{
	 
	$msg = "<h5 style='text-align: center;color: green;'>Your Passoword Not Match</h5>"; 
 }
}

?>
<!--sticky div-->    
    <!--blog-->	
	<div id="blog">
    	<div class="container">
        	<div class="row">
            	<ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Reset Your Password</a></li>
                </ol>
                <div class="col-sm-8 col-sm-offset-2">
                    
                	<?php
                	if(isset($msg))
                	{
                	 echo $msg ;   
                	}
                	
                	if(isset($_GET['rpwd']))
                	{
                	?>
                    <div class="forgot-pwd">
                        <h4>Reset Your Password ?</h4>
                        
                        <form name="reset-password" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                
                                <input type="hidden" class="form-control" name = "pwd" value="<?php echo $_GET['rpwd']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="np">Enter Your New Password</label>
                                <input type="password" name="new_pwd" class="form-control" id="resetnpwd">
                                <div class="resetnpwdValid"></div>
                            </div>
                            <div class="form-group">
                                <label for="cnp">Enter Your Confirm Password</label>
                                <input type="password" name="confirm_pwd" class="form-control" id="resetcpwd">
                                <div class="resetcpwdValid"></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="reset-password" class="reset-login-password" value="Change Password">
                            </div>
                        </form>
                    </div>
                    <?php
                	}
                    ?>
                </div>    
            </div>
        </div>
    </div>
    <!--blog-->
    <div class="clearfix"></div>
<!--footer-->
		<?php
		require('footer.php');
		?>