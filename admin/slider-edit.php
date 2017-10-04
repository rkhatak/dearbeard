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

$slider_id = $_GET['slider_id'];
$sql_slider = "SELECT *FROM slider WHERE slider_id = '$slider_id'";
$run_slider = mysqli_query($con,$sql_slider) or die(mysqli_error($con));
$data_slider = mysqli_fetch_array($run_slider);


if(isset($_POST['edit_slider']))
{
 $slider_title = mysqli_real_escape_string($con,$_POST['slider_title']);
 $slider_text = mysqli_real_escape_string($con,$_POST['slider_text']);
 $button_status = mysqli_real_escape_string($con,$_POST['button_status']); 
 $button_title = mysqli_real_escape_string($con,$_POST['button_title']);
 $slider_link = mysqli_real_escape_string($con,$_POST['slider_link']); 
 $slider_id = mysqli_real_escape_string($con,$_POST['slider_id']); 
 $slider_type = mysqli_real_escape_string($con,$_POST['slider_type']); 
 
 $pic_name = $_FILES['slider_img']['name'];
 $tmp_name = $_FILES['slider_img']['tmp_name'];
 $image_type = $_FILES['slider_img']['type'];
 
 if(isset($tmp_name) && !empty($tmp_name))
 { 
 if($image_type == "image/jpeg" || $image_type == "image/png" || $image_type == "image/jpg" || $image_type == "image/gif" )
 {
	if(move_uploaded_file($tmp_name,'slider_pic/'.$pic_name))
	{
	 $slider_info = array(
	 'slider_title' => $slider_title ,
	 'slider_text' => $slider_text ,
	 'button_status' => $button_status ,
	 'button_title' => $button_title ,
	 'slider_link' => $slider_link ,
	 'slider_img' => $pic_name,
	 'slider_type' => $slider_type
	);

 $result = update_slider($con,$slider_id,$slider_info);
 if($result == true)
 {
	  $msg = "<h5 style='text-align: center;color: green;'>Slider Update Sucsessfully</h5>";	
 }	
	}
 }else{
	$msg = "<h5 style='text-align: center;color: green;'>Please Upload Correct Image</h5>" ;
 } 
 }else{
	 
	 $pic_name = mysqli_real_escape_string($con,$_POST['slider_img_hide']);	
	
	 $slider_info = array(
	 'slider_title' => $slider_title ,
	 'slider_text' => $slider_text ,
	 'button_status' => $button_status ,
	 'button_title' => $button_title ,
	 'slider_link' => $slider_link ,
	 'slider_img' => $pic_name,
	 'slider_type' => $slider_type
	);

 $result = update_slider($con,$slider_id,$slider_info);
 if($result == true)
 {
	  $msg = "<h5 style='text-align: center;color: green;'>Slider Update Sucsessfully</h5>";	
 }	 
 } 
 }
 
 /* Call Header Menu*/

require('header-menu.php');

?>
<style>
.slider-list{
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
        Slider Edit
		<small><a href="slider-list.php">Slider List</a></small>
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
        
        <li class="active">Slider Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
		<div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Slider Edit</h3>

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
		<form name="slider" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label>Slider Title</label>                
        <input type="text" name="slider_title" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_slider['slider_title'];?>"  >
		</div>
		
		<div class="form-group">
        <label>Sider Text</label>                
		<textarea rows="4" cols="50" name="slider_text" class="form-control select2 select2-hidden-accessible" >
		<?php echo $data_slider['slider_text'];?>
		</textarea>
		</div>
		
		<div class="form-group"> 
		<?php
		if($data_slider['button_status'] == 'Active')
		{
		?>
		<input type="checkbox" name="button_status" value="Active" checked > I Want Link Button <br/>
		<input type="checkbox" name="button_status" value="Deactive" > I Dont Want Link Button
		<?php
		}else if($data_slider['button_status'] == 'Deactive'){
		?>
		<input type="checkbox" name="button_status" value="Active"  > I Want Link Button <br/>
		<input type="checkbox" name="button_status" value="Deactive" checked > I Dont Want Link Button		
		<?php	
		}		
		?>
		</div>
		<div class="form-group">
        <label>Button Title</label>                
		<input type="text" name="button_title" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_slider['button_title'];?>"  >
		</div>
		<div class="form-group">
        <label>Slider Link</label>                
		<input type="text" name="slider_link" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_slider['slider_link'];?>" >
		</div>
		<div class="form-group">
		<label>Product Image</label>                
        <input type="file" name="slider_img" >
		<input type="hidden" name="slider_img_hide" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_slider['slider_img'];?>" >
		</div>
		
		<div class="form-group">
        <label>Slider Type</label>                
		<select name="slider_type" class="form-control select2 select2-hidden-accessible"  >
		<option value="<?php echo $data_slider['slider_type'];?>"><?php echo $data_slider['slider_type'];?></option>
		<option value="dynamic">Dynamic</option>
		<option value="static">Static</option>
		</select>
		</div>
		
		<div class="form-group">
                       
		<input type="hidden" name="slider_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_slider['slider_id'];?>" >
		</div>
		
		
		<div class="form-group">            
        <input type="submit" name="edit_slider" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="EDIT SLIDER" >
		</div>
		</div>
		</form>
		
              
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Sumit Panchal</a>.</strong> All rights
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
