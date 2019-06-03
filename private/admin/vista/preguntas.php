<?php
	session_start();
	if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE)
		header("Location: ../../../public/vista/login.html");

	if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 'user')
		header("Location: ../../../public/vista/login.html");
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../../config/css/style.css">
		<link rel="stylesheet" type="text/css" href="css/preguntas.css">
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

		<section id="sec1">	

			<h1>PREGUNTAS</h1>

			<form>
				<input type="text" class="btn_noborder" id="remitente" name="remitente" value="" placeholder="Buscar por correo" onkeyup="buscarPorRemitente()">
			</form>
			<br>

			<div id="informacion">
				<?php
					include '../../../config/conexionBD.php';

					$sql = "SELECT * FROM pregunta ORDER BY pg_codigo DESC" ;
					$result = $conn -> query($sql);

					if ($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {
							if ($row['us_codigo'] != null) {
								$sql2 = "SELECT CONCAT(us_nombres, ' ', us_apellidos) AS res FROM usuario WHERE us_codigo = ".$row["us_codigo"];
								$result2 = $conn -> query($sql2);
								$row2 = $result2 -> fetch_assoc();
							} else
								$row2['res'] = $row['pg_nombre'];

							if ($row['pg_market_respuesta'] == null)
								echo "<div class='btn' onclick=\"answerMessage('".$row["pg_usuario_pregunta"]."','".$row2["res"]."', '".$row["pg_fecha_pregunta"]."', '".$row["pg_codigo"]."')\">";
							else
								echo "<div class='btn' onclick=\"openMessage('".$row["pg_usuario_pregunta"]."','".$row2["res"]."', '".$row["pg_fecha_pregunta"]."', '".$row["pg_market_respuesta"]."')\">";
							echo "<table class='informacion'>";
							echo "<tr>";
							echo "<th colspan='2'>".$row["pg_asunto"]."</th>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>".$row2['res']."</td>";
							echo "<td>".$row["pg_fecha_pregunta"]."</td>";
							echo "</tr>";
							echo "</table>";
							echo "</div>";

						}
					} else {
						echo "<table class='informacion'>";
						echo "<tr>";
						echo "<th colspan=4>No tiene correos</th>";
						echo "</tr>";
						echo "</table>";
					}
				?>
			</div>

		</section>

		<section id="sec2">
			<div id="from"></div>
			<div id="mensaje"></div>
			<div id="respuesta">
				<strong><p id="ans"></p></strong>
				<input type="hidden" id="ansH" value="">
				<textarea id="ansT"></textarea>
				<?php
				echo "<button id='ansB' onclick='enviarRespuesta()'>Enviar respuesta</button>";
				?>
				
			</div>
		</section>

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