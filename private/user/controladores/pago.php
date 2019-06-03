<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<select>
		<option></option>
		<option>Efectivo</option>
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