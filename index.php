<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Market Online</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
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
					<li><a href="index.html"><p>Inicio</p></a></li>
					<li><a href="#about"><p>Acerca</p></a></li>
					<li><a href="#contact"><p>Contáctanos</p></a></li>
					<li><a href=""><p>Locales</p></a></li>
					<li><a href=""><p>Promociones</p></a></li>
					<li><a href=""><p>Iniciar Sesión</p></a></li>
				</ul>
				<a href=""><i class="material-icons">shopping_cart</i></a>
			</nav>
		</header>

		<div id="promociones">
			<div id="lista">
				<ul>
					<li class="lista"><a href="">Promoción 1</a></li>
					<li class="lista"><a href="">Promoción 2</a></li>
					<li class="lista"><a href="">Promoción 3</a></li>
					<li class="lista"><a href="">Promoción 4</a></li>
					<li class="lista"><a href="">Promoción 5</a></li>
				</ul>
			</div>
			<div id="imagen">
			
			</div>
			<div id="promocion">
				
			</div>
		</div>

		<div id="buscador">
			<form>
				<label>¿Estás buscando algo en específico? </label>
				<input type="text" ng-model="query">
			</form>
		</div>
		
		<div id="options">

			<?php
			include'php/conexionBD.php';

			$sql = "SELECT * FROM categoria";
			$result = $conn -> query($sql);
			while ($row = $result -> fetch_assoc()) {
				echo "<a href='' class='option'>";
				echo "<div class='compra' style='background-image: url(data:image/jpg;base64,".base64_encode($row["ca_imagen"])."); background-size: cover; background-repeat: no-repeat; background-position: center;'>";
				echo "<h1 class='h1'>".$row['ca_nombre']."</h1>";
				echo "</div>";
				echo "</a>";
			}
			?>

			<br>
			<br>
			<br>
			<br>

		</div>

		<div id="about">
			<section class="uno">
				<article>
					<h1>¿Quiénes somos?</h1>
					<?php
					$sql = "SELECT * FROM market";
					$result = $conn -> query($sql);
					$row = $result -> fetch_assoc();

					echo "<p>".$row['ma_acerca']."</p>";
					?>
				</article>
			</section>
		</div>

		<div id="contact">
			<h1>¡Contáctanos!</h1>	
			<section id="uno">
				<article>
					<ul>
						<li><p><strong>Teléfonos: </strong><ul><li><?php echo $row['ma_telefono1']; ?></li><li><?php echo $row['ma_telefono2']; ?></li></ul></li>
						<li><p><strong>E-mail: </strong><ul><li><?php echo $row['ma_correo']; ?></li></ul></p></li>
						<li><p><strong>Dirección: </strong><ul><li><?php echo $row['ma_direccion']; ?></li></ul></p></li>
						<li><p><strong>WhatsApp: </strong><ul><li><?php echo $row['ma_wpp']; ?></li></ul></p></li>
					</ul>
				</article>
			</section>
			<section id="dos">
				<form>
			  		<table id="tabla2">
			  			<tr>
			  				<th>Nombre: </th>
					  		<td><input type="text" name="nombre"></td>
			  			</tr>
			  			<tr>
			  				<th>Apellido: </th>
			  				<td><input type="text" name="apellido"></td>
			  			</tr>
			  			<tr>
			  				<th>Email: </th>
			  				<td><input type="text" name="email"></td>
			  			</tr>
			  			<tr>
			  				<th>Mensaje: </th>
			  				<td><textarea rows="6" cols="50"></textarea></td>
			  			</tr>
			  			<tr>
			  				<td colspan="2"><button>Enviar</button></td>
			  			</tr>
			  		</table>
			  	</form>
			</section>
		</div>

		<a href="categorias.php">Ingresar como administrador</a>

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