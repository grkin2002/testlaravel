var controllers = angular.module('controllers', []);

controllers.controller('ListCtrl', ['$scope', '$rootScope','$http',
        function($scope, $rootScope, $http){
            $scope.submit = function(){

                if(!$scope.keyword ) return;
                $http.get('/search/'+ $scope.keyword).success(function(data){

                $rootScope.posts =data;
                });
            };
        }
    ]);

controllers.controller('DetailCtrl', ['$scope', '$rootScope', '$filter','$routeParams',
        function($scope, $rootScope, $filter, $routeParams){
            var postId = $routeParams.postId;
            $scope.item = $filter('filter')($rootScope.posts, function(d){return d.id===postId;})[0];
        }
    ]);