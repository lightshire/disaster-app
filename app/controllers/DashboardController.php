<?php
	class DashboardController extends BaseController
	{
		public function __construct() 
		{
			$this->beforeFilter('csrf',array('on'=>'put|post|patch'));
		}

		public function getIndex()
		{
			return View::make('dashboard.index');
		}
	}