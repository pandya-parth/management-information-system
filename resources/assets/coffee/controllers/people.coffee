angular.module 'mis'

		.controller 'PeopleCtrl', ($scope, PEOPLE, $timeout)->
				$scope.loading = true
				$scope.currentPage = 1
				$scope.pageSize = 5
				
				PEOPLE.get().success (data)->
						$scope.peoples = data
						$scope.loading = false

				$scope.clearAll = ->
						angular.element('#addNewAppModal').modal('hide')
						$timeout (->
								$scope.submitted = false
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
