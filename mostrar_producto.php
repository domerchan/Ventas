<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos A Anadir: </title>

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
		</header>
<?php
                    include'php/conexionBD.php';
                    $codigo=$_GET["categoria"];
					$sql = "SELECT * FROM subcategoria WHERE ca_codigo ='$codigo'";
					$result = $conn -> query($sql);
					while($row = $result -> fetch_assoc()) {
						echo "<li class='frst'>";
						echo "<td><a>".$row['sb_nombre']."</a>";
						// echo "<td><a>".$row['sb_image']."</a>";
                        echo "<ul>";
                	//  $codigo2=$_GET["pr_codigo"];
						$sql2 = "SELECT * FROM producto";
						$result2 = $conn -> query($sql2);
						while ($row2 = $result2 -> fetch_assoc()) {
							echo "<br><li><a>".$row2['pr_nombre']."</a><img class='img' src='data:image/jpg;base64,".base64_encode($row2["pr_imagen"])."'/></li>";
						}
						echo "</ul>";
						
						echo "</li>";
					}
					?>
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