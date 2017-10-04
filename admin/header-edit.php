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

$header_id = $_GET['header_id'];
$sql_header = "SELECT *FROM topheader WHERE header_id = '$header_id' ";
$run_header = mysqli_query($con,$sql_header) or die(mysqli_error($con));
$header_data = mysqli_fetch_array($run_header);

if(isset($_POST['header-edit']))
{
	$header_title = mysqli_real_escape_string($con,$_POST['header_title']);
	$content = mysqli_real_escape_string($con,$_POST['content']);
	$header_name = mysqli_real_escape_string($con,$_POST['header_name']);
	$header_id = mysqli_real_escape_string($con,$_POST['header_id']);
	
	$header_info = array(
	 'header_title' => $header_title ,
	 'content' => $content ,
	 'header_name' => $header_name
	);
  $result = updateheader($con,$header_info,$header_id);
 if($result == true)
	 {
	 header('Location:top-header.php');
	 }
	
}

/* Call Header Menu*/

require('header-menu.php');

?>
<style>
.top-header{
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
        Edit Header
		<small><a href="top-header.php">Header List</a></small>
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
        
        <li class="active">Edit Header</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Header</h3>
		
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
				
		<form name="shiping-header" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="box-body">
              
                <div class="form-group">
				<label>Header Title</label>
                <input type="text" name="header_title" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $header_data['header_title'] ?>" >
                </div>
				                
                <div class="form-group">
				<label>Content</label>
                <textarea id="editor1"  name="content" 
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
							<?php echo $header_data['content'] ?>
							
									
				</textarea>
                </div>
				
				<div class="form-group">
				<label>Select header</label>
                <select name="header_name" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required="">
				<option value="<?php echo $header_data['header_name'] ?>"><?php echo $header_data['header_name'] ?></option>
				<option value="Header-1">Header-1</option>
				<option value="Header-2">Header-2</option>
				<option value="Header-3">Header-3</option>
				</select>
                </div>
				
				<div class="form-group">
				
                <input type="hidden" name="header_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $header_data['header_id'] ?>" >
                </div>
              
            
				<div class="form-group">
						   
				<input type="submit" name="header-edit" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="UPDATE" >
				</div>
				</form>
				</div>
			  
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
  })
  
  
</script>
</body>
</html>
