(function() {
  angular.module('app', []);

}).call(this);

(function() {
  angular.module('app').config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('{%');
    return $interpolateProvider.endSymbol('%}');
  });

}).call(this);

(function() {
  angular.module('app').controller('BodyCtrl', function($scope) {
    return $scope.title = "Laravel 5";
  });

}).call(this);

//# sourceMappingURL=app.js.map
