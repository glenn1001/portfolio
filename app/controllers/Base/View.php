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

				// Store model for page
				$data = array(
					$model => $data
				);

				// Get data for header/navigation
				$data['nav'] = (object) array(
					'projects' 	=> \Project::where('active', 1)->where('menu', 1)->orderBy('pos', 'DESC')->take(10)->get(),
					'pages' 	=> \Page::where('parent_id', 0)->where('active', 1)->where('menu', 1)->orderBy('pos', 'ASC')->take(10)->get()
				);

				// Get data for footer
				$data['footer'] = (object) array(
					'projects' 		=> \Project::where('active', 1)->orderBy('created_at', 'DESC')->take(10)->get(),
					'social_medias' => \SocialMedia::where('active', 1)->orderBy('pos', 'ASC')->take(10)->get()
				);

				return parent::make($view, $data);
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