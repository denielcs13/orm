<?php include '../include/config.php';
include '../include/function.php';
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='INSERT' && is_numeric($_POST["review_add"])){
	//$dat=date('Y-m-d');

	$name = mysqli_real_escape_string($con,$_POST['r_title']);
	$description = mysqli_real_escape_string($con,$_POST['r_description']);
	$admin_id=$_POST["review_add"];
	$rating=$_POST["rating"];
	
	if(isset($_POST["update_id"])  && is_numeric($_POST["update_id"])){
		
	$query="update review set r_title='".$name."',r_description='".$description."',r_rating='".$rating."' ,admin_id='".$admin_id."' where admin_id='".$admin_id."' && r_id='".$_POST["update_id"]."'";
	if($con !=='' && $query !==''){
	$update=update_query($con,$query);	
	if($update==1){
		echo $update;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To update </div>';
	}
	}else{
		echo '<div class="alert alert-danger">Invalid Request</div>';
	} 
}else{
	echo 'update not found';
}
}
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='CHANGE_STATUS' && is_numeric($_POST["admin_id"])){
	$status=	$_POST["change_status"];
	$id=		$_POST["r_id"];
	$admin_id=	$_POST["admin_id"];
	
	
	if($status=='0'){
	$query="update review set status='1'  where r_id='".$id."' && admin_id='".$admin_id."'";
	}else{
	$query="update review set status='2' where r_id='".$id."' && admin_id='".$admin_id."'";	
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
	$id=	$_POST["r_id"];
	$admin_id=	$_POST["admin_id"];
	if(!empty($id) && !empty($admin_id)){
	$query="delete from review where r_id='".$id."' && admin_id='".$admin_id."'";
	$delete=delete_query($con,$query);
	if($delete==1){
		echo $delete;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Delete Data </div>';
	}	
	}else{
	echo '<div class="alert alert-danger">Sorry Unable To Delete </div>';	
	}
	
	}
		if(isset($_POST["action"]) && strtoupper($_POST["action"])=='STRUCTURE' && is_numeric($_POST["admin_id"])){
		$admin_id=$_POST["admin_id"];
		$id=$_POST["id"];
		
$query="Select r_title,r_description from review where admin_id='".$admin_id."' && r_id='".$id."'";
		$all_data=fetch_query($con,$query);;
		
		echo ' <div class="modal-header  navbar-content model-nav clearfix">
          <button type="button" class="close" data-dismiss="modal" onClick="closepopup()" data-backdrop="static" data-keyboard="false">&times;</button>
          <h4 class="modal-title">Update Review</h4>
        </div> <div class="modal-body"><div class="panel-body">
		<div id="error-msg"></div>

		<form method="post" id="form-update" enctype="multipart/form-data">
		<input type="hidden" name="action" value="insert">
		<input type="hidden" name="review_add" value="'.$admin_id.'"/>
		<input type="hidden" name="update_id" value="'.$id.'">		
        <div class="row">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"> Review Title * </label>
  <input type="text" class="form-control" id="r_title" name="r_title" value="'.$all_data[0]["r_title"].'" required />
                                                            </div>
                                                            </div>
															<div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"> Review Description * </label>
  <textarea id="r_description" name="r_description" >'.$all_data[0]["r_description"].'</textarea>
                                                            </div>
                                                            </div>
										<div class="col-md-12">
							<div class="form-group">
								<label for="username"> Rating *</label>
								<select  name="rating" class="form-control" required  >
								<option>Select Rating </option>

';for($i=1;$i<=5;$i++){
			echo "<option value='".$i."'";  
			echo ($all_data[0]["r_rating"]==$i)?' selected':'';
			echo ">".$i."</option>";
}
			


		echo'</select>
							</div> 
							</div>						
															</div>
													       </form> 
																		   
                                                           </div>
                                                          
       </div></div>
        <div class="modal-footer">
		<input type="button"  value="Close" class="btn btn-danger" data-dismiss = "modal">
       <input type="button" name="submit" value="Update" class="btn btn-success" id="update_category">
    
        </div>  ';
		?>
		<script>var est_details =CKEDITOR.replace( 'r_description' );
   
   </script><?

	}

	

	?>