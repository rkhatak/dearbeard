
	$(document).ready(function(){

	// Product Detail ADD TO CART

	$('#addto-cart').on('click', function() {
	var data = $(this).val();
	var itemno = $('.itemno').val();
	$.ajax({
	type: 'GET',
	url: 'add-cart.php',
	data: { data: data , itemno: itemno },
	success: function(data) {
	location.reload();
	}
	});
	});
	
	
	// Home ADD TO CART

	$('.btn.home-cart').on('click', function() {
	var data = $(this).val();
	var itemno = 1;
	$.ajax({
	type: 'GET',
	url: 'add-cart.php',
	data: { data: data , itemno: itemno },
	success: function(data) {
	location.reload();
	}
	});
	});
	
	

	// ADD TO CART OF Slider

	$('#cart-slider .cart-info #addto-cartslide').on('click', function() {
	var data = $(this).val();
	var itemno = 1;
	$.ajax({
	type: 'GET',
	url: 'add-cart.php',
	data: { data: data , itemno: itemno },
	success: function(data) {
	location.reload();
	}
	});
	});
	
	// ADD TO CART OF Category
	
	$('.wcat-cart').on('click', function() {
	var data = $(this).val();
	var itemno = 1;
	$.ajax({
	type: 'GET',
	url: 'add-cart.php',
	data: { data: data , itemno: itemno },
	success: function(data) {
	location.reload();
	}
	});
	});
	
	// list view
	
	$('.listcat-cart').on('click', function() {
	var data = $(this).val();
	var itemno = 1;
	$.ajax({
	type: 'GET',
	url: 'add-cart.php',
	data: { data: data , itemno: itemno },
	success: function(data) {
	location.reload();
	}
	});
	});
	

	// ADD TO Wishlist

	$('#btnwishlist').on('click', function() {
	var wishlist1 = $(this).val();
	var itemno = $('.itemno').val();
	$.ajax({
	type: 'GET',
	url: 'add-wishlist.php',
	data: { wishlist: wishlist1 , itemno: itemno },
	success: function(wishlist) {
	location.reload();
	}
	});
	});
	
	
	// ADD Home TO Wishlist

	$('.homewishlist').on('click', function() {
	var wishlist2 = $(this).val();
	var itemno = 1;
	$.ajax({
	type: 'GET',
	url: 'add-wishlist.php',
	data: { wishlist: wishlist2 , itemno: itemno },
	success: function(wishlist) {
	location.reload();
	}
	});
	});
	
	// Category wishlist
	
	$('.wcatwishlist').on('click', function() {
	var wishlist3 = $(this).val();
	var itemno = 1;
	$.ajax({
	type: 'GET',
	url: 'add-wishlist.php',
	data: { wishlist: wishlist3 , itemno: itemno },
	success: function(wishlist) {
	location.reload();
	}
	});
	});
	

	// ADD TO Review Form

	$('#review-form').submit(function(e) {
	e.preventDefault();	
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");		
	$.ajax({
	type: 'POST',
	url: formURL,
	data: postData,
	success: function(response) {
	alert(response);
	}
	});
	});


	// Home Upload Photo Code

	$('.new_Btn').bind("click" , function () {
	$('#html_btn').click();
	});

	$("#html_btn").change(function() {
	$("#formphoto").submit();
	});


	$('.new_Btn').bind("click" , function () {
	$('#html_btn').click();
	});

	// Cuntry , State , City


	$("select#country").change(function(){

	var selectedCountry = $("#country option:selected").val();

	$.ajax({

	type: "POST",

	url: "address.php",

	data: { country : selectedCountry } 

	}).done(function(data){

	$("#stateresponse").html(data);

	});

	});
	
	
$('.category_name').on('click', function() {
	let arrCategory=[];
	$('.control__indicator').removeClass('r_checkbox_indicator');
        
        
                $('.category_name').each(function () {
                    if($(this).is(':checked')){
                        $(this).next().addClass('r_checkbox_indicator');
                        arrCategory.push({category:$(this).val()});
                    }
                });
                
                $('.sub_cat_name').each(function () {
                    if($(this).is(':checked')){
                        $(this).next().addClass('r_checkbox_indicator');
                        arrCategory.push({subcategory:$(this).val()});
                    }
                });
                $('.tags').each(function () {
                    if($(this).is(':checked')){
                        $(this).next().addClass('r_checkbox_indicator');
                        arrCategory.push({tag:$(this).val()});
                    }
                });
	var cat_value =arrCategory;
	if(cat_value.length==0){
		cat_value="all";	
	}
	$.ajax({

	type: "POST",

	url: "ajaxcategory.php",

	data: { cat_value : cat_value } 

	}).done(function(data){

	$(".cat_section").html(data);

	});

	});
        
        
        $('.tags').on('click', function() {
	let arrCategory=[];
	$('.control__indicator').removeClass('r_checkbox_indicator');
        
        
                $('.category_name').each(function () {
                    if($(this).is(':checked')){
                        $(this).next().addClass('r_checkbox_indicator');
                        arrCategory.push({category:$(this).val()});
                    }
                });
                
                $('.sub_cat_name').each(function () {
                    if($(this).is(':checked')){
                        $(this).next().addClass('r_checkbox_indicator');
                        arrCategory.push({subcategory:$(this).val()});
                    }
                });
                $('.tags').each(function () {
                    if($(this).is(':checked')){
                        $(this).next().addClass('r_checkbox_indicator');
                        arrCategory.push({tag:$(this).val()});
                    }
                });
        
	var cat_value =arrCategory;
        if(cat_value.length==0){
		cat_value="all";	
	}
	$.ajax({

	type: "POST",

	url: "ajaxTags.php",

	data: { cat_value : cat_value } 

	}).done(function(data){

	$(".cat_section").html(data);

	});

	});
	
	
	// Sub Category Show List
	
	
	
	$('.sub_cat_name').on('click', function() {
		//alert('test');
		let arrCategory=[];
	$('.control__indicator').removeClass('r_checkbox_indicator');
        
        
                $('.category_name').each(function () {
                    if($(this).is(':checked')){
                        $(this).next().addClass('r_checkbox_indicator');
                        arrCategory.push({category:$(this).val()});
                    }
                });
                
                $('.sub_cat_name').each(function () {
                    if($(this).is(':checked')){
                        $(this).next().addClass('r_checkbox_indicator');
                        arrCategory.push({subcategory:$(this).val()});
                    }
                });
                $('.tags').each(function () {
                    if($(this).is(':checked')){
                        $(this).next().addClass('r_checkbox_indicator');
                        arrCategory.push({tag:$(this).val()});
                    }
                });
		var subcat_value =arrCategory;
		if(subcat_value.length==0){
			subcat_value="all";	
		}
		

	$.ajax({

	type: "POST",

	url: "ajaxsubcategory.php",

	data: { subcat_value : subcat_value } 

	}).done(function(data){

	$(".cat_section").html(data);

	});

	});
	

	});

	// REMOVE TO CART


	function removecart(product_id) {

	$.ajax({
	type: 'GET',
	url: 'remove-cart.php',
	data: { product_id: product_id  },
	success: function(data) {
	location.reload();
	}
	});
	}
	function updatecart(product_id) {
	var itemno = $('#r_cartpage_update_quantity'+product_id).val();	
        $.ajax({
	type: 'GET',
	url: 'update-cart.php',
	data: { product_id: product_id , itemno: itemno  },
	success: function(data) {
	location.reload();
	}
	});
	}

	
	
