<?php 
include('includes/header.php');
include 'admin/include/function.php';
 /* if(empty($_SESSION["product_view"])){
?>
<script>window.location="index";</script>
<?php
}   */
$review_customer_id=(isset($_SESSION["review_customer_id"]))?$_SESSION["review_customer_id"]:'';
?>

<style>
input[type="email"]
{
	background-color:white;
}

</style>

<div class="content indent">

    <!--content-->

<div class="thumb-box4" >
  <div class="container">
	<h3 class="indent2 wow fadeIn"><center>ADD New Details</center></h3>
	  <div class="contactForm2 col-md-12"  style="background-color:#F2F7F8;">
		<form method="post"  id="contact-form" enctype="multipart/form-data">
		   <div id="error_new_add"></div>
			<div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
									<strong> Product Name *</strong>
                                         <input type="hidden" name="action" id="action" value="NEWDETAIL">
										 <input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>
										 <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $review_customer_id; ?>"/>									
										 <input type="text" class="form-control" id="company_name" placeholder="Enter Product Name" name="company_name"  style="background-color:white;" required />
                                </div>
                            </div>	
							<div class="col-md-4">
                                <div class="form-group">
									<strong>Title *</strong>
                                         <input type="text" class="form-control" placeholder="Enter Title" style="background-color:white;" name="title" id="title"  required />
                                </div>
                            </div>			
							<div class="col-md-4">
                                <div class="form-group">
									<strong>Category *</strong>
                                        <select name="category_name" id="category_name" class="form-control"  data-admin_id="<?= $admin_id; ?>" ><!--onchange="yesnoCheck1(this);"-->
												<option >Select Category</option>
											<?php 
											$query=mysqli_query($con,"Select * from category where  status='1' order by category_name ASC");
												while($data=mysqli_fetch_assoc($query)){
														echo "<option   value='".$data['category_id']."'>".$data['category_name']."</option>";
												  }
											?>
												<option value="other1">Other</option>
										</select><br>
									<div id="ifYes1" style="display: none;">
										<input type="text" id="other1" class="form-control" style="background-color:white;" name="other1" placeholder="Enter Category"/><br />
									</div>
                                </div>
                            </div>
							<?php 
											/* 	$query1=mysqli_query($con,"Select * from subcategory1 where  status='1' order by sub_cat_name ASC");
													while($data1=mysqli_fetch_assoc($query1)){
														echo "<option   value='".$data1['sub_cat_id']."'>".$data1['sub_cat_name']."</option>";
														  } */
												?>
							<div class="col-md-4">
                                <div class="form-group">
									<strong>Sub Category  1*</strong>
                                        <select name="subcategory1" id="subcategory1" class="form-control"   data-admin_id="<?= $admin_id; ?>" ><!--onchange="yesnoCheck2(this);"-->
												<option >Select Category</option>
												
												<option value="other2" >Other</option>
										</select><br>
										<div id="ifYes2" style="display: none;">
											<input type="text" id="other2" name="other2" class="form-control" style="background-color:white;" placeholder="Enter Subcategory"/><br />
										</div>
                                </div>
                            </div>
							<?php /* 
													$query3=mysqli_query($con,"Select * from subcategory2 where  status='1' order by sub_cat2_name ASC");
														while($data3=mysqli_fetch_assoc($query3)){
																echo "<option   value='".$data3['sub_cat2_id']."'>".$data3['sub_cat2_name']."</option>";
														  } */
													?>
							<div class="col-md-4">
                                <div class="form-group">
									<strong>Sub Category 2*</strong>
										<select name="subcategory2" id="subcategory2" class="form-control" onchange="yesnoCheck3(this);" >
													<option >Select Category</option>
													
													 <option value="other3" >Other</option>
										</select><br>
										<div id="ifYes3" style="display: none;">
											<input type="text"  name="other3" class="form-control" style="background-color:white;"  placeholder="Enter Subcategory 2" /><br />
										</div>
                                </div>
                            </div>							
                                               
							<div class="col-md-4">
                                <div class="form-group">
									<strong>Contact No *</strong>
                                        <input   type="number" pattern="[789][0-9]{9}" class="form-control" name="contact_no"  id="contact_no" maxlength="10"   required />
								</div>
                            </div>
							<div class="col-md-4">
                                <div class="form-group">
									<strong> Email *</strong>
										<input type="email" class="form-control" name="email" placeholder="Enter Your Address" id="email" required>                                                        
								</div>
                            </div>
							
                            <!--div class="col-md-4">
								<div class="form-group">
									<strong>Rating *</strong>
										<select  name="rating" class="form-control" required  >
											<option>Select Rating </option>
											<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
									</select>
								</div> 
							</div-->
                            <div class="col-md-4">
                                <div class="form-group">
									<strong>Upload Logo *</strong>
                                        <input type="file" class="form-control" name="image" id="image"   />
								</div>
                            </div>
								
                            <div class="col-md-12">
                                <div class="form-group">
									<strong>Address *</strong>
										<input type="text" class="form-control" name="address" style="background-color:white;" placeholder="Enter Your Address" id="address" required />
                                </div>
                            </div>
		<?php /* 
		$country=mysqli_query($con,"Select * from country order by id ASC");
		while($cdata=mysqli_fetch_assoc($country)){
			echo "<option   value='".$cdata['id']."'>".$cdata['country_name']."</option>";
			  } */
												?>
							<div class="col-md-4">
                                <div class="form-group">
									<strong>Country *</strong>
										 <select name="country" id="country" class="form-control" >
												<option >Select Category</option>
												
										</select>
										
								</div>
                            </div>
							<?php /* 
							$state=mysqli_query($con,"Select * from state order by state_name ASC");
							while($sdata=mysqli_fetch_assoc($state)){
							echo "<option   value='".$sdata['id']."'>".$sdata['state_name']."</option>";
							} */
							
							?>
							<div class="col-md-4">
                                <div class="form-group">
									<strong>State *</strong>
										<select name="state" id="state" class="form-control" >
												<option >Select State</option>
												
										</select>
                                </div>
                            </div>
                                                            
							<div class="col-md-4">
                                <div class="form-group">
									<strong>City *</strong>
									<?php 
													/* $city=mysqli_query($con,"Select * from city order by id ASC");
													while($data=mysqli_fetch_assoc($city)){
														echo "<option   value='".$data['id']."'>".$data['city_name']."</option>";
														  } */
												?>
										<select name="city" id="city" class="form-control" onchange="yesnoCheck4(this);">
												<option >Select City</option>
												
										 <option value="other4" >Other</option>
										</select><br>
										<div id="ifYes4" style="display: none;">
											<input type="text"  name="other4" class="form-control" style="background-color:white;"  placeholder="Enter City Name" /><br />
										</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
									<strong>Latitude</strong>
                                        <input type="text" class="form-control" placeholder="Enter Latitude" style="background-color:white;" name="latitude"  id="latitude" >
                                </div>
                            </div>
							<div class="col-md-4">
								<div class="form-group">
									<strong>Longitude  </strong>
                                        <input type="text" class="form-control" placeholder="Enter Longitude" style="background-color:white;"name="longnitude"  id="longnitude" >
                                </div>
                            </div>
							<div class="col-md-4">
                                <div class="form-group">
									<strong>Or Google Embeded code</strong>
                                        <input type="text" class="form-control" name="map_code" style="background-color:white;"  placeholder="Enter Google Embeded code" id="map" value="" />
								</div>
                            </div>
							
							<div class="col-md-4">
								<div class="form-group">
									<strong>Website Url *</strong>
                                            <input type="website" name="website" placeholder="Enter Your Website Url" class="form-control" id="project_duration" >
                                </div>
                            </div>
							<div class="col-md-4">
                                <div class="form-group">
									<strong>Pin Code *</strong>
										<input type="number" class="form-control" name="pin_code" style="background-color:white;" placeholder="Enter Your Address" id="address" required />
                                </div>
								</div>
                            <div class="col-md-4">
                                <div class="form-group">
									<strong>Date *</strong>
                                        <input type="text" class="form-control" style="background-color:white;"   name="p_date" id="datepicker" required >
                                </div>
                            </div>
							<div class="col-md-12">
                                <div class="form-group">
                                    <strong>Description *</strong>
										<textarea class="form-control" name="description" id="description" ></textarea>
                                </div>
								
							</div>
						<? include 'includes/captcha.php'; ?>
						<br>
							<div class="col-md-4">
								<a class="btn btn-success lg"  name="submit" id="add_data" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?>>Submit</a>
				</form>  
			</div>
		</div>
	</div>

</div></div><br><br></div>

<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
	 <style>#contact-form p {
    float: none;
}.ck-editor__editable_inline {    height: 100px !important;}#contact-form label.ck-label,.ck-file-dialog-button{    display: none;} </style>
<?php  //include('includes/footer.php'); ?>
<script src="js/theme/location.js" ></script>
 <script src="admin/js/myjs/function.js" ></script>
<script>

ClassicEditor
        .create( document.querySelector( 'textarea#description' ) ).then( newEditor => {
        editor = newEditor;
    } ) .catch( error => {
            console.error( error );
        } );
	var a_url_cat='execution/category-filter.php';
	var redirecturl='';
	 $("body").on("change","#category_name",function(){
		var selval=$(this).find('option:selected').val(); 
		var a_response1=$("#subcategory1");
		var a_request1="action=GET_SUBCATLIST&CAT_ID="+selval+"&admin_id="+$(this).data("admin_id");
		document.getElementById("ifYes1").style.display = "none";
		document.getElementById("ifYes2").style.display = "none";
		document.getElementById("ifYes3").style.display = "none";
		
		if (selval== "other1") {           
            document.getElementById("ifYes1").style.display = "block";
        } 
		
		fetch_data(a_url_cat,a_request1,a_response1,redirecturl);
		
	 });
	 $("body").on("change","#subcategory1",function(){
		var selval1=$("#category_name").find('option:selected').val(); 
		var selval=$(this).find('option:selected').val(); 
		var a_response1=$("#subcategory2");
		var a_request1="action=GET_SUBCAT2LIST&SUBCAT_ID="+selval+"&admin_id="+$(this).data("admin_id")+"&CAT_ID="+selval1;
		document.getElementById("ifYes1").style.display = "none";
		document.getElementById("ifYes2").style.display = "none";
		document.getElementById("ifYes3").style.display = "none";
		 if (selval == "other2") {
           
            document.getElementById("ifYes2").style.display = "block";
        }
		fetch_data(a_url_cat,a_request1,a_response1,redirecturl)
	 });
 /* function yesnoCheck1(that) {
        if (that.value == "other1") {
           
            document.getElementById("ifYes1").style.display = "block";
        } else {
            document.getElementById("ifYes1").style.display = "none";
        }
    } */
	/*  function yesnoCheck2(that) {
        if (that.value == "other2") {
           
            document.getElementById("ifYes2").style.display = "block";
        } else {
            document.getElementById("ifYes2").style.display = "none";
        }
    } */
	 function yesnoCheck3(that) {
        if (that.value == "other3") {
           
            document.getElementById("ifYes3").style.display = "block";
        } else {
            document.getElementById("ifYes3").style.display = "none";
        }
    }
 function yesnoCheck4(that) {
        if (that.value == "other4") {
           
            document.getElementById("ifYes4").style.display = "block";
        } else {
            document.getElementById("ifYes4").style.display = "none";
        }
    }
var loading_image='admin/img/loading.gif';
	var a_response=$(".modal-content");
	$("body").on("click","#add_data",function(){
	var a_response2=$("#error_new_add");
	
	 if($("#company_name").val()==''){
		 $(window).scrollTop($(".thumb-box4").offset().top);
		a_response2.show().html('<div class="alert alert-danger">Please Enter Product </div>'); 
		return false;
	 }else if($("#title").val()==''){
		  $(window).scrollTop($(".thumb-box4").offset().top);
		a_response2.show().html('<div class="alert alert-danger">Please Enter Title  </div>'); 
		return false;
	 }else if($("#email").val()==''){
		  $(window).scrollTop($(".thumb-box4").offset().top);
		a_response2.show().html('<div class="alert alert-danger">Please  Enter Your Email Id.</div>'); 
		
		return false;
	 }else if($("#chk").val()==""){
		 $(window).scrollTop($(".thumb-box4").offset().top);
a_response2.show().html('<div class="alert alert-danger">Please  Enter Captcha Code.</div>'); 
return false;
}else if($("#ran").val()!=$("#chk").val()){
	 $(window).scrollTop($(".thumb-box4").offset().top);
a_response2.show().html('<div class="alert alert-danger">Captcha Code Does Not Match.</div>'); 
return false;
} else{
		 
		var customer_id=$("#customer_id").val();
			if(customer_id==''){
				
		var a_request_reg='action=GET_LOGIN&requesttype=product&control_by='+$("#admin_id").val();
	
		var redirecturl='';
		var a_url="execution/login.php";
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 		
		}else{	
		$("#description").val(editor.getData());
			var a_url_d='execution/add-new-details.php';
			
				var a_request = new FormData($("#contact-form")[0]);
		
		var redirecturq='';
		$("#add_data").hide();
		$("#add_data").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		var company_name=$.trim($("#company_name").val());
		 $.ajax({
			type: "POST",
			url: a_url_d,
			data: a_request,
			processData: false,
            contentType: false,
			success: function(response){
			if(response>1){
			window.location='product/'+response+'/'+company_name.replace(' ','-')+'-1.html';
			}else{ 
			a_response2.html(response).show().delay(5000).fadeOut("slow");	
			}
			return false;			
			}
		});
		//insert_data(a_url,a_request,a_response2,redirecturq);
		$("#loader").remove();
		$("#add_data").show();
//add_data
		}
	}	  
});


 </script>
 
 <?php  include('includes/footer.php'); ?>
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
