<?php
	class Infrastructure extends Eloquent
	{
		public $timestamps 	= false;
		public $softDeletes = false;
		
		public function Report()
		{
			return $this->belongsToMany('Report')->withPivot('is_passable');
		}

		public static function createInstance($input) 
		{
			$rules 	= array(
					'infra_type' 	=> 'required',
					'infra_name' 	=> 'required',
					'town_id' 		=> 'required|exists:towns,id'
				);
			$result = array();
			$validation = Validator::make($input, $rules);

			if($validation->fails()) {
				$result["success"] = false;
				$result["message"] = array(
						'message' 	=> 'please complete the fields',
						'type' 		=> 'danger',
						'for' 		=> 'infrastructures-create',
						'errors' 	=> $validation->messages()->toArray()
					);
			}else {


				$town 	= Town::find($input["town_id"]);

				$infra = Infrastructure::where('infra_name',$input['infra_name'])->where('infra_type',$input['infra_type'])->where('town_id',$town->id)->first();
				if(!$infra) {
					$infra 	= new Infrastructure;
					$infra->infra_type 	= $input["infra_type"];
					$infra->infra_name 	= $input["infra_name"];
					$infra->town_id 	= $town->id;
					$infra->save();
				}
				$result["success"] = true;
				$result["message"] = array(
						'message' 	=> 'you have successfully added a new infrastucture',
						'type' 		=> 'success',
						'for' 		=> 'infrastructures-create'
					);
				$result["infra"] 	= $infra->toArray();
			}

			return $result;
		}
	}