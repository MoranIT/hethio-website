'use strict';

angular.module('myApp.api.agent', [])

    .factory('apiAgent', ['$http', function($http) {

        var urlBase = 'api/agent';
        var apiAgent = {};


        apiAgent.getStatus = function (agent) {
            console.log("getStatus(" + agent + ")");

            if (agent !== undefined) {
                console.log("getStatus(agent)");
                return $http.get(urlBase + 'status/' + agent);
            } else {
                console.log("getStatus()" + urlBase + 'status');
                return $http.get(urlBase + 'status');
            }
        };


        apiAgent.getAgent = function (agent, id) {
            console.log("getAgent(" + agent + ", " + id + ")");

            if (agent !== undefined) {
                if (id !== undefined) {
                    console.log("getAgent(agent,id)");
                    return $http.get(urlBase + '/' + agent + '/' + id);
                } else {
                    console.log("getAgent(agent)");
                    return $http.get(urlBase + '/' + agent);
                }
            } else {
                console.log("getAgent()");
                return $http.get(urlBase);
            }
        };




        /*
        dataFactory.insertCustomer = function (cust) {
            return $http.post(urlBase, cust);
        };

        dataFactory.updateCustomer = function (cust) {
            return $http.put(urlBase + '/' + cust.ID, cust)
        };

        dataFactory.deleteCustomer = function (id) {
            return $http.delete(urlBase + '/' + id);
        };

        dataFactory.getOrders = function (id) {
            return $http.get(urlBase + '/' + id + '/orders');
        };
        */

        return apiAgent;
    }]);