'use strict';

// Declare app level module which depends on views, and components
angular.module('myApp', [
    'ngRoute',
    'myApp.site',
    'myApp.home',
    'myApp.about',
    'myApp.contact',
  'myApp.version',
  'myApp.api.agent'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.otherwise({redirectTo: '/home'});
}]);
