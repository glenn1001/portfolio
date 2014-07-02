'use strict';

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
