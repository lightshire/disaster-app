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
			<a href="#" class="btn-link btn pull-left"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;Advanced Search</a>
			<button type="submit" class="btn btn-primary pull-right btn-sm">
				<i class="glyphicon glyphicon-upload"></i>&nbsp;Search
			</button>
		</form>
	</div>
</div>