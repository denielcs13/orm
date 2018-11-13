<?php  
include('includes/header.php'); 
include 'admin/include/function.php';
unset($_SESSION["product_view"]);
?>

<div  style="background-color:#EDF1F4;"> 
        
        <div class="row" >
		   <div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="slider wow fadeIn" style="height:500px;">  
                    <a href="#" class="caption-bottom">Restaurant</a>  
                    <div class="camera_wrap" >
					
					<div data-src="img/picture1.jpg" ><div class="camera-caption fadeIn"><p class="title">In pede mi, aliquet sit amet, euismod in,auctor ut, ligula liquam dapibus tincidunt metus</p></div></div>
                        <div data-src="img/picture2.jpg"><div class="camera-caption fadeIn"><p class="title">Liquam mi, aliquet sit amet, euismod in,auctor ut, ligula liquam dapibus tincidunt metus</p></div></div>
                        <div data-src="img/picture3.jpg"><div class="camera-caption fadeIn"><p class="title">Dapibus, aliquet sit amet, euismod in,auctor ut, ligula liquam dapibus tincidunt metus</p></div></div>
						
                   </div>
				   <?php 
				    if(isset($_POST['searchb']))
					{
			$product=$_POST['search2'];
		$sql=mysqli_query($con, "SELECT * FROM category WHERE category_name LIKE  '%".$product."%'");	
		//$sql=mysqli_query($con, "SELECT * FROM product WHERE company_name like  '%".$product."%'");
		
		while($data=mysqli_fetch_assoc($sql))
		{
		if($data)
		{
								
header("location:search.php?ID=$product"); 
		}
		else{
		?>
		<script>alert("No Record matched");

</script>
<?php
		}
		}
		}
		?>
		
       
		<form id="search" class="search"  action="" method="post" accept-charset="utf-8" style="z-index: 999;top: 50%;position: absolute; margin-left:300px;">
			<input type="text" name="search2" value="<?php echo $_GET['search2']; ?>"
 placeholder="Search for product, brands services and more"	onfocus="if (this.value == 'Search...') {this.value=''}" onblur="if (this.value == '') {this.value='Search...'}"  style="height:50px; width:700px;" required>
            <!--input type="text" name="search2" placeholder="Search for product, brands services and more" onfocus="if (this.value == 'Search...') {this.value=''}" onblur="if (this.value == '') {this.value='Search...'}"  style="height:50px; width:700px;" required-->
			
<button class="btn btn-success" name="searchb" style="height:50px;  margin-left:opx;">Search</button>
        </form>
                </div>
            </div>
            
        </div>
		
		
		
		
		<style>
	
.fa-thumbs-o-up,.fa-thumbs-up,.likes{
	color:green;
}.fa-thumbs-o-down,.fa-thumbs-down,.dislikes{
	color:red;
}
	a:hover{
	color:#699E1E;
}
	.carousel-control.left,.carousel-control.right{    background-image: none;}
	//.carousel-control.left i,.carousel-control.right i{    margin-top: 10%;}
	.carousel-control{top: 50%;width: 5% !important;}
	.carousel-control:hover, .carousel-control:focus	{ background-image: none;}
	.abc{background-color:#ffffff; height:264px; width:290; border:0px solid black; min-height:350px; }
	.carousel-inner .abc{
		z-index:9;
	}.carousel-inner span{color:#83AB3F;}
		.abc div{padding:5px;}
	</style>
<!--  Recent Reviews- ==================section =====Start=============================================----------->	
<div class="thumb-box3 ">
    <div class="container">
       <h2 class="indent wow fadeIn" style="text-align:center;text-transform: uppercase;font-size:20px;"><center>Recent Review</center></h2>
          <div class="row  ">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					  <?php  $queryr="select product.company_id,product.company_name, review.product_id, review.user_id, review.r_title, review.r_rating, review.status, review.r_description, review.r_date,user_register.u_id, user_register.u_image, user_register.u_name, user_register.u_email, user_register.u_phone, review.admin_id, review.r_id,product.product_image from review LEFT JOIN product ON  product.company_id = review.product_id   left JOIN user_register ON  user_register.u_id=review.user_id where review.admin_id='".$admin_id."' && review.status='1' order by review.r_id DESC";
						$datar=fetch_query($con,$queryr);
						if(!empty($datar))
						{
							$count = 0;
							foreach($datar as $all_data)
							{
								if($count == 0){
									 echo '<div class="item active">';
								}else if($count %4 == 0){
									 echo '<div class="item">';
								}
								$image=(file_exists('admin/images/company/'.$all_data['product_image']) && !empty($all_data['product_image']))?'admin/images/company/
								'.$all_data['product_image']:'admin/img/defaultimage.png';
						?>
<div class="col-md-3 hidden-sm col-xs-12">
    <div class="thumb-pad3 ">
        <div class="thumbnail">
			<div class="abc">
				<a href="product/<?php echo $all_data['company_id'].'/'.strtolower(str_replace(" ","-",$all_data['company_name'])).'-'.$count.'.html'; ?>">
					<div style="height:200; width:290; border-radius:0px;  padding:0px;">
					  <figure><img src="<?=$image;?>"  height="150" width="100" alt=""></figure>
						</div>
							<div>
								<h5><?php echo $all_data['company_name']; ?></h5></a><hr>
									<?php
										for($i=1;$i<=$all_data['r_rating'];$i++){
										echo  '<i class="fa fa-star" style="color:#71A117;"></i> ';
										}for($i=1;$i<=(5-$all_data['r_rating']);$i++){
										echo '<i class="fa fa-star-o" style="color:#D1D4DE;"></i> ';
										} ?><br/>
									<h6 style="color:green;">BY : <?=  $all_data['u_name'] ?> <h6>
								<h5><?=  substr($all_data['r_title'],0,30) ?></h5>
							<a href="product/<?php echo $all_data['company_id'].'/'.strtolower(str_replace(" ","-",$all_data['company_name'])).'-'.$count.'.html'; ?>" ><h4 style="color:#699E1E;font-size:14px;">Read Complete Review <i class="fa fa-arrow-right"></i></h4></a>
						</div>
					</div>
                 </div>
				</div>
			</div>
									<?php
									$count ++;
									if($count %4 == 0){
											 echo '</div>';
											 } }
									if($count %4 !=0){
									echo '</div>';	} }
									?>

<a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <i class="fa fa-arrow-left" style="color:gray;"></i>
	<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
	<i class="fa fa-arrow-right" style="color:gray;"></i>
	<span class="sr-only">Next</span>
</a>


				</div>
		      </div>
			<center>  <a href="review-all-details.php" style="font-size:12px;"class="btn btn-success btn-xs">MORE REVIEWS</a></center>
			</div>
		</div>
	</div>

<!--  Recent Reviews- ==================section =====Ends=============================================----------->	
<!--  Upcoming Products- ==================section =====Start=============================================----------->		
<div class="thumb-box3">
  <div class="container">
	<h2 class="indent wow fadeIn" style="text-align:center;text-transform: uppercase; font-size:20px;">Upcoming Products</h2>
       <div class="row">
		  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<?php $query="select * from product where admin_id='".$admin_id."' && status='1' order by company_id DESC";
						$data=fetch_query($con,$query);
						if(!empty($data))
						{
							$count = 0;
							foreach($data as $all_data)
							{
		$review=mysqli_query($con,"select count(r_id) as rpige from review where product_id='".$all_data['company_id']."'");
			$rdata=mysqli_fetch_assoc($review);
			$total_r_records=$rdata['rpige'];
			$total_r_pages=ceil($total_r_records);		
									
								if($count == 0){
									 echo '<div class="item active">';
								}else if($count %4 == 0){
									 echo '<div class="item">';
								}
								$image=(file_exists('admin/images/company/'.$all_data['product_image']) && !empty($all_data['product_image']))?'admin/images/company/
								'.$all_data['product_image']:'admin/img/defaultimage.png';
						?>
						
				<div class="col-md-3 hidden-sm col-xs-10">
                   <div class="thumb-pad3 ">
                     <div class="thumbnail" style="background-color:white; height:250px; ">
						<div class="abc">
						   <a href="product/<?php echo $all_data['company_id'].'/'.strtolower(str_replace(" ","-",$all_data["company_name"])).'-'.$count.'.html'; ?>">
								<div style="height:155; width:290; border-radius:0px;  padding:0px;">
									<figure><img src="<?=$image;?>"  height="150" width="100" alt=""></figure>
										</div>
											<div>
													<h5><?php echo $all_data['company_name']; ?></h5></a>
													<?=  substr($all_data['title'],0,30) ?><br>
													<?php
													for($i=1;$i<=$all_data['product_rating'];$i++){
													echo  '<i class="fa fa-star" style="color:#71A117;"></i> ';
													}for($i=1;$i<=(5-$all_data['product_rating']);$i++){
													echo '<i class="fa fa-star-o" style="color:#D1D4DE;"></i> ';
													} ?>   
													<span style="color:green; margin-left:100px; font-size:12px;" ><?php echo $total_r_pages; ?> Reviews </span>

													
											</div>
						</div>
                     </div>
					</div>
				</div>
										<?php
										$count ++;
										if($count %4 == 0){
												 echo '</div>';
											} }
										if($count %4 !=0){
										echo '</div>';	
										} }
										?>

<a class="left carousel-control" href="#myCarousel1" data-slide="prev">
    <i class="fa fa-arrow-left" style="color:gray;"></i>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel1" data-slide="next">
    <i class="fa fa-arrow-right" style="color:gray;"></i>
    <span class="sr-only">Next</span>
</a>
  
				</div>
				
			</div>
			
		</div>
	</div>
</div>

<!--  Upcoming Products- ==================section =====end=============================================----------->	
<!----category Section  ======================start=======================================================---------->

<div class="thumb-box3 ">
    <div class="container">
        <h2 class="indent wow fadeIn" style="text-align:center;text-transform:uppercase; font-size:20px;"><center>New Category</center></h2>
            <div class="row">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
							<?php 
								$query_cat="select category_name,category_id from category where admin_id='".$admin_id."' && status='1' order by category_id desc limit 0,4";
								$data_cat=fetch_query($con,$query_cat);
								if(!empty($data_cat))
								{
									$count = 0;
									foreach($data_cat as $all_data_cate)
									{
										$query=fetch_query($con,"select * from product where admin_id='".$admin_id."' && category='".$all_data_cate["category_id"]."'");
										$image_rand=(file_exists('admin/images/company/'.$query[0]['product_image']) && !empty($query[0]['product_image']))?'admin/images/company/'.$query[0]['product_image']:'admin/img/defaultimage.png';
										echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeIn">
										<div class="thumb-pad3"><div class="thumbnail" style="background-color:white; height:300px; ">'; 
							?>
									<a href="category/<?php echo  $all_data_cate['category_id'].'/'.strtolower(str_replace(" ","-",$all_data_cate['category_name'])).'-'.$count.'.html'; ?>">		
											<figure><img src=<?php echo $image_rand;  ?> alt="" height="210" width="150"></figure>
											<div class="caption" >
											<span style="margin-left:10px; color:blue;"><?php   echo  $all_data_cate['category_name'];  ?>
											</span>
									</a><br>
								</div>  
                            </div>
                        </div>
                    </div>
			      <?php		}$count++; } ?>
				  
				</div>
            </div>
		</div>
    </div>
</div>
	
<!----------------category Section  ======================end==========================---------->	
<!----------------complain Section  ======================start===========================---------->	
<div class="thumb-box4" id="complainlist">
	<div class="container">
		<h2 class="indent wow fadeIn" style="text-align:center;text-transform: uppercase; font-size:20px;"><center>Recent Complain</center></h2>
		 <div class="row" >
<?php 
	$query_com="select * from complain where admin_id='".$admin_id."' && status='1' order by c_id DESC limit 0,4";
	$data_com=fetch_query($con,$query_com);
	if(!empty($data_com))
	{
	$count = 0;
	foreach($data_com as $all_data_com)
	{$count1=1;
		$userreply=mysqli_query($con,"select * from user_register where u_id='".$all_data_com['user_id']."' order by u_id desc");
		while($aresult2=mysqli_fetch_assoc($userreply))
		{  
			$sql1=mysqli_query($con,"select count(co_id) as pige from complain_comment where complain_id='".$all_data_com['c_id']."'");
			$data1=mysqli_fetch_assoc($sql1);
			$total_records=$data1['pige'];
			$total_pages=ceil($total_records);
			
				$sql2=mysqli_query($con,"select count(id) as pige2 from complain_like where complain_id='".$all_data_com['c_id']."' && action='like'");
				$data2=mysqli_fetch_assoc($sql2);
				$total_records2=$data2['pige2'];
				$total_pages2=ceil($total_records2);
				
					$sql3=mysqli_query($con,"select count(id) as pige3 from complain_like where complain_id='".$all_data_com['c_id']."' && action='dislike'");
					$data3=mysqli_fetch_assoc($sql3);
					$total_records3=$data3['pige3'];
					$total_pages3=ceil($total_records3);
					
		$image=(file_exists('image/complain/'.$all_data_com['c_image']) && !empty($all_data_com['c_image']))?'image/complain/'.$all_data_com['c_image']:'admin/img/defaultimage.png';
			echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeIn" style="margin-bottom: 0px;" >
				<div class="thumb-pad3">
					<a href="complain/'.$all_data_com["c_id"].'/'.strtolower(str_replace(" ","-",$all_data_com["c_company_name"])).'-1.html">
                  <div class="thumbnail" style="background-color:white; height:320px;">
					<figure><center><img src="'.$image.'" alt=""  style="height:190px; "></center></figure>
                          <div class="caption" style="padding:15px;  ">
							<span style=" font-size:13px; color:black;">'.$all_data_com["c_company_name"].'';?><br>
								<?=  substr($all_data_com['c_details'],0,30);
									echo'<br><span style="  font-size:10px; color:green;">BY: '.$aresult2["u_name"].'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<span style=" color:black; font-size:10px; color:green;">Date : '.date("d-m-Y",strtotime($all_data_com["c_date"])).'</span><br>
										<i class="fa fa-comments-o" aria-hidden="true"></i>
											<span style=" color:black; font-size:12px; color:#006EB9; font-weight:bold;">('.$total_pages.' )</span>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<i  class="fa fa-thumbs-up"></i><span style=" color:black; font-size:12px; color:#006EB9; font-weight:bold;"> ('.$total_pages2.' )&nbsp;&nbsp;&nbsp;&nbsp;
												<i  class="fa fa-thumbs-down"></i> ('.$total_pages3.' )<span></a>
										 </div>  
										</div>
										
									</div>
								 </div>';
								 $count1++;
							} } }
						?>
				<center>
			<a href="complain-page.php" style="font-size:12px;" class="btn btn-success btn-xs">MORE COMPLAIN</a>
		  </center>
        </div>
	</div>
</div>
<br><br>
<!----------------complain Section  ======================end================/////////////===========---------->
<!--  Questions Of the Day- ==================section =====Start=============================================----------->	
<div class="thumb-box5" id="questionlist">
 <div class="container">
   <h2 class="indent wow fadeIn" style="text-align:center;text-transform: uppercase; font-size:20px;"><center>Questions Of the Day</center></h2>
     <div class="row">
		<?php  $cnt=1;$ques=mysqli_query($con,"select * from question where status='1' order by q_id DESC limit 0,4");
			   while($qdata=mysqli_fetch_assoc($ques)){ 
			   
					$userreply1=mysqli_query($con,"select * from user_register where u_id='".$qdata['user_id']."'");
					while($qresult=mysqli_fetch_assoc($userreply1))
					{  
			$answer=mysqli_query($con,"select count(ans_id) as pige4 from answer where ques_id='".$qdata['q_id']."'");
			$answerdata=mysqli_fetch_assoc($answer);
			$total_recordsanswer=$answerdata['pige4'];
			$total_pagesanswer=ceil($total_recordsanswer);
			
				$qlike=mysqli_query($con,"select count(id) as pige5 from qa_rating_info where question_id='".$qdata['q_id']."' && rating_action='like'");
				$qlikedata=mysqli_fetch_assoc($qlike);
				$total_recordslike=$qlikedata['pige5'];
				$total_pageslike=ceil($total_recordslike);
				
					$qunlike=mysqli_query($con,"select count(id) as pige6 from qa_rating_info where question_id='".$qdata['q_id']."' && action='dislike'");
					$qunlikedata=mysqli_fetch_assoc($qunlike);
					$total_recordsunlike=$qunlikedata['pige6'];
					$total_pagesunlike=ceil($total_recordsunlike);
				 ?>
				 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeIn">
                        <div class="thumb-pad3">
                            <div class="thumbnail" style="background-color:white; height:150px; padding:10px;">
                                <a href="qad/<?php echo $qdata["q_id"].'/'.strtolower(str_replace(" ","-",$qdata["q_name"])).'-'. $cnt.'.html'; ?>" style="color:green;">
                                <div class="caption" style="padding:15px;">
                                   <?= substr($qdata['q_name'],0,60) ?><br><br>
									<span style="  font-size:10px; color:green;">BY: <?php echo $qresult["u_name"]; ?></span>		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<span style=" color:black; font-size:10px; color:green;">Date : <?php echo date("d-m-Y",strtotime($all_data_com["c_date"])); ?></span><br>
										<span style=" color:black; font-size:12px; color:#006EB9; font-weight:bold;">
										Answer : (<?php echo $total_pagesanswer; ?>)</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<i  class="fa fa-thumbs-up"></i><span style=" color:black; font-size:12px; color:#006EB9; font-weight:bold;"> (<?php echo $total_pageslike; ?> )&nbsp;&nbsp;&nbsp;&nbsp;
												<i  class="fa fa-thumbs-down"></i> (<?php echo $total_pagesunlike; ?> )<span>
								</div>
								</a>								
                            </div>
                        </div>
                    </div>
			   <?php }  $cnt++; } ?>
			    <center><a href="question-answer-reply.php" class="btn btn-success btn-xs">MORE QUESTIONS</a></center>
              </div>
			   
          </div><br>
	</div>
</div>

  <!-- Left and right controls -->
    </div>
<!--footer-->
<?php include('includes/footer.php'); ?>
