<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include'../../config/conexionBD.php';

	$sql = "SELECT su_no_calificaciones, su_calificacion FROM sucursal WHERE su_codigo =".$_GET['codigo'];
	$result = $conn -> query($sql);
	$row = $result -> fetch_assoc();

	$no = (int)$row['su_no_calificaciones'] + 1;
	$cal = (int)$row['su_calificacion'] + (int)$_GET['valor'];

	$sql = "UPDATE sucursal SET su_no_calificaciones = '$no', su_calificacion = '$cal' WHERE su_codigo =".$_GET['codigo'];
	if ($conn -> query($sql)) 
		echo "exito";
	else
		echo "Error: ".$conn->error;
	?>
</body>
</html>