getLocation();
var posicionInicial;
var centro;
var posicionFinal;
var nuevoMarcador;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

function getLocation() {
	if (navigator.geolocation)
		navigator.geolocation.getCurrentPosition(mostrarPosicion);
	else
		alert("Este navegador no soporta geolocalización");
}


function mostrarPosicion(position) {
	posicionInicial = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	centro = new google.maps.LatLng(-2.901893, -79.002355);
	mostrarMapa(posicionInicial);
}

function mostrarMapa(posicionInicial) {
	var opciones = {
		zoom: 14,
		position: posicionInicial,
		center: centro,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	mapa = new google.maps.Map(document.getElementById('mapa'), opciones);

	marcador = new google.maps.Marker({
		position: posicionInicial,
		map: mapa,
		draggable: true,
		title: "Tu estás aquí"
	});
}

function mostrarSucursal(elemento, direccion) {
	var oculto = document.getElementsByClassName('oculto');
	for (var i=0; i<oculto.length; i++)
		oculto[i].style.display = 'none';
	elemento.getElementsByClassName('oculto')[0].style.display = 'block';
	var geocoder = new google.maps.Geocoder();

	geocoder.geocode({
		'address': direccion
	}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
    		var latitude = results[0].geometry.location.lat();
    		var longitude = results[0].geometry.location.lng();
    		posicionFinal = new google.maps.LatLng(latitude, longitude);

    		agregarMarcador(posicionFinal);
    	} 
	});
}

function agregarMarcador(posicionFinal) {
	if(nuevoMarcador != null)
		nuevoMarcador.setMap(null);

	if (directionsDisplay != null)
		directionsDisplay.setMap(null);

	nuevoMarcador = new google.maps.Marker({
		position: posicionFinal,
		icon: "../../config/img/icon.png",
		map: mapa
	});
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

function calificar(valor, codigo) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		}
	};
	xmlhttp.open("GET", "../controladores/calificarSu.php?valor="+valor+"&codigo="+codigo, true);
	xmlhttp.send();
}