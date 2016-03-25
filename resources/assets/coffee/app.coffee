angular.module 'mis', [
		'angularUtils.directives.dirPagination', 'ui.bootstrap', 'cgPrompt', 'angular-country-select','angular.filter'
	]

	.config (paginationTemplateProvider)->
		paginationTemplateProvider.setPath('/html/dirPagination.tpl.html')
