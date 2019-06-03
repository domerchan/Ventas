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

		<!--Cambiar href dependiendo de la ubicación del archivo-->
		<link rel="stylesheet" type="text/css" href="../../config/css/style.css">
		<link rel="stylesheet" type="text/css" href="css/promociones.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="../../config/js/javascript.js"></script>
		<style>
			.mySlides {display:none;
			    width: 500px; 
			    height: 300px;
			    align: center;
			    position: relative;
			    top: 20px;
			}

			.mySlides img {
			    align: center;
			    max-height: 250px;
			    position: relative;
			    top: 20px;
			}

			</style>
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




		<center>
	<div class='center-block'>
    <section class='center-block'>
        <table class='center-block'>
            <?php
            include'../../config/conexionBD.php';
           
            $sql = "SELECT pm_imagen FROM promocion";
            $result = $conn -> query($sql);

            if($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='mySlides'><img  class='center-block' src='data:image/jpg;base64,".base64_encode($row["pm_imagen"])."'/></td>";
                    echo "</tr>";
                }
            }
        ?>
            <script>
                var myIndex = 0;
                carousel();

                function carousel() {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    myIndex++;
                    if (myIndex > x.length) { myIndex = 1 }
                    x[myIndex - 1].style.display = "block";
                    setTimeout(carousel, 1000); // Change image every 2 seconds
                }
            </script>
        </table>
    </section>
</div>
</center>

	<div id="promociones">
		<h1>Promociones</h1>
			<section>                
				<?php
                    include'../../config/conexionBD.php';
                   
					$sql = "SELECT * FROM promocion, categoria WHERE promocion.ca_codigo = categoria.ca_codigo ORDER BY pm_porcentaje DESC ";
					$result = $conn -> query($sql);

					if($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {
							echo "<div class='prom'>";
							echo "<p class='prnom'>".$row['pm_nombre']."</p>";
							echo "<div class='imgP popup' style=\"background-image: url('data:image/jpg;base64,".base64_encode($row["pm_imagen"])."')\"></div>";
							echo "<p class='popre'>".$row["pm_descripcion"]."</p>";
							echo "</div>";
						}
					}
                ?>
                </section>   
		</div>
		
		<br style="clear: both;">
		<div class='pop' id='info'></div>
		<p id="exito"></p>

		<div id="productos">
		<h1>Ofertas</h1>
		<section>
			<?php
			$sql = "SELECT * FROM producto, subcategoria, categoria WHERE producto.sb_codigo = subcategoria.sb_codigo and subcategoria.ca_codigo = categoria.ca_codigo  ORDER BY pr_oferta DESC limit 6";
			$result = $conn -> query($sql);
			if($result -> num_rows > 0) {
				while ($row2 = $result -> fetch_assoc()) {
					
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
			</section>
		</div>





		<div id="about">
			<section>
				<div>
					<article id="uno">
						<p>Productos</p>
						<ul>
							<?php
							$sql = "SELECT * FROM area";
							$result = $conn -> query($sql);
							while($row = $result -> fetch_assoc()) {
								echo "<li><a>".$row['ar_nombre']."</a></li>";
							}
							?>
						</ul>
					</article>

					<article id="dos">
						<p>Nosotros</p>
						<ul>
							<li><a href="somos.php">¿Quiénes somos?</a></li>
							<li><a href="servicio.php">Nuestro Servicio</a></li>
							<li><a href="proveedores.php">Proveedores</a></li>
							<li><a href="contactanos.php">Contáctanos</a></li>
						</ul>
					</article>

					<article id="tres">
						<p>Servicio al Cliente</p>
						<ul>
							<li><a href="preguntas.php">Preguntas Frecuentes</a></li>
							<li><a href="como.php">¿Cómo comprar?</a></li>
							<li><a href="pago.php">Formas de pago</a></li>
							<li><a href="sucursales.php">Nuestras sucursales</a></li>
						</ul>
					</article>
				</div>
			</section>
		</div>

		<div id="social">
			<section>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-3 7h-1.924c-.615 0-1.076.252-1.076.889v1.111h3l-.238 3h-2.762v8h-3v-8h-2v-3h2v-1.923c0-2.022 1.064-3.077 3.461-3.077h2.539v3z"/></svg>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.233 5.488c-.843-.038-1.097-.046-3.233-.046s-2.389.008-3.232.046c-2.17.099-3.181 1.127-3.279 3.279-.039.844-.048 1.097-.048 3.233s.009 2.389.047 3.233c.099 2.148 1.106 3.18 3.279 3.279.843.038 1.097.047 3.233.047 2.137 0 2.39-.008 3.233-.046 2.17-.099 3.18-1.129 3.279-3.279.038-.844.046-1.097.046-3.233s-.008-2.389-.046-3.232c-.099-2.153-1.111-3.182-3.279-3.281zm-3.233 10.62c-2.269 0-4.108-1.839-4.108-4.108 0-2.269 1.84-4.108 4.108-4.108s4.108 1.839 4.108 4.108c0 2.269-1.839 4.108-4.108 4.108zm4.271-7.418c-.53 0-.96-.43-.96-.96s.43-.96.96-.96.96.43.96.96-.43.96-.96.96zm-1.604 3.31c0 1.473-1.194 2.667-2.667 2.667s-2.667-1.194-2.667-2.667c0-1.473 1.194-2.667 2.667-2.667s2.667 1.194 2.667 2.667zm4.333-12h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm.952 15.298c-.132 2.909-1.751 4.521-4.653 4.654-.854.039-1.126.048-3.299.048s-2.444-.009-3.298-.048c-2.908-.133-4.52-1.748-4.654-4.654-.039-.853-.048-1.125-.048-3.298 0-2.172.009-2.445.048-3.298.134-2.908 1.748-4.521 4.654-4.653.854-.04 1.125-.049 3.298-.049s2.445.009 3.299.048c2.908.133 4.523 1.751 4.653 4.653.039.854.048 1.127.048 3.299 0 2.173-.009 2.445-.048 3.298z"/></svg>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-.139 9.237c.209 4.617-3.234 9.765-9.33 9.765-1.854 0-3.579-.543-5.032-1.475 1.742.205 3.48-.278 4.86-1.359-1.437-.027-2.649-.976-3.066-2.28.515.098 1.021.069 1.482-.056-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411-1.461-.977-1.875-2.907-1.016-4.383 1.619 1.986 4.038 3.293 6.766 3.43-.479-2.053 1.08-4.03 3.199-4.03.943 0 1.797.398 2.395 1.037.748-.147 1.451-.42 2.086-.796-.246.767-.766 1.41-1.443 1.816.664-.08 1.297-.256 1.885-.517-.439.656-.996 1.234-1.639 1.697z"/></svg>
			</section>
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
</html>