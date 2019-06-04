
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
			<h1>FACTURAS</h1>
		</div>

		<div id="listado">
			<table>
				<tr>
					<th></th>
					<th>ID</th>
					<th>USUARIO</th>
					<th>NOMBRE</th>
					<th>DIRECCIÓN</th>
					<th>CEDULA</th>
					<th>CORREO</th>
					<th>TELEFONO</th>
					<th>FECHA EMISIÓN</th>
					<th>SUBTOTAL</th>
					<th>TOTAL</th>
					<th>ESTADO</th>
					<th>ENVIAR</th>
				</tr>

				<?php
					include'../../../config/conexionBD.php';
					$i = 1;
					$sql = "SELECT * FROM `factura-cabecera`";
					$result = $conn -> query($sql);

					if($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {
							echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td class='id'>".$row["fc_codigo"]."</td>";
							echo "<td class=''>".$row["us_codigo"]."</td>";
							echo "<td class=''>".$row["fc_nombres"]."</td>";
							echo "<td class=''>".$row["fc_direccion"]."</td>";
							echo "<td class=''>".$row["fc_cedula"]."</td>";
							echo "<td class=''>".$row["fc_correo"]."</td>";
							echo "<td class=''>".$row["fc_telefono"]."</td>";
							echo "<td class=''>".$row["fc_fecha_emision"]."</td>";
							echo "<td class=''>".$row["fc_subtotal"]."</td>";
							echo "<td class=''>".$row["fc_total"]."</td>";
							echo "<td class=''>".$row["fc_estado"]."</td>";
							if ($row["fc_estado"] == 'confirmada')
								echo "<td><i class='material-icons enviar' onclick='enviar(".$row['fc_codigo'].")'>send</i></td>";
							else
								echo "<td></td>";
							
							echo "</tr>";
							$i++;
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