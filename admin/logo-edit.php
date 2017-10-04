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

$logo_id = $_GET['logo_id'];
$sql_logo = "SELECT *FROM logo_widgets WHERE logo_id = '$logo_id' ";
$run_logo = mysqli_query($con,$sql_logo) or die(mysqli_error($con));
$data_logo = mysqli_fetch_array($run_logo);

if(isset($_POST['edit_logo']))
{
 $logo_title = mysqli_real_escape_string($con,$_POST['logo_title']);
 $logo_desc = mysqli_real_escape_string($con,$_POST['logo_desc']);
 $oldlogo_img = mysqli_real_escape_string($con,$_POST['oldlogo_img']);
 $logo_id = mysqli_real_escape_string($con,$_POST['logo_id']);
  
 $logo_name = $_FILES['logo_img']['name'];
 $tmp_name = $_FILES['logo_img']['tmp_name'];
 $logo_type = $_FILES['logo_img']['type'];
 
   
  if(isset($tmp_name) && !empty($tmp_name))
 {
  if($logo_type == "image/jpeg" || $logo_type == "image/png" || $logo_type == "image/jpg" || $logo_type == "image/gif" )
 {
  if(move_uploaded_file($tmp_name,'logo_pic/'.$logo_name))
  {
	    $logo_info = array(
	 'logo_title' => $logo_title ,
	 'logo_desc' => $logo_desc ,
	 'logo_imgname' => $logo_name
	);

 $result = editlogowidgets($con,$logo_id,$logo_info);
 if($result == true)
  {
	  $msg = "<h5 style='text-align: center;color: green;'>Logo Update Sucsessfully</h5>";	
  }
  }else{
	 $msg = "<h5 style='text-align: center;color: green;'>Logo Not Update</h5>"; 
  }
	
 }else{
	 
	  $msg = "<h5 style='text-align: center;color: green;'>Please Select Correct Image</h5>";
 }
 }else{
	 
	 $logo_name = mysqli_real_escape_string($con,$_POST['oldlogo_img']);
	 $logo_info = array(
	 'logo_title' => $logo_title ,
	 'logo_desc' => $logo_desc ,
	 'logo_imgname' => $logo_name
	);

 $result = editlogowidgets($con,$logo_id,$logo_info);
 if($result == true)
  {
	  $msg = "<h5 style='text-align: center;color: green;'>Logo Update Sucsessfully</h5>";	
  } 
 }
 
	 
 } 
 
 /* Call Header Menu*/

require('header-menu.php');

?>
<style>
.logo-widgets{
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
        Logo Edit
		<small><a href="logo-list.php">Logo List</a></small>
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
        
        <li class="active">Logo Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
		<div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Logo Edit</h3>

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
		<form name="logo-edit" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label>Logo Title</label>                
        <input type="text" name="logo_title" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_logo['logo_title']?>" required >
		</div>
		
		<div class="form-group">
        <label>Logo Description</label>                
		<textarea rows="2" cols="50" name="logo_desc" id="editor1" class="form-control select2 select2-hidden-accessible" >
		<?php echo $data_logo['logo_desc']?>
		</textarea>
		</div>
		
		<div class="form-group">
		<label>Logo Image</label>                
        <input type="file" name="logo_img" >
		</div>
		
		<div class="form-group">                
        <input type="hidden" name="oldlogo_img" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_logo['logo_imgname']?>" >
		</div>
		
		
		<div class="form-group">                
        <input type="hidden" name="logo_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_logo['logo_id']?>" >
		</div>
		
		
		
		<div class="form-group">            
        <input type="submit" name="edit_logo" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="UPDATE LOGO" >
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

<script src="bower_components/ckeditor/ckeditor.js"></script>

<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  
    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
	
	CKEDITOR.replace('editor2')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  
  
</script>
</body>
</html>
