<?php
require('config.php');

function insert_menu($con,$menu_info)
{
	
	 $sql = "INSERT INTO menu SET";
	foreach($menu_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

function update_menu($con,$menu_id,$menu_info)
{
	
	$sql = "UPDATE menu SET" ;
	foreach($menu_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE id='$menu_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

function loginuser($con,$login_arrays)
{
	$sql = "SELECT *FROM admininfo WHERE";
	foreach($login_arrays as $key=>$value)
	{
	 $sql = $sql." $key ='$value' AND ";
	}
	$sql_main = rtrim($sql," AND");
	$run = mysqli_query($con,$sql_main) or die(mysqli_error($con)) ;
	
	$row_count = mysqli_num_rows($run);
	return $row_count;
}


function insert_users($con,$user_info,$tab_name)
{
	$sql = "INSERT INTO $tab_name SET";
	foreach($user_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

function registration($con,$user_info)
{
	$sql = "INSERT INTO users SET";
	foreach($user_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

function showuserdata($con,$id,$tab_name)
{
$sql = "SELECT *FROM $tab_name WHERE user_id = '$id'";	
$run = mysqli_query($con,$sql) or die(mysqli_error($con)) ;
$user_info = mysqli_fetch_array($run);
return $user_info;
}

function update_users($con,$id,$user_info,$tab_name)
{
	$sql = "UPDATE $tab_name SET" ;
	foreach($user_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE user_id='$id'";
	
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

function update_password($con,$id,$new_p)
{
	$sql = "UPDATE admin_user SET password = '$new_p' WHERE id='$id'" ;
	
    $run = mysqli_query($con,$sql) or die(mysqli_error($con));
	return $run;
}


function add_category($con,$cat_info,$tab_category)
{
	$sql = "INSERT INTO $tab_category SET";
	foreach($cat_info as $key=>$value)
	{
	 $sql = $sql." $key = '".strtolower($value)."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}


function update_category($con,$cat_info,$cat_id,$tab_category)
{
	$sql = "UPDATE $tab_category SET" ;
	foreach($cat_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE cat_id='$cat_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}


function add_product($con,$product_info,$tab_product)
{
	$sql = "INSERT INTO $tab_product SET";
	foreach($product_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

function update_product($con,$product_info,$edit_uid,$tab_product)
{
	$sql = "UPDATE product SET" ;
	foreach($product_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE product_id='$edit_uid'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

function update_slider($con,$slider_id,$slider_info)
{
	$sql = "UPDATE slider SET" ;
	foreach($slider_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE slider_id='$slider_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}





function showcategory($con)
{
$sql = "SELECT DISTINCT cat_name  FROM category";	
$run = mysqli_query($con,$sql) or die(mysqli_error($con)) ;

return $run;
}

function showsubcategory($con,$cat_name)
{
$sql = "SELECT DISTINCT sub_cat_name  FROM category WHERE cat_name = '$cat_name'";	
$run = mysqli_query($con,$sql) or die(mysqli_error($con)) ;

return $run;
}

function update_order($con,$order_status,$order_id)
{
	$sql = "UPDATE orders SET order_status = '$order_status'  WHERE order_id = '$order_id'";
    $run = mysqli_query($con,$sql) or die(mysqli_error($con));
	return $run;
}

function add_coupon($con,$coupon_info)
{
	$sql = "INSERT INTO coupon SET";
	foreach($coupon_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}


function update_coupon($con,$coupon_info,$coupon_id)
{
	$sql = "UPDATE coupon SET" ;
	foreach($coupon_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE coupon_id='$coupon_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}


function add_slider($con,$slider_info)
{
	$sql = "INSERT INTO slider SET";
	foreach($slider_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}


function insert_page($con,$page_info)
{
	$sql = "INSERT INTO pages SET";
	foreach($page_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

function update_page($con,$page_id,$page_info)
{
	$sql = "UPDATE pages SET" ;
	foreach($page_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE page_id='$page_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}


function topheader($con,$header_info)
{
	
	 $sql = "INSERT INTO topheader SET ";
	foreach($header_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

function updateheader($con,$header_info,$header_id)
{
	$sql = "UPDATE topheader SET" ;
	foreach($header_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE header_id='$header_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

function footerwidget($con,$widgets_info)
{
	
	 $sql = "INSERT INTO footer_widgets SET ";
	foreach($widgets_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}



function updatefooterwidget($con,$widgets_id,$widgets_info)
{
	$sql = "UPDATE footer_widgets SET" ;
	foreach($widgets_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE widgets_id='$widgets_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}

function subscribesidebar($con,$subscribe_info)
{
	$sql = "INSERT INTO subscribe_sidebar SET";
	foreach($subscribe_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}




function logowidgets($con,$logo_info)
{
	
	 $sql = "INSERT INTO logo_widgets SET ";
	foreach($logo_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}


function editlogowidgets($con,$logo_id,$logo_info)
{
	$sql = "UPDATE logo_widgets SET" ;
	foreach($logo_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE logo_id='$logo_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}


function sidebarwidgets($con,$sidebar_info)
{
	$sql = "INSERT INTO signup_sidebar SET";
	foreach($sidebar_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}




function updatesidebar($con,$sidebar_id,$sidebar_info)
{
	$sql = "UPDATE signup_sidebar SET" ;
	foreach($sidebar_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE sidebar_id='$sidebar_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}



function editsubscribesidebar($con,$subscontent_id,$subscribe_info)
{
	$sql = "UPDATE subscribe_sidebar SET" ;
	foreach($subscribe_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE subscontent_id='$subscontent_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}


function insert_tax($con, $tax_info)
{
	
	 $sql = "INSERT INTO sales_tax SET";
	foreach($tax_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,");
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}




function update_tax($con,$tax_info,$tax_id)
{
	$sql = "UPDATE sales_tax SET" ;
	foreach($tax_info as $key=>$value)
	{
	 $sql = $sql." $key = '".$value."' , " ;	 
	}
	$sql_main = rtrim($sql," ,")." WHERE sales_tax_id='$tax_id'";
    $run = mysqli_query($con,$sql_main) or die(mysqli_error($con));
	return $run;
}



function featureresize($width, $height){
  /* Get original image x y*/
  list($w, $h) = getimagesize($_FILES['feature_img']['tmp_name']);
  /* calculate new image size with ratio */
  $ratio = max($width/$w, $height/$h);
  $h = ceil($height / $ratio);
  $x = ($w - $width / $ratio) / 2;
  $w = ceil($width / $ratio);
  
  /* new file name */
  $path = 'product_pic/'.$_FILES['feature_img']['name'];
  /* read binary data from image file */
  $imgString = file_get_contents($_FILES['feature_img']['tmp_name']);
  /* create image from string */
  
  $image = imagecreatefromstring($imgString);
  $tmp = imagecreatetruecolor($width, $height);
  
  imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
    
  /* Save image */
  
  
  switch ($_FILES['feature_img']['type']) {
    case 'image/jpeg':
      imagejpeg($tmp, $path, 100);
      break;
    case 'image/png':
      imagepng($tmp, $path, 0);
      break;
    case 'image/gif':
      imagegif($tmp, $path);
      break;
    default:
      exit;
      break;
  }
  
  } 


// Product Image Resize

function resize($width, $height,$i){
  /* Get original image x y*/
  list($w, $h) = getimagesize($_FILES['product_img']['tmp_name'][$i]);
  /* calculate new image size with ratio */
  $ratio = max($width/$w, $height/$h);
  $h = ceil($height / $ratio);
  $x = ($w - $width / $ratio) / 2;
  $w = ceil($width / $ratio);

  
  /* new file name */
  $path = 'product_pic/'.$_FILES['product_img']['name'][$i];
  /* read binary data from image file */
  $imgString = file_get_contents($_FILES['product_img']['tmp_name'][$i]);
  
  /* create image from string */
  $image = imagecreatefromstring($imgString);
  $tmp = imagecreatetruecolor($width, $height);
  imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
  /* Save image */
  switch ($_FILES['product_img']['type'][$i]) {
    case 'image/jpeg':
      imagejpeg($tmp, $path, 100);
      break;
    case 'image/png':
      imagepng($tmp, $path, 0);
      break;
    case 'image/gif':
      imagegif($tmp, $path);
      break;
    default:
      exit;
      break;
  }
 
 
} 

function tagList($con)
{
$sql = "SELECT id FROM tag";	
$run = mysqli_query($con,$sql) or die(mysqli_error($con)) ;
$user_info = mysqli_fetch_array($run);
return $user_info;
}

?>