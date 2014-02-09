@if(Session::get('for') && Session::get('for') == 'regions-create')
	<div class="alert alert-{{ Session::get('type') }}">
		{{ Session::get('message') }}
	</div>
@endif

<form action="/dashboard/settings/regions" method="post">
	{{ Form::token() }}
	<div class="form-group">
		<label for="region-name">Region Name</label>
		<input type="text" name="region" placeholder="Enter the region name" class="form-control"/>
	</div>
	<button class="btn btn-block btn-primary" type="Submit">Save</button>
</form>