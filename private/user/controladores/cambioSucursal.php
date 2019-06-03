<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<div id="banner">
			<img src="../../../config/img/logo4.png">
		</div>
		<div id="gradient"></div>

		<nav class="navHeader">
			<ul class="ul1">
				
				<?php
				session_start();
				$_SESSION['sucursal'] = $_GET['sucursal'];

				include'../../../config/conexionBD.php';

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
				echo "<li class='frst'><a href='../../../public/vista/index.php'>Inicio</a></li>";
				$sql = "SELECT a.ar_nombre, a.ar_codigo FROM area a, sucursal s, `sucursal_area` sa WHERE ".$_SESSION['sucursal']." = s.su_codigo AND ".$_SESSION['sucursal']." = sa.su_codigo AND a.ar_codigo = sa.ar_codigo";
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
	</body>
</html>