<?php
require_once('header.php');
$path = "profile_pic/";
if(isset($_POST))
{
$name = $_FILES['photo']['name'];
$id = $_POST['id'];
$size = $_FILES['photo']['size'];
$tmp = $_FILES['photo']['tmp_name'];
$imageFileType = $_FILES['photo']['type'];

if($imageFileType == "image/jpg" || $imageFileType == "image/png" || $imageFileType == "image/jpeg"
|| $imageFileType == "image/gif")
{

list($width, $height) = getimagesize($tmp);

if(($width>=50 && $width<=200) && ($height>=50 && $height<=200))
{
$upload = move_uploaded_file($tmp, $path.$name);
if($upload == true){
$sql_pic = "UPDATE users SET Userpic='$name' WHERE UserId='$id'";
$run_pic = mysqli_query($con,$sql_pic) or die(mysqli_error($con));
if($run_pic == true)
{

//header('location:index.php');
echo "<script>window.location ='index.php';</script>";
}
}else
{
$error = "Image Not Uploaded Please Try Again";
//header('location:index.php?error='.$error);
echo "<script>window.location ='index.php?error=$error';</script>";
}
}else{
$error = "Please Upload image of 50 to 200 height and width";
//header('location:index.php?error='.$error);
echo "<script>window.location ='index.php?error=$error';</script>";
}
}else{

$error = "Please Upload image Correct Formate";
//header('location:index.php?error='.$error);
echo "<script>window.location ='index.php?error=$error';</script>";
}
}
?>