<!DOCTYPE html> 

<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../../config/css/style.css">
		<link rel="stylesheet" type="text/css" href="css/agregar.css">
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
		<br>
		
		<div id="title">
			<h2>AGREGAR NUEVA SUCURSAL</h2>
		</div>

		<div id="formulario">
			<form method="POST" action="../controladores/agregarSu.php" enctype="multipart/form-data">

				<table>

					<tr>
						<td><label>Nombre</label></td>
						<td><input class="input" type="text" name="nom" placeholder="ingresar el nombre de la sucursal"></td>
					</tr>

					<tr>
						<td><label>Dirección</label></td>
						<td><input class="input" type="text" name="dir" placeholder="ingresar la dirección de la sucursal"></td>
					</tr>

					<tr>
						<td><label>Teléfono</label></td>
						<td><input class="input" type="text" name="tel" placeholder="ingresar el teléfono de la sucursal"></td>
					</tr>

					<tr>
						<td><label>Ruc</label></td>
						<td><input class="input" type="text" name="ruc" placeholder="ingresar el ruc de la sucursal"></td>
					</tr>

					<tr>
						<td><label>Imagen</label></td>
						<td><input class="input" type="file" name="image"></td>
					</tr>

					<tr>
						<td id="button" colspan="2"><input type="submit" name="submit" value="Agragar Sucursal"></td>
					</tr>

				</table>
			</form>
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