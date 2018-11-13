<?php include 'admin/include/function.php';
include('includes/header.php');
include('includes/check_customer_login.php');
if(empty($_SESSION["review_customer_id"])){
?>
<script>window.location="index";</script>
<?php
}

$id=$_SESSION["review_customer_id"];
?>

<?php
  $query="Select * from `user_register` where u_id=$id";
								  
		$all_data=fetch_query($con,$query);
		
		foreach($all_data as $data)

		echo $data['u_address'];
		
 extract($_POST);
//if(isset($_POST["$submit"]))
if(isset($submit))
{
 
	$u_image =$_FILES['u_image']['name'];
    $img_tmp 		=$_FILES['u_image']['tmp_name'];
	$extlogo		= pathinfo($u_image, PATHINFO_EXTENSION);
	$proof			="USER_".date('ynjhis').round(microtime(true)).'.'.$extlogo;
	move_uploaded_file($img_tmp,"image/user/$proof"); 
	
 $update = mysqli_query($con,"UPDATE `user_register` SET `u_name` = '$user_name', `u_email` = '$user_email',`u_image` = '$proof',  `u_state` = '$u_state', 
`u_city` = '$u_city', `u_country` = '$u_country', `u_address` = '$u_address'  WHERE `admin_id` = '$admin_id' && `u_id` = '$id'");

	 
if($update){	?>
<script>
alert("successfully update");
window.location="profile.php";
</script>
<?php
 }else
 {
	 	echo '<div class="alert alert-danger">Sorry Unable To Update Please Try Again </div>';	
 }
}
 
?>






<div class="content indent">
   <br>
	                    
    <div class="container"><center><h3 class="indent2">Edit Profile</h3></center>
	<div style="border: 1px solid #DFDFDF; padding:20px;">
        <div >
            <div class="row">
			
			
			<div class="col-md-3 wow fadeIn" data-wow-delay="0.1s" >
                  
                      <?php include("includes/profile-tab.php"); ?>
			</div>
              
			   
  <div class="col-md-8 wow fadeIn" data-wow-delay="0.1s" align="center" style="border:1px solid #DFDFDF; background-color:#FAFAFA;">
              <div class="contactForm2" ><div id="error-msg"></div>
   <form id="contact-form" action="" method="post" enctype="multipart/form-data"  style="padding:20px;">
                 <fieldset>

                            <label class="name form-div-4">
			<input type="text" name="user_name" id="user_name" value="<?php echo $data['u_name'];  ?>"  data-constraints="@Required @JustLetters"  required />
							</label>
								<label class="name form-div-4">
							<input type="file" name="u_image" id="u_image" placeholder=""  style="border:1px solid lightgray;height:38px; padding:5px; width:100%;" />
							</label>
							
							<label class="name form-div-4">
							<input type="text" name="u_city" id="u_city" placeholder="City" value="<?php echo $data['u_city'];  ?>"  data-constraints="@Required @JustLetters"  required />
							</label>
							
							<label class="name form-div-4">
							<input type="text" name="u_state" id="u_state" placeholder="State" value="<?php echo $data['u_state'];  ?>"  data-constraints="@Required @JustLetters"  />
							</label>
							
							<label class="name form-div-4">
		<input type="text" name="u_country" id="u_country" placeholder="Country"  value="<?php echo $data['u_country'];  ?>"  data-constraints="@Required @JustLetters"  />
							</label>
							
							<label class="name form-div-4">
							<input type="text" name="user_mobile" id="user_mobile" value="<?php echo $data['u_phone'];  ?>" data-constraints="@Required @JustLetters"  required />
							</label>
							
							<label class="name form-div-4">
							<input type="text" name="user_email" id="user_email" value="<?php echo $data['u_email'];  ?>"  data-constraints="@Required @JustLetters"  required />
							</label>
							
							<label class="message form-div-4">
							
			<textarea class="form-control"  name="u_address" rows="5" id="comment"  required ><?php echo $data['u_address'];   ?></textarea>

     </label>

                            <div>
					 
<input type="submit" class="btn btn-success"  value="Update" data-type="submit" name="submit"  >
                             

                            </div>

                          </fieldset> 

                     

                    </form>

            </div>

        </div>
                                                            </div>

        </div>
		<br>
            </div><br>
        </div>
    </div> 
    
            </div>
       
<?php  include('includes/footer.php'); ?>
