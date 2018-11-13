<?php include '../include/config.php';
include '../include/function.php';
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='INSERT' && is_numeric($_POST["admin_id"])){
	
	$dat=date("Y-m-d");
	$name = mysqli_real_escape_string($con,$_POST['c_company_name']);
	$subject = mysqli_real_escape_string($con,$_POST['c_subject']);
	$details = mysqli_real_escape_string($con,$_POST['c_details']);
	$category = $_POST['c_category'];
	//$country = $_POST['c_country'];	
	//$city = $_POST['c_city'];
	$zip = $_POST['c_zip_code'];
	$website = $_POST['c_website'];
	$video = $_POST['c_video_link'];	
	 $proof =$_FILES['c_image']['name'];
	$c_image="";
	if(!empty($proof)){
    $file_tep =$_FILES['c_image']['tmp_name'];
	$directory="../../image/complain/";
	$image_name='COM_'.$admin_id.date('ynj').round(microtime(true));
	$filename=upload_image($proof,$file_tep,$directory,$image_name);	
	if($filename !=''){
		$c_image=",c_image='".$filename."' ";
	}	
	}	
	 
	 if($_POST["update_id"] !='' && is_numeric($_POST["update_id"])){
	$query="update  complain  set  c_company_name  = '".$name."', c_subject = '".$subject."', c_details = '".$details."' , c_category = '".$category."', c_country = '".$country."', c_city = '".$city."', c_zip_code = '".$zip."' , c_website = '".$website."', c_video_link = '".$video."',c_date = '".$dat."'".$c_image." where admin_id='".$admin_id."'  && c_id='".$_POST["update_id"]."'";
		
	if($con !=='' && $query !==''){
	$update_query=update_query($con,$query);
	if($update_query==1){
		echo $update_query;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Updated Product </div>';
	}
	}else{
		echo '<div class="alert alert-danger">Invalid Request</div>';
	}
	}else{
		echo"only update";
	
	}
}
	if(isset($_POST["action"]) && strtoupper($_POST["action"])=='CHANGE_STATUS' && is_numeric($_POST["admin_id"])){
	$status=	$_POST["change_status"];
	$id=	$_POST["c_id"];
	$admin_id=	$_POST["admin_id"];
	
	if($status=='0'){
	$query="update complain set status='1'  where c_id='".$id."' && admin_id='".$admin_id."'";
	}else{
	$query="update complain set status='0' where c_id='".$id."' && admin_id='".$admin_id."'";	
	}
	if(!empty($query)){	
	$update=update_query($con,$query);
	if($update==1){
		echo $update;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Change Status </div>';
	}	
	}else{
	echo '<div class="alert alert-danger">Sorry Unable To Change Status </div>';	
	}
	
	}
	if(isset($_POST["action"]) && strtoupper($_POST["action"])=='DELETE_DATA' && is_numeric($_POST["admin_id"])){
	$id= $_POST["c_id"];
	$admin_id=	$_POST["admin_id"];
	
	
	if(!empty($id) && !empty($admin_id)){
		//echo "delete from complain where c_id='".$id."' && admin_id='".$admin_id."'";
	$query="delete from complain where c_id='".$id."' && admin_id='".$admin_id."'";
	$delete=delete_query($con,$query);
	if($delete==1){
		echo $delete;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Delete  </div>';
	}	
	}else{
	echo '<div class="alert alert-danger">Sorry Unable To Delete </div>';	
	}
	
	}
	
	if(isset($_POST["action"]) && strtoupper($_POST["action"])=='STRUCTURE' && is_numeric($_POST["admin_id"])){
		$admin_id=$_POST["admin_id"];
		$id=$_POST["id"];
		
		
		$query="Select * from complain where admin_id='".$admin_id."' && c_id='".$id."'";
								  
		$all_data=fetch_query($con,$query);
		
		
		echo ' <div class="modal-header  navbar-content model-nav clearfix">
          <button type="button" class="close" data-dismiss="modal" onClick="closepopup()" data-backdrop="static" data-keyboard="false">&times;</button>
          <h4 class="modal-title">Update Complain Details</h4>
        </div> <div class="modal-body"><div class="panel-body">
		<div id="error-msg"></div>
		<form method="post" id="form-update" enctype="multipart/form-data">
		<input type="hidden" name="action" value="insert">
		<input type="hidden" name="admin_id" value="'.$admin_id.'">
		<input type="hidden" name="update_id" value="'.$id.'">
        <div class="row">
                                                <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Company Name: * </label>
                                                            <input type="text" class="form-control" id="c_company_name" name="c_company_name" value="'.$all_data[0]["c_company_name"].'" required />
                                                            </div>
                                                            </div>	
															
															
															<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Complaint Subject: * </label>
                                                            <input type="text" class="form-control" id="c_subject" name="c_subject" value="'.$all_data[0]["c_subject"].'" required />
                                                            </div>
                                                            </div>
								<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Complaint Details: * </label>
                                                            <input type="text" class="form-control" id="c_details" name="c_details" value="'.$all_data[0]["c_details"].'" required />
                                                            </div>
                                                            </div>
                                                            </div>
												<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Category: * </label>
                                                            <input type="text" class="form-control" id="c_category" name="c_category" value="'.$all_data[0]["c_category"].'" required />
                                                            </div>
                                                            </div>						
                                               
															
                                                            <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> ZIP code (optional): * </label>
                                                            <input type="text" class="form-control" id="c_zip_code" name="c_zip_code" value="'.$all_data[0]["c_zip_code"].'" required />
                                                            </div>
                                                            </div>
															
                                                           <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Image: * </label>
                                                            <input type="file" class="form-control" id="c_image" name="c_image" value="'.$all_data[0]["c_image"].'" required />
                                                            </div>
                                                            </div>
															<div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label"> Website (optional): * </label>
                                                            <input type="text" class="form-control" id="c_website" name="c_website" value="'.$all_data[0]["c_website"].'" required />
                                                            </div>
                                                            </div>
															<div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label"> Video Link * </label>
															<input type="text" class="form-control" name="c_video_link" id="c_video_link" value="'.$all_data[0]["c_video_link"].'"/>
                                                            </div>
                                                            </div>
													      
                                                       </form>     
                                                            
                                                            </div>
                                                       <input type="hidden" name="company_add" value="1"/> 
													   
                                                           
       </div></div>
        <div class="modal-footer">
		<input type="button"  value="Close" class="btn btn-danger" data-dismiss = "modal">
       <input type="button" name="submit" value="Update" class="btn btn-success" id="update_company">
    
        </div>  ';
		?>
<input type="hidden" value="<?php echo  $all_data[0]["category_id"];  ?>" id="cat_id" />
<input type="hidden" value="<?php echo  $all_data[0]["subcategory1"];  ?>" id="cats1_id" />
<input type="hidden" value="<?php echo  $all_data[0]["subcategory2"];  ?>" id="cats2_id" />
		<script>
		var load_img='img/loading.gif';
		var cat_id=$("#cat_id").val();
		$("#category_name").after('<div id="loader"><img src="'+load_img+'" alt="loading subcategory" style="width:50%" /></div>');
	$.get('ajax/loadcategory.php?Category=Category&cat_id='+cat_id , function(data) {
	$("#category_name").html(data); 
	$('#loader').slideUp(200, function() {
	$(this).remove(); 
	});
	$("#category_name").change();
	});
	$("#category_name").change(function() {
	$(this).after('<div id="loader"><img src="'+load_img+'" alt="loading subcategory" style="width:50%" /></div>');
	$.get('ajax/loadcategory.php?subcategory1=' + $(this).val()+'&subcategory_p=' + $("#cats1_id").val(), function(data) {
	var option='<option>Select Category</option>';
	var data1=data;
	var result1=option+data;
	$("#subcategory1").html(result1); 
	$('#loader').slideUp(200, function() {
	$(this).remove(); 
	//$("#subcategory1").change();
	});
	});
	});
			$("#subcategory1").change(function() {
			$(this).after('<div id="loader"><img src="'+load_img+'" alt="loading subcategory" style="width:50%" /></div>');
			
			$.get('ajax/loadcategory.php?subcategory2=' + $(this).val()+'&subcategory2_p=' + $("#cats2_id").val(), function(data) {
			var option='<option>Select  CATEGORY</option>';
			var data1=data;
			var result=option+data;
			$("#subcategory2").html(result);
			$('#loader').slideUp(200, function() {
			$(this).remove();
			});
			});
			}); 
			</script>
		
		<?php

	}


?>