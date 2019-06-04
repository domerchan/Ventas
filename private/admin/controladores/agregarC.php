<?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false)
		header("Location: /ProgramacionHipermedial/Ventas/public/vista/index.php");
    else if($_SESSION['rol'] == "user")
        header("Location: /ProgramacionHipermedial/Ventas/private/user/vista/perfil.php");  
?>

<?php
	include'../../../config/conexionBD.php';

    $area = $_POST['area'];
	$nombre = isset($_POST['nom']) ? trim($_POST['nom']) : null;
	$descripcion = isset($_POST['des']) ? trim($_POST['des']) : null;
 	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $sql = "SELECT ar_codigo FROM area WHERE ar_nombre = '$area'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
    $ar_codigo = $row['ar_codigo'];

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

				$sql = "INSERT INTO categoria VALUES (0, '$nombre', '$descripcion', '$image', '$fecha', '$ar_codigo')";
                
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

	echo "<br><a href='../vista/agregarC.php'>Regresar</a>";
	echo "<br><a href='../vista/categorias.php'>Categorías</a>";

?>