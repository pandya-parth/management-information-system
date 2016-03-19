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

			show: (tId)->
				$http.get '/api/logtimes', params: task_id: tId

			savelog: (formData)->
				$http
					method: 'POST'
					url: '/logtimes'
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			edit: (id,pId)->
				$http.get '/api/task/'+id, params: project_id: pId

			editlog: (id,tId)->
				$http.get '/api/logtime/'+id, params: task_id: tId

			update: (formData,id)->
				$http
					method: 'PUT'
					url: '/projects/'+ formData.project_id + '/tasks/' + formData.id
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			updatelog: (formData,id)->
				$http
					method: 'PUT'
					url: '/logtimes/'+formData.id
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' }
					data: $.param(formData)

			destroy: (pId,id)->
				$http.delete('/projects/'+ pId + '/tasks/' + id)

			destroylog: (id)->
				$http.delete('/logtimes/' + id)
		}