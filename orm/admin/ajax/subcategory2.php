<?php include '../include/config.php';
include '../include/function.php';
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='INSERT' && is_numeric($_POST["category_add"])){
	//$dat=date('Y-m-d');

	$name = mysqli_real_escape_string($con,$_POST['sub_cat2_name']);
	$admin_id=$_POST["category_add"];
	$category = $_POST["cat_id"];
	$subcategory = $_POST["sub_cat_id"];
	if(isset($_POST["update_id"])  && is_numeric($_POST["update_id"])){
		
	$query="update subcategory2  set cat_id='".$category."',sub_cat2_name='".$name."' ,sub_cat_id='".$subcategory."',admin_id='".$admin_id."'  where admin_id='".$admin_id."' && sub_cat2_id='".$_POST["update_id"]."'";
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
	$query="insert into subcategory2 set sub_cat2_name='".$name."',cat_id='".$category."',sub_cat_id='".$subcategory."' ,admin_id='".$admin_id."'";
	if($con !=='' && $query !==''){
	$insert=insert_query($con,$query);	
	if($insert==1){
		echo $insert;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Added Subcategory2 </div>';
	}
	}else{
		echo '<div class="alert alert-danger">Invalid Request</div>';
	}
}
}
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='CHANGE_STATUS' && is_numeric($_POST["admin_id"])){
	$status=	$_POST["change_status"];
	$id=	$_POST["sub_cat2_id"];
	$admin_id=	$_POST["admin_id"];
	
	if($status=='0'){
	$query="update subcategory2  set status='1'  where  sub_cat2_id='".$id."' && admin_id='".$admin_id."'";
	}else{
	$query="update subcategory2 set status='0' where sub_cat2_id='".$id."' && admin_id='".$admin_id."'";	
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
	$id=	$_POST["sub_cat2_id"];
	$admin_id=	$_POST["admin_id"];
	if(!empty($id) && !empty($admin_id)){
	$query="delete from subcategory2 where sub_cat2_id='".$id."' && admin_id='".$admin_id."'";
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
		if($id=='' || !is_numeric($id)){
		$bnt='ADD';	
		}else{
			$bnt='Update';
		}
$query="Select * from subcategory2 where admin_id='".$admin_id."' && sub_cat2_id='".$id."' order by sub_cat2_id desc";
		$all_data=fetch_query($con,$query);
		
		echo ' <div class="modal-header  navbar-content model-nav clearfix">
          <button type="button" class="close" data-dismiss="modal" onClick="closepopup()" data-backdrop="static" data-keyboard="false">&times;</button>
          <h4 class="modal-title">'.$bnt.' Sub Category</h4>
        </div> <div class="modal-body"><div class="panel-body">
		<div id="error-subcatgory2"></div>

		<form method="post" id="form-update" enctype="multipart/form-data">
		<input type="hidden" name="action" value="insert">
		<input type="hidden" name="category_add" value="'.$admin_id.'"/>
		<input type="hidden" name="update_id" value="'.$id.'">		
        <div class="row">
														<div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Category * </label>
          <select name="cat_id" id="cat_id" class="form-control" data-admin_id="'.$admin_id.'" data-selected_id="'.$all_data[0]["cat_id"].'" required>
			<option >Select Category</option>';
						
					
             $query="Select * from category where admin_id='".$admin_id."' order by category_id desc";
				$i=1;					  
				$data=fetch_query($con,$query);
				if(!empty($data)){
					foreach($data as $cdata){						
						echo "<option   value='".$cdata['category_id']."'";
						echo ($all_data[0]["cat_id"]==$cdata['category_id'])?' selected':'';					
						echo ">".$cdata['category_name']."</option>";
					}
				}
                echo '</select>
                                                            </div>
                                                            </div>
															<div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Sub Category * </label>
          <select name="sub_cat_id" id="sub_cat_id" class="form-control"  required>
			<option value="">Select Sub Category</option>';
						
					
             $query2="Select * from subcategory1  where admin_id='".$admin_id."' && cat_id='".$all_data[0]["cat_id"]."'  order by sub_cat_id desc";
					 
					  $i=1;					  
				$data2=fetch_query($con,$query2);
				  
				if(!empty($data2)){
					foreach($data2 as $cdata2){
						
                   	echo "<option   value='".$cdata2['sub_cat_id']."'";
					echo ($all_data[0]["sub_cat_id"]==$cdata2['sub_cat_id'])?' selected':'';
					
					echo ">".$cdata2['sub_cat_name']."</option>";
					}
				
						  }
                        
												echo '</select>
                                                            </div>
                                                            </div>
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label"> Sub Category Name * </label>
																<input type="text" class="form-control" id="sub_cat2_name" name="sub_cat2_name" value="'.$all_data[0]["sub_cat2_name"].'" required />
                                                            </div>
                                                            </div>
															
															</div>
													       </form> 
																		   
                                                           </div>
                                                          
       </div></div>
        <div class="modal-footer">
		<input type="button"  value="Close" class="btn btn-danger" data-dismiss = "modal">
       <input type="button" name="submit" value="'.$bnt.' Sub Category" class="btn btn-success" id="update_category">
    
        </div>  ';

	}
	if(isset($_POST["action"]) && strtoupper($_POST["action"])=='GET_SUBCATLIST' && is_numeric($_POST["admin_id"])){
		$admin_id=$_POST["admin_id"];
		$selected_id=$_POST["selected_id"];
		$cat_id=$_POST["CAT_ID"];
		echo '<option value="">Select Sub Category</option>';
             $query2="Select * from subcategory1  where admin_id='".$admin_id."' && cat_id='".$cat_id."' order by sub_cat_id desc";
				$i=1;					  
				$data2=fetch_query($con,$query2);				  
				if(!empty($data2)){
					foreach($data2 as $cdata2){						
                   	echo "<option   value='".$cdata2['sub_cat_id']."'";
					echo ($selected_id==$cdata2['sub_cat_id'])?' selected':'';					
					echo ">".$cdata2['sub_cat_name']."</option>";
					}
				
						  }
	}

	?>