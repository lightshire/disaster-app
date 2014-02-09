@if(Session::get('for') && Session::get('for') == "regions-delete")
	<div class="alert alert-{{ Session::get('type') }}">
		{{ Session::get('message') }}
	</div>
@endif
<table class="table table-condensed table-responsive">
	<thead>
		<tr>
			<th>#</th>
			<th>Region Name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php $regions = Region::orderBy('id','desc')->paginate(10)?>
		@foreach($regions as $region)
			<tr>
				<td>{{ $region->id }}</td>
				<td>{{ $region->region }}</td>
				<td>
					<form action="/dashboard/settings/regions/{{ $region->id }}" method="post">
						{{ Form::token() }}
						<input type="hidden" name="_method" value="delete" />
						<a class="btn btn-primary btn-sm pull-right" style="margin:0px 10px;" href="/dashboard/settings/regions/{{ $region->id }}">View Details</a>
						<button class="btn btn-danger btn-sm pull-right">DELETE</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

{{ $regions->links() }}
