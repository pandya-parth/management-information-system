angular.module 'mis', [
		'angularUtils.directives.dirPagination', 'ui.bootstrap', 'cgPrompt', 'angular-country-select'	
	]

	.config (paginationTemplateProvider)->
		paginationTemplateProvider.setPath('/html/dirPagination.tpl.html')
