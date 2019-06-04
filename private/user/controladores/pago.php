<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "admin")
        header("Location: /ProgramacionHipermedial/Ventas/private/admin/vista/perfil.php");  
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<select>
		<option></option>
		<option>Efectivo</option>
	</select>
	<br>
	<br>
	<br>
	<?php
		$total = $_GET['total'];

		echo "<br>";
		echo "<button id='avanzar' onclick='envio(".$total.")'>Datos de Envío ></button>";
		echo "<button id='retroceder' onclick='detalle()'>< Carrito</button>";
	?>
</body>
</html>