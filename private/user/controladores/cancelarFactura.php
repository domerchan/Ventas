<?php
include '../../../config/conexionBD.php';

$sql = "UPDATE `factura-cabecera` SET fc_estado = 'cancelada' WHERE fc_codigo = ".$_GET['codigo'];
$conn -> query($sql);
?>