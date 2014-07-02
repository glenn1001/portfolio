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

		return View::make($view, array($model . 's' => $data));
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

		return View::make($view, array($model => $data));
	}

}
