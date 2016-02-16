angular.module 'mis'

	.controller 'milestoneCtrl', ($scope, milestone, $timeout, $window)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.pageSize = 5
		$scope.edit = false
		currentUrl = $window.location.href
		pId = currentUrl.split('/')[4]||"Undefined"

		milestone.get(pId).success (data)->
			$scope.milestones = data
			$scope.loading = false

		$scope.Pro_Id = pId

		$scope.clearAll = ->
			angular.element('#addNewAppModal').modal('hide')
			$timeout (->
				$scope.submitted = false
				$scope.edit = false
				$scope.milestone = {}
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
				$scope.milestone.project_id = pId
				milestone.save($scope.milestone).success (data)->
					$scope.submitted = false
					$scope.milestone = {}
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					milestone.get(pId).success (getData)->
						$scope.milestones = getData
						$scope.loading = false
			else
				milestone.update($scope.milestone).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.milestone = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						milestone.get(pId).success (getData)->
							$scope.milestones = getData
							$scope.loading = false
					), 500
			

		$scope.deleteMilestone = (id)-> 
			$scope.loading = true
			milestone.destroy(id).success (data)->
				milestone.get(pId).success (getData)->
					$scope.milestones = getData
					$scope.loading = false
				angular.element('body').pgNotification(
					style: 'flip'
					message: 'Record deleted successfully.'
					position: 'top-right'
					timeout: 2000
					type: 'success').show()

		$scope.editMilestone = (id)->
			milestone.edit(id).success (data)->
				$scope.edit = true
				$scope.milestone = data
				angular.element('#addNewAppModal').modal('show')






