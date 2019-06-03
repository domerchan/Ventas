<?php
	session_start();
	include'../../config/conexionBD.php';

	echo "<h1 id='prtitle'>".$_GET['n_categoria']."</h1>";
	$categoria = $_GET['categoria'];


	echo "<div id='divB'>";
		echo "<input type='text' id='busca' name='busca' placeholder='Buscar un producto'>";
		echo "<button id='buscaB' onclick=\"buscarProducto('".$categoria."', '".$_GET['n_categoria']."')\">Buscar</button>";
		echo "<button id='muestraB' onclick=\"mostrarProducto('".$categoria."', '".$_GET['n_categoria']."')\">Mostrar Todo</button>";
	echo "</div>";

	if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE)
		echo "<div id='mensaje'><h2>POR FAVOR INICIA SESIÓN PARA PODER COMPRAR</h2></div>";
	if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 'admin')
		echo "<div id='mensaje'><h2>POR FAVOR INICIA SESIÓN PARA PODER COMPRAR</h2></div>";

	$sql = "SELECT * FROM subcategoria WHERE ca_codigo = ".$categoria;
	$result = $conn -> query($sql);
	while ($row = $result -> fetch_assoc()) {
		echo "<h2 id='sbtitle'>".$row['sb_nombre']."</h2>";
		$sql2 = "SELECT * FROM producto WHERE sb_codigo = ".$row['sb_codigo']." AND pr_eliminado = 'N'";
		$result2 = $conn -> query($sql2);

		while ($row2 = $result2 -> fetch_assoc()) {
			
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