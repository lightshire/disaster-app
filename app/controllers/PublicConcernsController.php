<?php

class PublicConcernsController extends BaseController {

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
				'name' 		=> 'required',
				'town_id'	=> 'required|exists:towns,id',
				'message' 	=> 'required',
				'image' 	=> 'mimes:jpeg,png,bmp'
			);
		$validation = Validator::make($input, $rules);

		if($validation->fails()) {
			$result = array(
					'message' 	=> 'An error has occured. Please try to submit your concern again',
					'type' 		=> 'danger',
					'for' 		=> 'concerns-create'
				);
		}else {
			$concerns = new Concern;
			$concerns->full_name 	= $input['name'];
			$concerns->message 		= $input['message'];
			$concerns->town_id 		= $input['town_id'];
			$concerns->save();

			if(Input::hasFile('image')) {
				$newFileName = date("U")."_concern_".Input::file('image')->getClientOriginalName();
				$destination = public_path()."/concerns/";

				if(!file_exists($destination)) {
					mkdir($destination, 0777);
				}

				Input::file('image')->move($destination, $newFileName);
				$concerns->image_url =  $newFileName;
				$concerns->save();
			}

			$result = array(
					'message' 		=> 'you have successfully uploaded your public concern. Thank you!',
					'type' 			=> 'success',
					'for' 			=> 'concerns-create'
 				);
		}

		return Redirect::to('/')->with($result);
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