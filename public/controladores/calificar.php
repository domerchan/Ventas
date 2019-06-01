<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include'../../config/conexionBD.php';

	$sql = "SELECT pr_no_calificaciones, pr_calificacion FROM producto WHERE pr_codigo =".$_GET['codigo'];
	$result = $conn -> query($sql);
	$row = $result -> fetch_assoc();

	$no = (int)$row['pr_no_calificaciones'] + 1;
	$cal = (int)$row['pr_calificacion'] + (int)$_GET['valor'];

	$sql = "UPDATE producto SET pr_no_calificaciones = '$no', pr_calificacion = '$cal' WHERE pr_codigo =".$_GET['codigo'];
	if ($conn -> query($sql)) 
		echo "exito";
	else
		echo "Error: ".$conn->error;
	?>
</body>
</html>