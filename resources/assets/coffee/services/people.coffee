angular.module 'mis'

	.factory 'PEOPLE', ($http)->
		return{
			get: ->
				$http.get '/api/people'

			getPeople: (formData) ->
				$http.get '/project/' + formData.id + '/people'

			save: (formData)->
				$http
					method: 'POST'
					url: '/people'
					headers: {'Content-Type': 'application/x-www-form-urlencoded'}
					data: $.param(formData)

			addPeople: (formData)->
				$http
					method: 'POST'
					url: '/project/' + formData.id + '/people'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)


			edit: (id)->
				$http.get '/api/people/'+id

			update: (formData)->
				$http
					method: 'PUT'
					url: '/people/'+formData.id
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			updatePeople: (formData,id)->
				$http
					method: 'PUT'
					url: '/project/'+ formData.id + '/people/' + formData.id
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			destroy: (id)->
				$http.delete('/people/' + id)

		
		}