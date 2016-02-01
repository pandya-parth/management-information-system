angular.module 'mis', [
		'angularUtils.directives.dirPagination', 'ui.bootstrap', 'cgPrompt'	
	]

	.config (paginationTemplateProvider)->
		paginationTemplateProvider.setPath('../html/dirPagination.tpl.html')
