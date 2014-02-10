@extends('template')

@section('content')
	{{ View::make('dashboard.nav') }}
	<div class="wrapper">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							Report Details..
						</div>
					</div>
					<div class="panel-body">
						@if(Session::get('for') && Session::get('for') == 'reports-create')
							<div class="alert alert-{{ Session::get('type') }}">
								{{ Session::get('message') }}
							</div>
						@endif
						<form action="/dashboard/b/reports" method="post">
							{{ Form::token() }}
							<div class="form-group">
								<label class="form-label">Location</label>
								<input type="text" disabled="disabled" class="form-control" name="town_id" disabled="disabled" value="{{ Sentry::GetUser()->location->town->town_name }}, {{ Sentry::getUser()->location->town->city->province->province_name }}"/>
							</div>
							<div class="form-group">
								<label class="form-label">Disaster Type</label>
								<select name="disaster_id" class="form-control">
									@foreach(Disaster::all() as $disaster)
										<option value="{{ $disaster->id }}">{{ $disaster->disaster_type }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label class="form-label">Number of Families Affected</label>
								<input type="text" name="families_affected" placeholder="Enter then number of families affected" class="form-control" />
							</div>
							<div class="form-group">
								<label class="form-label">Type (DPWH)</label>
								<select name="infrastructure_type" class="form-control">
									<option value="bridge">bridge</option>
									<option value="road">road</option>
								</select>
							</div>
							<div class="form-group">
								<label class="form-label">Estimated Cost (PhP)</label>
								<div class="input-group">
									<input type="text" class="form-control" name="cost" placeholder="Enter the amount here" />
									<span class="input-group-addon">.00</span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Description</label>
								<textarea class="form-control" name="description" placeholder="Enter the report's description here" rows="10"></textarea>
							</div>
							<button class="btn btn-submit pull-right btn-primary" type="submit">Submit Report</button>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
@stop