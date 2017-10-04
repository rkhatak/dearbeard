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

$sql_list = "SELECT *FROM coupon";
$run_list = mysqli_query($con,$sql_list) or die(mysqli_error($con));
$data_list = mysqli_fetch_array($run_list);
if(isset($_POST['send']))
{
	   $to = mysqli_real_escape_string($con,$_POST['email']);
	   $subject = mysqli_real_escape_string($con,$_POST['subject']);
	   $msg = mysqli_real_escape_string($con,$_POST['content']);
	   $headers = "From: panchal061090@gmail.com";
	 $mail_send = mail($to,$subject,$msg,$headers);
	 if($mail_send == true)
	 {
		 $msg = "<h5 style='text-align: center;color: green;'>Coupon Sent Sucsessfully</h5>";	
	 }else{
		$msg = "<h5 style='text-align: center;color: green;'>Coupon Not Sent</h5>";	 
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
        Coupon Send
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
        
        <li class="active">Coupon Send</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Coupon Send</h3>
		
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
                  <input type="email" class="form-control" name="email" placeholder="Email to:" required >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>
                 <div class="form-group">
                  <textarea  name="content" placeholder="Message" id="editor1"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
							
							
							Dear Sir 
				This is Coupon Details Coupon Code <?php echo $data_list['coupon_code'] ;?> , Coupon Type is <?php echo $data_list['descount_type'];?> 
				, Coupon Amount is <?php echo $data_list['coupon_amount'];?> , Usage Limit is <?php echo $data_list['coupon_limit'];?> and Expire Date <?php echo $data_list['expire_date'];?>
							
				</textarea>
                </div>
              
            </div>
            <div class="box-footer clearfix">
              <button type="submit" name="send" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
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

