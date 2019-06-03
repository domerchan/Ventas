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
		<table id="bordes">
			<tr>
				<th></th>
				<th colspan="2">PRODUCTO</th>
				<th>CANTIDAD</th>
				<th>PRECIO UNITARIO</th>
				<th>SUBTOTAL</th>
			</tr>
			<?php
			session_start();
			include '../../../config/conexionBD.php';

			$total = 0.0;
			$sql = "UPDATE factura SET fa_eliminada = 'S' WHERE fa_codigo =".$_GET['codigo'];
			if ($conn -> query($sql)) {
				$sql = "SELECT * FROM factura, producto WHERE factura.us_codigo = ".$_SESSION['codigo']." AND factura.fa_compra_realizada = 'N' AND factura.fa_eliminada = 'N' AND producto.pr_codigo = factura.pr_codigo";
				$result = $conn -> query($sql);
				while ($row = $result -> fetch_assoc()) {
					$total += (float)$row['fa_subtotal'];
					echo "<tr>";
					echo "<td><i class='material-icons quitar' onclick='quitarProducto(".$row['fa_codigo'].")'>remove_circle_outline</i></td>";
					echo "<td><img src='data:image/jpg;base64,".base64_encode($row["pr_imagen"])."'/></td>";
					echo "<td><p>".$row['pr_nombre']."</p><br><p>".$row['pr_descripcion']."</p></td>";
					echo "<td><p>".$row['fa_cantidad']."</p></td>";
					echo "<td><p>".$row['pr_precio']."</p></td>";
					echo "<td><p>".$row['fa_subtotal']."</p></td>";
					echo "</tr>";
				}
				echo "<tr>";
				echo "<th colspan='5'>Total:</th>";
				echo "<td>".$total."$</td>";
				echo "</tr>";
			} else
				echo "Error ".$conn->error;
			?>
		</table>
		<?php
			echo "<button id='avanzar' onclick='pago(".$total.")'>Forma de Pago ></button>";
		?>
	</body>
</html>