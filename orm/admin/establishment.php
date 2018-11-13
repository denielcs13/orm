<?php include('include/config.php'); ?>
<?php include('include/top-menu.php'); ?>
<?php include('include/header.php'); ?>


	<?php 
$totalEmpSQL = "select establishment,company_name from product where admin_id='".$admin_id."' && company_id='".$_GET["P_ID"]."'";
				$all_data=fetch_query($con,$totalEmpSQL);
				
				  ?>
  <div class="boxed">
    
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
      <div class="pageheader hidden-xs">
        <h3><i class="fa fa-file-text-o"></i><?= $all_data[0]["company_name"]; ?></h3>
        <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
          <ol class="breadcrumb">
            <li> <a href="dashbord.php"> Home </a> </li>
            <li class="active">Establishment</li><li><a  href='company'>Back</a></li>
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
				<div id="error-msg-page"><?
				if(isset($_POST["establishment"])){
					$est=trim($_POST["establishment"]);
				 	$est_1= mysqli_real_escape_string($con,$_POST["establishment"]);
					$update=update_query($con,"update product set establishment='".$est_1."' where admin_id='".$admin_id."' && company_id='".$_GET["P_ID"]."'");
					if($update==1){
						echo '<div class="alert alert-success">Establishment is Updated  Successfully. </div>';
						echo 	$est;
											}else{
						echo '<div class="alert alert-danger">Sorry Unable To Update Establishment </div>';
					}
				}
				
				?></div>
			
				  <form method="post" id="ext_form">
				  <textarea name="establishment" id="establishment" rows="10" cols="80"><?=   $all_data[0]['establishment']; ?></textarea>
				  <br/><br><center>
  <a class="btn btn-success" id="update_ext">Update </a></center>
				  </form><br/><br/>
                </div>
                <!--===================================================-->
                <!--End Block Styled Form -->
              </div>
            </div>
          </div>
        </div>
      </div>
   
     
	 
	   </div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->
  </div>

<?php include('include/footer.php'); ?>
<script src="ckeditor/ckeditor.js"></script>
   <script>var est_details =CKEDITOR.replace( 'establishment' );
   $("#update_ext").click(function(){
	$("#ext_form").submit();
   });
   </script>