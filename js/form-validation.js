        //  Header Login Form start
        
        $(document).ready(function () {	
        
        $(document).on('click', '.header-login', function(){
        
        var check = true;
        
        
        if($('#header-username').val() == '' || $('#header-username').val() == null){
        $('.headeruValid').text('Please enter your Email');
        check = false;
        }
        
        if($('#header-password').val() == '' || $('#header-password').val() == null){
        $('.headerpValid').text('Please enter your Password');
        check = false;
        }
        
        
        if(check == false){
        return false;
        }
        else{
        return true;
        }
        
        });
        
        });
        
        
        
         $(document).ready(function () {	
        
        $(document).on('blur', '#header-username', function(){
        var useremail = $('#header-username').val();
        if (useremail == "" || useremail == null) {
        $('.headeruValid').text('Please enter your Email');
        return  false;
        }
        else{
        $('.headeruValid').text('');
        }
        });
        
        $(document).on('blur', '#header-password', function(){
        var pwd = $('#header-password').val();
        if (pwd == "" || pwd == null) {
        $('.headerpValid').text('Please enter your Password');
        return  false;
        }
        else{
        $('.headerpValid').text('');
        }
        });
        
        })
        
        //  Header Login Form End
        
        
        
        
        
        // Login Form
        
        $(document).ready(function () {	
        
        $(document).on('click', '.login-button', function(){
        
        var check = true;
        
        
        if($('#useremail').val() == '' || $('#useremail').val() == null){
        $('.useremailValid').text('Please enter your Email');
        check = false;
        }
        
        if($('#pwd').val() == '' || $('#pwd').val() == null){
        $('.passwordValid').text('Please enter your Password');
        check = false;
        }
        
        
        if(check == false){
        return false;
        }
        else{
        return true;
        }
        
        });
        
        });
        
        $(document).ready(function () {	
        
        $(document).on('blur', '#useremail', function(){
        var useremail = $('#useremail').val();
        if (useremail == "" || useremail == null) {
        $('.useremailValid').text('Please enter your Email');
        return  false;
        }
        else{
        $('.useremailValid').text('');
        }
        });
        
        $(document).on('blur', '#pwd', function(){
        var pwd = $('#pwd').val();
        if (pwd == "" || pwd == null) {
        $('.passwordValid').text('Please enter your Password');
        return  false;
        }
        else{
        $('.passwordValid').text('');
        }
        });
        
        })
		
		
		
		//  registration Form start
        
        $(document).ready(function () {	
        
        $(document).on('click', '.registre-button', function(){
        
        var check = true;
        
        
        if($('#reg-fname').val() == '' || $('#reg-fname').val() == null){
        $('.regfname').text('Please enter your First name');
        check = false;
        }
        
        if($('#reg-lname').val() == '' || $('#reg-lname').val() == null){
        $('.reglname').text('Please enter your Last Name');
        check = false;
        }
		
		if($('#reg-address').val() == '' || $('#reg-address').val() == null){
        $('.regaddress').text('Please enter your Address');
        check = false;
        }
		
		if($('#country').val() == '' || $('#country').val() == null){
        $('.regcountry').text('Please enter your Country');
        check = false;
        }
		
		if($('#reg-zip').val() == '' || $('#reg-zip').val() == null){
        $('.regzip').text('Please enter your Zip Code');
        check = false;
        }
		
		var user_zip = $('#reg-zip').val();
		var numberFormat = /^([0-9])+$/;
		if(user_zip == '' || user_zip == null){
        $('.regzip').text('Please enter your Zip Code');
        check = false;
        }else if (!numberFormat.test(user_zip)) {
			    $('.regzip').text('Please enter your proper Zip Code');
				check = false;
		}
		
		var user_email = $('#reg-email').val();
    	var mailFormat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (user_email == "" || user_email == null) {
			$('.regemail').text('Please enter your Email');
			check = false;
		}
		else if (!mailFormat.test(user_email)) {
				$('.reg-email').text('Please enter your proper Email');
				check = false;
		}
		
		if($('#reg-pwd').val() == '' || $('#reg-pwd').val() == null){
        $('.regpwd').text('Please enter your Password');
        check = false;
        }
		
		if($('#reg-cpwd').val() == '' || $('#reg-cpwd').val() == null){
        $('.regcpwd').text('Please enter your Confirm Password');
        check = false;
        }
		
		
		var user_phone = $('#reg-phone').val();
		var numberFormat = /^\d{10}$/;
		if (user_phone == "" || user_phone == null) {
			$('.regphone').text('Please enter your phone number');
			check = false;
		}
		else if (!numberFormat.test(user_phone)) {
			    $('.regphone').text('Please enter your proper phone number');
				check = false;
		}
        
        
        if(check == false){
        return false;
        }
        else{
        return true;
        }
        
        });
		
		
		//bullre form 
		
		
		$(document).on('blur', '#reg-fname', function(){
		var user_name = $('#reg-fname').val();
		if (user_name == "" || user_name == null) {
			$('.regfname').text('Please enter your First Name');
			return  false;
		}
		else{
			$('.regfname').text('');
		}
	});
	
	$(document).on('blur', '#reg-lname', function(){
		var user_lname = $('#reg-lname').val();
		if (user_lname == "" || user_lname == null) {
			$('.reglname').text('Please enter your Last Name');
			return  false;
		}
		else{
			$('.reglname').text('');
		}
	});
	
	$(document).on('blur', '#reg-address', function(){
		var user_address = $('#reg-address').val();
		if (user_address == "" || user_address == null) {
			$('.regaddress').text('Please enter your Address');
			return  false;
		}
		else{
			$('.regaddress').text('');
		}
	});
	
	$(document).on('blur', '#reg-zip', function(){
		var user_zip = $('#reg-zip').val();
		if (user_zip == "" || user_zip == null) {
			$('.regzip').text('Please enter your Zip Code');
			return  false;
		}
		else{
			$('.regzip').text('');
		}
	});
	
	$(document).on('blur', '#reg-email', function(){
		var user_email = $('#reg-email').val();
    	var mailFormat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (user_email == "" || user_email == null) {
			$('.regemail').text('Please enter your Email');
			return  false;
		}
		else if (!mailFormat.test(user_email)) {
			$('.regemail').text('Please enter your proper Email');
			return  false;
		}
		else{
			$('.regemail').text('');
		}
	});
	
	
	$(document).on('blur', '#reg-phone', function(){
		var user_phone = $('#reg-phone').val();
		var numberFormat = /^([0-9])+$/;
		if (user_phone == "" || user_phone == null) {
			$('.regphone').text('Please enter your phone number');
			return  false;
		}
		else if (!numberFormat.test(user_phone)) {
				$(this).val($(this).val().replace(/([a-zA-Z])/g, ""));
				$('.regphone').text('Please enter your proper phone number');
				return  false;
		}
		else{
			$('.regphone').text('');
		}
	});
		
        
		$(document).on('blur', '#reg-pwd', function(){
		var user_pwd = $('#reg-pwd').val();
		if (user_pwd == "" || user_pwd == null) {
			$('.regpwd').text('Please enter your Password');
			return  false;
		}
		else{
			$('.regpwd').text('');
		}
	});
	
	$(document).on('blur', '#reg-cpwd', function(){
		var user_cpwd = $('#reg-cpwd').val();
		if (user_cpwd == "" || user_cpwd == null) {
			$('.regcpwd').text('Please enter your Confirm Password');
			return  false;
		}
		else{
			$('.regcpwd').text('');
		}
	});
		
		
		
        });
        
        
     // Reset Password
     
     $(document).ready(function () {	
        
        $(document).on('click', '.reset-login-password', function(){
        
        var check = true;
        
        
        if($('#resetnpwd').val() == '' || $('#resetnpwd').val() == null){
        $('.resetnpwdValid').text('Please enter your New Password');
        check = false;
        }
        
        if($('#resetcpwd').val() == '' || $('#resetcpwd').val() == null){
        $('.resetcpwdValid').text('Please enter your Confirm Password');
        check = false;
        }
        
        if(check == false){
        return false;
        }
        else{
        return true;
        }
        
        });
        
        });
        
        
        
