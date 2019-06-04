<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "admin")
        header("Location: /ProgramacionHipermedial/Ventas/private/admin/vista/perfil.php");  

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Market Online</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="../../../config/css/style.css">
		<link rel="stylesheet" type="text/css" href="css/carrito.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">

		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	</head>

	<body>

		<header id="header">
			<div id="banner">
				<img src="../../../config/img/logo4.png">
			</div>
			<div id="gradient"></div>

			<nav class="navHeader">
				<ul class="ul1">
					
					<?php
					include'../../../config/conexionBD.php';

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
					echo "<li class='frst'><a href='../../../public/vista/index.php'>Inicio</a></li>";

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
							echo "<a href='../../../public/vista/login.html'>Iniciar Sesión</a>";
						if($_SESSION['isLogged'] === TRUE) {
							echo "<a>Cuenta</a>";
							echo "<ul id='cuenta'>";
							echo "<li><a href='perfil.php'>Perfil</a></li>";
							echo "<li><a href='facturas.php'>Mis Facturas</a></li>";
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
















		<h1 id="htitle">Tu carrito de compras</h1>


		<div id="navegacion">
			<spam id='s1' class='pr'>Pedido</spam>
			&#9474;
			<spam id='s2'>Forma de Pago</spam>
			&#9474;
			<spam id='s3'>Datos de Envío</spam>
			&#9474;
			<spam id='s4'>Facturación</spam>
			&#9474;
			<spam id='s5'>Confirmación</spam>
		</div>


		<div id="compras">
			<table id="bordes">
				<tr>
					<th></th>
					<th colspan="2">PRODUCTO</th>
					<th>CANTIDAD</th>
					<th>PRECIO UNITARIO</th>
					<th>SUBTOTAL</th>
				</tr>
				<?php
					$total = 0.0;
					$sql = "SELECT * FROM factura WHERE us_codigo = ".$_SESSION['codigo']." AND fa_compra_realizada = 'N' AND fa_eliminada = 'N'";
					$result = $conn -> query($sql);
					while ($row = $result -> fetch_assoc()) {
						$total += (float)$row['fa_subtotal'];
						$sql2 = "SELECT * FROM producto WHERE pr_codigo = ".$row['pr_codigo'];
						$result2 = $conn -> query($sql2);
						$row2 = $result2 -> fetch_assoc();
						echo "<tr>";
						echo "<td><i class='material-icons quitar' onclick='quitarProducto(".$row['fa_codigo'].")'>remove_circle_outline</i></td>";
						echo "<td><img src='data:image/jpg;base64,".base64_encode($row2["pr_imagen"])."'/></td>";
						echo "<td><p>".$row2['pr_nombre']."</p><br><p>".$row2['pr_descripcion']."</p></td>";
						echo "<td><p>".$row['fa_cantidad']."</p></td>";
						echo "<td><p>".$row2['pr_precio']."</p></td>";
						echo "<td><p>".$row['fa_subtotal']."</p></td>";
						echo "</tr>";
					}
					echo "<tr>";
					echo "<th colspan='5'>Total:</th>";
					echo "<td>".$total."$</td>";
					echo "</tr>";
				?>
			</table>
			<?php
			$sql = "SELECT su_direccion FROM sucursal WHERE su_codigo = ".$_SESSION['sucursal'];
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
			echo "<br>";
			echo "<button id='avanzar' onclick=\"pago('".$total."', '".$row['su_direccion']."')\">Forma de Pago ></button>";
			?>
			
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
  	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTXNxuqqS_7PZQlvaCyBSie-G18m8UpLs"></script>
	<script type="text/javascript" src="../controladores/carrito.js"></script>
	<script type="text/javascript" src="../../../config/js/javascript.js"></script>
</html>