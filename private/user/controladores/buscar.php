<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "admin")
        header("Location: /ProgramacionHipermedial/Ventas/private/admin/vista/perfil.php");  
?>
<?php
			include'conexionBD.php';

			$sql = "SELECT * FROM categoria WHERE ca_nombre LIKE '%".$_GET['filtro']."%'";
			$result = $conn -> query($sql);
			if ($result -> num_rows > 0) {
				while ($row = $result -> fetch_assoc()) {
					echo "<a href='' class='opcion' onmouseover=''>";
					echo "<div class='compra' style='background-image: url(data:image/jpg;base64,".base64_encode($row["ca_imagen"])."); background-size: cover; background-repeat: no-repeat; background-position: center;'>";
					echo "<h1 class='h1'>".$row['ca_nombre']."</h1>";
					echo "</div>";
					echo "</a>";
				}
			} else {
				$sql = "SELECT * FROM categoria, subcategoria WHERE sb_nombre LIKE '%".$_GET['filtro']."%' AND categoria.ca_codigo = subcategoria.ca_codigo";
				$result = $conn -> query($sql);
				if ($result -> num_rows > 0) {
					while ($row = $result -> fetch_assoc()) {
						echo "<a href='' class='opcion' onmouseover=''>";
						echo "<div class='compra' style='background-image: url(data:image/jpg;base64,".base64_encode($row["ca_imagen"])."); background-size: cover; background-repeat: no-repeat; background-position: center;'>";
						echo "<h1 class='h1'>".$row['ca_nombre']."</h1>";
						echo "</div>";
						echo "</a>";
					}
				} else {
					$sql = "SELECT * FROM categoria, subcategoria, producto WHERE pr_nombre LIKE '%".$_GET['filtro']."%' AND categoria.ca_codigo = subcategoria.ca_codigo AND subcategoria.sb_codigo = producto.sb_codigo";
					$result = $conn -> query($sql);
					while ($row = $result -> fetch_assoc()) {
						echo "<a href='' class='opcion' onmouseover=''>";
						echo "<div class='compra' style='background-image: url(data:image/jpg;base64,".base64_encode($row["ca_imagen"])."); background-size: cover; background-repeat: no-repeat; background-position: center;'>";
						echo "<h1 class='h1'>".$row['ca_nombre']."</h1>";
						echo "</div>";
						echo "</a>";
					}
				}
			}


			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
?>