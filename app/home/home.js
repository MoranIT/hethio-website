'use strict';

angular.module('myApp.home', ['ngRoute',])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/home', {
    templateUrl: 'home/home.html',
    controller: 'HomeCtrl'
  });
}])

.controller('HomeCtrl', ['$scope', 'apiAgent', function($scope, apiAgent) {
    $scope.agentStatus;

    getAgentStatus();

    function getAgentStatus() {
        console.log("Retrieving Agent Status");
        apiAgent.getStatus()
            .success(function (agent) {
                $scope.agentStatus = agent;
            })
            .error(function (error) {
                $scope.agentStatus = 'Unable to load agent data: ' + error.message;
            });
    }


}]);