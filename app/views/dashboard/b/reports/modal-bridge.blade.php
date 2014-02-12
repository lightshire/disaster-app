	<div class="modal fade bs-modal-sm" id='bridgeModal' tabindex='-1' role='dialog' aira-labelledby='#bridgeModalLabel' aria-hidden='true'>
		<div class="modal-dialog">
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
								&times;
					</button>
					<h4 id="bridgeModalLabel">Select Infrastructure</h4>
				</div>
				<div class='modal-body'>
					<div class="alert alert-info">
						Search or add a new infra structure. If not infrastructure will be found, it'll be created for you.
					</div>
					<form role="form">
						{{ Form::token() }}
						<div class="form-group">
							<label for="infra_type">Infrastructure Type</label>
							<select name="infra_type" id="infra_type" class="form-control">
								<option value="bridge">Bridge</option>
								<option value="road">Road</option>
							</select>
						</div>
						<div class="form-group">
							<label for="infra_name">Infrastructure Name</label>
							<input type="text" name="infra_name" id="infra_name" class="form-control" placeholder='Enter an infrastructure name'/>
						</div>
						<div class="form-group">
							<label for="is_passable">Is Passable</label>
							<select  name='is_passable' id="infra_is_passable" class="form-control">
							<option value="0">No</option>
							<option value='1'>Yes</option>
							</select>
						</div>
						<button class="btn btn-primary pull-left" id="infra-save-add-more-btn" data-town-id="{{ Sentry::getUser()->location->town_id }}" data-token="{{ Session::token() }}" type="button">Add</button>
						<button class="btn btn-danger pull-right" id="infra-save-btn" data-town-id="{{ Sentry::getUser()->location->town_id }}" data-token="{{ Session::token() }}" type="button">Add Then Close</button>
					</form>
				</div>
				<div class='modal-footer'>

				</div>
			</div>
		</div>
	</div>