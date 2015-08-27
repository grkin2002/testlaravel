var huiqiaoApp = angular.module('huiqiaoApp',[
        'ngRoute',
        'controllers'
    ]);

huiqiaoApp.config(['$routeProvider',
    function($routeProvider){
        $routeProvider.
            when('/search', {
                templateUrl:'/angular/partial/list.html',
                controller:'ListCtrl'
            }).
            when('/search/:keyword',{
                templateUrl:'/angular/partial/list.html',
                controller:'ListCtrl'
            }).
            when('/detail/:postId',{
                templateUrl:'/angular/partial/detail.html',
                controller:'DetailCtrl'
            }).
            otherwise({
                redirectTo:'/search'
            });

    }
]);