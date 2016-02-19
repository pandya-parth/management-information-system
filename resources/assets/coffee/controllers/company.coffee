angular.module 'mis'

	.controller 'companyCtrl', ($scope, company, $timeout)->
		$scope.loading = true
		$scope.currentPage = 1
		$scope.pageSize = 5
		$scope.edit = false

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
						$scope.company.logo = file.name
					Error: (up, err)->
						alert "Error #" + err.code + ": " + err.message
			)
		uploader.init()

		angular.element('#addNewAppModal').on('shown.bs.modal', ->
				uploader.refresh()
			)
		
		company.get().success (data)->
			$scope.companies = data
			$scope.loading = false

		$scope.submit = (form)->
			$scope.loading = true
			$scope.submitted = true
			if form.$invalid
				$scope.loading = false
				return
			else
				$scope.loading = true

			if $scope.edit == false
				company.save($scope.company).success (data)->
					$scope.submitted = false
					$scope.company = {}
					angular.element('#addNewAppModal').modal('hide')
					angular.element('body').pgNotification(
						style: 'flip'
						message: 'Record saved successfully.'
						position: 'top-right'
						timeout: 2000
						type: 'success').show()

					company.get().success (getData)->
						$scope.companies = getData
						$scope.loading = false
			else
				company.update($scope.company).success (data)->
					$scope.submitted = false
					$scope.edit = false
					$scope.company = {}
					angular.element('#addNewAppModal').modal('hide')
					$timeout (->
						angular.element('body').pgNotification(
							style: 'flip'
							message: 'Record updated successfully.'
							position: 'top-right'
							timeout: 2000
							type: 'success').show()

						company.get().success (getData)->
							$scope.companies = getData
							$scope.loading = false
					), 500
			

		$scope.deleteCompany = (id)-> 
			$scope.loading = true
			company.destroy(id).success (data)->
				company.get().success (getData)->
					$scope.companies = getData
					$scope.loading = false
				angular.element('body').pgNotification(
					style: 'flip'
					message: 'Record deleted successfully.'
					position: 'top-right'
					timeout: 2000
					type: 'success').show()

		$scope.editCompany = (id)->
			company.edit(id).success (data)->
				$scope.edit = true
				$scope.company = data
				angular.element('#addNewAppModal').modal('show')






