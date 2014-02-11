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

				$handle 	= fopen($filePath."/".$fileName, "r");
				$csv 		= array(); 
				$ctr 		= 0;
				$columns	= array();
				if($handle) {
					while(($data = fgetcsv($handle)) !== false) {
						
						if($ctr != 0) {
							$tempData = array();
							for($i = 0; $i < count($data); $i++) {
								$tempData[strtolower($columns[$i])] = $data[$i];
							}
							$csv[] = $tempData;
						}else {
							$columns = $data;
						}
						$ctr++;
					}

				}

				fclose($handle);


				foreach($csv as $c) {
					
					if($c['province'] == "" || $c['cityormunicipality'] == "" || $c['barangay'] == "") {
						continue;
					}

					// $province 	= Province::createOrFind($csv[$i][2], $region->id);
					

					// $city 		= City::createOrFind($csv[$i][4], $province->id);

					// $town 		= Town::createOrFind($csv[$i][5], $city->id); 
					// 
					$province 	= Province::createOrFind($c['province'], $region->id);
					$city 		= City::createOrFind($c['cityormunicipality'], $province->id);
					$town = Town::createOrFind($c['barangay'], $city->id); 

					$town->addDemographic($c['male'], $c['female'], $c['families']);
				}

				
			}

			return Redirect::to($input['_redirect'])->with($result);
		}
	}