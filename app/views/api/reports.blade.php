<div class="row">
	<div class="col-md-12">
		<table class="table-responsive table">
			<thead>
				<tr>
					<th>#</th>
					<th>Location</th>
					<th>Disaster Type</th>
					<th>Description</th>
					<th>Submitted</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php $searched = Report::searchAll(Input::get('q'), Input::get('town_id'), Input::get('disaster_id'))?>
				@foreach($searched as $s)
					<tr>
						<td>{{ $s->id }}</td>
						<td>{{ $s->town->town_name  }}, {{ $s->town->province->province_name }}</td>
						<td>{{ $s->disaster->disaster_type }}</td>
						<td>{{ $s->description }}</td>
						<td>{{ ExpressiveDate::make($s->created_at)->getRelativeDate() }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $searched->links() }}
	</div>
</div>