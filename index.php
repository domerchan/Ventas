<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Market Online</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/ind.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">

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
				<ul class="ul1">
					<li class="frst"><a href="index.php">Inicio</a></li>
					<?php
					include'php/conexionBD.php';
					$sql = "SELECT * FROM area";
					$result = $conn -> query($sql);
					while($row = $result -> fetch_assoc()) {
						echo "<li class='frst'>";
						echo "<a>".$row['ar_nombre']."</a>";
						
						echo "<ul>";
						$sql2 = "SELECT * FROM categoria WHERE ar_codigo = ".$row['ar_codigo'];
						$result2 = $conn -> query($sql2);
						while ($row2 = $result2 -> fetch_assoc()) {
							echo "<li><a href='mostrar_producto.php?categoria=".$row2['ca_codigo']."'>".$row2['ca_nombre']."</a><img class='img' src='data:image/jpg;base64,".base64_encode($row2["ca_imagen"])."'/></li>";
						}
						echo "</ul>";
						
						echo "</li>";
					}
					?>
					<li class="frst"><a href="">Promociones</a></li>
					<li class="frst"><a href="">Iniciar Sesión</a></li>
				</ul>
				<a href=""><i class="material-icons">shopping_cart</i></a>
			</nav>
		</header>

		<br>

		<a href="categorias.php">Ingresar como administrador</a>

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

		<br style="clear: both;">
		<br>
		<br>

		<div id="slogan">
			<section>
				<article>
					<i class="material-icons">local_shipping</i>
					<div>
						<h2>Servicio de Calidad</h2>
						<p>Ten acceso a productos de calidad y a los mejores servicios</p>
						<ul>
							<li>Productos frescos y de calidad</li>
							<li>Proveedores confiables</li>
							<li>Horarios de entrega flexibles</li>
						</ul>
					</div>
				</article>
				<article>
					<i class="material-icons">shopping_basket</i>
					<div>
						<h2>Compras inmediatas</h2>
						<p>Accede a todos nuestros productos y tenlos a tu disposición</p>
						<ul>
							<li>Compra a cualquier hora 24/7</li>
							<li>Información sobre todos nuestros productos</li>
							<li>Añade cuantos productos quieras a tu carrito</li>
						</ul>
					</div>
				</article>
				<article>
					<i class="material-icons">local_atm</i>
					<div>
						<h2>Pagos Seguros</h2>
						<p>Paga con tarjeta o en efectivo, todo completamente seguro</p>
						<ul>
							<li>Diferentes formas de pago</li>
							<li>Pagos 100% seguros</li>
							<li>Facturas electrónicas y comprobantes</li>
						</ul>
					</div>
				</article>
				<article>
					<i class="material-icons">store_mall_directory</i>
					<div>
						<h2>Fácil Acceso</h2>
						<p>Realiza tus compras desde casa de forma fácil y segura</p>
						<ul>
							<li>Crea tu cuenta fácilmente</li>
							<li>Toda tu información 100% segura</li>
						</ul>
					</div>
				</article>
			</section>
		</div>

		<br style="clear: both;">
		<br>
		<br>

		<div id="img_go">
			<img src="img/go.png" id="go">
		</div>

		<br style="clear: both;">
		<br>
		<br>

		<div id="start">
			<section>
				<h1 id="start_title">Es fácil empezar!</h1>
				<article>
					<h1>1</h1>
					<p>Escoge todos los productos que necesites</p>
				</article>
				<article>
					<h1>2</h1>
					<p>Elige el horario que mejor se acomode a ti para la entrega</p>
				</article>
				<article>
					<h1>3</h1>
					<p>Cambia tu pedido hasta un día antes de tu entrega</p>
				</article>
			</section>
		</div>

		<br style="clear: both;">
		<br>
		<br>

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
								echo "<li><a href=''>".$row['ar_nombre']."</a></li>";
							}
							?>
						</ul>
					</article>

					<article id="dos">
						<p>Nosotros</p>
						<ul>
							<li><a href="">¿Quiénes somos?</a></li>
							<li><a href="">Nuestro Servicio</a></li>
							<li><a href="">Proveedores</a></li>
							<li><a href="">Contáctanos</a></li>
						</ul>
					</article>

					<article id="tres">
						<p>Servicio al Cliente</p>
						<ul>
							<li><a href="">Preguntas Frecuentes</a></li>
							<li><a href="">¿Cómo comprar?</a></li>
							<li><a href="">Formas de pago</a></li>
							<li><a href="">Nuestras sucursales</a></li>
						</ul>
					</article>
				</div>
			</section>
		</div>

		<!--div id="contact">
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
		</div-->

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
			    <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="img/ups.png" alt="logo de la Universidad Politecnica Salesiana"></a>
			    <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
			    <br>
			</div>
		</footer>

	</body>
</html>