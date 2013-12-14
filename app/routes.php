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

Route::get('/', 'HomeController@showWelcome');
Route::get('ui', function () {
	return View::make('ui_form', array('url' => URL::to('')));
});
// Route::get('/reg', 'HomeController@showForm');
// Route::post('doit', array('uses' => 'HomeController@showSubmit'));
// ^ change into
Route::controller('reg', 'RegisterController');


//Define the Service Controller, for getProvince, getAmphur, and getTambol rESTful style
Route::controller('service', 'ServiceController');

Route::controller('redir', 'RedirController');

Route::controller('print', 'PrintController');