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
		<link rel="stylesheet" type="text/css" href="Css/carrito.css">
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
		
				<table class="tabla">
			<tr> 
				<td>Cantidad</td> 
				<td>Producto</td> 
				<td>Valor Unitario</td> 
				<td>Subtotal</td> 
			</tr>
		<?php
		$codigo=$_SESSION['us_codigo'];
		
		$sql = "SELECT  * FROM factura WHERE us_codigo=$codigo AND fa_compra_realizada='N'" ;
		include '../../../config/conexionBD.php'; 
		
		$result=$conn->query($sql);
		if($result->num_rows > 0){
			$valorT=0;
			while($row=$result->fetch_assoc()){
				echo "<tr>";
					echo "<td>" .$row['fa_cantidad']."</td>";
					
					
					$sql2= "SELECT * FROM producto WHERE pr_codigo=".$row['pr_codigo'];
					include '../../../config/conexionBD.php';
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

					echo "</tr>";
			}
			$iva=$valorT*0.12;
			echo"<tr>"; 
				echo "<td colspan='3'> IVA </td> ";
				echo "<td>" .$iva. "</td>";
			echo "</tr>";

			
			echo"<tr>"; 
				echo "<td colspan='3'> TOTAL </td> ";
				echo "<td>" .$valorT. "</td>";
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
        include '../../../config/conexionBD.php'; 
        $result=$conn->query($sql);
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                ?>
                <form id="formulario01" method="post" action="../controladores/modificar_usuario.php">
				<h1>Datos Personales</h1>
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
