<?php
start_session();
 include'../../config/conexionBD.php';
 $codigo=$_GET['pr_codigo'];
 $cantidad=$_GET['cantidad'];
 $usuario=$_SESSION['us_codigo'];
 $subt="SELECT pr_precio FROM producto WHERE pr_codigo=".$codigo;
 $resulta=$conn->query($subt);
 $precio=$resulta->fetch_assoc();
 $pr=(float)$precio['pr_precio']*(int)$cantidad;
 $sql2="INSERT INTO factura VALUES(0,'$codigo',NULL,'$usuario','$cantidad','$pr','N')";
 if($conn->query($sql2)==TRUE){
 echo "<p>BIENVENIDo.</p>";
  }else{
        echo"<p class='error'>Error:".$conn->error."</p>";

    }
 $conn->close();
 ?>