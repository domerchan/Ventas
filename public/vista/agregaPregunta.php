<?php
            //Incluir conexion a la base de datos
            include '../../config/conexionBD.php';

            $pg_usuario_pregunta = isset($_POST["pregunta"]) ? trim($_POST["pregunta"]) : null;
            $pg_nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null;
            $pg_correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
            $pg_asunto = isset($_POST["asunto"]) ? trim($_POST["asunto"]) : null;
            date_default_timezone_set("America/Guayaquil");
	        $fecha = date('Y-m-d H:i:s', time());
           
            $sql = "INSERT INTO pregunta VALUES (0, 1, null, '$pg_usuario_pregunta', null, '$pg_nombre', '$pg_correo', '$pg_asunto', '$fecha', null)";

            $result= $conn->query($sql);

	header("Location: contactanos.php");
?>

