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
							<input type="hidden" id="infra_ids" name="infra_ids"/>
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
								<label class="form-label">Infrastructures (DPWH)</label>
								<!-- <select name="infrastructure_type" class="form-control">
									<option value="bridge">bridge</option>
									<option value="road">road</option>
								</select> -->
								<div class="input-group">
									<span class="input-group-btn">
										<a class="btn btn-danger" type='button' id='btn-infra-minus'>
											<span class='glyphicon glyphicon-minus-sign'></span>
										</a>
									</span>
									<input type="text" name="infrastructures" id="infrastructures" class='form-control' data-toggle='tooltip' readonly="readonly" />
									<span class="input-group-btn">
										<a class="btn btn-primary" type='button' id='btn-infra' data-toggle='modal' data-target='#bridgeModal'>
											<span class='glyphicon glyphicon-plus-sign'></span>
										</a>
									</span>
								</div>
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


{{ View::make('dashboard.b.reports.modal-bridge') }}
@stop

@section('scripts')
	<script src="/js/json2.js" type="text/javascript"></script>
	<script type="text/javascript">
		var town_id = "{{ Sentry::getUser()->location->town_id }}";
	</script>
	<script src="/js/bootstrap3-typeahead.js" type="text/javascript"></script>
	<script src="/js/dashboard.js" type="text/javascript"></script>
@stop