$(document).ready(function() {
	$(".btn-summarize").tooltip({
		title : "Click this button to summarize all reports here and submit it to the upper level"
	});
	$(".readonly").tooltip({
		title : "This is a readonly, autogenerated field"
	});
	$(".btn-check").tooltip({
		title : "Click this to add the designated report to the summary"
	});
	$(".btn-view").tooltip({
		title : "Click this to view the complete details of the report"
	});

	$(".btn-check").on('click', function(e) {
		e.preventDefault();
		var parent 			= $(this).parent().parent().parent();
		console.log(parent);
		var checked 		= $(this).data('toggle');
		var uncheckedSpan	= "<span class='glyphicon glyphicon-unchecked'></span>";
		var checkedSpan 	= "<span class='glyphicon glyphicon-check'></span>";	
		if(checked == "checked") {
			$(this).removeClass('active').html(uncheckedSpan);
			$(this).data("toggle","unchecked");
			parent.removeClass('tr-active');
		}else {
			$(this).addClass('active').html(checkedSpan);
			$(this).data("toggle","checked");
			parent.addClass('tr-active');
		}
	});
});