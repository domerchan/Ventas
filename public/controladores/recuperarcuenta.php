<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
        include '../../config/conexionBD.php';
        $codigo=$_SESSION['us_codigo'];
        echo "<a>Datos  $codigo</a>";
        $sql="UPDATE usuario SET us_eliminado='N' WHERE us_codigo='$codigo'";      
        echo "<a>$sql</a>";                                      
        if ($conn->query($sql) === TRUE) {
            header('Location: ../vista/index.php');
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }
        $conn->close();
        ?>
</body>    
</html>