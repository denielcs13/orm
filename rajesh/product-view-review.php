<div  class="col-md-12 contactForm2" style="background-color:#ffffff; width:100%;   padding:10px; margin-bottom:10px;margin-top:100px">
			<div class="col-md-12"> <h4> <?php   echo $all_data['company_name']; ?> Reviews</h4>
					<?php
					foreach($data2 as $data3){
					$query4="select * from user_register where u_id='".$data3["user_id"]."'";
					$data5=fetch_query($con,$query4);
					?>
		<div class="container" style="padding:0px; margin-bottom:10px;">
			<div class="col-md-2" data-wow-delay="0.1s" align="center">
						<?php if($data5[0]['u_image'] == '')  { ?>
						<figure><img src="img/page2_pic1.jpg" alt=""  style="height:50px; width:50px; border:2px solid lightgray;" class="img-circle"></figure>
                        <?php }  else{ ?>   
						<figure><img src="image/user/<?php echo $data5[0]['u_image']; ?>" alt=""  class="img-circle"style="height:50px; width:50px; border:2px solid lightgray;"></figure>
						<?php } ?>
						<span style="color:green; font-size:11px;"><?php  echo $data5[0]['u_name']; ?> 
						<?php  echo $data5[0]['u_country']; ?> 
						</span>
			</div>
				<div class="col-md-9"  data-wow-delay="0.1s" >	
					<div  class="review " style="margin-left:10px; line-height: 20px;">
						<span style="font-size:13px; color:gray";><?php  echo $data3['r_title']; ?></span><br>  
						<span style="font-size:13px;">
										<?php
										for($i=1;$i<=$data3['r_rating'];$i++){
										echo  '<i class="fa fa-star"></i> ';
										}for($i=1;$i<=(5-$data3['r_rating']);$i++){
										echo '<i class="fa fa-star-o" ></i> ';
										} ?>
						</span>&nbsp;&nbsp;&nbsp;&nbsp;
						<span style="font-size:12px; color:green;">	Date : <?php  echo  date("F-d-Y",strtotime($data3['r_date'])); ?> </span><br>
						<span style="font-size:13px; color:gray;">	<?php  echo $data3['r_description']; ?></span><br>
		<!--START OF LIKE UNLIKE review -->
		<div class="post">
				<?php $_post['id']=$review_customer_id;?>
				<div class="post-info-review">
				<!-- if user likes post, style button differently -->
				<a <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?> data-id="<?php echo $_post['id']; ?>" data-rtype="1" id="like_<?php echo $data3["r_id"]; ?>" data-review_id="<?php echo $data3["r_id"]; ?>">
				<i
					<?php if (userLiked_review($_post['id'],$data3["r_id"])): ?> class="fa fa-thumbs-up"
					<?php else: ?> class="fa fa-thumbs-o-up"
					<?php endif ?>  >
				</i>
				<span class="likes" ><?php echo getLikes_review($_post['id'],$data3["r_id"]); ?></span></a>&nbsp;&nbsp;&nbsp;
				<a <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?> data-id="<?php echo $_post['id'];?>" data-rtype="2" id="dislike_<?php echo $data3["r_id"]; ?>"  data-review_id="<?php echo $data3["r_id"]; ?>">
				<!-- if user dislikes post, style button differently -->
				<i 
					<?php if (userDisliked_review($_post['id'],$data3["r_id"])): ?>
					class="fa fa-thumbs-down"
					<?php else: ?>
					class="fa fa-thumbs-o-down "
					<?php endif ?>>
				</i>
				<span class="dislikes" ><?php echo getDislikes_review($_post['id'],$data3["r_id"]);?></span>
				</a>
			  </div>
			</div>
			<!--END OF LIKE UNLIKE QUESTION ANSWER  -->		
		<?php 
			$comment=mysqli_query($con,"select count(c_id) as comment from comment where r_id='".$data3['r_id']."'");
			$data5=mysqli_fetch_assoc($comment);
			$total_records5=$data5['comment'];   
			$total_pages5=ceil($total_records5);	
		?>			
		<button style="margin-left:700px; margin-bottom:5px;"  class="btn btn-primary btn-xs" onClick="myFunction(<?php echo $data3['r_id'];  ?>)">
		<i class="fa fa-comment-o" aria-hidden="true"></i> Comment( <?php echo $total_pages5; ?> )</button>
<!--- comment section start  ///////////////////////////////////////////////////////////////////////  ---->		
<div id="myDIV<?php echo $data3['r_id'];  ?>" style="display:none;">
	
<!---comment show  --============================================================================================= ---->
	<?php 
		$fetch=mysqli_query($con,"select * from comment where r_id='$data3[r_id]' && status='1' order by c_id DESC");
			while($result=mysqli_fetch_assoc($fetch)) {
				$fet=mysqli_query($con,"select * from user_register where u_id='$result[user_id]'");
					while($result1=mysqli_fetch_assoc($fet)) {  
	?>
	<div style="padding:5px; margin-left:200px;" >
		<?php if($result1['u_image'] == '')  { ?>
			<img src="img/page2_pic1.jpg" alt=""  style="height:30px; width:30px; border:2px solid lightgray;" class="img-circle">  <?php }  else{ ?>   
			<img src="image/user/<?php echo $result1['u_image']; ?>" alt=""  class="img-circle" style="height:30px; width:30px; border:2px solid lightgray;">  <?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span style="color:gray; font-size:13px;"><?php echo $result['c_description']; ?> </span><br>
					<span style="color:green; font-size:13px; margin-left:60px; ">By: <?php echo $result1['u_name']; ?></span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php 
						$creply=mysqli_query($con,"select count(reply_id) as rep2 from r_comment_reply where comment_id='".$result['c_id']."'");
							$count=mysqli_fetch_assoc($creply);
							$total_records2=$count['rep2'];   
							$total_pages2=ceil($total_records2);	
				?>	
				<button class="btn btn-primary btn-xs" onClick="myFunction(<?php echo $result['c_id'];  ?>)">Reply( <?php echo $total_pages2; ?> )</button> </div>
<!----- Reply ============================================------------------->
<div id="myDIV<?php echo $result['c_id'];  ?>" style="display:none; background-color:#FAFAFA;        margin-top:5px; padding:5px;">
	<br>
			<?php
				$reply=mysqli_query($con,"select * from r_comment_reply where comment_id='".$result['c_id']."'  && status='1' order by reply_id DESC");	
				while($areply= mysqli_fetch_assoc($reply)){ 
				  $userreply=mysqli_query($con,"select * from user_register where u_id='".$areply['user_id']."'");
					while($aresult2=mysqli_fetch_assoc($userreply)) {   
			?>
			<div  style="margin-left:60px; margin-bottom:5px; font-size:13px;">Reply:			
					<span style="color:green; font-size:12px;"><?php echo $areply['reply']; ?></span><br>
					By: <span style="color:gray;font-size:12px; "><?php  echo $aresult2['u_name']; ?></span>
			</div><br>
			<?php   } } ?>
			<form id="contact-form"  style="padding-bottom:5px;" name="comment_reply_form<?php echo $result['c_id'];  ?>" method="post" enctype="multipart/form-data">
		<div class="contact-form-loader"></div>
				<div id="error_reply"></div>
					<label class="name form-div-4">
						<input type="hidden" name="action" id="action" value="NEWCOMMENTREPLY">
						<input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>	
						 <input type="hidden" name="product_id" value="<?php echo $_SESSION["product_view"]; ?>"/>	
						<input type="hidden" name="comment_id" value="<?php echo $result['c_id'];  ?>">
						<input type="hidden" name="review_id" value="<?php echo $data3["r_id"]; ?>"/>	
						<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $review_customer_id; ?>"/>
						<input type="text" class="form-control"  style="background-color:white; border:1px lightgray solid" name="r_name" id="r_name"  placeholder="Write your Reply">	 
					</label>
				<a style="background-color:red; padding:6px; font-size:13px; color:white; "  name="submit" data-comment_id="<?php echo $result['c_id']; ?>" id="add_data_comment_reply" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?>>Reply</a>				
	</form>
		</div><br>
	<?php	} } ?>
	<form id="contact-form"  style="padding:10px;" name="comment_form<?php echo $data3["r_id"]; ?>" method="post" enctype="multipart/form-data">
		<div class="contact-form-loader"></div>
			<fieldset>
				<div id="error_comment"></div>
                    <label class="name form-div-4">
						<strong style="font-size:13px;">Comment on this review:</strong>			
							 <input type="hidden" name="action" id="action" value="NEWCOMMENT">
							 <input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>	
							 <input type="hidden" name="product_id" value="<?php echo $_SESSION["product_view"]; ?>"/>	
							 <input type="hidden" name="review_id" value="<?php echo $data3["r_id"]; ?>"/>
							 <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $review_customer_id; ?>"/>
							 <input type="text" name="c_description" id="c_description"  placeholder="Comment on this review" value="" style="background-color:white; border:1px solid gray;" data-constraints="@Required @JustLetters"  required />
					</label>
					<div>
					   <a style="background-color:red; padding:6px; color:white; font-size:13px; "  name="submit" data-review_id="<?php echo $data3["r_id"]; ?>" id="add_data_comment" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?>>Submit</a>
					</div>
			</fieldset> 
    </form>
	</div>
</div>	
</div>		
</div>
<?php  } ?>

</div></div>