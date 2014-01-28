<div class="row">
	<div class="col-md-12">
		<form class="/api/concerns/" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" />
			</div>
			<div class="form-group">
				<label for="province">Province</label>
				<select name="province" id="province" class="form-control">
					<option value="1">Province 1</option>
					<option value="2">Province 1</option>
				</select>
			</div>
			<div class="form-group">
				<label for="message">Message</label>
				<textarea name="message" id="message" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="image">Image of Concern</label>
				<input type="file" accept="image" class="form-control" id="image" name="image" />
			</div>
			<button type="submit" class="btn btn-primary pull-right btn-sm">
				<span class="glyphicon glyphicon-file"></span>&nbsp;
				Submit
			</button>
		</form>
	</div>
</div>