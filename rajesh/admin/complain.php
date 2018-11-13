<?php include('include/config.php'); ?>
<?php include('include/top-menu.php'); ?>
<?php include('include/header.php'); ?>



  <div class="boxed">
    
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
      <div class="pageheader hidden-xs">
        <h3><i class="fa fa-file-text-o"></i>Complain Details</h3>
        <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
          <ol class="breadcrumb">
            <li> <a href="dashbord.php"> Home </a> </li>
            <li class="active">Complain Details </li>
          </ol>
        </div>
      </div>
      <!--Page content-->
      <!--===================================================-->
    
      <div id="page-content">
        <div class="row">
          <div class="eq-height">
            <div class="col-md-12 eq-box-sm" style="padding:10px;">
              <div class="panel">
              
              <div class="row">
			  
  </div>
  
                <div class="panel-body">
				<div id="error-msg-page"></div>
				<?php 
$showRecordPerPage =10;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "select * from complain where admin_id='".$admin_id."'";
$allEmpResult = mysqli_query($con,$totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;
$query = "select * from complain  order by c_id desc LIMIT $startFrom, $showRecordPerPage";	
	  
				//$query="Select * from complain where admin_id='".$admin_id."' order by c_id desc";
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
												<th>Company NAME</th>
													<th>Subject </th>
														<th>Details</th>
															<th>Category</th>
																<th>Country</th>
																	<th>State</th>
																	<th>City</th>
																		<th>Zip Code</th>
																	<th> Complain Date</th>
																	<th>Website </th>
															<th>Video Link</th>
													<th>Status </th>
												<th>Meta</th>
											<th>EDIT</th>
										<th>DELETE</th>
                        </tr>
                      </thead>
					  
		<?php foreach($all_data as $about_data){
 $image=(file_exists('../image/complain/'.$about_data['c_image']) && !empty($about_data['c_image']))?'../image/complain/'.$about_data['c_image']:'img/defaultimage.png';
					  ?>
						  
			 <tbody  id="project_search2" name="search">
			 <tr>
			  <td> <?php echo $i; ?></td>
				 <td><img src="<?php echo $image; ?>" height="40" width="40" class="img-circle"/></td>
					<td><?php echo $about_data['c_company_name']; ?></td>
					   <td><?php  echo $about_data['c_subject']; ?></td>
						 <td><?php  echo $about_data['c_details']; ?></td>
						   <td><?php  echo $about_data['c_category']; ?></td>
						   <?php 
						 $country="select * from country where id='".$about_data['c_country']."'";
							$condata=fetch_query($con,$country);  
								$state="select * from state where id='".$about_data['c_state']."'";
									$sdata=fetch_query($con,$state);
										$city="select * from city where id='".$about_data['c_city']."'";
											$cidata=fetch_query($con,$city);
							?>
							  <td><?php echo $condata[0]['country_name']; ?></td>
							   <td><?php echo $sdata[0]['state_name']; ?></td>
								 <td><?php echo $cidata[0]['city_name']; ?></td>
									<td><?php echo $about_data['c_zip_code']; ?></td>
									 <td><?php echo date("d/M/Y",strtotime($about_data['c_date'])); ?></td>
									   <td><a target="_blank" href="<?php echo $about_data['c_website']; ?>" class="btn btn-xs btn-block  btn-info"> WEBSITE</a></td>
						<td><a target="_blank" href="<?php echo $about_data['c_video_link']; ?>"  class="btn btn-xs btn-block  btn-primary">Video Link</a></td>
					<td><?php if($about_data['status']==1) {?>
						   <a class="btn btn-success btn-xs" id="change_status" data-id="<?php echo $about_data['c_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" data-status="<?php echo $about_data['status']; ?>">Active</a>
						<?php } else {?>
				    <a class="btn btn-danger btn-xs" id="change_status" data-id="<?php echo $about_data['c_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" data-status="<?php echo $about_data['status']; ?>">In-active</a>
				 <?php }   ?></td>
				 
				 <td><a href="meta?CO_ID=<?php echo $about_data['c_id']; ?>&&type=complain" class="approved btn btn-warning btn-xs">Add Meta </a></td>  
			   <td><a class="btn btn-info btn-xs editproject" data-toggle="modal" data-target="#myModal" id="add_data" data-id="<?php echo $about_data['c_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>"><span class="fa fa-pencil-square-o"></span></a> </td>
			<td><a style="text-decoration:none;" class="approved btn btn-danger btn-xs" id="delete" data-id="<?php echo $about_data['c_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" ><i class="fa fa-trash"></i> </a></td>
		  </tr>
		</tbody>
															<?php   $i++;   }  ?>
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
	a_url='ajax/complain.php';
	var a_response=$(".modal-content");	
	
	$("body").on("click","#add_data",function(){ 
	var a_request="action=STRUCTURE"+"&admin_id="+$(this).data("admin_id")+"&id="+$(this).data("id");
	a_response.html('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" style="width:50%" /></div>');
	 var redirecturl='';
	fetch_data(a_url,a_request,a_response,redirecturl);	
	$('#loader').slideUp(200, function() {
	$(this).remove(); 
	});
	});	
	
	 $("body").on("click","#update_company",function(){ 
	  var a_response1=$("#error-msg");
	 if($("#c_company_name").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Company Name </div>'); 
		return false;
	 }else if($("#c_subject").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Subject </div>'); 
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
	$("body").on("click","#change_status",function(){	   
		   var thisval=$(this);
		   var a_status=$(this).data('status');
		   var a_id=$(this).data('id');
		   var admin_id=$(this).data('admin_id');
		   var error_id=$("#error-msg-page");
		   var postdata="action=CHANGE_STATUS&change_status="+a_status+"&c_id="+a_id+"&admin_id="+admin_id;
		   var activedata='<a data-id="'+a_id+'" data-admin_id="'+admin_id+'" title="Active" class="btn btn-success btn-xs" id="change_status" data-status="1">Active</a>';
		   var inactivedata='<a data-hotel_id="'+a_id+'" data-id="'+a_id+'" data-admin_id="'+admin_id+'" title="In-Active" class="btn btn-danger btn-xs" id="change_status" data-status="0"> In-active</a>';
		 update_status(a_status,a_id,thisval,a_url,postdata,activedata,inactivedata,error_id);
	   });
		$("body").on("click","#delete",function(){	   
		   var thisvalue=$(this).parents().parents('tr');
		   var a_id=$(this).data('id');
		   var admin_id=$(this).data('admin_id');
		   var error_id=$("#error-msg-page");
		   var postdata="action=DELETE_DATA"+"&c_id="+a_id+"&admin_id="+admin_id;
		   //alert(postdata);
		    var checkcon=confirm("Are you sure want to delete");
		   if(checkcon){
			delete_data(a_url,postdata,error_id,thisvalue);
		   }
	     });
});
</script>  
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