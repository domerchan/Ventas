<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "admin")
        header("Location: /ProgramacionHipermedial/Ventas/private/admin/vista/perfil.php");  
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
		include '../../../config/conexionBD.php';
		session_start();
		$usuario = $_SESSION['codigo'];
		$sucursal = $_SESSION['sucursal'];

		$sql = "SELECT fc_codigo FROM `factura-cabecera` WHERE fc_estado = 'creada' AND us_codigo = ".$usuario." ORDER BY fc_codigo DESC LIMIT 1";
		$result = $conn -> query($sql);
		$row = $result -> fetch_assoc();

		date_default_timezone_set("America/Guayaquil");
		$fecha = date('Y-m-d H:i:s', time());
		$envio = $_GET['envio'];
		$subtotal = $_GET['subtotal'];
		$total = $_GET['total'];
		$nombres = $_GET['nombre'];
		$direccion = $_GET['direccion'];
		$cedula = $_GET['cedula'];
		$telefono = $_GET['telefono'];
		$correo = $_GET['correo'];

		$sql = "UPDATE `factura-cabecera` SET fc_fecha_emision = '$fecha', fc_envio = '$envio', fc_subtotal = '$subtotal', fc_total = '$total', fc_nombres = '$nombres', fc_direccion = '$direccion', fc_cedula = '$cedula', fc_telefono = '$telefono', fc_correo = '$correo', fc_estado = 'confirmada', su_codigo = '$sucursal' WHERE fc_codigo = ".$row['fc_codigo'];
		if ($conn -> query($sql))
			echo "exito";
		else
			echo "error fc ".$conn->error;

		$sql = "UPDATE factura SET fa_compra_realizada = 'S' WHERE fa_eliminada = 'N' AND fc_codigo = ".$row['fc_codigo'];
		if ($conn -> query($sql))
			echo "exito";
		else
			echo "error f ".$conn->error;
		?>

	</body>
</html>