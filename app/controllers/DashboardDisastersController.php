<?php

class DashboardDisastersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return Redirect::to('dashboard/settings/disasters/create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('dashboard.settings.disasters.index');
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
				'disaster_name' 	=> 'required|unique:disasters,disaster_type'
			);
		$result = array();

		$validation = Validator::make($input, $rules);

		if($validation->fails()) {
			$result = array(
					'message' 	=> 'An error occured',
					'type' 		=> 'danger',
					'for'		=> 'disasters-create'
				);
		}else {
			$disaster = new Disaster;
			$disaster->disaster_type = $input['disaster_name'];
			$disaster->save();

			$result = array(
					'message' 	=> 'You have successfully added a disaster type',
					'type' 		=> 'success',
					'for' 		=> 'disasters-create'
				);
		}

		return Redirect::to('/dashboard/settings/disasters/create')->with($result);
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