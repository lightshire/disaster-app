<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="searchModalLabel">Advanced Search..</h4>
			</div>
			<div class="modal-body">
				<form action="api/search" method="post" role="form">
					<div class="form-group">
						<label for="region">Province</label>
						<select name="region" id="region" class="form-control">
							<optgroup label="Region 1">
								<option value="1">Province 1</option>
								<option value="2">Province 2</option>
							</optgroup>
							<optgroup label="Region 2">
								<option value="1">Province 1</option>
								<option value="2">Province 2</option>
							</optgroup>
						</select>
					</div>
					<div class="form-group">
						<label for="city">City</label>
						<select name="city" id="city" class="form-control">
							<option value="1">Province 1</option>
							<option value="2">Province 2</option>
						</select>
					</div>
					<div class="form-group">
						<label for="city">Barangay</label>
						<select name="city" id="city" class="form-control">
							<option value="1">Province 1</option>
							<option value="2">Province 2</option>
						</select>
					</div>
					<div class="form-group">
						<label for="city">Disaster Type</label>
						<select name="city" id="city" class="form-control">
							<option value="1">Province 1</option>
							<option value="2">Province 2</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary btn-xs" type="submit">
					<i class="glyphicon glyphicon-upload"></i>&nbsp;Search
				</button>
				<button class="btn btn-danger btn-xs " data-dismiss="modal" type="button">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<form action="/api/search" method="post" role="form">
			{{Form::token()}}
			<input type="hidden" name="_redirect" value="{{ URL::current() }}" />
			<div class="form-group">
				<label for="keyword">Keyword/s</label>
				<input type="text" name="keyword" id="keyword" class="form-control" placeholder="Enter your keywords here" />
			</div>
			<div class="form-group">
				<label for="region">Region</label>
				<select name="region" id="region" class="form-control">
					<option value="1">Region 1</option>
					<option value="2">Region @</option>
				</select>
			</div>
			<div class="form-group">
				<label for="province">Province</label>
				<select name="province" id="province" class="form-control">
					<option value="1">Province 1</option>
					<option value="2">Province 2</option>
				</select>
			</div>
			<button type="button" class="btn-link btn pull-left"  data-toggle="modal" data-target="#searchModal"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;Advanced Search</button>
			<button type="submit" class="btn btn-primary pull-right btn-sm">
				<i class="glyphicon glyphicon-upload"></i>&nbsp;Search
			</button>
		</form>
	</div>
</div>