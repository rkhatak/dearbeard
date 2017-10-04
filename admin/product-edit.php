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
$edit_uid = $_GET['edit_uid'];
$sql_list = "SELECT *FROM product WHERE product_id = '$edit_uid' ";
$run_list = mysqli_query($con,$sql_list) or die(mysqli_error($con));
$pro_data = mysqli_fetch_array($run_list);
if(isset($_POST['edit_product']))
{
 $product_name = mysqli_real_escape_string($con,$_POST['product_name']);
 $product_price = mysqli_real_escape_string($con,$_POST['product_price']);
 $short_desc = mysqli_real_escape_string($con,$_POST['short_desc']);
 $product_desc = mysqli_real_escape_string($con,$_POST['product_desc']);
 $product_cat_id = mysqli_real_escape_string($con,$_POST['product_cat_id']);
 $subproduct_cat_id = mysqli_real_escape_string($con,$_POST['subproduct_cat_id']);
 $product_quantity = mysqli_real_escape_string($con,$_POST['product_quantity']);
 $product_weight = mysqli_real_escape_string($con,$_POST['product_weight']);
  $product_shipping = mysqli_real_escape_string($con,$_POST['product_shipping']);
// Check Works Limit Of Discription
 

    $count_shortw = str_word_count($short_desc) ;
    $count_logw = str_word_count($product_desc) ;
	if($count_shortw <= 100 && $count_logw <= 200 )	
	{
 
 // UPDATE Feature Image Start
 
 $feature_imgname = $_FILES['feature_img']['name'];
 $feature_imgtmp = $_FILES['feature_img']['tmp_name'];

 $feature_imgtype = $_FILES['feature_img']['type'];
 


 if(isset($feature_imgtmp) && !empty($feature_imgtmp))
 {
 
  
	if($feature_imgtype == "image/jpeg" || $feature_imgtype == "image/png" || $feature_imgtype == "image/jpg" || $feature_imgtype == "image/gif" )
 {
	$width = 500;
	$height = 500;
	featureresize($width, $height);
	
 }else{
	 
	  $msg = "<h5 style='text-align: center;color: green;'>Image Not Correct Format</h5>";
	  $flage_feature = "stop";
 }
  
	 
		 for ($i = 0; $i < count($_FILES['product_img']['name']); $i++)
	 {
				
		if($_FILES['product_img']['type'][$i] == "image/jpeg" || $_FILES['product_img']['type'][$i] == "image/png" || $_FILES['product_img']['type'][$i] == "image/jpg" || $_FILES['product_img']['type'][$i] == "image/gif" )
		{
			$width = 500;
			$height = 500;
			resize($width, $height,$i);
		
		}else{
			
			$msg = "<h5 style='text-align: center;color: green;'> Image <strong>".$_FILES['product_img']['name'][$i]."</strong> Not Correct Format</h5>";
			$flage_img = "stop";
		}
		 
	 
	 }
		
	  if(!isset($flage_feature) && !isset($flage_img))
	{
	 $pic_name = implode(",",$_FILES['product_img']['name']);
	 
	 $product_info = array(
	 'product_name' => $product_name ,
	 'product_desc' => $product_desc ,
	 'short_description' => $short_desc ,
	 'product_price' => $product_price ,
	 'product_cat_id' => $product_cat_id ,
	 'subproduct_cat_id' => $subproduct_cat_id ,
	 'product_img' => $pic_name,
	  'product_featureimg' => $feature_imgname ,
	 'product_SKU' => $product_quantity,
	 'product_weight' => $product_weight,
	 'product_shipping' => $product_shipping

	);
	 $tab_product = "product";
	 $result = update_product($con,$product_info,$edit_uid,$tab_product);
	 
	 if($result == true)
	 {
		 
      $msg = "<h5 style='text-align: center;color: green;'>Product  Update Succesfully </h5>";
       
	 }	
	 }else{
		 
		 $msg = "<h5 style='text-align: center;color: green;'> Please Select Images</h5>";
	 }
	 
 }else{
	
	$pic_name = mysqli_real_escape_string($con,$_POST['product_img1']);
	$feature_imgname = mysqli_real_escape_string($con,$_POST['feature_img1']);
	
	
	$product_info = array( 
	 'product_name' => $product_name ,
	 'product_desc' => $product_desc ,
	 'short_description' => $short_desc ,
	 'product_price' => $product_price ,
	 'product_cat_id' => $product_cat_id ,
	 'subproduct_cat_id' => $subproduct_cat_id ,
	 'product_img' => $pic_name,
	 'product_featureimg' => $feature_imgname ,
	 'product_SKU' => $product_quantity,
	 'product_weight' => $product_weight,
	 'product_shipping' => $product_shipping

	);
  $tab_product = "product";
 $result = update_product($con,$product_info,$edit_uid,$tab_product);
 if($result == true)
 {
	  $msg = "<h5 style='text-align: center;color: green;'>Product Update Sucsessfully</h5>";	
 }
	 
 }
 }else{
	 $msg = "<p style='text-align: center;color: red;'>Please Enter Short Discription 100 Word And Short Discription in 200 Word</p>";
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
        Edit Product
		<small><a href="product-list.php">Product List</a></small>
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
        
        <li class="active">Edit Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
		<div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Edit Product</h3>

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
        <label>Product Name</label>                
        <input type="text" name="product_name" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $pro_data['product_name'];?>"  >
		</div>
		<div class="form-group">
        <label>Product Price</label>                
        <input type="text" name="product_price" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $pro_data['product_price'];?>" >
		</div>
		<div class="form-group">
        <label>Product Quantity</label>                
        <input type="text" name="product_quantity" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $pro_data['product_SKU'];?>" >
		</div>
		<div class="form-group">
        <label>Product Weight</label>                
        <input type="text" name="product_weight" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $pro_data['product_weight'];?>" >
		</div>
		<div class="form-group">
        <label>Shipping Charge</label>                
        <input type="text" name="product_shipping" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $pro_data['product_shipping'];?>" >
		</div>
		
		<div class="form-group">
        <label>Category</label>                
		<select name="product_cat_id" id="category" class="form-control select2 select2-hidden-accessible" required>
		<option value="<?php echo $pro_data['product_cat_id'];?>"><?php echo $pro_data['product_cat_id'];?></option>
		<?php
		$sql_cat1 = "SELECT DISTINCT cat_name FROM category";
		$run_cat1 = mysqli_query($con,$sql_cat1) or die(mysqli_error($con));
		while($data_cat = mysqli_fetch_array($run_cat1))
		{
		?>
		<option value="<?php echo $data_cat['cat_name']?>"><?php echo $data_cat['cat_name']?></option>	
		<?php
		}	
		?>
		</select>
		
		</div>
		
		<div class="form-group">
        <label>Sub Category</label>                
		<div id = "sub-category">
		<select name="subproduct_cat_id" class="form-control select2 select2-hidden-accessible">
		<option value="<?php echo $pro_data['subproduct_cat_id'];?>"><?php echo $pro_data['subproduct_cat_id'];?></option>

		</select>
		</div>
		
		</div>
		
		<div class="form-group">
        <label>Short Description</label>                
		<textarea rows="2" cols="50" name="short_desc" id="editor1" class="form-control select2 select2-hidden-accessible" required><?php echo $pro_data['short_description'];?></textarea>
		</div>
		<div class="form-group">
        <label>Description</label>                
		<textarea rows="4" cols="50" name="product_desc" id="editor2" class="form-control select2 select2-hidden-accessible" ><?php echo $pro_data['product_desc'];?></textarea>
		</div>
		
		<div class="form-group"> 
		<label>Feature Images</label>  
        <input type="file" name="feature_img"  />
		</div>
		
		<div class="form-group">
		<label>Product Other Images</label>                
        <div id="filediv"><input type="file" name="product_img[]" id="file"    /></div>
		<br/>
		<input type="button" id="add_more" class="upload" value="Add More Files" />
		</div>
		<div class="form-group">              
        <input type="hidden" name="product_img1" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $pro_data['product_img'];?>" >
        		
		</div>
		<div class="form-group">              
        <input type="hidden" name="feature_img1" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="<?php echo $pro_data['product_featureimg'];?>" >
        		
		</div>
				
		<div class="form-group">            
        <input type="submit" name="edit_product" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="EDIT PRODUCT" >
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
