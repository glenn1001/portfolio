'use strict';

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
