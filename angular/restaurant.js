var app = angular.module('myApp', []);
app.controller('namesCtrl', function($scope, $http) {
  $http.get("http://localhost/restaurant/restaurants/list")
  .then(function (response) {
  	$scope.names = response.data.records;
  });
});