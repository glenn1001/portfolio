<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', '\Base\HomeController@index');
Route::get('/{model}', '\API\Controller@getCollection');
Route::get('/{model}/{id}', '\API\Controller@get');
Route::post('/{model}', '\API\Controller@post');
Route::patch('/{model}/{id}', '\API\Controller@patch');
Route::delete('/{model}', '\API\Controller@delete');
Route::delete('/{model}/{id}', '\API\Controller@delete');
Route::options('/{model}', '\API\Controller@options');
Route::options('/{model}/{id}', '\API\Controller@options');
