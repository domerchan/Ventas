<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Market Online</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="../../config/css/style.css">
		<link rel="stylesheet" type="text/css" href="css/productos.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	</head>

	<body>

		<header id="header">
			<div id="banner">
				<img src="../../config/img/logo4.png">
			</div>
			<div id="gradient"></div>

			<nav class="navHeader">
				<ul class="ul1">
					
					<?php
					include'../../config/conexionBD.php';

					if($_SESSION['isLogged'] === TRUE) {
						$sql = "SELECT count(*) FROM factura WHERE fa_eliminada = 'N' AND fa_compra_realizada = 'N'  AND us_codigo = ".$_SESSION['codigo'];
						$result = $conn -> query($sql);
						$row = $result -> fetch_assoc();
						$factura = $row['count(*)'];

						$sql =  "SELECT su_nombre, su_codigo FROM sucursal";
						$result = $conn -> query($sql);
						echo "<li class='frst'>";
						echo "<select id='suc' onchange=\"cambioSucursal(this.value, '".$factura."', '".$_SESSION['sucursal']."')\">";
						while ($row = $result -> fetch_assoc()) {
							if ($row['su_codigo'] == $_SESSION['sucursal'])
								echo "<option value='".$row['su_codigo']."' selected>".$row['su_nombre']."</option>";
							else
								echo "<option value='".$row['su_codigo']."'>".$row['su_nombre']."</option>";
						}
						echo "</select>";
						echo "</li>";
					}
					echo "<li class='frst'><a href='index.php'>Inicio</a></li>";

					if($_SESSION['isLogged'] === TRUE)
						$sql = "SELECT a.ar_nombre, a.ar_codigo FROM area a, sucursal s, `sucursal_area` sa WHERE ".$_SESSION['sucursal']." = s.su_codigo AND ".$_SESSION['sucursal']." = sa.su_codigo AND a.ar_codigo = sa.ar_codigo";
					else
						$sql = "SELECT * FROM area";
					$result = $conn -> query($sql);
					while($row = $result -> fetch_assoc()) {
						echo "<li class='frst'>";
						echo "<a>".$row['ar_nombre']."</a>";
						
						echo "<ul id='categorias'>";
						$sql2 = "SELECT * FROM categoria WHERE ar_codigo = ".$row['ar_codigo'];
						$result2 = $conn -> query($sql2);
						while ($row2 = $result2 -> fetch_assoc()) {
							echo "<li><a href='productos.php?categoria=".$row2['ca_codigo']."&n_categoria=".$row2['ca_nombre']."'>".$row2['ca_nombre']."</a><div class='img' style=\"background-image: url('data:image/jpg;base64,".base64_encode($row2["ca_imagen"])."')\"></div></li>";
						}
						echo "</ul>";
						
						echo "</li>";
					}
					?>
					<li class="frst"><a href="promociones.php">Promociones</a></li>
					<li class='frst'>
						<?php
						if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE)
							echo "<a href='login.html'>Iniciar Sesión</a>";
						if($_SESSION['isLogged'] === TRUE) {
							echo "<a>Cuenta</a>";
							echo "<ul id='cuenta'>";
							echo "<li><a href='../../private/user/vista/perfil.php'>Perfil</a></li>";
							echo "<li><a href='../../private/user/vista/facturas.php'>Mis Facturas</a></li>";
							echo "<li><a href='../../config/cerrar_sesion.php'>Cerrar Sesión</a></li>";
							echo "</ul>";
						}
						?>
					</li>
					
				</ul>
				<?php
				if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'user')
					echo "<a href='../../private/user/vista/carro.php'><i class='material-icons'>shopping_cart</i></a>";
				?>
			</nav>
		</header>





		<br style="clear: both;">
		
		<div class='pop' id='info'></div>
		<p id="exito"></p>

		<div id="productos">
			<?php

			echo "<h1 id='prtitle'>".$_GET['n_categoria']."</h1>";
			$categoria = $_GET['categoria'];


			echo "<div id='divB'>";
				echo "<input type='text' id='busca' name='busca' placeholder='Buscar un producto'>";
				echo "<button id='buscaB' onclick=\"buscarProducto('".$categoria."', '".$_GET['n_categoria']."')\">Buscar</button>";
				echo "<button id='muestraB' onclick=\"mostrarProducto('".$categoria."', '".$_GET['n_categoria']."')\">Mostrar Todo</button>";
			echo "</div>";

			if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE)
				echo "<div id='mensaje'><h2>POR FAVOR INICIA SESIÓN PARA PODER COMPRAR</h2></div>";
			if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 'admin')
				echo "<div id='mensaje'><h2>POR FAVOR INICIA SESIÓN PARA PODER COMPRAR</h2></div>";

			$sql = "SELECT * FROM subcategoria WHERE ca_codigo = ".$categoria;
			$result = $conn -> query($sql);
			while ($row = $result -> fetch_assoc()) {
				echo "<h2 id='sbtitle'>".$row['sb_nombre']."</h2>";
				$sql2 = "SELECT * FROM producto WHERE sb_codigo = ".$row['sb_codigo']." AND pr_eliminado = 'N'";
				$result2 = $conn -> query($sql2);

				while ($row2 = $result2 -> fetch_assoc()) {
					
					echo "<div class='prod'>";

						echo "<div class='imgPop popup' onclick='pop(".$row2['pr_codigo'].")' style=\"background-image: url('data:image/jpg;base64,".base64_encode($row2["pr_imagen"])."')\"></div>";
						echo "<p class='prnom'>".$row2['pr_nombre']."</p>";
						echo "<p class='prpre'>".$row2['pr_precio']."$ / ".$row2['pr_unidad']."</p>";

						if ($row2['pr_oferta'] != 0)
							echo "<p class='profe'>oferta: ".$row2['pr_oferta']."%</p>";

						if($row2['pr_no_calificaciones'] == 0) {
							echo "<p><i class='material-icons'>star_border</i><i class='material-icons'>star_border</i><i class='material-icons'>star_border</i><i class='material-icons'>star_border</i><i class='material-icons'>star_border</i></p>";
						} else {
							echo "<p>";
							$cal = round($row2['pr_calificacion']/$row2['pr_no_calificaciones']);
							for($i = 0; $i < $cal; $i++)
								echo "<i class='material-icons'>star</i>";
							for($i = 0; $i < 5 - $cal; $i++)
								echo "<i class='material-icons'>star_border</i>";
							echo "</p>";
						}


						echo "<div class='center'><input id='".$row2['pr_codigo']."' class='prcant' type='number' value='0' min='0' max='20'>";
						if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 'user')
							echo "<button class='pradd' value='".$row2['pr_codigo']."' onclick='agregar(this.value)'>Añadir</button>";
						echo "</div>";
					echo "</div>";
				}
			}
			?>
		</div>







		<footer>
			<div id="pie">
				<p>
			        Desarrollado por:<br> Jonathan Matute &#8226; Doménica Merchán &#8226; Mark Orellana &#8226; René Panjón &#8226; John Tenesaca
			    </p>
				<!--Cambiar src dependiendo de la ubicación del archivo-->
			    <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="../../config/img/ups.png" alt="logo de la Universidad Politecnica Salesiana"></a>
			    <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
			    <br>
			</div>
		</footer>

	</body>
	<script type="text/javascript" src="../../config/js/javascript.js"></script>
	<script type="text/javascript" src="../controladores/productos.js"></script>
</html>