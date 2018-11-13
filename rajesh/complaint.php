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
.select{
border:1px solid lightgray; 
height:38px;  
width:100%; 
}
</style>
<div class="content indent">

    <!--content-->

    <div class="thumb-box4" >
		<div class="container">
			<h3 class="indent2 wow fadeIn"><center>Complaint Registration Form</center></h3>
				<div class="contactForm2">

			<form id="contact-form"  method="post" enctype="multipart/form-data">
		<div class="contact-form-loader"></div>
	<fieldset>
<div id="error_compalin"></div>
                            <label class="name form-div-4">

                            <strong>Company Name:</strong>
		 <input type="hidden" name="action" id="action" value="NEWCOMPLAIN">
		 <input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>	
		 <input type="hidden" name="product_id" value=""/>	
		 <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $review_customer_id; ?>"/>
		<input type="text" name="c_company_name" id="c_company_name" placeholder="Company I'm complaining about..." value="" data-constraints="@Required @JustLetters"  required />
							</label>
							<!--label class="name form-div-2">

                            <strong>Rating: </strong>
		 <select name="c_rating" class="form-control"><option value="0">No Rating</option><option value="1">1 Star</option><option value="2">2 Star</option><option value="3">3 Star</option><option value="4">4 Star</option><option value="5">5 Star</option></select>
							</label-->
							
							<label class="name form-div-4">
	                        <strong>Complaint Subject:</strong>
		<input type="text" name="c_subject" id="c_subject" placeholder="Product/Subject I'm complaining about..." value="" data-constraints="@Required @JustLetters"  required />  
							</label>

						<label class="message form-div-4">
						<strong>Complaint Details</strong>

		<textarea name="c_details"  id="c_details"  placeholder="Please provide as much information as possible, but do NOT share your highly private details, such as phone/mobile number, credit card details etc. in this field, as it's visible for everyone."   maxlength="500" ></textarea>
						</label>
							
						<label class="name form-div-1">
						<strong>Category:</strong>
			
							<select name="c_category" id="c_category" class="select" onchange="yesnoCheck1(this);">
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
						</label>
							
						<label class="name form-div-3">
						<strong>Country:</strong>
		<select name="c_country" id="country"  class="select">
			
			<?php 
			$query1=mysqli_query($con,"Select * from country order by id ASC");
				while($data1=mysqli_fetch_assoc($query1)){
					echo "<option   value='".$data1['id']."'";
					echo ($data1["country"]==$data1['id'])?' selected':'';
					
					echo ">".$data1['country_name']."</option>";
					
						
				  }
			?>
			
			</select>
			 	</label>
						<label class="name form-div-1">
						<strong>State:</strong>
		<select name="c_state" id="state"   class="select">
			<option >Select state</option>
			<?php 
			/* $query2=mysqli_query($con,"Select * from state order by id ASC");
				while($data2=mysqli_fetch_assoc($query2)){
						echo "<option   value='".$data2['id']."'>".$data2['state_name']."</option>";
				  } */
			?>
			
			</select>
			  
						</label>
						
						
						<label class="name form-div-3">
						<strong>City :</strong>
		<select name="c_city" id="city" onchange="yesnoCheck3(this);" class="select"	>
			<option >Select City</option>
			<?php 
			/* $query3=mysqli_query($con,"Select * from city order by id ASC");
				while($data3=mysqli_fetch_assoc($query3)){
						echo "<option   value='".$data3['id']."'>".$data3['city_name']."</option>";
				  } */
			?>
			 <option value="other3">Other</option>
			</select><br>
			 <div id="ifYes3" style="display: none;">
     <input type="text"  id="other3" style="background-color:white;"  name="other3" placeholder="Enter City Name" /><br />
    </div>		 
						</label>
						
						<label class="name form-div-1">
                        <strong>ZIP code (optional):</strong>
		<input type="number" name="c_zip_code" id="c_zip_code" placeholder="Enter ZIP code" value=""   style="border:1px solid lightgray;height:38px; padding:5px; width:100%;" data-constraints="@Required @JustLetters"  />  
						</label>
							
						<label class="name form-div-3">
						<strong>Website (optional):</strong>
		<input type="text" name="c_website" id="c_website" placeholder="Enter Website Url" value=""  data-constraints="@Required @JustLetters" >  
						</label>
							
						<label class="name form-div-1">
						<strong>Image:</strong>
		<input type="file" name="c_image" id="c_image" placeholder="" value="" style="border:1px solid lightgray;height:38px; padding:5px; width:100%;" />
						</label>

                            <label class="name form-div-4">
							<strong>Video Link:</strong>
							<input type="text" name="c_video_link" id="c_video_link" placeholder="Enter Video Link" value=""  data-constraints="@Required @JustLetters" >  
							</label>

	<? include 'includes/captcha.php'; ?>
						<br>

</fieldset> 
<div>
	<a class="btn btn-success"  name="submit" id="add_data" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; 
	?>>Submit</a>
				
                             
                 
			
        </form>
					
	</div>
    
            </div>

        </div>

    </div>

</div>

	 <?php include('admin/include/modal.php'); ?>
	 <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
	 <style>#contact-form p {
    float: none;
}.ck-editor__editable_inline {    height: 100px !important;}#contact-form label.ck-label,.ck-file-dialog-button{    display: none;} </style>
 <script>

ClassicEditor
        .create( document.querySelector( 'textarea#c_details' ) ).then( newEditor => {
        editor = newEditor;
    } ) .catch( error => {
            console.error( error );
        } );
 function yesnoCheck3(that) {
        if (that.value == "other3") {
           
            document.getElementById("ifYes3").style.display = "block";
        } else {
            document.getElementById("ifYes3").style.display = "none";
        }
    }
	function yesnoCheck1(that) {
        if (that.value == "other1") {
           
            document.getElementById("ifYes1").style.display = "block";
        } else {
            document.getElementById("ifYes1").style.display = "none";
        }
    }
	
var loading_image='admin/img/loading.gif';
	var a_response=$(".modal-content");
	$("body").on("click","#add_data",function(){
	var a_response2=$("#error_compalin");		
	var str_complain=$.trim($("#c_company_name").val());
	$("#c_details").val(editor.getData());
	 if(str_complain==''){
		 $(window).scrollTop($(".thumb-box4").offset().top);
		a_response2.show().html('<div class="alert alert-danger">Please Enter Company Name </div>'); 
		return false;
	 }else if($("#c_subject").val()==''){
		 //$(window).scrollTop($(".thumb-box4").offset().top);
		a_response2.show().html('<div class="alert alert-danger">Please Enter Subject  </div>'); 
		return false;
	 }else if($("#c_details").val()==''  || $("#c_details").val()=='<p></p>'  || $("#c_details").val()=='<p> </p>'  || $("#c_details").val()=='<p>&nbsp;</p>'){
		 $(window).scrollTop($(".thumb-box4").offset().top);
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Description</div>'); 
		return false;
	 }else if($("#chk").val()==""){
		 $(window).scrollTop($(".thumb-box4").offset().top);
a_response2.show().html('<div class="alert alert-danger">Please  Enter Captcha Code.</div>'); 
return false;
}else if($("#ran").val()!=$("#chk").val()){
	 $(window).scrollTop($(".thumb-box4").offset().top);
a_response2.show().html('<div class="alert alert-danger">Captcha Code Does Not Match.</div>'); 
return false;
}  else{		
		var customer_id=$("#customer_id").val();
		if(customer_id==''){
		var a_request_reg ='action=GET_LOGIN&requesttype=complaint&control_by='+$("#admin_id").val();
	
		var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 		
		}else{	
		
			var a_url_c='execution/complain.php';
			var a_request = new FormData($("#contact-form")[0]);		
		var redirecturq='index#complainlist';
		$("#add_data").hide();
		$("#add_data").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		 $.ajax({
			type: "POST",
			url: a_url_c,
			data: a_request,
			processData: false,
            contentType: false,
			success: function(response){
			if(response>=1){
			window.location='complain/'+response+'/'+str_complain.replace(' ','-')+'-1.html';
			}else{ 
			a_response.html(response).show().delay(5000).fadeOut("slow");	
			}
			return false;			
			}
		});
		/* insert_data(a_url,a_request,a_response2,redirecturq);
		$("#loader").remove();
		$("#add_data_comment").show(); */
		$("#loader").remove();
		$("#add_data").show(); 
		}
	}	  
});
 </script>
 
 <script src="js/theme/location.js"></script>



<?php  include('includes/footer.php'); ?>

