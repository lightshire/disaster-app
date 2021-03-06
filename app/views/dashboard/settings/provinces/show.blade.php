@extends('template')

@section('content')
	{{ View::make('dashboard.nav') }}
	<div class="wrapper">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="panel-title">
									Province Name..
								</div>
							</div>
							<div class="panel-body">
								@if(Session::get('for') && Session::get('for') == 'provinces-update')
									<div class="alert alert-{{ Session::get('type') }}">
										{{ Session::get('message') }}
									</div>
								@endif
								<form action="/dashboard/settings/provinces/{{ $province->id }}" method="post">
									{{ Form::token() }}
									<input type="hidden" name="_method" value="delete" />
									<button class="btn btn-danger btn-sm btn-block">DELETE</button>
								</form>
								<hr />
								<form action="/dashboard/settings/provinces/{{ $province->id }}" method="post">
									{{ Form::token() }}
									<input type="hidden" name="_method" value="put" />
									<div class="form-group">
										<label for="province_name">
											Province Name
										</label>
										<input type="text" name="province_name" value="{{ $province->province_name }}" class="form-control"/>
									</div>
									<button class="btn btn-primary btn-sm pull-right" type="submit">Update</button>
								</form>	
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="panel-title">
									Cities..
								</div>
							</div>
							<div class="panel-body">
								@if(Session::get('for') && Session::get('for') == 'cities-create')
									<div class="alert alert-{{ Session::get('type') }}">
										{{ Session::get('message') }}
									</div>
								@endif
								<div class="clearfix">
									<form action="/dashboard/settings/cities" method="post">
										{{ Form::token() }}
										<input type="hidden" name="_redirect" value="{{ URL::current() }}" />
										<input type="hidden" name="province_id" value="{{ $province->id }}" />
										<div class="form-group">
											<label class="form-label" for="city_name">City Name</label>
											<input type="text" name="city_name" class="form-control" placeholder="Enter the City's name" />
										</div>
										<button class="btn btn-primary btn-sm pull-right">Save</button>
									</form>
								</div>
								<hr />
								<?php $cities = City::where('province_id',$province->id)->orderBy('id','desc')->paginate(10)?>
								<table class="table table-responsive table-condensed">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										@foreach($cities as $city)
											<tr>
												<td>{{ $city->id }}</td>
												<td>{{ $city->city_name }}</td>
												<td><a href="/dashboard/settings/cities/{{$city->id}}" class="pull-right btn btn-primary btn-xs">View Details</a></td>
											</tr>
										@endforeach
									</tbody>
								</table>
								{{ $cities->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop