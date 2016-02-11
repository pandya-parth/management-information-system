angular.module 'mis'

	.factory 'milestone', ($http)->
		return{
			get: ->
				$http.get '/api/milestones'

			save: (formData)->
				$http
					method: 'POST'
					url: '/milestones'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			edit: (id)->
				$http.get '/api/milestone/'+id

			update: (formData)->
				$http
					method: 'PUT'
					url: '/milestones/'+formData.id
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)
					

			destroy: (id)->
				$http.delete('/milestones/' + id)
		}