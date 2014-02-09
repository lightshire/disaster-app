<?php

class DashboardUsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		// return View::make('dashboard.users.index');
		return Redirect::to('dashboard/users/create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('dashboard.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input 	= Input::all();
		$result = array();
		$rules 	= array(
				'email' 	=> 'required|unique:users,email',
				'password_1' 	=> 'required',
				'password_2'=> 'required|same:password_1',
				'group_id' 	=> 'required|exists:groups,id',
				'first_name'=> 'required',
				'last_name' => 'required'
			);

		$validation = Validator::make($input, $rules);
		if($validation->fails()) {
			$result = array(
					'message' 	=> 'Please complete all fields',
					'type' 	 	=> 'danger',
					'for' 		=> 'users-create'
				);
		}else {
			try{
				$user = Sentry::createUser(array(
						'email' 		=> $input["email"],
						'password' 		=> $input["password_1"],
						'first_name'	=> $input["first_name"],
						'last_name' 	=> $input['last_name'],
						'activated' 	=> true
					));
				$group = Sentry::findGroupById($input["group_id"]);
				$user->addGroup($group); 
			
				$result = array(
						'message' 	=> 'You have successfully added a user',
						'type' 		=> 'success',
						'for' 		=> 'users-create' 
					);
			}catch(Exception $exs) {

				$result = array(
					'message' 	=> 'Please complete all fields. System Error Occured!',
					'type' 	 	=> 'danger',
					'for' 		=> 'users-create'
				);
			}
		}
		
		return Redirect::to('/dashboard/users/create')->with($result);

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
		$user = User::find($id);

		if(!$user) {
			return Redirect::to('/dashboard/users/create');
		}

		return View::make('dashboard.users.show')->with('user', $user);
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
		$user = User::find($id);
		if(!$user) {
			return Redirect::to('/dashboard/users/create');
		}else {
			$input = Input::all();
			$rules = array(
					'first_name' 	=> 'required',
					'last_name' 	=> 'required'
				);
			$validation = Validator::make($input, $rules);
			if($validation->fails()) {
				$result = array(
						'message' 	=> 'Please complete all fields',
						'type' 		=> 'danger',
						'for' 		=>'users-update'
					);
			}else {
				$user->first_name = $input["first_name"];
				$user->last_name  = $input["last_name"];
				$user->save();

				$result = array(
						'message' 	=> 'You have successfully updated a user',
						'type' 		=> 'success',
						'for' 		=> 'users-update'
					);
			}

			return Redirect::to('/dashboard/users/'.$id)->with($result);

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
	}

}