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

$sql_menu = "SELECT *FROM menu";
$run_menu = mysqli_query($con,$sql_menu) or die(mysqli_error($con));

if(isset($_POST['page']))
{
	$page_title = mysqli_real_escape_string($con,$_POST['page_title']);
	$page_menu = mysqli_real_escape_string($con,$_POST['page_menu']);
	$content = mysqli_real_escape_string($con,$_POST['content']);
	
	$page_info = array(
	 'page_title' => $page_title ,
	 'page_menu' => $page_menu ,
	 'content' => $content 
	);
  $result = insert_page($con,$page_info);
 if($result == true)
	 {
	 $msg = "<h5 style='text-align: center;color: green;'>Page Create Done</h5>";	
	 }else{
	 $msg = "<h5 style='text-align: center;color: green;'>Page Not Create</h5>";
	 }
	
	
}


/* Call Header Menu*/

require('header-menu.php');
?>

<style>
.create-page{
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
        Add Page
		<small><a href="page-list.php">Page List</a></small>
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
        
        <li class="active">Add Page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Page</h3>
		
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
				
		<form name="send-coupon" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="box-body">
              
                <div class="form-group">
				<label>Page Title</label>
                <input type="text" name="page_title" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required  >
                </div>
                <div class="form-group">
				<label>Menu Name</label>                
				<select name="page_menu" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required>
				<option value="">Select Menu</option>
				<?php
				while($data_menu = mysqli_fetch_array($run_menu))
				{
				?>
				<option value="<?php echo $data_menu['menu_name']?>"><?php echo $data_menu['menu_name']?></option>
				<?php
				}
				?>
				</select>
				</div>
                <div class="form-group">
				<label>Content</label>
                <textarea id="editor1" name="content" 
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
							
									
				</textarea>
                </div>
              
            
				<div class="form-group">
						   
				<input type="submit" name="page" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="ADD" >
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

