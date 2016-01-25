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
// angular.element('.pgn-wrapper').css('display:none');
app.controller('TaskCategoryCtrl',['$scope','$http',function($scope,$http){
    $scope.hide = true;
    $scope.hideme = function()
    {
      $scope.hide = true;
    };
    
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
          $scope.task_category = '';
           $scope.hide = false;
          angular.element('.pgn-wrapper').show();
          angular.element('#addNewAppModal').modal('hide');
          angular.element('.modal-backdrop').fadeOut();
        });
    };
  
}]);

app.controller('ProjectCategoryCtrl',['$scope','$http',' $timeout',function($scope,$http){
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
          
          //angular.element('.subsuccess').html('Thank you.');
          
        });
    };

}]);









