angular.module 'mis'

	.controller 'TasksCtrl', ($scope, task, $timeout, $window, prompt)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.pageSize = 5
		$scope.edit = false
		currentUrl = $window.location.href
		pId = currentUrl.split('/')[4]||"Undefined"
		task.get(pId).success (data)->
			$scope.tasks = data
			$scope.loading = false

		task.getLog().success (data)->
			$scope.logs = data
			$scope.loading = false

		task.getCat().success (data)->
			$scope.taskcategories = data
			$scope.loading = false

		$scope.Pro_Id = pId	

		$scope.showModal = (event) ->
			$scope.task.category_id = event.target.id
			angular.element('#addNewAppModal').modal('show')
			return

		$scope.showLogModal = (event) ->
			angular.element('#logTimeModal').modal('show')
			return

		$scope.cancelAll = ->
			angular.element('#addNewAppModal').modal('hide')
			$timeout (->
				$scope.submitted = false
				$scope.edit = false
				$scope.task = {}
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
					$scope.task = {}					
				)
			else
				angular.element('#addNewAppModal').modal('hide')
				$timeout (->
					$scope.submitted = false
					$scope.edit = false
					$scope.task = {}
					$scope.task.priority = "low"
					), 1000
			return
		
		$scope.logCancel = ->
			angular.element('#logTimeModal').modal('hide')
			$timeout (->
				$scope.submitted = false
				$scope.edit = false
				$scope.logtime = {}
			), 1000
			return

		$scope.logClearAll = (form)->
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
					angular.element('#logTimeModal').modal('hide')
					$scope.submitted = false
					$scope.edit = false
					$scope.logtime = {}					
				)
			else
				angular.element('#logTimeModal').modal('hide')
				$timeout (->
					$scope.submitted = false
					$scope.edit = false
					$scope.logtime = {}
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

					task.get(pId).success (getData)->
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

						task.get(pId).success (getData)->
							$scope.tasks = getData
							$scope.loading = false
					), 500

		$scope.submitLog = (form)->
			$scope.loading = true
			$scope.submitted = true
			if form.$invalid
				$scope.loading = false
				return
			else
				$scope.loading = true

			if $scope.edit == false
				task.savelog($scope.logtime).success (data)->
					$scope.submitted = false
					alert $scope.logtime.hour = parseFloat($scope.logtime.start_time) - parseFloat($scope.logtime.end_time);
					$scope.logtime = {}
					angular.element('#logTimeModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					task.getlog().success (getData)->
						$scope.logtimes = getData
						$scope.loading = false
			else
				task.updatelog($scope.logtime).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.logtime = {}
					angular.element('#logTimeModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						task.getlog().success (getData)->
							$scope.logtimes = getData
							$scope.loading = false
					), 500


		$scope.deleteTask = (id)-> 
			$scope.loading = true
			task.destroy(id).success (data)->
				task.get(pId).success (getData)->
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
