@extends('template')
@section('content')
	{{ View::make('dashboard.nav') }}
	<div class="wrapper">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							Public Concerns..
						</div>
					</div>
					<div class="panel-body">
						<table class="table table-condensed table-responsive">
							<thead>
								<tr>
									<th>#</th>
									<th>Person Concerned</th>
									<th>Message</th>
									<th>Image</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php $concerns = Concern::where('town_id',Sentry::getUser()->location->town_id)->orderBy('id','desc')->paginate(10)?>
							@foreach($concerns as $c)
									<tr>
										<td>{{ $c->id }}</td>
										<td>{{  $c->full_name }}</td>
										<td>{{ $c->message }}</td>
										<td>
											@if($c->image_url)
												<a class="btn btn-info btn-xs" href="/concerns/{{$c->image_url}}">view image</a>
											@else
											&nbsp;
											@endif
										</td>
										<td>
											{{ ExpressiveDate::make($c->created_at)->getRelativeDate() }}
										</td>
										<td>
											@if($c->is_attended)
												<span class="label label-success">Done</span>
											@else
												<span class="label label-danger">Urgent</span>
											@endif
										</td>
										<td>
											<button class="btn btn-xs btn-primary">Attend To</button>
										</td>
									</tr>
								</tbody>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop