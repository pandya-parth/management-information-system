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
		