	<div  class="col-md-12 contactForm2" style="background-color:#ffffff; width:100%;   padding:10px; margin-bottom:10px;margin-top:100px">
			<div class="col-md-10"> <h4>FAQ</h4> </div> <div class="col-md-2">
				</div>

<!-- question ---------------end---///////////////////////////////////////////////////////--------     ---->

<?php 
		$sqli=mysqli_query($con,"SELECT user_register.u_id,  question.q_id, user_register.u_image, user_register.u_name, question.q_name, question.q_date from user_register  JOIN question ON user_register.u_id= question.user_id where product_id='$id' order by q_id DESC"); 
		$qcount=1;
		while($data=mysqli_fetch_assoc($sqli)) {
?>
<div class="col-md-12" style="border:1px solid lightgray; margin-bottom:10px; padding:5px;">
  <div class="row">
	<div class="col-md-2" >
			<?php if($data['u_image'] == '')  { ?>
				<figure><img src="image/complain/man.jpg" alt=""  style="height:60px; width:60px; border:2px solid lightgray; " class="img-circle"></figure>
                <?php }  else{ ?>   
				<figure><img src="image/user/<?php echo $data['u_image']; ?>" alt=""  class="img-circle" style="height:60px; width:60px; border:2px solid lightgray; "></figure>
			<?php } ?>
	</div>
	<div class="col-md-8" style="line-height:15px;"><a href="qad/<?php echo $data["q_id"].'/'.strtolower(str_replace(" ","-",$data["q_name"])).'-'.$qcount.'.html'; ?>" >
	<span style="color:green; font-size:13px;"><?php echo $data['q_name']; ?> </span><br>
		<span style="color:gray; font-size:10px;">By: <?php echo $data['u_name']; ?></span><br><br>
				<!--START OF LIKE UNLIKE QUESTION ANSWER  -->
					<div class="post">
						<?php $_post['id']=$review_customer_id;?>
						<div class="post-info">
						<!-- if user likes post, style button differently -->
						<a <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?> data-id="<?php echo $_post['id']; ?>" data-rtype="1" id="like_<?php echo $data["q_id"]; ?>" data-question_id="<?php echo $data["q_id"]; ?>">
						<i 
							<?php if (userLiked($_post['id'],$data["q_id"])): ?>
							class="fa fa-thumbs-up"		
							<?php else: ?>
							class="fa fa-thumbs-o-up"
							<?php endif ?>  >
						</i>
						<span class="likes" ><?php echo getLikes($_post['id'],$data["q_id"]); ?></span></a>&nbsp;&nbsp;&nbsp;
						<a <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?> data-id="<?php echo $_post['id'];?>" data-rtype="2" id="dislike_<?php echo $data["q_id"]; ?>"  data-question_id="<?php echo $data["q_id"]; ?>">
						<!-- if user dislikes post, style button differently -->
						<i 
						  <?php if (userDisliked($_post['id'],$data["q_id"])): ?>
							  class="fa fa-thumbs-down"
						  <?php else: ?>
							 class="fa fa-thumbs-o-down "
						  <?php endif ?>
						  >
						</i>
						<span class="dislikes" ><?php echo getDislikes($_post['id'],$data["q_id"]);?></span>
						</a>
					  </div>
				    </div>
			<!--END OF LIKE UNLIKE QUESTION ANSWER  -->
	</div>
	<!-- answer button-----////////////////////////////////////////////////////////////-->			
<div class="col-md-2">
			<?php 
				$sql1=mysqli_query($con,"select count(ans_id) as pige from answer where ques_id='".$data['q_id']."'");
					$data1=mysqli_fetch_assoc($sql1);
					 $total_records=$data1['pige'];   
					 $total_pages=ceil($total_records);	
			?>
			<button class="btn btn-primary btn-xs" onClick="myFunction(<?php echo $data['q_id'];  ?>)">Suggestion ( <?php echo $total_pages; ?> )</button>
</div>
<!----answers tab ----------start--------//////////////////////-------->		  
<div class="col-md-10" id="myDIV<?php echo $data['q_id'];  ?>" style="display:none; background-color:#FAFAFA;   margin-left:125px; margin-top:15px; padding:5px;">
	<br>
		<?php
		$answer=mysqli_query($con,"select * from answer where ques_id='$data[q_id]'  && status='1' order by ans_id DESC ");	
			while($aresult= mysqli_fetch_assoc($answer)){ 
			$useranswer=mysqli_query($con,"select * from user_register where u_id='$aresult[user_id]'");
				while($aresult1=mysqli_fetch_assoc($useranswer)) {
		?>
			
<div class="col-md-12" >
			<div class="col-md-2" >
				<?php if($aresult1['u_image'] == '')  { ?>
					<figure><img src="image/complain/man.jpg" alt=""  style="height:40px; width:40px; border:2px solid lightgray; " class="img-circle"></figure>
                    <?php }  else{ ?>   
					<figure><img src="image/user/<?php echo $aresult1['u_image']; ?>" alt=""  class="img-circle" style="height:40px; width:40px; border:2px solid lightgray; "></figure>
					<?php } ?>
	
			</div>
			<div class="col-md-8" style="line-height:15px;" >			
				<span style="color:green; font-size:13px;">Suggestion: <?php echo $aresult['answer']; ?></span><br>
			    <span style="color:gray; font-size:12px; ">By: <?php echo $aresult1['u_name']; ?></span>
			</div>
			<div class="col-md-2">
			<?php 
			  $sql2=mysqli_query($con,"select count(r_id) as pige from answer_reply where answer_id='".$aresult['ans_id']."'");
					$data2=mysqli_fetch_assoc($sql2);
					 $total_records2=$data2['pige'];   
					 $total_pages2=ceil($total_records2);	
					 ?>	
					<button class="btn btn-primary btn-xs" onClick="myFunction(<?php echo $aresult['ans_id'];  ?>)">Reply( <?php echo $total_pages2; ?> )</button>
			</div>
		</div><br><br>
	<!-- answer section-----//////////////End///////////////////////////////////////////////-->			
	<!----reply section-===============start========================---->
	
<div class="col-md-8" id="myDIV<?php echo $aresult['ans_id'];  ?>" style="display:none; background-color:#FAFAFA;       margin-left: 175px; margin-top:5px; padding:5px;">
	<br>
		<?php
			$reply=mysqli_query($con,"select * from answer_reply where answer_id='".$aresult['ans_id']."'  && status='1' order by r_id DESC");	
			while($areply= mysqli_fetch_assoc($reply)){ 
			  $userreply=mysqli_query($con,"select * from user_register where u_id='".$areply['user_id']."'");
				while($aresult2=mysqli_fetch_assoc($userreply)) {   
		?>
			<div class="col-md-8" style="margin-left:60px; margin-bottom:10px; line-height:15px;">			
					<span style="color:green; font-size:13px;">Reply: <?php echo $areply['reply']; ?></span><br>
					 <span style="color:gray;font-size:12px; ">By: <?php  echo $aresult2['u_name']; ?></span>
			</div><br><br>
			<?php   } } ?>
			<form id="contact-form"  style="padding-bottom:5px;" name="answer_reply_form<?php echo $aresult['ans_id'];  ?>" method="post" enctype="multipart/form-data">
		<div class="contact-form-loader"></div>
				<div id="error_reply"></div>
					<label class="name form-div-4">
						<input type="hidden" name="action" id="action" value="NEWANSWERREPLY">
						<input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>	
						<input type="hidden" name="product_id" value=""/>
						<input type="hidden" name="question_id" value="<?php echo $data['q_id'];  ?>">
						<input type="hidden" name="answer_id" value="<?php echo $aresult['ans_id'];  ?>">
						<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $review_customer_id; ?>"/>
						<input type="text" class="form-control"  style="background-color:white;" name="r_name" id="r_name"  placeholder="Write your Reply">	 
					</label>
				<a style="background-color:red; padding:6px; font-size:13px; color:white; "  name="submit" data-answer_id="<?php echo $aresult['ans_id']; ?>" id="add_data_answer_reply" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?>>Reply</a>				
		</form>
	</div><br>
	<?php } }?>
	<form id="contact-form"  style="padding-bottom:5px;" name="answer_form<?php echo $data['q_id'];  ?>" method="post" enctype="multipart/form-data">
		<div class="contact-form-loader"></div>
				<div id="error_answer"></div>
		  <label class="name form-div-4">
			<input type="hidden" name="action" id="action" value="NEWANSWER">
				<input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>	
					<input type="hidden" name="product_id" value=""/>
						<input type="hidden" name="question_id" value="<?php echo $data['q_id'];  ?>">
						<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $review_customer_id; ?>"/>
							<textarea class="form-control" rows="1" style="background-color:white; height:58px; " name="a_name" id="a_name"  placeholder="Write your Answer"></textarea>		 
					</label>
				<a style="background-color:green; padding:6px; color:white; font-size:13px;"  name="submit" data-question_id="<?php echo $data['q_id']; ?>" id="add_data_answer" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?>>Submit</a>
	</form>
		</div>
	</div>
 </div>
	<?php  $qcount++;} ?>
	<div class="col-md-12"  id="div2" style=" border:1px solid lightgray; background-color:#FAFAFA; margin-bottom:10px; padding:5px;">
	 <form id="contact-form"  style="padding-bottom: 10px;" name="question_form" method="post" enctype="multipart/form-data">
		<div class="contact-form-loader"></div>
			<div id="error_question" ></div>
            <label class="name form-div-4">
				<strong style="font-size:13px;">FAQ:</strong>
					<input type="hidden" name="action" id="action" value="NEWQUESTION">
					<input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>	
						 <input type="hidden" name="product_id" value="<?php echo $_SESSION["product_view"]; ?>"/>	
					<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $review_customer_id; ?>"/>
					<input type="text" name="q_name" id="q_name"  placeholder="Ask Questions" value="" data-constraints="@Required @JustLetters"  style="background-color:white;"required />
			</label>
			<br>
			<? include 'includes/captcha.php'; ?>
						
			
			<div>
		<a style="background-color:red; padding:6px; color:white; font-size:13px; "  name="submit" id="add_data_question" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?>>SUBMIT</a>
	  </div>
	</form>
</div>
	</div>