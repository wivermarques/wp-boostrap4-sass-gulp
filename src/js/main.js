(function ($) {

$(document).ready(function(){
	
	// mask
	$('.phone_with_ddd').mask('(00) 0000-0000');
	
	// slick
	$('#carousel-home').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 1,
		adaptiveHeight: false,
		fade: true,
		prevArrow: $('.banner__prev'),
		nextArrow: $('.banner__next'),
		responsive: [
		{
			breakpoint: 993,
				settings: {
					arrows: false
				}
		}
		]
	});	
	
});

})(jQuery);
