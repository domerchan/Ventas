<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table id="bordes">
		<?php

			include'../../../config/conexionBD.php';

			$total = $_GET['total'];
			$sql = "SELECT * FROM usuario WHERE us_codigo = ".$_SESSION['codigo'];
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();

			echo "<tr>";
			echo "<td>Nombres: </td>";
			echo "<td><input id='nom' type='text' value='".$row['us_nombres']." ".$row['us_apellidos']."'></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Teléfono: </td>";
			echo "<td><input id='tel' type='text' value='".$row['us_telefono']."'></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Cédula: </td>";
			echo "<td><input id='ced' type='text' value='".$row['us_cedula']."'></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Dirección: </td>";
			echo "<td><input id='dir' type='text' value='".$row['us_direccion']."'></td>";
			echo "</tr>";
		?>
	</table>
	<?php
	echo "<br>";
	echo "<button id='avanzar' onclick='confirmar(".$total.")'>Confirmación de Datos ></button>";
	echo "<button id='retroceder' onclick='envio(".$total.")'>< Datos de Envío</button>";
	?>
</body>
</html>