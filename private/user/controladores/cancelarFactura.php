<?php

session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
    header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
else if($_SESSION['rol'] == "admin")
    header("Location: /ProgramacionHipermedial/Ventas/private/admin/vista/perfil.php");  

include '../../../config/conexionBD.php';

$sql = "UPDATE `factura-cabecera` SET fc_estado = 'cancelada' WHERE fc_codigo = ".$_GET['codigo'];
$conn -> query($sql);
?>