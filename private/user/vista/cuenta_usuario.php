<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }else if($_SESSION['usu_rol'] == "A"){
        header("Location: ../../../admin/vista/admin/admin_index.php");
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio-Usuario</title>
    <link rel="stylesheet" type="text/css" href="Css/style.css">
</head>
<body>
    
    <header>
			<div id="banner">
				<img src="../../../config/img/logo4.png" style="width: 500px">
			</div>
			<div id="gradient"></div>
			<nav class="navHeader">
				<ul>
					<li><a href="../../../index.php"><p>Inicio</p></a></li>
					<li><a href="#about"><p>Acerca</p></a></li>
					<li><a href="#contact"><p>Contáctanos</p></a></li>
					<li><a href=""><p>Locales</p></a></li>
                    <li><a href=""><p>Promociones</p></a></li>
                    <li><a href=""><p>Shopping Cart</p></a></li>
                    <li> <a href="../../../config/logout.php" id="activo">Cerrar Sesión</a></li>
				</ul>
				
            </nav>
            <div id="perfil">
            <?php  
                #echo '<div id="img">';
                #echo '<img src="../../../imagenes/'.$_SESSION['img_nombre'].'" width="75px" height="75px">';
                #echo '</div>';

            ?>
        </div>  
        </header>
    <div id="tituloIndex">
        <h1>Cuenta Personal</h1>
    </div>



    <table>
        <?php
        include '../../../config/conexionBD.php';
        $codigo=$_SESSION['us_codigo'];
        $sql = "SELECT * FROM usuario WHERE us_codigo='$codigo'";
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
        if ($result->num_rows > 0) {
            echo '<div id="cuenta">';
                echo '<div id="cargar_imagen">';
                echo "<img class='img' src='data:image/jpg;base64,".base64_encode($row["us_imagen"])."'/>";
                echo '</div>';

                echo '<div id="cargar_usuario">';  
                    echo '<p>Nombre: '.$row['us_nombres'].'</p>';
                echo '</div>';
                
                echo '<div id="cargar_usuario">';  
                    echo '<p>Apellidos: '.$row['us_apellidos'].'</p>';
                echo '</div>';
            
                echo '<div id="cargar_usuario">';  
                    echo '<p>Cedula: '.$row['us_cedula'].'</p>';
                echo '</div>';
            
                echo '<div id="cargar_usuario">';  
                    echo '<p>Fecha de Nacimiento: '.$row['us_fecha_nacimiento'].'</p>';
                echo '</div>';
            
                echo '<div id="cargar_usuario">';  
                    echo '<p>Correo: '.$row['us_correo'].'</p>';
                echo '</div>';
            
                echo '<div id="cargar_usuario">';  
                    echo '<p>Direccion: '.$row['us_direccion'].'</p>';
                echo '</div>';

               
              
                echo '</div>';
            
                echo '<div id="modificar">';  
                    echo '<a href="modificar_cuenta.php">MODIFICAR CUENTA </a> <br>';
                    echo '<a href="cambiar_contrasena.php">CAMBIAR CONTRASENA </a><br> ';
                    echo '<a href="eliminarusuario.php">ELIMINAR USUARIO </a><br> ';
                echo '</div>';
            
            echo '</div>';
            
        } else { 
            echo "<p>Surgió un error</p>";
        }
        $conn->close();
        ?>
    </table>
    <footer>
			<div id="pie">
				<p>
			        Desarrollado por:<br> Jonathan Matute &#8226; Doménica Merchán &#8226; Mark Orellana &#8226; René Panjón &#8226; John Tenesaca
			    </p>
			    <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="../../../config/img/ups.png" alt="logo de la Universidad Politecnica Salesiana"></a>
			    <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
			    <br>
			</div>
		</footer>
</body>
</html>