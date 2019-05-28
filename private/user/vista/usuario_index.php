<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }else if($_SESSION['usu_rol'] == "admin"){
        header("Location: ../../../admin/vista/admin/admin_index.php");
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio-Usuario</title>
    <link rel="stylesheet" type="text/css" href="Css/usuario.css">
    <script type="text/javascript" src="../../JS/jquery.min.js"></script>
    <script type="text/javascript" src="../../JS/buscarCorreo.js"></script>
</head>
<body>
    <header>
        <div id="navHeader">
            <ul>
                <li><a href="usuario_index.php" class="activo">Inicio</a></li>
                <li><a href="nuevo_mensaje.php">Nuevo Mensaje</a></li>
                <li><a href="correos_enviados.php">Mensajes Enviados</a></li>
                <li><a href="cuenta_usuario.php">Mi Cuenta</a></li>
            </ul>
        </div>
        <div id="perfil">
            <?php  
                echo '<div id="img">';
               # echo '<img src="../../../imagenes/'.$_SESSION['us_imagen'].'" width="75px" height="75px">';
                echo '</div>';
                echo '<p id="nombreUsuario">'.$_SESSION['us_nombres'].' '.$_SESSION['us_apellidos'].'</p>';
            ?>
        </div>
        <p id="cerrar"><a href="../../../config/logout.php" id="btn">Cerrar Sesión</a></p>  
    </header>
    <div id="tituloIndex">
        <h1>Bandeja de Entrada</h1>
    </div>
    <div id="buscador">
        <h4>Busqueda de correo</h4>
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar.."/>
    </div>        
    <section id="datos"></section>
</body>
</html>