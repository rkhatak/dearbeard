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
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[3000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
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
		768:{
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
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("300000");
            $(this).toggleClass('open');       
        }
    );
});
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
		list[0].onclick=function(){
			list[0].style.backgroundColor="#fff";
			wndow[0].style.backgroundColor="#000";
			gly_window[0].style.color="#999";
			gly_list[0].style.color="#000";
			list_view[0].style.opacity="1";
			window_view[0].style.opacity="0";
			window_view[0].style.display="none";
			list_view[0].style.display="block";
			
			}
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