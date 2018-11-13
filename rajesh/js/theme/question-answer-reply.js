//question

	var loading_image='admin/img/loading.gif';
	var a_response=$(".modal-content");
	$("body").on("click","#add_data_question",function(){
	var a_response2=$("#error_question");		 
	 if($("#q_name").val()==''){
		a_response2.show().html('<div class="alert alert-danger">Please Enter Question </div>'); 
		return false;
		}else if($("#chk").val()==""){
		 //$(window).scrollTop($(".thumb-box4").offset().top);
		a_response2.show().html('<div class="alert alert-danger">Please  Enter Captcha Code.</div>'); 
		return false;
		}else if($("#ran").val()!=$("#chk").val()){
			 //$(window).scrollTop($(".thumb-box4").offset().top);
		a_response2.show().html('<div class="alert alert-danger">Captcha Code Does Not Match.</div>'); 
		return false;
	 }else{		
		var customer_id=$("form[name='question_form'] #customer_id").val();
		if(customer_id==''){
		var a_request_reg ='action=GET_LOGIN&requesttype=question&control_by='+$("#admin_id").val();
	
		var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 		
		}else{	
			var a_url='execution/question-answer-reply.php';
		var a_request = new FormData($("form[name='question_form']")[0]);
		var redirecturq='index#questionlist';
		$("#add_data_question").hide();
		$("#add_data_question").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturq);
		$("#loader").remove();
		$("#add_data_question").show();
		
		}
	}	  
});


//question like

 <!--  START OF LIKE DISLIKE QUESTION     -->
var loading_image='admin/img/loading.gif';

$(document).ready(function(){
// if the user clicks on the like button ...
$('body').on('click','.post-info a', function(){
  var post_id = $(this).attr('data-id');
  
  var question_id = $(this).data('question_id');
  var a_response=$(".modal-content");
    
  var datatype= $(this).data('rtype');
  if(post_id==''){
	   if(datatype==1){
		var a_request_reg ='action=GET_LOGIN&requesttype=like&requesttype_id='+question_id+'&control_by='+$("#admin_id").val();
	}if(datatype==2){
var a_request_reg ='action=GET_LOGIN&requesttype=dislike&requesttype_id='+question_id+'&control_by='+$("#admin_id").val();
	  }	  
	var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl);		
		}
		else{
		var action='';
		$clicked_btn = $(this).children('i');
		if(datatype==1){
		if ($clicked_btn.hasClass('fa-thumbs-o-up')) {action = 'qn_like'; } else if($clicked_btn.hasClass('fa-thumbs-up')){action = 'qn_unlike'; }
		
		var data= 'action=' + action + '&post_id=' + post_id + '&q_id=' + question_id;
			
		like_dislike($clicked_btn,action,data,datatype);
		}
		if(datatype==2){		
		if ($clicked_btn.hasClass('fa-thumbs-o-down')) {action = 'qn_dislike'; } else if($clicked_btn.hasClass('fa-thumbs-down')){action = 'qn_undislike'; }
		var data= 'action=' + action + '&post_id=' + post_id + '&q_id=' + question_id;
	
		like_dislike($clicked_btn,action,data,datatype);
		} 		
		}
});
});

function like_dislike($clicked_btn,action,data,datatype){
	var get_login=$("#get_login").val();
	$.ajax({
			url: 'question-like.php',
			type: 'post',
			data: data,
			success: function(data){
				res = JSON.parse(data);
				if(get_login=='login'){
					location.reload();
				}
				if(datatype==1){
				if (action == "qn_like") {
					$clicked_btn.removeClass('fa-thumbs-o-up');
					$clicked_btn.addClass('fa-thumbs-up');
				} else if(action == "qn_unlike") {
					$clicked_btn.removeClass('fa-thumbs-up');
					$clicked_btn.addClass('fa-thumbs-o-up');
				}
				$clicked_btn.siblings('span.likes').text(res.likes);
				$clicked_btn.parents('a').siblings('a').children('span.dislikes').text(res.dislikes);
				$clicked_btn.parents('a').siblings('a').children('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
				}
				
				if(datatype==2){
					if (action == "qn_dislike") {
							$clicked_btn.removeClass('fa-thumbs-o-down');
							$clicked_btn.addClass('fa-thumbs-down');
						} else if(action == "qn_undislike") {
							$clicked_btn.removeClass('fa-thumbs-down');
							$clicked_btn.addClass('fa-thumbs-o-down');
						}
						$clicked_btn.parents('a').siblings('a').children('span.likes').text(res.likes);
						$clicked_btn.siblings('span.dislikes').text(res.dislikes);
						$clicked_btn.parents('a').siblings('a').children('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
					}
				}
			
		  });		
		
}



//answer   js
var loading_image='admin/img/loading.gif';
	var a_response=$(".modal-content");
	$("body").on("click","#add_data_answer",function(){
		var question_id=$(this).data("question_id");
	
	var formname="form[name='answer_form"+question_id+"']";
	var a_response2=$(formname+" #error_answer");
	 if($(formname+" #a_name").val()==''){
	
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Answer </div>'); 
		return false;
	 }else{		
		var customer_id=$(formname+" #customer_id").val();
	//var customer_id=$("#customer_id").val();
		if(customer_id==''){
  var a_request_reg ='action=GET_LOGIN&requesttype=answer&requesttype_id='+question_id+'&control_by='+$("#admin_id").val();	
		//var a_request_reg ='action=GET_LOGIN&requesttype=answer&control_by='+$("#admin_id").val();
	
		var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 
		
		}else{	
			var a_url='execution/question-answer-reply.php';
			var a_request = new FormData($(formname)[0]);
		//var a_request = new FormData($("form[name='answer_form']")[0]);
		var redirecturq='';
		$("#add_data_answer").hide();
		$("#add_data_answer").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturq);
		$("#loader").remove();
		$("#add_data_answer").show();
		
		}
	}	  
});



//answer  Reply  js
var loading_image='admin/img/loading.gif';
	var a_response=$(".modal-content");
	$("body").on("click","#add_data_answer_reply",function(){
		var answer_id=$(this).data("answer_id");
	
	var formname="form[name='answer_reply_form"+answer_id+"']";
	var a_response2=$(formname+" #error_reply");
	 if($(formname+" #r_name").val()==''){
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Reply </div>'); 
		return false;
	 }else{		
		var customer_id=$(formname+" #customer_id").val();
		if(customer_id==''){
  var a_request_reg ='action=GET_LOGIN&requesttype=answer_reply&requesttype_id='+answer_id+'&control_by='+$("#admin_id").val();	
		var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 
		}else{	
			var a_url='execution/question-answer-reply.php';
			var a_request = new FormData($(formname)[0]);
		var redirecturq='';
		$("#add_data_answer_reply").hide();
		$("#add_data_answer_reply").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturq);
		$("#loader").remove();
		$("#add_data_answer_reply").show();
		
		}
	}	  
});

