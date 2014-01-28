<?php
	class DashboardUsersController extends BaseController
	{
		public function __construct()
		{
			$this->beforeFilter('csrf',array('on'=>'put|post|patch'));
		}

		public function getIndex()
		{
			return View::make('dashboard.users.index');
		}

		public function getCreate()
		{
			return View::make('dashboard.users.create');
		}


	}