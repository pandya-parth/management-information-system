angular.module 'mis', [
		'angularUtils.directives.dirPagination', 'ui.bootstrap', 'cgPrompt'	
	]

	.config (paginationTemplateProvider, $locationProvider)->
		paginationTemplateProvider.setPath('../html/dirPagination.tpl.html')
		$locationProvider.html5Mode(true)
