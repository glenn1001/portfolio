'use strict';

// Set URL to webservice
var WS_HOST = 'http://new.glennblom.nl/';

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

// Project controller (for viewing all projects, creating new projects, updating and deleting existing projects)
portfolioApp.controller('ProjectCtrl', [
	'$scope',
	'$route',
	'Project',
	function($scope, $route, Project) {
		// Create new empty project (for form)
		$scope.project = new Project();

		// Get all projects
		$scope.projects = Project.query();

		// Reset form so you can create a new project
		$scope.newProject = function() {
			$scope.project = new Project();
			$scope.editing = false;
		}

		// Edit method for updating a project
		$scope.editProject = function(project) {
			$scope.project = project;
			$scope.editing = true;
		}

		// Store changes
		$scope.save = function(project) {
			// Check if project id is set
			if ($scope.project.id) {
				// Project id is set, so update the current project
				Project.update({_id: $scope.project.id}, $scope.project);
			} else {
				// Project id isn't set, so create a new project
				$scope.project.$save().then(function(response) {
					// Add response (new project) to the list of current projects
					$scope.projects.unshift(response)
				});
			}

			// Reset editing and form so a new post can be created
			$scope.editing = false;
			$scope.project = new Project();
		}

		// Delete project
		$scope.delete = function(project) {
			Project.delete(project)
			_.remove($scope.projects, project)
		}
	}
]);

// Create resource for project
portfolioApp.provider('Project', function() {
	this.$get = ['$resource', function($resource) {
		// Set location where project can be found
		var Project = $resource(WS_HOST + 'project/:_id', {}, {
			// Add update method (isn't supported by default)
			update: {
				method: 'PATCH'
			}
		});

		return Project;
	}];
});

// Page controller (for viewing all pages, creating new pages, updating and deleting existing pages)
portfolioApp.controller('PageCtrl', [
	'$scope',
	'$route',
	'Page',
	function($scope, $route, Page) {
		// Create new empty page (for form)
		$scope.page = new Page();

		// Get all pages
		$scope.pages = Page.query();

		// Reset form so you can create a new page
		$scope.newPage = function() {
			$scope.page = new Page();
			$scope.editing = false;
		}

		// Edit method for updating a page
		$scope.editPage = function(page) {
			$scope.page = page;
			$scope.editing = true;
		}

		// Store changes
		$scope.save = function(page) {
			// Check if page id is set
			if ($scope.page.id) {
				// Page id is set, so update the current page
				Page.update({_id: $scope.page.id}, $scope.page);
			} else {
				// Page id isn't set, so create a new page
				$scope.page.$save().then(function(response) {
					// Add response (new page) to the list of current pages
					$scope.pages.unshift(response)
				});
			}

			// Reset editing and form so a new post can be created
			$scope.editing = false;
			$scope.page = new Page();
		}

		// Delete page
		$scope.delete = function(page) {
			Page.delete(page)
			_.remove($scope.pages, page)
		}
	}
]);

// Create resource for page
portfolioApp.provider('Page', function() {
	this.$get = ['$resource', function($resource) {
		// Set location where page can be found
		var Page = $resource(WS_HOST + 'page/:_id', {}, {
			// Add update method (isn't supported by default)
			update: {
				method: 'PATCH'
			}
		});

		return Page;
	}];
});

// SocialMedia controller (for viewing all socialMedias, creating new socialMedias, updating and deleting existing socialMedias)
portfolioApp.controller('SocialMediaCtrl', [
	'$scope',
	'$route',
	'SocialMedia',
	function($scope, $route, SocialMedia) {
		// Create new empty socialMedia (for form)
		$scope.socialMedia = new SocialMedia();

		// Get all socialMedias
		$scope.socialMedias = SocialMedia.query();

		// Reset form so you can create a new socialMedia
		$scope.newSocialMedia = function() {
			$scope.socialMedia = new SocialMedia();
			$scope.editing = false;
		}

		// Edit method for updating a socialMedia
		$scope.editSocialMedia = function(socialMedia) {
			$scope.socialMedia = socialMedia;
			$scope.editing = true;
		}

		// Store changes
		$scope.save = function(socialMedia) {
			// Check if socialMedia id is set
			if ($scope.socialMedia.id) {
				// SocialMedia id is set, so update the current socialMedia
				SocialMedia.update({_id: $scope.socialMedia.id}, $scope.socialMedia);
			} else {
				// SocialMedia id isn't set, so create a new socialMedia
				$scope.socialMedia.$save().then(function(response) {
					// Add response (new socialMedia) to the list of current socialMedias
					$scope.socialMedias.unshift(response)
				});
			}

			// Reset editing and form so a new post can be created
			$scope.editing = false;
			$scope.socialMedia = new SocialMedia();
		}

		// Delete socialMedia
		$scope.delete = function(socialMedia) {
			SocialMedia.delete(socialMedia)
			_.remove($scope.socialMedias, socialMedia)
		}
	}
]);

// Create resource for socialMedia
portfolioApp.provider('SocialMedia', function() {
	this.$get = ['$resource', function($resource) {
		// Set location where socialMedia can be found
		var SocialMedia = $resource(WS_HOST + 'social_media/:_id', {}, {
			// Add update method (isn't supported by default)
			update: {
				method: 'PATCH'
			}
		});

		return SocialMedia;
	}];
});