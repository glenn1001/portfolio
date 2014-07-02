'use strict';

// Page controller (for viewing all pages, creating new pages, updating and deleting existing pages)
portfolioApp.controller('PageCtrl', [
	'$scope',
	'Page',
	function($scope, Page) {
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
