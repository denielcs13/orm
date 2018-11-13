<?php include '../admin/include/config.php';  
include('../c_like.php');
include_once '../includes/pagination.php';
$page	= new page();
$per_page = 10;
if(isset($_POST["page"])){
 $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); 
	if(!is_numeric($page_number)){die('Invalid page number!');}
}else{
    $page_number = 1;

}
$review_customer_id=(isset($_SESSION["review_customer_id"]))?$_SESSION["review_customer_id"]:'';
?>
		<?php 
	//	$catid=(is_numeric($_POST['id']))?"where category_id='".$_POST['id']."'":'';
	//$cat=mysqli_query($con,"select category_id from category ".$catid);
	//while($cdata=mysqli_fetch_assoc($cat)){
	
	$star_filter=array();
	$filter='';
	$star=$_POST["by_star"];
	if(!empty($star)){
		$star_exp=explode(",",$star);
		foreach($star_exp as $st){
			if($st==9){
			$star_filter[] =" rating='5'";		
			}
			if($st==8){
			$star_filter[] =" rating='4'";		
			}
			if($st==7){
			$star_filter[] =" rating='3'";		
			}
			if($st==6){
			$star_filter[] =" rating='2' || rating='1' || rating='0'";		
			}
		
		}
		if(empty($filter)){
		$filter.=" (".implode (" || ",$star_filter).")";		
		}else{
	$filter.=" && (".implode (" || ",$star_filter).")";	
		}
	}
	if(isset($_POST["search_by_loc"])&& !empty($_POST['search_by_loc'])){
		if(empty($filter)){
		$filter.=" (c_zip_code='".$_POST["search_by_loc"]."' || c_company_name like '%".$_POST["search_by_loc"]."%')";	
		}else{
		$filter.=" && (c_zip_code='".$_POST["search_by_loc"]."' || c_company_name like '%".$_POST["search_by_loc"]."%' )";	
		}	
	}
	/* if(isset($_POST["search_by_name"]) && !empty($_POST['search_by_name'])){
		if(empty($filter)){
		$filter.=" c_company_name like '%".$_POST["search_by_name"]."%'";
		}else {
		$filter.=" && c_company_name like '%".$_POST["search_by_name"]."%'";	
		}
	} */
	 if(is_numeric($_POST['id']) && !empty($_POST['id'])){
		if(empty($filter)){
		$filter.=" c_category='".$_POST['id']."'";
		}else{
		$filter.=" && c_category='".$_POST['id']."'";	
		}
	}
	 $condition='';
	if(!empty($filter)){
		$condition =" where ".$filter;
	}
 $sql="select c_company_name,user_id,c_id,c_subject,c_details,rating from complain ".$condition." order by c_id  DESC";
$query_book=mysqli_num_rows(mysqli_query($con,$sql));
if($query_book>0){
 $totalpages = ceil($query_book/$per_page);
 $page_position = (($page_number-1) * $per_page);
 $cnt=$page_position+1;
 $sql." LIMIT $page_position, $per_page";
 $query_limit =mysqli_query($con,$sql." LIMIT $page_position, $per_page");
while($data=mysqli_fetch_assoc($query_limit)){
	$sql2=mysqli_query($con,"select u_name,u_date from user_register where u_id='".$data['user_id']."'");
while($data2=mysqli_fetch_assoc($sql2)){  
 $acronym ='';    
foreach(explode(' ', $data2['u_name']) as $word){ $acronym .= mb_substr($word, 0, 1, 'utf-8'); 
} $url='complain/'.$data['c_id'].'/'.strtolower(str_replace(" ","-",$data['c_company_name'])).'-1.html';   ?>
			
	<div class="col-md-12" style="border:1px solid #DFDFDF; font-size:15px; background-color:#FAFAFA; padding:10px;  margin-bottom:14px;">
	<a href="<?= $url; ?>" style="color:blue;"> <?php echo $data['c_company_name']; ?> </a> - <?php echo $data['c_subject']; ?><br>
	<div class="name_show"><?= substr($acronym,0,2);  ?></div> 
		<span style="font-size:12px;"><?php echo $data2['u_name'].' on '.date("M d , Y".strtotime($data2['c_date'])); ?></span> <br/><?
		if(!empty($data["rating"])){
			for($s=1;$s<=($data["rating"]);$s++){
				echo '<i class="fa fa-star"></i> ';
			}
		}
		if(!empty($data["rating"])){
			for($s=($data["rating"]);$s<5;$s++){
				echo '<i class="fa fa-star-o"></i> ';
			}
			echo '<br/>';
		}
		
		echo substr($data['c_details'],0,220); ?> ....	<br>	
				
				
			<!--START OF LIKE UNLIKE QUESTION ANSWER  -->
			
			<div class="post">
				<?php $_post['id']=$review_customer_id;?>
			  <div class="post-info">
				<!-- if user likes post, style button differently -->
				<a <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?> data-id="<?php echo $_post['id']; ?>" data-rtype="1" id="like_<?php echo $data["c_id"]; ?>" data-complain_id="<?php echo $data["c_id"]; ?>">
				<i <?php if (userLiked($_post['id'],$data["c_id"])): ?>
					  class="fa fa-thumbs-up"
				  <?php else: ?>
					 class="fa fa-thumbs-o-up"
				  <?php endif ?>  ></i>
				 
				<span class="likes" ><?php echo getLikes($_post['id'],$data["c_id"]); ?></span></a>
				
				&nbsp;&nbsp;&nbsp;
<a <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?> data-id="<?php echo $_post['id'];?>" data-rtype="2" id="dislike_<?php echo $data["c_id"]; ?>"  data-complain_id="<?php echo $data["c_id"]; ?>">
				<!-- if user dislikes post, style button differently -->
				<i 
				  <?php if (userDisliked($_post['id'],$data["c_id"])): ?>
					  class="fa fa-thumbs-down"
				  <?php else: ?>
					 class="fa fa-thumbs-o-down "
				  <?php endif ?>
				  ></i>
				<span class="dislikes" ><?php echo getDislikes($_post['id'],$data["c_id"]);?></span>
				</a>
			  </div>
			</div>
			
			<!--END OF LIKE UNLIKE QUESTION ANSWER  -->
			<?php
			$sql1=mysqli_query($con,"select count(co_id) as pige from complain_comment where complain_id='".$data['c_id']."'");
					$data1=mysqli_fetch_assoc($sql1);
					 $total_records=$data1['pige'];
					 $total_pages=ceil($total_records);
				?>
					<div style="border: 1px solid #dadada; cursor:pointer; padding: 10px;    margin-top: 15px;"> 	<a id="ques" data-complain_id="<?php echo $data["c_id"]; ?>">Read Comment ( <?php echo $total_pages; ?> )</a>
	</div>
			<br>
				<!------comment  -==================section===============------->
		<div class="col-md-12"  id="div<?php echo $data["c_id"]; ?>" style="display:none;  background-color:#FAFAFA; margin-bottom:15px;padding:10px;">
				
			<div class="col-md-1"></div>
		<div class="col-md-9">			
					
		<?php				
		$query1=mysqli_query($con,"select user_id,comment,co_id from complain_comment where complain_id='".$data['c_id']."' order by co_id DESC LIMIT 0,2");
		while($data_cat=mysqli_fetch_assoc($query1))
					{
$sql3=mysqli_query($con,"select u_name from user_register where u_id='".$data_cat['user_id']."'");
while($data3=mysqli_fetch_assoc($sql3)){						?>
					
					 <span style="color:gray; font-size:13px; color:green;"> <?php echo $data_cat['comment']; ?></span><br>
					  <span style="color:gray; font-size:12px; color:gray;">BY :<?php echo $data3['u_name'];  ?></span>
			<?php
	$sql2=mysqli_query($con,"select count(r_id) as pige from complain_reply where comment_id='".$data_cat['co_id']."'");
					$data2=mysqli_fetch_assoc($sql2);
					 $total_records2=$data2['pige'];
					 $total_pages2=ceil($total_records2);
				?>		  
<button style="margin-left:100px;" class="btn btn-primary btn-xs" onClick="myFunction(<?php echo $data_cat['co_id'];  ?>)">Reply ( <?php echo $total_pages2; ?>) </button><br><br>
	<!------- Reply==========================section ----------------------->	
			<div  class="col-md-12" id="myDIV<?php echo $data_cat['co_id'];  ?>" style="display:none;">
	
<form id="contact-form"   name="complain_reply_form<?php echo $data_cat["co_id"]; ?>" method="post" enctype="multipart/form-data">
		<div class="contact-form-loader"></div>
<div id="error_reply"></div>
                            <label class="name form-div-4">
		 <input type="hidden" name="action" id="action" value="NEWREPLY">
		 <input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>
			<input type="hidden" name="complain_id" id="complain_id" value="<?php echo $data['c_id']; ?>"/>	
		 <input type="hidden" name="comment_id" value="<?php echo $data_cat["co_id"]; ?>"/>	
		 <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $review_customer_id; ?>"/>
		<input type="text" name="c_reply" id="c_reply"  placeholder="Reply on this Comment" value=""  data-constraints="@Required @JustLetters"  style="background-color:white;"/><br><br>
							
<div>
<a style="background-color:green; padding:6px; color:white;"   name="submit" data-comment_id="<?php echo $data_cat['co_id']; ?>" data-complain_id="<?php echo $data['c_id']; ?>" id="add_data_complain_reply" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?>>Submit</a>
				</label>
                             
                 </div>
			
        </form>		  
			</div>		  
					  
					  
					 <?php
					}  } 
				?>
					<form id="contact-form"  name="complain_comment_form<?php echo $data["c_id"]; ?>" method="post" enctype="multipart/form-data" >
			<div class="contact-form-loader"></div>
				<div id="error_comments"></div>
                         <label class="name form-div-4">
								
										 <input type="hidden" name="action" id="action" value="NEWCOMMENTS">
										 <input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>	
										 <input type="hidden" name="complain_id" value="<?php echo $data['c_id']; ?>"/>	
										 <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $review_customer_id; ?>"/>
		<input type="text" name="c_name" id="c_name"  placeholder="Comment" data-constraints="@Required @JustLetters"  style="background-color:white;"  /><br><br>
						
				
		<a   name="submit" style="background-color:red; padding:6px; color:white;" data-complain_id="<?php echo $data["c_id"]; ?>" id="add_data_complain_comment" data-url="<?= $url; ?>" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; 
	?>>Submit</a>		
				
				</label>	  
				 	</form>	</div>
					
					
				
	</div>
	</div>
	<?php } }
	 echo '<center>';
	echo $page->fun_pagination($per_page, $page_number, $query_book, $totalpages);
	echo '</center>'; 
	}else{
		echo "No Complain Found.";
	}
	?>	
	
	