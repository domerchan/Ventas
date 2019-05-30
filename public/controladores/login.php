<?php
    session_start();
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $sql="SELECT * FROM usuario  WHERE us_correo='$usuario' and us_contrasena=MD5('$contrasena')";
    $result = $conn->query($sql);
    //Obtiene una fila de la consulta como un arreglo
    $row= mysqli_fetch_array($result);
    if ($result->num_rows > 0) {
        $_SESSION['isLogged'] = TRUE;
        //En la variable global SESSION se almacenan variables del usuario conectado
        $_SESSION['us_codigo']= $row['us_codigo'];
        $_SESSION['us_correo'] = $row['us_correo'];
        $_SESSION['us_rol']= $row['us_rol'];
        $_SESSION['us_imagen']= $row['us_imagen'];
        $_SESSION['us_nombres']= $row['us_nombres'];
        $_SESSION['us_apellidos']= $row['us_apellidos'];
        $_SESSION['us_eliminado']= $row['us_eliminado'];


        //Si la fila del usuario en la columna usu_rol es U se accede como usuario sino accedera como administrador.
        if ($row['us_rol'] == "user" && $row['us_eliminado'] == "N" ){
            header("Location:../../private/user/vista/cuenta_usuario.php");
        }
        else if ($row['us_rol'] == "user" && $row['us_eliminado'] == "S")
        {
            echo " <script language='javascript'>";
            echo "    var ok = confirm('Recuperar Contasena:');       ";
            echo(" if (ok) { location.href ='recuperarcuenta.php'; }");           
            echo " </script> ";
        }
    }else {
       
        header("Location: ../vista/login.html");
    }
    $conn->close();
?>
