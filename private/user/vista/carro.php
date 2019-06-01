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

		<link rel="stylesheet" type="text/css" href="../../../config/css/style.css">
		<link rel="stylesheet" type="text/css" href="css/carrito.css">
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
					<li class="frst"><a href="">Promociones</a></li>
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
<<<<<<< HEAD








=======
<!--Reemplazar esta sección con el contenido de la página-->
		<div>
			<section>
				<article>
		
				<table class="tabla">
			
					<tr> 
						<td colspan='4'>PRODUCTOS AÑADIDOS A CARRITO</td> 
					</tr>
					<tr> 
						<td>Cantidad</td> 
						<td>Producto</td> 
						<td>Valor Unitario</td> 
						<td>Valor Total</td> 
					</tr>
					<?php
					include '../../../config/conexionBD.php'; 
					$codigo=$_SESSION['us_codigo'];
					$sql = "SELECT  * FROM factura WHERE us_codigo=$codigo AND fa_compra_realizada='N'" ;
					$result=$conn->query($sql);
					if($result->num_rows > 0){
						$valorT=0;
						while($row=$result->fetch_assoc()){
							echo "<tr>";
							echo "<td>" .$row['fa_cantidad']."</td>";
							$sql2= "SELECT * FROM producto WHERE pr_codigo=".$row['pr_codigo'];
							$result2=$conn->query($sql2);
							if($result2->num_rows > 0){
								while($row2=$result2->fetch_assoc()){
									echo "<td>" .$row2['pr_nombre']. "</td>";
									echo "<td>" .$row2['pr_precio']. "</td>";
									$precio=$row2['pr_precio'];
									$total= $precio * $row['fa_cantidad'];
									echo "<td>".$total.  "</td>";
									$valorT=$valorT+$total;
								}
							}else{
									echo "<tr>";
									echo "<td colspan='7'> No hay prodcutos agregados </td>";
									echo "</tr>";
							}
						}
						$iva=$valorT*0.12;
						echo"<tr>"; 
						echo "<td colspan='3'> SUBTOTAL </td> ";
						echo "<td>" .$valorT. "</td>";
						echo "</tr>";
						
						echo"<tr>"; 
						echo "<td colspan='3'> IVA </td> ";
						echo "<td>" .$iva. "</td>";
						echo "</tr>";
						$total=$valorT+$iva;
						$envio=0;
						
						echo"<tr>"; 
						echo "<td colspan='3'> COSTO DE ENVIO </td> ";
						echo "<td>" .$envio. "</td>";
						echo "</tr>";
						
						echo"<tr>"; 
						echo "<td colspan='3'> TOTAL </td> ";
						echo "<td>" .$total. "</td>";
						echo "</tr>";
						}else{
							echo "<tr>";
							echo "<td colspan='7'> No hay prodcutos agregados </td>";
							echo "</tr>";
						}
						$conn->close();
					?>
        			</table>
        		</article>
			<article>
				<table>
				<tr> 
				 
				</tr>
				<?php
				$codigo3=$_SESSION['us_codigo'];
				$sql="SELECT * FROM usuario WHERE us_codigo=$codigo3";
				$result=$conn->query($sql);
				if($result->num_rows > 0){
					while($row=$result->fetch_assoc()){
						?>
						<form id="formulario01" method="post" action="../controladores/carro.php">
						<h1>Datos Personales</h1>
							<input type="hidden" id="iva" name="iva" value="<?php echo $iva ?>"/>
							<input type="hidden" id="total" name="total" value="<?php echo $total ?>"/>
							<input type="hidden" id="envio" name="envio" value="<?php echo $envio ?>"/>
							<input type="hidden" id="subtotal" name="subtotal" value="<?php echo $valorT ?>"/>
							<input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo3 ?>"/>
							<br>
							<label for="nombres" id="label1">Nombres</label>
							<input type="text" id="nombres" name="nombres" style="text-transform:uppercase"  value="<?php echo $row["us_nombres"]; ?>" required placeholder="Ingresar nombres"/>
							<br>
							<label for="apellidos" id="label1">Apellidos</label>
							<input type="text" id="apellidos" name="apellidos" style="text-transform:uppercase" value="<?php echo $row["us_apellidos"]; ?>" required placeholder="Ingresar apellidos"/>
							<br>
							<label for="direccion" id="label1">Direccion</label>
							<input type="text" id="direccion" name="direccion" style="text-transform:uppercase"  value="<?php echo $row["us_direccion"]; ?>" required placeholder="Ingresar direccion"/>
							<br>
							<label for="telefono" id="label1">Teléfono</label>
							<input type="text" id="telefono" name="telefono" value="<?php echo $row["us_telefono"]; ?>" required placeholder="Ingrese el teléfono"/>
							<br>
							<label for="correo" id="label1">Correo electrónico</label>
							<input type="email" id="correo" name="correo" value="<?php echo $row["us_correo"]; ?>" required placeholder="Ingrese el correo electrónico"/>
							<br>
							<label for="cedula" id="label1">Cedula</label>
							<input type="text" id="cedula" name="cedula" value="<?php echo $row["us_cedula"]; ?>" required placeholder="Ingresar cedula"/>
							
							<input type="submit" id="submit" name="modificar" value="COMPRAR"/>
							
						</form>
						<?php   
					}
				}else {
					echo "<p>Ha ocurrido un error inesperado</p>";
					echo "<p>" . mysqli_error($conn) . "</p>";
				}
				$conn->close()
				?> 
        </table>
				</article>

				
			</section>
		</div>
>>>>>>> d8829b636a454888e60108a7feeac5fbbf2bd737








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
			echo "<br>";
			echo "<button id='avanzar' onclick='pago(".$total.")'>Forma de Pago ></button>";
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