<div class="row">
	<div class="col-md-12">
		@if(Session::get('for') && Session::get('for') == 'concerns-create')
			<div class="alert alert-{{ Session::get('type') }}">
				{{ Session::get('message') }}
			</div>
		@endif
		<form action="/public/concerns" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required="required"/>
			</div>
			<div class="form-group">
				<label for="province_id">Province</label>
				<select name="province_id" id="concerns_province_id" class="form-control">
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
			<div class="form-group" id="concerns_town_container" style="display:none;">
				<label for="town_id">Barangay</label>
				<select name="town_id" class="form-control" id="concerns_town_id"></select>
			</div>
			<div class="form-group">
				<label for="message">Message</label>
				<textarea name="message" id="message" class="form-control" required="required"></textarea>
			</div>
			<div class="form-group">
				<label for="image">Image of Concern</label>
				<input type="file" accept="image" class="form-control" id="image" name="image"/>
			</div>
			<button type="submit" class="btn btn-primary pull-right btn-sm">
				<span class="glyphicon glyphicon-file"></span>&nbsp;
				Submit
			</button>
		</form>
	</div>
</div>