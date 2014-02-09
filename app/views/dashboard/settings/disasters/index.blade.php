@extends('template')
@section('content')
	{{ View::make('dashboard.nav') }}
	<div class="wrapper">
		<div class="row">
			<div class="col-md-5">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							Create New Disaster Type
						</div>
					</div>
					<div class="panel-body">
					{{ View::make('dashboard.settings.disasters.create') }}
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							All Disaster Types
						</div>
					</div>
					<div class="panel-body">
						{{ View::make('dashboard.settings.disasters.all') }}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop