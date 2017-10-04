		<?php
		session_start();
		require_once('../config.php');
		require_once('../session.php');
		require_once('../function.php');

		$product_id = $_GET['last_id'];
		$sql_list = "SELECT product_featureimg FROM product WHERE product_id = '$product_id' ";
		$run_list = mysqli_query($con,$sql_list) or die(mysqli_error($con));
		$data_admin = mysqli_fetch_array($run_list);

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		$targ_w = 500;
		$targ_h = 400;
		
		$jpeg_quality = 90;
		$name = $_POST['images'];
		$src = '../product_pic/'.$name;
		$test = 1;
		$img = explode('.',$src);
		$imagetype = end($img);
		
		if($imagetype == "png")
		{
		echo $img_r = imagecreatefrompng($src);	
		}else if($imagetype == "jpg" || $imagetype == "jpeg")
		{
	   $img_r = imagecreatefromjpeg($src);	
		}

		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

		$text = imagecopyresized($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
		$targ_w,$targ_h,$_POST['w'],$_POST['h']);

		header('Content-type: image/jpeg');

		if($test == 1)
		{
		$ttt = "../product_pic/".$name;
		imagejpeg($dst_r,$ttt);
		//header('Location: ../product-list.php');
		echo '<script type="text/javascript">';
        echo 'window.location.href="../product-list.php";';
        echo '</script>';
		}

		}

		// If not a POST request, display page below:

		?>
		<html lang="en">
		<head>
		<title>Live Cropping Demo</title>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.Jcrop.js"></script>
		<link rel="stylesheet" href="demo_files/main.css" type="text/css" />
		<link rel="stylesheet" href="demo_files/demos.css" type="text/css" />
		<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />


		<script type="text/javascript">

		$(function(){

		$('#cropbox').Jcrop({
		aspectRatio: 1,
		onSelect: updateCoords
		});

		});

		function updateCoords(c)
		{
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
		};

		function checkCoords()
		{
		if (parseInt($('#w').val())) return true;
		alert('Please select a crop region then press submit.');
		return false;
		};





		</script>
		<style type="text/css">
		#target {
		background-color: #ccc;
		width: 500px;
		height: 330px;
		font-size: 24px;
		display: block;
		}


		</style>

		</head>
		<body>

		<div class="container">
		<div class="row">
		<div class="span12">
		<div class="jc-demo-box">
        <p><a href="../product-list.php">Skip</a></p>
		
		<!-- This is the image we're attaching Jcrop to -->
		<img src="../product_pic/<?php echo $data_admin['product_featureimg'];?>" id="cropbox" width="60%" />
		<div id="upload-demo" style="width:350px"></div>
		<!-- This is the form that our event handler fills -->
		<form action="" method="post" onsubmit="return checkCoords();">
		<input type="hidden" name="images" value="<?php echo $data_admin['product_featureimg'];?>" />
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />
		<input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
		
		</form>






		</div>
		</div>
		</div>
		</div>
		</body>

		</html>
