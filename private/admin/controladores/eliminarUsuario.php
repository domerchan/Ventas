<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "user")
        header("Location: /ProgramacionHipermedial/Ventas/private/user/vista/perfil.php");  
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include'../../../config/conexionBD.php';

		$sql = "UPDATE usuario SET us_eliminado = 'S' WHERE us_codigo = ".$_GET['usuario'];
		if ($conn -> query($sql)) {
	?>
	<table>
				<tr>
					<th>ID</th>
					<th>NOMBRES</th>
					<th>SEXO</th>
					<th>CÉDULA</th>
					<th>TELÉFONO</th>
					<th>NICK</th>
					<th>DIRECCIÓN</th>
					<th>CORREO</th>
					<th>NACIMIENTO</th>
					<th>CREACIÓN</th>
					<th>ELIMINADO</th>
					<th>EDITAR</th>
					<th>CONTRASEÑA</th>
					<th>ELIMINAR</th>
				</tr>

				<?php
					$sql2 = "SELECT * FROM usuario WHERE us_rol = 'user'";
					$result = $conn -> query($sql2);

					if($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {
							echo "<tr>";
							echo "<td class='id'>".$row["us_codigo"]."</td>";
							echo "<td class='nom'>".$row["us_nombres"]." ".$row["us_apellidos"]."</td>";
							echo "<td class=''>".$row["us_sexo"]."</td>";
							echo "<td class=''>".$row["us_cedula"]."</td>";
							echo "<td class=''>".$row["us_telefono"]."</td>";
							echo "<td class=''>".$row["us_nick"]."</td>";
							echo "<td class=''>".$row["us_direccion"]."</td>";
							echo "<td class=''>".$row["us_correo"]."</td>";
							echo "<td class=''>".$row["us_fecha_nacimiento"]."</td>";
							echo "<td class=''>".$row["us_fecha_creacion"]."</td>";
							echo "<td class=''>".$row["us_eliminado"]."</td>";
							echo "<td><button onclick='editar(".$row['us_codigo'].")'>Editar</button></td>";
							echo "<td><button onclick='contrasena(".$row['us_codigo'].")'>Cambiar</button></td>";
							echo "<td><button onclick='eliminarUsuario(".$row['us_codigo'].")'>Eliminar</button></td>";
							echo "</tr>";
						}
					}
				?>
			</table>
	<?php
		} else {
			echo "<tr>";
			echo "<td colspan='14'>Ha ocurrido un error!</td>";
			echo "</tr>";
		}
	?>
</body>
</html>