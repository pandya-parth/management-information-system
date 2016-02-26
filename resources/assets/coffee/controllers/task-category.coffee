angular.module 'mis'

.controller 'TaskCategoryCtrl', ($scope, taskCategory, $timeout,prompt)->
	$scope.loading = true
	$scope.currentPage = 1
	$scope.edit = false
	taskCategory.get().success (data)->
		$scope.task_categories = data
		$scope.loading = false

	$scope.cancelAll = ->
		angular.element('#addNewAppModal').modal('hide')
		$timeout (->
			$scope.submitted = false
			$scope.edit = false
			$scope.task_category = {}
		), 1000
		return

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
					$scope.task_category = {}					
				)
			else
				angular.element('#addNewAppModal').modal('hide')
				$timeout (->
					$scope.submitted = false
					$scope.edit = false
					$scope.task_category = {}
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
				taskCategory.save($scope.task_category).success (data)->
					$scope.submitted = false
					$scope.task_category = {}
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()
					taskCategory.get().success (getData)->
						$scope.task_categories = getData
						$scope.loading = false
			else
				taskCategory.update($scope.task_category).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.task_category = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()
						taskCategory.get().success (getData)->
							$scope.task_categories = getData
							$scope.loading = false
					), 500

	$scope.deleteCategory = (id)-> 
		$scope.loading = true
		taskCategory.destroy(id).success (data)->
			taskCategory.get().success (getData)->
				$scope.task_categories = getData
				$scope.loading = false
				angular.element('body').pgNotification(
					style: 'flip'
					message: 'Record deleted successfully.'
					position: 'top-right'
					timeout: 2000
					type: 'success').show()
	
	$scope.editCategory = (id)->
		taskCategory.edit(id).success (data)->
			$scope.edit = true
			$scope.task_category = {
				id: data.id
				name: data.name
			}
			angular.element('#addNewAppModal').modal('show')