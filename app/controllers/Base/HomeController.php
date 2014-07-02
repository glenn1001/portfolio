<?php

namespace Base;

class HomeController extends Controller {

	public function index() {
		$data = array();

		return View::make('home.index', $data);
	}

}
