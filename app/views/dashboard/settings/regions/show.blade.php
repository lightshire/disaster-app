@extends('template')

@section('content')
	{{View::make('dashboard.nav')}}
	<div class="wrapper">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							Region..
						</div>
					</div>
					<div class="panel-body">
						@if(Session::get('for') && Session::get('for') == 'regions-update')
							<div class="alert alert-{{ Session::get('type') }}">
								{{ Session::get('message') }}
							</div>
						@endif
						<form action="/dashboard/settings/regions/{{ $region->id }}" method="post">
							{{ Form::token() }}
							<input type="hidden" name="_method" value="delete" />
							<button class="btn btn-danger btn-sm btn-block">DELETE</button>
						</form>
						<form action="/dashboard/settings/regions/{{ $region->id }}" method="post">
							{{ Form::token() }}
							<input type="hidden" name="_method" value="put" />
							<div class="form-group">
								<label class="form-label">Region Name</label>
								<input type="text" name="region" id="region" value="{{ $region->region }}" class="form-control"/>
							</div>
							<button class="btn btn-primary pull-right btn-sm" type="submit">Update</button>
						</form>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							Upload CSV
						</div>
					</div>
					<div class="panel-body">
						<div class="alert alert-info">
							<span class="glyphicon glyphicon-info-sign"></span>&nbsp;You should only use the CSV uploader per region. The format should be consistent and the headers should be the same. Even if the column structure is different, as long as headers remain constant (in name and case), the CSV Plugin will proceed.
						</div>
						<form action="/dashboard/settings/uploads/region" method="post" enctype="multipart/form-data">
							
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							Provinces..
						</div>
					</div>
					<div class="panel-body">
						@if(Session::get('for') && Session::get('for') == 'provinces-create')
							<div class="alert alert-{{ Session::get('type') }}">
								{{ Session::get('message') }}
							</div>
						@endif
						<div class="alert alert-info">Create new provinces under the region <strong>{{ $region->region }}</strong></div>
						<form action="/dashboard/settings/provinces" method="post">
							{{ Form::token() }}
							<input type="hidden" name="_redirect" value="{{ URL::current() }}" />
							<input type="hidden" name="region_id" value="{{ $region->id }}" />
							<div class="form-group">
								<label for="province_name">Province Name</label>
								<input type="text" name="province_name" placeholder="Enter the province name" class="form-control" />
							</div>
							<button class="btn btn-primary pull-right" type="submit">Save</button>
						</form> 
						</hr />
						<table class="table table-responsive table-condensed">
							<thead>
								<tr>
									<th>#</th>
									<th>Province Name</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php $provinces = Province::where('region_id',$region->id)->orderBy('id','desc')->paginate(10); ?>
								@foreach($provinces as $province)
									<tr>
										<td>{{ $province->id }}</td>
										<td>{{ $province->province_name }}</td>
										<td><a href="/dashboard/settings/provinces/{{ $province->id }}" class="btn btn-primary btn-xs pull-right">View Details</a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $provinces->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>	
@stop