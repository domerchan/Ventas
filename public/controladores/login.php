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

		$sql = "SELECT su_codigo FROM factura WHERE fa_compra_realizada = 'N' AND fa_eliminada = 'N' AND us_codigo = ".$row['us_codigo']." LIMIT 1";
		$result = $conn -> query($sql);
		if ($result -> num_rows > 0) {
			$row2 = $result -> fetch_assoc();
			$_SESSION['sucursal'] = $row2['su_codigo'];
		} else
			$_SESSION['sucursal'] = 1;

		$_SESSION['isLogged'] = TRUE;
		$_SESSION['codigo']= $row['us_codigo'];
		$_SESSION['rol'] = $row['us_rol'];

		if ($row['us_rol'] == 'user' && $row['us_eliminado'] == "N")
			header("Location: ../../public/vista/index.php");

		else if ($row['us_rol'] == "user" && $row['us_eliminado'] == "S") {
            echo "<script language='javascript'>";
            echo "var ok = confirm('Tu cuenta ha sido eliminada, ¿Deseas recuperarla?');";
            echo("if (ok) { location.href ='recuperarcuenta.php'; }");           
            echo "</script> ";
        }
		else
			header("Location: ../../private/admin/vista/usuarios.php");
	} else
		header("Location: ../public/vista/login.html");

	$conn -> close();
?>