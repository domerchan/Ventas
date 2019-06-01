<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }else if($_SESSION['usu_rol'] == "A"){
        header("Location: ../../../admin/vista/admin/admin_index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset="utf-8">
    <title>COMPRAR</title>
</head>
<body>
    
    <?php
        include '../../../config/conexionBD.php'; 
        $codigo=$_POST["codigo"];
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]):null;
        $nombres=isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8'):null;
        $apellidos=isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8'):null;
        $direccion=isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8'):null;
        $telefono=isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
        $correo=isset($_POST["correo"]) ? trim($_POST["correo"]):null;
        $fechaNacimiento=isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]):null;
		$iva = $_POST["iva"];						   
		$subtotal = $_POST["subtotal"];
		$total = $_POST["total"];
		$envio = $_POST["envio"];

		date_default_timezone_set("America/Guayaquil");
		
        $modificacion=date('Y-m-d',time());
		$nombresyap=$nombres . " " . $apellidos;
		$sql5="INSERT INTO factura-cabecera VALUES (0,'$codigo','$modificacion','$iva','$envio','$subtotal','$total','$nombresyap','$direccion','$cedula','$telefono','$correo')";
		
		$cod=$_SESSION['us_codigo'];
		$sqlf = "SELECT TOP 1 fc_codigo FROM factura-cabecera WHERE us_codigo=$cod ORDER BY 1 fc_codigo  DESC";
        $resultf=$conn->query($sqlf);
		$rowft=$resultf->fetch_assoc();                                
		$codfc=$rowft['fc_codigo'];
		
	
	
	
		$codigo=$_SESSION['us_codigo'];
		
		$sql = "SELECT  * FROM factura WHERE us_codigo=$codigo AND fa_compra_realizada='N' AND fa_eliminada ='N'" ;
		$result=$conn->query($sql);
		if($result->num_rows > 0){
			$valorT=0;
			while($row=$result->fetch_assoc()){
				$sql2= "SELECT * FROM producto WHERE pr_codigo=".$row['pr_codigo'];
					$result2=$conn->query($sql2);
					if($result2->num_rows > 0){
						while($row2=$result2->fetch_assoc()){
							$stock=$row['pr_stock']-$row['fa_cantidad'];
							$sql6="UPDATE producto SET pr_stock='$stock' WHERE pr_codigo=".$row['pr_codigo'];	
						}		
					}else{
						echo "<p> No hay prodcutos agregados </p>";
					}
				$sql4="UPDATE factura SET fa_compra_realizada='S' WHERE us_codigo=$codigo AND fa_compra_realizada='N' AND fa_eliminada ='N'";
				$sqlff="UPDATE factura SET fc_codigo=$codfc WHERE us_codigo=$codigo AND fa_compra_realizada='N' AND fa_eliminada ='N'";
				}
			}else{
				echo "<p> No hay prodcutos agregados </p>";
			}
			if ($conn->query($sql4) === TRUE) {
				echo "COMPRA REALIZADA";
				
				header('Refresh: 5; URL=../vista/carro.php');
			}else {
				echo "Error: " . $sql4 . "<br>" . mysqli_error($conn) . "<br>";
			}
	
			$conn->close();
	?>
</body>
</html>
