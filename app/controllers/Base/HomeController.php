<?php

namespace Base;

class HomeController extends Controller {

	public function index() {
		return View::make('home.index');
	}

}
