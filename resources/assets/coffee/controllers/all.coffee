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


   
  .controller 'ProjectCategoryCtrl', ($scope, projectCategory)->
    $scope.loading = true
    $scope.currentPage = 1;
    $scope.pageSize = 1;
    projectCategory.get().success (data)->
      $scope.categories = data
      $scope.loading = false

    $scope.clearAll = ->
      $scope.submitted = false
      angular.element('#addNewAppModal').modal('hide')
      return
       

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



.controller 'PeopleCtrl', ($scope, PEOPLE)->
    $scope.loading = true
    PEOPLE.get().success (data)->
      $scope.people_datas = data
      $scope.loading = false

    $scope.submit = (form)->
      $scope.loading = true
      $scope.submitted = true
      if form.$invalid
        $scope.loading = false
        return
      else
        $scope.loading = true
      PEOPLE.save($scope.people_array).success (data)->
        $scope.submitted = false
        $scope.people_array = {}
        angular.element('#addNewAppModal').modal('hide')
        angular.element('body').pgNotification(
          style: 'flip'
          message: 'Record saved successfully.'
          position: 'top-right'
          timeout: 2000
          type: 'success').show()

        PEOPLE.get().success (getData)->
          $scope.people_datas = getData
          $scope.loading = false;

  .controller 'companyCtrl', ($scope, company)->
    $scope.loading = true
    company.get().success (data)->
      $scope.companies = data
      $scope.loading = false

    $scope.submit = (form)->
      $scope.loading = true
      $scope.submitted = true
      if form.$invalid
        $scope.loading = false
        return
      else
        $scope.loading = true
      company.save($scope.company).success (data)->
        $scope.submitted = false
        $scope.company = {}
        angular.element('#addNewAppModal').modal('hide')
        angular.element('body').pgNotification(
          style: 'flip'
          message: 'Record saved successfully.'
          position: 'top-right'
          timeout: 2000
          type: 'success').show()
        company.get().success (getData)->
          $scope.companies = getData  
          $scope.loading = false;

    $scope.clearAll = ->
        $scope.submitted = false
        angular.element('#addNewAppModal').modal('hide')

    $scope.deleteCompany = (id)-> 
      $scope.loading = true
      company.destroy(id).success (data)->
        company.get().success (getData)->
          $scope.companies = getData
          $scope.loading = false
          angular.element('body').pgNotification(
            style: 'flip'
            message: 'Record deleted successfully.'
            position: 'top-right'
            timeout: 2000
            type: 'success').show()




