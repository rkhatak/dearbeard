/**********************owl carousel***************************/
var owl = $('#banner-move');
owl.owlCarousel({
	loop:true,
	autoplay:true,
	margin:0,
    autoplayTimeout:3000,
    responsive:{
		320:{
            items:1
        },
        480:{
            items:2
        },
        600:{
            items:3
        }
    }
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[3000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
/**********************owl carousel***************************/


/************************form slider*************************/
var owl = $('#form-slider');
owl.owlCarousel({
	loop:true,
	autoplay:true,
	margin:30,
	autoplayTimeout:3000,
	autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        991:{
            items:3
        },
		1000:{
			margin:20,
		}
    }
});
var block = false;
$("#form-slider").mouseenter(function(){
 if(!block) {
  block = true;
  owl.trigger('stop.owl.autoplay')
  block = false;
  }
});
$("#form-slider").mouseleave(function(){
 if(!block) {
  block = true;
  owl.trigger('play.owl.autoplay',[1000])
  block = false;
 }
});
/************************form slider*************************/

/************************tag slider**************************/
var owl = $('#tag-slider');
owl.owlCarousel({
	loop:true,
	autoplay:true,
	margin:6,
	autoplayTimeout:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1024:{
            items:5
        }
    }
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[3000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
/************************tag slider**************************/

/************************cart slider**************************/
var owl = $('#cart-slider');
owl.owlCarousel({
	loop:true,
	autoplay:true,
	margin:6,
	autoplayTimeout:3000,
	nav:true,
    responsive:{
        320:{
            items:1
        },
        640:{
            items:2
        },
		900:{
			  items:3
		}
    }
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[3000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
/************************cart slider**************************/


/*************************product-move*************************************/
var owl = $('#product-move');
owl.owlCarousel({
	loop:true,
	autoplay:true,
	nav:true,
	margin:8,
    autoplayTimeout:3000,
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[3000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
/*************************product-move*************************************/

/*************************file input**********************************/
$('.new_Btn').bind("click" , function () {
        $('#html_btn').click();
    });
/*************************file input**********************************/

/**************************shopping bag*******************************/
$(document).ready(function(){
    $(".login").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("300000");
            $(this).toggleClass('open');       
        }
    );

    $(".cart").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("300000");
            $(this).toggleClass('open');       
        }
    );

    //Outsource code


    $('#r_contact_form_submit').on('click',function(){
        $('.regfname').html('');
        var validateName=$.trim(document.forms["r_contact_name"]["name"].value);
        var validateEmail=$.trim(document.forms["r_contact_name"]["email"].value);
        var validatePhone=$.trim(document.forms["r_contact_name"]["phonenumber"].value);
        var validateMessage=$.trim(document.forms["r_contact_name"]["message"].value);
        var error=true;
        if(validateName==''){
            $('.name_regfname').html('Please enter name');
            document.forms["r_contact_name"]["name"].focus();
            error=false;
            return false;
        }
        if(validateEmail==''){
            $('.email_regfname').html('Please enter email');
            document.forms["r_contact_name"]["email"].focus();
            error=false;
            return false;
        }
        if(!isEmail(validateEmail)){
            $('.email_regfname').html('Email is not look like test@gmail.com');
            document.forms["r_contact_name"]["email"].focus();
            error=false;
            return false;
        }
        if(validatePhone==''){
            $('.phonenumber_regfname').html('Please enter phone');
            document.forms["r_contact_name"]["phonenumber"].focus();
            error=false;
            return false;
        }
        var phoneno = /^\d{10}$/;
        if(!validatePhone.match(phoneno)){
            $('.phonenumber_regfname').html('Please enter valid phone no');
            document.forms["r_contact_name"]["phonenumber"].focus();
            error=false;
            return false;
        }

        if(validateMessage==''){
            $('.message_regfname').html('Please enter message');
            document.forms["r_contact_name"]["message"].focus();
            error=false;
            return false;
        }

        if(error){
            var jqxhr = $.post( "./contact-form.php",$('#r_contact_id').serialize(), function(data) {
                //alert( "success" );
              })
                .done(function() {
                  $('#r_error_contact').show();
                  setTimeout(function(){
                    $('#r_error_contact').hide();
                  },5000)
                })
                .fail(function() {
                    $('#r_error_contact').hide();       
                });
        }
    })
});

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }
/**************************shopping bag*******************************/

/****************************quantity + -*******************************/
   $(document).ready(function(){
            //-- Click on QUANTITY
            $(".subtraction").on("click",function(){
                var now = $(".itemno").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".itemno").val(now);
                }else{
                    $(".itemno").val("1");
                }
            })            
            $(".addition").on("click",function(){
                var now = $(".itemno").val();
                if ($.isNumeric(now)){
                    $(".itemno").val(parseInt(now)+1);
                }else{
                    $(".itemno").val("1");
                }
            })                        
        }) 
		
		
		$(document).ready(function(){
            //-- Click on QUANTITY
            $(".minus").on("click",function(){
                var now = $(".ex-no").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".ex-no").val(now);
                }else{
                    $(".ex-no").val("1");
                }
            })            
            $(".add").on("click",function(){
                var now = $(".ex-no").val();
                if ($.isNumeric(now)){
                    $(".ex-no").val(parseInt(now)+1);
                }else{
                    $(".ex-no").val("1");
                }
            })                        
        }) 
/****************************quantity + -*******************************/


/***************************scroll down bg color change******************************/

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 1) {
        $("#menu").addClass("scrolling");
    } else {
        $("#menu").removeClass("scrolling");
    }
});
/***************************scroll down bg color change******************************/



/***********************image input type file***************************************/
$(".img-circle").click(function() {
    $("input[id='my_file']").click();
});
/***********************image input type file***************************************/


/*****************************************wishlist js ekta(23-09-2017)*****************************************/
var yes= document.getElementsByClassName("wish_yes");
var wish_items= document.getElementsByClassName("wish_items");
var wish_view= document.getElementsByClassName("wish_view");
var clear_wish= document.getElementsByClassName("clear_message");
var wish_count1=wish_items.length;
	
		$(document).ready(function(){
    $(".remove_wish").click(function(){
		if(wish_items.length!=0){$(this).closest(".wish_items").remove();}
		if(wish_items.length==0){clear_wish[0].style.marginBottom="0";
								 wish_view[0].style.display="none";clear_wish[0].style.opacity="1";}
		});
		});
				
function clearWishlist(){
var wish_count=wish_items.length;
if(wish_count==0){
	clear_wish[0].style.marginBottom="0";
	clear_wish[0].style.opacity="1";
	wish_view[0].style.display="none";
	}
	else{
	for(var i=0;i<wish_count;i++)
	{
	wish_items[0].parentNode.removeChild(wish_items[0]);
	}
	clear_wish[0].style.marginBottom="0";
	wish_view[0].style.display="none";
	clear_wish[0].style.opacity="1";
}}
/*****************************************wishlist js ekta(23-09-2017)*****************************************/


/*************************** ekta (1909-2017) clear all******************************/
 var items=document.getElementsByName("items");
	function clearAll(){items.item(0).checked=true;items.item(1).checked=true;items.item(2).checked=true;items.item(3).checked=true;items.item(4).checked=true;items.item(5).checked=true;items.item(6).checked=true;items.item(7).checked=true;items.item(8).checked=true;}
/*************************** ekta (1909-2017) clear all******************************/

/***************************  ekta (1909-2017)  window and list******************************/
 var wndow=document.getElementsByClassName("window");
		var gly_window=document.getElementsByClassName("gly_window");
        var list=document.getElementsByClassName("list");
        var gly_list=document.getElementsByClassName("gly_list");
		var list_view=document.getElementsByClassName("list_view");
		var window_view=document.getElementsByClassName("window_view");
		// list[0].onclick=function(){
		// 	list[0].style.backgroundColor="#fff";
		// 	wndow[0].style.backgroundColor="#000";
		// 	gly_window[0].style.color="#999";
		// 	gly_list[0].style.color="#000";
		// 	list_view[0].style.opacity="1";
		// 	window_view[0].style.opacity="0";
		// 	window_view[0].style.display="none";
		// 	list_view[0].style.display="block";
			
		// 	}
			wndow[0].onclick=function(){
			list[0].style.backgroundColor="#000";
			wndow[0].style.backgroundColor="#fff";
			gly_window[0].style.color="#000";
			gly_list[0].style.color="#999";
			list_view[0].style.opacity="0";
			window_view[0].style.opacity="1";
			window_view[0].style.display="block";
			list_view[0].style.display="none";
			
}
/***************************  ekta (1909-2017)  window and list******************************/			


/*****************************************pop js*****************************************/

/*****************************************pop js*****************************************/