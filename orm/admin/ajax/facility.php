<?php include '../include/config.php';
include '../include/function.php';




if(isset($_POST["action"]) && strtoupper($_POST["action"])=='INSERT' && is_numeric($_POST["facility_add"])){
	date_default_timezone_set('Asia/Kolkata'); 

$dat=date("Y-m-d ");
//$dat=date('Y-m-d');

	$name = mysqli_real_escape_string($con,$_POST['f_name']);
	$admin_id=$_POST["facility_add"];
		$product_id= $_POST['product_id'];
	
	if(isset($_POST["update_id"])  && is_numeric($_POST["update_id"])){
		
	$query="update facility set f_name='".$name."',admin_id='".$admin_id."' ,f_date='".$dat."' where admin_id='".$admin_id."' && product_id='".$product_id."' && f_id='".$_POST["update_id"]."'";
	if($con !=='' && $query !==''){
	$update=update_query($con,$query);	
	if($update==1){
		echo $update;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To update facility </div>';
	}
	}else{
		echo '<div class="alert alert-danger">Invalid Request</div>';
	} 
}else{
	$query="insert into facility set f_name='".$name."',admin_id='".$admin_id."' , product_id='".$product_id."' , f_date='".$dat."'" ;
	if($con !=='' && $query !==''){
	$insert=insert_query($con,$query);	
	if($insert==1){
		echo $insert;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Added facility </div>';
	}
	}else{
		echo '<div class="alert alert-danger">Invalid Request</div>';
	}
}
}

	if(isset($_POST["action"]) && strtoupper($_POST["action"])=='DELETE_DATA' && is_numeric($_POST["admin_id"])){
	$id=	$_POST["f_id"];
	$admin_id=	$_POST["admin_id"];
	if(!empty($id) && !empty($admin_id)){
	$query="delete from facility where f_id='".$id."' && admin_id='".$admin_id."'";
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
		
		$product_id=$_POST["product_id"];
		
		
		if($id=='' || !is_numeric($id)){
		$bnt='Add';	
		}else{
			$bnt='Update';
		}
$query="Select * from facility where admin_id='".$admin_id."' && product_id='".$product_id."'  && f_id='".$id."' order by f_id desc";
		$all_data=fetch_query($con,$query);
		
		echo ' <div class="modal-header  navbar-content model-nav clearfix">
          <button type="button" class="close" data-dismiss="modal" onClick="closepopup()" data-backdrop="static" data-keyboard="false">&times;</button>
          <h4 class="modal-title">'.$bnt.' facility</h4>
        </div> <div class="modal-body"><div class="panel-body">
		<div id="error-msg"></div>

		<form method="post" id="form-update" enctype="multipart/form-data">
		<input type="hidden" name="action" value="insert">
		<input type="hidden" name="facility_add" value="'.$admin_id.'"/>
			<input type="hidden" name="product_id" value="'.$product_id.'">
		<input type="hidden" name="update_id" value="'.$id.'">		
        <div class="row">
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label"> Facility* </label>
  <input type="text" class="form-control" id="f_name" name="f_name" value="'.$all_data[0]["f_name"].'" required />
                                                            </div>
                                                            </div>
															</div>
													       </form> 
																		   
                                                           </div>
                                                          
       </div></div>
        <div class="modal-footer">
		<input type="button"  value="Close" class="btn btn-danger" data-dismiss = "modal">
       <input type="button" name="submit" value="'.$bnt.' Facility" class="btn btn-success" id="update_category">
    
        </div>  ';

	}

	

	?>