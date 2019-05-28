<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }else if($_SESSION['usu_rol'] == "A"){
        header("Location: ../../../admin/vista/admin/admin_index.php");
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio-Usuario</title>
    <link rel="stylesheet" type="text/css" href="../../../public/estilos/usuario.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../JS/buscarCorreo2.js"></script>
</head>
<body>
    <header>
        <div id="navHeader">
            <ul>
                <li><a href="usuario_index.php">Inicio</a></li>
                <li><a href="nuevo_mensaje.php">Nuevo Mensaje</a></li>
                <li><a href="" class="activo">Mensajes Enviados</a></li>
                <li><a href="cuenta_usuario.php">Mi Cuenta</a></li>
            </ul>
        </div>
        <div id="perfil">
            <?php  
                echo '<div id="img">';
                echo '<img src="../../../imagenes/'.$_SESSION['img_nombre'].'" width="75px" height="75px">';
                echo '</div>';
                echo '<p id="nombreUsuario">'.$_SESSION['usu_nombre'].' '.$_SESSION['usu_apellido'].'</p>';
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