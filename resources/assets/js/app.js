var app = angular.module('mis',[]);

app.controller('BodyCtrl',['$scope', function($scope){

}]);

app.controller('CompanyCtrl',['$scope','$http', function($scope,$http){

	$scope.name = '';

	$scope.name= {};

	$scope.name = function(){

	};
	
}]);

app.controller('ProjectCategoryCtrl',['$scope','$http',function($scope, $http){
	$scope.submit = function(form){
		$scope.submitted = true;

		if(form.$invalid){
			return;
		}
	};
}]);

app.controller('ProjectCtrl',['$scope','$http',function($scope, $http){
	$scope.submit = function(form){
		$scope.submitted = true;

		if(form.$invalid){
			return;
		}
	};
}]);

app.controller('TaskCategoryCtrl',['$scope','$http',function($scope,$http){
		$scope.submit = function(form){
		$scope.submitted = true;
		if (form.$invalid) {
       	 return;
      	}
		};
}]);




