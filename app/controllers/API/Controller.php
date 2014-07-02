<?php

namespace API;

use \Base\View as View;

class Controller extends \Base\Controller {

	public function getCollection($model) {
		$model = strtolower($model);
		$view = 'api.' . $model . '.index';
		
		$modelName = '\\';
		foreach (explode('_', $model) as $name) {
			$modelName .= ucfirst($name);
		}

		$newModel = new $modelName();
		$data = $newModel->orderBy('id', 'DESC')->get();

		return View::make($view, $data, $model . 's');
	}

	public function get($model, $id) {
		$model = strtolower($model);
		$view = 'api.' . $model . '.show';
		
		$modelName = '\\';
		foreach (explode('_', $model) as $name) {
			$modelName .= ucfirst($name);
		}

		$newModel = new $modelName();
		$data = $newModel->findOrFail($id);

		return View::make($view, $data, $model);
	}

	public function post($model) {
		$model = strtolower($model);
		$view = 'api.' . $model . '.show';
		
		$modelName = '\\';
		foreach (explode('_', $model) as $name) {
			$modelName .= ucfirst($name);
		}

		$newModel = new $modelName();
		
		// Get input
		$json = file_get_contents('php://input');
		
		// Place input into array for an insert
		$insert = array();
		foreach (json_decode($json) as $k => $v) {
			$insert[$k] = $v;
		}

		// Create new resource
		$data = $newModel->create($insert);

		return View::make($view, $data, $model);
	}

	public function patch($model, $id) {
		$model = strtolower($model);
		$view = 'api.' . $model . '.show';
		
		$modelName = '\\';
		foreach (explode('_', $model) as $name) {
			$modelName .= ucfirst($name);
		}

		// Get model
		$newModel = new $modelName();
		$newModel = $newModel->findOrFail($id);

		// Get input
		$json = file_get_contents('php://input');

		// Update model
		foreach (json_decode($json) as $k => $v) {
			$newModel->$k = $v;
		}

		// Save changes
		$newModel->save();

		return View::make($view, $newModel, $model);
	}

	public function delete($model, $id = null) {
		if ($id == null)
			$id = \Input::get('id');

		$model = strtolower($model);
		$view = 'api.' . $model . '.show';
		
		$modelName = '\\';
		foreach (explode('_', $model) as $name) {
			$modelName .= ucfirst($name);
		}

		// Get model
		$newModel = new $modelName();
		$newModel = $newModel->findOrFail($id);

		// Delete changes
		$data = (object) $newModel->toArray();
		$newModel->delete();

		return View::make($view, $data, $model);
	}

	public function options($model, $id = null) {
		return \Response::make(null, 200, array(
			'Access-Control-Allow-Origin' => '*',
			'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PATCH, DELETE',
			'Access-Control-Allow-Headers' => 'X-Requested-With, content-type'
		));
	}

}
