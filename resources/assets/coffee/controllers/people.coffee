angular.module 'mis'

	.controller 'PeopleCtrl', ($scope, PEOPLE, $timeout,prompt,$window)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.pageSize = 5
		$scope.edit = false
		currentUrl = $window.location.href
		pId = currentUrl.split('/')[4]||"Undefined"
		$scope.educations = [
			qualification: ''
			collage: ''
			university: ''
			passing_year: ''
			percentage: ''
		]

		$scope.newItem = ($event) ->
			$scope.educations.push(
				qualification: ''
				collage: ''
				university: ''
				passing_year: ''
				percentage: ''
			)
			$event.preventDefault()

		uploader = new (plupload.Uploader)(
				runtimes : 'html5,flash,silverlight,html4'
				browse_button : 'pickfiles'
				url : "../plupload/upload.php "
				flash_swf_url : "../plupload/Moxie.swf "
				silverlight_xap_url : "../plupload/Moxie.xap "
				multi_selection: false,
				init:
					PostInit: ->
						angular.element('#filelist').innerHTML = ''
					FilesAdded: (up, files)->
						angular.forEach(files, (file)->
								
								angular.element('#preview').html('<div id="fileadded" class="'+file.id+'"><div id="' + file.id + '"> <img src=tmp/' + file.name + ' class="img-thumbnail img-responsive img-circle" style="width:100px;height:100px;"> (' + plupload.formatSize(file.size) + ') <b></b><a href="javascript:;" id="' + file.id + '" class="removeFile" ng-click="shownoimage()" >Remove</a></div></div>')
								angular.element('a#' + file.id).on 'click', ->
								   up.removeFile file
								   angular.element('.' + file.id).hide()
								   return
							)
						uploader.start()
					UploadProgress: (up, file)->
						$scope.people_array.photo = file.name
					Error: (up, err)->
						alert "Error #" + err.code + ": " + err.message
				)
		uploader.init()

		angular.element('#addNewAppModal').on('shown.bs.modal', ->
				uploader.refresh()
			)
		
		PEOPLE.get(pId).success (data)->
			$scope.peoples = data
			$scope.loading = false

		$scope.cancelAll = ->
			angular.element('#addNewAppModal').modal('hide')
			$timeout (->
				$scope.submitted = false
				$scope.edit = false
				$scope.people_array = {}
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
					$scope.people_array = {}					
				)
			else
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

				PEOPLE.save($scope.people_array).success (data)->
					$scope.submitted = false
					$scope.people_array = {}
					myEl = angular.element(document.querySelector('#fileadded'))
					myEl.remove()
					angular.element('#preview').html("<img src='img/noPhoto.png'  style='height:100px;width:100px;'>")
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					PEOPLE.get(pId).success (getData)->
						$scope.peoples = getData
						$scope.loading = false
			else
				PEOPLE.update($scope.people_array).success (data)->
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

						PEOPLE.get(pId).success (getData)->
							$scope.peoples = getData
							$scope.loading = false
					), 500


		$scope.submitPeople = (form)->
			$scope.loading = true
			$scope.submitted = true
			if form.$invalid
				$scope.loading = false
				return
			else
				$scope.loading = true

			if $scope.edit == false
				PEOPLE.addPeople($scope.project_people).success (data)->
					$scope.submitted = false
					$scope.project_people = {}
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					PEOPLE.getProjectPeople(pId).success (getData)->
						$scope.project_peoples = getData
						$scope.loading = false
			else
				PEOPLE.updatePeople($scope.project_people).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.project_people = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						PEOPLE.getProjectPeople(pId).success (getData)->
							$scope.project_peoples = getData
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
