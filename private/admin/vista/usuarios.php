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
					<li class="frst"><a href="sucursales.php">Sucursales</a></li>
					<li class="frst"><a href="categorias.php">Categorías</a></li>
					<li class="frst"><a href="subcategorias.php">Subcategorías</a></li>
					<li class="frst"><a href="productos.php">Productos</a></li>
					<li class="frst"><a href="promociones.php">Promociones</a></li>
					<li class='frst'>
						<a>Cuenta</a>
						<ul id="cuenta">
							<li><a href='../controladores/perfil.php'>Perfil</a></li>
					<li class='frst'><a href='../../../config/cerrar_sesion.php'>Cerrar Sesión</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</header>
		<br>

		<div id="title">
			<h1>USUARIOS</h1>
		</div>

		<div id="listado">
			<table>
				<tr>
					<th>ID</th>
					<th>NOMBRES</th>
					<th>SEXO</th>
					<th>CÉDULA</th>
					<th>TELÉFONO</th>
					<th>NICK</th>
					<th>DIRECCIÓN</th>
					<th>CORREO</th>
					<th>NACIMIENTO</th>
					<th>CREACIÓN</th>
					<th>ELIMINADO</th>
					<th>EDITAR</th>
					<th>CONTRASEÑA</th>
					<th>ELIMINAR</th>
				</tr>

				<?php
					include'../../../config/conexionBD.php';
					$sql = "SELECT * FROM usuario WHERE us_rol = 'user'";
					$result = $conn -> query($sql);

					if($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {
							echo "<tr>";
							echo "<td class='id'>".$row["us_codigo"]."</td>";
							echo "<td class='nom'>".$row["us_nombres"]." ".$row["us_apellidos"]."</td>";
							echo "<td class=''>".$row["us_sexo"]."</td>";
							echo "<td class=''>".$row["us_cedula"]."</td>";
							echo "<td class=''>".$row["us_telefono"]."</td>";
							echo "<td class=''>".$row["us_nick"]."</td>";
							echo "<td class=''>".$row["us_direccion"]."</td>";
							echo "<td class=''>".$row["us_correo"]."</td>";
							echo "<td class=''>".$row["us_fecha_nacimiento"]."</td>";
							echo "<td class=''>".$row["us_fecha_creacion"]."</td>";
							echo "<td class=''>".$row["us_eliminado"]."</td>";
							echo "<td><i class='material-icons editar' onclick='editar(".$row['us_codigo'].")'>supervised_user_circle</i></td>";
							echo "<td><i class='material-icons cambiar' onclick='cambiarContrasena(".$row['us_codigo'].")'>swap_horizontal_circle</i></td>";
							echo "<td><i class='material-icons quitar' onclick='eliminarUsuario(".$row['us_codigo'].")'>remove_circle_outline</i></td>";
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