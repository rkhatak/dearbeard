<?php
require('header.php');
// Page Content
	

		if($pagename = 'Contact Us')
		{
		$page_content = pagecontent($con,$pagename);
		}
?>
<!--sticky div-->

    <div class="clearfix"></div>
    
    <!--contact us-->
	

    <div id="contact_us">
   		<div class="container">
    		<div class="row">
            		<div class="col-sm-12">
    					 <ol class="breadcrumb">
                      		<li><a href="#">Home</a></li>
                      		<li><a href="#">Hair Care</a></li>
                      		<li><a href="#">Shower Starter Kit</a></li>
                    	</ol>
                	</div>
                    <div class="col-sm-12">
                    	<h3>Contact us</h3>
                    </div>
    		</div>
    		<div class="row">
            	<div class="col-sm-12">
  					<p>Contact us to find out more or how we can help you better.</p>
                </div>
   			</div>
    	</div>
    </div>
    <!--contact us-->
    <!--map-->
    <div id="map_area">
    	<div class="container">
    		<div class="row">
    			<div class="con-adress col-sm-5">
    				<ul>
    					<li>
    						<h5>NOS'T SUPPLY .CO</h5>
    						<p>3100 West Cary Street Richmond, Virginia 23221</p>
   				 			<p>P: 804.355.4383 F: 804.367.7901</p>
    					</li>
    					<li>
    						<h5>Store Hours</h5>
    						<p>Monday–Saturday 11am–7pm ET</p>
    						<p>Sunday 11am–6pm ET</p>
   							<p>Afternoon</p>
    					</li>
    					<li>
    						<h5>Specialist Hours</h5>
    						<p>Monday–Friday 9am–5pm ET</p>
    					</li>
    				</ul>
    			</div>
    			<div class="con-map col-sm-7">
    				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3163.0779648588646!2d-77.48228948505212!3d37.5532268798004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b113e5350e7283%3A0x5b260df5a92d2726!2s3100+W+Cary+St%2C+Richmond%2C+VA+23221%2C+USA!5e0!3m2!1sen!2sin!4v1505994134051" class="map"></iframe>
    			</div>
    		</div>
    	</div>
    </div>
    <!--map-->
    <!-- contact form-->
    <div id="con-form">
						
    	<div class="container">
		<div id="r_error_contact" style="display:none">Thank you for contact us, We will get back to you soon.</div>
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" name="r_contact_name" id="r_contact_id">
    			<div class="row">
    				<div class="col-sm-6 col-xs-12 form-group">
    					<label for="name">Name</label>
    					<input type="text" name="name" class="form-control" id="name">
						<div class="regfname name_regfname"></div>
    				</div>
    				<div class="col-sm-6 ol-xs-12 form-group">
    					<label for="email">Email</label>
    					<input type="text" name="email" id="email" class="form-control">
						<div class="regfname email_regfname"></div>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-sm-12 form-group">
    					<label for="phonenumber">Phone Number</label>
    					<input type="text" name="phonenumber" id="phonenumber" class="form-control">
						<div class="regfname phonenumber_regfname"></div>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-sm-12 form-group">
    					<label for="message">Message</label>
    					<textarea class="form-control" name="message" id="message"></textarea>
						<div class="regfname message_regfname"></div>
    				</div>
					
    			</div>
				<div class="row">
					<div class="g-recaptcha" data-sitekey="6LekCTUUAAAAAAS3hfBXi7Eixwo2__o2D06sqvKh"></div>
					<div class="captcha_error" style="color:red"></div>
				</div>
    			<div class="row">
                	<div class="col-sm-12 form-group">
    					<input type="button" value="SEND" class="send" id="r_contact_form_submit">
                    </div>
    			</div>
    		</form>
    	</div>
    </div>
    <!-- contact form-->
      
    <div class="clearfix"></div>
      
    <div class="clearfix"></div>
	<!--footer-->
<?php
		require('footer.php');
?>