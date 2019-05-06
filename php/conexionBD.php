<?php
	$db_servername = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "ventas";

	//crea conexión

	$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
	$conn -> set_charset("utf8");

	//check conexión

	if ($conn -> connect_error) {
		die("Conexión fallida!".$conn -> connect_error);
	}
?>