        
		<footer>
		<div class="container">
		<div class="col-left">
		<?php
		if($widgets_name = "widgets-1")
		{
		$run_footer = showfooter($con,$widgets_name);	
		$data_footer = mysqli_fetch_array($run_footer);
		?>
		<h5><?php echo $data_footer['widget_title'];?></h5>
		<?php echo $data_footer['content'];
		}
		?>
		</div>
		<div class="col-left">
		<?php
		if($widgets_name = "widgets-2")
		{
		$run_footer = showfooter($con,$widgets_name);	
		$data_footer = mysqli_fetch_array($run_footer)			
		?>
		<h5><?php echo $data_footer['widget_title'];?></h5>
		<?php echo $data_footer['content'];
		}
		?>
		</div>
		<div class="col-left">
		<?php
		if($widgets_name = "widgets-3")
		{
		$run_footer = showfooter($con,$widgets_name);	
		$data_footer = mysqli_fetch_array($run_footer);	
		?>
		<h5><?php echo $data_footer['widget_title'];?></h5>
		<?php echo $data_footer['content'];
		}
		?>
		</div>
		<div class="col-left">
		<ul  class="connect">
		<?php
		if($widgets_name = "widgets-4")
		{
		$run_footer = showfooter($con,$widgets_name);	
		$data_footer = mysqli_fetch_array($run_footer);	
		?>
		<h5><?php echo $data_footer['widget_title'];?></h5>
		<?php echo $data_footer['content'];
		}
		?>
		</ul>
		<ul class="social-icon">
		<?php
		if($widgets_name = "widgets-5")
		{
		$run_footer = showfooter($con,$widgets_name);	
		$data_footer = mysqli_fetch_array($run_footer);
		echo $data_footer['content'];	
		}			
		?>
		</ul>    
		</div>
		</div>
		<div class="pre-footer">
		<div class="container">
		<div class="col-sm-8">
		<div class="pre-footer-menu">
		<?php
		if($widgets_name = "widgets-6")
		{
		$run_footer = showfooter($con,$widgets_name);	
		$data_footer = mysqli_fetch_array($run_footer);	
		echo $data_footer['content'];
		}
		?>
		</div>
		</div>
		<div class="col-sm-4">
		<div class="dearbird">
		<?php
		$widgets_name = "widgets-7";
		$run_footer = showfooter($con,$widgets_name);
		$data_footer = mysqli_fetch_array($run_footer);
		echo $data_footer['content'];
		?>
		</div>
		</div>
		</div>
		</div>
		<div class="clearfix"></div>
		</footer>
	<!--footer-->
    <!--main jquery-->
    <script src="js/jquery.min.js"></script>
    <!--bootstrap min js-->
    <script src="js/bootstrap.min.js"></script>
    <!--owl carousel-->
    <script src="js/owl.carousel.min.js"></script>
    <!--star rating js-->
    <script src="js/star-rating.js"></script>
    <!--easing  js-->
    <script src="js/jquery.easing.min.js"></script>
    <!--scrolling nav js-->
    <script src="js/scrolling-nav.js"></script>
    <!--custom js-->
    <script src="js/custom.js"></script>
		</body>
		</html>