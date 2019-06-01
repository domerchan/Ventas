<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include'../../../config/conexionBD.php';
		$contrasena = trim($_GET['contrasena']);
		$sql = "UPDATE usuario SET us_contrasena = MD5('$contrasena') WHERE us_codigo =".$_GET['usuario'];
		$conn -> query($sql)
	?>
</body>
</html>