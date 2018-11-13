<?php include('include/config.php'); ?>
<?php include('include/top-menu.php'); ?>
<?php include('include/header.php'); 

$id = $_GET['P_ID'];
$query="Select * from product where admin_id='".$admin_id."' && company_id = '$id'";
$data=fetch_query($con,$query);
?>



  <div class="boxed">
   
    
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
      <div class="pageheader hidden-xs">
        <h3><i class="fa fa-file-text-o"></i><?php echo $data[0]['company_name']; ?></h3>
        <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
          <ol class="breadcrumb">
            <li> <a href="dashbord.php"> Home </a> </li>
            <li class="active"><?php echo $data[0]['company_name']; ?></li><li><a  href='company'>Back</a></li>
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
  
  <a class="btn btn-success" id="update" data-id=""  data-pro_id="<?php echo $data[0]['company_id']; ?>"  data-admin_id="<?php echo $admin_id; ?>" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">Add Facility</a></div></div></div>
  <hr>
                <div class="panel-body">
				<div id="error-msg-page"></div>
				<?php 
				$query="Select * from facility where admin_id='".$admin_id."' &&  product_id='$id' order by f_id desc";
					  $i=1;					  
				$all_data=fetch_query($con,$query);
				if(!empty($all_data)){
				?>
                  <div class="table-responsive">
                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                      <thead>
                        <tr>
										<th>Sr. No.</th>
										<th>Facility</th>
									
										<th>EDIT</th>
										<th>DELETE</th>
                        </tr>
                      </thead>
					  
					  <?php foreach($all_data as $about_data){ ?>
						  
                      <tbody  id="project_search2">
                         
                        <tr>
						
						<td> <?php echo $i; ?></td>
                         
                          <td><?php echo $about_data['f_name']; ?></td>
                        
                          
                          
                  <td><a class="btn btn-info btn-sm editproject" data-toggle="modal" data-target="#myModal" id="update" data-id="<?php echo $about_data['f_id']; ?>" 
				  data-admin_id="<?php echo $about_data['admin_id']; ?>" data-pro_id="<?php echo $data[0]['company_id']; ?>"><span class="fa fa-pencil-square-o"></span> Edit</a> </td>
						  
                      <td><a style="text-decoration:none;" class="approved btn btn-danger" id="delete" data-id="<?php echo $about_data['f_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" ><i class="fa fa-trash"></i> Delete</a>
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

<script>
/* $(document).ready(function(){
	 a_url='ajax/facility.php';
	 var a_response=$(".modal-content");	
	$("body").on("click","#update",function(){ 
	var a_request="action=STRUCTURE"+"&admin_id="+$(this).data("admin_id")+"&product_id="+$(this).data("pro_id")+"&id="+$(this).data("id");
	a_response.html('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" style="width:50%" /></div>');
	var redirecturl='';
	fetch_data(a_url,a_request,a_response,redirecturl);	
	$('#loader').slideUp(200, function() {
	$(this).remove();
	});
	});	
	$("body").on("click","#update_category",function(){ 
	  var a_response1=$("#error-msg");
	 if($("#f_name").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Facility </div>'); 
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
	
	   
		$("body").on("click","#delete",function(){	   
		   var thisvalue=$(this).parents().parents('tr');
		   var a_id=$(this).data('id');
		   var admin_id=$(this).data('admin_id');
		   var error_id=$("#error-msg-page");
		   var postdata="action=DELETE_DATA"+"&f_id="+a_id+"&admin_id="+admin_id;
		   var checkcon=confirm("Are you sure want to delete");
		   if(checkcon){
			delete_data(a_url,postdata,error_id,thisvalue);
		   }
			
	     });
}); */
</script>  
<!--script src="js/myjs/function.js" ></script-->