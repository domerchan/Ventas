<?php
            //Incluir conexion a la base de datos
            include'../../../config/conexionBD.php';

            $pg_usuario_pregunta = isset($_POST["pregunta"]) ? mb_strtoupper(trim($_POST["pregunta"])) : null;
            $pg_nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"])) : null;
            $pg_correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
            $pg_asunto = isset($_POST["asunto"]) ? mb_strtoupper(trim($_POST["asunto"])) : null;
            

            $sql = "INSERT INTO pregunta VALUES (0, 1, null, '$pg_usuario_pregunta', null, '$pg_nombre' ,
            '$pg_correo', '$pg_asunto')";

            if ($conn->query($sql)==TRUE){
                echo"<p>Se ha enviado correctamente su consulta!!!</p>";
            }else{
                echo"<p class='error'>Lleno Todos Los Campos</p>";
            }
            $conn->close();
?>

