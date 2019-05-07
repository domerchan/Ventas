<?php
	include'conexionBD.php';

	$categoria = $_POST['cat'];
	$nombre = isset($_POST['nom']) ? trim($_POST['nom']) : null;
	$porcentaje = $_POST['por'];
	$dia = $_POST['dia'];
	$descripcion = isset($_POST['des']) ? trim($_POST['des']) : null;
 	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

 	$sql = "SELECT ca_codigo FROM categoria WHERE ca_nombre = '$categoria'";
 	$result = $conn -> query($sql);
 	$row = $result -> fetch_assoc();
 	$ca_codigo = $row['ca_codigo'];

 	$check = getimagesize($_FILES["image"]["tmp_name"]);
    $size = $_FILES["image"]["size"];
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    if($check !== false) {

		if ($ext !== "jpg") {

        	echo "Sólo se admiten formatos .jpg";
        	echo "<br>";
	        echo "El archivo es de formato - " . $ext;

    	} else {

    		if ($size > 16777215) {

    			echo "Tamaño de imagen excedido: ".$size." bytes";
    			echo "<br>";
    			echo "Tamaño máximo admitido es de 16 MB";

    		} else {

    			$sql = "INSERT INTO promocion VALUES (0, '$ca_codigo', '$nombre', '$porcentaje', '$dia', '$descripcion', '$image')";

				if ($conn -> query($sql) == TRUE) {
					echo "<h2>Se han cargado los datos correctamente!</h2>";
				} else {
					echo "<p class = 'error'>Error: <p/>";
				}
    		}
    	}
	}

	


	echo "<br><a href='../agregarPm.php'>Regresar</a>";
	echo "<br><a href='../promociones.php'>Promociones</a>";

?>