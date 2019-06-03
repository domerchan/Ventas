<?php
	session_start();
	$_SESSION['isLogged'] = FALSE;
	$_SESSION['rol'] = '';
	$_SESSION['codigo'] = '';
	header("Location: /ProgramacionHipermedial/Ventas%20-%20copia/public/vista/index.php");
?>