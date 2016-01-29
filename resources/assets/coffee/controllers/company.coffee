angular.module 'mis'

	.controller 'companyCtrl', ($scope, company, $timeout)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.pageSize = 5
		$scope.edit = false
		company.get().success (data)->
			$scope.companies = data
			$scope.loading = false

		$scope.clearAll = ->
			angular.element('#addNewAppModal').modal('hide')
			$timeout (->
				$scope.submitted = false
				$scope.edit = false
				$scope.company = {}
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
						$scope.loading = false
			else
				company.update($scope.company).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.company = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						company.get().success (getData)->
							$scope.companies = getData
							$scope.loading = false
					), 500
			

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

		$scope.editCompany = (id)->
			company.edit(id).success (data)->
				$scope.edit = true
				$scope.company = data
				angular.element('#addNewAppModal').modal('show')






