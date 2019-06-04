<?php
	session_start();
	$_SESSION['isLogged'] = FALSE;
	$_SESSION['rol'] = '';
	$_SESSION['codigo'] = '';
	header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
?>