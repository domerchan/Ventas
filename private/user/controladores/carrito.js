var distancia;
var latInicial = -2.8756655;
var lonInicial = -78.9806085;
var posicionInicial = new google.maps.LatLng(latInicial, lonInicial);
var centro;
var latFinal;
var lonFinal;
var posicionFinal;
var nuevoMarcador;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

function detalle() {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('htitle').innerHTML = 'Tu carrito de compras';
			document.getElementById('s1').classList.add('pr');
			document.getElementById('s2').classList.remove('pr');
			document.getElementById('compras').innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controladores/detalle.php", true);
	xmlhttp.send();
}

function pago(total) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('htitle').innerHTML = 'Ingresa tu Forma de Pago';
			document.getElementById('s2').classList.add('pr');
			document.getElementById('s1').classList.remove('pr');
			document.getElementById('s3').classList.remove('pr');
			document.getElementById('compras').innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controladores/pago.php?total="+total, true);
	xmlhttp.send();
}

function envio(total) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('htitle').innerHTML = 'Datos de Envío';
			document.getElementById('s3').classList.add('pr');
			document.getElementById('s2').classList.remove('pr');
			document.getElementById('s4').classList.remove('pr');
			document.getElementById('compras').innerHTML = this.responseText;
			navigator.geolocation.getCurrentPosition(mostrarPosicion);
		}
	};
	xmlhttp.open("GET", "../controladores/envio.php?total="+total, true);
	xmlhttp.send();
}

function factura(total) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('htitle').innerHTML = 'Ingresa los datos para tu Factura';
			document.getElementById('s4').classList.add('pr');
			document.getElementById('s3').classList.remove('pr');
			document.getElementById('s5').classList.remove('pr');
			document.getElementById('compras').innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controladores/factura.php?total="+total, true);
	xmlhttp.send();
}

function confirmar(total) {

	var nombre = document.getElementById('nom').value;
	var telefono = document.getElementById('tel').value;
	var cedula = document.getElementById('ced').value;
	var direccion = document.getElementById('dir').value;

	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('htitle').innerHTML = 'Tu Factura está Completa!';
			document.getElementById('s5').classList.add('pr');
			document.getElementById('s4').classList.remove('pr');
			document.getElementById('compras').innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controladores/confirmar.php?total="+total+"&distancia="+distancia+"&nombre="+nombre+"&telefono="+telefono+"&cedula="+cedula+"&direccion="+direccion, true);
	xmlhttp.send();
}
function comprar(total) {

	var nombre = document.getElementById('nom').value;
	var telefono = document.getElementById('tel').value;
	var cedula = document.getElementById('ced').value;
	var direccion = document.getElementById('dir').value;
	var subt = document.getElementById('sub').value;
	var envios = document.getElementById('envio').value;
	
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert('Su compra Se ha Realizado!!!');
		}
	};
	xmlhttp.open("GET", "../controladores/comprar.php?total="+total+"&distancia="+distancia+"&nombre="+nombre+"&telefono="+telefono+"&cedula="+cedula+"&direccion="+direccion+"&subt="+subt+"&envios="+envios, true);
	xmlhttp.send();
}

function mostrarPosicion(position) {
	latFinal = position.coords.latitude;
	lonFinal = position.coords.longitude;
	posicionFinal = new google.maps.LatLng(latFinal, lonFinal);
	centro = new google.maps.LatLng(-2.901893, -79.002355);
	mostrarMapa(posicionFinal);

	var dx = latInicial - latFinal;
	var dy = lonInicial - lonFinal;
	distancia = Math.sqrt(Math.pow(dx, 2) + Math.pow(dy, 2));
} 

function mostrarMapa(posicionFinal) {
	var opciones = {
		zoom: 13,
		position: posicionInicial,
		center: centro,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	mapa = new google.maps.Map(document.getElementById('mapa'), opciones);

	marcador = new google.maps.Marker({
		position: posicionInicial,
		map: mapa,
		draggable: false,
		title: "Central"
	});

	agregarMarcador(posicionFinal);
}

function ubicarDireccion() {
	var direccion = document.getElementById('dir').value + " Cuenca Ecuador";
	if (direccion != "") {
		var geocoder = new google.maps.Geocoder();

		geocoder.geocode({
			'address': direccion
		}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
	    		latFinal = results[0].geometry.location.lat();
	    		lonFinal = results[0].geometry.location.lng();
	    		posicionFinal = new google.maps.LatLng(latFinal, lonFinal);

	    		agregarMarcador(posicionFinal);
	    	} else
	    		alert("Lo sentimos, no hemos encontrado tu dirección")
		});
	}
}

function agregarMarcador(posicionFinal) {
	if(nuevoMarcador != null)
		nuevoMarcador.setMap(null);

	if (directionsDisplay != null)
		directionsDisplay.setMap(null);

	nuevoMarcador = new google.maps.Marker({
		position: posicionFinal,
		draggable: false,
		icon: "../../../config/img/icon.png",
		map: mapa
	});

	calcularDistancia();
}

function calcularDistancia() {
	var dx = latInicial - latFinal;
	var dy = lonInicial - lonFinal;
	distancia = Math.sqrt(Math.pow(dx, 2) + Math.pow(dy, 2));
	document.getElementById('costo').value = distancia * 30;
	mostrarRuta();
}

function mostrarRuta() {
	if (posicionFinal == null)
		alert('No se ha seleccionado una sucursal!!');
	else {
		
		if (directionsDisplay != null)
			directionsDisplay.setMap(null);
		directionsDisplay = new google.maps.DirectionsRenderer();
	    directionsDisplay.setMap(mapa);

	    var ruta = {
	    	origin: posicionInicial,
	    	destination: posicionFinal,
	    	travelMode: google.maps.TravelMode.DRIVING
	    };

	    directionsService.route(ruta, function(respuesta, estado) {
	        if (estado == google.maps.DirectionsStatus.OK) {
	            directionsDisplay.setDirections(respuesta);
	            directionsDisplay.setOptions({
	                suppressMarkers: true
	            });
	        } else 
	            alert('Error en el servicio!!: ' + estado);
	    });
	}
}

function quitarProducto(codigo) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('compras').innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controladores/quitarProducto.php?codigo="+codigo, true);
	xmlhttp.send();
}
function forma(){ 
	
	var textoEscogido = document.getElementById('options').value; 
	if(textoEscogido=='0'){
	 

 	}
	if(textoEscogido=='1'){
 
 	}
}
