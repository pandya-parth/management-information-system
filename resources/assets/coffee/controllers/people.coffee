angular.module 'mis'

	.controller 'PeopleCtrl', ($scope, People, $timeout)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.pageSize = 5
		$scope.edit = false
		People.get().success (data)->
			$scope.people_datas = data
			$scope.loading = false

		$scope.clearAll = ->
			angular.element('#addNewAppModal').modal('hide')
			$timeout (->
				$scope.submitted = false
				$scope.edit = false
				$scope.people_array = {}
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
				People.save($scope.people_array).success (data)->
					$scope.submitted = false
					$scope.people_array = {}
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					People.get().success (getData)->
						$scope.people_datas = getData
						$scope.loading = false
			else
				People.update($scope.people_array).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.people_array = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						People.get().success (getData)->
							$scope.people_datas = getData
							$scope.loading = false
					), 500
					


		$scope.deleteCategory = (id)-> 
			$scope.loading = true
			People.destroy(id).success (data)->
				People.get().success (getData)->
					$scope.people_datas = getData
					$scope.loading = false
				angular.element('body').pgNotification(
					style: 'flip'
					message: 'Record deleted successfully.'
					position: 'top-right'
					timeout: 2000
					type: 'success').show()

		$scope.editCategory = (id)->
			People.edit(id).success (data)->
				$scope.edit = true
				$scope.people_array = {
					id: data.id
					name: data.name
				}
				angular.element('#addNewAppModal').modal('show')
