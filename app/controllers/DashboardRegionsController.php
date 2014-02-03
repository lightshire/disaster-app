<?php

class DashboardRegionsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return Redirect::to('dashboard/settings/regions/create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('dashboard.settings.regions.index');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input  = Input::all();
		$rules 	= array(
				'region' => 'required|unique:regions,region'
			);
		$validation = Validator::make($input, $rules);

		if($validation->fails()) {
			$result = array(
					'type' 		=> 	'danger',
					'for' 		=> 'regions-create',
					'message'	=> 'Region should not be blank or should have no duplicate'
				);
		}else {
			$region = new Region;
			$region->region = $input["region"];
			$region->save();

			$result = array(
					'type' 		=> 'success',
					'for' 		=> 'regions-create',
					'message' 	=> 'You ahve successfully added a region'
				);
		}

		return Redirect::to('/dashboard/settings/regions/create')->with($result);

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
		$user = Region::find($id);
		if(!$user) {
			$result = array(
					'message' 	=> 'An error has occured. The User is not found',
					'type'		=> 'danger',
					'for' 		=> 'regions-delete'
				);
		}else {
			$user->delete();

			$result = array(
					'message' 	=> 'You have successfully deleted the region',
					'type' 		=> 'success',
					'for' 		=> 'regions-delete'
 				);
		}

		return Redirect::to('dashboard/settings/regions/create')->with($result);
	}

}