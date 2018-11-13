/* var loading_image='admin/img/loading.gif';
	
	var a_response=$(".modal-content");
	$("body").on("click","#add_data",function(){
	var a_response2=$("#error_review");		 
	  if($("#r_title").val()==''){
		a_response2.show().show().html('<div class="alert alert-danger">Please Enter Title </div>'); 
		return false;
	
	 }else if($("#r_rating").val()==''){
		a_response2.show().html('<div class="alert alert-danger">Please Enter Rating  </div>'); 
		return false;
	 }else if($("#message").val()==''){
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Review</div>'); 
		return false;
	 } else{		
		var customer_id=$("#customer_id").val();
		if(customer_id==''){
		var a_request_reg ='action=GET_LOGIN&requesttype=review&control_by='+$("#admin_id").val();
		//$("#contact-login").serialize();
		//var a_request_reg = new FormData($("#contact-login")[0]);
		var a_url='execution/login.php';
		var redirecturl='';
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 		
		}else{	
		var a_request = new FormData($("#contact-form")[0]);
		var a_url='execution/review.php';
		var redirecturl='profile';
		$("#add_data").hide();
		$("#add_data").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturl);
		$("#loader").remove();
		$("#add_data").show();
		
		}
	}	  
}); */

	var loading_image='admin/img/loading.gif';
	
	var a_response=$(".modal-content");
	$("body").on("click","#add_data",function(){
	var a_response2=$("#error_review");	
	$("#message").val(editor.getData());	
	  if($("#r_title").val()==''){
		a_response2.show().show().html('<div class="alert alert-danger">Please Enter Title </div>'); 
		return false;
	
	 }else if($("[name='r_rating']:checked").length<=0){
		a_response2.show().html('<div class="alert alert-danger">Please Select Rating  </div>'); 
		return false;
	 }else if($("#message").val()=='' || $("#message").val()=='<p></p>' || $("#message").val()=='<p> </p>' || $("#message").val()=='<p>&nbsp;</p>'){
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Review</div>'); 
		return false;
		}else if($("#chk").val()==""){
		 //$(window).scrollTop($(".thumb-box4").offset().top);
		a_response2.show().html('<div class="alert alert-danger">Please  Enter Captcha Code.</div>'); 
		return false;
		}else if($("#ran").val()!=$("#chk").val()){
	 //$(window).scrollTop($(".thumb-box4").offset().top);
a_response2.show().html('<div class="alert alert-danger">Captcha Code Does Not Match.</div>'); 
return false;
	 } else{		
		var customer_id=$("#customer_id").val();
		if(customer_id==''){
		var a_request_reg ='action=GET_LOGIN&requesttype=review&control_by='+$("#admin_id").val();
		//$("#contact-login").serialize();
		//var a_request_reg = new FormData($("#contact-login")[0]);
		var a_url='execution/login.php';
		var redirecturl='';
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 		
		}else{	
		var a_request = new FormData($("#contact-form")[0]);
		var a_url='execution/review.php';
		var redirecturl=$('#url_redirect').val();
		$("#add_data").hide();
		$("#add_data").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturl);
		$("#loader").remove();
		$("#add_data").show();
		
		}
	}	  
});