@if(Session::get('for') && Session::get('for') == 'disasters-create')
	<div class="alert alert-{{ Session::get('type') }}">
		{{ Session::get('message') }}
	</div>
@endif
<form action="/dashboard/settings/disasters" method="post">
	{{ Form::token() }}
	<div class="form-group">
		<label class="form-label" for="disaster_name">Disaster Type</label>
		<input type="text" id="disaster_name" name="disaster_name" placeholder="Enter the disaster name" class="form-control" />
	</div>
	<button class="btn btn-block btn-primary btn-sm" type="Submit">SAVE</button>
</form>