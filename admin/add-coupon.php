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
if(isset($_POST['add_coupon']))
{
 $coupon_code = mysqli_real_escape_string($con,$_POST['coupon_code']);
 $descount_type = mysqli_real_escape_string($con,$_POST['descount_type']);
 $coupon_desc = mysqli_real_escape_string($con,$_POST['coupon_desc']);
 $coupon_amount = mysqli_real_escape_string($con,$_POST['coupon_amount']);
 $expire_date = mysqli_real_escape_string($con,$_POST['expire_date']);
 $coupon_limit = mysqli_real_escape_string($con,$_POST['coupon_limit']);
 $coupon_product = mysqli_real_escape_string($con,$_POST['coupon_product']);

   $coupon_info = array(
	 'coupon_code' => $coupon_code ,
	 'descount_type' => $descount_type ,
	 'coupon_desc' => $coupon_desc ,
	 'coupon_amount' => $coupon_amount ,
	 'expire_date' => $expire_date ,
	 'coupon_limit' => $coupon_limit,
	 'coupon_product' => $coupon_product
	);
 $result = add_coupon($con,$coupon_info);
 if($result == true)
 {
	  $msg = "<h5 style='text-align: center;color: green;'>Coupon Add Sucsessfully</h5>";	
 }	 
 }
 
 /* Call Header Menu*/

require('header-menu.php');

?>
<style>
.coupon-list{
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
        Add Coupon
		<small><a href="coupon-list.php">Coupon List</a></small>
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
        
        <li class="active">Add Coupon</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
		<div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Add Coupon</h3>

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
		<form name="coupon" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label>Coupon Code</label>                
        <input type="text" name="coupon_code" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
		<div class="form-group">
        <label>Descount Type</label>                
        <select name="descount_type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required>
		<option value="">Select Descount Type </option>
		<option value="Percentage discount">Percentage discount</option>
		<option value="Fixed cart discount">Fixed cart discount</option>
		<option value="Fixed product discount">Fixed product discount</option>
		</select>
		</div>
		
		<div class="form-group">
		<label>Coupon Amount</label>
        <input type="text" name="coupon_amount" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		
		</div>
		<div class="form-group">
		<label>Coupon Expire Date</label>
        <input type="text" name="expire_date" id = "datepicker" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required   >
		
		</div>
		<div class="form-group">
		<label>Usage / Limit</label>                
        <input type="number" name="coupon_limit" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
		
		<div class="form-group">
		<label>Products</label>                
        <input type="text" name="coupon_product" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
		
		<div class="form-group">
        <label>Description</label>                
		<textarea rows="4" cols="50" name="coupon_desc" id="editor1" class="form-control select2 select2-hidden-accessible" required></textarea>
		</div>
		
		
		<div class="form-group">            
        <input type="submit" name="add_coupon" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="ADD Coupon" >
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
    <strong>Copyright &copy; 2014-2016 <a href="#">Sumit panchal</a>.</strong> All rights
    reserved.
  </footer>

</div>

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
