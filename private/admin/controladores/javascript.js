function eliminarProducto(producto) {
	var ok = confirm("Eliminar el producto "+producto+"?");
	if (ok) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('listado').innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../controladores/eliminarProducto.php?producto="+producto, true);
		xmlhttp.send();
	}
}

function eliminarUsuario(usuario) {
	var ok = confirm("Eliminar el usuario "+usuario+"?");
	if (ok) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('listado').innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../controladores/eliminarUsuario.php?usuario="+usuario, true);
		xmlhttp.send();
	}
}

function cambiarContrasena(usuario) {
	var contrasena = prompt("Editar la contraseña del usuario "+usuario+"?").trim();

	if (contrasena == null || contrasena == "") {
		alert('Cancelado, datos inválidos');
	} else {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert('Contraseña actualizada exitosamente!');
			}
		};
		xmlhttp.open("GET", "../controladores/cambiarContrasena.php?contrasena="+contrasena+"&usuario="+usuario, true);
		xmlhttp.send();
	}
}