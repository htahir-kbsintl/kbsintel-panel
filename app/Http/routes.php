<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*api routes */
Route::get('get_register_user/{day}','ApiController@get_registered_user');
Route::get('get_sale_data/{day}','ApiController@get_sale_data');
Route::get('get_downloads/{day}','ApiController@get_all_mobile_downloads');
/*end api routes*/

/* admin routes*/
Route::get('get_response/','GetAjaxResponseController@index');
/*end admin routes*/


