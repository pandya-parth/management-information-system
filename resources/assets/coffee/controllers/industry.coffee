angular.module 'mis'

	.controller 'IndustryCtrl', ($scope, Industry, prompt, $timeout)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.edit = false
		Industry.get().success (data)->
			$scope.industries = data
			$scope.loading = false

		$scope.clearAll = (form)->
			$scope.options =
				title: 'You have changes.'
				message:'Are you sure you want to discard changes?'
				input:false
				label:''
				value:''
				values:false
				buttons:[
					{
						label: 'ok'
						primary: true
					}
					{
						label: 'Cancel'
						cancel: true
					}
				]
    
			if form.$dirty
				prompt($scope.options).then( ->					
					angular.element('#addNewAppModal').modal('hide')
					$scope.submitted = false
					$scope.edit = false
					$scope.industry = {}					
				)
			else
				angular.element('#addNewAppModal').modal('hide')
				$timeout (->
					$scope.submitted = false
					$scope.edit = false
					$scope.industry = {}
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
				Industry.save($scope.industry).success (data)->
					$scope.submitted = false
					$scope.industry = {}
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					Industry.get().success (getData)->
						$scope.industries = getData
						$scope.loading = false
			else
				Industry.update($scope.industry).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.industry = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						Industry.get().success (getData)->
							$scope.industries = getData
							$scope.loading = false
					), 500
					


		$scope.deleteIndustry = (id)-> 
			$scope.loading = true
			Industry.destroy(id).success (data)->
				Industry.get().success (getData)->
					$scope.industries = getData
					$scope.loading = false
				angular.element('body').pgNotification(
					style: 'flip'
					message: 'Record deleted successfully.'
					position: 'top-right'
					timeout: 2000
					type: 'success').show()

		$scope.editIndustry = (id)->
			Industry.edit(id).success (data)->
				$scope.edit = true
				$scope.industry = {
					id: data.id
					name: data.name
				}
				angular.element('#addNewAppModal').modal('show')
