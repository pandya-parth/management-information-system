var app = angular.module('mis',[]);

app.controller('BodyCtrl',['$scope', function($scope){

}]);

app.controller('CompanyCtrl',['$scope','$http', function($scope,$http){

	$scope.name = '';

	$scope.name= {};

	$scope.name = function(){

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
        var data = $.param({
                name: $scope.task_category
            });

        $http({
          method: "post",
          url: '/task-categories', 
          data:data, 
          headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
        .success(function(data){
          $scope.submitted = false;
          $scope.name = '';
          
          angular.element('').html('Thank you.');
          
        });
    };

}]);

app.controller('ProjectCategoryCtrl',['$scope','$http',function($scope,$http){
    $scope.submit = function(form){
    $scope.submitted = true;
    if (form.$invalid) {
         return;
        }
        var data = $.param({
                name: $scope.project_category
            });

        $http({
          method: "post",
          url: '/project-categories', 
          data:data, 
          headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
        .success(function(data){

          $scope.submitted = false;
          $scope.name = '';
          angular.element('.pgn-wrapper').show();
          angular.element('#addNewAppModal').hide();
          angular.element('#addNewAppModal').modal('hide');
          angular.element('#addNewAppModal').modal('data-dismiss');
          angular.element('.modal-backdrop').hide();
          angular.element('.pgn-wrapper').show();

      
          
        });
    };

}]);









