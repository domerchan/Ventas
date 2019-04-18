'use strict';

/* Controllers */

var marketControllers = angular.module('marketControllers', []);

//Inyectamos el servicio Product creaado en services JS, que nos permite extraer los productos del proyecto
marketControllers.controller('ProductListCtrl', ['$scope', 'Product',
  	function($scope, Product) {
	/* Agregamos nuestros primeros carros <3 */
      $scope.products = Product.getProducts();
  }]);

