angular.module 'mis', [
		'angularUtils.directives.dirPagination', 'ui.bootstrap', 'cgPrompt', 'angular-country-select', 'ng-bootstrap-datepicker'	
	]

	.config (paginationTemplateProvider)->
		paginationTemplateProvider.setPath('/html/dirPagination.tpl.html')
