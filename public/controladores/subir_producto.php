<?php
	session_start();

	include '../../config/conexionBD.php';

	$producto = $_GET['producto'];
	$cantidad = $_GET['cantidad'];
	$usuario = $_SESSION['codigo'];

	$sql = "SELECT * FROM producto WHERE pr_codigo = ".$producto;
	$result = $conn -> query($sql);
	$row = $result -> fetch_assoc();

	$subtotal = (int)$cantidad * (float)$row['pr_precio'];

	$sql = "INSERT INTO factura VALUES(0, '$producto', null, '$cantidad', '$subtotal', 'N', '$usuario', 'N')";
	$conn -> query($sql);
?>