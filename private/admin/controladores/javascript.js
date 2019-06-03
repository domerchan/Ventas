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
	var contrasena = prompt("Ingresa la nueva contraseña para el usuario "+usuario).trim();

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

function buscar(cedula) {
	if (cedula == null || cedula == "") {
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
		xmlhttp.open("GET", "../controladores/mostrar.php?cedula="+cedula, true);
		xmlhttp.send();
	} else {
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
		xmlhttp.open("GET", "../controladores/buscar.php?cedula="+cedula, true);
		xmlhttp.send();
	}
}

function openMessage(mensaje, from, date, ans) {
	document.getElementById("from").innerHTML = "<strong>from: </strong>" + from + "<br> <strong>date:  </strong>" + date;
	document.getElementById("mensaje").innerHTML = mensaje;
	document.getElementById('ans').innerHTML = "Respuesta: ";
	document.getElementById('ansT').value = ans;
	document.getElementById('ansT').disabled = true;
	document.getElementById('ansB').style.display = "none";
	document.getElementById('ansT').style.display = "block";
}

function answerMessage(mensaje, from, date, codigo) {
	document.getElementById("from").innerHTML = "<strong>from: </strong>" + from + "<br> <strong>date:  </strong>" + date;
	document.getElementById("mensaje").innerHTML = mensaje;
	document.getElementById('ans').innerHTML = "Responder: ";
	document.getElementById('ansT').value = "";
	document.getElementById('ansH').value = codigo;
	document.getElementById('ansT').disabled = false;
	document.getElementById('ansB').style.display = "block";
	document.getElementById('ansT').style.display = "block";
}

function enviarRespuesta() {
	var respuesta = document.getElementById('ansT').value;
	var codigo = document.getElementById('ansH').value;
	if (respuesta == "")
		alert('No se ha ingresado una respuesta!')
	else {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(this.responseText);
			}
		};
		xmlhttp.open("GET", "../controladores/enviarRespuesta.php?respuesta="+respuesta+"&codigo="+codigo, true);
		xmlhttp.send();
	}
}

function enviar(codigo) {
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
	xmlhttp.open("GET", "../controladores/enviar.php?codigo="+codigo, true);
	xmlhttp.send();
}