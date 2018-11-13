<?php include 'admin/include/function.php';
include('includes/header.php');
include('includes/check_customer_login.php');
if(empty($_SESSION["review_customer_id"])){
?>
<script>window.location="index";</script>
<?php
}

$id=$_SESSION["review_customer_id"];

echo $id;
?>




<link rel="stylesheet" href="css/lightbox.min.css">
<div class="content indent">
    <!--content--><br>
	                    
    <div class="container"><center><h3 class="indent2">Complain Details
			</h3></center>
			<div style="border: 1px solid #DFDFDF; padding:20px;">
        <div >
            <div class="row">
			<div class="col-md-3 wow fadeIn" data-wow-delay="0.1s" align="right">
                    
                     <?php include("includes/profile-tab.php"); ?>
                </div>
               
               
                
	
 
	<div class="col-md-9  wow fadeIn" data-wow-delay="0.1s" align="center" style="border:1px solid #DFDFDF; background-color:#FAFAFA; ">
              <div class="contactForm2" >
  <div class="table-responsive" style="overflow:auto;"> 
  
  <table class="table" border="1" style="border:solid #DDDDDD;">
    <thead>
      <tr style="background-color:#FFFFFF; color:#72777A;">
        <th>Sr. No.</th>
		<th>Image</th>
        <th>Company Name</th>
        <th>Subject</th>
        <th>Details</th>
		<th>Category</th>
		<th>Zip-Code</th>
		<th>Website</th>
		<th style="width:150px;">Date</th>
		<th>Video Link</th>
		<th>Status</th>
         
      </tr>
    </thead>
	<?php 
 $query=mysqli_query($con,"Select * from `complain` where user_id='$id'");
 $i=1;
 while($data=mysqli_fetch_assoc($query))
 {	
	?>
    <tbody>
      <tr  style="background-color:#F2F2F2; color:#72777A;">
        <td><?php echo $i; ?></td>
		<?php if($data['c_image'] == '')
		{	?>
	<td><img src="image/complain/man.jpg" height="40px" width="30px"></a></td>
		<?php }
		else
		{ ?>
  <td class="w3-center"><a class="example-image-link" href="image/complain/<?php echo $data['c_image']; ?>" data-lightbox="example-2" 
	 data-title="Optional caption."> 
		  <img src="image/complain/<?php echo $data['c_image']; ?>" height="40px" width="30px"></a></td>		
		<?php } ?>
        <td><?php  echo $data['c_company_name']; ?></td>
        <td><?php  echo $data['c_subject']; ?></td>
        <td><?php echo $data['c_details']; ?> </td>
		   <td><?php echo $data['c_category']; ?> </td>
			
					<td><?php echo $data['c_zip_code']; ?> </td>
					
						<td><?php echo $data['c_website']; ?> </td>
		      <td><?php echo date("d-m-Y", strtotime($data['c_date'])); ?> </td>
			     <td><?php echo $data['c_video_link']; ?> </td>
				<td>	<?php if($data['status']==0) {?>
						<a class="btn btn-primary btn-xs" id="change_status" data-id="<?php echo $data['c_id']; ?>" data-admin_id="<?php echo $data['admin_id']; ?>" data-status="0">Not View</a>
	                     <?php }?>
						 <?php if($data['status']==1){ ?>
						   <a class="btn btn-success btn-xs" id="change_status" data-id="<?php echo $data['c_id']; ?>" data-admin_id="<?php echo $data['admin_id']; ?>" data-status="1">Accept</a>
						  <?php
						  }?>
						  <?php if($data['status']==2){ ?>
						  <a class="btn btn-danger btn-xs" id="change_status" data-id="<?php echo $data['c_id']; ?>" data-admin_id="<?php echo $data['admin_id']; ?>" data-status="2">Reject</a>
							  
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
    
            
       <script src="css/lightbox-plus-jquery.min.js"></script>
<?php  include('includes/footer.php');  ?>
