<?php include('include/config.php'); ?>
<?php include('include/top-menu.php'); ?>
<?php include('include/header.php'); ?>


  <div class="boxed">
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
      <div class="pageheader hidden-xs">
        <h3><i class="fa fa-file-text-o"></i>Reviews</h3>
        <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
          <ol class="breadcrumb">
            <li> <a href="dashbord.php"> Home </a> </li>
            <li class="active">Reviews</li>
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
              
              <div class="row"><div class="col-lg-6">
              
              
              
              </div><div class="col-lg-3">   <div class="searchbox">
  </div>
  </div>
  <div class="col-lg-3 add-button text-right"><div class="searchbox">
  
  </div></div></div>
  <hr>
                <div class="panel-body">
				<div id="error-msg-page"></div>
				<?php 
				$id=$_GET['token'];
				
	$query = "SELECT product.company_id, review.product_id, review.user_id, review.r_title, review.r_rating, review.status, review.r_description, review.r_date,user_register.u_id, user_register.u_image, user_register.u_name, user_register.u_email, user_register.u_phone, review.admin_id, review.r_id	from  ((product  LEFT JOIN review ON review.product_id = product.company_id)  JOIN user_register ON review.user_id = user_register.u_id)   WHERE product.company_id= '$id'";
		$i=1;					  
			$all_data=fetch_query($con,$query);
				if(!empty($all_data)){ 
					
				?>
                  <div class="table-responsive">
                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                      <thead>
                        <tr>
										<th>Sr. No.</th>
										<th>Image</th>
										<th>Name</th>
										<th>Mobile</th>
										<th>Email Id</th>
										<th>Title</th>
										<th>Description</th>
										<th>Rating</th>
										<th>Date</th>
										<th>Meta</th>
										<th>Status</th>
										<th>Edit</th>
										<th>Delete</th>
										
                        </tr>
                      </thead>
					  
					  <?php foreach($all_data as $about_data){ ?>
						  
                      <tbody  id="project_search2">
                         
                        <tr>
						
						<td> <?php echo $i; ?></td>
                           <td> 
						  
		 <img src="../image/user/<?php echo $about_data['u_image']; ?>" alt=""     width="50px" height="50px">
						
						    
						   </td>
                          <td><?php echo $about_data['u_name']; ?></td>
                          <td><?php echo $about_data['u_phone']; ?></td>
                        <td><?php echo $about_data['u_email']; ?></td>
                       <td><?php echo $about_data['r_title']; ?></td>
					   <td><?php echo $about_data['r_description']; ?></td>
					   <td><?php echo $about_data['r_rating']; ?>  <i class="fa fa-star"></i></td>
					   <td><?php echo date("d/M/Y",strtotime($about_data['r_date'])); ?></td>
			 <td align="center"><a href="meta?R_ID=<?php echo $about_data['r_id']; ?>&&type=review"  class="btn btn-warning"> Add Meta</a> </td>		   
                       <td><?php if($about_data['status']==0) {?>
    <a class="btn btn-success" id="change_status" data-id="<?php echo $about_data['r_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" data-status="0">Accept</a>
	<a class="btn btn-danger" id="change_status" data-id="<?php echo $about_data['r_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" data-status="1">Reject</a>
                          <?php }else{ 
						 echo ($about_data['status']==1) ?'<span class="btn btn-success">Accept</span>':(($about_data['status']==2)?'<span class="btn btn-danger">Reject</span>':'No Action');
						  }
						?></td>
                          
             
			   <td><a class="btn btn-info btn-sm editproject" data-toggle="modal" data-target="#myModal" id="update" data-id="<?php echo $about_data['r_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>"><span class="fa fa-pencil-square-o"></span></a> </td>
			  	<td><a style="text-decoration:none;" class="approved btn btn-danger" id="delete" data-id="<?php echo $about_data['r_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" ><i class="fa fa-trash"></i> </a>
                                                      </td>	  
                        </tr>
                     
  					                       </tbody>
										   
										   <?php 
										   $i++;
											}
										   ?>
                    </table>
                  </div>
				  <?php
				}else{
				echo '<div class="alert alert-danger">No Data Available.</div>';	
				}
				  ?>
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
  <?php include('include/modal.php'); ?>
<?php include('include/footer.php'); ?>

		<script src="ckeditor/ckeditor.js"></script>
   
   
   <script>
   $(document).ready(function(){
	 a_url='ajax/review.php';
	 var a_response=$(".modal-content");	
	$("body").on("click","#update",function(){ 
	var a_request="action=STRUCTURE"+"&admin_id="+$(this).data("admin_id")+"&id="+$(this).data("id");
	a_response.html('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" style="width:50%" /></div>');
	var redirecturl='';
	fetch_data(a_url,a_request,a_response,redirecturl);	
	$('#loader').slideUp(200, function() {
	$(this).remove();
	});
	});	
	$("body").on("click","#update_category",function(){ 
	  var a_response1=$("#error-msg");
	 if($("#r_title").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Your Title</div>'); 
		return false;
	 }
	 else{
		 $("#r_description").val(est_details.getData());
	 var update_from=new FormData($("#form-update")[0])
	 var a_request1=update_from;
	 $("#update_category").css("display","none");
	 $("#update_category").after('<img id="login_image" src="img/loading.gif" alt="loading subcategory" width="5%" />');
	  var redirecturl='';
	 insert_data(a_url,a_request1,a_response1,redirecturl);
	  $('#login_image').slideUp(200, function() {
		$(this).remove(); 
	}); 
	$("#update_category").show();
	 }
	 }); 
	$("body").on("click","#change_status",function(){	   
		   var thisval=$(this);
		   var a_status=$(this).data('status');
		   var a_id=$(this).data('id');
		   var admin_id=$(this).data('admin_id');
		   var error_id=$("#error-msg-page");
		   var postdata="action=CHANGE_STATUS&change_status="+a_status+"&r_id="+a_id+"&admin_id="+admin_id;
		   var activedata='<a data-id="'+a_id+'" data-admin_id="'+admin_id+'" title="Active" class="btn btn-success" id="change_status" data-status="1">Active</a>';
		   var inactivedata='<a data-hotel_id="'+a_id+'" data-id="'+a_id+'" data-admin_id="'+admin_id+'" title="In-Active" class="btn btn-danger" id="change_status" data-status="0"> In-active</a>';
		 update_status(a_status,a_id,thisval,a_url,postdata,activedata,inactivedata,error_id);
	   });
	   
	$("body").on("click","#delete",function(){	   
		   var thisvalue=$(this).parents().parents('tr');
		   var a_id=$(this).data('id');
		   var admin_id=$(this).data('admin_id');
		   var error_id=$("#error-msg-page");
		   var postdata="action=DELETE_DATA"+"&r_id="+a_id+"&admin_id="+admin_id;
		   var checkcon=confirm("Are you sure want to delete");
		   if(checkcon){
			delete_data(a_url,postdata,error_id,thisvalue);
		   }
			
	     });
});

	
</script>  


<script src="js/myjs/review-change.js" ></script>
<script src="js/myjs/function.js" ></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>