<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "user")
        header("Location: /ProgramacionHipermedial/Ventas/private/user/vista/perfil.php");  
?>

<?php
include '../../../config/conexionBD.php';

$sql = "UPDATE `factura-cabecera` SET fc_estado = 'enviada' WHERE fc_codigo = ".$_GET['codigo'];
$conn -> query($sql);
?>

<table>
	<tr>
		<th></th>
		<th>ID</th>
		<th>USUARIO</th>
		<th>NOMBRE</th>
		<th>DIRECCIÓN</th>
		<th>CEDULA</th>
		<th>CORREO</th>
		<th>TELEFONO</th>
		<th>FECHA EMISIÓN</th>
		<th>SUBTOTAL</th>
		<th>TOTAL</th>
		<th>ESTADO</th>
		<th>ENVIAR</th>
	</tr>

	<?php
		include'../../../config/conexionBD.php';
		$i = 1;
		$sql = "SELECT * FROM `factura-cabecera`";
		$result = $conn -> query($sql);

		if($result -> num_rows > 0) {
			while ($row = $result -> fetch_assoc()) {
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td class='id'>".$row["fc_codigo"]."</td>";
				echo "<td class=''>".$row["us_codigo"]."</td>";
				echo "<td class=''>".$row["fc_nombres"]."</td>";
				echo "<td class=''>".$row["fc_direccion"]."</td>";
				echo "<td class=''>".$row["fc_cedula"]."</td>";
				echo "<td class=''>".$row["fc_correo"]."</td>";
				echo "<td class=''>".$row["fc_telefono"]."</td>";
				echo "<td class=''>".$row["fc_fecha_emision"]."</td>";
				echo "<td class=''>".$row["fc_subtotal"]."</td>";
				echo "<td class=''>".$row["fc_total"]."</td>";
				echo "<td class=''>".$row["fc_estado"]."</td>";
				if ($row["fc_estado"] == 'confirmada')
					echo "<td><i class='material-icons enviar' onclick='enviar(".$row['fc_codigo'].")'>send</i></td>";
				else
					echo "<td></td>";
				
				echo "</tr>";
				$i++;
			}
		}
	?>
</table>