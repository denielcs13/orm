	var loading_image='admin/img/loading.gif';
	var a_url='execution/login.php';
	var a_response=$(".modal-content");
	$("body").on("click","#popup_login",function(){
	var a_request_reg ='action=GET_LOGIN&requesttype= &control_by='+$("#admin_id").val();
	var redirecturl='profile';
	a_response.html('<img  id="loader" src="'+loading_image+'" />');
	fetch_data(a_url,a_request_reg,a_response,redirecturl); 	
	});
	$("body").on("click","#login",function(){ 
	  var a_response1=$("#titleline");
	 if($("#user_login3").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Your Email Id </div>'); 
		return false;
	 }else if($("#user_pass3").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Password</div>'); 
		return false;
	 }else{
		var update_from=new FormData($("#loginform3")[0])
		var requesttype=$("#requesttype_login").val();
		var requesttype_id=$("#requesttype_id_login").val();
		var redirecturl='profile';
		$("#login").hide();
		$("#login").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		login(a_url,update_from,a_response1,requesttype,requesttype_id,redirecturl);
		$("#loader").remove();
		$("#login").show();
		
	 }
	 }); 
	$("body").on("click","#popup_forgetpassword",function(){
	 var a_response1=$("#titleline");
	 if($("#forget_email").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Your Email Id </div>'); 
		return false;
	 }else{
		var update_from=$("#forgetpassword").serialize();
		var redirecturl='';
		$("#popup_forgetpassword").hide();
		$("#popup_forgetpassword").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		fetch_data(a_url,update_from,a_response1,redirecturl); 
		$("#loader").remove();
		$("#popup_forgetpassword").show();
		
	 }	
	});
	 
	

$( "body" ).on('click','#change',function() {
  $( "span.forget" ).toggle();
});
$( "body" ).on('click','#change2',function() {
  $( "span.forget" ).toggle();
});
 $("body").on("click","#update_register",function(){ 
	 var a_response1=$("#error-msg");
	 if($("#user_name").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Your Name </div>'); 
		return false;
/* 	 }else if($("#user_mobile").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Mobile Number </div>'); 
		return false;
	 }else if(!patternmobile.test($("#user_mobile").val())){
	
	a_response1.html('<div class="alert alert-danger"> Wrong Mobile Number.</div>');
	return false; */
	}else if($("#user_email").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Email ID</div>'); 
		return false;
	 
	 }else if(!patternemail.test($("#user_email").val())){
	a_response1.html('<div class="alert alert-danger"> Wrong EmailID.</div>').show().delay(5000).fadeOut("slow");
	return false;
	}else if($("#user_password").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Password</div>'); 
		return false;
	 } else{ 
	 var update_from=new FormData($("#form-insert")[0]);
	 var requesttype=$("#requesttype").val();
	 var requesttype_id=$("#requesttype_id").val();
	 var redirecturl='profile';
	$("#update_register").hide();
	$("#update_register").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
	login(a_url,update_from,a_response1,requesttype,requesttype_id,redirecturl);
	$("#loader").remove();
	$("#update_register").show();
	 
	 } 
	 }); 
	