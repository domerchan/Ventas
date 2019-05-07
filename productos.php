<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/listados.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="js/javascript.js"></script>
	</head>

	<body>

		<header>
			<div id="banner">
				<img src="img/logo4.png">
			</div>
			<div id="gradient"></div>
			<nav class="navHeader">
				<ul>
					<li><a href="index.html"><p>Inicio</p></a></li>
					<li><a href="sucursal.php"><p>Sucursal</p></a></li>
					<li><a href="categorias.php"><p>Categorías</p></a></li>
					<li><a href="subcategorias.php"><p>Subcategorías</p></a></li>
					<li><a href="productos.php"><p>Productos</p></a></li>
					<li><a href="promociones.php"><p>Promociones</p></a></li>
				</ul>
			</nav>
		</header>
		<br>
		<a href="agregarP.php">Agregar un nuevo Producto</a>

		<div id="listado">
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
				</tr>

				<?php
					include'php/conexionBD.php';
					$sql = "SELECT * FROM producto, subcategoria, categoria WHERE producto.sb_codigo = subcategoria.sb_codigo and subcategoria.ca_codigo = categoria.ca_codigo";
					$result = $conn -> query($sql);

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
							echo "</tr>";
						}
					}
				?>
			</table>
		</div>

		<footer>
			<div id="pie">
				<p>
			        Desarrollado por:<br> Jonathan Matute &#8226; Doménica Merchán &#8226; Mark Orellana &#8226; René Panjón &#8226; John Tenesaca
			    </p>
			    <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="img/ups.png" alt="logo de la Universidad Politecnica Salesiana"></a>
			    <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
			    <br>
			</div>
		</footer>

	</body>
</html>