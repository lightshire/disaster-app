<?php
	class LoginController extends BaseController
	{

		public function __construct()
		{
			$this->beforeFilter('csrf',array('on'=>'post|put|patch'));
		}

		public function getIndex()
		{
			return View::make('login.index');
		}

		public function getSignout()
		{
			Sentry::logout();

			return Redirect::to('/');
		}

		public function postIndex()
		{
			$input 			= Input::all();
			$credentials 	= array();
			$result 		= array();
			$rules 			= array(
								'email' 	=> 'required|exists:users,email',
								'password'	=> 'required'
							);

			$validation = Validator::make($input, $rules);

			if($validation->fails()) {
				$result["success"] = false;
				$result["message"] = array(
						'for' 		=> 'login',
						'type' 		=> 'danger',
						'message' 	=> '<i class="glyphicon glyphicon-warning-sign"></i>&nbsp;Username and Password either does not match, or is not in the database'
					);
			}else {
				$credentials["email"] 		= $input["email"];
				$credentials["password"]	= $input["password"];

				try {
					Sentry::authenticate($credentials, false);
					$result["success"] = true;
					$result["message"] = array(
							'for' 		=> 'login',
							'type' 		=> 'success',
							'message' 	=> '<i class="glyphicon glyphicon-ok"></i>&nbsp;The user is logged in'
						);
					$result["_redirect"] = URL::to('/dahboard');
				} catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
				  	$result["success"] = false;
					$result["message"] = array(
							'for' 		=> 'login',
							'type' 		=> 'danger',
							'message' 	=> '<i class="glyphicon glyphicon-warning-sign"></i>&nbsp;User was not found in the database'
						);
				} catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
				    $result["success"] = false;
					$result["message"] = array(
							'for' 		=> 'login',
							'type' 		=> 'danger',
							'message' 	=> '<i class="glyphicon glyphicon-warning-sign"></i>&nbsp;User is not activated and cannot be logged in'
						);
				} catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
				    $result["success"] = false;
					$result["message"] = array(
							'for' 		=> 'login',
							'type' 		=> 'danger',
							'message' 	=> '<i class="glyphicon glyphicon-warning-sign"></i>&nbsp;User is suspended and cannot be logged in'
						);
				} catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
				    $result["success"] = false;
					$result["message"] = array(
							'for' 		=> 'login',
							'type' 		=> 'danger',
							'message' 	=> '<i class="glyphicon glyphicon-warning-sign"></i>&nbsp;User is banned and cannot be logged in'
						);
				}
			}

			if(Request::ajax() 		||
				Request::wantsJson() 	||
				Request::isJson()	) {
				return $result;
			}else {
				if($result["success"]) {
					return Redirect::to('/dashboard')->with($result["message"]);
				}else {
					return Redirect::to('/login')->with($result["message"]);
				}
			}
		}
	}