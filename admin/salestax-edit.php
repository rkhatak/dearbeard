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

$tax_id = $_GET['tax_id'];
$sql_tax = "SELECT *FROM sales_tax WHERE sales_tax_id = '$tax_id' ";
$run_tax = mysqli_query($con,$sql_tax) or die(mysqli_error($con));
$tax_data = mysqli_fetch_array($run_tax);

if(isset($_POST['edit_tax']))
{
 $tax_amount = mysqli_real_escape_string($con,$_POST['tax_amount']);
 $sales_state = mysqli_real_escape_string($con,$_POST['sales_state']);
 $tax_id = mysqli_real_escape_string($con,$_POST['tax_id']);


 $tax_info = array(
	 'tax_amount' => $tax_amount ,
	 'sales_state' => $sales_state 
	);
 $result = update_tax($con,$tax_info,$tax_id);
 if($result == true)
 {
	  $msg = "<h5 style='text-align: center;color: green;'>Tax Update Sucsessfully</h5>";	
 }else{
	 
	 $msg = "<h5 style='text-align: center;color: green;'>Tax Not Update</h5>";	
 }	 
 
} 

 
 /* Call Header Menu*/

require('header-menu.php');

?>
<style>
.product-list{
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
        Edit Sales Tax
		<small><a href="add-product.php">Add Product</a> | <a href="salestax-list.php">Tax List</a></small>
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
        
        <li class="active">Edit Sales Tax</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
		<div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Edit Sales Tax</h3>

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
		<form name="tax" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label>Tax Amount</label>                
        <input type="text" name="tax_amount" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $tax_data['tax_amount'];?>" >
		</div>
		<div class="form-group">
        <label>State</label>                
		<select name="sales_state"  class="form-control select2 select2-hidden-accessible" >
		<option value="<?php echo $tax_data['sales_state'];?>"><?php echo $tax_data['sales_state'];?></option>
		<?php
		$sql_states = "SELECT DISTINCT name FROM states where country_id = '101'";
		$run_states = mysqli_query($con,$sql_states) or die(mysqli_error($con));
		while($data_states = mysqli_fetch_array($run_states))
		{
		?>
		<option value="<?php echo $data_states['name']?>"><?php echo $data_states['name']?></option>	
		<?php
		}	
		?>
		</select>
		</div>
		
		<div class="form-group">
               
        <input type="hidden" name="tax_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $tax_data['sales_tax_id'];?>" >
		</div>

		<div class="form-group">            
        <input type="submit" name="edit_tax" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="EDIT SALESTAX" >
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
