function filtrar(filtro) {

	if (filtro == "") {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("options").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "php/mostrar.php?filtro="+filtro, true);
		xmlhttp.send();
	} else {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("options").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "php/buscar.php?filtro="+filtro, true);
		xmlhttp.send();
	}
}

function chooseFile() {
	document.getElementById('image').click();
}

function editar() {
	document.getElementById("exito").innerHTML = "";
	document.getElementById('nom').disabled = false;
	document.getElementById('ape').disabled = false;
	document.getElementById('nic').disabled = false;
	document.getElementById('ced').disabled = false;
	document.getElementById('tel').disabled = false;
	document.getElementById('dir').disabled = false;
	document.getElementById('fec').disabled = false;
	document.getElementById('modificar').type = 'button';
	document.getElementById('cancelar').type = 'button';
}

function editarC() {
	document.getElementById("exito").innerHTML = "";
	document.getElementById('act').disabled = false;
	document.getElementById('new').disabled = false;
	document.getElementById('rep').disabled = false;
	document.getElementById('modificarC').type = 'button';
	document.getElementById('cancelarC').type = 'button';
}

function cancelar() {
	document.getElementById('nom').disabled = true;
	document.getElementById('ape').disabled = true;
	document.getElementById('nic').disabled = true;
	document.getElementById('ced').disabled = true;
	document.getElementById('tel').disabled = true;
	document.getElementById('dir').disabled = true;
	document.getElementById('fec').disabled = true;
	document.getElementById('modificar').type = 'hidden';
	document.getElementById('cancelar').type = 'hidden';
}

function cancelarC() {
	document.getElementById('act').disabled = true;
	document.getElementById('new').disabled = true;
	document.getElementById('rep').disabled = true;
	document.getElementById('modificarC').type = 'hidden';
	document.getElementById('cancelarC').type = 'hidden';
}

function modificarUsuario() {
	var nom = document.getElementById('nom').value;
	var ape = document.getElementById('ape').value;
	var nic = document.getElementById('nic').value;
	var ced = document.getElementById('ced').value;
	var tel = document.getElementById('tel').value;
	var dir = document.getElementById('dir').value;
	var fec = document.getElementById('fec').value;

	if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("datos").innerHTML = this.responseText;
				cancelar();
			}
		};
		xmlhttp.open("GET", "../controladores/cargar_datos.php?nom="+nom+"&ape="+ape+"&nic="+nic+"&ced="+ced+"&tel="+tel+"&dir="+dir+"&fec="+fec, true);
		xmlhttp.send();
}

function modificarContrasena() {
	var act = document.getElementById('act').value;
	var nue = document.getElementById('new').value;
	var rep = document.getElementById('rep').value;

	if (nue == rep) {
		if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("exito").innerHTML = this.responseText;
					cancelarC();
				}
			};
			xmlhttp.open("GET", "../controladores/cargar_contrasena.php?contrasena="+nue+"&actual="+act, true);
			xmlhttp.send();
	} else
		alert('Las contraseñas no coinciden!');
}

function submit() {
	if (window.XMLHttpRequest)
		xmlhttp = new XMLHttpRequest();
	else 
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("foto").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../controladores/agregarFoto.php", true);
	xmlhttp.send();
}