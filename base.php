<!DOCTYPE html>
<html lang="es" ng-app="market">
	<head>
		<title>Market Online</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!--Cambiar href dependiendo de la ubicación del archivo-->
		<link rel="stylesheet" type="text/css" href="config/css/style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="../../config/js/javascript.js"></script>
	</head>

	<body ng-controller="ProductListCtrl">

		<header>
			<div id="banner">

				<!--Cambiar src dependiendo de la ubicación del archivo-->
				<img src="config/img/logo4.png">
			</div>
			<div id="gradient"></div>

			<nav class="navHeader">
				<ul class="ul1">
					<li class="frst"><a href="public/vista/index.php">Inicio</a></li>
					<?php

					#Cambiar dependiendo de la ubicación del archivo
					include'config/conexionBD.php';


					$sql = "SELECT * FROM area";
					$result = $conn -> query($sql);
					while($row = $result -> fetch_assoc()) {
						echo "<li class='frst'>";
						echo "<a>".$row['ar_nombre']."</a>";
						
						echo "<ul>";
						$sql2 = "SELECT * FROM categoria WHERE ar_codigo = ".$row['ar_codigo'];
						$result2 = $conn -> query($sql2);
						while ($row2 = $result2 -> fetch_assoc()) {

							#Cambiar href dependiendo de la ubicación del archivo
							echo "<li><a href='public/vista/mostrar_producto.php?categoria=".$row2['ca_codigo']."'>".$row2['ca_nombre']."</a><img class='img' src='data:image/jpg;base64,".base64_encode($row2["ca_imagen"])."'/></li>";
						}
						echo "</ul>";
						
						echo "</li>";
					}
					?>
					<li class="frst"><a href="">Promociones</a></li>
					<li class="frst"><a href="">Iniciar Sesión</a></li>
				</ul>
				<a href="carro.php"><i class="material-icons">shopping_cart</i></a>
			</nav>
		</header>






		<!--Reemplazar esta sección con el contenido de la página-->
		<div>
			<section>
				<article>
					<h1 style="text-align: center; font-size: 72px; background-image: url(config/img/construccion.png); background-repeat: no-repeat;background-position: center; background-size: 70%; background-attachment: fixed; padding: 200px 0px;">Página en construcción</h1>
				</article>
			</section>
		</div>







		<footer>
			<div id="pie">
				<p>
			        Desarrollado por:<br> Jonathan Matute &#8226; Doménica Merchán &#8226; Mark Orellana &#8226; René Panjón &#8226; John Tenesaca
			    </p>
				<!--Cambiar src dependiendo de la ubicación del archivo-->
			    <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="config/img/ups.png" alt="logo de la Universidad Politecnica Salesiana"></a>
			    <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
			    <br>
			</div>
		</footer>

	</body>
</html>