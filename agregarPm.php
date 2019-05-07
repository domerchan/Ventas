<!DOCTYPE html> 

<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/agregar.css">
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
					<li><a href="index.php"><p>Inicio</p></a></li>
					<li><a href="sucursal.php"><p>Sucursal</p></a></li>
					<li><a href="categorias.php"><p>Categorías</p></a></li>
					<li><a href="subcategorias.php"><p>Subcategorías</p></a></li>
					<li><a href="productos.php"><p>Productos</p></a></li>
					<li><a href="promociones.php"><p>Promociones</p></a></li>
				</ul>
			</nav>
		</header>

		<br>
		<br>
		<br>

		<div id="formulario">
			<form method="POST" action="php/agregarPm.php" enctype="multipart/form-data">

				<table>

					<tr>
						<td><label>Categoría</label></td>
						<td>
							<select name="cat">
								<?php
									include'php/conexionBD.php';
									$sql = "SELECT ca_nombre FROM categoria";
									$result = $conn -> query($sql);

									while($row = $result -> fetch_assoc()) {
										echo "<option value='".$row['ca_nombre']."'>".$row['ca_nombre']."</option>";
									}
								?>
							</select>
						</td>
					</tr>

					<tr>
						<td><label>Porcentaje</label></td>
						<td><input class="input" type="number" name="por" min="0" max="99" step="1" value="0"></td>
					</tr>

					<tr>
						<td><label>Día que aplica</label></td>
						<td><select name="dia">
							<option value="1">Lunes</option>
							<option value="2">Martes</option>
							<option value="3">Miércoles</option>
							<option value="4">Jueves</option>
							<option value="5">Viernes</option>
							<option value="6">Sábado</option>
							<option value="7">Domingo</option>
						</select></td>
					</tr>

					<tr>
						<td><label>Descipción</label></td>
						<td><textarea rows="4" cols="50" maxlength="300" name="des" placeholder="ingresar una descripción de la categoría"></textarea></td>
					</tr>

					<tr>
						<td><label>Imagen</label></td>
						<td><input class="input" type="file" name="image"></td>
					</tr>

					<tr>
						<td id="button" colspan="2"><input type="submit" name="submit" value="Agragar Promoción"></td>
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
			    <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="img/ups.png" alt="logo de la Universidad Politecnica Salesiana"></a>
			    <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
			    <br>
			</div>
		</footer>

	</body>

</html>