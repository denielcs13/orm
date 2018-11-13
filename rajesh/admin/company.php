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
            <li class="active">Product</li>
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
  
  <a class="btn btn-success" href='add-new-product'>Add New Product</a></div></div></div>
  <hr>
                <div class="panel-body">
				<div id="error-msg-page"></div>
				<?php 
$showRecordPerPage = 10;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "select * from product where admin_id='".$admin_id."'";
$allEmpResult = mysqli_query($con,$totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;
$query = "select * from product  order by company_id desc LIMIT $startFrom, $showRecordPerPage";
				//$query="Select * from product where admin_id='".$admin_id."' order by company_id desc";
		 		  $i=1;					  
				$all_data=fetch_query($con,$query);
				if(!empty($all_data))
				{
				
				?>
                  <div class="table-responsive" style="overflow:scroll;">
                    <table id="demo-dt-basic" class="table table-striped table-bordered"  >
                      <thead>
                        <tr>
										<th>Sr. No.</th>
											<th>Image</th>
												<th>Product NAME</th>
													<th>Category</th>
														<th>Sub Category1</th>
															<th>Sub Category 2</th>
																<th>Mobile No</th>
																	<th>Email</th>
																	<th>Country</th>
																		<th>State</th>
																			<th>City</th>
																		<th>Date</th>
																		<th>Meta</th>
																	<th>Status</th>
																<th>More Details</th>
															<th>REVIEW</th>
														<th>Recommend</th>
														<th>Establishment </th>
													<th> Gallery</th>
												<th>Facility </th>
											<th>EDIT</th>
										<th>DELETE</th>
                        </tr>
                      </thead>
					  
					  <?php foreach($all_data as $about_data){ 
		 $image=(file_exists('images/company/'.$about_data['product_image']) && !empty($about_data['product_image']))?'images/company/'.$about_data['product_image']:'img/defaultimage.png';
					  ?>
						  
                      <tbody  id="project_search2" name="search">
                         
                        <tr>
						
						<td> <?php echo $i; ?></td>
                          <td><img src="<?php echo $image; ?>" height="40" width="40" class="img-circle"/></td>
                          <td><?php echo $about_data['company_name']; ?></td>
						  
						<?php   
									 $query2="Select * from category where category_id='".$about_data['category']."'";
									$data2=fetch_query($con,$query2);
									
											 $query3="Select * from subcategory1 where cat_id='".$data2[0]['category_id']."'";
											$data3=fetch_query($con,$query3);
									
													 $query4="Select * from subcategory2 where sub_cat_id='".$data3[0]['sub_cat_id']."'";
													$data4=fetch_query($con,$query4);
												
								?>
							
						
						  <td><?php  echo $data2[0]['category_name']; ?></td>
								<td><?php  echo $data3[0]['sub_cat_name']; ?></td>
									<td><?php  echo $data4[0]['sub_cat2_name']; ?></td>
										<td><?php echo $about_data['mobile']; ?></td>
											<td><?php echo $about_data['email']; ?></td>
				<?php  $country="select * from country where id='".$about_data['country']."'";
							$condata=fetch_query($con,$country);  
								$state="select * from state where id='".$about_data['state']."'";
									$sdata=fetch_query($con,$state);
										$city="select * from city where id='".$about_data['city']."'";
											$cidata=fetch_query($con,$city);
							?>
							
											<td><?php echo $condata[0]['country_name']; ?></td>
											<td><?php echo $sdata[0]['state_name']; ?></td>
											<td><?php echo $cidata[0]['city_name']; ?></td>
												<td><?php echo date("d/M/Y",strtotime($about_data['p_date'])); ?></td>
												
								<td><a href="meta?P_ID=<?php echo $about_data['company_id']; ?>&&type=product"  class="btn btn-large btn-block btn-warning">Add Meta</a> </td>
								
														<td><?php if($about_data['status']==1) {?>
												<a class="btn btn-success" id="change_status" data-id="<?php echo $about_data['company_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" data-status="<?php echo $about_data['status']; ?>">Active</a>
												<?php } else {?>
                               <a class="btn btn-danger" id="change_status" data-id="<?php echo $about_data['company_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" data-status="<?php echo $about_data['status']; ?>">In-active</a>
                              <?php }   ?></td>
						<td><a href="more-details?token=<?php echo $about_data['company_id']; ?>"  class="btn btn-info btn-primary">More Details</a> </td>
				<td><a href="review?token=<?php echo $about_data['company_id']; ?>"  class="btn btn-info btn-mint">Review</a> </td>
		<td align="center"><a href="#"  class="alert-link"><img src="../img/love.jpg" height="20"> </a> </td>
		<td><a href="establishment?P_ID=<?php echo $about_data['company_id']; ?>"  class="btn btn-large btn-block btn-primary">Establishment</a> </td>
	<td><a href="gallery?P_ID=<?php echo $about_data['company_id']; ?>"  class="btn btn-large btn-block btn-info">Gallery</a> </td>
<td><a href="facility?P_ID=<?php echo $about_data['company_id']; ?>"  class="btn btn-large btn-block  btn-primary">Facility</a> </td>
                          
                  <td><a class="btn btn-info btn-sm editproject" href="add-new-product?id=<?php echo $about_data['company_id']; ?>"><span class="fa fa-pencil-square-o"></span></a> </td>
						  
                          <td><a style="text-decoration:none;" class="approved btn btn-danger" id="delete" data-id="<?php echo $about_data['company_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" ><i class="fa fa-trash"></i></a>
                                                      </td>
                        </tr>
                     
  					                       </tbody>
										   
										   <?php 
										   $i++;
					  }
										   ?>
                    </table>
<!---- Pagination==================Start-=======================================================----->
<nav aria-label="Page navigation">
<ul class="pagination">
<?php if($currentPage != $firstPage) { ?>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
<span aria-hidden="true">First</span>
</a>
</li>
<?php } ?>

<?php if($currentPage >= 2) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
<?php } ?>
<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
<?php if($currentPage != $lastPage) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
<span aria-hidden="true">Last</span>
</a>
</li>
<?php } ?>
</ul>
</nav>

<!---- Pagination==================End-=======================================================----->
					
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

  

<?php include('include/footer.php'); ?>
 <?php include('include/modal.php'); ?>
<script>
$(document).ready(function(){
	
	
	a_url='ajax/moredetails.php';
	var a_response=$(".modal-content");	
	$("body").on("click","#add_more",function(){ 
	var a_request="action=MOREDETAILS"+"&admin_id="+$(this).data("admin_id")+"&id="+$(this).data("id");
	a_response.html('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" style="width:50%" /></div>');
	 var redirecturl='';
	fetch_data(a_url,a_request,a_response,redirecturl);	
	$('#loader').slideUp(200, function() {
	$(this).remove(); 
	});
	});	
});


$(document).ready(function(){
	a_url='ajax/company.php';
	/* var a_response=$(".modal-content");	
	
	$("body").on("click","#add_data",function(){ 
	var a_request="action=STRUCTURE"+"&admin_id="+$(this).data("admin_id")+"&id="+$(this).data("id");
	a_response.html('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" style="width:50%" /></div>');
	 var redirecturl='';
	fetch_data(a_url,a_request,a_response,redirecturl);	
	$('#loader').slideUp(200, function() {
	$(this).remove(); 
	});
	});	
	 */
	/*  $("body").on("click","#update_company",function(){ 
	  var a_response1=$("#error-msg");
	 if($("#company_name").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Company Name </div>'); 
		return false;
	 }else if($("#contact_no").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Mobile Number </div>'); 
		return false;
	 }else if($("#email").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Email ID</div>'); 
		return false;
	 }else if($("#datepicker").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Date</div>'); 
		return false;
	 }else if($("#title").val()==''){
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
	 }
	 }); 
	 */$("body").on("click","#change_status",function(){	   
		   var thisval=$(this);
		   var a_status=$(this).data('status');
		   var a_id=$(this).data('id');
		   var admin_id=$(this).data('admin_id');
		   var error_id=$("#error-msg-page");
		   var postdata="action=CHANGE_STATUS&change_status="+a_status+"&company_id="+a_id+"&admin_id="+admin_id;
		   var activedata='<a data-id="'+a_id+'" data-admin_id="'+admin_id+'" title="Active" class="btn btn-success" id="change_status" data-status="1">Active</a>';
		   var inactivedata='<a data-hotel_id="'+a_id+'" data-id="'+a_id+'" data-admin_id="'+admin_id+'" title="In-Active" class="btn btn-danger" id="change_status" data-status="0"> In-active</a>';
		 update_status(a_status,a_id,thisval,a_url,postdata,activedata,inactivedata,error_id);
	   });
		$("body").on("click","#delete",function(){	   
		   var thisvalue=$(this).parents().parents('tr');
		   var a_id=$(this).data('id');
		   var admin_id=$(this).data('admin_id');
		   var error_id=$("#error-msg-page");
		   var postdata="action=DELETE_DATA"+"&company_id="+a_id+"&admin_id="+admin_id;
		   var checkcon=confirm("Are you sure want to delete");
		   if(checkcon){
			delete_data(a_url,postdata,error_id,thisvalue);
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