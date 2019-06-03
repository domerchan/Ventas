<?php
	session_start();
	if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE)
		header("Location: /ProgramacionHipermedial/Ventas%20-%20copia/public/vista/login.html");

	if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 'user')
		header("Location: /ProgramacionHipermedial/Ventas%20-%20copia/public/vista/login.html");
?>

<!DOCTYPE html>
<html>

	<head>
		<title></title>

		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
			<h1>CATEGORÍAS</h1>
			<a href="agregarC.php">Agregar una nueva Categoría</a>
		</div>

		<div id="listado">
			<table>
				<tr>
					<th>ID</th>
					<th>AREA</th>
					<th>NOMBRE</th>
					<th>DESCRIPCION</th>
					<th>IMAGEN</th>
				</tr>

				<?php
					include'../../../config/conexionBD.php';
					$sql = "SELECT * FROM categoria";
					$result = $conn -> query($sql);

					if($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {

							$sql2 = "SELECT * FROM area WHERE ar_codigo = ".$row['ar_codigo'];
							$result2 = $conn -> query($sql2);
							$row2 = $result2 -> fetch_assoc();
							
							echo "<tr>";
							echo "<td class='id'>".$row["ca_codigo"]."</td>";
							echo "<td class='are'>".$row2["ar_nombre"]."</td>";
							echo "<td class='nom'>".$row["ca_nombre"]."</td>";
							echo "<td class='des'>".$row["ca_descripcion"]."</td>";
							echo "<td class='img'><img src='data:image/jpg;base64,".base64_encode($row["ca_imagen"])."'/></td>";
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