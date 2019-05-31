<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Contáctanos | Market Online</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Cambiar href dependiendo de la ubicación del archivo-->
    <link rel="stylesheet" type="text/css" href="../../config/css/style.css">
    <link href="cssPruebas/web.assets_frontend.0.css" rel="stylesheet" />
    <link href="cssPruebas/web.assets_frontend.1.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">

    <script type="text/javascript" src="cssPruebas/web.assets_common.js"></script>
    <script type="text/javascript" src="cssPruebas/web.assets_frontend.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="../../config/js/javascript.js"></script>
</head>

<body ng-controller="ProductListCtrl">

    <header>
        <div id="banner">

            <!--Cambiar src dependiendo de la ubicación del archivo-->
            <img src="../../config/img/logo4.png">
        </div>
        <div id="gradient"></div>

        <nav class="navHeader">
            <ul class="ul1">
                <li class="frst"><a href="index.php">Inicio</a></li>
                <?php

					#Cambiar dependiendo de la ubicación del archivo
					include'../../config/conexionBD.php';

					$sql = "SELECT * FROM area";
					$result = $conn -> query($sql);
					while($row = $result -> fetch_assoc()) {
						echo "<li class='frst'>";
						echo "<a>".$row['ar_nombre']."</a>";
						
						echo "<ul>";
						$sql2 = "SELECT * FROM categoria WHERE ar_codigo = ".$row['ar_codigo'];
						$result2 = $conn -> query($sql2);
						while ($row2 = $result2 -> fetch_assoc()) {

							#Cambiar href dependiendo de la ubicación del archivo
							echo "<li><a href='mostrar_producto.php?categoria=".$row2['ca_codigo']."'>".$row2['ca_nombre']."</a><img class='img' src='data:image/jpg;base64,".base64_encode($row2["ca_imagen"])."'/></li>";
						}
						echo "</ul>";
						
						echo "</li>";
					}
					?>
                <li class="frst"><a href="">Promociones</a></li>
                <li class="frst"><a href="">Iniciar Sesión</a></li>
            </ul>
            <a href="carro.php"><i class="material-icons">shopping_cart</i></a>
        </nav>
    </header>

    <main>
        <div id="wrap ">
            <div class="oe_structure"></div>
            <section class="service_banner s_text_block_image_fw oe_img_bg oe_custom_bg"
                style="background-image: url(img6.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="slz-main-title text-center">
                            <div class="has-line mt8 mb16"></div>
                            <h2 class="title">
                                <font style="" class="bg-black-25 text-white">Contáctanos</font>
                            </h2>
                        </div>
                    </div>
                </div>
            </section>
            
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
                    }
                }
            ?>
  <div class="address-description description mb8">
                                <span></span>
                            </div>
                            <div class="address-text first mb8">
                                <div class="content"><i class="fa fa-map-marker"></i>&nbsp;Acerca de Nosotros<span
                                        class="address-label">:</span>
                                </div>
                                <span data-oe-many2one-id="1" data-oe-many2one-model="res.partner"
                                    data-oe-contact-options="{&quot;widget&quot;: &quot;contact&quot;, &quot;inherit_branding&quot;: null, &quot;fields&quot;: [&quot;address&quot;], &quot;tagName&quot;: &quot;span&quot;, &quot;type&quot;: &quot;contact&quot;, &quot;translate&quot;: null, &quot;expression&quot;: &quot;res_company.partner_id&quot;}">
                                    <address class="mb0" itemscope="itemscope"
                                        itemtype="http://schema.org/Organization">


                                        <div itemprop="address" itemscope="itemscope"
                                            itemtype="http://schema.org/PostalAddress">
                                            <div>
                                            <?php
                $sql = "SELECT * FROM market";
                $result = $conn -> query($sql);
                if($result -> num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='fa fa-map-marker'>".$row["ma_acerca"]."</td>";
                        echo "</tr>";
                    }
                }
            ?>
                                            </div>

                                        </div>
                                    </address>
                                </span>
                            </div>

                           
                            <div class="address-text second mb8">
                                <div class="content"><i class="fa fa-phone"></i>&nbsp;Teléfonos<span
                                        class="address-label">:</span>
                                </div>
                                <span data-oe-many2one-id="1" data-oe-many2one-model="res.partner"
                                    data-oe-contact-options="{&quot;widget&quot;: &quot;contact&quot;, &quot;inherit_branding&quot;: null, &quot;fields&quot;: [&quot;phone&quot;, &quot;mobile&quot;], &quot;tagName&quot;: &quot;span&quot;, &quot;type&quot;: &quot;contact&quot;, &quot;translate&quot;: null, &quot;expression&quot;: &quot;res_company.partner_id&quot;}">
                                    <address class="mb0" itemscope="itemscope"
                                        itemtype="http://schema.org/Organization">
                                        <div class="css_non_editable_mode_hidden">
                                            --<span class="text-muted">Wanlla</span>--
                                        </div>

                                        <div itemprop="address" itemscope="itemscope"
                                            itemtype="http://schema.org/PostalAddress">


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
                    }
                }
            ?>
                                            </div>
                                        </div>
                                    </address>
                                </span>
                            </div>

                            <div class="address-description description mb8">
                                <span></span>
                            </div>
                            <div class="address-text first mb8">
                                <div class="content"><i class="fa fa-map-marker"></i>&nbsp;Dirección<span
                                        class="address-label">:</span>
                                </div>
                                <span data-oe-many2one-id="1" data-oe-many2one-model="res.partner"
                                    data-oe-contact-options="{&quot;widget&quot;: &quot;contact&quot;, &quot;inherit_branding&quot;: null, &quot;fields&quot;: [&quot;address&quot;], &quot;tagName&quot;: &quot;span&quot;, &quot;type&quot;: &quot;contact&quot;, &quot;translate&quot;: null, &quot;expression&quot;: &quot;res_company.partner_id&quot;}">
                                    <address class="mb0" itemscope="itemscope"
                                        itemtype="http://schema.org/Organization">


                                        <div itemprop="address" itemscope="itemscope"
                                            itemtype="http://schema.org/PostalAddress">
                                            <div>
                                            <?php
                $sql = "SELECT * FROM market";
                $result = $conn -> query($sql);
                if($result -> num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='fa fa-map-marker'>".$row["ma_direccion"]."</td>";
                        echo "</tr>";
                    }
                }
            ?>
                                            </div>

                                        </div>
                                    </address>
                                </span>
                            </div>
                            <div class="address-description description mb8">
                                <span></span>
                            </div>
                            <div class="address-text first mb8">
                                <div class="content"><i class="fa fa-map-marker"></i>&nbsp;Correo<span
                                        class="address-label">:</span>
                                </div>
                                <span data-oe-many2one-id="1" data-oe-many2one-model="res.partner"
                                    data-oe-contact-options="{&quot;widget&quot;: &quot;contact&quot;, &quot;inherit_branding&quot;: null, &quot;fields&quot;: [&quot;address&quot;], &quot;tagName&quot;: &quot;span&quot;, &quot;type&quot;: &quot;contact&quot;, &quot;translate&quot;: null, &quot;expression&quot;: &quot;res_company.partner_id&quot;}">
                                    <address class="mb0" itemscope="itemscope"
                                        itemtype="http://schema.org/Organization">


                                        <div itemprop="address" itemscope="itemscope"
                                            itemtype="http://schema.org/PostalAddress">
                                            <div>
                                            <?php
                $sql = "SELECT * FROM market";
                $result = $conn -> query($sql);
                if($result -> num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='fa fa-map-marker'>".$row["ma_correo"]."</td>";
                        echo "</tr>";
                    }
                }
            ?>
                                            </div>

                                        </div>
                                    </address>
                                </span>
                            </div>

                            <div class="address-text second mb8">
                                <div class="content"><i class="fa fa-phone"></i>&nbsp;Whatsapp<span
                                        class="address-label">:</span>
                                </div>
                                <span data-oe-many2one-id="1" data-oe-many2one-model="res.partner"
                                    data-oe-contact-options="{&quot;widget&quot;: &quot;contact&quot;, &quot;inherit_branding&quot;: null, &quot;fields&quot;: [&quot;phone&quot;, &quot;mobile&quot;], &quot;tagName&quot;: &quot;span&quot;, &quot;type&quot;: &quot;contact&quot;, &quot;translate&quot;: null, &quot;expression&quot;: &quot;res_company.partner_id&quot;}">
                                    <address class="mb0" itemscope="itemscope"
                                        itemtype="http://schema.org/Organization">
                                        <div class="css_non_editable_mode_hidden">
                                            --<span class="text-muted">Wanlla</span>--
                                        </div>

                                        <div itemprop="address" itemscope="itemscope"
                                            itemtype="http://schema.org/PostalAddress">


                                            <div>
                                            <?php
                $sql = "SELECT * FROM market";
                $result = $conn -> query($sql);
                if($result -> num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='fa fa-phone'>".$row["ma_wpp"]."</td>";
                        echo "</tr>";
                    }
                }
            ?>
                                            </div>
                                        </div>
                                    </address>
                                </span>
                            </div>
                        </div>
                    </div>

        <div class="col-md-8 col-sm-8 col-xs-12 mb32">
            <div class="oe_structure">
            </div>
            <div>
                <form action="/website_form/" method="post" data-model_name="crm.lead"
                    data-success_page="/page/website_crm.contactus_thanks"
                    class="s_website_form form-horizontal container-fluid mt32" enctype="multipart/form-data">
                    <div class="form-group form-field o_website_form_required_custom">
                        <label class="col-md-3 col-sm-4 control-label" for="contact_name" style="font-size:17px">
                            Tu nombre
                        </label>
                        <div class="col-md-7 col-sm-8">
                            <input type="text" class="form-control o_website_form_input" name="contact_name" required=""
                                value="" />
                        </div>
                    </div>
                    <div class="form-group form-field">
                        <label class="col-md-3 col-sm-4 control-label" for="phone" style="font-size:17px">Nº
                            teléfono</label>
                        <div class="col-md-7 col-sm-8">
                            <input type="text" class="form-control o_website_form_input" name="phone" value="" />
                        </div>
                    </div>
                    <div class="form-group form-field o_website_form_required_custom">
                        <label class="col-md-3 col-sm-4 control-label" for="email_from" style="font-size:17px">
                            Correo electrónico
                        </label>
                        <div class="col-md-7 col-sm-8">
                            <input type="text" class="form-control o_website_form_input" name="email_from" required=""
                                value="" />
                        </div>
                    </div>
                    <div class="form-group form-field o_website_form_required_custom">
                        <label class="col-md-3 col-sm-4 control-label" for="partner_name" style="font-size:17px">
                            Dirección
                        </label>
                        <div class="col-md-7 col-sm-8">
                            <input type="text" class="form-control o_website_form_input" name="partner_name" required=""
                                value="" />
                        </div>
                    </div>
                    <div class="form-group form-field o_website_form_required">
                        <label class="col-md-3 col-sm-4 control-label" for="name" style="font-size:17px">Asunto</label>
                        <div class="col-md-7 col-sm-8">
                            <input type="text" class="form-control o_website_form_input" name="name" required=""
                                value="" />
                        </div>
                    </div>
                    <div class="form-group form-field o_website_form_required_custom">
                        <label class="col-md-3 col-sm-4 control-label" for="description" style="font-size:17px">
                            Tu mensaje
                        </label>
                        <div class="col-md-7 col-sm-8">
                            <textarea class="form-control o_website_form_input" name="description" required="">
        </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-sm-offset-4 col-sm-8 col-md-7">
                        <button class="btn btn-primary btn-lg o_website_form_send" name="button2" onclick="location.href='thanks.php'">ENVIAR</button>
                        <span id="o_website_form_result"></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
        <div class="oe_structure"></div>
        </div>
    </main>

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
								echo "<li><a href=''>".$row['ar_nombre']."</a></li>";
							}
							?>
                    </ul>
                </article>

                <article id="dos">
                    <p>Nosotros</p>
                    <ul>
                        <li><a href="somos.php">¿Quiénes somos?</a></li>
                        <li><a href="servicio.php">Nuestro Servicio</a></li>
                        <li><a href="">Proveedores</a></li>
                        <li><a href="">Contáctanos</a></li>
                    </ul>
                </article>

                <article id="tres">
                    <p>Servicio al Cliente</p>
                    <ul>
                        <li><a href="">Preguntas Frecuentes</a></li>
                        <li><a href="">¿Cómo comprar?</a></li>
                        <li><a href="">Formas de pago</a></li>
                        <li><a href="">Nuestras sucursales</a></li>
                    </ul>
                </article>
            </div>
        </section>
    </div>

    <div id="social">
        <section>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-3 7h-1.924c-.615 0-1.076.252-1.076.889v1.111h3l-.238 3h-2.762v8h-3v-8h-2v-3h2v-1.923c0-2.022 1.064-3.077 3.461-3.077h2.539v3z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M15.233 5.488c-.843-.038-1.097-.046-3.233-.046s-2.389.008-3.232.046c-2.17.099-3.181 1.127-3.279 3.279-.039.844-.048 1.097-.048 3.233s.009 2.389.047 3.233c.099 2.148 1.106 3.18 3.279 3.279.843.038 1.097.047 3.233.047 2.137 0 2.39-.008 3.233-.046 2.17-.099 3.18-1.129 3.279-3.279.038-.844.046-1.097.046-3.233s-.008-2.389-.046-3.232c-.099-2.153-1.111-3.182-3.279-3.281zm-3.233 10.62c-2.269 0-4.108-1.839-4.108-4.108 0-2.269 1.84-4.108 4.108-4.108s4.108 1.839 4.108 4.108c0 2.269-1.839 4.108-4.108 4.108zm4.271-7.418c-.53 0-.96-.43-.96-.96s.43-.96.96-.96.96.43.96.96-.43.96-.96.96zm-1.604 3.31c0 1.473-1.194 2.667-2.667 2.667s-2.667-1.194-2.667-2.667c0-1.473 1.194-2.667 2.667-2.667s2.667 1.194 2.667 2.667zm4.333-12h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm.952 15.298c-.132 2.909-1.751 4.521-4.653 4.654-.854.039-1.126.048-3.299.048s-2.444-.009-3.298-.048c-2.908-.133-4.52-1.748-4.654-4.654-.039-.853-.048-1.125-.048-3.298 0-2.172.009-2.445.048-3.298.134-2.908 1.748-4.521 4.654-4.653.854-.04 1.125-.049 3.298-.049s2.445.009 3.299.048c2.908.133 4.523 1.751 4.653 4.653.039.854.048 1.127.048 3.299 0 2.173-.009 2.445-.048 3.298z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-.139 9.237c.209 4.617-3.234 9.765-9.33 9.765-1.854 0-3.579-.543-5.032-1.475 1.742.205 3.48-.278 4.86-1.359-1.437-.027-2.649-.976-3.066-2.28.515.098 1.021.069 1.482-.056-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411-1.461-.977-1.875-2.907-1.016-4.383 1.619 1.986 4.038 3.293 6.766 3.43-.479-2.053 1.08-4.03 3.199-4.03.943 0 1.797.398 2.395 1.037.748-.147 1.451-.42 2.086-.796-.246.767-.766 1.41-1.443 1.816.664-.08 1.297-.256 1.885-.517-.439.656-.996 1.234-1.639 1.697z" />
            </svg>
        </section>
    </div>


    <footer>
        <div id="pie">
            <p>
                Desarrollado por:<br> Jonathan Matute &#8226; Doménica Merchán &#8226; Mark Orellana &#8226; René Panjón
                &#8226; John Tenesaca
            </p>
            <!--Cambiar src dependiendo de la ubicación del archivo-->
            <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="../../config/img/ups.png"
                    alt="logo de la Universidad Politecnica Salesiana"></a>
            <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
            <br>
        </div>
    </footer>

</body>

</html>