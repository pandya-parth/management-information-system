angular.module 'mis'

	.controller 'PeopleCtrl', ($scope, PEOPLE, $timeout)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.pageSize = 5
		$scope.edit = false
		
		$scope.languages = []
		$scope.languages.push $scope.nativeLanguage

		$scope.addRow = ->
		  newLanguage = 
		    qualification: $scope.qualification
		    collage: $scope.collage
		    university: $scope.university
		  	$scope.languages.push newLanguage
		  	return

		$scope.deleteRow = (rowNo) ->
		  $scope.languages.splice rowNo, 1
		  return

		

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
								angular.element('#preview').html('<div id="fileadded" class="'+file.id+'"><div id="' + file.id + '"> <img src=tmp/' + file.name + ' class="img-thumbnail img-responsive img-circle" style="width:100px;height:100px;"> (' + plupload.formatSize(file.size) + ') <b></b><a href="javascript:;" id="' + file.id + '" class="removeFile" ng-click="shownoimage()">Remove</a></div></div>')
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
		

		PEOPLE.get().success (data)->
			$scope.peoples = data
			$scope.loading = false

		
			

		$scope.clearAll = ->
			angular.element('#addNewAppModal').modal('hide')
			$timeout (->
				angular.element('#filelist').clear();
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
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					PEOPLE.get().success (getData)->
						$scope.peoples = getData
						$scope.loading = false
			else
				PEOPLE.update($scope.people_array).success (data)->
					console.log data
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

						PEOPLE.get().success (getData)->
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
				$scope.people_array = data
				angular.element('#addNewAppModal').modal('show')
