angular.module 'mis'

	.factory 'taskCategory', ($http)->
		return{
			get:->
				$http.get '/api/task-categories'

			save: (formData)->
				$http
					method: 'POST'
					url: '/task-categories'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)
			destroy: (id)->
				$http.delete('/task-categories/' + id)

		}