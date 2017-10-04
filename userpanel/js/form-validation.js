		$(document).ready(function () {	
		$(document).on('click', '.save-btn', function(){

		var check = true;


		if($('#f_name').val() == '' || $('#f_name').val() == null){
		$('.f_nameValid').text('Please enter your First Name');
		check = false;
		}

		if($('#l_name').val() == '' || $('#l_name').val() == null){
		$('.l_nameValid').text('Please enter your Last Name');
		check = false;
		}

		if($('#c_passowrd').val() == '' || $('#c_passowrd').val() == null){
		$('.c_passowrdValid').text('Please enter your Current Password');
		check = false;
		}

		if($('#n_passowrd').val() == '' || $('#n_passowrd').val() == null){
		$('.n_passowrdValid').text('Please enter your New Password');
		check = false;
		}

		if($('#r_passowrd').val() == '' || $('#r_passowrd').val() == null){
		$('.r_passowrdValid').text('Please enter your Confirm Password');
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



		// Edit Shipping Form


		$(document).ready(function () {	

		$(document).on('blur', '#f_name', function(){
		var user_fname = $('#f_name').val();
		if (user_fname == "" || user_fname == null) {
		$('.f_nameValid').text('Please enter your name');
		return  false;
		}
		else{
		$('.f_nameValid').text('');
		}
		});

		$(document).on('blur', '#l_name', function(){
		var user_lname = $('#l_name').val();
		if (user_lname == "" || user_lname == null) {
		$('.l_nameValid').text('Please enter your name');
		return  false;
		}
		else{
		$('.l_nameValid').text('');
		}
		});


		$(document).on('blur', '#street', function(){
		var user_street = $('#street').val();
		if (user_street == "" || user_street == null) {
		$('.streetValid').text('Please enter your Street');
		return  false;
		}
		else{
		$('.streetValid').text('');
		}
		});


		$(document).on('blur', '#zip', function(){
		var user_zip = $('#zip').val();
		if (user_zip == "" || user_zip == null) {
		$('.zipValid').text('Please enter your Zip Code');
		return  false;
		}
		else{
		$('.zipValid').text('');
		}
		});

		$(document).on('blur', '#phone', function(){
		var user_phone = $('#phone').val();
		var numberFormat = /^([0-9])+$/;
		if (user_phone == "" || user_phone == null) {
		$('.phoneValid').text('Please enter your phone number');
		return  false;
		}else{
		$('.phoneValid').text('');
		}
		if (!numberFormat.test(user_phone)) {
		$(this).val($(this).val().replace(/([a-zA-Z])/g, ""));
		$('.phoneValid').text('Please enter your proper phone number');
		return  false;
		}
		else{
		$('.phoneValid').text('');
		}
		});
		});

		// Contact Email Form

		$(document).ready(function () {	

		$(document).on('click', '.send-btn', function(){

		var check = true;


		if($('#username').val() == '' || $('#username').val() == null){
		$('.usernameValid').text('Please enter your Name');
		check = false;
		}

		if($('#email').val() == '' || $('#email').val() == null){
		$('.emailValid').text('Please enter your Email');
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

		$(document).on('blur', '#username', function(){
		var username = $('#username').val();
		if (username == "" || username == null) {
		$('.usernameValid').text('Please enter your name');
		return  false;
		}
		else{
		$('.usernameValid').text('');
		}
		});

		$(document).on('blur', '#email', function(){
		var email = $('#email').val();
		if (email == "" || email == null) {
		$('.emailValid').text('Please enter your Email');
		return  false;
		}
		else{
		$('.emailValid').text('');
		}
		});

		})



