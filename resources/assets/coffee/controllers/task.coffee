angular.module 'mis'

	.controller 'TasksCtrl', ($scope, task, $timeout, $window)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.pageSize = 5
		$scope.edit = false
		currentUrl = $window.location.href
		pId = currentUrl.split('/')[4]||"Undefined"
		task.get().success (data)->
			$scope.tasks = data
			$scope.loading = false

		task.getCat().success (data)->
			$scope.taskcategories = data
			$scope.loading = false

				

		$scope.showModal = (event) ->
			$scope.task.category_id = event.target.id
			angular.element('#addNewAppModal').modal('show')
			return

		$scope.clearAll = ->
			angular.element('#addNewAppModal').modal('hide')
			$timeout (->
				$scope.submitted = false
				$scope.edit = false
				$scope.task = {}
				
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
				$scope.task.project_id = pId
				task.save($scope.task).success (data)->
					$scope.submitted = false
					$scope.task = {}
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					task.get().success (getData)->
						$scope.tasks = getData
						$scope.loading = false
			else
				task.update($scope.task).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.task = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						task.get().success (getData)->
							$scope.tasks = getData
							$scope.loading = false
					), 500


		$scope.deleteTask = (id)-> 
			$scope.loading = true
			task.destroy(id).success (data)->
				task.get().success (getData)->
					$scope.tasks = getData
					$scope.loading = false
				angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record deleted successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

		$scope.editTask = (id)->
			task.edit(id).success (data)->
				$scope.edit = true
				$scope.task = data
				angular.element('#addNewAppModal').modal('show')
