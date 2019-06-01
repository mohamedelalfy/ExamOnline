// start doctors courses
$(document).ready(function() {
	var $slider = $('.slider');
	var $progressBar = $('.progress');
	var $progressBarLabel = $( '.slider__label' );
	
	$slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {   
	  var calc = ( (nextSlide) / (slick.slideCount-1) ) * 100;
	  
	  $progressBar
		.css('background-size', calc + '% 100%')
		.attr('aria-valuenow', calc );
	  
	  $progressBarLabel.text( calc + '% completed' );
	});
	
	$slider.slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  speed: 400
	});  
  });

// End doctors courses
// start links scroll animate
$(function () {

	'use strict';

	$(".link").click(function () {
		$("html, body").animate({
			scrollTop: $("#" + $(this).data("vale")).offset().top
		}, 1000);
	});


});



$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
	var $this = $(this),
		label = $this.prev('label');
  
		if (e.type === 'keyup') {
			  if ($this.val() === '') {
			label.removeClass('active highlight');
		  } else {
			label.addClass('active highlight');
		  }
	  } else if (e.type === 'blur') {
		  if( $this.val() === '' ) {
			  label.removeClass('active highlight'); 
			  } else {
			  label.removeClass('highlight');   
			  }   
	  } else if (e.type === 'focus') {
		
		if( $this.val() === '' ) {
			  label.removeClass('highlight'); 
			  } 
		else if( $this.val() !== '' ) {
			  label.addClass('highlight');
			  }
	  }
  
	});
	//start login  form validation
	// toggle form to signup and login
  $('.tab a').on('click', function (e) {
	
		e.preventDefault();
		
		$(this).parent().addClass('active');
		$(this).parent().siblings().removeClass('active');
		
		target = $(this).attr('href');
		
		$('.tab-content > div').not(target).hide();
		
		$(target).fadeIn(600);
		
		});
	
		// End login form validation

	//Start scroll animate
	$(".nav .nav-inner-wrapper ul li a").click(function () {
		$("html, body").animate({
			scrollTop : $("#" + $(this).data("vale")).offset().top
		}, 2000);
	});


	// End scroll animate

	//  Initialize Swiper -->