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
$password = $user_data['password'];
if(isset($_POST['update']))
{
 $old_p = md5(mysqli_real_escape_string($con,$_POST['old_p']));
 $new_p = md5(mysqli_real_escape_string($con,$_POST['new_p']));
 $r_new_p = md5(mysqli_real_escape_string($con,$_POST['r_new_p']));
 if($old_p == $password )
 {
	 if($new_p == $r_new_p )
	 {
	 $user_info = array(
	 'password' => $new_p	 
	);
  $result = update_users($con,$id,$user_info,$tab_name);
  if($result == true)
  {
	  $msg = "<h5 style='text-align: center;color: green;'>Your Password Updated</h5>";
  }	 
		 
	 }else{
		$msg = "<h5 style='text-align: center;color: green;'>Password Not Match</h5>"; 
	 }
 
	 
 }else{
	 
	$msg = "<h5 style='text-align: center;color: green;'>Please Enter Correct Old Password</h5>"; 
 }
}

/* Call Header Menu*/

require('header-menu.php');
?>

<style>
.profile{
	border-left:3px solid #3c8dbc;
	pointer-events: none;
}
</style>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
		<small><a href="profile.php">My Profile </a> | 
		<a href="create-profile.php">Create Profile </a> |
	   <a href="update-profile.php">Update Profile </a> </small>
	   
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
        
        <li class="active">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Change Password</h3>

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
        <label>Old Password</label>                
        <input type="text" name="old_p" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
		</div>
		<div class="form-group">
        <label>New Password</label>                
        <input type="text" name="new_p" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
		</div>
		<div class="form-group">
        <label>Repeat Password</label>                
        <input type="text" name="r_new_p" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
		</div>
		<div class="form-group">
                       
        <input type="submit" name="update" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="CHANGE PASSWORD" >
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
