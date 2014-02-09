<?php
	class DashboardUploadsController extends BaseController
	{

		public function __construct()
		{
			$this->beforeFilter('csrf',array('on'=>'post|put|delete'));
		}
		public function postRegion($region_id)
		{

			$region = Region::find($region_id);

			if(!$region) {
				return Redirect::to(URL::previous());
			}

			$rules = array(
					'regionUploads' 	=> 'required'
				);
			$input 	= Input::all();
			$result = array();

			$validation = Validator::make($input, $rules);

			if($validation->fails()) {
				$result["success"] = false;
				$result["message"] = array(
						'message' 	=> 'Please upload a file to continue',
						'type' 		=> 'danger',
						'for' 		=> 'uploads-create'
					);
			}else {
				$filePath 		= storage_path()."/csvs";
				$fileName		= "";
				if(!file_exists($filePath)) {
					mkdir($filePath);
				}

				$fileName .= "/".date("U").".csv";
				Input::file('regionUploads')->move($filePath, $fileName);

				$handle = fopen($filePath."/".$fileName, "r");
				$csv 	= array(); 
				if($handle) {
					while(($data = fgetcsv($handle)) !== false) {
						$csv[] = $data;
					}
				}

				fclose($handle);

				for($i = 0; $i < count($csv); $i++) {
					if($csv[$i][2] == "" || $csv[$i][4] == "" || $csv[$i][5] == "") {
						continue;
					}

					$province 	= Province::createOrFind($csv[$i][2], $region->id);
					

					$city 		= City::createOrFind($csv[$i][4], $province->id);

					$town 		= Town::createOrFind($csv[$i][5], $city->id); 
				}

				
			}

			return Redirect::to($input['_redirect'])->with($result);
		}
	}