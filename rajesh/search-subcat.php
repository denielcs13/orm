  <div class="col-md-9" data-wow-delay="0.1s" align="center" style=" border:1px solid #DFDFDF; background-color:#FAFAFA;  color:#699E1E; font-size:17px;padding:10px;">
  <div class="row" >
	     		<div class="col-md-12">Products / Reviews<hr></div> 
						
	
<!---tab1 --////////////////////////////////////////////  --->
		<?php 
				
/* $sql=mysqli_query($con,"select * from category where category_name  LIKE '%".$name."%'");
while($data=mysqli_fetch_assoc($sql)){*/

	$sub_cat="select * from subcategory1  where sub_cat_name  LIKE '%".$name."%'";
											while($data_cat2=fetch_query($con,$sub_cat)){
												// foreach($data_cat2 as $about_data) */{ 
$product="select * from product where   subcategory1='".$data_cat2['sub_cat_id']."'";
								$product_data=fetch_query($con,$product);
									foreach($product_data as $pro_data)
		{ 
		 $query2="select * from review where product_id='".$pro_data['company_id']."'  && status='1'";
								$count_row=num_query($con,$query2);
								 $data2=fetch_query($con,$query2);	 
		
															?>
			
		<?php  include 'includes/rating-average.php'; ?>
	<div class="col-md-11" data-wow-delay="0.1s"  style=" border:1px solid #DFDFDF; background-color:#FAFAFA; padding:10px; margin-left:40px; margin-bottom:10px;">
	
		   <div class="col-md-2" data-wow-delay="0.1s"  align="left" >
		   
		   <a href="#">
	<img src="admin/images/company/<?php echo $pro_data['product_image']; ?>" alt="" style="height:100px; width:100px;">	
					
					<a></div>
							<div class="col-md-9 wow fadeIn" data-wow-delay="0.1s"  align="left" style="font-size:18px;">
							
		<a href="product-view.php?Id=<?php echo $pro_data['company_id']; ?>" style="color:green; font-size:13px;"> <?php echo $pro_data['company_name']; ?></a><br>
									<br>
									
						<div class="col-md-3 div_border font-color-yellow" style="font-size:15px;"><center> <?php	echo $average_rating; ?></center></div>
									<div class="col-md-3 div_border"> <center>
									<img src="img/love.jpg"   style="font-size:13px; height:25px;">90%</center></div>
						<div class="col-md-4 font-color"><a href="#" style="font-size:13px;"> <?php  echo $count_row; ?> Reviews</a></div>
				</div>
		</div>
		
												<?php }  }
					
		?>	
		<!---tab2 --////////////////////////////////////////////  --->
	
<div>
		 </div>
				</div> 
						</div>
	
<br><br></div><br>

</div>