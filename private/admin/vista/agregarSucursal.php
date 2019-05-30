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
		<br>
		<br>

		<div id="formulario">
			<form method="POST" action="../controladores/agregarSucursal.php" enctype="multipart/form-data">

				<table>

					<tr>
						<td><label>Sucursal</label></td>
						<td>
							<select name="suc">
								<?php
									include'../../../config/conexionBD.php';
									$sql = "SELECT su_nombre FROM sucursal";
									$result = $conn -> query($sql);

									while($row = $result -> fetch_assoc()) {
										echo "<option value='".$row['su_nombre']."'>".$row['su_nombre']."</option>";
									}
								?>
							</select>
						</td>
					</tr>

					<tr>
						<td><label>Nombre</label></td>
						<td><input class="input" type="text" name="nom"></td>
					</tr>

					<tr>
						<td><label>Direccion</label></td>
						<td><input class="input" type="text" name="dir"></td>
					</tr>

					<tr>
					   <td><label>Telefono</label></td>
                       <td><input class="input" type="text" name="tel"></td>
					</tr>

					<tr>
					   <td><label>Ruc</label></td>
                       <td><input class="input" type="text" name="ruc"></td>
					</tr>

					<tr>
						<td><label>Imagen</label></td>
						<td><input class="input" type="file" name="image"></td>
					</tr>

					<tr>
					   <td><label>Fecha Creacion</label></td>
					   <td><input class="input" type="date" name="fechaCreacion"></td>
					</tr>

					<tr>
						<td id="button" colspan="2"><input type="submit" name="submit" value="Agregar Promoción"></td>
					</tr>

				</table>
			</form>
		</div>

		<br>
		<br>
		<br>

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