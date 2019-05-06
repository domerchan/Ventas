<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<pre>
	<?php
		include'../php/conexionBD.php';
		$productos = [];
		$sql = "SELECT * FROM categoria";
		$result = $conn -> query($sql);
		while($row = $result -> fetch_assoc()) {
			$sql2 = "SELECT pr_nombre FROM producto Where producto.ca_codigo = '$row['ca_codigo']'";
			$result2 = $conn -> query($sql);
			$row2 = $result2 -> fetch_assoc();

			$producto = {
				"id": $row['ca_codigo'],
				"nombre": $row['ca_nombre'],
				"listado": $row2
			};

			array_push($productos, $producto);
		}

		print_r($productos);
		print_r($row);
	?>
</pre>
<script type="text/javascript">
	'use strict';

	var marketServices = angular.module('marketServices', []);

	marketServices.factory('Product', [
	  function(){
	    return {
	    	notify: function(msg){
	    		alert(msg);
	    	},
	    	getProducts: function(){
	    		var products = 	[{
	    					"id": "FV",
					        "name": "Frutas y Verduras", 
					        "listado": [{"nombre": "naranja"}, {"nombre": "pera"}]
					    },
					    {
	    					"id": "Cr",
					        "name": "Carnes", 
					        "listado": ""
					    },
					    {
	    					"id": "Pn",
					        "name": "Panadería", 
					        "listado": ""
					    },
					    {
	    					"id": "Dr",
					        "name": "Derivados", 
					        "listado": ""
					    },
					    {
	    					"id": "En",
					        "name": "Enlatados", 
					        "listado": ""
					    },
					    {
	    					"id": "Es",
					        "name": "Especias", 
					        "listado": ""
					    },
					    {
	    					"id": "Bb",
					        "name": "Bebidas", 
					        "listado": ""
					    },
					    {
	    					"id": "Sn",
					        "name": "Snacks", 
					        "listado": ""
					    },
					    {
	    					"id": "Lc",
					        "name": "Licorería", 
					        "listado": ""
					    },
					    {
	    					"id": "Lb",
					        "name": "Libros", 
					        "listado": ""
					    },
					    {
	    					"id": "Bs",
					        "name": "Bebés", 
					        "listado": ""
					    },
					    {
	    					"id": "Cs",
					        "name": "Cosméticos", 
					        "listado": ""
					    },
					    {
	    					"id": "PH",
					        "name": "Para el Hogar", 
					        "listado": ""
					    },
					    {
	    					"id": "Ms",
					        "name": "Mascotas", 
					        "listado": ""
					    },
					    {
	    					"id": "Fr",
					        "name": "Ferretería", 
					        "listado": ""
					    }];

			    return products;
	    	}
	    }
	  }]);

</script>
</body>
</html>
