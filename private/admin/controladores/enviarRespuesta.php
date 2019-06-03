<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "user")
        header("Location: /ProgramacionHipermedial/Ventas/private/user/vista/perfil.php");  
?>

<?php
include '../../../config/conexionBD.php';

$codigo = $_GET['codigo'];
echo $codigo;
$respuesta = $_GET['respuesta'];
echo $respuesta;
date_default_timezone_set("America/Guayaquil");
$fecha = date('Y-m-d H:i:s', time());

$sql = "UPDATE pregunta SET pg_market_respuesta = '$respuesta', pg_fecha_respuesta = '$fecha' WHERE pg_codigo = '$codigo'";
if ($conn -> query($sql))
	echo "Mensaje enviado!";
else
	echo "Hubo un error ): ".$conn->error;
?>