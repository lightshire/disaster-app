$(document).ready(function() {
	$(".btn-report").on('click', function() {
		var report_id 	= $(this).data("report-id");
		var url 		= "/api/reports/"+report_id;

		$.get(url,{}, function(data) {
			var infra 		= data.infrastructures;
			var pivot 		= null;
			var container	= $("#specificReportModalContent");
			container.html("");
			for(var i = 0; i < infra.length; i++) {
				pivot 	= infra[i].pivot;
				var content = "<tr data-infra-id='"+infra[i].id+"'>";
				content += "<td>"+infra[i].infra_type+"</td>";
				content += "<td>"+infra[i].infra_name+"</td>";
				content += "<td><button class='btn btn-danger btn-xs btn-infra-trash' data-infra-id='"+infra[i].id+"'><span class='glyphicon glyphicon-trash'></span>&nbsp;Remove</button></td>";
				if(pivot.is_passable == "1") {
					content += "<td><span class='label label-success'>Is Passable</span></td>";
				}else {
					content += "<td><span class='label label-danger'>Not Passable</span></td>";
				}
				content += "</tr>";	
				container.append(content);
			}
		});

		openSpecificReportModal();
	});

	$(document).on("click", ".btn-infra-trash", function(e) {
		e.preventDefault();
		var infra_id = $(this).data("infra-id");
		var callback  = "/api/reports/infra/"+infra_id;
		$.post(callback, {
			_method : "delete",
		}, function(data) {
			console.log(data);
		});
		$("tr[data-infra-id="+infra_id+"]").fadeOut().delay(500).remove();
	});
});

function openSpecificReportModal() {
	$("#specificReportModal").modal("show");
}