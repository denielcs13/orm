var a_url='execution/login.php';
	var a_response=$(".modal-content");	
	$("body").on("click","#add_more",function(){ 
	var a_request="action=MOREDETAILS"+"&admin_id="+$(this).data("admin_id")+"&id="+$(this).data("id");
	a_response.html('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" style="width:50%" /></div>');
	 var redirecturl='';
	fetch_data(a_url,a_request,a_response,redirecturl);	
	$('#loader').slideUp(200, function() {
	$(this).remove(); 
	});
	});
	var loading_image ='admin/img/loading.gif';
	var a_urlc='execution/contact-mail.php';
	$("body").on("click","#a-contact",function(){ 
	var a_requestc="action=Contactform";
	a_response.html('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" style="width:50%" /></div>');
	 var redirecturlc='';
	fetch_data(a_urlc,a_requestc,a_response,redirecturlc);	
	$('#loader').slideUp(200, function() {
	$(this).remove(); 
	});
	});
$("body").on("click","#submit-contact",function(){ 
	var response_msg=$("#error-contact");
	var name=$("#name").val();
	var email=$("#email").val();
	var mobile=$("#mobile").val();
	var subject=$("#subject").val();
	var messages=$("#messages").val();
	if(name==''){
	response_msg.show().html('<div class="alert alert-danger">Please Enter Your Name </div>'); 
	return false;	
	}else if(email==''){
	response_msg.show().html('<div class="alert alert-danger">Please Enter Your Email Id </div>'); 
	return false;	
	}else if(mobile==''){
	response_msg.show().html('<div class="alert alert-danger">Please Enter Your Mobile Number </div>'); 
	return false;	
	}else if(subject==''){
	response_msg.show().html('<div class="alert alert-danger">Please Enter Your Subject </div>'); 
	return false;	
	}else if(messages==''){
	response_msg.show().html('<div class="alert alert-danger">Please Enter Your Message </div>'); 
	return false;	
	}else{
	var a_requestc=$("form#enquiry-form").serialize();
	$("#submit-contact").hide();
	$("#submit-contact").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
	var redirecturlc='';
	fetch_data(a_urlc,a_requestc,response_msg,redirecturlc);	
	$("#loader").remove();
	$("#submit-contact").show();
	}
	});	