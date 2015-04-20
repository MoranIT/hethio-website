
angular.module('myApp.site', ['ngRoute'])


.controller('AppCtrl', function($scope, $location) {
    $scope.isActive = function(route) {
        return route === $location.path();
    };
});