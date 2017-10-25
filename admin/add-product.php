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
if(isset($_POST['add_product']))
{
//echo '<pre>';print_r($_POST);die;
 $product_name = mysqli_real_escape_string($con,$_POST['product_name']);
 $product_price = mysqli_real_escape_string($con,$_POST['product_price']);
 $short_desc = mysqli_real_escape_string($con,$_POST['short_desc']);
 $product_desc = mysqli_real_escape_string($con,$_POST['product_desc']);
 $product_cat_id = mysqli_real_escape_string($con,$_POST['product_cat_id']);
 $subproduct_cat_id = mysqli_real_escape_string($con,$_POST['subproduct_cat_id']);
 $product_quantity = mysqli_real_escape_string($con,$_POST['product_quantity']);
 $product_weight = mysqli_real_escape_string($con,$_POST['product_weight']);
 $product_shipping = mysqli_real_escape_string($con,$_POST['product_shipping']);
 $product_tag=mysqli_real_escape_string($con,$_POST['product_tag']);

 // Check Works Limit Of Discription
    $count_shortw = str_word_count($short_desc) ;
    $count_logw = str_word_count($product_desc) ;
	
	if($count_shortw <= 100 && $count_logw <= 200 )	
	{
  // Add Feature Image Start
        $fImage=isset($_POST['r_feature_image'])?$_POST['r_feature_image']:'';
        if($fImage!=''){    
            $imageName=strtotime(date('y-m-d h:i:s')).'image.jpeg'; 
            $feature_imgname=$imageName;
            $source = fopen($fImage, 'r');
            $path = 'product_pic/'.$imageName;
            $destination = fopen($path, 'w');
            stream_copy_to_stream($source, $destination);
            fclose($source);
            fclose($destination);

        }    
	 $product_img=[];
        if(isset($_POST['product_img']) && $_POST['product_img']!=''){
         for ($i = 0; $i < count($_POST['product_img']); $i++)
	 {
            $fImage=$_POST['product_img'][$i];
           
            $imageProductName=strtotime(date('y-m-d h:i:s')).$i.'image.jpeg'; 
             array_push($product_img,$imageProductName);
            $feature_imgname=$imageName;
            $source = fopen($fImage, 'r');
            $path = 'product_pic/'.$imageProductName;
            $destination = fopen($path, 'w');
            stream_copy_to_stream($source, $destination);
            fclose($source);
            fclose($destination);
			
	 }
	} 

 
  if(!isset($flage_feature) && !isset($flage_img))
  {
	 $pic_name = implode(",",$product_img);
	 
	 $product_status = "Unpublish";
	 $product_info = array(
	 'product_name' => $product_name ,
	 'product_desc' => $product_desc ,
	 'short_description' => $short_desc ,
	 'product_price' => $product_price ,
	 'product_cat_id' => $product_cat_id ,
	 'subproduct_cat_id' => $subproduct_cat_id ,
	 'product_img' => $pic_name,
	 'product_featureimg' => $feature_imgname ,
	 'status' => $product_status,
	 'product_SKU' => $product_quantity,
	 'product_weight' => $product_weight,
	 'product_shipping' => $product_shipping,
	 'product_tag'=>$product_tag
	);
	 $tab_product = "product";
	 $result = add_product($con,$product_info,$tab_product);
	 if($result == true)
	 {
		  echo $last_id = mysqli_insert_id($con);
		  $msg = "<h5 style='text-align: center;color: green;'>Product  Add Succesfully </h5>";
		  
	 }else{
		 
		 $msg = "<h5 style='text-align: center;color: red;'>Product Not Add </h5>";
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
        Add Product
		<small><a href="product-list.php">Product List</a> | <a href="salestax.php">Sales Tax</a> </small>
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
        
        <li class="active">Add Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
		<div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Add Product</h3>

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
        <input type="text" name="product_name" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
		<div class="form-group">
        <label>Product Price</label>                
        <input type="text" name="product_price" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
		<div class="form-group">
        <label>Product Quantity</label>                
        <input type="text" name="product_quantity" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
		<div class="form-group">
        <label>Product Weight</label>                
        <input type="text" name="product_weight" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
		<div class="form-group">
        <label>Shipping Charge</label>                
        <input type="text" name="product_shipping" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
		
		<div class="form-group">
        <label>Category</label>                
		<select name="product_cat_id" id="category" class="form-control select2 select2-hidden-accessible" required>
		<option value="">Select Category</option>
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
		<option value="">Select Sub Category</option>

		</select>
		</div>
		
		</div>

		<div class="form-group">
        <label>Tag</label>                
        <input type="text" name="product_tag" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required >
		</div>
				
		<div class="form-group">
        <label>Short Description</label>                
		<textarea rows="2" cols="50" name="short_desc" id="editor1" class="form-control select2 select2-hidden-accessible" required></textarea>
		</div>
		<div class="form-group">
        <label>Description</label>                
		<textarea rows="4" cols="50" name="product_desc" id="editor2" class="form-control select2 select2-hidden-accessible" required></textarea>
		</div>
		
		<div class="form-group"> 
		<label>Feature Images</label>  
                  <input type="file" name="feature_img" id="r_product_temp_f_image"  required />
                  <div id="r_feature_image_preview"></div>     
        
		</div>
		
		<div class="form-group">
		<label>Product Other Images</label>                
                 <div id="filediv">
                     <input type="file" name="product_img[]" id="file"  required />
                     <div id="r_product_image_preview"></div>
                 
                 </div>
		<br/>
		<input type="button" id="add_more" class="upload" value="Add More Files" />
                <div id="r_addmore_files_append"></div>
                
         <div class="modal fade in" id="modal-default" style="display: none; padding-right: 17px;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="r_popup_close">Ã—</span></button>
                <h4 class="modal-title">Choose your image location</h4>
              </div>
              <div class="modal-body">
                <img src="../images/beard-three.png" id="r_feature_img" style="max-width: 100%;"/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left r_popup_close" >Close</button>
                <span id="r_preview_image_error" style="color:red"></span>
                <button type="button" class="btn btn-primary r_submit_crop_image">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		</div>
		
		<div class="form-group">            
        <input type="submit" name="add_product" class="form-control select2 select2-hidden-accessible" style="width: 100%;" value="ADD PRODUCT" >
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

  <script src="../js/rcrop.min.js"></script>
 
  <link rel="stylesheet" href="../css/rcrop.min.css" type="text/css" />
  <script src="../js/adminjs.js"></script>
<script>
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
