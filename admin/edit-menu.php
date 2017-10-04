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

$menu_id = $_GET['menu_id'];
$sql_menulist = "SELECT *FROM menu WHERE id = '$menu_id' ";
$run_menulist = mysqli_query($con,$sql_menulist) or die(mysqli_error($con));
$data_menu = mysqli_fetch_array($run_menulist);

if(isset($_POST['edit-menu']))
{
 $menu = $_POST['menu'];
 $order = $_POST['order'];
 $menu_id = $_POST['menu_id'];
 $url = strtolower(str_replace(" ","-",$menu).".php");
 
	 
	 $menu_info = array(
						'menu_name' => $menu,
						'order_list' => $order,
						'url' => $url	 
	 );
 	 
 $result = update_menu($con,$menu_id,$menu_info);
 if($result)
 {
	 header('Location:menu-list.php');
 }
 }
 
 /* Call Header Menu*/

require('header-menu.php');
?>
<style>
.create-menu{
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
        Edit Menu
		<small><a href="menu-list.php">Menu List</a></small>
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
        
        <li class="active">Edit Menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Menu</h3>
		  
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
		<form name="menu-edit" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label>Add Menu</label>                
        <input type="text" name="menu" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_menu['menu_name'];?>" >
		</div>
		<div class="form-group">
        <label>Order Menu</label>                
        <input type="number" name="order" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_menu['order_list'];?>" >
		</div>
		<div class="form-group">
                      
        <input type="hidden" name="menu_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $data_menu['id'];?>" >
		</div>
		<div class="form-group">            
        <input type="submit" name="edit-menu" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="UPDATE MENU" >
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
