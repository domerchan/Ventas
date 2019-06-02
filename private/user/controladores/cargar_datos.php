<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "admin")
        header("Location: /ProgramacionHipermedial/Ventas/private/admin/vista/perfil.php");  
?>
<?php
	session_start();
	include '../../../config/conexionBD.php';

	$codigo = $_SESSION["codigo"];

	$cedula = $_GET["ced"];
	$nombres = $_GET["nom"];
	$apellidos = $_GET["ape"];
	$nick = $_GET["nic"];
	$direccion = $_GET["dir"];
	$telefono = $_GET["tel"];
	$fNacimiento = $_GET["fec"];

	$sql = "UPDATE usuario SET us_nombres='$nombres', us_apellidos='$apellidos', us_nick='$nick', us_cedula='$cedula', us_direccion='$direccion', us_telefono='$telefono', us_fecha_nacimiento='$fNacimiento' WHERE us_codigo = '$codigo'";

	if ($conn -> query($sql) === TRUE) {
		$sql = "SELECT * FROM usuario WHERE ".$_SESSION['codigo']." = usuario.us_codigo";
		$result = $conn -> query($sql);
		$row = $result -> fetch_assoc();

		echo "<table id='datos'>";
		echo "<tr>";
		echo "<td colspan='2'><input type='button' id='editar' value='Editar datos' onclick='editar()' name=''></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Nombres</th>";
		echo "<td><input id='nom' name='nom' value= '".$row['us_nombres']."' disabled='true'></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Apellidos</th>";
		echo "<td><input id='ape' name='ape' value= '".$row['us_apellidos']."' disabled='true'></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Nick</th>";
		echo "<td><input id='nic' name='nic' value= '".$row['us_nick']."' disabled='true'></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Cédula</th>";
		echo "<td><input id='ced' name='ced' value= '".$row['us_cedula']."' disabled='true'></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Dirección</th>";
		echo "<td><input id='dir' name='dir' value= '".$row['us_direccion']."' disabled='true'></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Teléfono</th>";
		echo "<td><input id='tel' name='tel' value= '".$row['us_telefono']."' disabled='true'></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Fecha de Nacimiento</th>";
		echo "<td><input id='fec' name='fec' type='date' value= '".$row['us_fecha_nacimiento']."' disabled='true'></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan='2'><input type='hidden' id='modificar' value='Guardar Cambios' onclick='modificarUsuario()'>";
		echo "<input type='hidden' id='cancelar' value='Cancelar' onclick='cancelar()'></td>";
		echo "</tr>";
		echo "</table>";
	} else {
		echo "ha ocurrido un error ): ".$conn->error;
	}
?>