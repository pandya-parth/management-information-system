angular.module 'mis'

	.controller 'ProjectCategoryCtrl', ($scope, projectCategory, prompt, $timeout)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.pageSize = 5
		$scope.edit = false
		projectCategory.get().success (data)->
			$scope.categories = data
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
					$scope.project_category = {}					
				)
			else
				angular.element('#addNewAppModal').modal('hide')
				$timeout (->
					$scope.submitted = false
					$scope.edit = false
					$scope.project_category = {}
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
				projectCategory.save($scope.project_category).success (data)->
					$scope.submitted = false
					$scope.project_category = {}
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					projectCategory.get().success (getData)->
						$scope.categories = getData
						$scope.loading = false
			else
				projectCategory.update($scope.project_category).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.project_category = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						projectCategory.get().success (getData)->
							$scope.categories = getData
							$scope.loading = false
					), 500
					


		$scope.deleteCategory = (id)-> 
			$scope.loading = true
			projectCategory.destroy(id).success (data)->
				projectCategory.get().success (getData)->
					$scope.categories = getData
					$scope.loading = false
				angular.element('body').pgNotification(
					style: 'flip'
					message: 'Record deleted successfully.'
					position: 'top-right'
					timeout: 2000
					type: 'success').show()

		$scope.editCategory = (id)->
			projectCategory.edit(id).success (data)->
				$scope.edit = true
				$scope.project_category = {
					id: data.id
					name: data.name
				}
				angular.element('#addNewAppModal').modal('show')
