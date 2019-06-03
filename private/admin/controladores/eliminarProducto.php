<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "user")
        header("Location: /ProgramacionHipermedial/Ventas/private/user/vista/perfil.php");  
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include'../../../config/conexionBD.php';

		$sql = "UPDATE producto SET pr_eliminado = 'S' WHERE pr_codigo = ".$_GET['producto'];
		if ($conn -> query($sql)) {
	?>
	<table>
		<tr>
			<th>ID</th>
			<th>CATEGORIA</th>
			<th>SUBCATEGORIA</th>
			<th>NOMBRE</th>
			<th>DESCRIPCION</th>
			<th>PRECIO</th>
			<th>UNIDAD</th>
			<th>IMAGEN</th>
			<th>STOCK</th>
			<th>OFERTA</th>
			<th>NIVEL DE AZUCAR</th>
			<th>NIVEL DE GRASA</th>
			<th>NIVEL DE SAL</th>
			<th>ELIMINAR</th>
		</tr>

		<?php
			$sql2 = "SELECT * FROM producto, subcategoria, categoria WHERE producto.sb_codigo = subcategoria.sb_codigo AND subcategoria.ca_codigo = categoria.ca_codigo AND producto.pr_eliminado = 'N'";
			$result = $conn -> query($sql2);

			if($result -> num_rows > 0) {
				while ($row = $result -> fetch_assoc()) {
					echo "<tr>";
					echo "<td class='id'>".$row["pr_codigo"]."</td>";
					echo "<td class='id'>".$row["ca_nombre"]."</td>";
					echo "<td class='id'>".$row["sb_nombre"]."</td>";
					echo "<td class='nom'>".$row["pr_nombre"]."</td>";
					echo "<td class='des'>".$row["pr_descripcion"]."</td>";
					echo "<td class='pre'>".$row["pr_precio"]."</td>";
					echo "<td class='uni'>".$row["pr_unidad"]."</td>";
					echo "<td class='img'><img src='data:image/jpg;base64,".base64_encode($row["pr_imagen"])."'/></td>";
					echo "<td class='stk'>".$row["pr_stock"]."</td>";
					echo "<td class='ofr'>".$row["pr_oferta"]."</td>";
					echo "<td class='azc'>".$row["pr_nivel_azucar"]."</td>";
					echo "<td class='grs'>".$row["pr_nivel_grasa"]."</td>";
					echo "<td class='sal'>".$row["pr_nivel_sal"]."</td>";
					echo "<td><button onclick='eliminar(".$row['pr_codigo'].")'>Eliminar</button></td>";
					echo "</tr>";
				}
			}
		?>
	</table>
	<?php
		} else {
			echo "<tr>";
			echo "<td colspan='14'>Ha ocurrido un error!</td>";
			echo "</tr>";
		}
	?>
</body>
</html>