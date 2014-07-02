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
		// Set html5 mode of location provider to true (URL's worn't start with hashtag (#) anymore)
		$locationProvider.html5Mode(true);

		// Routing to correct templates
		$routeProvider.
		when('/project', {
			// Route to template
			templateUrl: 'views/project.html',
			// Name of controller (see /admin/js/controllers/project.js)
			controller: 'ProjectCtrl'
		}).
		when('/page', {
			// Route to template
			templateUrl: 'views/page.html',
			// Name of controller (see /admin/js/controllers/page.js)
			controller: 'PageCtrl'
		}).
		when('/social_media', {
			// Route to template
			templateUrl: 'views/social_media.html',
			// Name of controller (see /admin/js/controllers/social_media.js)
			controller: 'SocialMediaCtrl'
		}).
		// If URL doesn't match
		otherwise({
			// Redirect to project
			redirectTo: 'project'
		});
	}
]);
