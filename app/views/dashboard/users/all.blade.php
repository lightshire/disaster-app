<table class="table table-responsive table-condensed">
	<thead>
		<tr>
			<th>#</th>
			<th>email</th>
			<th>Group</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<?php $users = User::orderBy('created_at','desc')->paginate(10); ?>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->getPrimaryGroup() }}</td>
				<td><a href="/dashboard/users/{{ $user->id }}" class="btn btn-xs btn-primary">View Details</a></td>
			</tr>
		@endforeach
	</tbody>
</table>
{{ $users->links() }}