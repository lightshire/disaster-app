@extends('template')

@section('content')
	{{ View::make('dashboard.nav') }}
	<div class="wrapper">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">Create A Report</div>
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
								<input type="text" disabled="disabled" class="form-control" name="town_id" disabled="disabled" value="{{ Sentry::GetUser()->location->city->city_name }}, {{ Sentry::GetUser()->location->city->province->province_name }}, {{ Sentry::GetUser()->location->city->province->region->region }}"/>
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
							<div class="row">
								<div class="form-group col-md-6">
									<label class="form-label">Number of Infrastructures  Passable(DPWH)</label>
									<input type="text" readonly="readonly" class="form-control readonly" value="0">
								</div>
								<div class="form-group col-md-6">
									<label class="form-label">Number of Infrastructures  Not Passable (DPWH)</label>
									<input type="text" readonly="readonly" class="form-control readonly" value="0">
								</div>
							</div>
						<!-- 	<div class="form-group">
								<label class="form-label">Estimated Cost (PhP)</label>
								<div class="input-group">
									<input type="text" class="form-control" name="cost" placeholder="Enter the amount here" />
									<span class="input-group-addon">.00</span>
								</div>
							</div> -->
							<div class="form-group">
								<label class="form-label">Description</label>
								<textarea class="form-control" name="description" placeholder="Enter the report's description here" rows="10"></textarea>
							</div>
							<button class="btn btn-submit pull-right btn-primary" type="submit">Submit Report</button>
						</form>	
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							Barangay Reports to include
						</div>
					</div>
					<div class="panel-body">
						<div class="alert alert-info">
							<span class="glyphicon glyphicon-info-sign"></span>&nbsp; Select the barangay reports you want to add
						</div>
						<div class="table-wrapper">
							<table class="table table-responsive">
								<thead>
									<tr>
										<th>Report Desc.</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									@foreach(Report::getAllByCity(Sentry::getUser()->location->city_id) as $report)
										<tr>
											<td>{{ $report->description }}</td>
											<td>
												<div class="btn-group pull-right">
													<button class="btn btn-primary btn-check btn-sm" data-toggle='unchecked'>
														<span class='glyphicon glyphicon-unchecked'></span>
													</button>
													<button class="btn btn-info btn-view btn-sm">
														<span class="glyphicon glyphicon-eye-open"></span>
													</button>
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
	<script type="text/javascript" src="/js/p/reports.js"></script>
@stop