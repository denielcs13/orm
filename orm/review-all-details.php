<?php include 'admin/include/function.php';
include('includes/header.php');


$review_customer_id=(isset($_SESSION["review_customer_id"]))?$_SESSION["review_customer_id"]:'';
?>
	
<div class="content indent">
  <div class="thumb-box4" >
		<div class="container">
			<h3 class="indent2 wow fadeIn"><center>Review Details</center></h3>
	 <?php  $queryr="select product.company_id,product.company_name, review.product_id, review.user_id, review.r_title, review.r_rating, review.status, review.r_description, review.r_date,user_register.u_id, user_register.u_image, user_register.u_name, user_register.u_email, user_register.u_phone, review.admin_id, review.r_id,product.product_image from review LEFT JOIN product ON  product.company_id = review.product_id   left JOIN user_register ON  user_register.u_id=review.user_id where review.admin_id='".$admin_id."' && review.status='1' order by review.r_id DESC";
						$datar=fetch_query($con,$queryr);
						if(!empty($datar))
						{
							
							foreach($datar as $all_data)
							{
								
								$image=(file_exists('admin/images/company/'.$all_data['product_image']) && !empty($all_data['product_image']))?'admin/images/company/
								'.$all_data['product_image']:'admin/img/defaultimage.png';
						?>
<div class="col-md-12" style="background-color:#ffffff; width:100%;  border:1px solid lightgray; padding:10px; margin-bottom:10px;">
	<div  class="col-md-12" >
	<a href="product/<?php echo $all_data['company_id'].'/'.str_replace(" ","-",$all_data['company_name']).'-2.html'; ?>">
	<div class="col-md-2" style="border:1px solid lightgray; "><figure><img src="<?=$image;?>"  height="100" width="150" alt=""></figure></div>
	<div class="col-md-1"></div>
	<div class="col-md-9"><h5><?=  substr($all_data['r_title'],0,80) ?></h5></a>
	<span style="color:black; font-size:13px;">Review On :<span style="color:green; font-size:12px;"><?php echo $all_data['company_name']; ?></span></span><br>
	<?php
										for($i=1;$i<=$all_data['r_rating'];$i++){
										echo  '<i class="fa fa-star" ></i> ';
										}for($i=1;$i<=(5-$all_data['r_rating']);$i++){
										echo '<i class="fa fa-star-o"></i> ';
										} ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	 BY : <span style="font-size:12px; color:green;">	<?=  $all_data['u_name'] ?></span>
										<br>
				<?=  substr($all_data['r_description'],0,500) ?>....					
	</div></div>
	
<div class="col-md-9"></div>
<div class="col-md-3">
<?php 
			$comment=mysqli_query($con,"select count(c_id) as comment from comment where r_id='".$all_data['r_id']."'");
			$data5=mysqli_fetch_assoc($comment);
			$total_records5=$data5['comment'];   
			$total_pages5=ceil($total_records5);	
		?>		
<a href="product/<?php echo $all_data['company_id'].'/'.str_replace(" ","-",$all_data['company_name']).'-2.html'; ?>"><span style="color:green; font-size:12px;">
<i class="fa fa-comments-o"></i> Comment ( <?php echo $total_pages5; ?> )</button> &nbsp;&nbsp; Read Cpmplete Review<span></a>	</div>

 
				
			
						</div>
						<?php } } ?>
						</div></div><br><br></div></div>
<!-- question stat--    ///////////////////////////////////////////////////////////////////////////////     ---->

<?php  include('includes/footer.php'); ?>