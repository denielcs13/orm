<?php include '../include/config.php';
include '../include/function.php';
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='INSERT' && is_numeric($_POST["admin_id"])){
	//$dat=date('Y-m-d');
	$name = mysqli_real_escape_string($con,$_POST['company_name']);
	$title = mysqli_real_escape_string($con,$_POST['title']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	$description = mysqli_real_escape_string($con,$_POST['description']);
	
	$category=$_POST['category'];
	$subcategory1=$_POST['subcategory1'];
	$subcategory2=$_POST['subcategory2'];
	//$rating = $_POST['rating'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$admin_id = $_POST['admin_id'];
	$mobile = $_POST['contact_no'];
	$pincode = $_POST['pin_code'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$latitude= $_POST['latitude'];
	$longnitude= $_POST['longnitude'];
	$map= $_POST['map_code'];
	$date= date("Y-m-d",strtotime($_POST['p_date']));
	$proof =$_FILES['image']['name'];
	$product_image='';
	if(!empty($proof)){
    $file_tep =$_FILES['image']['tmp_name'];
	$directory="../images/company/";
	$image_name='PRO_'.$admin_id.date('ynj').round(microtime(true));
	$filename=upload_image($proof,$file_tep,$directory,$image_name);
	
	if($filename !=''){
		$product_image=",product_image='".$filename."' ";
	}	
	
	}
	if($_POST["update_id"] !='' && is_numeric($_POST["update_id"])){
		$embed='';
		if(!empty($map)){
			$embed=",map_code='".$map."'";
		}
		$query="update  product set company_name='".$name."',category='".$category."',subcategory1='".$subcategory1."',subcategory2='".$subcategory2."',country='".$country."',state='".$state."',city='".$city."',mobile='".$mobile."',pin_code='".$pincode."',email='".$email."',title='".$title."',description='".$description."',address='".$address."',latitude='".$latitude."',longnitude='".$longnitude."',website='".$website."',p_date='".$date."'".$product_image.$embed." where admin_id='".$admin_id."' && company_id='".$_POST["update_id"]."'";	
		
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
		$query="insert into product set company_name='".$name."',category='".$category."',subcategory1='".$subcategory1."',subcategory2='".$subcategory2."',country='".$country."',state='".$state."',city='".$city."',mobile='".$mobile."',pin_code='".$pincode."',email='".$email."',title='".$title."',description='".$description."',address='".$address."',latitude='".$latitude."',longnitude='".$longnitude."',map_code='".$map."',website='".$website."',p_date='".$date."',admin_id='".$admin_id."'".$product_image;
	if($con !=='' && $query !==''){
	$insert=insert_query($con,$query);	
	if($insert==1){
		echo $insert;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Added Product </div>';
	}
	}else{
		echo '<div class="alert alert-danger">Invalid Request</div>';
	}
	}
	
	
	}
	if(isset($_POST["action"]) && strtoupper($_POST["action"])=='CHANGE_STATUS' && is_numeric($_POST["admin_id"])){
	$status=	$_POST["change_status"];
	$id=	$_POST["company_id"];
	$admin_id=	$_POST["admin_id"];
	
	if($status=='0'){
	$query="update product set status='1'  where company_id='".$id."' && admin_id='".$admin_id."'";
	}else{
	$query="update product set status='0' where company_id='".$id."' && admin_id='".$admin_id."'";	
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
	$id=	$_POST["company_id"];
	$admin_id=	$_POST["admin_id"];
	
	
	if(!empty($id) && !empty($admin_id)){
	$query="delete from product where company_id='".$id."' && admin_id='".$admin_id."'";
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
		
		if($id !='' || is_numeric($id)){
		$bnt='Update';	
		}else{
			$bnt='Add';
		}
		
		$query="Select * from product where admin_id='".$admin_id."' && company_id='".$id."' order by company_id desc";
								  
		$all_data=fetch_query($con,$query);
		
	
	
		
		echo ' <div class="modal-header  navbar-content model-nav clearfix">
          <button type="button" class="close" data-dismiss="modal" onClick="closepopup()" data-backdrop="static" data-keyboard="false">&times;</button>
          <h4 class="modal-title">'.$bnt.' Product</h4>
        </div> <div class="modal-body"><div class="panel-body">
		<div id="error-msg"></div>
		<form method="post" id="form-update" enctype="multipart/form-data">
		<input type="hidden" name="action" value="insert">
		<input type="hidden" name="admin_id" value="'.$admin_id.'">
		<input type="hidden" name="update_id" value="'.$id.'">
        <div class="row">
                                                <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label"> Product Name * </label>
                                                            <input type="text" class="form-control" id="company_name" name="company_name" value="'.$all_data[0]["company_name"].'" required />
                                                            </div>
                                                            </div>	
															
												<div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label"> Title * </label>
   <input type="text" class="form-control" name="title" id="title" value="'.$all_data[0]["title"].'" required />
                                                            </div>
                                                            </div>			
															<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Category * </label>
          <select name="category" id="category_name" class="form-control"  required>
			<option value="">Select Category</option>
													  ';
						
					
             
                        
												echo '</select>
                                                            </div>
                                                            </div>
								<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Sub Category  1* </label>
          <select name="subcategory1" id="subcategory1" class="form-control"  required>
			<option value="">Select Category</option>
													  ';
						
					
            
												echo '</select>
                                                            </div>
                                                            </div><div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Sub Category 2* </label>
          <select name="subcategory2" id="subcategory2" class="form-control"  required>
			<option value="">Select Category</option> ';
						
					
           
                        
												echo '</select>
                                                            </div>
                                                            </div>							
                                               
															<div class="col-sm-4">
                                                        <div class="form-group">
                                                          <label class="control-label"> Contact No * </label>
														  
      <input   type="number" pattern="[789][0-9]{9}" class="form-control" name="contact_no"  id="contact_no" maxlength="5" value="'.$all_data[0]["mobile"].'"   required />
                                                            </div>
                                                            </div>
															<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Email *</label>
  <input type="email" class="form-control" name="email"  id="email" value="'.$all_data[0]["email"].'" required />
                                                            </div>
                                                            </div>
                                                            
                                                           <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Upload Logo * </label>
 <input type="file" class="form-control" name="image" id="image"   />
  
                                                            </div>
                                                            </div>
								
                                                            <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label"> Address * </label>
    <input type="text" class="form-control" name="address" id="address" value="'.$all_data[0]["address"].'"required />
                                                            </div>
                                                            </div>
															<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Country * </label>
   <select name="country" id="country" class="form-control" data-select_state="'.$all_data[0]["state"].'" required>
			<option >Select Category</option>
													  ';
$query5="Select * from country order by country_name asc";
					 
					  $i=1;					  
				$data5=fetch_query($con,$query5);
				  
				if(!empty($data5)){
					foreach($data5 as $cdata5){
						
                   	echo "<option   value='".$cdata5['id']."'";
					echo ($all_data[0]["country"]==$cdata5['id'])?' selected':'';
					
					echo ">".$cdata5['country_name']."</option>";
					}
				}
            
												echo '</select>
                                                            </div>
                                                            </div>
															
															<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> State * </label>
   <select name="state" id="state" class="form-control" data-select_city="'.$all_data[0]["city"].'" required>
			<option >Select Category</option>
													  ';
 $query6="Select * from state where country_id='".$all_data[0]["country"]."' order by state_name asc";
					 
					  $i=1;					  
				$data6=fetch_query($con,$query6);
				  
				if(!empty($data6)){
					foreach($data6 as $cdata6){
						
                   	echo "<option   value='".$cdata6['id']."'";
					echo ($all_data[0]["state"]==$cdata6['id'])?' selected':'';
					
					echo ">".$cdata6['state_name']."</option>";
					}
				}
												echo '</select>
                                                            </div>
                                                            </div>
															<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> City * </label>
   <select name="city" id="city" class="form-control"  required>
			<option >Select Category</option>
													  ';
 $query3="Select * from city  where state_id='".$all_data[0]["state"]."' order by city_name asc ";
					 
					  $i=1;					  
				$data3=fetch_query($con,$query3);
				  
				if(!empty($data3)){
					foreach($data3 as $cdata3){
						
                   	echo "<option   value='".$cdata3['id']."'";
					echo ($all_data[0]["city"]==$cdata3['id'])?' selected':'';
					
					echo ">".$cdata3['city_name']."</option>";
					}
				
						  }
					
            
												echo '</select>
                                                            </div>
                                                            </div>
															
															<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Latitude  </label>
        <input type="text" class="form-control" name="latitude"  id="latitude" value="'.$all_data[0]["latitude"].'" />
                                                            </div>
                                                            </div>
															
															<div class="col-sm-4">
														<div class="form-group">
                                                            <label class="control-label"> Longitude  </label>
         <input type="text" class="form-control" name="longnitude"  id="longnitude" value="'.$all_data[0]["longnitude"].'" />
                                                            </div>
                                                            </div>
															
															<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Or Google Embeded code </label>
        <input type="text" class="form-control" name="map_code"  id="map" value="" />
		
                                                            </div>
                                                            </div>
															<div class="col-md-12">'.$all_data[0]["map_code"].'</div>
															
												<div class="col-md-4">
												<div class="form-group">
                                                            <label class="control-label"> Website Url * </label>
       <input type="website" name="website" class="form-control" id="project_duration" value="'.$all_data[0]["website"].'" />
                                                   </div>
                                                   </div>
                            <div class="col-md-4">
												<div class="form-group">
                                                            <label class="control-label"> Pin Code * </label>
       <input type="number" name="pin_code" class="form-control" id="pin_code" value="'.$all_data[0]["pin_code"].'" />
                                                   </div>
                                                   </div>                              
   
                                                            <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Date *</label>
       <input type="text" class="form-control " name="p_date" id="datepicker" required value="'.$all_data[0]["p_date"].'"/>
                                                            </div>
                                                            </div>
															<div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label"> Description * </label>
        <textarea name="description" id="description" >'.$all_data[0]["description"].'</textarea>
                                                            </div>
                                                            </div>
													      
                                                       </form>     
                                                            
                                                            </div>
                                                       <input type="hidden" name="company_add" value="1"/> 
													   
                                                           
       </div></div>
        <div class="modal-footer">
		<input type="button"  value="Close" class="btn btn-danger" data-dismiss = "modal">
       <input type="button" name="submit" value="'.$bnt.' Products" class="btn btn-success" id="update_company">
    
        </div>  ';
		?>
<input type="hidden" value="<?php echo  $all_data[0]["category_id"];  ?>" id="cat_id" />
<input type="hidden" value="<?php echo  $all_data[0]["subcategory1"];  ?>" id="cats1_id" />
<input type="hidden" value="<?php echo  $all_data[0]["subcategory2"];  ?>" id="cats2_id" />
<script src="../ckeditor/ckeditor.js"></script>


		<script>
		var est_details =CKEDITOR.replace( 'description' );
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