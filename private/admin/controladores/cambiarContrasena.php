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
		$contrasena = trim($_GET['contrasena']);
		$sql = "UPDATE usuario SET us_contrasena = MD5('$contrasena') WHERE us_codigo =".$_GET['usuario'];
		$conn -> query($sql)
	?>
</body>
</html>