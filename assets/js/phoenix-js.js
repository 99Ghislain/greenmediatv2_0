
(function ($) {
	"use strict";
	// Tranding carousel
	$(".slide").owlCarousel({
		autoplay: true,
		smartSpeed: 300,
		items: 1,
		dots: false,
		loop: true,
		nav : true,
		navText : [
			'<span class="icon-nav-left"><i class="ion-ios-arrow-left"></i></span>',
			'<span class="icon-nav-right"><i class="ion-ios-arrow-right"></i></span>'
		]
	});
	
	$(".carousel-1").owlCarousel({
		autoplay: true,
		smartSpeed: 300,
		items: 3,
		loop: true,
		responsive: {
			0:{
				items:1
			},
			576:{
				items:1
			},
			768:{
				items:3
			},
			992:{
				items:3
			},
			1200:{
				items:3
			}
		}
	});
	$(".carousel-2").owlCarousel({
		autoplay: true,
		smartSpeed: 300,
		items: 1,
		dots: false,
		loop: true
	});
	$(".owl-theme").owlCarousel({
		autoplay: true,
		smartSpeed: 300,
		items: 1,
		dots: false,
		loop: true
	});
	
})(jQuery);