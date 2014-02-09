<?php

class DashboardTownsController extends \BaseController {

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
				'town_name' 	=> 'required',
				'city_id' 	=> 'required|exists:cities,id'
			);

		$validation = Validator::make($input, $rules);
		if($validation->fails()) {
			$result = array(
					'message' 	=> 'Please complete all the required fields',
					'type' 		=> 'danger',
					'for' 		=> 'towns-create'
				);
		}else {
			$town = new Town;
			$town->city_id 		= $input['city_id'];
			$town->town_name 	= $input['town_name'];
			$town->save();

			$result = array(
					'message' 	=> 'you have successfully added a new barangay',
					'type' 		=> 'success',
					'for' 		=> 'towns-create'
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
	}

}