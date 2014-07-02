'use strict';

// SocialMedia controller (for viewing all socialMedias, creating new socialMedias, updating and deleting existing socialMedias)
portfolioApp.controller('SocialMediaCtrl', [
	'$scope',
	'SocialMedia',
	function($scope, SocialMedia) {
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
