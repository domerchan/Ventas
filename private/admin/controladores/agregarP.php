<?php
	include'../../../config/conexionBD.php';

	$subcategoria = $_POST['sub'];
	$nombre = isset($_POST['nom']) ? trim($_POST['nom']) : null;
	$descripcion = isset($_POST['des']) ? trim($_POST['des']) : null;
	$precio = $_POST['pre'];
	$unidad = $_POST['uni'];
 	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
 	$stock = $_POST['stk'];
 	$oferta = $_POST['ofr'];
 	$azucar = $_POST['azc'];
 	$grasa = $_POST['grs'];
 	$sal = $_POST['sal'];

 	$sql = "SELECT sb_codigo FROM subcategoria WHERE sb_nombre = '$subcategoria'";
 	$result = $conn -> query($sql);
 	$row = $result -> fetch_assoc();
 	$sb_codigo = $row['sb_codigo'];



    $check = getimagesize($_FILES["image"]["tmp_name"]);
    $size = $_FILES["image"]["size"];
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    if($check !== false) {

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

				$sql = "INSERT INTO producto VALUES (0, '$sb_codigo', '$nombre', '$descripcion', '$precio', '$unidad', '$image', '$stock', '$oferta', '$azucar', '$grasa', '$sal', 'N', 0, 0)";

				if ($conn -> query($sql) == TRUE) {
					echo "<h2>Se han cargado los datos correctamente!</h2>";
				} else {
					echo "<p class = 'error'>Error: ".$conn->error."<p/>";
				}

    		}

    	}

    } else {
        echo "File is not an image.";
    }

	

	echo "<br><a href='../vista/agregarP.php'>Regresar</a>";
	echo "<br><a href='../vista/productos.php'>Productos</a>";

?>