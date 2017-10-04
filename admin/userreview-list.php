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

$sql_reviewlist = "SELECT *FROM product_review";
$run_reviewlist = mysqli_query($con,$sql_reviewlist) or die(mysqli_error($con));


/* Call Header Menu*/

require('header-menu.php');

?>
<style>
.userreview-list{
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
        User Reviews List
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
        
        <li class="active">User Reviews List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">User Reviews List</h3>

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
		<table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Custemer Name</th>
                  <th>Rating</th>
                  <th>review_title</th>
                  <th>Description</th>
                  <th>Status</th>
				  <th>Date</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				while($data_reviewlist = mysqli_fetch_array($run_reviewlist))
				{
		$userid = $data_reviewlist['user_id'];	
		$sql_userviews= "SELECT UserFirstName , UserLastName FROM users WHERE UserID = '$userid'";
		$run_userviews = mysqli_query($con,$sql_userviews) or die(mysqli_error($con));
		$userviews_data = mysqli_fetch_array($run_userviews);
		$username = $userviews_data['UserFirstName']." ".$userviews_data['UserLastName']	
				?>
				<tr>
				<td>
				<?php echo $username ;?> 	
				</td>
				<td>
				<?php echo $data_reviewlist['review_value'];?> 	
				</td>
				<td>
				<?php echo $data_reviewlist['review_title'];?> 	
				</td>
				<td>
				<?php echo $data_reviewlist['review_desc'];?> 	
				</td>
				<td>
				<?php echo $data_reviewlist['review_status'];?> 	
				</td>
				<td>
				<?php echo $data_reviewlist['review_date'];?> 	
				</td>

				<td>
				<a href="review-publish.php?review_id=<?php echo $data_reviewlist['review_id']; ?>">Publish</a> | <a href="delete.php?review_id=<?php echo $data_reviewlist['review_id']; ?>">Delete</a>
				</td>
				</tr>
				<?php	
				}
				 ?>
				</tbody>
				</table>
		
              
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
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Sumit Panchal</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
