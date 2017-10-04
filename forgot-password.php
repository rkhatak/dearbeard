<?php
require_once('header.php');
if(isset($_POST['forgot-pwd']))
{
    $useremail = mysqli_real_escape_string($con,$_POST['useremail']);
    $emailinfo = validate_email($con,$useremail);
    $count_email = mysqli_num_rows($emailinfo);
    if($count_email == 1)
    {
    $user_email = mysqli_fetch_array($emailinfo);
    $to = $user_email['UserEmail'];
    $userid = base64_encode($user_email['UserID']);
    $headers = "From: panchal061090@gmail.com";
    $subject = "Forgot Password Mail";
    $url = "http://www.webinnovationhub.com/dearbeard/reset-password.php?rpwd=".$userid;
    $massege = "Dear User Please Click On This URL For Reset Password".$url;
    $send = mail($to,$subject,$massege,$headers);
    if($send)
    {
        $msg =  "Please Check Your Email For Reset Passowrd";
    }else{
        $msg =  "Please Try Again For Reset Passowrd";
    }
    }else{
        
        $msg =  "Your Email Not Registre";
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
                  <li><a href="#">Forgot Password</a></li>
                </ol>
                <div class="col-sm-8 col-sm-offset-2">
                	<h4>Forgot your password ?</h4>
                    <div class="forgot-pwd">
                        <?php if(isset($msg))
                        {
                        echo $msg;
                        }
                        ?>
                        <form name="forgot-password" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <label for="email">Enter Your Email Address Here</label>
                                <input type="text" name="useremail" class="form-control" id="email" required >
                            </div>
                            <div class="formg-group">
                                <input type="submit" name="forgot-pwd" class="forgot-btn" value="Submit">
                            </div>
                        </form>
                    </div>
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