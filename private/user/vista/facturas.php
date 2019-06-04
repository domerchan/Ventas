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
		<link rel="stylesheet" type="text/css" href="css/facturas.css">
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
		<br>



		<h1>Mis Facturas</h1>

		<?php
		$sql = "SELECT * FROM `factura-cabecera` fc WHERE fc_estado <> 'creada' AND fc.us_codigo = ".$_SESSION['codigo'];
		$result = $conn -> query($sql);
		while ($row = $result -> fetch_assoc()) {
		
			echo "<div class='factura'>";
				echo "<table class='cabecera'>";
					
					$sql = "SELECT * FROM market";
					$result2 = $conn -> query($sql);
					$row2 = $result2 -> fetch_assoc();

					$sql = "SELECT su_direccion FROM sucursal WHERE su_codigo = ".$row['su_codigo'];
					$result3 = $conn -> query($sql);
					$row3 = $result3 -> fetch_assoc();
					

					echo "<tr>";
						echo "<td><img src='../../../config/img/logo1.png'></td>";
						echo "<td colspan='3'><h2>".$row2['ma_nombre']."</h2><p>".$row3['su_direccion']."</p><p>".$row2['ma_telefono1']."</p><p>".$row2['ma_telefono2']."</p></td>";
					echo  "</tr>";

					echo "<tr>";
						echo "<td><strong>Nombres: </strong></td>";
						echo "<td colspan='3'> <input type='text' id='nom' disabled='true' value=".$row['fc_nombres']." > </td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td><strong>Teléfono: </strong></td>";
						echo "<td> <input type='text' id='tel' disabled='true' value=".$row['fc_telefono']." > </td>";
						echo "<td><strong>Cédula: </strong></td>";
						echo "<td> <input type='text' id='ced' disabled='true' value=".$row['fc_cedula']." > </td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td><strong>Dirección: </strong></td>";
						echo "<td colspan='3'> <input type='text' id='dir' disabled='true' value=".$row['fc_direccion']." > </td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td><strong>Correo: </strong></td>";
						echo "<td colspan='3'> <input type='text' id='cor' disabled='true' value=".$row['fc_correo']." > </td>";
					echo "</tr>";
				echo "</table>";
				echo "<table class='detalle'>";
					echo "<tr>";
						echo "<th>CANTIDAD</th>";
						echo "<th>DESCRIPCION</th>";
						echo "<th>P.U.</th>";
						echo "<th>VENTA</th>";
					echo "</tr>";
						$sql = "SELECT * FROM factura WHERE fc_codigo = ".$row['fc_codigo'];
						$result2 = $conn -> query($sql);
						while ($row3 = $result2 -> fetch_assoc()) {
							$sql2 = "SELECT * FROM producto WHERE pr_codigo = ".$row3['pr_codigo'];
							$result3 = $conn -> query($sql2);
							$row2 = $result3 -> fetch_assoc();
							echo "<tr>";
							echo "<td>".$row3['fa_cantidad']."</td>";
							echo "<td>".$row2['pr_nombre']."</td>";
							echo "<td>".$row2['pr_precio']."</td>";
							echo "<td>".$row3['fa_subtotal']."</td>";
							echo "</tr>";
						}
						echo "<tr>";
						echo "<td rowspan='4' colspan='2'><label id='estado".$row['fc_codigo']."'>Estado: ".$row['fc_estado']."</label>";
						if ($row['fc_estado'] == 'confirmada')
							echo "<i class='material-icons' onclick='cancelarFactura(".$row['fc_codigo'].")'>cancel</i>";
						echo "</td>";
						echo "<th>Sub Total:</th>";
						echo "<td><input id='sub' type='number' disabled='true' value='".$row['fc_subtotal']."'></td>";
						echo "</tr>";

						echo "<tr>";
						echo "<th>iva 12%:</th>";
						echo "<td>".number_format(0.12*$row['fc_subtotal'],2)."</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<th>Envío:</th>";
						echo "<td><input id='env' type='number' disabled='true' value='".$row['fc_envio']."'></td>";
						echo "</tr>";

						echo "<tr>";
						echo "<th>Total:</th>";
						echo "<td><input id='tot' type='number' disabled='true' value='".$row['fc_total']."'></td>";
						echo "</tr>";
				echo "</table>";
			echo "</div>";
		}
		?>

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