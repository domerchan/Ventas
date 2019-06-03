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

	<div id="factura">
		<table id="cabecera">
			<?php
			include'../../../config/conexionBD.php';

			$sql = "SELECT * FROM market";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();

			$sql = "SELECT su_direccion FROM sucursal WHERE su_codigo = ".$_SESSION['sucursal'];
			$result = $conn -> query($sql);
			$row2 = $result -> fetch_assoc();
			?>

			<tr>
				<td><img src="../../../config/img/logo1.png"></td>
				<td colspan="3"><h2><?php echo $row['ma_nombre']; ?></h2><p><?php echo $row2['su_direccion']; ?></p><p><?php echo $row['ma_telefono1']; ?></p><p><?php echo $row['ma_telefono2']; ?></p></td>
			</tr>

			<tr>
				<td><strong>Nombres: </strong></td>
				<td colspan="3"> <input type="text" id="nom" disabled="true" value=<?php echo $_GET['nombre']; ?> > </td>
			</tr>

			<tr>
				<td><strong>Teléfono: </strong></td>
				<td> <input type="text" id="tel" disabled="true" value=<?php echo $_GET['telefono']; ?> > </td>
				<td><strong>Cédula: </strong></td>
				<td> <input type="text" id="ced" disabled="true" value=<?php echo $_GET['cedula']; ?> > </td>
			</tr>

			<tr>
				<td><strong>Dirección: </strong></td>
				<td colspan="3"> <input type="text" id="dir" disabled="true" value=<?php echo $_GET['direccion']; ?> > </td>
			</tr>

			<tr>
				<td><strong>Correo: </strong></td>
				<td colspan="3"> <input type="text" id="cor" disabled="true" value=<?php echo $_GET['correo']; ?> > </td>
			</tr>
		</table>
		<table id="detalle">
			<tr>
				<th>CANTIDAD</th>
				<th>DESCRIPCION</th>
				<th>P.U.</th>
				<th>VENTA</th>
			</tr>
			<?php
				$sub = 0.0;
				$sql = "SELECT * FROM factura WHERE us_codigo = ".$_SESSION['codigo']." AND fa_compra_realizada = 'N' AND fa_eliminada = 'N'";
				$result = $conn -> query($sql);
				while ($row = $result -> fetch_assoc()) {
					$sub += (float)$row['fa_subtotal'];
					$sql2 = "SELECT * FROM producto WHERE pr_codigo = ".$row['pr_codigo'];
					$result2 = $conn -> query($sql2);
					$row2 = $result2 -> fetch_assoc();
					echo "<tr>";
					echo "<td>".$row['fa_cantidad']."</td>";
					echo "<td>".$row2['pr_nombre']."</td>";
					echo "<td>".$row2['pr_precio']."</td>";
					echo "<td>".$row['fa_subtotal']."</td>";
					echo "</tr>";
				}
				$envio = number_format($_GET['distancia']*30, 2);
				$iva = number_format(0.12*$sub,2);
				if ($envio < 0.5)
					$envio = 0.5;
				if ($sub > 100.0)
					$envio = 0.0;
				$total = $iva + $sub + $envio;
				echo "<tr>";
				echo "<td rowspan='4' colspan='2'></td>";
				echo "<th>Sub Total:</th>";
				echo "<td><input id='sub' type='number' disabled='true' value='".$sub."'></td>";
				echo "</tr>";

				echo "<tr>";
				echo "<th>iva 12%:</th>";
				echo "<td>".$iva."</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<th>Envío:</th>";
				echo "<td><input id='env' type='number' disabled='true' value='".$envio."'></td>";
				echo "</tr>";

				echo "<tr>";
				echo "<th>Total:</th>";
				echo "<td><input id='tot' type='number' disabled='true' value='".$total."'></td>";
				echo "</tr>";
			?>
		</table>
	</div>

	<?php
		$total = $_GET['total'];
		echo "<br>";
		echo "<button id='avanzar' onclick='crearPedido()'>Confirma tu compra!</button>";
		echo "<button id='retroceder' onclick='factura(".$total.")'>< Datos Factura</button>";
	?>
</body>
</html>