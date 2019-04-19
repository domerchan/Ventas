$(document).ready(function() {

	var altura = $('.navHeader').offset().top;

	$(window).on('scroll', function() {
		if ($(window).scrollTop() > altura) {
			$('.navHeader').addClass('navFixed');
		} else {
			$('.navHeader').removeClass('navFixed');
		}
	});

	$(".opcion").mouseenter(function() {
		alert("asdf");
	})

});