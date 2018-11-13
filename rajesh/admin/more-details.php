<?php include('include/config.php'); ?>
<?php include('include/top-menu.php'); ?>
<?php include('include/header.php'); ?>


	<?php 
$totalEmpSQL = "select title_name,title_id from title where admin_id='".$admin_id."' && product_id='".$_GET["token"]."'";
				$all_data=fetch_query($con,$totalEmpSQL);
				$totalEmpSQL1 = "select establishment,company_name from product where admin_id='".$admin_id."' && company_id='".$_GET["token"]."'";
					$all_data1=fetch_query($con,$totalEmpSQL1);
				  ?>
  <div class="boxed">
    
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
      <div class="pageheader hidden-xs">
        <h3><i class="fa fa-file-text-o"></i><?= $all_data1[0]["company_name"]; ?></h3>
        <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
          <ol class="breadcrumb">
            <li> <a href="dashbord.php"> Home </a> </li>
            <li class="active">More Details</li><li><a  href='company'>Back</a></li>
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
				if(isset($_POST["title_name"])){
					$est=trim($_POST["title_name"]);
				 	$est_1= mysqli_real_escape_string($con,$_POST["title_name"]);
				$all_data=fetch_query($con, "select title_name,title_id from title where admin_id='".$admin_id."' && product_id='".$_GET["token"]."'");
				if(empty($all_data)){
					$update=insert_query($con,"insert into title set title_name='".$est_1."' , admin_id='".$admin_id."' , product_id='".$_GET["token"]."',title_date='".date("Y-m-d")."'");
				}else{
					$update=update_query($con,"update title set title_name='".$est_1."' where admin_id='".$admin_id."' && product_id='".$_GET["token"]."'");
				}
					
					if($update==1){
						echo '<div class="alert alert-success">Details is Updated  Successfully. </div>';
						echo 	$est;
											}else{
						echo '<div class="alert alert-danger">Sorry Unable To Update Detail </div>';
					}
				}
				
				?></div>
			
				  <form method="post" id="ext_form">
				  <textarea name="title_name" id="title_name" rows="10" cols="80"><?=   $all_data[0]['title_name']; ?></textarea>
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
   <script>var est_details =CKEDITOR.replace( 'title_name' );
   $("#update_ext").click(function(){
	$("#ext_form").submit();
   });
   </script>