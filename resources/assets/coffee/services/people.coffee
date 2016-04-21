angular.module 'mis'

	.factory 'PEOPLE', ($http)->
		return{
			get: ->
				$http.get '/api/people'

			save: (formData, educations, experiences)->
				$http
					method: 'POST'
					url: '/people'
					headers: {'Content-Type': 'application/x-www-form-urlencoded'}
					data: $.param(
						user_detail:formData 
						educations: educations
						experiences: experiences
						)

			getProjectPeople: (id)->
				$http.get '/api/project-people/'+id

			addPeopleToProject: (users,project_id)->
				$http
					method: 'POST'
					url: '/add-people-to-project'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(
						users: users
						project_id: project_id
						)


			edit: (id)->
				$http.get '/api/people/'+id

			update: (formData, educations, experiences)->
				$http
					method: 'PUT'
					url: '/people/'+formData.id
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(
						user_detail:formData 
						educations: educations
						experiences: experiences
						)

			destroy: (id)->
				$http.delete('/people/' + id)

			destroyEducation: (id)->
				$http.delete('/education/' + id)

			destroyExperience: (id)->
				$http.delete('/experience/' + id)

			

			
		}