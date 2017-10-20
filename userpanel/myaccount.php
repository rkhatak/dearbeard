<?php
require('header.php');

?><!--sticky div-->    
	<!--Account-->
    <div id="myaccount">
    	<div class="container">
        	<div class="row">
            	<ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">My Account</a></li>
                </ol>
                
                <div class="login-top">
                	<div class="row">
                    	<div class="col-sm-3">
                            <div class="col-left">
                            	<a href="#">
                                	<img src="images/login-img.gif" alt="person" class="img-circle">
                                    <input type="file" id="my_file" style="display: none;" />
                                    <h6>abc@gmail.com</h6>
                                </a>
                             </div>
                             
                             <div class="dashboard">
                            	<ul>
                                	<li class="active"><a href="myaccount.html"><i class="fa fa-tachometer" aria-hidden="true"></i> dashboard</a></li>
                                    <li><a href="myaccount-download.html"><i class="fa fa-download" aria-hidden="true"></i>  my downloads</a></li>
                                    <li><a href="myaccount-order.html"><i class="fa fa-file-text-o" aria-hidden="true"></i> my orders</a></li>
                                    <li><a href="myaccount-account.html"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit account</a></li>
                                    <li><a href="myaccount-address.html"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit address</a></li>
                                    <li><a href="myaccount-contact.html"><i class="fa fa-file-text-o" aria-hidden="true"></i> contact-form</a></li>
                                    <li><a href="https://www.google.com" target="_blank"><i class="fa fa-link" aria-hidden="true"></i> custom link<a></li>
                                    <li><a href="myaccount-content.html"><i class="fa fa-area-chart" aria-hidden="true"></i> content with image<a></li>
                                    <li><a href="myaccount-signout.html"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> logout</a></li>
                                </ul>
                            </div><!--dashboard-->
                            
                        </div>
                        <div class="col-sm-9">
                            <div class="signout">
                            	<p>Hello abc@gmail.com (not abc@gmail.com? <a href="#" class="out"> Sign out </a>)</p>
                                
                                <p>From your account dashboard you can view your <a href="myaccount-order.html" class="out">recent orders</a>, manage your <a href="myaccount-address.html" class="out">shipping and billing addresses </a> and <a href="myaccount-account.html" class="out">edit your password and account details</a>.</p>
                                
                            </div><!--signout-->
                        </div>
		            </div>
                </div>
                
        </div><!--container-->
   </div><!--account-->

   <div class="clearfix"></div>
	
    <!--footer-->
	<?php
		require('footer.php');
		?> 