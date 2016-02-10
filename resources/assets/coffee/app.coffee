angular.module 'mis', [
		'angularUtils.directives.dirPagination', 'ui.bootstrap', 'cgPrompt'	
	]

	.config (paginationTemplateProvider)->
		paginationTemplateProvider.setPath('/html/dirPagination.tpl.html')

	.directive 'selectLast', ->
		{
	  	  	restrict: 'A'
	    	transclude: true
	    	templateUrl: '/html/language.html'
	    	replace: true
	   	}
  	
