angular.module 'mis'

	.factory 'PROJECT', ($http)->
		return{
			get: ->
				$http.get '/api/projects'

			save: (formData)->
				$http
					method: 'POST'
					url: '/projects'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			edit: (id)->
				$http.get '/api/projects/'+id

			update: (formData)->
				$http
					method: 'PUT'
					url: '/projects/'+formData.id
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			destroy: (id)->
				$http.delete('/projects/' + id)
		}