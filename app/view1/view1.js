'use strict';

angular.module('myApp.view1', ['ngRoute',])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view1', {
    templateUrl: 'view1/view1.html',
    controller: 'View1Ctrl'
  });
}])

.controller('View1Ctrl', ['$scope', 'apiAgent', function($scope, apiAgent) {
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