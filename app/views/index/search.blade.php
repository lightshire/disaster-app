<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
	<form action="/" method="get" role="form">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="searchModalLabel">Advanced Search..</h4>
				</div>
				<div class="modal-body">
					
						<div class="form-group">
							<label for="province_id">Province</label>
							<select name="province_id" id="advanced_search_province_id" class="form-control">
								<option value="0">--Select Province--</option>
								@foreach(Region::all() as $region)
									<optgroup label="{{$region->region}}">
										@foreach($region->provinces as $province)
											<option value="{{$province->id}}">
												{{ $province->province_name }}
											</option>
										@endforeach
									</optgroup>
								@endforeach
							</select>
						</div>
						<div class="form-group" style="display:none" id="advanced_search_town_container">
							<label class="form-label" for="advanced_search_town_id">Barangay</label>
							<select name="town_id" id="advanced_search_town_id" class="form-control">

							</select>
						</div>
						<div class="form-group">
							<label for="disaster_type">Disaster Type</label>
							<select name="disaster_id" id="disaster_id" class="form-control">
								@foreach(Disaster::all() as $disaster)
									<option value="{{ $disaster->id }}">{{ $disaster->disaster_type }}</option>
								@endforeach
							</select>
						</div>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-xs" type="submit">
						<i class="glyphicon glyphicon-upload"></i>&nbsp;Search
					</button>
					<button class="btn btn-danger btn-xs " data-dismiss="modal" type="button">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>

<div class="row">
	<div class="col-md-12">
		<form action="/" method="get" role="form">
			{{Form::token()}}
			<input type="hidden" name="_redirect" value="{{ URL::current() }}" />
			<div class="form-group">
				<label for="keyword">Keyword/s</label>
				<input type="text" name="q" id="keyword" class="form-control" placeholder="Enter your keywords here" />
			</div>
			<div class="form-group">
				<label for="province_id">Province</label>
				<select name="province_id" id="search_province_id" class="form-control">
					<option value="0">--Select Province--</option>
					@foreach(Region::all() as $region)
						<optgroup label="{{$region->region}}">
							@foreach($region->provinces as $province)
								<option value="{{$province->id}}">
									{{ $province->province_name }}
								</option>
							@endforeach
						</optgroup>
					@endforeach
				</select>
			</div>
			<div class="form-group" style="display:none" id="search_city_container">
				<label class="form-label" for="search_city_id">City</label>
				<select name="city_id" id="search_city_id" class="form-control"></select>
			</div>
			<div class="form-group" style="display:none;" id="search_town_container">
				<label class="form-label" for="search_town_id">Town</label>
				<select name="town_id" id="search_town_id" class="form-control"></select>
			</div>
			<button type="button" class="btn-link btn pull-left"  data-toggle="modal" data-target="#searchModal"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;Advanced Search</button>
			<button type="submit" class="btn btn-primary pull-right btn-sm">
				<i class="glyphicon glyphicon-upload"></i>&nbsp;Search
			</button>
		</form>
	</div>
</div>