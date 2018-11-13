<?php include('include/config.php'); ?>
<?php include('include/top-menu.php'); ?>
<?php include('include/header.php'); ?>



  <div class="boxed">
    
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
      <div class="pageheader hidden-xs">
        <h3><i class="fa fa-file-text-o"></i>Product</h3>
        <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
          <ol class="breadcrumb">
            <li> <a href="dashbord.php"> Home </a> </li>
            <li class="active">Product</li><li><a  href='company'>Back</a></li>
          </ol>
        </div>
      </div>
      <!--Page content-->
      <!--===================================================-->
    
      <div id="page-content">
        <div class="row">
          <div class="eq-height">
            <div class="col-sm-12 eq-box-sm">
              <div class="panel">
              <?
			  $id=$_GET["id"];
		
		if($id !='' || is_numeric($id)){
		$bnt='Update';	
		}else{
			$bnt='Add';
		}
		
		$query="Select * from product where admin_id='".$admin_id."' && company_id='".$id."' order by company_id desc";
								  
		$all_data=fetch_query($con,$query);
		?>
              <div class="row"><div class="col-lg-12">   <div class="modal-header  navbar-content model-nav clearfix"> <?= '  <h4 class="modal-title">'.$bnt.' Product</h4>'; ?>
  </div>
  </div>
  </div>
  <hr>
                <div class="panel-body">
				<?php 
				
				
				
				//$admin_id=$_POST["admin_id"];
		
		
	
	
		
		echo '
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
			<option >Select Category</option>
													  ';
						
					
             
                        
												echo '</select>
                                                            </div>
                                                            </div>
								<div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Sub Category  1* </label>
          <select name="subcategory1" id="subcategory1" class="form-control"  required>
			<option >Select Category</option>
													  ';
						
					
            
												echo '</select>
                                                            </div>
                                                            </div><div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Sub Category 2* </label>
          <select name="subcategory2" id="subcategory2" class="form-control"  required>
			<option >Select Category</option>
													  ';
						
					
           
                        
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
                                                        <div class="col-sm-12">
                                                        <div class="form-group"> <input type="button" name="submit" value="'.$bnt.' Products" class="btn btn-success" id="update_company">
</div></div>														
                                                            </div>  ';
?><input type="hidden" value="<?php echo  $all_data[0]["category_id"];  ?>" id="cat_id" />
<input type="hidden" value="<?php echo  $all_data[0]["subcategory1"];  ?>" id="cats1_id" />
<input type="hidden" value="<?php echo  $all_data[0]["subcategory2"];  ?>" id="cats2_id" />
                </div>
                <!--===================================================-->
                <!--End Block Styled Form -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--===================================================-->
      <!--End page content-->
    </div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->
  </div>

  <script src="ckeditor/ckeditor.js"></script>
<script>
		var est_details =CKEDITOR.replace( 'description' );
		
			</script>

<?php include('include/footer.php'); ?>
<script>

$(document).ready(function(){
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
	a_url='ajax/company.php';
 $("body").on("click","#update_company",function(){ 
	  var a_response1=$("#error-msg");
	 if($("#company_name").val()==''){
		 $(window).scrollTop($("#page-content").offset().top);
		a_response1.show().html('<div class="alert alert-danger">Please Enter Company Name </div>'); 
		return false;
	 }else if($("#contact_no").val()==''){
		  $(window).scrollTop($("#page-content").offset().top);
		a_response1.show().html('<div class="alert alert-danger">Please Enter Mobile Number </div>'); 
		return false;
	 }else if($("#email").val()==''){
		  $(window).scrollTop($("#page-content").offset().top);
		a_response1.show().html('<div class="alert alert-danger">Please Enter Email ID</div>'); 
		return false;
	 }else if($("#datepicker").val()==''){
		  $(window).scrollTop($("#page-content").offset().top);
		a_response1.show().html('<div class="alert alert-danger">Please Enter Date</div>'); 
		return false;
	 }else if($("#title").val()==''){
		  $(window).scrollTop($("#page-content").offset().top);
		a_response1.show().html('<div class="alert alert-danger">Please Enter Title</div>'); 
		return false;
	 } else{
	 var update_from=new FormData($("#form-update")[0])
	 var a_request1=update_from;
	 $("#update_company").css("display","none");
	 $("#update_company").after('<img id="login_image" src="img/loading.gif" alt="loading subcategory" width="5%" />');
	 var redirecturl=' ';
	 insert_data(a_url,a_request1,a_response1,redirecturl);
	 $('#login_image').slideUp(200, function() {
		$(this).remove(); 
	}); 
	$("#update_company").show();
	 $(window).scrollTop($("#page-content").offset().top);
	 }
	 }); 
	
});
</script> 
 <script src="js/myjs/location.js" ></script> 
<script src="js/myjs/function.js" ></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
$('body').on('focus',"#datepicker", function(){
	$(this).datepicker({
	dateFormat: "dd-mm-yy",
	yearRange:"-1:+3",
	changeMonth:true,
	changeYear:true,
	maxDate: 0
		});
	});	
});
</script>