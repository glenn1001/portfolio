'use strict';

// Navigation controller
portfolioApp.controller('NavCtrl', [
	'$scope',
	'$location',
	function($scope, $location) {
		$scope.checkActive = function(path) {
			if ($location.path().substr(0, path.length) == path) {
				return "active"
			} else {
				return ""
			}
		}
	}
]);