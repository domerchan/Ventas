<?php
	include'../../../config/conexionBD.php';

	$categoria = $_POST['cat'];
	$nombre = isset($_POST['nom']) ? trim($_POST['nom']) : null;

 	$sql = "SELECT ca_codigo FROM categoria WHERE ca_nombre = '$categoria'";
 	$result = $conn -> query($sql);
 	$row = $result -> fetch_assoc();
 	$ca_codigo = $row['ca_codigo'];


	$sql = "INSERT INTO subcategoria VALUES (0, '$ca_codigo', '$nombre')";

	if ($conn -> query($sql) == TRUE) {
		echo "<h2>Se han cargado los datos correctamente!</h2>";
	} else {
		echo "<p class = 'error'>Error: <p/>";
	}


	echo "<br><a href='../vista/agregarS.php'>Regresar</a>";
	echo "<br><a href='../vista/subcategorias.php'>Subcategorías</a>";

?>