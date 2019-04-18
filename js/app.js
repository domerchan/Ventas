'use strict';

/* App Module */
/* se crea el modulo del aplicativo*/
var market = angular.module('market', [
  'marketControllers',
  'marketServices' // se agrega el servicio creado en services.js
]);