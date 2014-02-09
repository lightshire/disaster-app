@extends('template')

@section('content')
	{{ View::make('dashboard.nav') }}
	<div class="wrapper">
		<div class="row">
			<div class="col-md-12">
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
									<th>Infra Type</th>
									<th>Families Affected</th>
									<th>Cost</th>
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
										<td>{{ $report->infrastructure_type }}</td>
										<td>{{ $report->families_affected }}</td>
										<td>{{ number_format($report->cost,2,".",",") }}</td>
										<td>{{  $report->description }}</td>
										<td><span class="label label-info">{{ $report->status }}</span></td>
										<td>
											@if($report->status == "in-barangay")
												<a href="/dashboard/p/accept/{{ $report->id }}" class="btn btn-danger btn-xs btn-block">Accept Report</a>
											@endif
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
@stop