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
<style>

</style>
<div class="content indent">
    <!--content--><br>
	                    
    <div class="container"><h3 class="indent2"><center>Profile</center> 
			</h3>
			<div style="border: 1px solid #DFDFDF; padding:20px;">
        <div >
            <div class="row">
			<div class=" col-md-3 " data-wow-delay="0.1s" align="right">
                    
                  <?php include("includes/profile-tab.php"); ?>
                </div>
               
               
                
	
 <?php 
 $query="Select * from `user_register` where u_id=$id";
								  
		$all_data=fetch_query($con,$query);
		
	
		foreach($all_data as $data)
 
		
	?>
	<div class=" col-md-6 " data-wow-delay="0.1s" align="center" style="border:1px solid #DFDFDF; background-color:#FAFAFA;">
              <div class="contactForm2" ><span style="font-size:14px;">Profile Details</span>
   <div id="contact-form"   style="padding:10px;" >
                 <fieldset>
		<table cellspacing="2"  style="width:500px;">
                     <tr style="padding:3px;"><td> Name :</td><td><input type="text" class="font" value="<?php echo $data['u_name'];  ?>" readonly ></td></tr>
							
					<tr><td>Email :</td><td><input type="text" style="font-size:13px; color:gray;"  value="<?php echo $data['u_email'];  ?>" readonly /></td></tr>
									
					<tr><td>Mobile No :</td><td><input type="text" class="font"  value="<?php echo $data['u_phone'];  ?>" readonly /></td></tr>
		</table>
						       </fieldset> 

                     

                    </div>

            </div>

        </div>
 
   		
				 <div class=" col-md-2 " align="right"  style="margin-left:60px;">

                    <div class="thumb-pad4">
                        <div class="thumbnail">
						<?php if($data['u_image'] == '')
						{?>
						<figure><img src="img/page2_pic1.jpg" alt=""   width="200" height="180"></figure>
                            <?php }
						else{ ?>
							 <figure><img src="image/user/<?php echo $data['u_image']; ?>" alt=""     width="230px" height="200px"></figure>
						<?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
		<br>
            </div><br>
        </div>
    </div> 
    
            </div>
    
            
       
<?php  include('includes/footer.php');  ?>
