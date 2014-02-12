<?php

class BarangayReportsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return View::make('dashboard.b.reports.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('dashboard.b.reports.create');
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
		$input["town_id"] = Sentry::getUser()->location->town_id;

		$rules = array(
				'disaster_id' 			=> 'required|exists:disasters,id',
				'families_affected'		=> 'required',
				// 'infrastructure_type'	=> 'required',
				// 'cost' 					=> 'required',
				'description' 			=> 'required',
				'town_id'				=> 'required|exists:towns,id',
				'infra_ids' 			=> 'required'
			);

		$result = array();

		$validation = Validator::make($input, $rules);

		if($validation->fails()) {
			$result = array(
					'message' 	=> 'Please complete the fields required.',
					'type' 		=> 'danger',
					'for' 		=> 'reports-create'
				);
		}else {
			$reports = new Report;
			$reports->town_id 				= $input["town_id"];
			$reports->disaster_id 			= $input["disaster_id"];
			$reports->families_affected 	= $input["families_affected"];
			// $reports->cost 					= $input["cost"];
			$reports->description 			= $input["description"];
			$reports->status 				= "in-barangay";
			$reports->user_id 				= Sentry::getUser()->id;
			$reports->save();

			$infra_ids = json_decode($input["infra_ids"]);

			foreach($infra_ids as $inf) {

				$reports->infrastructures()->attach($inf->id,array(
						'is_passable' 	=> $inf->is_passable
					));
			}

			// $reports->infrastructures()->attach($infra_ids);

			$result = array(
					'message' 	=> 'You have successfuly added a new report',
					'type' 		=> 'success',
					'for' 		=> 'reports-create'
				);  
		}

		return Redirect::to('/dashboard/b/reports/create')->with($result);
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