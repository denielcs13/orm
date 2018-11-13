<?php include '../include/config.php';
include '../include/function.php';
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='INSERT' && is_numeric($_POST["comment_add"])){
	//$dat=date('Y-m-d');

	$name = mysqli_real_escape_string($con,$_POST['c_description']);
	$admin_id=$_POST["comment_add"];
	
	if(isset($_POST["update_id"])  && is_numeric($_POST["update_id"])){
		
	$query="update comment set c_description='".$name."',admin_id='".$admin_id."' where admin_id='".$admin_id."' && c_id='".$_POST["update_id"]."'";
	if($con !=='' && $query !==''){
	$update=update_query($con,$query);	
	if($update==1){
		echo $update;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To update Category </div>';
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
	$id=	$_POST["c_id"];
	$admin_id=	$_POST["admin_id"];
	
	if($status=='1'){
	$query="update comment set status='2'  where c_id='".$id."' && admin_id='".$admin_id."'";
	}else{
	$query="update comment set status='1' where c_id='".$id."' && admin_id='".$admin_id."'";	
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
	$id=	$_POST["c_id"];
	$admin_id=	$_POST["admin_id"];
	if(!empty($id) && !empty($admin_id)){
	$query="delete from comment where c_id='".$id."' && admin_id='".$admin_id."'";
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
		/* if($id=='' || !is_numeric($id)){
		$bnt='Add';	
		}else{
			$bnt='Update';
		} */
$query="Select * from comment where admin_id='".$admin_id."' && c_id='".$id."' order by c_id desc";
		$all_data=fetch_query($con,$query);
		
		echo ' <div class="modal-header  navbar-content model-nav clearfix">
          <button type="button" class="close" data-dismiss="modal" onClick="closepopup()" data-backdrop="static" data-keyboard="false">&times;</button>
          <h4 class="modal-title">Update Comment</h4>
        </div> <div class="modal-body"><div class="panel-body">
		<div id="error-msg"></div>

		<form method="post" id="form-update" enctype="multipart/form-data">
		<input type="hidden" name="action" value="insert">
		<input type="hidden" name="comment_add" value="'.$admin_id.'"/>
		<input type="hidden" name="update_id" value="'.$id.'">		
        <div class="row">
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label"> Comment Name * </label>
  <input type="text" class="form-control" id="c_description" name="c_description" value="'.$all_data[0]["c_description"].'" required />
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

	}

	

	?>