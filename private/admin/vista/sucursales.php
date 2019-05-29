<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../../config/css/style.css">
		<link rel="stylesheet" type="text/css" href="css/listados.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">

		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="../../../config/js/javascript.js"></script>
	</head>

	<body>

		<header>
			<div id="banner">
				<img src="../../../config/img/logo4.png">
			</div>
			<div id="gradient"></div>
			<nav class="navHeader">
				<ul class="ul1">
					<li class="frst"><a href="../../../public/vista/index.php">Inicio</a></li>
					<li class="frst"><a href="sucursal.php">Sucursal</a></li>
					<li class="frst"><a href="categorias.php">Categorías</a></li>
					<li class="frst"><a href="subcategorias.php">Subcategorías</a></li>
					<li class="frst"><a href="productos.php">Productos</a></li>
					<li class="frst"><a href="promociones.php">Promociones</a></li>
				</ul>
			</nav>
		</header>
		<br>
		<a href="agregarPm.php">Agregar una nueva Promoción</a>

		<div id="listado">
			<table>
				<tr>
					<th>ID</th>
					<th>MARKET</th>
					<th>NOMBRE</th>
					<th>DIRECCION</th>
					<th>TELEFONO</th>
					<th>RUC</th>
					<th>IMAGEN</th>
                    <th>FECHA CREACION</th>
				</tr>

				<?php
					include'../../../config/conexionBD.php';
					$sql = "SELECT * FROM sucursal, market WHERE sucursal.su_codigo = market.ma_codigo";
					$result = $conn -> query($sql);

					if($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {
							echo "<tr>";
							echo "<td class='id'>".$row["su_codigo"]."</td>";
							echo "<td class='nom'>".$row["ma_nombre"]."</td>";
							echo "<td class='nom'>".$row["su_nombre"]."</td>";
							echo "<td class='dir'>".$row["su_direccion"]."</td>";
							echo "<td class='tel'>".$row["su_telefono"]."</td>";
							echo "<td class='ruc'>".$row["su_ruc"]."</td>";
                            echo "<td class='img'><img src='data:image/jpg;base64,".base64_encode($row["su_imagen"])."'/></td>";
                            echo "<td class='fechaCreacion'>".$row["su_fecha_creacion"]."</td>";
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
			    <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="../../../config/img/ups.png" alt="logo de la Universidad Politecnica Salesiana"></a>
			    <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
			    <br>
			</div>
		</footer>
		
	</body>
</html>