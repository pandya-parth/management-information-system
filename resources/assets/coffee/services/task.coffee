angular.module 'mis'

	.factory 'task', ($http)->
		return{
			get:->
				$http.get '/api/tasks'

			save: (formData)->
				$http
					method: 'POST'
					url: '/projects/'+ formData.id + '/tasks'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			edit: (id)->
				$http.get '/api/task/'+id

			update: (formData,id)->
				$http
					method: 'PUT'
					url: '/projects/'+formData.id+ '/tasks/' + id
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			destroy: (id)->
				$http.delete('/projects/'+ id+ '/tasks/' + id)
		}