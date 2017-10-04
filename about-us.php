<?php
require('header.php');
// Page Content
		if($pagename = 'About Us')
		{
		$page_content = pagecontent($con,$pagename);
		}
?>
<!--sticky div-->
    <div class="clearfix"></div>
    <!--faq-->
	<div id="faq">
	    <div class="container">
        	<div class="row">
                    <ol class="breadcrumb">
                      <li><a href="#">Home</a></li>
                      <li><a href="#">About Us</a></li>
                    </ol>
                <div class="external-box">
                	<div class="inner-box">
                    	<h1><?php echo $page_content['page_title'];?></h1>
                    </div><!--inner box-->
                    <h2>who we are</h2>
		        </div><!--outerbox-->
                <div class="faq-down"><img src="images/faq-down.svg" alt="down"></div>
                <div class="content">
				<?php echo $page_content['content'];?>
                	</div>                
            </div><!--row-->
        </div><!--container-->
    </div>
    <!--faq-->
    <div class="clearfix"></div>
	<!--footer-->
	<?php
		require('footer.php');
		?>