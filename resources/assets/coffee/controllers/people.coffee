angular.module 'mis'

  .controller 'PeopleCtrl', ($scope, PEOPLE)->
      $scope.loading = true
      PEOPLE.get().success (data)->
        $scope.people_datas = data
        $scope.loading = false

      $scope.clearAll = ->
        $scope.submitted = false
        angular.element('#addNewAppModal').modal('hide')
         

      $scope.deleteCategory = (id)-> 
        $scope.loading = true
        PEOPLE.destroy(id).success (data)->
          PEOPLE.get().success (getData)->
            $scope.people_datas = getData
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
