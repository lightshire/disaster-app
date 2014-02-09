@extends('template')

@section('content')
	{{ View::make('dashboard.nav') }}
	<div class="wrapper">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							All Reports
						</div>
					</div>
					<div class="panel-body">
						<?php $reports  = Report::where('town_id',Sentry::getUser()->location->town_id)->orderBy('id','desc')->paginate(10)?>
						<table class="table table-responsive table-condensed">
							<thead>
								<tr>
									<th>#</th>
									<th>Infra Type</th>
									<th>Disaster Type</th>
									<th>Status</th>
									<th>Description</th>
									<th>Cost</th>
								</tr>
							</thead>
							<tbody>
								@foreach($reports as $report)
									<tr>
										<td>{{ $report->id }}</td>
										<td>{{ $report->infrastructure_type }}</td>
										<td>{{ $report->disaster->disaster_type }}</td>
										<td><span class="label label-info">{{ $report->status }}</span></td>
										<td>{{ $report->description }}</td>
										<td>{{ number_format($report->cost,2,".",",") }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop