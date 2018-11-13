<?php include '../admin/include/config.php';  
//include('../c_like.php');
$review_customer_id=(isset($_SESSION["review_customer_id"]))?$_SESSION["review_customer_id"]:'';
?>
		<div class="thumb-box4">
            <div class="container">	
										<?php 
												$sub_cat="select * from subcategory1 where cat_id='$catid'  ";
												$data_cat2=fetch_query($con,$sub_cat);
												
												foreach($data_cat2 as $about_data){  	
											?>
											
													<h5><?php echo $about_data['sub_cat_name'] ;   ?></h5>
<!--   category product section -/////////   start----===============================//------>										
			<div class="row" >
			<?php 
				$product="select * from product where category='".$catid."' &&  subcategory1='".$about_data['sub_cat_id']."'";
								$product_data=fetch_query($con,$product);
									foreach($product_data as $pro_data)
		{ 
		
	$query2="select * from review where product_id='".$pro_data['company_id']."' && status='1'";
								$count_row=num_query($con,$query2);
								 $data2=fetch_query($con,$query2);				
			if($pro_data['company_id']==''){
		?>
	<h6 style="display:none;"><?php echo $about_data['sub_cat_name'] ;   ?></h6>
		<?php }  ?>
				
		<?php  include '../includes/rating-average.php'; ?>
	<div class="col-md-8" data-wow-delay="0.1s"  style=" border:1px solid #DFDFDF; background-color:#FAFAFA; padding:10px; margin-left:20px; margin-bottom:10px;">
	
		   <div class="col-md-2" data-wow-delay="0.1s"  align="left" >
		   
		   <a href="#">
	<img src="admin/images/company/<?php echo $pro_data['product_image']; ?>" alt="" style="height:100px; width:100px;">	
					
					<a></div>
							<div class="col-md-9 wow fadeIn" data-wow-delay="0.1s"   align="left" style="font-size:18px;">
							
					<a href="product-view.php?Id=<?php echo $pro_data['company_id']; ?>" style="color:green; font-size:13px;"> <?php echo $pro_data['company_name']; ?></a><br>
									<br>
									
						<div class="col-md-3 div_border font-color-yellow"><center> <?php	echo $average_rating; ?></center></div>
									<div class="col-md-3 div_border"> <center><img src="img/love.jpg"  height="20">90%</center></div>
						<div class="col-md-4 font-color"><a href="#" style="font-size:13px;"> <?php  echo $count_row; ?> Reviews</a></div>
				</div>
		</div>
		<?php } ?>	
             
                 
                </div>
				<br>
<!--   category product section -/////////  End----/////////////////////////  ------>		
				<?php      }?>
            
	 </div> 
			</div>