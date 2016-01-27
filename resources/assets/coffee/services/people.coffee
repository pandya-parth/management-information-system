angular.module 'mis'

	.factory 'PEOPLE', ($http)->
		return{
			get: ->
				$http.get '/api/people'

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