<?php include('include/config.php'); ?>
<?php include('include/top-menu.php'); ?>
<?php include('include/header.php'); ?>



  <div class="boxed">
   
    
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
      <div class="pageheader hidden-xs">
        <h3><i class="fa fa-file-text-o"></i>Category</h3>
        <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
          <ol class="breadcrumb">
            <li> <a href="dashbord.php"> Home </a> </li>
            <li class="active">Category</li>
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
  
  <a class="btn btn-success" id="update" data-id="" data-admin_id="<?php echo $admin_id; ?>" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">Add New Category</a></div></div></div>
  <hr>
                <div class="panel-body">
				<div id="error-msg-page"></div>
				<?php 
$showRecordPerPage = 15;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "select * from category where admin_id='".$admin_id."'";
$allEmpResult = mysqli_query($con,$totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;
$query = "select * from category  order by category_id desc LIMIT $startFrom, $showRecordPerPage";
		
		//$query="Select * from category where admin_id='".$admin_id."' ORDER BY category_id ASC LIMIT $start_from, $limit";
					  $i=1;					  
				$all_data=fetch_query($con,$query);
				if(!empty($all_data)){
				?>
                  <div class="table-responsive">
                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                      <thead>
                        <tr>
										<th>Sr. No.</th>
										<th>Category NAME</th>
										<th>Meta</th>
										<th>Status</th>
										<th>EDIT</th>
										<th>DELETE</th>
                        </tr>
                      </thead>
					  
					  <?php foreach($all_data as $about_data){ ?>
						  
                      <tbody  id="project_search2">
                         
                        <tr>
						
						<td> <?php echo $i; ?></td>
                         
                          <td><?php echo $about_data['category_name']; ?></td>
 <td align="center"><a href="meta?C_ID=<?php echo $about_data['category_id']; ?>&&type=category"  class="btn btn-warning"> Add Meta</a> </td>       
                          <td><?php if($about_data['status']==1) {?>
                            <a class="btn btn-success" id="change_status" data-id="<?php echo $about_data['category_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" data-status="<?php echo $about_data['status']; ?>">Active</a>
                            <?php } else {?>
                               <a class="btn btn-danger" id="change_status" data-id="<?php echo $about_data['category_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" data-status="<?php echo $about_data['status']; ?>">In-active</a>
                              <?php
						}
						?></td>
                          
                  <td><a class="btn btn-info btn-sm editproject" data-toggle="modal" data-target="#myModal" id="update" data-id="<?php echo $about_data['category_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>"><span class="fa fa-pencil-square-o"></span> </a> </td>
						  
                      <td><a style="text-decoration:none;" class="approved btn btn-danger" id="delete" data-id="<?php echo $about_data['category_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" ><i class="fa fa-trash"></i> </a>
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
 <?php include('include/modal.php'); ?>
  

<?php include('include/footer.php'); ?>

<script>
$(document).ready(function(){
	 a_url='ajax/category.php';
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
	 if($("#category_name").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Category Name </div>'); 
		return false;
	 }
	 else{
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
		   var postdata="action=CHANGE_STATUS&change_status="+a_status+"&category_id="+a_id+"&admin_id="+admin_id;
		   var activedata='<a data-id="'+a_id+'" data-admin_id="'+admin_id+'" title="Active" class="btn btn-success" id="change_status" data-status="1">Active</a>';
		   var inactivedata='<a data-hotel_id="'+a_id+'" data-id="'+a_id+'" data-admin_id="'+admin_id+'" title="In-Active" class="btn btn-danger" id="change_status" data-status="0"> In-active</a>';
		 update_status(a_status,a_id,thisval,a_url,postdata,activedata,inactivedata,error_id);
	   });
	   
		$("body").on("click","#delete",function(){	   
		   var thisvalue=$(this).parents().parents('tr');
		   var a_id=$(this).data('id');
		   var admin_id=$(this).data('admin_id');
		   var error_id=$("#error-msg-page");
		   var postdata="action=DELETE_DATA"+"&category_id="+a_id+"&admin_id="+admin_id;
		   var checkcon=confirm("Are you sure want to delete");
		   if(checkcon){
			delete_data(a_url,postdata,error_id,thisvalue);
		   }
			
	     });
});
</script>  
<script src="js/myjs/function.js" ></script>