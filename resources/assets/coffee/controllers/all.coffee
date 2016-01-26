angular.module 'mis'

  .controller 'BodyCtrl', ($scope)->
    $scope.title = "MIS"

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


   
  .controller 'ProjectCategoryCtrl', ($scope, projectCategory)->
    $scope.loading = true
    projectCategory.get().success (data)->
      $scope.categories = data
      $scope.loading = false

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
