var a_url='ajax/review.php';	
$("body").on("click","#change_status",function(){	   
		   var thisval=$(this).parent();
		   var a_status=$(this).data('status');
		   var a_id=$(this).data('id');
		   var admin_id=$(this).data('admin_id');
		   var error_id=$("#error-msg-page");
		   var postdata="action=CHANGE_STATUS&change_status="+a_status+"&r_id="+a_id+"&admin_id="+admin_id; 
		   var activedata='<td> <span class="btn btn-success">Accept</span></td>';
		   var inactivedata='<td><span class="btn btn-danger">Reject</span></td>';
		 update_status(a_status,a_id,thisval,a_url,postdata,activedata,inactivedata,error_id);
	   });
	   $("body").on("click","#edit_review",function(){
	var a_response=$(".modal-content");	
	var a_id=$(this).data('id');
	var admin_id=$(this).data('admin_id');
	var error_id=$("#error-msg-page");
	var postdata="action=STRUCTURE&id="+a_id+"&admin_id="+admin_id; 
	var redirecturl='';
	a_response.html('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" style="width:50%" /></div>');
	fetch_data(a_url,postdata,a_response,redirecturl);	
	$('#loader').slideUp(200, function() {
	$(this).remove(); 
	});
});
	  $("body").on("click","#update_review",function(){ 
	  var a_response1=$("#error-msg");
	 if($("#review_title").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Review Title </div>'); 
		return false;
	 }else if($("#review_detail").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Review  </div>'); 
		return false;
	 } else{
	 var update_from=new FormData($("#form-update")[0])
	 var a_request1=update_from;
	 $("#update_review").css("display","none");
	 $("#update_review").after('<img id="login_image" src="img/loading.gif" alt="loading subcategory" width="5%" />');
	 var redirecturl='';
	 insert_data(a_url,a_request1,a_response1,redirecturl);
	 $('#login_image').slideUp(200, function() {
		$(this).remove(); 
	}); 
	$("#update_review").show();
	 }
	 }); 