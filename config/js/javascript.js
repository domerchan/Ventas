$(document).ready(function() {
	var altura = $('.navHeader').offset().top;

	$(window).on('scroll', function() {
		if ($(window).scrollTop() > altura) {
			$('.navHeader').addClass('navFixed');
		} else {
			$('.navHeader').removeClass('navFixed');
		}
	});

});


function cambioSucursal(sucursal, factura, actual) {
	if (factura == 0) {
		if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById('header').innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "../controladores/cambioSucursal.php?sucursal="+sucursal, true);
			xmlhttp.send();
	} else {
		alert('¡Ya tienes compras sin confirmar en esta sucursal!');
		document.getElementById('suc').value = actual;
	}
}