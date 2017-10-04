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
$order_id = $_GET['order_id'];
$sql_list = "SELECT *FROM orders WHERE order_id = '$order_id'";
$run_list = mysqli_query($con,$sql_list) or die(mysqli_error($con));
$order_data = mysqli_fetch_array($run_list);
if(isset($_POST['update']))
{
 $order_status = mysqli_real_escape_string($con,$_POST['order_status']);
 $order_id = mysqli_real_escape_string($con,$_POST['order_id']);
 $result = update_order($con,$order_status,$order_id);
 if($result == true)
 {
	  $msg = "<h5 style='text-align: center;color: green;'>Order Update Sucsessfully</h5>";	
 }
 }
 
 /* Call Header Menu*/

require('header-menu.php');

?>

<style>
.order-list{
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
        Order Details
		<small><a href="order-list.php">Order List</a></small>
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
        
        <li class="active">Order Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Order Details</h3>
			
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
		<form name="order" method="POST" action="">
		<div class="col-md-4">
		<b>General Details</b>
		<p>Order date: <?php echo $order_data['order_date'];?></p>
		<p>Order status: 
		<select name="order_status">
		<option value = "<?php echo $order_data['order_status'];?>"><?php echo $order_data['order_status'];?></option>
		<option value = "panding payment">Panding Payment</option>
		<option value = "Hold On">Hold On</option>
		<option value = "Processing">Processing</option>
		<option value = "Completed">Completed</option>
		<option value = "Cancelled">Cancelled</option>
		<option value = "Refunded">Refunded</option>
		<option value = "Failed">Failed</option>
		</select>
		</p>
		<p>Customer: <?php echo $order_data['custemer_name'];?></p>
		</div>
		<div class="col-md-4">
		<b>Billing Details</b>
		<p>Address: <?php echo $order_data['Billing_add'];?></p>
		<p>Email address: <?php echo $order_data['customer_email'];?></p>
		<p>Phone: <?php echo $order_data['customer_phone'];?></p>
		</div>
		<div class="col-md-4">
		<b>Shipping Details</b>
		<p><?php echo $order_data['shiping_add'];?></p>
		<p><input type="hidden" name="order_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $order_data['order_id'];?>" ></p>
		<p><input type="submit" name="update" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="UPDATE" ></p>
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
