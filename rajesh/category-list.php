<?php include 'admin/include/function.php';
include('includes/header.php');
$catid  = $_GET['id'];

?>
	
<style>
a:hover{
	color:#699E1E;
}
.btn {
    color: #ffffff !important;
}
.modal-content{
	margin-top:20%;
}
.div_border{border-right: 1px solid lightgray;
    padding: 0px 5px 0px 5px;
	}
	.font-color{
	 font: 15/15px 'Roboto';
    color: #40ae21;
	}
	.font-color-yellow{
	 font: 17px/17px 'Roboto';
    color:#fdf733
	}
	.font-color-yellow center{
	background-color: #54b638;
    padding: 5px;
    border-radius: 5px;
	}
.border{
border:1px solid #DFDFDF; background-color:#FAFAFA;  border-left:1px solid #DFDFDF; color:#699E1E;  margin-left:15px; padding:5px; margin-bottom:10px;
}	
	
</style>

<?php $query_cat="select * from category where category_id='$catid'   order by category_id ";
$data_cat=fetch_query($con,$query_cat);
?>
<div class="content indent" ><br>
	<div class="container">
		<div class=" col-md-12  wow fadeIn" style="border: 1px solid #DFDFDF; padding:25px;">
				<h5 style="color:gray;">Home > <?php echo  $data_cat[0]['category_name'];  ?> </h5><br>
					<div class="row">
						
<!-- div1 start--===========================================================================================--->
<?php include 'includes/left-bar-category.php'; ?>
<!-- div2       -------start--///////////////////////////////////////////////////////////////////= --->					
				
	<div class="col-md-9 wow fadeIn" data-wow-delay="0.1s" id="ifYes1<?php echo $data_cat['category_id']; ?>"  style=" border:1px solid #DFDFDF; background-color:#FAFAFA;  color:#699E1E;  " >
		<div class="thumb-box4">
            <div class="container">	
								<?php 
									$sub_cat="select sub_cat_name,sub_cat_id from subcategory1 where cat_id='$catid'";
													$data_cat2=fetch_query($con,$sub_cat);
														foreach($data_cat2 as $about_data){  	
								?>
											
													
<!--   category product section -/////////   start----////////////////////////------>										
	
		<?php 
			$product="select company_name,company_id,product_image from product where category='".$catid."' &&  subcategory1='".$about_data['sub_cat_id']."'";
				$product_data=fetch_query($con,$product);
				if(!empty($product_data)){
				$c_count=1;
				echo '<h5>'.$about_data['sub_cat_name'] .'</h5><div class="row" >';
					foreach($product_data as $pro_data) { 
						$query2="select r_id from review where product_id='".$pro_data['company_id']."' && status='1'";
							$count_row=num_query($con,$query2);
								//$data2=fetch_query($con,$query2);				
									if($pro_data['company_id']==''){
		?>
	<h6 style="display:none;"><?php echo $about_data['sub_cat_name'] ;   ?></h6>
		<?php }  ?>
				
		<?php  include 'includes/rating-average.php'; ?>
	<div class="col-md-8" data-wow-delay="0.1s"  style=" border:1px solid #DFDFDF; background-color:#FAFAFA; padding:10px; margin-left:20px; margin-bottom:10px;">
		<div class="col-md-2" data-wow-delay="0.1s"  align="left" >
		 <img src="admin/images/company/<?php echo $pro_data['product_image']; ?>" alt="" style="height:100px; width:100px;">	
					</div>
					 <a href="product/<?php echo $pro_data['company_id'].'/'.strtolower(str_replace(" ","-",$pro_data["company_name"])).'-'.$c_count++.'.html'; ?>">
			<div class="col-md-9 wow fadeIn" data-wow-delay="0.1s"   align="left" style="font-size:18px;">
				<span style="color:green; font-size:13px;"> <?php echo $pro_data['company_name']; ?></span></a><br><br>
					<div class="col-md-3 div_border font-color-yellow"><center>
						<?php	echo $average_rating; ?></center></div>
							<div class="col-md-3 div_border"> <center><img src="img/love.jpg"  height="20">90%</center></div>
							<div class="col-md-4 font-color"><a href="product/<?php echo $pro_data['company_id'].'/'.strtolower(str_replace(" ","-",$pro_data["company_name"])).'-'.$c_count++.'.html'; ?>" style="font-size:13px;"> <?php  echo $count_row; ?> Reviews</a></div>
			</div>
	</div>
		<?php } ?>	
             
              </div>
				<br>  
<!--   category product section -/////////  End----/////////////////////////  ------>		
				<?php    }  }?>
            
	 </div> 
			</div>
					</div>
 <!-- div2       -------End--///////////////////////////////////////////////= --->			
				</div>
			</div>
		</div><br><br>
	</div>
	
		 
<script>
  
  function yesnoCheck1(that) {
	   $.ajax({
		url:"execution/category-filter-data.php",
		method:"POST",		
		dataType : "html",		
		data:"id=" + that.value,
		
		success: function(response){
		
			$("#ifYes1").html(response);	
			
		}
	});
	 
    }		

$( "#change2"+id ).click(function(id) {
  $( "#ifYes1" ).toggle();
});
 </script>      
<?php  include('includes/footer.php'); ?>
