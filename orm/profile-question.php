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





<div class="content indent">
    <!--content--><br>
	                    
    <div class="container"><center><h3 class="indent2">Review Details
			</h3></center>
			<div style="border: 1px solid #DFDFDF; padding:20px;">
        <div >
            <div class="row">
			<div class="col-md-3 wow fadeIn" data-wow-delay="0.1s" align="right">
                    
                      <?php include("includes/profile-tab.php"); ?>
                </div>
               
               
                
	
 
	<div class="col-md-9  wow fadeIn" data-wow-delay="0.1s" align="center" style="border:1px solid #DFDFDF; background-color:#FAFAFA; ">
              <div class="contactForm2" >
  <div class="table-responsive"> 
  
  <table class="table">
    <thead>
      <tr style="background-color:lightgray;">
        <th>Sr. No.</th>
        <th>Questions</th>
      
		<th>Status</th>
         
      </tr>
    </thead>
	<?php 
 $query=mysqli_query($con,"Select * from `question` where user_id='$id'");
 $i=1;
 while($data=mysqli_fetch_assoc($query))
 {	
	?>
    <tbody>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php  echo $data['q_name']; ?></td>
          <td>
	   <?php if($data['status']==0) {?>
						<a class="btn btn-primary btn-xs" id="change_status" data-id="<?php echo $data['r_id']; ?>" data-admin_id="<?php echo $data['admin_id']; ?>" data-status="0">Not View</a>
	                     <?php }?>
						 <?php if($data['status']==1){ ?>
						   <a class="btn btn-success btn-xs" id="change_status" data-id="<?php echo $data['r_id']; ?>" data-admin_id="<?php echo $data['admin_id']; ?>" data-status="1">Accept</a>
						  <?php
						  }?>
						  <?php if($data['status']==2){ ?>
						  <a class="btn btn-danger btn-xs" id="change_status" data-id="<?php echo $data['r_id']; ?>" data-admin_id="<?php echo $data['admin_id']; ?>" data-status="2">Reject</a>
							  
						  <?php }	?></td>
                 
             
      </tr>
	 
    </tbody>
 <?php $i++; 
 } ?>
  </table>
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
