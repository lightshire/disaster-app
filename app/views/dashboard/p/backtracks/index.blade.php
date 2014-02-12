@extends('template')

@section('content')
	{{ View::make('dashboard.nav') }}
	<div class="wrapper">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							All Backtrack Reports from Barangay Officials
						</div>
					</div>
					<div class="panel-body">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>#</th>
									<th>Barangay</th>
									<th>Infras</th>
									<th>Families Affected</th>
									<!-- <th>Cost</th> -->
									<th>Description</th>
									<th>Status</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach($reports as $report)
									<tr>
										<td>{{ $report->id }}</td>
										<td>{{ $report->town->town_name }}</td>
										<td><button class="btn btn-primary btn-xs btn-report" data-report-id="{{ $report->id }}">View Infra Details</button></td>
										<td>{{ $report->families_affected }}</td>
										<td>{{  $report->description }}</td>
										<td><span class="label label-info">{{ $report->status }}</span></td>
										<td>
											@if($report->status == "in-barangay")
												<a href="/dashboard/p/accept/{{ $report->id }}" class="btn btn-danger btn-xs btn-block">Accept Report</a>
											@else
												<span class="label label-success col-md-12">Accepted</span>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<a href="/dashboard/p/reports/create" class='btn btn-primary btn-block btn-lg btn-summarize'>SUMMARIZE AND SUBMIT REPORT</a>
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
								<th>Is Passable</th>
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
	<script type="text/javascript" src="/js/p/reports.js"></script>
@stop