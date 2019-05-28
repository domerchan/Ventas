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
</head>
<body>
    <header>
        <div id="navHeader">
            <ul>
                <li><a href="usuario_index.php">Inicio</a></li>
                <li><a href="" class="activo">Nuevo Mensaje</a></li>
                <li><a href="correos_enviados.php">Mensajes Enviados</a></li>
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
        <h1>Nuevo Mensaje</h1>
    </div>
    <div id="mensaje">
    <form id="formulario02" method="post" action="../../../admin/controladores/usuario/enviar_correo.php">
        <table>
            <tr>
                <td>De:</td>
                <td><input type="text" size="50" id="emisor" name="emisor" value="<?php echo $_SESSION['usu_correo'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Para:</td>
                <td><input type="text" size="50" id="destinatario" name="destinatario" value="" placeholder="example@example.com"></td>
            </tr>
            <tr>
                <td>Asunto:</td>
                <td><input type="text" size="50" id="asunto" name="asunto" value="" placeholder="Asunto del mensaje"></td>
            </tr>
            <tr>
                <td>Mensaje:</td> 
                <td><textarea rows="4" cols="50" id="mensaje" name="mensaje" placeholder="Coloque su mensaje aqui"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" id="enviar" name="enviar" value="Enviar"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>
