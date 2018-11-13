<?php include('include/config.php'); ?>
<?php include('include/top-menu.php'); ?>
<?php include('include/header.php'); ?>

<?php 
	
		$types=$_GET['type'];

/* $query="update product  from product where company_id='$p_id'";
$all_data=fetch_query($con,$query); */ 
extract($_POST);
if(isset($submit))
{	
	if($types == 'product')
	{
	$p_id=$_GET['P_ID'];
	$query="update product set meta_tag='".$meta_tag."', meta_keyword='".$meta_keyword."',meta_description='".$meta_description."' where company_id='$p_id'";
	}
	else if($types =='category'){
		$c_id=$_GET['C_ID'];
		$query="update category set meta_tag='".$meta_tag."', meta_keyword='".$meta_keyword."',meta_description='".$meta_description."' where category_id='$c_id'";
	}
	else if($types =='subcategory1'){
		$ss_id=$_GET['SS_ID'];
		$query="update subcategory1 set meta_tag='".$meta_tag."', meta_keyword='".$meta_keyword."',meta_description='".$meta_description."' where sub_cat_id='$ss_id'";
	}
	else if($types =='subcategory2'){
		$s_id=$_GET['S_ID'];
		$query="update subcategory2 set meta_tag='".$meta_tag."', meta_keyword='".$meta_keyword."',meta_description='".$meta_description."' where sub_cat2_id='$s_id'";
	}
	else if($types =='complain'){
		$co_id=$_GET['CO_ID'];
		$query="update complain set meta_tag='".$meta_tag."', meta_keyword='".$meta_keyword."',meta_description='".$meta_description."' where c_id='$co_id'";
	}
	else if($types =='question'){
		$q_id=$_GET['Q_ID'];
		$query="update question set meta_tag='".$meta_tag."', meta_keyword='".$meta_keyword."',meta_description='".$meta_description."' where q_id='$q_id'";
	}
	else if($types =='review'){
		$r_id=$_GET['R_ID'];
		$query="update review set meta_tag='".$meta_tag."', meta_keyword='".$meta_keyword."',meta_description='".$meta_description."' where r_id='$r_id'";
	}
	else if($types =='comment'){
		$co_id=$_GET['CO_ID'];
		$query="update comment set meta_tag='".$meta_tag."', meta_keyword='".$meta_keyword."',meta_description='".$meta_description."' where c_id='$co_id'";
	}
	
	else if($types =='answer'){
		$a_id=$_GET['A_ID'];
		$query="update answer set meta_tag='".$meta_tag."', meta_keyword='".$meta_keyword."',meta_description='".$meta_description."' where ans_id='$a_id'";
	}
	
	if($con !=='' && $query !==''){
	$update_query=update_query($con,$query);
	if($update_query==1){	
		echo '<div class="alert alert-success">Success</div>';
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Updated Product </div>';
	}
	}else{
		echo '<div class="alert alert-danger">Invalid Request</div>';
	}
	
}
else{
	echo "sorry";
}
if($types == 'product')
	{
	$p_id=$_GET['P_ID'];
	$condition = " where company_id='$p_id'";
	}
	else if($types =='category'){
		$c_id=$_GET['C_ID'];
	$condition = " where category_id='$c_id'";
	}
	else if($types =='subcategory1'){
		$ss_id=$_GET['SS_ID'];
	$condition = " where sub_cat_id='$ss_id'";
	}
	else if($types =='subcategory2'){
		$s_id=$_GET['S_ID'];
	$condition = " where sub_cat2_id='$s_id'";
	}
	else if($types =='complain'){
		$co_id=$_GET['CO_ID'];
	$condition = " where c_id='$co_id'";
	}
	else if($types =='question'){
		$q_id=$_GET['Q_ID'];
		$condition = " where q_id='$q_id'";
	}
	else if($types =='review'){
		$r_id=$_GET['R_ID'];
	$condition = " where r_id='$r_id'";
	}
	else if($types =='comment'){
		$co_id=$_GET['CO_ID'];
	$condition = " where c_id='$co_id'";
	}
	
	else if($types =='answer'){
		$a_id=$_GET['A_ID'];
		$condition = " where ans_id='$a_id'";
	}
	$query_select=fetch_query($con,"select meta_tag,meta_keyword,meta_description from ".$types.$condition);
?>

  <div class="boxed">
   
    
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
      <div class="pageheader hidden-xs">
	 
        <h3><i class="fa fa-file-text-o"></i><?php echo $types; ?></h3>
        <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
          <ol class="breadcrumb">
            <li> <a href="dashbord.php"> Home </a> </li>
            <li class="active"><?php echo $types; ?></li>
          </ol>
        </div>
      </div>
      <!--Page content-->
      <!--===================================================-->
    
      <div id="page-content">
        <div class="row">
          <div class="eq-height">
            <div class="col-md-12" >
				
              <div class="panel">
              <div class="row">
				<div class="col-md-4" style="margin-left:80px;"> 
					<h3>Add Meta Details</h3>			  
					</div>
					
								</div>
								<form method="post">
								
  <div class="col-md-12" style="padding:15px;">
   <div id="error-msg"></div>
   <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Meta Title: * </label>
      <input type="text" class="form-control" id="meta_tag" name="meta_tag" value="<?= $query_select[0]["meta_tag"]; ?>" required />
                                                            </div>
                                                            </div>	
  
   <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Mata Keyword: * </label>
                                                            <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="<?= $query_select[0]["meta_keyword"]; ?>" required />
                                                            </div>
                                                            </div>	
									 <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Meta Description: * </label>
                                                            <input type="text" class="form-control" id="meta_description" name="meta_description" value="<?= $query_select[0]["meta_description"]; ?>" required />
                                                            </div>
                                                            </div>							
   <div class="col-md-4">
                                                        <div class="form-group">
                                                            
  <input type="submit"  class="btn btn-success"  name="submit" value="ADD">
                                                            </div>
                                                            </div></div>
			  </form>
															
                <!--===================================================-->
                <!--End Block Styled Form -->
              
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



<script src="js/myjs/function.js" ></script>