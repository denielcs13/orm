//comment li dislike
$(document).ready(function(){
// if the user clicks on the like button ...
$('body').on('click','.post-info-review a', function(){
  var post_id = $(this).attr('data-id');
  
  var review_id = $(this).data('review_id');
  var a_response=$(".modal-content");
    
  var datatype= $(this).data('rtype');
  if(post_id==''){
	   if(datatype==1){
		var a_request_reg ='action=GET_LOGIN&requesttype=review_like&requesttype_id='+review_id+'&control_by='+$("#admin_id").val();
	}if(datatype==2){
var a_request_reg ='action=GET_LOGIN&requesttype=review_dislike&requesttype_id='+review_id+'&control_by='+$("#admin_id").val();
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
		
		var data= 'action_review=' + action + '&post_id=' + post_id + '&r_id=' + review_id;
			
		like_dislike_review($clicked_btn,action,data,datatype);
		}
		if(datatype==2){		
		if ($clicked_btn.hasClass('fa-thumbs-o-down')) {action = 'qn_dislike'; } else if($clicked_btn.hasClass('fa-thumbs-down')){action = 'qn_undislike'; }
		var data= 'action_review=' + action + '&post_id=' + post_id + '&r_id=' + review_id;
	
		like_dislike_review($clicked_btn,action,data,datatype);
		} 		
		}
});
});

function like_dislike_review($clicked_btn,action,data,datatype){
	var get_login=$("#get_login").val();
	$.ajax({
			url: 'review-like.php',
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



//review comment
var loading_image='admin/img/loading.gif';
	var a_response=$(".modal-content");
	$("body").on("click","#add_data_comment",function(){	
	var review_id=$(this).data("review_id");
	var formname="form[name='comment_form"+review_id+"']";
	var a_response2=$(formname+" #error_comment");
	 if($(formname+" #c_description").val()==''){
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Comment </div>'); 
		return false;
	 }else{		
		var customer_id=$(formname+" #customer_id").val();
		if(customer_id==''){
		var a_request_reg ='action=GET_LOGIN&requesttype=review_comment&requesttype_id='+review_id+'&control_by='+$("#admin_id").val();	
		var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 		
		}else{	
		var a_url='execution/comment.php';
		var a_request = new FormData($(formname)[0]);
		var redirecturq=$("#url_redirect").val();
		$(formname+" #add_data_comment").hide();
		$(formname+" #add_data_comment").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturq);
		$(formname+" #loader").remove();
		$(formname+" #add_data_comment").show();		
		}
	}	  
});


// review comment reply
var loading_image='admin/img/loading.gif';
	var a_response=$(".modal-content");
	$("body").on("click","#add_data_comment_reply",function(){
		
		var comment_id=$(this).data("comment_id");
		
	var formname="form[name='comment_reply_form"+comment_id+"']";
	var a_response2=$(formname+" #error_reply");
	 if($(formname+" #r_name").val()==''){
	
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Reply </div>'); 
		return false;
	 }else{		
		var customer_id=$(formname+" #customer_id").val();
	//var customer_id=$("#customer_id").val();
		if(customer_id==''){
  var a_request_reg ='action=GET_LOGIN&requesttype=answer&requesttype_id='+comment_id+'&control_by='+$("#admin_id").val();	
		//var a_request_reg ='action=GET_LOGIN&requesttype=answer&control_by='+$("#admin_id").val();
	
		var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 
		
		}else{	
			var a_url='execution/comment.php';
			var a_request = new FormData($(formname)[0]);
		//var a_request = new FormData($("form[name='answer_form']")[0]);
		var redirecturq=$("#url_redirect").val();
		$("#add_data_comment_reply").hide();
		$("#add_data_comment_reply").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturq);
		$("#loader").remove();
		$("#add_data_comment_reply").show();
		
		}
	}	  
});



