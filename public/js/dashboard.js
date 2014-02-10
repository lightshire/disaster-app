$(document).ready(function() {

	$("#infrastructures").tooltip({
		title 	: "Click on the <span class='glyphicon glyphicon-plus-sign'></span> to add bridges and infrastructures. <br /><br />If you would like to remove infrastructures, please click on the <span class='glyphicon glyphicon-minus-sign'></span>. <br /><br />Please note that only the latest bridge could be removed.",
		html 	: true
	});
	
	var timeout 		= null;
	var infra_ids 		= [];
	var infra_labels 	= [];

	$("#infra_name").typeahead({
		source 		: function(query, process) {
						if(timeout) {
							clearTimeout(timeout);
						}

						timeout = setTimeout(function() {
							var infra_type = $("#infra_type").val();
							var url = "/api/infras/"+town_id+"/"+infra_type;

							$.ajax({
								url 	: url,
								data 	: {
									keyword : query
								},
								success : process
							});

						}, 300);
					},
		minLength 	: 3
	});

	$("#infra-save-btn").on('click', function(e) {
		e.preventDefault();
		saveInfra($(this));
		// $("#infra_type").val("");
		$("#infra_name").val("");
		$("#bridgeModal").modal("hide");
	});

	$("#infra-save-add-more-btn").on('click', function(e) {
		e.preventDefault();
		saveInfra($(this));

		$("#infra_name").val("");
	});

	$("#btn-infra-minus").on('click', function(e) {
		e.preventDefault();
		removeInfra();

	});

	function removeInfra() {
		infra_ids.pop();
		infra_labels.pop();
		deployArrayToField(infra_labels, $("#infrastructures"));
		$("#infra_ids").val(JSON.stringify(infra_ids));
	}

	function addToReportForm(data) {
		var infra 		= data.infra;

		if(inArray(infra.id, infra_ids)) {
			return;
		}

		infra_labels.push(infra.infra_name);
		infra_ids.push(infra.id);
		deployArrayToField(infra_labels, $("#infrastructures"));
		$("#infra_ids").val(JSON.stringify(infra_ids));
	}

	function deployArrayToField(fields, selector) {

		selector.val("");

		for(var i = 0; i < fields.length; i++) {
			var previous = selector.val();
			var current  = fields[i];

			if(previous == "") {
				selector.val(current);
			}else {
				selector.val(previous+", "+current);
			}
		}
	}

	function saveInfra(selector) {
		var town_id 	= selector.data("town-id");
		var infra_type	= $("#infra_type").val();
		var infra_name 	= $("#infra_name").val();
		var _token 		= selector.data("token");
		var url 	= "/dashboard/infras";

		$.post(url, {
			town_id 	: town_id,
			infra_name 	: infra_name,
			infra_type 	: infra_type,
			_token 		: _token
		}, function(data) {
			addToReportForm(data);
		});
	}

	function inArray(needle, haystack) {
		var length = haystack.length;
		for(var i = 0; i < length; i++) {
			if(haystack[i] == needle) return true;
		}
		return false;
	}
});