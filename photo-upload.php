<?php
require('admin/config.php');
if(isset($_POST))
{ 
 $photo_name = $_FILES['photo']['name'];
 $tmp_name = $_FILES['photo']['tmp_name'];
 $photo_type = $_FILES['photo']['type'];
 
 if($photo_type == "image/jpeg" || $photo_type == "image/png" || $photo_type == "image/jpg" || $photo_type == "image/gif" )
 {
  list($width,$height) = getimagesize($tmp_name);
  if($width==150 && $height==150)
  {
	if(move_uploaded_file($tmp_name,'admin/photo/'.$photo_name))
  {
  $photo_sql = "INSERT INTO minislider SET minislider_image = '$photo_name'";
  $photo_run = mysqli_query($con,$photo_sql) or die(mysqli_error($con));
  if($photo_run == true)
  {
	  //header('Location:index.php');
	  echo "<script>
alert('Your Photo Upload Seccessfully');
window.location.href='index.php';
</script>";
	 
  }
  
 }else{
	  echo "<script>
alert('Please Try Again');
window.location.href='index.php';
</script>";
 }
 
 }else{
	 
	 echo "<script>
alert('Please Upload max height , width 150 ');
window.location.href='index.php';
</script>";
 }
 }else{
	 echo "<script>
alert('Please Select Correct Photo');
window.location.href='index.php';
</script>";
 }
 }
 ?>
 
 