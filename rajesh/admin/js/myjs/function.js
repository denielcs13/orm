function fetch_data(a_url,a_request,a_response,redirecturl){
	$.ajax({
		url:a_url,
		method:"POST",		
		dataType : "html",		
		data:a_request,
		success: function(response){
		if(response==1){
			window.location=redirecturl;
			}else{ 
			a_response.html(response);	
			}
		}
	});
}
function insert_data(a_url,a_request,a_response,redirecturl){	  
		 $.ajax({
			type: "POST",
			url: a_url,
			data: a_request,
			processData: false,
            contentType: false,
			success: function(response){
			if(response==1){
			window.location=redirecturl;
			}else{ 
			a_response.html(response).show().delay(5000).fadeOut("slow");	
			}
			return false;			
			}
		});
		
}
function login(a_url,a_request,a_response,requesttype,requesttype_id,redirecturl){	  
	 $.ajax({
		 
		type: "POST",
		url: a_url,
		data: a_request,
		processData: false,
		contentType: false,
		success: function(response){
		if(response>1){
		if((requesttype=='review')  || (requesttype=='complaint') || (requesttype=='product')){
		$("#customer_id").val(response);
		$("#add_data").attr("data-toggle","");
		$("#add_data").attr("data-target","");
		$("#add_data").attr("data-backdrop","");
		$("#add_data").attr("data-keyboard","");
		$("#add_data").click();
		}else if((requesttype=='comment_reply')){
		var formid="form[name='comment_reply_form"+requesttype_id+"']";
		$(formid+" #customer_id").val(response);
		$(formid+" #add_data_comment_reply").attr("data-toggle","");
		$(formid+" #add_data_comment_reply").attr("data-target","");
		$(formid+" #add_data_comment_reply").attr("data-backdrop","");
		$(formid+" #add_data_comment_reply").attr("data-keyboard","");
		$(formid+" #add_data_comment_reply").click();
		}else if((requesttype=='question') ){
		var formid="form[name='question_form']";
		$(formid+" #customer_id").val(response);
		$(formid+" #add_data_question").attr("data-toggle","");
		$(formid+" #add_data_question").attr("data-target","");
		$(formid+" #add_data_question").attr("data-backdrop","");
		$(formid+" #add_data_question").attr("data-keyboard","");
		$(formid+" #add_data_question").click();
		}else if((requesttype=='answer')){
		var formid="form[name='answer_form"+requesttype_id+"']";
		$(formid+" #customer_id").val(response);
		$(formid+" #add_data_answer").attr("data-toggle","");
		$(formid+" #add_data_answer").attr("data-target","");
		$(formid+" #add_data_answer").attr("data-backdrop","");
		$(formid+" #add_data_answer").attr("data-keyboard","");
		$(formid+" #add_data_answer").click();
		}else if((requesttype=='answer_reply')){
		var formid="form[name='answer_reply_form"+requesttype_id+"']";
		$(formid+" #customer_id").val(response);
		$(formid+" #add_data_answer_reply").attr("data-toggle","");
		$(formid+" #add_data_answer_reply").attr("data-target","");
		$(formid+" #add_data_answer_reply").attr("data-backdrop","");
		$(formid+" #add_data_answer_reply").attr("data-keyboard","");
		$(formid+" #add_data_answer_reply").click();
		}else if((requesttype=='review_comment') ){
		var formid="form[name='comment_form"+requesttype_id+"']";
		$(formid+" #customer_id").val(response);
		$(formid+" #add_data_comment").attr("data-toggle","");
		$(formid+" #add_data_comment").attr("data-target","");
		$(formid+" #add_data_comment").attr("data-backdrop","");
		$(formid+" #add_data_comment").attr("data-keyboard","");
		$(formid+" #add_data_comment").click();
		}else if((requesttype=='complain_comment') ){
		var formid="form[name='complain_comment_form"+requesttype_id+"']";
		$(formid+" #customer_id").val(response);
		$(formid+" #add_data_complain_comment").attr("data-toggle","");
		$(formid+" #add_data_complain_comment").attr("data-target","");
		$(formid+" #add_data_complain_comment").attr("data-backdrop","");
		$(formid+" #add_data_complain_comment").attr("data-keyboard","");
		$(formid+" #add_data_complain_comment").click();
		}else if((requesttype=='complain_reply') ){
		var formid="form[name='complain_reply_form"+requesttype_id+"']";
		$(formid+" #customer_id").val(response);
		$(formid+" #add_data_complain_reply").attr("data-toggle","");
		$(formid+" #add_data_complain_reply").attr("data-target","");
		$(formid+" #add_data_complain_reply").attr("data-backdrop","");
		$(formid+" #add_data_complain_reply").attr("data-keyboard","");
		$(formid+" #add_data_complain_reply").click();
		}else if((requesttype=='like') ){
		$("#get_login").val("login");
		$(".post-info #like_"+requesttype_id).attr("data-id",response);
		$(".post-info #like_"+requesttype_id).attr("data-toggle","");
		$(".post-info #like_"+requesttype_id).attr("data-target","");
		$(".post-info #like_"+requesttype_id).attr("data-backdrop","");
		$(".post-info #like_"+requesttype_id).attr("data-keyboard","");
		$(".post-info #like_"+requesttype_id).attr("data-type","");
		$(".post-info #like_"+requesttype_id).click();	
		}else if((requesttype=='dislike') ){
		$(".post-info #get_login").val("login");
		$(".post-info #dislike_"+requesttype_id).attr("data-id",response);
		$(".post-info #dislike_"+requesttype_id).attr("data-toggle","");
		$(".post-info #dislike_"+requesttype_id).attr("data-target","");
		$(".post-info #dislike_"+requesttype_id).attr("data-backdrop","");
		$(".post-info #dislike_"+requesttype_id).attr("data-keyboard","");
		$(".post-info #dislike_"+requesttype_id).attr("data-type","");
		$(".post-info #dislike_"+requesttype_id).click();	
		}else if((requesttype=='review_like') ){
		$("#get_login").val("login");
		$(".post-info-review #like_"+requesttype_id).attr("data-id",response);
		$(".post-info-review #like_"+requesttype_id).attr("data-toggle","");
		$(".post-info-review #like_"+requesttype_id).attr("data-target","");
		$(".post-info-review #like_"+requesttype_id).attr("data-backdrop","");
		$(".post-info-review #like_"+requesttype_id).attr("data-keyboard","");
		$(".post-info-review #like_"+requesttype_id).attr("data-type","");
		$(".post-info-review #like_"+requesttype_id).click();	
		}else if((requesttype=='review_dislike') ){
		$(".post-info-review #get_login").val("login");
		$(".post-info-review #dislike_"+requesttype_id).attr("data-id",response);
		$(".post-info-review #dislike_"+requesttype_id).attr("data-toggle","");
		$(".post-info-review #dislike_"+requesttype_id).attr("data-target","");
		$(".post-info-review #dislike_"+requesttype_id).attr("data-backdrop","");
		$(".post-info-review #dislike_"+requesttype_id).attr("data-keyboard","");
		$(".post-info-review #dislike_"+requesttype_id).attr("data-type","");
		$(".post-info-review #dislike_"+requesttype_id).click();	
		}else{
		window.location=redirecturl;	
		}
		}else{ 
		a_response.html(response).show().delay(5000).fadeOut("slow");	
		}
		return false;			
		}
	});		
}
function delete_data(a_url,a_request,a_response,thisvalue){	 
		 $.ajax({
			type: "POST",
			url: a_url,
			data: a_request,
			success: function(response){
			if(response==1){
			thisvalue.slideUp();
			}else{ 
			 $(window).scrollTop(a_response.offset().top);
			 //$.scrollTo(a_response, 1000);
			a_response.html(response).show().delay(5000).fadeOut("slow");	
			}
			return false;			
			}
		});
		
}
function update_status(a_status,a_id,thisval,a_url,postdata,activedata,inactivedata,error_id){
$.ajax({
	type: "POST",
	url: a_url,
	data: postdata,
	success: function(response){
	if(response==1){
		if(a_status==0){
			thisval.replaceWith(activedata);
		}else{
			thisval.replaceWith(inactivedata);
		}
	}else{
		error_id.html(response).show().delay(5000).fadeOut("slow");
	}
	}
});
}
function get_nextdate(long_day,datevalue){
		var nextdate='';
		var datespl=datevalue.split('-');
		var datey=datespl[2];
		var datem=datespl[1];
		var dated=datespl[0];
		var date1=datey+'-'+datem+'-'+dated;
		var tdate = new Date(date1);
		var tomorrow = new Date(tdate.getTime() + long_day * 24 * 60 * 60 * 1000);
		var cur_mon=(tomorrow.getMonth()+1);
		twoDigitMonth = (cur_mon>= 10)?(tomorrow.getMonth()+1) : '0' + (tomorrow.getMonth()+1);
		var twoDigitDate=((tomorrow.getDate())>=10)? (tomorrow.getDate()) : '0' + (tomorrow.getDate());			
		nextdate = twoDigitDate + "-" + twoDigitMonth + "-" + tomorrow.getFullYear();
		return nextdate;
	}
	function validseccode(){
		var checktrue=true;
		var sector_code=$("[name='sector_code[]']");
		var sector_code_id=$("[name='sector_code_id[]']");
		$("[name='sector_code[]']").each(function(i){
			sector_code.eq(i).css("border","");
			if((sector_code.eq(i).val()=='' && sector_code_id.eq(i).val()  !='') || (sector_code.eq(i).val() !='' && sector_code_id.eq(i).val()  =='')){
				sector_code.eq(i).css("border","1px solid red");
				checktrue=false;
			}		
		});
		var hotel_name=$("[name='hotel_name[]']");
		var hotel_name_id=$("[name='hotel_name_id[]']");
		$("[name='hotel_name[]']").each(function(i){
			hotel_name.eq(i).css("border","");
			if((hotel_name.eq(i).val()=='' && hotel_name_id.eq(i).val()  !='') || (hotel_name.eq(i).val() !='' && hotel_name_id.eq(i).val()  =='')){
				hotel_name.eq(i).css("border","1px solid red");
				checktrue=false;
			}		
		});
		if( $("[name='date[]']").eq(0).val()=='' || $("[name='dbl_rate[]']").eq(0).val()=='' ||$("[name='hotel_name[]']").eq(0).val()=='' || $("[name='mealplan[]']").eq(0).val()=='' || $("[name='sector_code[]']").eq(0).val()==''	|| $("#no_dbl").val()==''){
		$("[name='date[]']").eq(0).css("border","1px solid red");
		$("[name='dbl_rate[]']").eq(0).css("border","1px solid red");
		$("[name='hotel_name[]']").eq(0).css("border","1px solid red");
		$("[name='mealplan[]']").eq(0).css("border","1px solid red");
		sector_code.eq(0).css("border","1px solid red");
		$("#no_dbl").css("border","1px solid red");
		checktrue=false;	
		}else{
		$("[name='date[]']").eq(0).css("border","");
		$("[name='dbl_rate[]']").eq(0).css("border","");
		$("[name='hotel_name[]']").eq(0).css("border","");
		$("[name='mealplan[]']").eq(0).css("border","");
		sector_code.eq(0).css("border","");
		$("#no_dbl").css("border","");
		}
		return checktrue;
	}
	function grand_lotal(thisval,cost,g_total){
	if(thisval.val() !=''){
		var total_cost=(parseInt(cost.val())+parseInt(cost.val()*thisval.val()/100));
		g_total.val(total_cost);
		//var grand_total=parseInt($("#pp_gt").val())+parseInt($("#epsr_gt").val())+parseInt($("#cwb_gt").val())+parseInt($("#cnb_gt").val());
		//$("#total_cost").val(grand_total);
	}
}