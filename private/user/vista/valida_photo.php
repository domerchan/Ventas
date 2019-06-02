<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "admin")
        header("Location: /ProgramacionHipermedial/Ventas/private/admin/vista/perfil.php");  
?>
            <?php
                session_start();
                include "../../../config/conexionBD.php";
              
                if ($_SESSION['codigo'])
                {
                            $codigo=$_SESSION['codigo']; //Si existe un nickname generamos el mensaje
                }
                
        else
                {
                            $codigo="<h1>No se Guardo<h1>"; //Mensaje que no existe nada Grabado
                }

               
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                #echo " <h4>$image</h4>";
                $sql="UPDATE usuario SET us_imagen='$image' WHERE us_codigo='$codigo'";
                $size = $_FILES["image"]["size"];
            #echo "<a>$size</a>";
               # echo "<a>$sql</a>";
               # echo " <h2>$sql</h2>";
               if ($size > 15000000) {
    		
    			echo "Tamaño de imagen excedido: ".$size." bytes";
    			echo "<br>";
    			echo "Tamaño máximo admitido es de 64 000 bytes";
    		
    		    }
                
                if($conn->query($sql)===TRUE){
                echo "<p> Se ha actualizado Correctamente su Perfil </p>";
                header('Location:perfil.php');
                 }else{
                  if($conn->errno ==1062){
               echo "<p class='error'>Error Datos Repetidos </p>";
                
               }else{
                echo"<p class='error' Error: ".mysql_error($conn). "</p>";
                 }
                  }
                $conn->close();
                echo "<a href='perfil.php'>Regresar</a> "
            ?>