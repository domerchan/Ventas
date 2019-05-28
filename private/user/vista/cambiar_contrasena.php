<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }else if($_SESSION['usu_rol'] == "A"){
        header("Location: ../../../admin/vista/usuario/usuario_index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modificar datos persona</title>
    <link rel="stylesheet" href="Css/controladores.css">
</head>
<body>
    <span id="titulo">Modificacion de Contraseña</span>
    <div id="panelInicial">
    <?php
        $codigo=$_SESSION['us_codigo'];
    ?>
    <form id="formulario01" method="post" action="../controladores/usuario/cambiar_contrasena.php">
        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>"/>
        <label for="contrasena" id="label1">Constraseña actual</label>
        <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual">
        <br>
        <label for="contrasena" id="label1">Constraseña nueva</label>
        <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingresar contraseña nueva">
        <br>
        <input type="submit" id="submit" name="modificar" value="Modificar" />
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick="window.location.href='cuenta_usuario.php'" />
    </form>
    </div>
</body>
</html>