<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<select id="options" name="options" onchange='forma()'> 

<option value="1" >Tarjeta de Credito </option>
<option value="0" selected>Efectivo </option>
</select> 
	<br>
	<br>
	<br>
	<?php
		$total = $_GET['total'];
		echo "<br>";
		echo "<button id='avanzar' onclick='envio(".$total.")'>Datos de Envío ></button>";
		echo "<button id='retroceder' onclick='detalle()'>< Carrito</button>";
	?>
</body>
</html>
