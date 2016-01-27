angular.module 'mis'

	.controller 'TaskCategoryCtrl', ($scope, taskCategory)->
	    $scope.loading = true
	    taskCategory.get().success (data)->
	      $scope.task_categories = data
	      $scope.loading = false

	    $scope.submit = (form)->
	      $scope.loading = true
	      $scope.submitted = true
	      if form.$invalid
	        $scope.loading = false
	        return
	      else
	        $scope.loading = true
	      taskCategory.save($scope.task_category).success (data)->
	        $scope.submitted = false
	        $scope.task_category = {}
	        angular.element('#addNewAppModal').modal('hide')
	        angular.element('body').pgNotification(
	          style: 'flip'
	          message: 'Record saved successfully.'
	          position: 'top-right'
	          timeout: 2000
	          type: 'success').show()

	        taskCategory.get().success (getData)->
	          $scope.task_categories = getData
	          $scope.loading = false;
	    $scope.clearAll = ->
	        $scope.submitted = false
	        angular.element('#addNewAppModal').modal('hide')

	    $scope.deleteCategory = (id)-> 
	      $scope.loading = true
	      taskCategory.destroy(id).success (data)->
	        taskCategory.get().success (getData)->
	          $scope.task_categories = getData
	          $scope.loading = false
	          angular.element('body').pgNotification(
	            style: 'flip'
	            message: 'Record deleted successfully.'
	            position: 'top-right'
	            timeout: 2000
	            type: 'success').show()