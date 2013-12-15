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

//Route::get('/', 'HomeController@showWelcome');
Route::get('ui', function () {
	return View::make('ui_form', array('url' => URL::to('')));
});
//==========================================================
//All the controllers
//==========================================================
//Step 2: fill in the blanks.
Route::when('reg/confirm', 'credential');
Route::controller('reg', 'RegisterController');
//Step 3: print and send the message to us. (Require auth.)
//Add: users can login and return their works. (for those disconnected.)
Route::when('print', 'auth');
Route::when('print/pdf', 'auth');
Route::when('print/return', 'auth.pass');
Route::controller('print', 'PrintController');
//Define the Service Controller, for getProvince, getAmphur, and getTambol rESTful style
Route::controller('service', 'ServiceController');
//Redir use only for redirection.
Route::controller('redir', 'RedirController');
//Step 1: agreements. (Declare the last, prevent ambiguous.)
Route::controller('', 'CoverController');
