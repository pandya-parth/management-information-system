angular.module 'mis'

	.controller 'DesignationCtrl', ($scope, Designation, prompt, $timeout)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.edit = false
		Designation.get().success (data)->
			$scope.designations = data
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
					$scope.designation = {}					
				)
			else
				angular.element('#addNewAppModal').modal('hide')
				$timeout (->
					$scope.submitted = false
					$scope.edit = false
					$scope.designation = {}
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
				Designation.save($scope.designation).success (data)->
					$scope.submitted = false
					$scope.designation = {}
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					Designation.get().success (getData)->
						$scope.designations = getData
						$scope.loading = false
			else
				Designation.update($scope.designation).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.designation = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						Designation.get().success (getData)->
							$scope.designations = getData
							$scope.loading = false
					), 500
					


		$scope.deleteDesignation = (id)-> 
			$scope.loading = true
			Designation.destroy(id).success (data)->
				Designation.get().success (getData)->
					$scope.designations = getData
					$scope.loading = false
				angular.element('body').pgNotification(
					style: 'flip'
					message: 'Record deleted successfully.'
					position: 'top-right'
					timeout: 2000
					type: 'success').show()

		$scope.editDesignation = (id)->
			Designation.edit(id).success (data)->
				$scope.edit = true
				$scope.designation = {
					id: data.id
					name: data.name
				}
				angular.element('#addNewAppModal').modal('show')
