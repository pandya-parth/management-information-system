angular.module 'mis'

  .controller 'BodyCtrl', ($scope)->
    $scope.title = "MIS"

  .controller 'TaskCategoryCtrl', ($scope)->
  	$scope.submit = (form)->
  		$scope.submitted = true
  		if form.$invalid
  			return

  .controller 'ProjectCategoryCtrl', ($scope, projectCategory)->
    $scope.loading = true
    projectCategory.get().success (data)->
      $scope.categories = data
      $scope.loading = false

    $scope.clearAll = ->
      $scope.submitted = false
      angular.element('#addNewAppModal').modal('hide')
       

    $scope.deleteCategory = (id)-> 
      $scope.loading = true
      projectCategory.destroy(id).success (data)->
        projectCategory.get().success (getData)->
          $scope.categories = getData
          $scope.loading = false
          angular.element('body').pgNotification(
            style: 'flip'
            message: 'Record deleted successfully.'
            position: 'top-right'
            timeout: 2000
            type: 'success').show()

    $scope.submit = (form)->
      $scope.loading = true
      $scope.submitted = true
      if form.$invalid
        $scope.loading = false
        return
      else
        $scope.loading = true
      projectCategory.save($scope.project_category).success (data)->
        $scope.submitted = false
        $scope.project_category = {}
        angular.element('#addNewAppModal').modal('hide')
        angular.element('body').pgNotification(
          style: 'flip'
          message: 'Record saved successfully.'
          position: 'top-right'
          timeout: 2000
          type: 'success').show()

        projectCategory.get().success (getData)->
          $scope.categories = getData
          $scope.loading = false;
