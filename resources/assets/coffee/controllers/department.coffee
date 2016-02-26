angular.module 'mis'

	.controller 'DepartmentCtrl', ($scope, Department, prompt, $timeout)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.edit = false
		Department.get().success (data)->
			$scope.departments = data
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
					$scope.department = {}					
				)
			else
				angular.element('#addNewAppModal').modal('hide')
				$timeout (->
					$scope.submitted = false
					$scope.edit = false
					$scope.department = {}
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
				Department.save($scope.department).success (data)->
					$scope.submitted = false
					$scope.department = {}
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					Department.get().success (getData)->
						$scope.departments = getData
						$scope.loading = false
			else
				Department.update($scope.department).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.department = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						Department.get().success (getData)->
							$scope.departments = getData
							$scope.loading = false
					), 500
					


		$scope.deleteDepartment = (id)-> 
			$scope.loading = true
			Department.destroy(id).success (data)->
				Department.get().success (getData)->
					$scope.departments = getData
					$scope.loading = false
				angular.element('body').pgNotification(
					style: 'flip'
					message: 'Record deleted successfully.'
					position: 'top-right'
					timeout: 2000
					type: 'success').show()

		$scope.editDepartment = (id)->
			Department.edit(id).success (data)->
				$scope.edit = true
				$scope.department = {
					id: data.id
					name: data.name
				}
				angular.element('#addNewAppModal').modal('show')
