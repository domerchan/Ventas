<?php
	include'conexionBD.php';

	$nombre = isset($_POST['nom']) ? trim($_POST['nom']) : null;
	$descripcion = isset($_POST['des']) ? trim($_POST['des']) : null;
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

				$sql = "INSERT INTO categoria VALUES (0, '$nombre', '$descripcion', '$image', '$fecha')";

				if ($conn -> query($sql) == TRUE) {
					echo "se han cargado los datos correctamente";
				} else {
					echo "<p class = 'error'>Error: ".mysqli.error($conn)."<p/>";
				}
				
    		}

        }

    } else {

        echo "File is not an image.";

    }

	echo "<br><a href='../agregarC.html'>Regresar</a>";
	echo "<br><a href='../categorias.php'>Categorías</a>";

?>