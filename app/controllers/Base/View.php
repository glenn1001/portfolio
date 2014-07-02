<?php

namespace Base;

class View extends \View {

	public static function make($view, $data = array(), $model = 'data') {
		$format = self::getFormat();

		switch ($format) {
			case 'json':
				return \Response::json($data, '200', array('Access-Control-Allow-Origin' => '*'))->setCallback(\Input::get('callback'));
				break;

			case 'xml':
				$view = $format . '.' . $view;
				$response = \Response::make(parent::make($view, array($model => $data)));
				$response->header('Content-Type', 'application/xml');
				return $response;
				break;
			
			default:
				$view = $format . '.' . $view;
				return parent::make($view, array($model => $data));
				break;
		}
	}

	private static function getFormat() {
		$format = \Input::get('format', self::getFormatFromHeader());

		switch ($format) {
			case 'json':
				return 'json';
				break;

			case 'xml':
				return 'xml';
				break;

			default:
				return 'html';
				break;
		}
	}

	private static function getFormatFromHeader() {
		$formats = explode(',', strtolower($_SERVER['HTTP_ACCEPT']));

		switch ($formats[0]) {
			case 'application/json':
			case 'text/json':
				return 'json';
				break;

			case 'application/xml':
			case 'text/xml':
				return 'xml';
				break;

			default:
				return 'html';
				break;
		}
	}

}