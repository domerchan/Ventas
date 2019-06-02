<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<table>
			<tr>
				<th></th>
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
				<th>BORRADO</th>
				<th>EDITAR</th>
				<th>CONTRASEÑA</th>
				<th>BORRAR</th>
			</tr>
			<?php
			include '../../../config/conexionBD.php';
			$i = 1;
			$cedula = $_GET['cedula'];
			$sql = "SELECT * FROM usuario WHERE us_cedula LIKE '%$cedula%' AND us_rol = 'user'";
			$result = $conn -> query($sql);
			while ($row = $result -> fetch_assoc()) {
				echo "<tr>";
				echo "<td>".$i."</td>";
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
				echo "<td><i class='material-icons editar' onclick='editar(".$row['us_codigo'].")'>supervised_user_circle</i></td>";
				echo "<td><i class='material-icons cambiar' onclick='cambiarContrasena(".$row['us_codigo'].")'>swap_horizontal_circle</i></td>";
				echo "<td><i class='material-icons quitar' onclick='eliminarUsuario(".$row['us_codigo'].")'>remove_circle_outline</i></td>";
				echo "</tr>";
				$i++;
			}

			?>
		</table>
	</body>
</html>