<?php

class DashboardProvincesController extends \BaseController {

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
				'province_name' => 'required',
				'region_id' 	=> 'required|exists:regions,id'
			);
		$validation = Validator::make($input, $rules);

		if($validation->fails()) {
			$result = array(
					'message' 	=> 'Please complete all fields',
					'type' 		=> 'danger',
					'for' 		=> 'provinces-create'
				);
			return Redirect::to($input["_redirect"])->with($result);
		}else {
			$province = new Province;
			$province->region_id 		= $input['region_id'];
			$province->province_name	= $input['province_name'];
			$province->save();


			$result = array(
					'message' 	=> 'you have successfully saved a new province',
					'type' 		=> 'success',
					'for' 		=> 'provinces-create'
				);
		}

		return Redirect::to($input['_redirect'])->with($result);
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
		$province = Province::find($id);

		if(!$province) {
			return Redirect::to('/');
		}

		return View::make('dashboard.settings.provinces.show')->with('province', $province);
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

		$province = Province::find($id);

		if(!$province) {
			return Redirect::to('/');
		}else {
			$input = Input::all();
			$rules = array(
					'province_name' 		=> 'required'
				);

			$validation = Validator::make($input, $rules);
			if($validation->fails()) {
				$result = array(
						'message' 	=> 'Please complete all fields',
						'type' 		=> 'danger',
						'for' 		=> 'provinces-update'
					);
			}else {
				$province->province_name = $input["province_name"];
				$province->save();

				$result = array(
						'message' 	=> 'You have successfully updated a province',
						'type' 		=> 'success',
						'for' 		=> 'provinces-update'
					);
			}

			return Redirect::to('dashboard/settings/provinces/'.$id)->with($result);
		}
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

		$user = Province::find($id);
		$reg_id = $user->region_id;
		if(!$user) {
			$result = array(
					'message' 	=> 'An error has occured. The User is not found',
					'type'		=> 'danger',
					'for' 		=> 'provinces-delete'
				);
		}else {
			$user->delete();

			$result = array(
					'message' 	=> 'You have successfully deleted the region',
					'type' 		=> 'success',
					'for' 		=> 'provinces-delete'
 				);
		}

		return Redirect::to('dashboard/settings/regions/'.$reg_id)->with($result);
	}

}