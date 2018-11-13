<?php 
include 'admin/include/function.php';
include('includes/header.php');
if(empty($_SESSION["review_customer_id"])){
?>
<script>window.location="index";</script>
<?php
}

$id=$_SESSION["review_customer_id"];
echo $id;
?>
<?php

		if ($_POST['submit'])
		{
		
		$oldpassword = md5($_POST['old_password']);
		$newpassword = md5($_POST['new_password']);
		$repeatnewpassword = md5($_POST['conform_password']);
		
		$queryget = mysqli_query($con,"SELECT u_password FROM user_register WHERE u_id='$id'");
		$row = mysqli_fetch_assoc($queryget);
		
		$oldpassworddb = $row['u_password'];
		
		if ($oldpassword==$oldpassworddb)
		{
	
		if ($newpassword==$repeatnewpassword)
		{
		$querychange = "UPDATE user_register SET u_password='$newpassword' WHERE u_id='$id'";
		$query=mysqli_query($con,$querychange);
		if($query){ 
		?>
			<script>
			alert("Password Successfully Changed");
			window.location="profile.php";
			</script>
	<?php
}
else{
	echo '<div class="alert alert-danger">Request Fail Please Try Again  </div>';	
}
		}
		else
		{
			echo '<div class="alert alert-danger">New Password and Confrom password is no mached</div>';
		}
		}
		else{
			echo '<div class="alert alert-danger">Old password is no mached</div>';
		}
		
		
		}
?>




<div class="content indent">
   <br>
	                    
    <div class="container"><center><h3 class="indent2">Change Password</h3></center>
	<div style="border: 1px solid #DFDFDF; padding:20px;">
        <div  >
            <div class="row">
			
			
			<div class="col-md-3 wow fadeIn" data-wow-delay="0.1s" >
                  
                <?php include("includes/profile-tab.php"); ?>
			</div>
            <div class="col-md-1"></div>    
			   
  <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s" align="center" style="border:1px solid #DFDFDF; background-color:#FAFAFA;">
              <div class="contactForm2" ><span style="color:orange; font-size:14px;">CHANGE PASSWORD</span>
   <form id="contact-form"  method="post"   style="padding:75px;" >
                 <fieldset>

                            <label class="name form-div-1">
							<input type="text" name="old_password" id="old_password" placeholder="Old Password" value="" data-constraints="@Required @JustLetters"  required />
							</label>
								
							
							<label class="name form-div-1">
							<input type="text" name="new_password" id="new_password" placeholder="New Password" value="" data-constraints="@Required @JustLetters"  required />
							</label>
							
							<label class="name form-div-1">
							<input type="text" name="conform_password" id="conform_password" placeholder="Conform Password" value="" data-constraints="@Required @JustLetters"   />
							</label>
							
							
							
							
          <label class="name form-div-4">                  
				
<input type="submit"  class="btn btn-success" value="Save password" data-type="submit" name="submit"  >
           </label>                  

                           

                          </fieldset> 

                     

                    </form>

            </div>

        </div> </div>

        </div>
		<br>
            </div><br>
        </div>
    </div> 
    
           
       
<?php  include('includes/footer.php'); ?>
