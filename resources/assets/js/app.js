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
		var data = $.param({
                name: $scope.name
            });

      	$http({method: "post", url: '/project_categories', data, headers: {'Content-Type': 'application/x-www-form-urlencoded'}}).success(function(data){
      		$scope.submitted = false;
      		$scope.name = '';
      		angular.element('.subsuccess').html('Thank you.');
      		
      	});
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






