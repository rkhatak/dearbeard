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

$sql_sliderfirst = "SELECT *FROM slider limit 0,1";
$run_sliderfirst = mysqli_query($con,$sql_sliderfirst) or die(mysqli_error($con));
$data_sliderfirst = mysqli_fetch_array($run_sliderfirst);

$sql_slider = "SELECT *FROM slider limit 1,10";
$run_slider = mysqli_query($con,$sql_slider) or die(mysqli_error($con));


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jQuery &amp; Bootstrap Carousel Demo</title>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body>

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  
  
  <div class="carousel-inner">
      <div class="item active"> <img src="slider_pic/<?php echo $data_sliderfirst['slider_img'];?>" style="width:100%" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>
		  <?php if(!empty($data_sliderfirst['slider_title']))
		  {
			echo $data_sliderfirst['slider_title'];  
		  }
		  ?>
		  </h1>
           <p>
		   <?php if(!empty($data_sliderfirst['slider_text']))
		  {
			echo $data_sliderfirst['slider_text'];  
		  }
		  ?>
		  </p>
          <p>
		  <?php if($data_sliderfirst['button_status'] == 'Active')
		  {
		  ?>
		  <a class="btn btn-lg btn-primary" href="<?php echo $data_sliderfirst['slider_link'];?>" role="button" target="_blank"><?php echo $data_sliderfirst['button_title'];?></a>
		  <?php
		  }
		  ?>
		  </p>
        </div>
      </div>
    </div>
  <?php
  while($data_slider = mysqli_fetch_array($run_slider))
  {
  ?>
    <div class="item"> <img src="slider_pic/<?php echo $data_slider['slider_img'];?>" style="width:100%" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>
		  <?php if(!empty($data_slider['slider_title']))
		  {
			echo $data_slider['slider_title'];  
		  }
		  ?>
		  </h1>
          <p>
		   <?php if(!empty($data_slider['slider_text']))
		  {
			echo $data_slider['slider_text'];  
		  }
		  ?>
		  </p>
          <p>
		  <?php if($data_slider['button_status'] == 'Active')
		  {
		  ?>
		  <a class="btn btn-lg btn-primary" href="<?php echo $data_slider['slider_link'];?>" role="button" target="_blank"><?php echo $data_slider['button_title'];?></a>
		  <?php
		  }
		  ?>
		  </p>
        </div>
      </div>
    </div>
    <?php
	}
	?>
   
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> 
  </div>
  

</body>
</html>
