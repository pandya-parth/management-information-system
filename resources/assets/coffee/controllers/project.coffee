angular.module 'mis'

	.controller 'ProjectCtrl', ($scope, PROJECT, $timeout)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.pageSize = 5
		$scope.edit = false
		PROJECT.get().success (data)->
			$scope.projects = data
			$scope.loading = false

		$scope.clearAll = ->
			angular.element('#addNewAppModal').modal('hide')
			$timeout (->
				$scope.submitted = false
				$scope.edit = false
				$scope.project_array = {}
			), 1000
			return

		$scope.submit = (form)->
			$scope.loading = true
			$scope.submitted = true
			if form.$invalid
				$scope.loading = false
				return
			else
				$scope.loading = true

			if $scope.edit == false
				PROJECT.save($scope.project_array).success (data)->
					$scope.submitted = false
					$scope.project_array = {}
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					PROJECT.get().success (getData)->
						$scope.projects = getData
						$scope.loading = false
			else
				PROJECT.update($scope.project_array).success (data)->
					console.log data
					$scope.submitted = false
					$scope.edit = false
					$scope.project_array = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						PROJECT.get().success (getData)->
							$scope.projects = getData
							$scope.loading = false
					), 500


		$scope.deleteProject = (id)-> 
			$scope.loading = true
			PROJECT.destroy(id).success (data)->
				PROJECT.get().success (getData)->
					$scope.projects = getData
					$scope.loading = false
				angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record deleted successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

		$scope.editProject = (id)->
			PROJECT.edit(id).success (data)->
				$scope.edit = true
				$scope.project_array = data
				angular.element('#addNewAppModal').modal('show')
