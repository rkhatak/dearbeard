
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
$pid = $_GET['edit_id'];
$sql_list = "SELECT *FROM  category WHERE cat_id = '$pid' ";
$run_list = mysqli_query($con,$sql_list) or die(mysqli_error($con));
$cat_data = mysqli_fetch_array($run_list);
if(isset($_POST['add_category']))
{
 $cat_name = mysqli_real_escape_string($con,$_POST['cat_name']);
 $sub_cat_name = mysqli_real_escape_string($con,$_POST['sub_cat_name']);
 $cat_id = mysqli_real_escape_string($con,$_POST['cat_id']);
 
  $cat_info = array(
	 'cat_name' => $cat_name ,
	 'sub_cat_name' => $sub_cat_name 
	);
	$tab_category = "category";
	$result = update_category($con,$cat_info,$cat_id,$tab_category);
	 if($result == true)
  {
	  $msg = "<h5 style='text-align: center;color: green;'>Your Category Updated</h5>";
  } 
 
}


/* Call Header Menu*/

require('header-menu.php');
?>
<style>
.category{
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
        Manage Category
		<small><a href="category-list.php">Category List</a></small>
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
        
        <li class="active">Manage Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Manage Category</h3>
		  

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
        <label>Category name</label>                
        <input type="text" name="cat_name" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $cat_data['cat_name'];?>" >
		</div>
		<div class="form-group">
        <label>Sub Category name</label>                
        <input type="text" name="sub_cat_name" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $cat_data['sub_cat_name'];?>" >
		</div>
		
		<div class="form-group">                
        <input type="hidden" name="cat_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $cat_data['cat_id'];?>" >
		</div>
		
		<div class="form-group">           
        <input type="submit" name="add_category" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="UPDATE CATEGORY" >
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
