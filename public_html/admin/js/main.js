'use strict';

// Set URL to webservice
var WS_HOST = 'http://new.glennblom.nl/';

// Set variable for angular app
var portfolioApp = angular.module('portfolioApp', ['ngRoute', 'ngResource']);

// Config for app
portfolioApp.config([
	'$routeProvider',
	'$locationProvider',
	function($routeProvider, $locationProvider) {
		// 
		$locationProvider.html5Mode(true);

		// Routing to correct templates
		$routeProvider.
		when('/project', {
			templateUrl: 'views/project.html',
			controller: 'ProjectCtrl'
		}).
		when('/page', {
			templateUrl: 'views/page.html',
			controller: 'PageCtrl'
		}).
		when('/social_media', {
			templateUrl: 'views/social_media.html',
			controller: 'SocialMediaCtrl'
		}).
		otherwise({
			redirectTo: 'project'
		});
	}
]);
