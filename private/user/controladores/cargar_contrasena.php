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
	
	$actual = $_GET["actual"];
	$nueva = $_GET["contrasena"];

	$sql = "SELECT us_contrasena FROM usuario WHERE us_codigo = '$codigo' and us_contrasena = MD5('$actual')";
	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
		$row = $result -> fetch_assoc();
		$sql = "UPDATE usuario SET us_contrasena = MD5('$nueva') WHERE us_codigo = '$codigo'";
		if ($conn -> query($sql) === TRUE) {
			echo "Se ha cambiado la contraseña correctamente";
		} else {
			echo "ha ocurrido un error ):";
		}
	} else
		echo "Contraseña incorrecta!";
?>