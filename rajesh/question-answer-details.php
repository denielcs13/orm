<?php
include 'admin/include/function.php';
include('includes/header.php');
include('question-like.php');
$q_id=$_GET['id'];
$review_customer_id=(isset($_SESSION["review_customer_id"]))?$_SESSION["review_customer_id"]:'';
?>
<style>
#myDIV {
    width: 100%;
    padding: 50px 0;
    text-align: center;
    margin-top: 15px;
}
a{
	cursor:pointer;
}
</style>
<div class="content indent">
  <div class="thumb-box4" >
		<div class="container">
			
				<div  class="col-md-12 contactForm2" style="background-color:#ffffff; width:100%;  border:1px solid lightgray; padding:10px;">
					<div class="col-md-10"> <h4>Answers Details</h4> </div> <div class="col-md-2"></div>



<?php 

$sql=mysqli_query($con,"SELECT user_register.u_id,  question.q_id, user_register.u_image, user_register.u_name, question.q_name, question.q_date from user_register  JOIN question ON user_register.u_id= question.user_id  where q_id='$q_id' order by q_id DESC");
while($data=mysqli_fetch_assoc($sql))
		{
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
	<div class="col-md-8"><a  style="color:green;"><?php echo $data['q_name']; ?> </span><br>
		By:<span style="color:green; font-size:10px;"> <?php echo $data['u_name']; ?></span>
				<!--START OF LIKE UNLIKE QUESTION ANSWER  -->
		<div class="post">
				<?php $_post['id']=$review_customer_id;?>
			  <div class="post-info">
				<!-- if user likes post, style button differently -->
				<a <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?> data-id="<?php echo $_post['id']; ?>" data-rtype="1" id="like_<?php echo $data["q_id"]; ?>" data-question_id="<?php echo $data["q_id"]; ?>">
				<i <?php if (userLiked($_post['id'],$data["q_id"])): ?>
					  class="fa fa-thumbs-up"
				  <?php else: ?>
					 class="fa fa-thumbs-o-up"
				  <?php endif ?>  ></i>
				<span class="likes" ><?php echo getLikes($_post['id'],$data["q_id"]); ?></span></a>
				&nbsp;&nbsp;&nbsp;
<a <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?> data-id="<?php echo $_post['id'];?>" data-rtype="2" id="dislike_<?php echo $data["q_id"]; ?>"  data-question_id="<?php echo $data["q_id"]; ?>">
				<!-- if user dislikes post, style button differently -->
				<i 
				  <?php if (userDisliked($_post['id'],$data["q_id"])): ?>
					  class="fa fa-thumbs-down"
				  <?php else: ?>
					 class="fa fa-thumbs-o-down "
				  <?php endif ?>
				  ></i>
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
				<button class="btn btn-primary btn-xs" onClick="myFunction(<?php echo $data['q_id'];  ?>)">Answer ( <?php echo $total_pages; ?> )</button>
</div>
					  
		
	<!----answers tab ----------start--------////////////////////// display:none; -------->		  
<div class="col-md-10" id="myDIV<?php echo $data['q_id'];  ?>" style="background-color:#FAFAFA;   margin-left:125px; margin-top:15px; padding:5px;">
	<br>
		   <?php
			$answer=mysqli_query($con,"select * from answer where ques_id='$data[q_id]'  && status='1' order by ans_id DESC");	
			while($aresult= mysqli_fetch_assoc($answer)){ 
			$useranswer=mysqli_query($con,"select * from user_register where u_id='$aresult[user_id]'");
				while($aresult1=mysqli_fetch_assoc($useranswer))
				{
			?>
			
<div class="col-md-12" >
			<div class="col-md-2" >
  <?php if($aresult1['u_image'] == '')  { ?>
						<figure><img src="image/complain/man.jpg" alt=""  style="height:40px; width:40px; border:2px solid lightgray; " class="img-circle"></figure>
                            <?php }  else{ ?>   
						<figure><img src="image/user/<?php echo $aresult1['u_image']; ?>" alt=""  class="img-circle" style="height:40px; width:40px; border:2px solid lightgray; "></figure>
							<?php } ?>
	
	</div>
					<div class="col-md-8" >			
					<?php echo $aresult['answer']; ?><br/>
					By: <span style="color:gray;font-size:12px; "><?php echo $aresult1['u_name']; ?></span>
			</div>
			<div class="col-md-2">
		<?php 
			$sql2=mysqli_query($con,"select count(r_id) as pige from answer_reply where answer_id='".$aresult['ans_id']."'");
					$data2=mysqli_fetch_assoc($sql2);
					 $total_records2=$data2['pige'];   
					 $total_pages2=ceil($total_records2);	
					 ?>	
				<button class="btn btn-primary btn-xs" onClick="myFunction(<?php echo $aresult['ans_id'];  ?>)">Reply( <?php echo $total_pages2; ?> )</button>
			</div></div><br><br>
	<!-- answer section-----//////////////End///////////////////////////////////////////////-->			
	<!----reply section-===============start========================---->
	
<div class="col-md-8" id="myDIV<?php echo $aresult['ans_id'];  ?>" style="display:none; background-color:#FAFAFA;       margin-left: 175px; margin-top:5px; padding:5px;">
	<br>
		<?php
			$reply=mysqli_query($con,"select * from answer_reply where answer_id='".$aresult['ans_id']."'  && status='1' order by r_id DESC");	
			while($areply= mysqli_fetch_assoc($reply)){ 
			  $userreply=mysqli_query($con,"select * from user_register where u_id='".$areply['user_id']."'");
				while($aresult2=mysqli_fetch_assoc($userreply))
				{   
			?>
			<div class="col-md-8" style="margin-left:60px; margin-bottom:10px;">Reply:			
					<span style="color:green;"><?php echo $areply['reply']; ?></span><br>
					By: <span style="color:gray;font-size:12px; "><?php  echo $aresult2['u_name']; ?></span>
			</div><br>
				
				
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
				<a style="background-color:red; padding:6px; color:white; "  name="submit" data-answer_id="<?php echo $aresult['ans_id']; ?>" id="add_data_answer_reply" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?>>Reply</a>				
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
				<a style="background-color:green; padding:6px; color:white; border-radius:8px;"  name="submit" data-question_id="<?php echo $data['q_id']; ?>" id="add_data_answer" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?>>Submit</a>
	</form>
		</div>
	</div>
 </div>
	<?php  } ?>
	</div><br><br>
	</div>
	</div><br><br>
	</div>
	<input type="hidden" value="" id="get_login" />
<style>
.fa-thumbs-o-up,.fa-thumbs-up,.likes{
	color:green;
}.fa-thumbs-o-down,.fa-thumbs-down,.dislikes{
	color:red;
}#contact-form p {
    float: none;
}.ck-editor__editable_inline {    height: 100px !important;}#contact-form label.ck-label,.ck-file-dialog-button{    display: none;}</style>	
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<script>
ClassicEditor
        .create( document.querySelector( 'textarea#a_name' ) ).then( newEditor => {
        editor = newEditor;
    } ) .catch( error => {
            console.error( error );
        } );
 $(document).ready(function(){
    $("#ques").click(function(){
        $("#div2").toggle(1000);
    });
});

   function myFunction(id) {	 
    var x = document.getElementById("myDIV"+id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

	var loading_image='admin/img/loading.gif';
	var a_response=$(".modal-content");
	$("body").on("click","#add_data_question",function(){
	var a_response2=$("#error_question");		 
	 if($("#q_name").val()==''){
		a_response2.show().html('<div class="alert alert-danger">Please Enter Question </div>'); 
		return false;
	 }else{		
		var customer_id=$("form[name='question_form'] #customer_id").val();
		if(customer_id==''){
		var a_request_reg ='action=GET_LOGIN&requesttype=question&control_by='+$("#admin_id").val();
	
		var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 		
		}else{	
			var a_url='execution/question-answer-reply.php';
		var a_request = new FormData($("form[name='question_form']")[0]);
		var redirecturq='';
		$("#add_data_question").hide();
		$("#add_data_question").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturq);
		$("#loader").remove();
		$("#add_data_question").show();
		
		}
	}	  
});
//answer   js
var loading_image='admin/img/loading.gif';
	var a_response=$(".modal-content");
	$("body").on("click","#add_data_answer",function(){
		var question_id=$(this).data("question_id");
	
	var formname="form[name='answer_form"+question_id+"']";
	var a_response2=$(formname+" #error_answer");
	$(formname+" #a_name").val(editor.getData())	
	var a_name=$(formname+" #a_name").val();	
	 if(a_name=='' || a_name=='<p></p>' || a_name=='<p> </p>' || a_name=='<p>&nbsp;</p>' || a_name=='<p>  </p>'){
		
	// if($(formname+" #a_name").val()==''){
	
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Answer </div>'); 
		return false;
	 }else{		
		var customer_id=$(formname+" #customer_id").val();
	//var customer_id=$("#customer_id").val();
		if(customer_id==''){
  var a_request_reg ='action=GET_LOGIN&requesttype=answer&requesttype_id='+question_id+'&control_by='+$("#admin_id").val();	
		//var a_request_reg ='action=GET_LOGIN&requesttype=answer&control_by='+$("#admin_id").val();
	
		var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 
		
		}else{	
			var a_url='execution/question-answer-reply.php';
			var a_request = new FormData($(formname)[0]);
		//var a_request = new FormData($("form[name='answer_form']")[0]);
		var redirecturq='';
		$("#add_data_answer").hide();
		$("#add_data_answer").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturq);
		$("#loader").remove();
		$("#add_data_answer").show();
		
		}
	}	  
});

//answer  Reply  js
var loading_image='admin/img/loading.gif';
	var a_response=$(".modal-content");
	$("body").on("click","#add_data_answer_reply",function(){
		var answer_id=$(this).data("answer_id");
	
	var formname="form[name='answer_reply_form"+answer_id+"']";
	var a_response2=$(formname+" #error_reply");
	 if($(formname+" #r_name").val()==''){
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Reply </div>'); 
		return false;
	 }else{		
		var customer_id=$(formname+" #customer_id").val();
		if(customer_id==''){
  var a_request_reg ='action=GET_LOGIN&requesttype=answer_reply&requesttype_id='+answer_id+'&control_by='+$("#admin_id").val();	
		var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 
		}else{	
			var a_url='execution/question-answer-reply.php';
			var a_request = new FormData($(formname)[0]);
		var redirecturq='';
		$("#add_data_answer_reply").hide();
		$("#add_data_answer_reply").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturq);
		$("#loader").remove();
		$("#add_data_answer_reply").show();
		
		}
	}	  
});

<!--  START OF LIKE DISLIKE QUESTION     -->
var loading_image='admin/img/loading.gif';

$(document).ready(function(){
// if the user clicks on the like button ...
$('body').on('click','.post-info a', function(){
  var post_id = $(this).attr('data-id');
  
  var question_id = $(this).data('question_id');
  var a_response=$(".modal-content");
    
  var datatype= $(this).data('rtype');
  if(post_id==''){
	   if(datatype==1){
		var a_request_reg ='action=GET_LOGIN&requesttype=like&requesttype_id='+question_id+'&control_by='+$("#admin_id").val();
	}if(datatype==2){
var a_request_reg ='action=GET_LOGIN&requesttype=dislike&requesttype_id='+question_id+'&control_by='+$("#admin_id").val();
	  }	  
	var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl);		
		}
		else{
		var action='';
		$clicked_btn = $(this).children('i');
		if(datatype==1){
		if ($clicked_btn.hasClass('fa-thumbs-o-up')) {action = 'qn_like'; } else if($clicked_btn.hasClass('fa-thumbs-up')){action = 'qn_unlike'; }
		
		var data= 'action=' + action + '&post_id=' + post_id + '&q_id=' + question_id;
			
		like_dislike($clicked_btn,action,data,datatype);
		}
		if(datatype==2){		
		if ($clicked_btn.hasClass('fa-thumbs-o-down')) {action = 'qn_dislike'; } else if($clicked_btn.hasClass('fa-thumbs-down')){action = 'qn_undislike'; }
		var data= 'action=' + action + '&post_id=' + post_id + '&q_id=' + question_id;
	
		like_dislike($clicked_btn,action,data,datatype);
		} 		
		}
});
});

function like_dislike($clicked_btn,action,data,datatype){
	var get_login=$("#get_login").val();
	$.ajax({
			url: 'question-like.php',
			type: 'post',
			data: data,
			success: function(data){
				res = JSON.parse(data);
				if(get_login=='login'){
					location.reload();
				}
				if(datatype==1){
				if (action == "qn_like") {
					$clicked_btn.removeClass('fa-thumbs-o-up');
					$clicked_btn.addClass('fa-thumbs-up');
				} else if(action == "qn_unlike") {
					$clicked_btn.removeClass('fa-thumbs-up');
					$clicked_btn.addClass('fa-thumbs-o-up');
				}
				$clicked_btn.siblings('span.likes').text(res.likes);
				$clicked_btn.parents('a').siblings('a').children('span.dislikes').text(res.dislikes);
				$clicked_btn.parents('a').siblings('a').children('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
				}
				
				if(datatype==2){
					if (action == "qn_dislike") {
							$clicked_btn.removeClass('fa-thumbs-o-down');
							$clicked_btn.addClass('fa-thumbs-down');
						} else if(action == "qn_undislike") {
							$clicked_btn.removeClass('fa-thumbs-down');
							$clicked_btn.addClass('fa-thumbs-o-down');
						}
						$clicked_btn.parents('a').siblings('a').children('span.likes').text(res.likes);
						$clicked_btn.siblings('span.dislikes').text(res.dislikes);
						$clicked_btn.parents('a').siblings('a').children('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
					}
				}
			
		  });		
		
}
</script>


					
			<!--script src="js/theme/question-answer-reply.js"></script-->
	
 <?php  include('includes/footer.php'); ?>

