angular.module 'mis'

	.factory 'projectCategory', ($http)->
		return{
			get: ->
				$http.get '/projectCategories'

			save: (formData)->
				$http
					method: 'POST'
					url: '/project-categories'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			edit: (id)->
				$http.get('/project-categories/' + id +'/edit')

			destroy: (id)->
				$http.delete('/project-categories/' + id)
		}
	
	.factory 'taskCategory', ($http)->
		return{
			get:->
				$http.get '/taskCategories'

			save: (formData)->
				$http
					method: 'POST'
					url: '/task-categories'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)
			destroy: (id)->
				$http.delete('/task-categories/' + id)

		}


	.factory 'PEOPLE', ($http)->
		return{
			get: ->
				$http.get '/People'

			save: (formData)->
				$http
					method: 'POST'
					url: '/people'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			edit: (id)->
				$http.get('/people/' + id +'/edit')

			destroy: (id)->
				$http.delete('/people/' + id)
		}
