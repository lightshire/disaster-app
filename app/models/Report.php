<?php
	class Report extends Eloquent
	{
		public $timestamps 	= true;
		public $softDeletes = false;

		public static function searchAll($search_param, $town_id = null, $disaster_id = null, $paginate = 10)
		{
			if($town_id) {
				if($disaster_id) {
					$reports = self::where('infrastructure_type','like','%'.$search_param.'%')->where('town_id',$town_id)
						->orWhere('description','like','%'.$search_param.'%')->where('disaster_id', $disaster_id)->paginate(10);
				}else {
					$reports = self::where('infrastructure_type','like','%'.$search_param.'%')->where('town_id',$town_id)
						->orWhere('description','like','%'.$search_param.'%')->paginate(10);
				}
			}else {
				if($disaster_id) {
					$reports = self::where('infrastructure_type','like','%'.$search_param.'%')
						->orWhere('description','like','%'.$search_param.'%')->where('disaster_id', $disaster_id)->paginate(10);	
				}else {
					$reports = self::where('infrastructure_type','like','%'.$search_param.'%')
						->orWhere('description','like','%'.$search_param.'%')->paginate(10);
				}
				
			}
			return $reports;
		}

		public function infrastructures()
		{
			return $this->belongsToMany('Infrastructure')->withPivot('is_passable');
		}

		public function town()
		{
			return $this->belongsTo('Town');
		}

		public static function getAllByCity($city_id)
		{
			$city 		= City::find($city_id);
			$towns 		= $city->towns;
			$townIds 	= array(); 

			foreach($towns as $town)  {
				$townIds[] = $town->id;
			}

			return Report::whereIn('town_id', $townIds)->get();
			
		}

		public function disaster()
		{
			return $this->belongsTo('Disaster');
		}
	}