<?php
session_start();
require('config.php');
require('session.php');
require('function.php');
if(isset($_GET['name']))
{
$catname = $_GET['name'];
$sql = "SELECT sub_cat_name FROM category WHERE cat_name ='$catname'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
}

?>
<html>

<body>
<select name="subproduct_cat_id" class="form-control select2 select2-hidden-accessible" required>
<option value="">Select Sub Category</option>
<?php
while($data_sub_cat = mysqli_fetch_array($res))
{
?>
<option value="<?php echo $data_sub_cat['sub_cat_name']?>"><?php echo $data_sub_cat['sub_cat_name']?></option>	
<?php
}	
?>
</select>
</body>
</html>