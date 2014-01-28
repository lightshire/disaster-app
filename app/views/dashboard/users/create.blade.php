@extends('template')

@section('content')
	{{ View::make('dashboard.nav') }}
	<div class="wrapper">
		<div class="row">
			<div class="col-md-5">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">
							<span class="glyphicon glyphicon-plus-sign"></span>&nbsp;
							Add New User
						</div>
					</div>
					<div class="panel-body">
						<h3><span class="glyphicon glyphicon-user"></span>&nbsp;User Information</h3>
						<hr />
						<form action="/api/users/" method="post">
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="text" name="email" id="email" placeholder="Enter your email address" class="form-control" />
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password_1" id="password" placeholder="Enter your password" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="repeat_password">Repeat Password</label>
								<input type="password" name="password_2" id="repeat_password" placeholder="Repeat your password" class="form-control" />
							</div>
							<div class="form-group">
								<label for="group_id">Group Involved</label>
								<select name="group_id" id="group_id" class="form-control">
									@foreach(Sentry::findAllGroups() as $group)
										<option value="{{ $group->id }}">{{ $group->name }}</option>
									@endforeach
								</select>
							</div>
							<h3><span class="glyphicon glyphicon-cog"></span>&nbsp;Profile Information</h3>
							<hr />
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter your first name" />
							</div>
							<div class="form-group">
								<label for="last_name">Last Name</label>
								<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter your last name" />
							</div>
							<button class="btn btn-primary pull-right" type="submit">
								Save
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop