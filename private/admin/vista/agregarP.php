<!DOCTYPE html> 

<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../../config/css/style.css">
		<link rel="stylesheet" type="text/css" href="css/agregar.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="js/javascript.js"></script>
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
			<form method="POST" action="agregarP.php" enctype="multipart/form-data">

				<table>

					<tr>
						<td><label>Categoría</label></td>
						<td>
							<select name="cat">
								<option></option>
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
						<td id="button" colspan="2"><input type="submit" name="submit" value="Agragar Categoría"></td>
					</tr>
				</table>
			</form>

			<form method="POST" action="../controladores/agregarP.php" enctype="multipart/form-data">
				<table>

					<tr>
						<td><label>Subategoría</label></td>
						<td>
							<select name="sub" >
								<option></option>
								<?php
									$categoria = $_POST['cat'];
									$sql = "SELECT ca_codigo FROM categoria WHERE ca_nombre = '$categoria'";
									$result = $conn -> query($sql);
									$row = $result -> fetch_assoc();
									$ca_codigo = $row['ca_codigo'];
									$sql = "SELECT sb_nombre FROM subcategoria WHERE ca_codigo = '$ca_codigo'";
									$result = $conn -> query($sql);

									while($row = $result -> fetch_assoc()) {
										echo "<option value='".$row['sb_nombre']."'>".$row['sb_nombre']."</option>";
									}
								?>
							</select>
						</td>
					</tr>

					<tr>
						<td><label>Nombre</label></td>
						<td><input class="input" type="text" name="nom" placeholder="ingresar el nombre del producto"></td>
					</tr>

					<tr>
						<td><label>Descipción</label></td>
						<td><textarea rows="4" cols="50" maxlength="300" name="des" placeholder="ingresar una descripción de la categoría"></textarea></td>
					</tr>

					<tr>
						<td><label>Precio</label></td>
						<td><input class="input" type="number" name="pre" min="0" max="999,99" step="0.01" value="0.00"></td>
					</tr>

					<tr>
						<td><label>Unidad</label></td>
						<td><select name="uni"><option value="unidad">Unidad</option><option value="kilogramo">Kilogramo</option></select></td>
					</tr>

					<tr>
						<td><label>Stock</label></td>
						<td><input class="input" type="number" name="stk" min="0" max="99999" step="1" value="0"></td>
					</tr>

					<tr>
						<td><label>Oferta</label></td>
						<td><input class="input" type="number" name="ofr" min="0" max="99" step="1" value="0"></td>
					</tr>

					<tr>
						<td><label>Nivel de Azúcar</label></td>
						<td><select name="azc"><option value="alto">Alto</option><option value="medio">Medio</option><option value="bajo">Bajo</option><option value="nulo">Nulo</option></select></td>
					</tr>

					<tr>
						<td><label>Nivel de Grasa</label></td>
						<td><select name="grs"><option value="alto">Alto</option><option value="medio">Medio</option><option value="bajo">Bajo</option><option value="nulo">Nulo</option></select></td>
					</tr>

					<tr>
						<td><label>Nivel de Sal</label></td>
						<td><select name="sal"><option value="alto">Alto</option><option value="medio">Medio</option><option value="bajo">Bajo</option><option value="nulo">Nulo</option></select></td>
					</tr>

					<tr>
						<td><label>Imagen</label></td>
						<td><input class="input" type="file" name="image"></td>
					</tr>

					<tr>
						<td id="button" colspan="2"><input type="submit" name="submit" value="Agragar Producto"></td>
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