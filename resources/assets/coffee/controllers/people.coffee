angular.module 'mis'
	.controller 'PeopleCtrl', ($scope, PEOPLE, $timeout,prompt,$window)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.edit = false

		currentUrl = $window.location.href
		pId = currentUrl.split('/')[4]||"Undefined"
		$scope.Pro_Id = pId
		$scope.educations = [
			qualification: ''
			collage: ''
			university: ''
			passing_year: ''
			percentage: ''
		]
		$scope.experiences = [
			company_name: ''
			from: ''
			to: ''
			salary: ''
			reason: ''
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

		$scope.nextItem = ($event) ->
			$scope.experiences.push(
				company_name: ''
				from: ''
				to: ''
				salary: ''
				reason: ''
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
					uploader.start()
				UploadProgress: (up, file)->
					$scope.people_array.photo = file.name				

				UploadComplete: (up, file)->
					$timeout (->
						angular.forEach(files, (file)->
							angular.element('#preview').html('<div id="fileadded" class="'+file.id+'"><div id="' + file.id + '"> <img src=tmp/' + file.name + ' class="img-thumbnail img-responsive img-circle" style="width:100px;height:100px;"> (' + plupload.formatSize(file.size) + ') <b></b><a href="javascript:;" id="' + file.id + '" class="removeFile" ng-click="shownoimage()" >Remove</a></div></div>')
							angular.element('a#' + file.id).on 'click', ->
								up.removeFile file
								angular.element('.' + file.id).hide()
								return
							)
					), 1000
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
		
		$scope.selected_users = []

		if pId != "Undefined"
			PEOPLE.getProjectPeople(pId).success (data)->
				$scope.selected_users = data

		$scope.toggleSelection = (user)->
			idx = $scope.selected_users.indexOf(user);
			if idx > -1
				$scope.selected_users.splice(idx, 1)
			else
				$scope.selected_users.push(user)

		$scope.addPeopleToProject = ()->
			PEOPLE.addPeopleToProject($scope.selected_users, $scope.Pro_Id).success (data)->
				angular.element('#addPeopleToProjectModal').modal('hide')
				PEOPLE.getProjectPeople(pId).success (res)->
					$scope.selected_users = res
				angular.element('body').pgNotification(
					style: 'flip'
					message: 'People added successfully.'
					position: 'top-right'
					timeout: 2000
					type: 'success').show()

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
					myEl = angular.element(document.querySelector('#fileadded'))
					myEl.remove()
					angular.element('#preview').html("<img src='img/noPhoto.png'  style='height:100px;width:100px;'>")
				)
			else
				angular.element('#addNewAppModal').modal('hide')
				$scope.educations = [
					qualification: ''
					collage: ''
					university: ''
					passing_year: ''
					percentage: ''
				]
				$scope.experiences = [
					company_name: ''
					from: ''
					to: ''
					salary: ''
					reason: ''
				]
				$timeout (->
					$scope.submitted = false
					$scope.edit = false
					$scope.people_array = {}
					myEl = angular.element(document.querySelector('#fileadded'))
					myEl.remove()
					angular.element('#preview').html("<img src='img/noPhoto.png'  style='height:100px;width:100px;'>")
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
				$scope.people_array = data[0]
				$scope.people_array.email = data[1]
				$scope.educations = data[2]
				$scope.experiences = data[3]
				angular.element('#addNewAppModal').modal('show')

		$scope.removeEducationClone = (education)->
			index = $scope.educations.indexOf(education); 
			$scope.educations.splice(index, 1)

		$scope.removeEducation = (education)->
			$scope.options =
				title: 'Remove Education'
				message:'Are you sure you want to delete this education detail?'
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

			prompt($scope.options).then( ->					
				PEOPLE.destroyEducation(education.id).success (data)->
					index = $scope.educations.indexOf(education); 
					$scope.educations.splice(index, 1)
					$scope.people_array.education = $scope.educations
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Education deleted successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()
			)

		$scope.removeExperience = (id)->
			$scope.options =
				title: 'Remove Experience'
				message:'Are you sure you want to delete this experience detail?'
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

			prompt($scope.options).then( ->					
				PEOPLE.destroyExperience(id).success (data)->
					index = $scope.experiences.indexOf(id);
					$scope.experiences.splice(index, 1)
					$scope.people_array.experience = $scope.experiences
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Experience deleted successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()
			)

		$scope.removeExperienceClone = (experience)->
			index = $scope.experiences.indexOf(experience); 
			$scope.experiences.splice(index, 1)
			 

		

		