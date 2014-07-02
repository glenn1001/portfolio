'use strict';

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
