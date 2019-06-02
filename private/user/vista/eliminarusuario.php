<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "admin")
        header("Location: /ProgramacionHipermedial/Ventas/private/admin/vista/perfil.php");  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
        include '../../../config/conexionBD.php';
        $codigo=$_SESSION['us_codigo'];
        $sql="UPDATE usuario SET us_eliminado='S' WHERE us_codigo='$codigo'";                                            
        if ($conn->query($sql) === TRUE) {
            echo "<a>Datos  De La Cuenta Eliminados</a>";
            header('Refresh: 5; URL=../../../config/cerrar_sesion.php');
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }
        $conn->close();
        ?>
</body>    
</html>