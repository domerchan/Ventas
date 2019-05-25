<?php
	$db_servername = "35.199.81.45";
	$db_username = "admin";
	$db_password = "Admin_ups2019";
	$db_name = "ventas";

	//crea conexión

	$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
	$conn -> set_charset("utf8");

	//check conexión

	if ($conn -> connect_error) {
		die("Conexión fallida!".$conn -> connect_error);
	}
?>