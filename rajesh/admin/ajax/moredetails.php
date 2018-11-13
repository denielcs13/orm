<?php include '../include/config.php';
include '../include/function.php';

	
//$id=$_GET['company_id'];A
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='INSERT' && is_numeric($_POST["admin_id"])){
	$dat=date('Y-m-d');
	$maintitle = mysqli_real_escape_string($con,$_POST['main_title']);
	$product_id= $_POST['product_id'];
	$title_id_pre= $_POST['title_id'];
	if(!empty($title_id_pre) && is_numeric($title_id_pre)){
		$query="update title set title_name='".$maintitle."' where admin_id='".$admin_id."' && product_id='".$product_id."' && title_id='".$title_id_pre."'";
		if($con !=='' && $query !==''){
		$update=update_query($con,$query);	
		$textbox = $_POST['textbox'];
		$textbox_id = $_POST['textbox_id'];
		if($update==1){
		if(!empty($textbox)){
		$delete=delete_query($con,"delete from subtitle where admin_id='".$admin_id."' && product_id='".$product_id."' && title_id='".$title_id_pre."'");
		foreach($textbox as $val){
		if(!empty($val)){
		$sub_maintitle = mysqli_real_escape_string($con,$val);
		$query_sub="insert into subtitle set sub_t_name='".$sub_maintitle."',title_id='".$title_id_pre."',sub_t_date='".date('Y-m-d')."',product_id='".$product_id."',admin_id='".$admin_id."'";
		$insert1=insert_query($con,$query_sub);	
		}		
		}
		}
		echo $update;
		}else{
		echo '<div class="alert alert-danger">Sorry Unable To Update Title </div>';	
		}
		}else{
		echo '<div class="alert alert-danger">Sorry Unable To Update Title </div>';		
		}
	}else{
	$query="insert into title set title_name='".$maintitle."',title_date='".$dat."',admin_id='".$admin_id."',product_id='".$product_id."'";
	if($con !=='' && $query !==''){
	$insert=insert_query($con,$query);	
	$textbox = $_POST['textbox'];
	if($insert==1){
		$title_id=mysqli_insert_id($con);
		if(!empty($textbox)){
		foreach($textbox as $val){
		if(!empty($val)){
		$sub_maintitle = mysqli_real_escape_string($con,$val);
		$query_sub="insert into subtitle set sub_t_name='".$sub_maintitle."',title_id='".$title_id."',sub_t_date='".date('Y-m-d')."',product_id='".$product_id."',admin_id='".$admin_id."'";
		$insert1=insert_query($con,$query_sub);	
		}		
		}
	}
		echo $insert;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Added Title </div>';
	}
	}else{
		echo '<div class="alert alert-danger">Invalid Request</div>';
	}
}
}
	if(isset($_POST["action"]) && strtoupper($_POST["action"])=='DELETE_DATA' && is_numeric($_POST["admin_id"])){
	//$p_id=	$_POST["product_id"];
	$id=	$_POST["title_id"];
	$admin_id=	$_POST["admin_id"];
	
	
	if(!empty($id) && !empty($admin_id)){
	$query="delete from title where title_id='".$id."' && admin_id='".$admin_id."'";
	$delete=delete_query($con,$query);
	if($delete==1){
		$id=$_POST['title_id'];
		$admin_id=	$_POST["admin_id"];
		
		if(!empty($id) && !empty($admin_id)){
	$query="delete from subtitle where title_id='".$id."' && admin_id='".$admin_id."'";
	$delete=delete_query($con,$query);
		
		}
		echo $delete;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Delete Data </div>';
	}	
	}else{
	echo '<div class="alert alert-danger">Sorry Unable To Delete </div>';	
	}
	
	}
 
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='MOREDETAILS' && is_numeric($_POST["admin_id"])) {
	$admin_id=$_POST["admin_id"];
	$id=$_POST["id"];
	$product_id=$_POST["product_id"];
	//$t_id=$_POST["title_id"];
	if($id !='' || is_numeric($id)){
	$bnt='Update';	
	}else{
		$bnt='Add';
	}
	$query="Select title_name from title where admin_id='".$admin_id."' && product_id='".$product_id."' && title_id='".$id."' order by title_id desc";
	$all_data=fetch_query($con,$query);
	if(!empty($all_data)){
	$query2="Select * from subtitle where admin_id='".$admin_id."' && product_id='".$product_id."' && title_id='".$id."' order by sub_t_id desc";
	$all_data2=fetch_query($con,$query2);
	}
	
 echo '<div class="modal-header  navbar-content model-nav clearfix">
        <button type="button" class="close" data-dismiss="modal" onClick="closepopup()" data-backdrop="static" data-keyboard="false">&times;</button>
          <h4 class="modal-title">'.$bnt.' TITLE</h4>
        </div> <div class="modal-body"><div class="panel-body">
		<div id="error-msg"></div>
	<form method="post" id="form-update">
	<input type="hidden" name="action" value="insert">
	<input type="hidden" name="admin_id" value="'.$admin_id.'">
	<input type="hidden" name="product_id" value="'.$product_id.'">
	<input type="hidden" name="title_id" value="'.$id.'">
	<div class="row">
	<div class="col-sm-12">
	<div class="form-group">
	<label class="control-label"> Main Title :</label>
	<input type="text" class="form-control" id="main_title" placeholder="Enter Main Title" name="main_title" required value="'.$all_data[0]["title_name"].'"  />
	</div>
	</div>
							<br>';
				if(!empty($all_data)){
echo '
<div id="TextBoxesGroup">
<div id="TextBoxDiv1">';

foreach ($all_data2 as $datasub){
echo '<div class="col-sm-3">
<div class="form-group">
<label class="control-label"> SUB TITLE1 :</label>
<input type="text" class="form-control" placeholder="Enter Sub Title Name" name="textbox[]"  id="textbox1"  value="'.$datasub["sub_t_name"].'" />
<input type="hidden" name="textbox_id[]" value="'.$datasub["sub_t_id"].'" />
</div>
</div>';	
}
echo '
</div>
</div>
';

				}else{
echo '
<div id="TextBoxesGroup">
<div id="TextBoxDiv1">
<div class="col-sm-3">
<div class="form-group">
<label class="control-label"> SUB TITLE1 :</label>
<input type="text" class="form-control" placeholder="Enter Sub Title Name" name="textbox[]"  id="textbox1" required />
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label class="control-label"> SUB TITLE 2 :</label>
<input type="text" class="form-control" placeholder="Enter Sub Title Name" name="textbox[]"  id="textbox1" required />

</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label class="control-label"> SUB TITLE 3 :</label>
<input type="text" class="form-control" placeholder="Enter Sub Title Name" name="textbox[]"  id="textbox1" required />
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label class="control-label"> SUB TITLE 4 :</label>
<input type="text" class="form-control" placeholder="Enter Sub Title Name" name="textbox[]"  id="textbox1" required />
</div>
</div>

</div>
</div>
';
				}				
echo '
<br>
<div class="col-sm-2">
<input type="button" value="Add More Box" class="btn btn-info btn-mint" id="addButton"></div>

	
</form>
</div>
</div>
</div>
												<div class="modal-footer">
												<input class="btn btn-success" id="update_title" name="update_title" type="button" value="'.$bnt.' Title">
												
														<input type="button"  value="Close" class="btn btn-danger" data-dismiss = "modal">
      
    
								</div>';
		
}
															
															
	?>