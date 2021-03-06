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
			Route::resource('cities', 'DashboardCitiesController');
			Route::resource('towns', 'DashboardTownsController');
			Route::resource('disasters', 'DashboardDisastersController');
			Route::controller('uploads', 'DashboardUploadsController');
		});
	});
	

	Route::group(array('before'=>'barangay'), function()
	{
		Route::resource('concerns', 'DashboardConcernsController');
		Route::resource('b/reports','BarangayReportsController');
		Route::resource('infras', 'DashboardInfrasController');
		Route::get('attend-to/{id}', function($id)
		{
			$concerns = Concern::find($id);
			if(!$concerns) {
				return Redirect::to('/');
			}else {
				$concerns->is_attended = true;
				$concerns->save();
			}
			return Redirect::to(URL::previous());
		});
		// Route::resource();
	});

	Route::group(array('before'=>'provincial'), function()
	{
		Route::group(array('prefix'=>'p'), function()
		{
			Route::resource('reports','ProvincialReportsController');
			Route::resource('backtracks', 'ProvincialBacktracksController');
			Route::get('accept/{id}', function($id)
			{
				$report = Report::find($id);
				// $newReport = $report->replicate();
				if(!$report) {
					return Redirect::to('/');
				}

				$report->status = "in-province";
				$report->save();

				return Redirect::to(URL::previous());
			});
		});
		
	});
	Route::controller('/', 'DashboardController');
});


Route::get('/api/towns/{id}', function($id) 
{
	$province = City::find($id);
	return $province->towns;
});

Route::get('/api/cities/{id}', function($id) 
{
	$province = Province::find($id);
	return $province->cities;
});

Route::get('/api/reports/{id}', function($id)
{
	$report = Report::with('infrastructures')->find($id);
	return $report;	
});

Route::delete('/api/reports/infra/{id}', function($id) {
	$infra 	= DB::table('infrastructure_report')->where('infrastructure_id', $id)->delete();
	$result = array();
	if(!$infra) {
		$result["success"] = true;
	}
	

	$result["success"] = true;

	return $result;
});

Route::get('api/infras/{id}/{infra_type}', function($id, $infra_type) {
	$town = Town::find($id);
	if(!$town) {
		return array();
	}else {
		$keyword 	= Input::get('keyword');
		$infras		= Infrastructure::where('infra_type',$infra_type)->where('infra_name','like','%'.$keyword.'%')->get();
		$result 	= array();

		foreach($infras as $infra) {
			$result[] = $infra->infra_name;
		}
		return $result;	
	}
});

Route::group(array('prefix'=>'public'), function()
{
	Route::resource('concerns','PublicConcernsController');	
});



Route::controller('/','IndexController');

