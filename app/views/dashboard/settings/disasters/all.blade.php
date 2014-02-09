<table class="table table-responsive table-condensed">
	<thead>
		<tr>
			<th>#</th>
			<th>Disaster Type</th>
		</tr>
	</thead>
	<tbody>
		<?php $disasters = Disaster::orderBy('id','desc')->paginate(10)?>
		@foreach($disasters as $dis)
			<tr>
				<td>{{ $dis->id }}</td>
				<td>{{ $dis->disaster_type }}</td>
			</tr>
		@endforeach
	</tbody>
</table>