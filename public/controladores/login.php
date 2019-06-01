
<script type="text/javascript">localStorage.clear();</script>
<?php
	session_start();

	include '../../config/conexionBD.php';

	$usuario = isset($_POST["usu"]) ? trim($_POST["usu"]) : null;
	$contrasena = isset($_POST["con"]) ? trim($_POST["con"]) : null;

	$sql = "SELECT * FROM usuario WHERE us_correo = '$usuario' and us_contrasena = MD5('$contrasena')";

	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
		$row = $result -> fetch_assoc();
		$_SESSION['isLogged'] = TRUE;
		if ($row['us_rol'] == 'user') {
			$_SESSION['rol'] = 'user';
			$_SESSION['codigo'] = $row['us_codigo'];
			header("Location: ../../public/vista/index.php");
		} else {
			$_SESSION['rol'] = 'admin';
			$_SESSION['codigo'] = $row['us_codigo'];
			header("Location: ../../private/admin/vista/usuarios.php");
		}
	} else {
		header("Location: ../../public/vista/login.html");
	}

	$conn -> close();
?>