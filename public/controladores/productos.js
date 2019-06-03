function agregar(producto) {
	var cantidad = document.getElementById(producto).value;
	
	if (cantidad > 0) {
		document.getElementById(producto).value = 0;

		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('exito').innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../controladores/subir_producto.php?producto="+producto+"&cantidad="+cantidad, true);
		xmlhttp.send();
	} else 
		alert('No se ha añadido ningún producto!');
}

function cambio(codigo, nombre) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('productos').innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controladores/cambio.php?codigo="+codigo+"&nombre="+nombre, true);
	xmlhttp.send();
}

function pop(codigo) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('info').classList.toggle('show');
			document.getElementById('info').innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controladores/pop.php?codigo="+codigo, true);
	xmlhttp.send();
}

function popOut() {
	document.getElementById('info').classList.remove('show');
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
	xmlhttp.open("GET", "../controladores/calificar.php?valor="+valor+"&codigo="+codigo, true);
	xmlhttp.send();
}

function buscarProducto(categoria, n_categoria) {
	var producto = document.getElementById('busca').value;
	if (producto == "") {
		if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('productos').innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controladores/mostrar.php?categoria="+categoria+"&n_categoria="+n_categoria, true);
	xmlhttp.send();
	} else {
		if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('productos').innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controladores/buscar.php?categoria="+categoria+"&n_categoria="+n_categoria+"&producto="+producto, true);
	xmlhttp.send();
	}
}

function mostrarProducto(categoria, n_categoria) {
	document.getElementById('busca').value = "";
	buscarProducto(categoria, n_categoria);
}