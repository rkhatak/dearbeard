<?php
$path = "uploads/";
$valid_file_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['photo']['name'];
$size = $_FILES['photo']['size'];
if(strlen($name)) {
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_file_formats)) {
if($size<(1024*1024)) {
$image_name = time().$session_id.".".$ext;
$tmp = $_FILES['photo']['tmp_name'];
if(move_uploaded_file($tmp, $path.$image_name)){
mysql_query("UPDATE users SET profile_photo='$image_name' WHERE uid='$session_id'");
echo "<img src='uploads/".$image_name."' class='preview'>";
}
else
echo "Image Upload failed";
}
else
echo "Image file size maximum 1 MB";
}
else
echo "Invalid file format";
}
else
echo "Please select image";
exit;
}
?>