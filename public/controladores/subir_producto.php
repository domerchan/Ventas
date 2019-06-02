<?php
	session_start();

	include '../../config/conexionBD.php';

	$producto = $_GET['producto'];
	$cantidad = $_GET['cantidad'];
	$usuario = $_SESSION['codigo'];

	$sql = "SELECT count(*) FROM factura WHERE fa_compra_realizada = 'N' AND fa_eliminada = 'N' AND us_codigo = ".$usuario;
	$result = $conn -> query($sql);
	$row = $result -> fetch_assoc();
	if ($row['count(*)'] == 0) {
		$sql = "INSERT INTO `factura-cabecera` VALUES(0, '$usuario', null, null, null, null, null, null, null, null, null, 'creada')";
		$conn -> query($sql);
	}

	$sql = "SELECT fc_codigo FROM `factura-cabecera` WHERE us_codigo = ".$usuario." ORDER BY fc_codigo DESC LIMIT 1";
	$result = $conn -> query($sql);
	$row = $result -> fetch_assoc();

	$sql2 = "SELECT pr_precio FROM producto WHERE pr_codigo = ".$producto;
	$result2 = $conn -> query($sql2);
	$row2 = $result2 -> fetch_assoc();

	$subtotal = (int)$cantidad * (float)$row2['pr_precio'];

	$sql = "INSERT INTO factura VALUES(0, '$producto', '".$row['fc_codigo']."', '$cantidad', '$subtotal', 'N', '$usuario', 'N')";
	$conn -> query($sql);
?>