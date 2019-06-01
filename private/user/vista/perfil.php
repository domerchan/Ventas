<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
        header("Location: /SistemaDeGestion/public/vista/login.html");
    else if($_SESSION['rol'] == "admin")
        header("Location: ../../admin/vista/perfil.php");
    
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Market Online</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="../../../config/css/style.css">
		<link rel="stylesheet" type="text/css" href="css/perfil.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">

		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
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
					<?php
					include'../../../config/conexionBD.php';
					$sql = "SELECT * FROM area";
					$result = $conn -> query($sql);
					while($row = $result -> fetch_assoc()) {
						echo "<li class='frst'>";
						echo "<a>".$row['ar_nombre']."</a>";
						
						echo "<ul id='categorias'>";
						$sql2 = "SELECT * FROM categoria WHERE ar_codigo = ".$row['ar_codigo'];
						$result2 = $conn -> query($sql2);
						while ($row2 = $result2 -> fetch_assoc()) {
							echo "<li><a href='../../../public/vista/productos.php?categoria=".$row2['ca_codigo']."&n_categoria=".$row2['ca_nombre']."'>".$row2['ca_nombre']."</a><div class='img' style=\"background-image: url('data:image/jpg;base64,".base64_encode($row2["ca_imagen"])."')\"></div></li>";
						}
						echo "</ul>";
						
						echo "</li>";
					}
					?>
					<li class="frst"><a href="../../../public/vista/promociones.php">Promociones</a></li>
					<li class='frst'>
						<?php
						if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE)
							echo "<a href='login.html'>Iniciar Sesión</a>";
						if($_SESSION['isLogged'] === TRUE) {
							echo "<a>Cuenta</a>";
							echo "<ul id='cuenta'>";
							echo "<li><a href='../../private/user/vista/perfil.php'>Perfil</a></li>";
							echo "<li><a href='../../../config/cerrar_sesion.php'>Cerrar Sesión</a></li>";
							echo "</ul>";
						}
						?>
					</li>
					
				</ul>
				<?php
				if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'user')
					echo "<a href='carro.php'><i class='material-icons'>shopping_cart</i></a>";
				?>
			</nav>
		</header>
		<br>
		<h1>Tu Cuenta</h1>


		<section id="sec0">
			<?php
				include '../../../config/conexionBD.php';
				$sql = "SELECT * FROM usuario WHERE ".$_SESSION['codigo']." = usuario.us_codigo";
				$result = $conn -> query($sql);
				$row = $result -> fetch_assoc();

				echo "<form method='POST'>";
				echo "<a onclick='chooseFile()'><img id='foto' src='data:image/jpg;base64,".base64_encode($row["us_imagen"])."'/></a>";
				echo "<input type='file' id='image' name='image' onchange='submit()'>";
				echo "</form>";

			?>
		</section>

		<section id="sec2">
			<div>
				<?php
					echo "<table id='datos'>";
					echo "<tr>";
					echo "<td colspan='2'><input type='button' class='editar' value='Editar datos' onclick='editar()' name=''></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Nombres</th>";
					echo "<td><input id='nom' name='nom' value= '".$row['us_nombres']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Apellidos</th>";
					echo "<td><input id='ape' name='ape' value= '".$row['us_apellidos']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Nick</th>";
					echo "<td><input id='nic' name='nic' value= '".$row['us_nick']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Cédula</th>";
					echo "<td><input id='ced' name='ced' value= '".$row['us_cedula']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Dirección</th>";
					echo "<td><input id='dir' name='dir' value= '".$row['us_direccion']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Teléfono</th>";
					echo "<td><input id='tel' name='tel' value= '".$row['us_telefono']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Fecha de Nacimiento</th>";
					echo "<td><input id='fec' name='fec' type='date' value= '".$row['us_fecha_nacimiento']."' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan='2'><input type='hidden' id='modificar' value='Guardar Cambios' onclick='modificarUsuario()'>";
					echo "<input type='hidden' id='cancelar' value='Cancelar' onclick='cancelar()'></td>";
					echo "</tr>";
					echo "</table>";
				
				echo "<br>";
				echo "<br>";

					echo "<p id='exito'></p>";				
					echo "<table id='contrasena'>";
					echo "<tr>";
					echo "<td colspan='2'><input type='button' class='editar' value='Editar datos' onclick='editarC()' name=''></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Contraseña actual:</th>";
					echo "<td><input type='password' id='act' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Nueva contraseña:</th>";
					echo "<td><input type='password' id='new' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<th>Confirmar contraseña:</th>";
					echo "<td><input type='password' id='rep' disabled='true'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan='2'><input type='hidden' id='modificarC' value='Guardar Cambios' onclick='modificarContrasena()'>";
					echo "<input type='hidden' id='cancelarC' value='Cancelar' onclick='cancelarC()'></td>";
					echo "</tr>";
					echo "</table>";
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
	<script type="text/javascript" src="../../../config/js/javascript.js"></script>
	<script type="text/javascript" src="../controladores/javascript.js"></script>
</html>