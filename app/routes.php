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


Route::group(array('before'=>'non-authed'), function()
{
	Route::controller('login','LoginController');
});

Route::group(array('before'=>'auth', 'prefix'=>'dashboard'), function()
{

	Route::group(array('before'=>'system'), function()
	{
		Route::controller('users','DashboardUsersController');
	});
	
	Route::controller('/', 'DashboardController');
});




Route::controller('/','IndexController');