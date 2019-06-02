<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Market Online</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../../config/css/style.css">
    <link rel="stylesheet" type="text/css" href="css/sucursales.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
  </head>

  <body>

    <header>
      <div id="banner">
        <img src="../../config/img/logo4.png">
      </div>
      <div id="gradient"></div>

      <nav class="navHeader">
        <ul class="ul1">
          <li class="frst"><a href="index.php">Inicio</a></li>
          <?php
          include'../../config/conexionBD.php';
          $sql = "SELECT * FROM area";
          $result = $conn -> query($sql);
          while($row = $result -> fetch_assoc()) {
            echo "<li class='frst'>";
            echo "<a>".$row['ar_nombre']."</a>";
            
            echo "<ul id='categorias'>";
            $sql2 = "SELECT * FROM categoria WHERE ar_codigo = ".$row['ar_codigo'];
            $result2 = $conn -> query($sql2);
            while ($row2 = $result2 -> fetch_assoc()) {
              echo "<li><a href='productos.php?categoria=".$row2['ca_codigo']."&n_categoria=".$row2['ca_nombre']."'>".$row2['ca_nombre']."</a><div class='img' style=\"background-image: url('data:image/jpg;base64,".base64_encode($row2["ca_imagen"])."')\"></div></li>";
            }
            echo "</ul>";
            
            echo "</li>";
          }
          ?>
          <li class="frst"><a href="promociones.php">Promociones</a></li>
          <li class='frst'>
            <?php
            if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE)
              echo "<a href='login.html'>Iniciar Sesión</a>";
            if($_SESSION['isLogged'] === TRUE) {
              echo "<a>Cuenta</a>";
              echo "<ul id='cuenta'>";
              echo "<li><a href='../../private/user/vista/perfil.php'>Perfil</a></li>";
              echo "<li><a href='../../config/cerrar_sesion.php'>Cerrar Sesión</a></li>";
              echo "</ul>";
            }
            ?>
          </li>
          
        </ul>
        <?php
        if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'user')
          echo "<a href='../../private/user/vista/carro.php'><i class='material-icons'>shopping_cart</i></a>";
        ?>
      </nav>
    </header>

    <div id="sucursales">
      <input type="button" id="ruta" value="Mostrar Ruta" onclick="mostrarRuta()"> 

      <?php
      include'../../config/conexionBD.php';
      $sql = "SELECT * FROM sucursal";
      $result = $conn -> query($sql);

      while ($row = $result -> fetch_assoc()) {
        echo "<div class='su' onclick=\"mostrarSucursal(this,'".$row['su_direccion']."')\">";
          echo "<label>".$row['su_nombre']."</label><br>";
          echo "<label>".$row['su_direccion']."</label><br>";
          echo "<label>".$row['su_telefono']."</label>";
          if($row['su_no_calificaciones'] == 0) {
            echo "<p><i class='material-icons'>star_border</i><i class='material-icons'>star_border</i><i class='material-icons'>star_border</i><i class='material-icons'>star_border</i><i class='material-icons'>star_border</i></p>";
          } else {
            echo "<p>";
            $cal = round($row['su_calificacion']/$row['su_no_calificaciones']);
            for($i = 0; $i < $cal; $i++)
              echo "<i class='material-icons'>star</i>";
            for($i = 0; $i < 5 - $cal; $i++)
              echo "<i class='material-icons'>star_border</i>";
            echo "</p>";
          }
          echo "<div class='oculto'>";
            echo "<div class='imgSu' style=\"background-image: url('data:image/jpg;base64,".base64_encode($row["su_imagen"])."')\"></div>";
            echo "<p>Califica esta sucursal</p>";
      ?>
            <form id="form">
              <p class="clasificacion">
              <input id="radio1" type="radio" name="estrellas" value="5" onchange="calificar(this.value, <?php echo $row['su_codigo']; ?>)">
              <label for="radio1">★</label>
              <input id="radio2" type="radio" name="estrellas" value="4" onchange="calificar(this.value, <?php echo $row['su_codigo']; ?>)">
              <label for="radio2">★</label>
              <input id="radio3" type="radio" name="estrellas" value="3" onchange="calificar(this.value, <?php echo $row['su_codigo']; ?>)">
              <label for="radio3">★</label>
              <input id="radio4" type="radio" name="estrellas" value="2" onchange="calificar(this.value, <?php echo $row['su_codigo']; ?>)">
              <label for="radio4">★</label>
              <input id="radio5" type="radio" name="estrellas" value="1" onchange="calificar(this.value, <?php echo $row['su_codigo']; ?>)">
              <label for="radio5">★</label>
              </p>
            </form>
      <?php
          echo "</div>";
        echo "</div>";
        echo "<br>";
      }
      ?>

    </div>

    <div data-role="content" id="mapa"></div>

  </body>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTXNxuqqS_7PZQlvaCyBSie-G18m8UpLs"></script>
  <script type="text/javascript" src="../controladores/sucursales.js"></script>
  <script type="text/javascript" src="../../config/js/javascript.js"></script>
</html>