<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
	<title> Promociones</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/listados.css">
    <link rel="stylesheet" type="text/css" href="css_sucursales/sppagebuilder.css">
    <link rel="stylesheet" type="text/css" href="css_sucursales/preset1.css">
    <link rel="stylesheet" type="text/css" href="css_sucursales/custom.css">
    <link rel="stylesheet" type="text/css" href="css_sucursales/pagebuilder.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" type="text/css" href="Promociones/css/slicebox.css" >
	<link rel="stylesheet" type="text/css" href="Promociones/css/demo.css" >
    <link rel="stylesheet" type="text/css" href="Promociones/css/custom.css">
    
	<script type="text/javascript" src="Promociones/js/modernizr.custom.46884.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>

    <header>
        <div id="banner">
            <img src="img/logo4.png">
        </div>
        <div id="gradient"></div>
        <nav class="navHeader">
            <ul>
                <li><a href="index.php">
                        <p>Inicio</p>
                    </a></li>
                <li><a href="sucursal.php">
                        <p>Sucursal</p>
                    </a></li>
                <li><a href="categorias.php">
                        <p>Categorías</p>
                    </a></li>
                <li><a href="subcategorias.php">
                        <p>Subcategorías</p>
                    </a></li>
                <li><a href="productos.php">
                        <p>Productos</p>
                    </a></li>
                <li><a href="promociones.php">
                        <p>Promociones</p>
                    </a></li>
            </ul>
        </nav>

    </header>
	<br>
	<br>
    <a href="agregarPm.php">Agregar una nueva Promoción</a>

    <div class="container">
			<h1 class="h1">Promociones</h1>
			<div class="wrapper">

				<ul id="sb-slider" class="sb-slider">
					<li>
						<a href="#" target="_blank"><img src="01.png" alt="image1"/></a>
						<div class="sb-description">
							<h3>Manzanas al 10% de descuento</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="02.png" alt="image1"/></a>
						<div class="sb-description">
							<h3>Carnes al 5% de descuento</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="03.png" alt="image1"/></a>
						<div class="sb-description">
							<h3>Snacks a mitad de precio</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="04.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Bebidas alcoholicas 2x1</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="05.png" alt="image1"/></a>
						<div class="sb-description">
							<h3>Limpieza para el hogar 3x1</h3>
						</div>
					</li>
				
				</ul>

				<div id="shadow" class="shadow"></div>

				<div id="nav-arrows" class="nav-arrows">
					<a href="#">Next</a>
					<a href="#">Previous</a>
				</div>

			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="Promociones/js/jquery.slicebox.js"></script>
		<script type="text/javascript">
			$(function() {
				
				var Page = (function() {

					var $navArrows = $( '#nav-arrows' ).hide(),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {

								$navArrows.show();
								$shadow.show();

							},
							orientation : 'r',
							cuboidsRandom : true
						} ),
						
						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							$navArrows.children( ':first' ).on( 'click', function() {

								slicebox.next();
								return false;

							} );

							$navArrows.children( ':last' ).on( 'click', function() {
								
								slicebox.previous();
								return false;

							} );

						};

						return { init : init };

				})();

				Page.init();

			});
		</script>

    <div id="listado">
      <table>
            <!---  <tr>
                <th>ID</th>
                <th>CATEGORÍA</th>
                <th>NOMBRE</th>
                <th>PORCENTAJE</th>
                <th>DÍA QUE APLICA</th>
                <th>DESCRIPCIÓN</th>
                <th>IMAGEN</th>
            </tr>  !--->
                                 
             <?php
					include'php/conexionBD.php';
					$sql = "SELECT * FROM promocion, categoria WHERE promocion.ca_codigo = categoria.ca_codigo";
					$result = $conn -> query($sql);

					if($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {
							echo "<tr>";
							echo "<td class='id'>".$row["pm_codigo"]."</td>";
							echo "<td class='nom'>".$row["ca_nombre"]."</td>";
							echo "<td class='nom'>".$row["pm_nombre"]."</td>";
							echo "<td class='por'>".$row["pm_porcentaje"]."</td>";
							echo "<td class='dia'>".$row["pm_dia"]."</td>";
							echo "<td class='des'>".$row["pm_descripcion"]."</td>";
							echo "<td class='img'><img src='data:image/jpg;base64,".base64_encode($row["pm_imagen"])."'/></td>";
							echo "</tr>";
						}
					}
				?>
        </table>
    </div>

    <style type="text/css">
        .sp-page-builder .page-content #section-id-1510066293570 {
            margin: 0px 0px 0px 0px;
            padding: 20px 0px 20px 0px;
        }

        .sp-page-builder .page-content #section-id-1510149195307 {
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;
            color: rgba(255, 255, 255, 1);
            background-color: rgba(40, 40, 40, 1);
        }

        #sppb-addon-1510149195339 {
            background-image: url(imgPromo/frutas&verduras.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: inherit;
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;
        }

        #sppb-addon-1510149195339 .sppb-empty-space {
            padding-bottom: 380px;
        }

        #column-id-1510149195309 {
            padding: 20px 0px 0px 0px;
        }

        #sppb-addon-1510149195315 {
            margin: 0px 0px 0px 0px;
            padding: 0px 30px 0px 30px;
        }


        .sp-page-builder .page-content #section-id-1527519038487 {
            margin: 0px 0px 0px 0px;
            padding: 20px 0px 20px 0px;
        }

        .sp-page-builder .page-content #section-id-1510149195323 {
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;
            color: rgba(255, 255, 255, 1);
            background-color: rgba(40, 40, 40, 1);
        }

        #column-id-1510149195324 {
            padding: 20px 00px 0px 0px;
        }

        #sppb-addon-1510149195327 {
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;
        }


        #column-id-1510149195326 {
            padding: 0px 0px 0px 0px;
        }

        #sppb-addon-1510149195348 {
            background-image: url(imgPromo/carnicos.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: inherit;
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;
        }

        #sppb-addon-1510149195348 .sppb-empty-space {
            padding-bottom: 380px;
        }

        .sp-page-builder .page-content #section-id-1527519038497 {
            margin: 0px 0px 0px 0px;
            padding: 20px 0px 20px 0px;
        }

        .sp-page-builder .page-content #section-id-1510155300516 {
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;
            color: rgba(255, 255, 255, 1);
            background-color: rgba(40, 40, 40, 1);
        }

        #sppb-addon-1510155300518 {
            background-image: url(imgPromo/huevos.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: inherit;
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;
        }

        #sppb-addon-1510149195349 {
            background-image: url(imgPromo/snacks.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: inherit;
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;
        }

        #sppb-addon-1510149195349 .sppb-empty-space {
            padding-bottom: 380px;
        }

       
    </style>

    <div id="sp-page-builder" class="sp-page-builder  page-69">

        <div class="page-content">
            <section id="section-id-1510066293570" class="sppb-section ">
                <div class="sppb-row-container">
                    <div class="sppb-row">
                        <div class="sppb-col-md-12">
                            <div id="column-id-1510066293571" class="sppb-column">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1510087055720" class="clearfix">
                                        <div class="sppb-addon sppb-addon-text-block sppb-text-left ">
                                            <div class="sppb-addon-content"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div id="section-id-1510149195307" class="sppb-section ">
                <div class="sppb-container-inner">
                    <div class="sppb-row">
                        <div class="sppb-col-md-7">
                            <div id="column-id-1510149195308" class="sppb-column imagen-izq">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1510149195339" class="clearfix">
                                        <div class="sppb-empty-space imagenes-recuadro clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sppb-col-md-5">
                            <div id="column-id-1510149195309" class="sppb-column ">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1510149195315" class="clearfix">
                                        <div class="sppb-addon sppb-addon-text-block sppb-text-center ">
                                            <div class="sppb-addon-content">
                                                <h3>Categoria</h3>
                                                <p>Frutas & Verduras</p>
                                                <h3>NOMBRE</h3>
                                                <p>Manzanas</p>
                                                <h3>Porcentaje</h3>
                                                <p>5% de decuento</p>
                                                <h3>Dias aplicables</h3>
                                                <p>Hasta fin de mes</p>
                                                <h3>Descripcion</h3>
                                                <p>Una manzana con un auténtico alimento con medicinas como las sustancias fitoquímicas que contiene, 
                                                como pectina, ácidos orgánicos, taninos, flavonoides o boro, mineral en el que es campeona.</p>
                                            </div>
                                        </div>
                                    </div> 
                                    <div id="sppb-addon-1510149195328" class="clearfix">
                                        <div class="sppb-text-center"><a href="productos.php" id="btn-1510149195328"
                                            class="sppb-btn  sppb-btn-default sppb-btn-rounded"><i
                                            class="fa fa-plus-square"></i> Agregar al carrito</a>
                                            <br><br></div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="section-id-1527519038487" class="sppb-section ">
                <div class="sppb-row-container">
                    <div class="sppb-row">
                        <div class="sppb-col-md-12">
                            <div id="column-id-1527519038488" class="sppb-column">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1527519038486" class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div id="section-id-1510149195323" class="sppb-section ">
                <div class="sppb-container-inner">
                    <div class="sppb-row">
                        <div class="sppb-col-md-5">
                            <div id="column-id-1510149195324" class="sppb-column ">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1510149195327" class="clearfix">
                                        <div class="sppb-addon sppb-addon-text-block sppb-text-center ">
                                            <div class="sppb-addon-content">
                                                <h3>Categoria</h3>
                                                <p>Carnicos</p>
                                                <h3>NOMBRE</h3>
                                                <p>Carne roja</p>
                                                <h3>Porcentaje</h3>
                                                <p>10% de decuento</p>
                                                <h3>Dias aplicables</h3>
                                                <p>Solo por el dia del Pápa</p>
                                                <h3>Descripcion</h3>
                                                <p>Una carne roja rica en proteínas de alta calidad.</p>                                           
                                            </div>
                                     
                                        </div>
                                    </div>
                                    <div id="sppb-addon-1510149195328" class="clearfix">
                                        <div class="sppb-text-center"><a href="productos.php" id="btn-1510149195328"
                                                class="sppb-btn  sppb-btn-default sppb-btn-rounded"><i
                                                    class="fa fa-plus-square"></i>Agregar al carrito</a>
                                                    <br><br></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sppb-col-md-7">
                            <div id="column-id-1510149195326" class="sppb-column ">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1510149195348" class="clearfix">
                                        <div class="sppb-empty-space imagenes-recuadro clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="section-id-1527519038497" class="sppb-section ">
                <div class="sppb-row-container">
                    <div class="sppb-row">
                        <div class="sppb-col-md-12">
                            <div id="column-id-1527519038498" class="sppb-column">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1527519038499" class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div id="section-id-1510155300516" class="sppb-section ">
                <div class="sppb-container-inner">
                    <div class="sppb-row">
                        <div class="sppb-col-md-7">
                            <div id="column-id-1510155300517" class="sppb-column imagen-izq">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1510155300518" class="clearfix">
                                        <div class="sppb-empty-space imagenes-recuadro clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sppb-col-md-5">
                            <div id="column-id-1510155300519" class="sppb-column ">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1510155300520" class="clearfix">
                                        <div class="sppb-addon sppb-addon-text-block sppb-text-center ">
                                            <div class="sppb-addon-content">
                                                <h3>Categoria</h3>
                                                <p>Lacteos & Huevos</p>
                                                <h3>NOMBRE</h3>
                                                <p>Huevos</p>
                                                <h3>Porcentaje</h3>
                                                <p>5% de decuento</p>
                                                <h3>Dias aplicables</h3>
                                                <p>Todo el mes de Junio</p>
                                                <h3>Descripcion</h3>
                                                <p>Excelente fuente de hierro, concentrado especialmente en la yema </p>    
                                            </div>
                                        </div>
                                    </div>
                                    <div id="sppb-addon-1510155300521" class="clearfix">
                                        <div class="sppb-text-center"><a href="productos.php" id="btn-1510155300521"
                                                class="sppb-btn  sppb-btn-default sppb-btn-rounded"><i
                                                    class="fa fa-plus-square"></i>Agregar al carrito</a>
                                                    <br><br>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="section-id-1527521856443" class="sppb-section ">
                <div class="sppb-row-container">
                    <div class="sppb-row">
                        <div class="sppb-col-md-12">
                            <div id="column-id-1527521856444" class="sppb-column">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1527521856445" class="clearfix">
                                        <div class="sppb-addon sppb-addon-text-block sppb-text-left ">
            </section>

            <section id="section-id-1527519038487" class="sppb-section ">
                <div class="sppb-row-container">
                    <div class="sppb-row">
                        <div class="sppb-col-md-12">
                            <div id="column-id-1527519038488" class="sppb-column">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1527519038486" class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div id="section-id-1510149195323" class="sppb-section ">
                <div class="sppb-container-inner">
                    <div class="sppb-row">
                        <div class="sppb-col-md-5">
                            <div id="column-id-1510149195324" class="sppb-column ">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1510149195327" class="clearfix">
                                        <div class="sppb-addon sppb-addon-text-block sppb-text-center ">
                                            <div class="sppb-addon-content">
                                                <h3>Categoria</h3>
                                                <p>Snacks</p>
                                                <h3>NOMBRE</h3>
                                                <p>Todo tipo de Snacks</p>
                                                <h3>Porcentaje</h3>
                                                <p>15% de decuento</p>
                                                <h3>Dias aplicables</h3>
                                                <p>Solo por el mes de Junio</p>
                                                <h3>Descripcion</h3>
                                                <p>Apetitosos para momentos libres.</p>                                           
                                            </div>
                                     
                                        </div>
                                    </div>
                                    <div id="sppb-addon-1510149195328" class="clearfix">
                                        <div class="sppb-text-center"><a href="productos.php" id="btn-1510149195328"
                                                class="sppb-btn  sppb-btn-default sppb-btn-rounded"><i
                                                    class="fa fa-plus-square"></i>Agregar al carrito</a>
                                                    <br><br></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sppb-col-md-7">
                            <div id="column-id-1510149195326" class="sppb-column ">
                                <div class="sppb-column-addons">
                                    <div id="sppb-addon-1510149195349" class="clearfix">
                                        <div class="sppb-empty-space imagenes-recuadro clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>

    
    <div class="contenedor margen-arriba margen-abajo">
        <footer>
            <div id="pie">
                <p>
                    Desarrollado por:<br> Jonathan Matute &#8226; Doménica Merchán &#8226; Mark Orellana &#8226; René
                    Panjón &#8226; John Tenesaca
                </p>
                <a href="https://www.ups.edu.ec" target="_blank"><img style="width: 150px" src="img/ups.png"
                        alt="logo de la Universidad Politecnica Salesiana"></a>
                <p><sub>&#169;</sub><em> Todos los derechos reservados</em></p>
                <br>
            </div>
        </footer>

</html>