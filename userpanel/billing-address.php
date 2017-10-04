    <?php
    require_once('header.php');
    $useremail = $_SESSION['UserEmail'];
    $UserId = $_SESSION['UserId'];
    $user_data = user_info($con,$useremail);
    
    // show country
    
    $country = showcountry($con);
    
    if(isset($_POST['edit_billing']))
    {
    $f_name = mysqli_real_escape_string($con,$_POST['f_name']);
    $l_name = mysqli_real_escape_string($con,$_POST['l_name']);
    $country = mysqli_real_escape_string($con,$_POST['country']);
    $state = mysqli_real_escape_string($con,$_POST['state']);
    $city = mysqli_real_escape_string($con,$_POST['city']);
    $street = mysqli_real_escape_string($con,$_POST['street']);
    $zip = mysqli_real_escape_string($con,$_POST['zip']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    
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
    
    if(empty($country_name))
    {
    $country_name = $country;	
    }
    if(empty($state_name))
    {
    $state_name = $state;	
    }
    
    
    
    
    $user_info = array(
    'UserFirstName' => $f_name ,
    'UserLastName' => $l_name ,
    'UserPhone' => $phone ,
    'UserAddress' => $street ,
    'UserCity' => $city ,
    'UserZip' => $zip ,
    'UserState' => $state_name ,
    'UserCountry' => $country_name
    );
    $result = update_bill($con,$id,$user_info);
    if($result == true)
    {
    $msg = "<p style='text-align: center;color: green;'>Your Account Updated</p";
    }else{
    $msg = "<p style='text-align: center;color: red;'>Please Try Again</p";
    }
    
    }
    
    ?>
    <!--sticky div-->    
    <!--Account-->
    <div id="myaccount">
    <div class="container">
    <div class="row">
    <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Billing Address</a></li>
    </ol>
    
    <div class="login-top">
    <div class="row">
    <div class="col-sm-3">
    <div class="col-left">
    <p><?php if(isset($_GET['error'])){echo $_GET['error']; }?></p>
    <form name="profile" action="profile-upload.php" id="formpic" method="POST"  enctype=	"multipart/form-data" >
    <div class="pic_button"><img src="profile_pic/<?php echo $user_data['Userpic'];?>" alt="person" class="img-circle"></div>
    <input type="file" name="photo" id="my_file" style="display: none;" />
    <input type="text" name="id" value="<?php echo $UserId; ?>" style="display: none;" />
    
    <h6><?php echo $user_data['UserEmail'];?></h6>
    </form>
    </div>
    
    <?php require('menu.php');?><!--dashboard-->
    
    </div><!--col-sm-3-->
    <div class="col-sm-9">
    <div class="billing-address">
    <h4>billing address</h4>
    <div class="row">
    <?php if(isset($msg)){echo $msg;}?>
    <form name="edit_billing" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="col-sm-6">
    <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" name="f_name" id="f_name" class="form-control" value="<?php echo $user_data['UserFirstName']; ?>">
    </div>
    <div class="f_nameValid"></div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" name="l_name" id="l_name" class="form-control" value="<?php echo $user_data['UserLastName']; ?>">
    </div>
    <div class="l_nameValid"></div>
    </div>
    <div class="col-sm-12">
    <div class="form-group">
    <label for="Country">Country</label>
    <select name="country" id ="country" class="form-control down">
    <option value="<?php echo $user_data['UserCountry']; ?>"><?php echo $user_data['UserCountry']; ?></option>
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
    </div>
    
    <div class="col-sm-12">
    <div class="form-group">
    <label for="state">State</label>
    <div id="stateresponse">
    <select name="state" id="state" class="form-control down">
    <option value="<?php echo $user_data['UserState']; ?>"><?php echo $user_data['UserState']; ?></option>
    			
    </select>
    </div>
    </div>
    </div>
    
    <div class="col-sm-12">
    <div class="form-group">
    <label for="town">Town/City</label>
    <div id="cityresponse">
    <select name="city" id ="city" class="form-control down">
    <option value="<?php echo $user_data['UserCity']; ?>"><?php echo $user_data['UserCity']; ?></option>
    			
    </select>	
    </div>
    </div>
    </div>
    
    
    <div class="col-sm-12">
    <div class="form-group">
    <label for="streetaddress">Street Address</label>
    <input type="text" name="street" id="street" class="form-control" value="<?php echo $user_data['UserAddress']; ?>">
    </div>
    <div class="streetValid"></div>
    </div>
    
    <div class="col-sm-12">
    <div class="form-group">
    <label for="postcode">Post Code / Zip Code</label>
    <input type="text" name="zip" id="zip" class="form-control" value="<?php echo $user_data['UserZip']; ?>">
    </div>
    <div class="zipValid"></div>
    </div>
    <div class="col-sm-12">
    <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $user_data['UserPhone']; ?>">
    </div>
    <div class="phoneValid"></div>
    </div>
    
    <div class="col-sm-12">
    <div class="form-group">
    <input type="hidden" name="id" class="form-control" value="<?php echo $user_data['UserID']; ?>">
    </div>
    </div>
    <div class="col-sm-12">
    <div class="form-group">
    <button type="submit" name="edit_billing" class="save-ship">save address</button>
    </div>
    </div>
    </form>
    </div>
    </div><!--billing address-->
    </div><!--col-sm-9-->
    </div><!--row-->
    </div><!--login top-->
    
    </div><!--container-->
    </div><!--account-->
    
    <div class="clearfix"></div>
    
    <!--footer-->
    <?php
    require('footer.php');
    ?>     