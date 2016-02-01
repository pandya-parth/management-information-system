angular.module 'mis'

	.factory 'company', ($http)->
		return{
			get: ->
				$http.get '/api/companies'

			save: (formData)->
				$http
					method: 'POST'
					url: '/companies'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			edit: (id)->
				$http.get '/api/company/'+id

			update: (formData)->
				$http
					method: 'PUT'
					url: '/companies/'+formData.id
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)
					

			destroy: (id)->
				$http.delete('/companies/' + id)
		}