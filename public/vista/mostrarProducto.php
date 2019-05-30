<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos A Anadir: </title>

		<link rel="stylesheet" type="text/css" href="../../config/css/style.css">
		<link rel="stylesheet" type="text/css" href="css/ind.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">

		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="js/javascript.js"></script>

</head>

<body>
<header>
			<div id="banner">
				<img src="../../config/img/logo4.png">
			</div>
			<div id="gradient"></div>
			<nav class="navHeader">
				<ul class="ul1">
					<li class="frst"><a href="index.php">Inicio</a></li>
					<?php
					include'../../config/conexionBD.php';
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
					<li class="frst"><a href="login.html">Iniciar Sesión</a></li>
				</ul>
				<a href="../../private/user/vista/carro.php"><i class="material-icons">shopping_cart</i></a>
			</nav>
		</header>
<?php
                    include'../../config/conexionBD.php';
                    $codigo=$_GET["producto"];
					$sql = "SELECT * FROM producto WHERE pr_codigo ='$codigo'";
					$result = $conn -> query($sql);
					while($row = $result -> fetch_assoc()) {
						echo '<form>';   
						echo '<div>';
                            echo '<div>';  
                                echo '<p><h1>Nombre Producto: '.$row['pr_nombre'].'</h1></p>';
                            echo '</div>';
                            
                            echo '<div>';  
                                echo '<p><h1>Descripcion De Producto: '.$row['pr_descripcion'].'</h1></p>';
                            echo '</div>';
                        
                            echo '<div >';  
                                echo '<p><h1>Precio Producto: $'.$row['pr_precio'].'</h1></p>';
                            echo '</div>';
                        
                            echo '<div>';  
                                echo '<p><h1>Stock: '.$row['pr_stock'].'</h1></p>';
							echo '</div>';
                        
                        echo '</div>';
							}
							echo '</form>';
					?>
					<footer>
			<div id="pie">
				<p>
			        Desarrollado por:<br> Jonathan Matute &#8226; Doménica Merchán &#8226; Mark Orellana &#8226; René Panjón &#8226; John Tenesaca
			    </p>
			    <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="../../config/img/ups.png" alt="logo de la Universidad Politecnica Salesiana"></a>
			    <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
			    <br>
			</div>
		</footer>

</body>
<script>
    function anadirProducto(dato){
        var cantidad=document.getElementById('valorC').value;
        localStorage.setItem(dato, cantidad);
    }
    </script>
</html>