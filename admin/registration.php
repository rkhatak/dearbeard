<?php
session_start();
require('config.php');
require('session.php');
require('function.php');
$path = "profile_pic/";
$username = $_SESSION['uname'];
$id = $_SESSION['id'];
$tab_name = "admininfo";
$user_data = showuserdata($con,$id,$tab_name);
if(isset($_POST['register']))
{
 $f_name = mysqli_real_escape_string($con,$_POST['firstname']);
 $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
 $email = mysqli_real_escape_string($con,$_POST['email']);
 $password = mysqli_real_escape_string($con,$_POST['password']);
 $c_password = mysqli_real_escape_string($con,$_POST['c_password']);
 $contact = mysqli_real_escape_string($con,$_POST['contact']);
 $fax = mysqli_real_escape_string($con,$_POST['fax']);
 $city = mysqli_real_escape_string($con,$_POST['city']);
 $zip = mysqli_real_escape_string($con,$_POST['zip']);
 $country = mysqli_real_escape_string($con,$_POST['country']);
 $state = mysqli_real_escape_string($con,$_POST['state']);
 $c_address = mysqli_real_escape_string($con,$_POST['c_address']);
 $p_address = mysqli_real_escape_string($con,$_POST['p_address']);
 $UserIP = $_SERVER['REMOTE_ADDR'];
 if($password == $c_password )
 {
	$user_info = array(
	 'UserEmail' => $email ,
	 'UserPassword' => $c_password,
	 'UserFirstName' => $f_name ,
	 'UserLastName' => $lastname ,	
	 'UserCity' => $city ,
	 'UserState' => $state ,
	 'UserZip' => $zip ,
	 'UserIP' => $UserIP ,
	 'UserPhone' => $contact ,
	 'UserFax' => $fax ,
	 'UserCountry' => $country ,
	 'UserAddress' => $c_address ,
	 'UserAddress2' => $p_address 
	);
  $result = registration($con,$user_info);
  if($result == true)
  {
	  $msg = "<h5 style='text-align: center;color: green;'>Your Registration Success</h5>";
  }	
  
 }
 else
 {
	$msg = "<h5 style='text-align: center;color: green;'>Password Not Match</h5>"; 
 }
 }
 
 /* Call Header Menu*/

require('header-menu.php');

?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registration
		
      </h1>
	  <div clsss ="msg"><?php
	  if(isset($msg))
	  {
		echo $msg;  
	  }
	  ?>
	  </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Registration</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Registration</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="col-md-12">
		<form name="profile" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label>First name</label>                
        <input type="text" name="firstname" class="form-control select2 select2-hidden-accessible" style="width: 100%;"  >
		</div>
		<div class="form-group">
        <label>Last name</label>                
        <input type="text" name="lastname" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
		</div>
		<div class="form-group">
        <label>Email</label>                
        <input type="text" name="email" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
		<div class="form-group">
        <label>Password</label>                
        <input type="text" name="password" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
		<div class="form-group">
        <label>Repeat Password</label>                
        <input type="text" name="c_password" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
		<div class="form-group">
        <label>Contact Number</label>                
        <input type="text" name="contact" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
		</div>
		<div class="form-group">
        <label>Fax</label>                
        <input type="text" name="fax" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
		</div>
		<div class="form-group">
        <label>City</label>                
        <input type="text" name="city" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
		</div>
		<div class="form-group">
        <label>Zip Code</label>                
        <input type="text" name="zip" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
		</div>
		<div class="form-group">
        <label>Country</label>                
        <input type="text" name="country" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
		</div>
		<div class="form-group">
        <label>State</label>                
        <input type="text" name="state" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
		</div>
		<div class="form-group">
        <label>Current Address</label>                
		<textarea rows="4" cols="50" name="c_address" class="form-control select2 select2-hidden-accessible" required></textarea>
		</div>
		
		<div class="form-group">
        <label>Permanent Address</label>                
		<textarea rows="4" cols="50" name="p_address" class="form-control select2 select2-hidden-accessible" required></textarea>
		</div>
		
		<div class="form-group">
                       
        <input type="submit" name="register" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="REGISTER" >
		</div>
		</form>
		
              
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="#">Sumit Panchal</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- Admin App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Admin for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
