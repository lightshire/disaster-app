<?php

class DashboardCitiesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input = Input::all();
		$rules = array(
				'city_name' 	=> 'required',
				'province_id' 	=> 'required|exists:provinces,id'
			);

		$validation = Validator::make($input, $rules);

		if($validation->fails()) {
			$result = array(
					'message' 	=> 'Please complete all fields to continue',
					'type' 		=> 'danger',
					'for' 		=> 'cities-create',
				);
		}else {
			$city = new City;
			$city->city_name 	= $input['city_name'];
			$city->province_id 	= $input["province_id"];
			$city->save();

			$result = array(
					'message' 	=> 'you have successfully saved a new city!',
					'type' 		=> 'success',
					'for' 		=> 'cities-create'
				); 
		}

		return Redirect::to($input["_redirect"])->with($result);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//

		$city = City::find($id);

		if(!$city) {
			return Redirect::to('/');
		}

		return View::make('dashboard.settings.cities.show')->with('city', $city);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$city = City::find($id);

		if(!$city) {
			return Redirect::to("/");
		}

		$input = Input::all();
		$rules = array(
				'city_name' 	=> 'required'
			);

		$validation = Validator::make($input, $rules);

		if($validation->fails()) {
			$result = array(
					'message' 		=> 'Please complete all fields',
					'type' 			=> 'danger',
					'for' 			=> 'cities-update'
				);
		}else {
			$city->city_name = $input["city_name"];
			$city->save();

			$result = array(
					'message' 	=> 'You have successfully updated a  city',
					'type' 		=> 'success',
					'for' 		=> 'cities-update'
				);
		}

		return Redirect::to('dashboard/settings/cities/'.$id)->with($result);
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//

		$city = City::find($id);
		$province_id = $city->province_id;
		if(!$city) {
			$result = array(
					'message' 		=> 'An error has occured. City not found',
					'type' 			=> 'danger',
					'for' 			=> 'cities-delete'
				);
		}else {
			$city->delete();

			$result = array(
					'message' 		=> 'You have successfully deleted a city',
					'type' 			=> 'success',
					'for' 			=> 'cities-delete'
				);
		}

		return Redirect::to('dashboard/settings/provinces/'.$province_id)->with($result);
	}

}