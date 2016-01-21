angular.module 'app'

  .config ($interpolateProvider)->
    $interpolateProvider.startSymbol '{%'
    $interpolateProvider.endSymbol '%}'