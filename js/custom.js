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
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("1000");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("300000");
            $(this).toggleClass('open');       
        }
    );

    $(".cart").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("2000");
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

 function detectCardType(event) {
    cardNumberFormat(event);
    var $element = $("input[name=card_number]");
    var value = $element.val();
    var cardType = getCardType(value);
    $("ul.credit_cards li").removeClass('correct');
    if (cardType) {
      $("ul.credit_cards li[data-type='" + cardType + "']").addClass('correct');
    }
  };

  function cardNumberFormat(event) {
    var key = event.which;
    if (key === 37 || key === 38 || key === 39 || key === 40 || key === 8 || key === 46) {
      return true;
    }
    onlyNumber(event);
    var valc = $(event.currentTarget).val().split(" ").join("");
    if (valc.length > 16) {
      valc = valc.substr(0, 16);
    }
    if (valc.length > 0) {
      valc = valc.match(new RegExp('.{1,4}', 'g')).join(" ");
    }
    function onlyNumber(event) {
    var key = event.which;
    if (key === 37 || key === 38 || key === 39 || key === 40 || key === 8 || key === 46) {
      return true;
    }
    var value = $(event.currentTarget).val().replace(/[^-0-9 !@#$%^&*()+,:;.",]/g, "");
    value = value.replace(/\./g, '');
    $(event.currentTarget).val(value);
  }
    $(event.currentTarget).val(valc);
  };

function getCardType(card_no) {
    var card_number = card_no;
    try {
      var intCardNumber4 = parseInt(card_number.substr(0, 4), 10);
      var intCardNumber6 = parseInt(card_number.substr(0, 6), 10);
      var strCardNumber = card_number + "";
    } catch (ex) {
      var intCardNumber4 = 0;
      var intCardNumber6 = 0;
      var strCardNumber = "";
    }
    var isVISA = (new RegExp("^4.*")).test(strCardNumber);
    var isMASTER = (new RegExp("^(51|52|53|54|55).*")).test(strCardNumber);
    var isAMEX = (new RegExp("^(34|37).*")).test(strCardNumber);
    var isDISC = (((new RegExp("^(6011|644|645|646|647|648|649|65).*")).test(strCardNumber)) || (intCardNumber6 > 622127 && intCardNumber6 < 622925));
    var isDINN = (new RegExp("^(54|36|38|300|301|302|303|304|305).*")).test(strCardNumber);
    var isJCB = intCardNumber4 >= 3528 && intCardNumber4 <= 3589;
    if (isVISA) {
      return "visa";
    }
    if (isMASTER) {
      return "master";
    }
    if (isAMEX) {
      return "amex";
    }
    if (isDISC) {
      return "disc";
    }
    if (isDINN) {
      return "dinn";
    }
    if (isJCB) {
      return "jcb";
    }
    return false;
  };

  function validateCardNumber() {
    var hasError = false,
      cardNumber = $("input[name=card_number]");
    if ($.trim(cardNumber.val()) === "") {
      cardNumber.closest("div").find(".error-message").removeClass("hide").html('Try rubbing your fingers over the numbers, that helps us get \'em right');
      hasError = true;
    } else {
      if (!isValidCardNumber(cardNumber)) {
        cardNumber.closest("div").find(".error-message").removeClass("hide").html("We need all of the numbers on the card. All of \'em");
        hasError = true;
      } else {
        cardNumber.closest("div").find(".error-message").addClass("hide");
      }
    }
    return hasError;
  };
  function isValidCardNumber(element) {
    var cardNumber = element.val();
    cardNumber = cardNumber.replace(/ /g, '');
    return cardNumber.length > 13 && cardNumber.length < 19 && getCardType(cardNumber);
  };
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
                var now = $(this).prev().val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(this).prev().val(now);
                }else{
                    $(this).prev().val("1");
                }
            })            
            $(".add").on("click",function(){
                var now = $(this).next().val();
                if ($.isNumeric(now)){
                    $(this).next().val(parseInt(now)+1);
                }else{
                    $(this).next().val("1");
                }
            })   
            
            // filter functionality implemented here 

            $('#r_search_filter').on('change',function(){
                var filterVal=$.trim($(this).val());
                var queries = {};
                $.each(document.location.search.substr(1).split('&'),function(c,q){
                    var i = q.split('=');
                    queries[i[0].toString()] = decodeURIComponent(i[1].toString());
                  });
                  
                $.ajax({
                    
                        type: "POST",
                    
                        url: "filterSearch.php",
                    
                        data: { cat_value : filterVal,category:queries['category'],subcategory:queries['subcategory'],tag:queries['tag'] } 
                    
                        }).done(function(data){
                    
                        $(".window_view").html(data);
                    
                        });
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
	function clearAll(){
        $('.r_left_sec input[type="checkbox"]:checked').each(function() { 
            $(this).next().removeClass('r_checkbox_indicator');
            $(this).prop('checked', false);
		});
        $.ajax({
    
        type: "POST",
    
        url: "ajaxcategory.php",
    
        data: { cat_value : 'all' } 
    
        }).done(function(data){
    
        $(".cat_section").html(data);
    
        });
    }
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