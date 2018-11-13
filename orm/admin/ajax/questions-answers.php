<?php include '../include/config.php';
include '../include/function.php';
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='INSERT' && is_numeric($_POST["category_add"])){
	//$dat=date('Y-m-d');

	$name = mysqli_real_escape_string($con,$_POST['category_name']);
	$admin_id=$_POST["category_add"];
	
	if(isset($_POST["update_id"])  && is_numeric($_POST["update_id"])){
		
	$query="update category set category_name='".$name."',admin_id='".$admin_id."' where admin_id='".$admin_id."' && category_id='".$_POST["update_id"]."'";
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
	$query="insert into category set category_name='".$name."',admin_id='".$admin_id."'";
	if($con !=='' && $query !==''){
	$insert=insert_query($con,$query);	
	if($insert==1){
		echo $insert;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Added Category </div>';
	}
	}else{
		echo '<div class="alert alert-danger">Invalid Request</div>';
	}
}
}
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='CHANGE_STATUS' && is_numeric($_POST["admin_id"])){
	$status=	$_POST["change_status"];
	$id=	$_POST["q_id"];
	$admin_id=	$_POST["admin_id"];
	
	if($status=='0'){
	$query="update question set status='1'  where q_id='".$id."' && admin_id='".$admin_id."'";
	}else{
	$query="update question set status='0' where q_id='".$id."' && admin_id='".$admin_id."'";	
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
	$id=$_POST["q_id"];
	$admin_id=	$_POST["admin_id"];
	if(!empty($id) && !empty($admin_id)){
	$query="delete from question where q_id='".$id."' && admin_id='".$admin_id."'";
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
		
	

	?>