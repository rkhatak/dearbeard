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

$admin_id = $_GET['admin_id'];

$sql_list = "SELECT *FROM admininfo WHERE user_id = '$admin_id' ";
$run_list = mysqli_query($con,$sql_list) or die(mysqli_error($con));
$data_admin = mysqli_fetch_array($run_list);


if(isset($_POST['submit']))
{
 $u_name = mysqli_real_escape_string($con,$_POST['username']);
 $f_name = mysqli_real_escape_string($con,$_POST['firstname']);
 $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
 $email = mysqli_real_escape_string($con,$_POST['email']);
 $contact = mysqli_real_escape_string($con,$_POST['contact']);
 $street = mysqli_real_escape_string($con,$_POST['street']);
 $city = mysqli_real_escape_string($con,$_POST['city']);
 $zip = mysqli_real_escape_string($con,$_POST['zip']);
 $country = mysqli_real_escape_string($con,$_POST['country']);
 $state = mysqli_real_escape_string($con,$_POST['state']);
 $roll = mysqli_real_escape_string($con,$_POST['roll']);
 $status = mysqli_real_escape_string($con,$_POST['status']);
 $id = mysqli_real_escape_string($con,$_POST['id']);
 $photo_name = $_FILES['photo']['name'];
 $tmp_name = $_FILES['photo']['tmp_name'];
 $image_type = $_FILES['photo']['type']; 
 
 if(isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']) )
 {
   $photo_name = $_FILES['photo']['name'];
 
 }else{
	$photo_name = mysqli_real_escape_string($con,$_POST['photo_name']);	
 }
 
 if(isset($tmp_name) && !empty($tmp_name))
 {
	if($image_type == "image/jpeg" || $image_type == "image/png" || $image_type == "image/jpg" || $image_type == "image/gif")
 {
 move_uploaded_file($tmp_name,'profile_pic/'.$photo_name);
 }else{
	die("<h5 style='text-align: center;color: green;'>Please Upload Correct Image</h5>");
 } 
 }
	 $user_info = array(
	 'username' => $u_name ,
	 'f_name' => $f_name ,
	 'l_name' => $lastname ,
	 'email' => $email ,
	 'phone' => $contact ,
	 'street' => $street ,
	 'city' => $city ,
	 'zip' => $zip ,
	 'state' => $state ,
	 'country' => $country ,
	 'photo' => $photo_name ,
	 'roll' => $roll,
	 'status' => $status,
	 'photo' => $photo_name
	);
  $result = update_users($con,$id,$user_info,$tab_name);
  if($result == true)
  {
	  $msg = "<h5 style='text-align: center;color: green;'>Your Account Created</h5>";
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
        Edit Admin Profile
		<small><a href="profile.php">My Profile </a> |  
	   <a href="update-profile.php">Update Profile </a> |
	   <a href="change-password.php">Change Password </a></small>
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
        
        <li class="active">Edit Admin Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Admin Profile</h3>

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
        <label>Username</label>                
        <input type="text" name="username" class="form-control select2 select2-hidden-accessible" style="width: 100%;"  value="<?php echo $data_admin['username']; ?>" required >
		</div>
		
        <div class="form-group">
        <label>First name</label>                
        <input type="text" name="firstname" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_admin['f_name']; ?>" >
		</div>
		<div class="form-group">
        <label>Last name</label>                 
        <input type="text" name="lastname" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_admin['l_name']; ?>" >
		</div>
		<div class="form-group">
        <label>Email</label>                
        <input type="text" name="email" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_admin['email']; ?>" >
		</div>
		<div class="form-group">
        <label>Contact Number</label>                
        <input type="text" name="contact" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_admin['phone']; ?>" >
		</div>
		<div class="form-group">
        <label>Street</label>                
        <input type="text" name="street" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_admin['street']; ?>" >
		</div>
		<div class="form-group">
        <label>City</label>                
        <input type="text" name="city" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_admin['city']; ?>" >
		</div>
		<div class="form-group">
        <label>Zip Code</label>                
        <input type="text" name="zip" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_admin['zip']; ?>" >
		</div>
		<div class="form-group">
        <label>Country</label>                
        <input type="text" name="country" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_admin['country']; ?>" >
		</div>
		<div class="form-group">
        <label>State</label>                
        <input type="text" name="state" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_admin['state']; ?>" >
		</div>
		<div class="form-group">
        <label>Profile Photo</label>                
        <input type="file" name="photo"  style="width: 100%;" >
		<input type="hidden" name="photo_name"  style="width: 100%;"  value="<?php echo $data_admin['photo']; ?>">
		</div>
		
		<div class="form-group">
        <label>Roll</label>                
        <select name="roll" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required>
		<option value="<?php echo $data_admin['roll']; ?>"><?php echo $data_admin['roll']; ?></option>
		<option value="Super Admin">Super Admin</option>
		<option value="Sub Admin">Sub Admin</option>
		</select>
		</div>
		<div class="form-group">
        <label>Status</label>                
        <select name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required>
		<option value="<?php echo $data_admin['status']; ?>"><?php echo $data_admin['status']; ?></option>
		<option value="Active">Active</option>
		<option value="Deactive">Deactive</option>
		</select>
		</div>
		
		<div class="form-group">
                       
        <input type="hidden" name="id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_admin['user_id']; ?>" >
		</div>
		
		<div class="form-group">
                       
        <input type="submit" name="submit" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="SUBMIT" >
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
