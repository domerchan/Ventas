<?php
	include'../../../config/conexionBD.php';

	$nombre = isset($_POST['nom']) ? trim($_POST['nom']) : null;
    $direccion = isset($_POST['dir']) ? trim($_POST['dir']) : null;
    $telefono = isset($_POST['tel']) ? trim($_POST['tel']) : null;
    $ruc = isset($_POST['ruc']) ? trim($_POST['ruc']) : null;
 	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    $size = $_FILES["image"]["size"];
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    
    if ($check !== false) {

        if ($ext !== "jpg") {

        	echo "Sólo se admiten formatos .jpg";
        	echo "<br>";
	        echo "El archivo es de formato - " . $ext;

        } else {

        	if ($size > 64000) {
    		
    			echo "Tamaño de imagen excedido: ".$size." bytes";
    			echo "<br>";
    			echo "Tamaño máximo admitido es de 64 000 bytes";
    		
    		} else {

	        	echo "File is an image - " . $check["mime"] . ".";
        		date_default_timezone_set("America/Guayaquil");
				$fecha = date('Y-m-d H:i:s', time());

				$sql = "INSERT INTO sucursal VALUES (0, 1, '$nombre', '$direccion', '$telefono', '$ruc', '$image', '$fecha')";
                
				if ($conn -> query($sql) == TRUE) {
					echo "se han cargado los datos correctamente";
				} else {
					echo "<p class = 'error'>Error: ".$conn->error."<p/>";
				}
				
    		}

        }

    } else {

        echo "File is not an image.";

    }

	echo "<br><a href='../vista/agregarSu.php'>Regresar</a>";
	echo "<br><a href='../vista/sucursales.php'>Sucursales</a>";

?>