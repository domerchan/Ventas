<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
    .error{
        color: red;
    }
    </style>
</head>
<body>
    <?php
        //Incluir conexión a la base de datos
        include '../../../config/conexionBD.php';
        $emisor = isset($_POST["emisor"]) ? trim($_POST["emisor"]) : null;
        $destinatario = isset($_POST["destinatario"]) ? trim($_POST["destinatario"]) : null;
        $asunto = isset($_POST["asunto"]) ? mb_strtoupper(trim($_POST["asunto"]), 'UTF-8') : null;
        $mensaje = isset($_POST["mensaje"]) ? mb_strtoupper(trim($_POST["mensaje"]), 'UTF-8') : null;
        $sql ="INSERT INTO correo_usuario VALUES (0, '$asunto', null, '$emisor', '$destinatario', '$mensaje', 'N', null)";
        $sql1="SELECT * FROM usuario WHERE usu_correo='$destinatario'";
        $result = $conn->query($sql1);
        $row= mysqli_fetch_array($result);
        if($row['usu_rol'] == "A"){
            echo "<p class='error'>No se puede enviar el mensaje a ese destinatario</p>";
            header('Refresh: 2; URL=../../../admin/vista/usuario/nuevo_mensaje.php');
        }else{
            if ($result->num_rows > 0) {
                if ($conn->query($sql) === TRUE) {
                    echo "<p>Mensaje Enviado</p>";
                    header('Refresh: 1; URL=../../../admin/vista/usuario/usuario_index.php');
                }else{
                    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                }
            }else{
                echo "<p class='error'>El destinatario no se encuentra registrado en el sistema</p>";
                header('Refresh: 2; URL=../../../admin/vista/usuario/nuevo_mensaje.php');
            }
        }
        $conn->close();
    ?>
</body>
</html>