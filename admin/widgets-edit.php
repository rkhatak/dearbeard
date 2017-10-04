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

$widgets_id = $_GET['widgets_id'];
$sql_widgets = "SELECT *FROM footer_widgets WHERE widgets_id = '$widgets_id' ";
$run_widgets = mysqli_query($con,$sql_widgets) or die(mysqli_error($con));
$data_widgets = mysqli_fetch_array($run_widgets);


if(isset($_POST['edit-widgets']))
{
	$widget_title = mysqli_real_escape_string($con,$_POST['widget_title']);
	$content = mysqli_real_escape_string($con,$_POST['content']);
	$widget_name = mysqli_real_escape_string($con,$_POST['widget_name']);
	$widgets_id = mysqli_real_escape_string($con,$_POST['widgets_id']);
	
	$widgets_info = array(
	 'widget_title' => $widget_title ,
	 'content' => $content ,
	 'widget_name' => $widget_name
	);
  $result = updatefooterwidget($con,$widgets_id,$widgets_info);
 if($result == true)
	 {
	 header('Location:footer-widgets.php');
	 }else{
	 $msg = "<h5 style='text-align: center;color: green;'>Widgets Not Updated</h5>";
	 }
	
	
}

/* Call Header Menu*/

require('header-menu.php');
?>

<style>
.footer-widgets{
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
        Edit Footer
		<small><a href="footer-widgets.php">Footer Widgets</a></small>
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
        
        <li class="active">Edit Footer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Footer</h3>
		
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
				
		<form name="footer-widgets" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="box-body">
              
                <div class="form-group">
				<label>Widget Title</label>
                <input type="text" name="widget_title" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required value="<?php echo $data_widgets['widget_title']; ?>" >
                </div>
				
				<div class="form-group">
				<label>Content</label>
                <textarea rows="2" cols="50" name="content" id="editor1" class="form-control select2 select2-hidden-accessible" >
				<?php echo $data_widgets['content']; ?>
				</textarea>
                </div>
                
                			
				<div class="form-group">
				<label>Select Widgets</label>
                <select name="widget_name" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required>
				<option value="<?php echo $data_widgets['widget_name']; ?>"><?php echo $data_widgets['widget_name']; ?></option>
				<option value="widgets-1">Widgets - 1</option>
				<option value="widgets-2">Widgets - 2</option>
				<option value="widgets-3">Widgets - 3</option>
				<option value="widgets-4">Widgets - 4</option>
				</select>
                </div>
				
				<div class="form-group">
				
                <input type="hidden" name="widgets_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_widgets['widgets_id']; ?>"  >
                </div>
				
				<div class="form-group">	   
				<input type="submit" name="edit-widgets" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="UPDATE WIDGETS" >
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
	
	CKEDITOR.replace('editor2')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  
  
</script>
</body>
</html>
