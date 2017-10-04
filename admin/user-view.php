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

// Registre User Information

$userid = $_GET['view_uid'];

$sql_list = "SELECT *FROM users WHERE UserID = '$userid'";
$run_list = mysqli_query($con,$sql_list) or die(mysqli_error($con));
$user_info = mysqli_fetch_array($run_list);


/* Call Header Menu*/

require('header-menu.php');

?>
<style>
.admin{
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
       User Profile
	  <small> <a href="users-list.php">Users List</a> </small>
	   
      </h1>
	  
	 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">User Profile</li>
      </ol>
	  	  
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
      
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Personal Information</strong>
				 <p class="text-muted">
                <?php echo $user_info['UserFirstName']." ".$user_info['UserLastName']; ?>
              </p>
              
              
			  <p class="text-muted">
                
				<strong>Status :</strong> <?php echo $user_info['Userstatus'];  ?>
              </p>
			  
			  <p class="text-muted">
                
				<strong>Registre Date :</strong> <?php echo $user_info['UserRegistrationDate'];  ?>
              </p>
			  <p class="text-muted">
                
				<strong>Email :</strong> <?php echo $user_info['UserEmail'];  ?>
              </p>
			  <p class="text-muted">
                
				<strong>Contact :</strong> <?php echo $user_info['UserPhone'];  ?>
              </p>
			  <p class="text-muted">
                
				<strong>Fax :</strong> <?php echo $user_info['UserFax'];  ?>
              </p>
			  
			  <p class="text-muted">
                
				<strong>User System IP :</strong> <?php echo $user_info['UserIP'];  ?>
              </p>
				<hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $user_info['UserAddress2']." ".$user_info['UserCity']." , ".$user_info['UserState']." - ".$user_info['UserZip']." , ".$user_info['UserCountry'];  ?></p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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
