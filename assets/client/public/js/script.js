var $ = jQuery.noConflict();


// Page Loader
$(window).load(function () {
    "use strict";
	$('#loader').fadeOut();
});





// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
    "use strict";
    $('a.page-scroll').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
	
	
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status alert-success"></div>');
		$.ajax({
			url: 'index.php?way='+$(this).attr('action'),
			data: $('#main-contact-form').serialize(),
			type: 'post',
			beforeSend: function(){
				form.prepend( form_status.html('<p style="padding:20px;"><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			},
			success: function(json){
				if(json != "true"){
					alert(json);
				}
			}
		}).done(function(data){
			form_status.html('<p class="text-success" style="padding:20px;">Thank you for contact us. As early as possible  we will contact you</p>').delay(3000).fadeOut();
		});
	});
});




// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function () {
    "use strict";
    
    $('.navbar-toggle:visible').click();
});
    
    

    
    /*--------------------------------------------------*/
    /* Counter*/
    /*--------------------------------------------------*/ 
        $(document).ready(function () {

                $('.timer').countTo();

                $('.counter-item').appear(function() {
                    $('.timer').countTo();
                },{accY: -100});
            
        });
            
        





	

////------- Testimonial Section

$(document).ready(function() {
 
  $(".testimonial-section").owlCarousel({
        pagination: false,
        navigation : true,
        slideSpeed : 2500,
		stopOnHover: true,
    	autoPlay: 3000,
    	singleItem:false,
        itemsMobile : [550,1],
        itemsDesktopSmall : [991,2],
        items: 3,
		transitionStyle : "fade",
		navigationText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>']
  });
 
});




////------- Partner/CLients

$(document).ready(function() {
 
  $(".clients").owlCarousel({
        pagination: false,
        navigation : true,
        slideSpeed : 2500,
		stopOnHover: true,
    	autoPlay: 3000,
    	singleItem:false,
        itemsMobile : [550,1],
        itemsDesktopSmall : [991,2],
        items: 5,
		transitionStyle : "fade",
		navigationText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>']
  });
 
});






// Progress Bar

$(document).ready(function ($) {
    "use strict";
    
    // skills animation
    $('#skill-section').waypoint({
        handler: function(event, direction) {
            $(this).find('.singel-hr-inner').each(function(){
                var height = $(this).data('height');
                $(this).css('height', height);
            });
        },
        offset: '60%'
    });        
        
});


$ ( function () {

	$(".video").fitVids();
	
});
	
	
	
	
	
	
/* ------------------------------------------------------*/
// Start Sidenav Section 
/* ------------------------------------------------------ */

(function () {
    
    "use strict";
	var bodyEl = document.body,
		content = document.querySelector('.content-wrap'),
		openbtn = document.getElementById('open-button'),
		closebtn = document.getElementById('close-button'),
		isOpen = false;

	function init() {
		initEvents();
	}

	function initEvents() {
		openbtn.addEventListener('click', toggleMenu);
		if (closebtn) {
			closebtn.addEventListener('click', toggleMenu);
		}

		
	}

	function toggleMenu() {
		if (isOpen) {
			classie.remove(bodyEl, 'show-menu');
		}
		    else {
                classie.add(bodyEl, 'show-menu');
		    }
        
		isOpen = !isOpen;
	}

	init();

})();


