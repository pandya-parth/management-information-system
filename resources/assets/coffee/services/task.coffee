angular.module 'mis'

	.factory 'task', ($http)->
		return{
			get:(pId)->
				$http.get '/api/tasks', params: project_id: pId

			getCat:->
				$http.get '/api/task-categories'

			save: (formData)->
				$http
					method: 'POST'
					url: '/projects/'+ formData.id + '/tasks'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			edit: (id,pId)->
				$http.get '/api/task/'+id, params: project_id: pId

			update: (formData,id)->
				$http
					method: 'PUT'
					url: '/projects/'+ formData.project_id + '/tasks/' + formData.id
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			destroy: (pId,id)->
				$http.delete('/projects/'+ pId + '/tasks/' + id)
		}