<?php
require('header.php');

?>
	<!--sticky div-->    
    <!--not found-->
    <div id="not-found">
    	<div class="container">	
        	<div class="row">
            	<ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Dearbeard</a></li>
                </ol>
                <div class="no-found">
                	<img src="images/sad-face.svg" alt="sad">
                    <h1>Sorry ! Page Not Found</h1>
                    <p>we are sorry but the page you are looking for does nor exist. You could return to <a href="index.html">homepage</a></p>
                    <div class="no-found-form">
                    	<form method="post" action="#">
                        	<div class="form-group">
                            	<input type="text" class="form-control" placeholder="Search Entire Store Here...">
                            </div>
                            <button type="submit" class="no-search-btn">submit</button>
                        </form>
                    </div>
                </div>
			</div>
       	</div>
   	</div>    
    <!--not found-->        	

   <div class="clearfix"></div>
	
    <!--footer-->
		<?php
		require('footer.php');
		?>