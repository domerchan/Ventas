'use strict';

/* Services */
/* Se aplica el uso de servicios*/
var marketServices = angular.module('marketServices', []);

//Se declara el servicio Product! con una sola propiedad
marketServices.factory('Product', [
  function(){
    return {
    	notify: function(msg){
    		alert(msg);
    	},
    	getProducts: function(){
    		var products = [{
    					"id": "FV",
				        "name": "Frutas y Verduras", 
				        "listado": ["naranja", "pera"]
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
