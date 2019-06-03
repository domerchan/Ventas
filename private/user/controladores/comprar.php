<?php
	session_start();

			include'../../../config/conexionBD.php';
            
				$sql = "SELECT * FROM factura WHERE us_codigo = ".$_SESSION['codigo']." AND fa_compra_realizada = 'N' AND fa_eliminada = 'N'";
				$result = $conn -> query($sql);
				while ($row = $result -> fetch_assoc()) {
					$sql2 = "SELECT * FROM producto WHERE pr_codigo = ".$row['pr_codigo'];
					$result2 = $conn -> query($sql2);
                    $row2 = $result2 -> fetch_assoc();
                    
                    //hace update de stock
                    $stock=$row2['pr_stock']-$row['fa_cantidad'];
                    $sqlstock="UPDATE producto SET pr_stock= '$stock' WHERE pr_codigo=".$row2['pr_codigo'];
                    //CAMBIA A S COLUMNA DE FACTURA
                    $sqlfa="UPDATE factura SET fa_compra_realizada='S' WHERE us_codigo= ".$_SESSION['codigo']." AND fa_compra_realizada='N' AND fa_eliminada ='N'";
				}
			
                date_default_timezone_set("America/Guayaquil");
                $emision=date('Y-m-d',time());
                //UPDATE DE FACTURA CABECERA
                $cod=$_SESSION['us_codigo'];
                $sqlf = "SELECT fc_codigo FROM factura-cabecera WHERE us_codigo=$cod AND fc_estado='creada' ORDER BY  fc_codigo  DESC LIMIT 1";
                $resultf=$conn->query($sqlf);
                $rowft=$resultf->fetch_assoc();                                
                $codfc=$rowft['fc_codigo'];
                $sqlsfc = "UPDATE factura-cabecera SET fc_fecha_emision='$emision', fc_envio='".$_GET['envios']."', fc_subtotal='".$_GET['subt']."', fc_total='".$_GET['total']."', fc_nombres= ".$_GET['nombre'].", fc_direccion=".$_GET['direccion'].", fc_cedula=".$_GET['cedula'].", fc_telefono=".$_GET['telefono'].", fc_correo=".$_SESSION['correo'].", fc_estado='realizada' WHERE fc_codigo='$codfc'";
           
                if ($conn->query($sqlsfc) === TRUE) {
                    echo "COMPRA REALIZADA";
                    
                    header('Refresh: 5; URL=../vista/carro.php');
                }else {
                    echo "Error: " . $sql4 . "<br>" . mysqli_error($conn) . "<br>";
                }
            ?>
