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
                <li><a href="usuario_index.php" >Inicio</a></li>
                <li><a href="nuevo_mensaje.php">Nuevo Mensaje</a></li>
                <li><a href="correos_enviados.php" class="activo">Mensajes Enviados</a></li>
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
        <h1>Correo</h1>
    </div>
    <table>
        <?php
        include '../../../config/conexionBD.php';
        $codigo=$_GET["codigo"];
        $sql = "SELECT * FROM correo_usuario WHERE correo_eliminado!='S' and correo_codigo='$codigo'";
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
        if ($result->num_rows > 0) {
            echo '<div id="correo">';
                echo '<div id="cargar_emisor">';  
                    echo '<p>De: '.$row['correo_emisor'].'</p>';
                echo '</div>';
                
                echo '<div id="cargar_dest">';  
                    echo '<p>Para: '.$row['correo_destinatario'].'</p>';
                echo '</div>';
            
                echo '<div id="cargar_asunto">';  
                    echo '<p>Asunto: '.$row['correo_asunto'].'</p>';
                echo '</div>';
            
                echo '<div id="cargar_mensaje">';  
                    echo '<p>Mensaje: '.$row['correo_mensaje'].'</p>';
                echo '</div>';
            echo '</div>';
            
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
    
</body>
</html>