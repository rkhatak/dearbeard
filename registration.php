        <?php
        require('header.php');
  
        if(isset($_POST['register']))
        {
        $f_name = mysqli_real_escape_string($con,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = md5(mysqli_real_escape_string($con,$_POST['password']));
        $c_password = md5(mysqli_real_escape_string($con,$_POST['c_password']));
        $contact = mysqli_real_escape_string($con,$_POST['contact']);
        $city = mysqli_real_escape_string($con,$_POST['city']);
        $zip = mysqli_real_escape_string($con,$_POST['zip']);
        $country = mysqli_real_escape_string($con,$_POST['country']);
        $state = mysqli_real_escape_string($con,$_POST['state']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $UserIP = $_SERVER['REMOTE_ADDR'];
        $count_email = checkemail($con,$email);
        if($count_email == 0)
        {
        if($password == $c_password )
        {
        // Country Name
        $sql_country = "SELECT name FROM countries WHERE id = '$country' ";
        $run_country = mysqli_query($con,$sql_country) or die(mysqli_error($con));
        $data_country = mysqli_fetch_array($run_country);
        $country_name = $data_country['name'];
        
        // State Name
        $sql_state = "SELECT name FROM states WHERE id = '$state' ";
        $run_state = mysqli_query($con,$sql_state) or die(mysqli_error($con));
        $data_state = mysqli_fetch_array($run_state);
        $state_name = $data_state['name'];
        
        
        $user_info = array(
        'UserEmail' => $email ,
        'UserPassword' => $c_password,
        'UserFirstName' => $f_name ,
        'UserLastName' => $lastname ,	
        'UserCity' => $city ,
        'UserState' => $state_name ,
        'UserZip' => $zip ,
        'UserIP' => $UserIP ,
        'UserPhone' => $contact ,
        'UserCountry' => $country_name ,
        'UserAddress' => $address 
        );
        $result = registration($con,$user_info);
        if($result == true)
        {
        $sql_ship = "SELECT UserID FROM users WHERE UserEmail = '$email' ";
        $run_ship = mysqli_query($con,$sql_ship) or die(mysqli_error($con));
        $data_ship = mysqli_fetch_array($run_ship);
        $userid = $data_ship['UserID'];
        $_SESSION['UserEmail'] = $email;
        $_SESSION['uname'] = $email;
        $_SESSION['UserId'] = $userid;
        echo '<script type="text/javascript">';
        echo 'window.location.href="userpanel/index.php";';
        echo '</script>';
        
        
        // insert user info into shiping table
        
        $sql_ship = "INSERT INTO users_shiping SET UserID = '$userid' , UserEmail = '$email' ";
        $run_ship = mysqli_query($con,$sql_ship) or die(mysqli_error($con));
        
        $msg = "<h5 style='text-align: center;color: green;'>Your Registration Success</h5>";
        
        //User Email
        
        $touser = $email;
        
        $userheaders = "From: panchal061090@gmail.com";
        $usersubject = "Registration Mail";
       
        $usermassege = "Dear User Thanks For Registration We Will Contact You";
        
        $send = mail($touser,$usersubject,$usermassege,$userheaders);
        
        //Admin Email
        
        
        $adminto = "panchal061090@gmail.com";
        
        $adminheaders = "From: ".$email;
        $adminsubject = "Registration Mail";
       
        $adminmassege = "New User Registre on this Website";
        
        $send = mail($adminto,$adminsubject,$adminmassege,$adminheaders);
        
        
        }	
        
        }
        else
        {
        $msg = "<h5 style='text-align: center;color: green;'>Password Not Match</h5>"; 
        }
        }else{
        $msg = "<h5 style='text-align: center;color: green;'>Your Email Allready Registred</h5>";
        }
        }
        
        // show country
        
        $country = showcountry($con);
        ?>
        
        <!--sticky div-->    
        <!--registration-->
        <div id="registration">
        <div class="container">
        <div class="row">
        <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Registration</a></li>
        </ol>
        <h3>New Account</h3>
        <?php
        if(isset($msg))
        {
        echo $msg;
        }
        ?>
        <div class="registration-form">
        <div class="row">
        <form name="registration" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="col-sm-6">
        <div class="form-group">
        <label for="reg-fname">First Name</label>
        <input type="text" name="firstname" id="reg-fname" class="form-control">	
        </div>
        <div class="regfname"></div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="reg-lname">Last Name</label>
        <input type="text" name="lastname" id="reg-lname" class="form-control">	
        </div>
        <div class="reglname"></div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="reg-address">Address</label>
        <input type="text" name="address" id="reg-address" class="form-control">	
        </div>
        <div class="regaddress"></div>
        </div>
        
        <div class="col-sm-6">
        <div class="form-group">
        <label for="country">Country</label>
        <select name="country" id ="country" class="form-control down">
        <option value="">Choose A Country</option>
        <?php
        
        while($data_country = mysqli_fetch_array($country))
        {
        ?>
        <option value="<?php echo $data_country['id'];?>"><?php echo $data_country['name'];?></option>
        <?php
        }
        ?>									
        </select>
        </div>
        <div class="regcountry"></div>
        </div>
        
        <div class="col-sm-6">
        <div class="form-group">
        <label for="stateresponse">State / Province</label>
            <div id="stateresponse">
        <select name="state" id="state" class="form-control down">
        <option value="">Choose A State</option>
        				
        </select>
        </div>									
        </div>                                                                
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="city">Suburb / City</label>
        <div id="cityresponse">
        <select name="city" id ="city" class="form-control down">
        <option>Choose A City</option>
        				
        </select>	
        </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="reg-zip">Zip/Postcode</label>
        <input type="text" name="zip" id="reg-zip" class="form-control">	
        </div>
        <div class="regzip"></div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="reg-email">Email Address</label>
        <input type="email" name="email" id="reg-email" class="form-control">
        </div>
        <div class="regemail"></div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="reg-pwd">Password</label>
        <input type="password" name="password" id="reg-pwd" class="form-control">	
        </div>
        <div class="regpwd"></div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="reg-cpwd">Confirm Password</label>
        <input type="password" name="c_password" id="reg-cpwd" class="form-control">
        </div>
        <div class="regcpwd"></div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="reg-phone">Phone Number</label>
        <input type="text" name="contact" id="reg-phone" class="form-control">	
        </div>
        <div class="regphone"></div>
        </div>
        
        <div class="clearfix"></div>
        <div class="col-sm-12 text-center">
        <button type="submit" name="register" class="registre-button">create account</button>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div><!--container-->
        </div><!--registration-->
        
        <div class="clearfix"></div>
        
        <!--footer-->
        <?php
        require('footer.php');
        ?>