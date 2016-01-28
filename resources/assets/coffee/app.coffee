angular.module 'mis', ['angularUtils.directives.dirPagination']

	.config (paginationTemplateProvider)->
		paginationTemplateProvider.setPath('../html/dirPagination.tpl.html')
