<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Contáctanos | Market Online</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!--Cambiar href dependiendo de la ubicación del archivo-->
		<link rel="stylesheet" type="text/css" href="../../config/css/style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="css/contactanos.css" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="../../config/js/javascript.js"></script>
	</head>

	<body>

		<header>
			<div id="banner">
				<img src="../../config/img/logo4.png">
			</div>
			<div id="gradient"></div>

			<nav class="navHeader">
				<ul class="ul1">
					<li class="frst"><a href="index.php">Inicio</a></li>
					<?php
					include'../../config/conexionBD.php';
					$sql = "SELECT * FROM area";
					$result = $conn -> query($sql);
					while($row = $result -> fetch_assoc()) {
						echo "<li class='frst'>";
						echo "<a>".$row['ar_nombre']."</a>";
						
						echo "<ul id='categorias'>";
						$sql2 = "SELECT * FROM categoria WHERE ar_codigo = ".$row['ar_codigo'];
						$result2 = $conn -> query($sql2);
						while ($row2 = $result2 -> fetch_assoc()) {
							echo "<li><a href='productos.php?categoria=".$row2['ca_codigo']."&n_categoria=".$row2['ca_nombre']."'>".$row2['ca_nombre']."</a><div class='img' style=\"background-image: url('data:image/jpg;base64,".base64_encode($row2["ca_imagen"])."')\"></div></li>";
						}
						echo "</ul>";
						
						echo "</li>";
					}
					?>
					<li class="frst"><a href="promociones.php">Promociones</a></li>
					<li class='frst'>
						<?php
						if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE)
							echo "<a href='login.html'>Iniciar Sesión</a>";
						if($_SESSION['isLogged'] === TRUE) {
							echo "<a>Cuenta</a>";
							echo "<ul id='cuenta'>";
							echo "<li><a href='../../private/user/vista/perfil.php'>Perfil</a></li>";
              				echo "<li><a href='../../config/cerrar_sesion.php'>Cerrar Sesión</a></li>";
							echo "</ul>";
						}
						?>
					</li>
					
				</ul>
				<?php
				if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'user')
					echo "<a href='../../private/user/vista/carro.php'><i class='material-icons'>shopping_cart</i></a>";
				?>
			</nav>
		</header>




		<h1>Contáctanos</h1>


		<main>
        <div id="wrap">
            <div class="container mt16 mb16">
                <div class="row  pad15">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div>
                            <?php
                            include'../../config/conexionBD.php';
                            $sql = "SELECT * FROM market";
                            $result = $conn -> query($sql);
                            if($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='small-title mb8'>".$row["ma_nombre"]."</td>";
                            echo "</tr>";
                            } }
                            ?>

            <div class="address-description description mb8"></div>
                <div class="address-text first mb8">
                    <div class="content"><i class="fa fa-map-marker"></i>&nbsp;Acerca de Nosotros
                        </div>
                            <div>
                                <div>
                                <?php
                                $sql = "SELECT * FROM market";
                                $result = $conn -> query($sql);
                                if($result -> num_rows > 0) {
                                while ($row = $result -> fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='fa fa-map-marker'>".$row["ma_acerca"]."</td>";
                                echo "</tr>";
                                } }
                                ?>
                                </div></div></div>

            <div class="address-text second mb8">
                <div class="content"><i class="fa fa-phone"></i>&nbsp;Teléfonos</div>
                    <div></div>
                        <div>
                            <div>
                            <?php
                            $sql = "SELECT * FROM market";
                            $result = $conn -> query($sql);
                            if($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='fa fa-phone'>".$row["ma_telefono1"]."</td>";
                            echo "<p></p>";
                            echo "<td class='fa fa-phone'>".$row["ma_telefono2"]."</td>";
                            echo "</tr>";
                            } }
                            ?>
                            </div></div></div>

            <div class="address-description description mb8"></div>
                <div class="address-text first mb8">
                    <div class="content"><i class="fa fa-map-marker"></i>&nbsp;Dirección</div>
                        <div>
                            <div>
                            <?php
                            $sql = "SELECT * FROM market";
                            $result = $conn -> query($sql);
                            if($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='fa fa-map-marker'>".$row["ma_direccion"]."</td>";
                            echo "</tr>";
                            } }
                            ?>
                            </div></div></div>

            <div class="address-description description mb8"></div>
                <div class="address-text first mb8">
                    <div class="content"><i class="fa fa-map-marker"></i>&nbsp;Correo</div>
                        <div>
                            <div>
                            <?php
                            $sql = "SELECT * FROM market";
                            $result = $conn -> query($sql);
                            if($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='fa fa-map-marker'>".$row["ma_correo"]."</td>";
                            echo "</tr>";
                            } }
                            ?>
                            </div></div></div>

            <div class="address-text second mb8">
                <div class="content"><i class="fa fa-phone"></i>&nbsp;Whatsapp</div>
                    <div>
                        <div>
                        <?php
                        $sql = "SELECT * FROM market";
                        $result = $conn -> query($sql);
                        if($result -> num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='fa fa-phone'>".$row["ma_wpp"]."</td>";
                        echo "</tr>";
                        } }
                        ?>
                        </div></div></div></div></div>

            <div class="col-md-8 col-sm-8 col-xs-12 mb32">
                <section>
                    <div class="oe_structure"></div>
                        <div>
                            <form action="agregaPregunta.php" method="POST"
                            class="s_website_form form-horizontal container-fluid mt32" enctype="multipart/form-data">
                                <div class="form-group form-field o_website_form_required_custom">
                                    <label class="col-md-3 col-sm-4 control-label" style="font-size:17px">
                                        Tu pregunta
                                    </label>
                                    <div class="col-md-7 col-sm-8">
                                        <textarea class="form-control o_website_form_input" name="pregunta"
                                        placeholder="Ingrese mensaje" required=""></textarea>
                                    </div>
                                </div>

                                <div class="form-group form-field o_website_form_required_custom">
                                    <label class="col-md-3 col-sm-4 control-label" style="font-size:17px">
                                        Tu nombre
                                    </label>
                                    <div class="col-md-7 col-sm-8">
                                    <input type="text" class="form-control o_website_form_input" name="nombre"
                                    placeholder="Ingrese su nombre" required="">
                                    </div>
                                </div>

                                <div class="form-group form-field o_website_form_required_custom">
                                    <label class="col-md-3 col-sm-4 control-label" style="font-size:17px">
                                        Correo electrónico
                                    </label>
                                    <div class="col-md-7 col-sm-8">
                                    <input type="text" class="form-control o_website_form_input" name="correo" 
                                    placeholder="Ingrese su Correo Electrónico" required=""/>
                                    </div>
                                </div>

                                <div class="form-group form-field o_website_form_required">
                                    <label class="col-md-3 col-sm-4 control-label" style="font-size:17px">
                                        Asunto
                                    </label>
                                    <div class="col-md-7 col-sm-8">
                                    <input type="text" class="form-control o_website_form_input"name="asunto" 
                                    placeholder="Ingrese el asunto" required=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-sm-offset-4 col-sm-8 col-md-7">
                                    <input type="submit" name="button2" value="ENVIAR"class="btn btn-primary btn-lg o_website_form_send"
                                            onclick="location.href='agregaPregunta.php')">
                                    <input type="reset" name="cancelar" value="CANCELAR" class="btn btn-primary btn-lg o_website_form_send"
                                            onclick="location.href='index.php'">
    </div> </div></form> </section></div></div> </div></div></div> </main>



		<div id="about">
			<section>
				<div>
					<article id="uno">
						<p>Productos</p>
						<ul>
							<?php
							$sql = "SELECT * FROM area";
							$result = $conn -> query($sql);
							while($row = $result -> fetch_assoc()) {
								echo "<li><a>".$row['ar_nombre']."</a></li>";
							}
							?>
						</ul>
					</article>

					<article id="dos">
						<p>Nosotros</p>
						<ul>
							<li><a href="somos.php">¿Quiénes somos?</a></li>
							<li><a href="servicio.php">Nuestro Servicio</a></li>
							<li><a href="proveedores.php">Proveedores</a></li>
							<li><a href="contactanos.php">Contáctanos</a></li>
						</ul>
					</article>

					<article id="tres">
						<p>Servicio al Cliente</p>
						<ul>
							<li><a href="preguntas.php">Preguntas Frecuentes</a></li>
							<li><a href="como.php">¿Cómo comprar?</a></li>
							<li><a href="pago.php">Formas de pago</a></li>
							<li><a href="sucursales.php">Nuestras sucursales</a></li>
						</ul>
					</article>
				</div>
			</section>
		</div>

		<div id="social">
			<section>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-3 7h-1.924c-.615 0-1.076.252-1.076.889v1.111h3l-.238 3h-2.762v8h-3v-8h-2v-3h2v-1.923c0-2.022 1.064-3.077 3.461-3.077h2.539v3z"/></svg>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.233 5.488c-.843-.038-1.097-.046-3.233-.046s-2.389.008-3.232.046c-2.17.099-3.181 1.127-3.279 3.279-.039.844-.048 1.097-.048 3.233s.009 2.389.047 3.233c.099 2.148 1.106 3.18 3.279 3.279.843.038 1.097.047 3.233.047 2.137 0 2.39-.008 3.233-.046 2.17-.099 3.18-1.129 3.279-3.279.038-.844.046-1.097.046-3.233s-.008-2.389-.046-3.232c-.099-2.153-1.111-3.182-3.279-3.281zm-3.233 10.62c-2.269 0-4.108-1.839-4.108-4.108 0-2.269 1.84-4.108 4.108-4.108s4.108 1.839 4.108 4.108c0 2.269-1.839 4.108-4.108 4.108zm4.271-7.418c-.53 0-.96-.43-.96-.96s.43-.96.96-.96.96.43.96.96-.43.96-.96.96zm-1.604 3.31c0 1.473-1.194 2.667-2.667 2.667s-2.667-1.194-2.667-2.667c0-1.473 1.194-2.667 2.667-2.667s2.667 1.194 2.667 2.667zm4.333-12h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm.952 15.298c-.132 2.909-1.751 4.521-4.653 4.654-.854.039-1.126.048-3.299.048s-2.444-.009-3.298-.048c-2.908-.133-4.52-1.748-4.654-4.654-.039-.853-.048-1.125-.048-3.298 0-2.172.009-2.445.048-3.298.134-2.908 1.748-4.521 4.654-4.653.854-.04 1.125-.049 3.298-.049s2.445.009 3.299.048c2.908.133 4.523 1.751 4.653 4.653.039.854.048 1.127.048 3.299 0 2.173-.009 2.445-.048 3.298z"/></svg>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-.139 9.237c.209 4.617-3.234 9.765-9.33 9.765-1.854 0-3.579-.543-5.032-1.475 1.742.205 3.48-.278 4.86-1.359-1.437-.027-2.649-.976-3.066-2.28.515.098 1.021.069 1.482-.056-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411-1.461-.977-1.875-2.907-1.016-4.383 1.619 1.986 4.038 3.293 6.766 3.43-.479-2.053 1.08-4.03 3.199-4.03.943 0 1.797.398 2.395 1.037.748-.147 1.451-.42 2.086-.796-.246.767-.766 1.41-1.443 1.816.664-.08 1.297-.256 1.885-.517-.439.656-.996 1.234-1.639 1.697z"/></svg>
			</section>
		</div>


		<footer>
			<div id="pie">
				<p>
			        Desarrollado por:<br> Jonathan Matute &#8226; Doménica Merchán &#8226; Mark Orellana &#8226; René Panjón &#8226; John Tenesaca
			    </p>
				<!--Cambiar src dependiendo de la ubicación del archivo-->
			    <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="../../config/img/ups.png" alt="logo de la Universidad Politecnica Salesiana"></a>
			    <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
			    <br>
			</div>
		</footer>

	</body>
</html>