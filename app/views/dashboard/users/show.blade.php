@extends('template')

@section('content')
	{{ View::make('dashboard.nav') }}
	<div class="wrapper">
		<div class="row">
			<div class="col-md-5">
				@if(Session::get('for') && Session::get('for') == 'users-update')
					<div class="alert alert-{{ Session::get('type') }}">
						{{ Session::get('message') }}
					</div>
				@endif
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">
							{{ $user->email }}
						</div>
					</div>
					<div class="panel-body">
						<form action="/dashboard/users/{{ $user->id }}" method="post">
							{{ Form::token() }}
							<input type="hidden" value="{{ URL::current() }}" name="_redirect" />
							<input type="hidden" value="put" name="_method" />
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="text" name="email" id="email" placeholder="Enter your email address" value="{{ $user->email }}" disabled="disabled" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="last_name">Last Name</label>
								<input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" class="form-control"/>
							</div>
							<button class="btn btn-block btn-primary" type="submit">UPDATE</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							All Users..
						</div>
					</div>
					<div class="panel-body">
						{{ View::make('dashboard.users.all') }}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop