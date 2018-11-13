<?php include('include/config.php'); ?>
<?php include('include/top-menu.php'); ?>
<?php include('include/header.php'); 

$id = $_GET['P_ID'];
$query="Select company_name from product where admin_id='".$admin_id."' && company_id = '$id'";
$data=fetch_query($con,$query);
$product_id=$_GET["P_ID"];
$totalEmpSQL = "select f_name from facility where admin_id='".$admin_id."' && product_id='".$product_id."'";
				$all_data=fetch_query($con,$totalEmpSQL);
				
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
  <div class="col-lg-3 add-button text-right"></div></div>
  <hr>
                  <div class="panel-body">
				<div id="error-msg-page"><?
				if(isset($_POST["facility"])){
					$est=trim($_POST["facility"]);
				 	$est_1= mysqli_real_escape_string($con,$_POST["facility"]);
					$all_data_check=fetch_query($con,$totalEmpSQL);
					if(!empty($all_data_check)){
					$update=update_query($con,"update facility set f_name='".$est_1."' where admin_id='".$admin_id."' && product_id='".$product_id."'");
					}else{
					$dat=date("Y-m-d");
					$update=insert_query($con,"insert into facility set f_name='".$est_1."',admin_id='".$admin_id."' , product_id='".$product_id."' , f_date='".$dat."'") ;
					}
					if($update==1){
						echo '<div class="alert alert-success">Facility is Updated  Successfully. </div>';
						echo 	$est;
											}else{
						echo '<div class="alert alert-danger">Sorry Unable To Update Facility </div>';
					}
				} 
				
				?></div>
			
				  <form method="post" id="ext_form">
				  <textarea name="facility" id="facility" rows="10" cols="80"><?=   $all_data[0]['f_name']; ?></textarea>
				  <br/><br><center>
  <a class="btn btn-success" id="update_ext">Update </a></center>
				  </form><br/><br/>
                </div>
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
   <script>var est_details =CKEDITOR.replace( 'facility' );
   $("#update_ext").click(function(){
	$("#ext_form").submit();
   });
   </script>
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