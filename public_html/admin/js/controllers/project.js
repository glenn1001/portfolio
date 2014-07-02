'use strict';

// Project controller (for viewing all projects, creating new projects, updating and deleting existing projects)
portfolioApp.controller('ProjectCtrl', [
	'$scope',
	'Project',
	function($scope, Project) {
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
