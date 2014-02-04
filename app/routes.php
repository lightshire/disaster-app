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

Route::get('test', function() {
	 $searched = Report::searchAll(Input::get('q'), Input::get('town_id'));
});

Route::group(array('before'=>'non-authed'), function()
{
	Route::controller('login','LoginController');
});

Route::group(array('before'=>'auth', 'prefix'=>'dashboard'), function()
{

	Route::group(array('before'=>'system'), function()
	{
		Route::resource('users','DashboardUsersController');

		Route::group(array('prefix'=>'settings'), function()
		{
			Route::resource('regions','DashboardRegionsController');
			Route::resource('provinces','DashboardProvincesController');
			Route::resource('towns', 'DashboardTownsController');
			Route::resource('disasters', 'DashboardDisastersController');
		});
	});
	

	Route::group(array('before'=>'barangay'), function()
	{
		Route::resource('concerns', 'DashboardConcernsController');
		Route::resource('b/reports','BarangayReportsController');
	});
	Route::controller('/', 'DashboardController');
});


Route::get('/api/towns/{id}', function($id) 
{
	$province = Province::find($id);
	return $province->towns;
});

Route::group(array('prefix'=>'public'), function()
{
	Route::resource('concerns','PublicConcernsController');	
});



Route::controller('/','IndexController');

