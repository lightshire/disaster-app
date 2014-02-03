$("#search_province_id").change(function() {
	var that 	= $(this);
	var value 	= $(this).val();
	var townBox = $("#search_town_id");
	var townBoxContainer = $("#search_town_container");
	if(value == 0) {
		townBoxContainer.hide();
	}
	$.get("/api/towns/"+value,{},function(data) {
			var options = "";
			for(var i = 0; i < data.length; i++) {
				options += "<option value='"+data[i].id+"'>"+data[i].town_name+"</option>";
			}
			townBox.html(options);

			if(data.length != 0)
				townBoxContainer.show();
			else
				townBoxContainer.hide();
		},"json");
});

$("#concerns_province_id").change(function() {
	var that 	= $(this);
	var value 	= $(this).val();
	var townBox = $("#concerns_town_id");
	var townBoxContainer = $("#concerns_town_container");
	if(value == 0) {
		townBoxContainer.hide();
	}
	$.get("/api/towns/"+value,{},function(data) {
			var options = "";
			for(var i = 0; i < data.length; i++) {
				options += "<option value='"+data[i].id+"'>"+data[i].town_name+"</option>";
			}
			townBox.html(options);

			if(data.length != 0)
				townBoxContainer.show();
			else
				townBoxContainer.hide();
		},"json");
});

