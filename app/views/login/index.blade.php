@extends('template')

@section('content')
{{ View::make('index.nav') }}
	<div class="wrapper">

		<div class="row login">
			<div class="col-md-6 col-md-offset-3">
				@if(Session::get('for') && Session::get('for') == 'login')
					<div class="alert alert-{{ Session::get('type') }}"
						{{ Session::get('message') }}
					</div>
				@endif
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">
							<span class="glyphicon glyphicon-log-in"></span>&nbsp;
							Login
						</div>
					</div>
					<div class="panel-body">
						<form action="login" method="post">
							{{ Form::token() }}
							<div class="input-group" style="margin-bottom: 10px;">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
								<input type="text" name="email" class="form-control" placeholder="Enter your email address" />	
							</div>
							<div class="input-group"  style="margin-bottom: 10px;">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-book"></span>
								</span>
								<input type="password" name="password" class="form-control" placeholder="Enter your password" />
							</div>
							<button type="submit" class="btn btn-sm btn-primary pull-right">
								Login
							</button>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop