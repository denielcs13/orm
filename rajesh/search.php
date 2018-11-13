<?php include 'admin/include/function.php';
include('includes/header.php');
$productId=$_GET[data];
//$category=$_GET[category];
$rating=array();
$q_rating=$_GET["q_rating"];
if(!empty($q_rating)){
$rating=explode(",",$q_rating);
}
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
	 font: 20px/20px 'Roboto';
    color: #40ae21;
	}
	.font-color-yellow{
	 font: 20px/20px 'Roboto';
    color:#fdf733
	}
	.font-color-yellow center{
	background-color: #54b638;
    padding: 5px;
    border-radius: 5px;
	}
</style>


	
<div class="content indent"><br>

	<div class="container">
	<div class=" col-md-12  wow fadeIn" style="border: 1px solid #DFDFDF; padding:25px;">
	<h2  style="color:gray;">Search results  <?php echo (!empty($productId))?' for '.$productId:''; ?></h2>	
		<?php
		
?>
				<div class="row">
					<div class="col-md-3 wow fadeIn" data-wow-delay="0.1s" >
						<div class="table-responsive">          
			<table class="table" Style="border:1px solid lightgray; font-size:17px;"  cellpadding="15" cellspacing="15" align="center">
			
    <tbody>
      <tr><td><span style="font-size:12px; color:gray;">Filter out your Search</span><br><br>
		<a href="#"> All</a></td></tr>
		<?php
		$sql=mysqli_query($con,"select category_name,category_id from category order by category_name asc");
while($data=mysqli_fetch_assoc($sql)){

?>
	<tr><td><a href="#" style="font-size:12px;"><?php  echo $data['category_name']; ?></a></td></tr>
	<?php			
}
		if($category=='category'){
			//where category_name  LIKE '%".$id."%'
$sql=mysqli_query($con,"select category_name,category_id from category order by category_name asc");
while($data=mysqli_fetch_assoc($sql)){

?>
	<tr><td><a href="#" style="font-size:12px;"><?php  echo $data['category_name']; ?><?php  echo $data['category_id']; ?></a></td></tr>
	<?php			
}
		}else if($category=='subcat'){
$sql=mysqli_query($con,"select * from subcategory1 where sub_cat_name  LIKE '%".$id."%'");
while($data=mysqli_fetch_assoc($sql)){

?>
	
	<tr><td><a href="#" style="font-size:14px;"><?php  echo $data['sub_cat_name']; ?></a></td></tr>
	<?php			
}
		}else if($category=='subcat2'){
			echo "select * from subcategory2 where sub_cat2_name  LIKE '%".$id."%'";
$sql=mysqli_query($con,"select * from subcategory2 where sub_cat2_name  LIKE '%".$id."%'");
while($data=mysqli_fetch_assoc($sql)){

?>
	
	<tr><td><a href="#" style="font-size:14px;"><?php  echo $data['sub_cat2_name']; ?></a></td></tr>
	<?php			
}
		}else if($category=='product'){
					echo "select * from product where company_name  LIKE '%".$id."%'";
$sql=mysqli_query($con,"select * from product where company_name  LIKE '%".$id."%'");
while($data=mysqli_fetch_assoc($sql)){

?>
	
	<tr><td><a href="#" style="font-size:14px;"><?php  echo $data['company_name']; ?></a></td></tr>
	<?php			
}
		}
?>
    </tbody>
			</table>
					</div>
					<div class="table-responsive">          
			<table class="table" Style="border:1px solid lightgray; font-size:17px;"  cellpadding="15" cellspacing="15" align="center">
			
    <tbody>
      <tr><td><span style="font-size:12px; color:gray;">Filter By:</span><br><br><span style="font-size:14px; color:gray;">USER RATING</span><br><br></td></tr>
	   <tr><td><input type="checkbox" value="9" name="start[]" <?= in_array(9,$rating)?'checked':''; ?> onChange="change_star(this);"  /> <span style="font-size:12px; color:gray;">5 Star </span></td></tr>
	      <tr><td><input type="checkbox" value="8" name="start[]" <?= in_array(8,$rating)?'checked':''; ?>  onChange="change_star(this);" /><span style="font-size:12px; color:gray;"> 4 Star </span></td></tr>
			
			  <tr><td><input type="checkbox" value="7" name="start[]" <?= in_array(7,$rating)?'checked':''; ?>  onChange="change_star(this);" /><span style="font-size:12px; color:gray;"> 3 Star </span></td></tr>
				  <tr><td><input type="checkbox" value="6" name="start[]" <?= in_array(6,$rating)?'checked':''; ?>  onChange="change_star(this);" /><span style="font-size:12px; color:gray;"> Less Than 3 Star</span></td></tr>
		</tbody>
</table>		
</div>				</div>
              
	<div class="col-md-9 wow fadeIn" data-wow-delay="0.1s" id="ifYes1<?php echo $data_cat['category_id']; ?>"  style=" border:1px solid #DFDFDF; background-color:#FAFAFA;  color:#699E1E;  " >
		<div class="thumb-box4">
            <div class="container">	
																		
	
		<?php //".$ratingfilter." 
			$product="select company_name,company_id,product_image,category_name,category_id from product left outer join category on product.category=category.category_id where company_name like '%".$productId."%'";
			
				$product_data=fetch_query($con,$product);
				if(!empty($product_data)){
				$c_count=1;
				echo '<h5>'.$about_data['sub_cat_name'] .'</h5><div class="row" >';
					foreach($product_data as $pro_data) { 
						$query2="select r_id,r_rating from review where product_id='".$pro_data['company_id']."' && status='1'";
							$count_row=num_query($con,$query2);
								$data2=fetch_query($con,$query2);				
									if($pro_data['company_id']==''){
		?>
	<h6 style="display:none;"><?php echo $about_data['sub_cat_name'] ;   ?></h6>
		<?php }  ?>
				
		<?php  include 'includes/rating-average.php'; 
		$r_count=0;
		foreach($rating as $rating_val){
			$r_count+=($rating_val==9 && $averagerating>'4.50' && $averagerating<=5)?1:0;
			$r_count+=($rating_val==8 && $averagerating>'3.50' && $averagerating<='4.50')?1:0;
			$r_count+=($rating_val==7 && $averagerating>='3' && $averagerating<='3.50')?1:0;
			$r_count+=($rating_val==6 &&( $averagerating=='' || $averagerating=='0' || $averagerating<'3'))?1:0;
		}
		$r_count+=(empty($rating))?1:$r_count;
		if($r_count>0){
		?>
	<div class="col-md-8" data-wow-delay="0.1s"  style=" border:1px solid #DFDFDF; background-color:#FAFAFA; padding:10px; margin-left:20px; margin-bottom:10px;">
		<div class="col-md-2" data-wow-delay="0.1s"  align="left" >
		 <img src="admin/images/company/<?php echo $pro_data['product_image']; ?>" alt="" style="height:100px; width:100px;">	
					</div>
					
					 <a href="product/<?php echo $pro_data['company_id'].'/'.strtolower(str_replace(" ","-",$pro_data["company_name"])).'-'.$c_count++.'.html'; ?>"><span style="color:green; font-size:13px;"> <?php echo $pro_data['company_name']; ?></span></a>
					 <br><br>
					 <a href="category/<?php echo $pro_data['category_id'].'/'.strtolower(str_replace(" ","-",$pro_data["category_name"])).'-'.$c_count++.'.html'; ?>">
			
				<span style="color:green; font-size:14px;"> <?php echo $pro_data['category_name']; ?></span></a><br><br>
			<div class="col-md-9 wow fadeIn" data-wow-delay="0.1s"   align="left" style="font-size:18px;">
				
					<div class="col-md-3 div_border font-color-yellow"><center>
						<?php	echo $average_rating; ?></center></div>
							<div class="col-md-3 div_border"> <center><img src="img/love.jpg"  height="20">90%</center></div>
							<div class="col-md-4 font-color"><a href="product/<?php echo $pro_data['company_id'].'/'.strtolower(str_replace(" ","-",$pro_data["company_name"])).'-'.$c_count++.'.html'; ?>" style="font-size:13px;"> <?php  echo $count_row; ?> Reviews</a></div>
			</div>
	</div>
		<?php }
					}		
					if($c_count==1){
						echo '<div class="alert alert-danger">No Record Available for this Search.</div>';
					}
					?>	
             
              </div>
				<br>  
<!--   category product section -/////////  End----/////////////////////////  ------>		
				<?php    }  ?>
            
	 </div> 
			</div>
					</div>
<?php  /* if($category=='category'){ include 'search-category.php';}else if($category=='subcat'){ include 'search-subcat.php';}else if($category=='subcat2'){ include 'search-subcat2.php';}else if($category=='product'){ include 'search-product.php';} */ ?>


</div> <br><br> </div> </div>
       
<?php  include('includes/footer.php'); ?>
<script>


function change_star(rec){
	var linkre='';
	$('[name="start[]"]:checked').each(function(){
	linkre +=$(this).val()+',';
});	linkre=linkre.slice(0,-1);
	location.href = URL_add_parameter(location.href, 'q_rating', linkre);
}

function URL_add_parameter(url, param, value){
    var hash       = {};
    var parser     = document.createElement('a');

    parser.href    = url;

    var parameters = parser.search.split(/\?|&/);

    for(var i=0; i < parameters.length; i++) {
        if(!parameters[i])
            continue;

        var ary      = parameters[i].split('=');
        hash[ary[0]] = ary[1];
    }

    hash[param] = value;

    var list = [];  
    Object.keys(hash).forEach(function (key) {
        list.push(key + '=' + hash[key]);
    });

    parser.search = '?' + list.join('&');
    return parser.href;
}
</script>