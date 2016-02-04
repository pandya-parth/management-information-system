angular.module 'mis'

	.controller 'PeopleCtrl', ($scope, PEOPLE, $timeout)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.pageSize = 5
		$scope.edit = false
		PEOPLE.get().success (data)->
			$scope.peoples = data
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
				console.log $scope.people_array
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
						$scope.peoples = getData
						$scope.loading = false
			else
				PEOPLE.update($scope.people_array).success (data)->
					console.log data
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

						PEOPLE.get().success (getData)->
							$scope.peoples = getData
							$scope.loading = false
					), 500


		$scope.deletePeople = (id)-> 
			$scope.loading = true
			PEOPLE.destroy(id).success (data)->
				PEOPLE.get().success (getData)->
					$scope.peoples = getData
					$scope.loading = false
				angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record deleted successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

		$scope.editPeople = (id)->
			PEOPLE.edit(id).success (data)->
				$scope.edit = true
				$scope.people_array = data
				angular.element('#addNewAppModal').modal('show')
