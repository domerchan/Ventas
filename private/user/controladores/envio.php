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
		<table>
			<tr>
				<td><p>Enviaremos tu pedido a tu ubicación actual. Para cambiar la dirección, ingresa una nueva.</p></td>
			</tr>
			<tr>
				<td>
					<label>Ingresa la dirección a dónde enviaremos tu pedido:</label>
					<input type="text" id="dir" name="dir" value="" placeholder="dirección">
					<button onclick="ubicarDireccion()">Ingresar Dirección</button>
				</td>
			</tr>
			<tr>
				<td><div data-role="content" id="mapa"></div></td>
			</tr>
			<tr>
				<td>
					<label>Costo de envío: </label>
    				<input type="text" id="costo" name="costo" value="" disabled="true">
				</td>
			</tr>
		</table>
		    	
		<?php
			$total = $_GET['total'];
			echo "<br>";
			echo "<button id='avanzar' onclick='factura(".$total.")'>Datos Factura ></button>";
			echo "<button id='retroceder' onclick='pago()'>< Forma de Pago</button>";
		?>
	</body>
</html>