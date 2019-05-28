<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }else if($_SESSION['usu_rol'] == "A"){
        header("Location: ../../../admin/vista/admin/admin_index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset="utf-8">
    <title>Modificar Datos De Persona</title>
</head>
<body>
    <?php
        include '../../../../config/conexionBD.php'; 
        $codigo=$_POST["codigo"];
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]):null;
        $nombres=isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8'):null;
        $apellidos=isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8'):null;
        $direccion=isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8'):null;
        $telefono=isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
        $correo=isset($_POST["correo"]) ? trim($_POST["correo"]):null;
        $fechaNacimiento=isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]):null;
                                             
        date_default_timezone_set("America/Guayaquil");
        $modificacion=date('Y-m-d',time());
                                             
     

        $sql="UPDATE usuario SET us_nombres='$nombres', us_apellidos='$apellidos', us_cedula='$cedula', us_direccion='$direccion',
        us_fecha_nacimiento='$fechaNacimiento', us_fecha_creacion='$modificacion' WHERE us_codigo='$codigo'";

                                             
        if ($conn->query($sql) === TRUE) {
            echo "Datos personales actualizados correctamente";
            echo "<a>$sql</a>";
            header('Refresh: 5; URL=../../vista/usuario/cuenta_usuario.php');
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }
        $conn->close();
    ?>                                  
</body>
</html>