<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: ../../../public/vista/login.html");
    }else if($_SESSION['us_rol'] == "A"){
        header("Location: carro.php");
    }
?>
<!DOCTYPE html>
<html lang="es" ng-app="market">
	<head>
		<title>Carrito</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!--Cambiar href dependiendo de la ubicación del archivo-->
		<link rel="stylesheet" type="text/css" href="../../../config/css/style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<!--Cambiar src dependiendo de la ubicación del archivo-->
		<script type="text/javascript" src="../../../config/js/javascript.js"></script>
	</head>

	<body ng-controller="ProductListCtrl">

		<header>
			<div id="banner">

				<!--Cambiar src dependiendo de la ubicación del archivo-->
				<img src="../../../config/img/logo4.png">
			</div>
			<div id="gradient"></div>

			<nav class="navHeader">
				<ul class="ul1">
					<li class="frst"><a href="../../../public/vista/index.php">Inicio</a></li>
					<?php

					#Cambiar dependiendo de la ubicación del archivo
					include'../../../config/conexionBD.php';


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
							echo "<li><a href='../../../public/vista/mostrar_producto.php?categoria=".$row2['ca_codigo']."'>".$row2['ca_nombre']."</a><img class='img' src='data:image/jpg;base64,".base64_encode($row2["ca_imagen"])."'/></li>";
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
		
				<table>
			<tr> 
				<td>Cantidad</td> 
				<td>Producto</td> 
				<td>Valor Unitario</td> 
				<td>Valor Total</td> 
			</tr>
		<?php
		$codigo=$_SESSION['us_codigo'];
		$sql = "SELECT  * FROM factura WHERE us_codigo=$codigo ";
		include '../../../config/conexionBD.php'; 
		$result=$conn->query($sql);
		if($result->num_rows > 0){
			while($row=$result->fetch_assoc()){
				echo "<tr>";
					echo "<td>" .$row[fa_cantidad]."</td>";
				echo "</tr>";
			}	
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
				<td>Datos Personales</td> 
				 
			</tr>
		<?php
		$codigo=$_SESSION['us_codigo'];
		$sql = "SELECT  * FROM usuario WHERE us_codigo=$codigo ";
		include '../../../config/conexionBD.php'; 
		$result=$conn->query($sql);
		if($result->num_rows > 0){
			while($row=$result->fetch_assoc()){
				echo "<tr>";
					echo "<td>" .$row[us_nombres]."</td>";
					echo "<td>" .$row[us_apellidos]."</td>";
					echo "<td>" .$row[us_direccion]."</td>";
					echo "<td>" .$row[us_telefono]."</td>";
					echo "<td>" .$row[us_correo]."</td>";?>
					<input type="text" id="cedula" name="cedula" value="<?php echo $row["us_cedula"]; ?>" required placeholder="Ingresar cedula"/>
				<?php				
				echo "</tr>";
			}	
			}else{
				echo "<tr>";
					echo "<td colspan='7'> No hay prodcutos agregados </td>";
				echo "</tr>";
			}
			$conn->close();
		?>
        </table>
				</article>

				
			</section>
		</div>







		<footer>
			<div id="pie">
				<p>
			        Desarrollado por:<br> Jonathan Matute &#8226; Doménica Merchán &#8226; Mark Orellana &#8226; René Panjón &#8226; John Tenesaca
			    </p>
				<!--Cambiar src dependiendo de la ubicación del archivo-->
			    <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="../../../config/img/ups.png" alt="logo de la Universidad Politecnica Salesiana"></a>
			    <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
			    <br>
			</div>
		</footer>

	</body>
</html>
