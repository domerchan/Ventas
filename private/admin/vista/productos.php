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
					<li class="frst"><a href="usuarios.php">Usuarios</a></li>
					<li class="frst"><a href="preguntas.php">Preguntas</a></li>
					<li class="frst"><a href="facturas.php">Facturas</a></li>
					<li class="frst"><a href="sucursales.php">Sucursales</a></li>
					<li class="frst"><a href="categorias.php">Categorías</a></li>
					<li class="frst"><a href="subcategorias.php">Subcategorías</a></li>
					<li class="frst"><a href="productos.php">Productos</a></li>
					<li class="frst"><a href="promociones.php">Promociones</a></li>
					<li class='frst'>
						<a>Cuenta</a>
						<ul id="cuenta">
							<li><a href='../controladores/perfil.php'>Perfil</a></li>
					<li><a href='../../../config/cerrar_sesion.php'>Cerrar Sesión</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</header>
		<br>

		<div id="title">
			<h1>PRODUCTOS</h1>
			<a href="agregarP.php">Agregar un nuevo Producto</a>
		</div>

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
					<th>ELIMINAR</th>
				</tr>

				<?php
					include'../../../config/conexionBD.php';
					$sql = "SELECT * FROM producto, subcategoria, categoria WHERE producto.sb_codigo = subcategoria.sb_codigo and subcategoria.ca_codigo = categoria.ca_codigo AND producto.pr_eliminado = 'N'";
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
							echo "<td><button onclick='eliminarProducto(".$row['pr_codigo'].")'>Eliminar</button></td>";
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
	<script type="text/javascript" src="../controladores/javascript.js"></script>
</html>