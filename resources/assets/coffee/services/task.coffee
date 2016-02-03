angular.module 'mis'

	.factory 'task', ($http)->
		return{
			get:->
				$http.get '/api/projects.tasks'

			save: (formData)->
				$http
					method: 'POST'
					url: '/tasks'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			edit: (id)->
				$http.get '/api/projects.task'+id

			update: (formData)->
				$http
					method: 'PUT'
					url: '/projects.tasks/'+formData.id
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			destroy: (id)->
				$http.delete('/projects.tasks/' + id)
		}