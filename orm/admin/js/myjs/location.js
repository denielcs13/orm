var load_img='img/loading.gif';

	$("body").on("change","#country",function() {
	$(this).after('<div id="loader"><img src="'+load_img+'" alt="loading subcategory" style="width:15%" /></div>');
	var select_state=$(this).data("select_state");
	$.get('ajax/loadlocation.php?state=' + $(this).val()+"&select_state="+select_state, function(data) {
	var option='<option>Select State</option>';
	var data1=data;
	var result=option+data;
	$("#state").html(result); 
	$('#loader').slideUp(200, function() {
	$(this).remove(); 
	});
	$("#city").html('');
	});
	});
	
	$("body").on("change","#state",function() {
			$(this).after('<div id="loader"><img src="'+load_img+'" alt="loading subcategory" style="width:15%" /></div>');
			var select_city=$(this).data("select_city");
	$.get('ajax/loadlocation.php?city=' + $(this).val()+"&select_city="+select_city, function(data) {
			var option='<option>Select City</option>';
			var data1=data;
			var result=option+data;
			$("#city").html(result);
			$('#loader').slideUp(200, function() {
			$(this).remove();
			});
			});
			});