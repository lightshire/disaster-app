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
									<th>Infras</th>
									<th>Disaster Type</th>
									<th>Status</th>
									<th>Description</th>
									<th>Cost</th>
									<th>Date of Creation</th>
								</tr>
							</thead>
							<tbody>
								@foreach($reports as $report)
									<tr>
										<td>{{ $report->id }}</td>
										<td><button class="btn btn-primary btn-xs btn-report" data-report-id="{{ $report->id }}">View Infra Details</button></td>
										<td>{{ $report->disaster->disaster_type }}</td>
										<td><span class="label label-info">{{ $report->status }}</span></td>
										<td>{{ $report->description }}</td>
										<td>{{ number_format($report->cost,2,".",",") }}</td>
										<td>{{ ExpressiveDate::make($report->created_at)->getRelativeDate() }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bs-modal-sm" id="specificReportModal" tabindex="-1" role="dialog" aria-labelledby="specificReportModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 id="specificReportModalLabel">All Infrastructures</h4>
				</div>
				<div class="modal-body">
					<table class="table table-responsive">
						<thead>
							<tr>
								<th>Infra Type</th>
								<th>Infra Name</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody id="specificReportModalContent">

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
	<script type="text/javascript" src="/js/reports.js"></script>
@stop