<?php include 'admin/include/function.php';
include('includes/header.php');
include('c_like.php');
$cid=$_GET[id];
$cid;
$review_customer_id=(isset($_SESSION["review_customer_id"]))?$_SESSION["review_customer_id"]:'';
$url_redirect=$_SERVER["REQUEST_URI"];
$senddada=explode("complain",$url_redirect);
echo '<input type="hidden" id="url_redirect" value="complain/'.substr($senddada[1],1).'"/>';
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
	.fa {
    font-size: 20px;
    cursor: pointer;
    user-select: none;
    color:blue;
}

.fa:hover {
  color: darkblue;
}

#contact-form{
padding-bottom: 10px;
}
</style>
<style>
#contact-form label{
	width: initial;
}
div.stars {
 
  float: left;
      margin: 0px 10px 30px 10px;
}

input.star { display: none; }

label.star {
      float: right;
    padding-right: 5px;
    color: #444;
    transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}input.star-1:checked ~ label.star:before { color: #F62; }
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}#contact-form label{     margin-bottom: 0px; }</style>
<div class="content indent"><br>

	<div class="container">
	<div class=" col-md-12  wow fadeIn" style="border: 1px solid #DFDFDF; padding:25px;">
		
				<div class="row">
					<style>   .name_show{ width: 40px;
    height: 40px;
    font-size: 18px;
    line-height: 38px;
    background-color: #cca499;
    display: inline-block;
    text-align: center;
    color: white;
					border-radius: 50%; }
	.related{
    padding: 5px;
   margin: 5px 0px 1px 0px;
  border-bottom: 1px dashed #cccccc;
}	input{background-color:white;}.ck-editor, #error_comments{clear: both;}	.small-i{font-size:10px;}		</style>
						</div>
	<?php
$query_cat="select c_date,c_subject,c_details,c_company_name,c_id,user_id,c_category,rating from complain where  c_id='$cid' order by c_id  DESC";
	$data_cat=fetch_query($con,$query_cat);
	if(!empty($data_cat))
	{
		$count = 0;
		foreach($data_cat as $data)
		{				
		
		$get_cate_name=fetch_query($con,"select category_name from category where  category_id='".$data["c_category"]."' ");
	$sql2=mysqli_query($con,"select u_name from user_register where u_id='".$data['user_id']."'");
while($data2=mysqli_fetch_assoc($sql2)){ 
$acronym ='';    
foreach(explode(' ', $data2['u_name']) as $word){ $acronym .= mb_substr($word, 0, 1, 'utf-8'); 
}?>	
				
	<div class="col-md-12" >
	<h4><span style="color:blue;"> <?php echo $get_cate_name[0]["category_name"].' - '.$data['c_company_name']; ?> </span> - <?php echo $data['c_subject']; ?></h4>
	<?
		if(!empty($data["rating"])){
			for($s=1;$s<=($data["rating"]);$s++){
				echo '<i class="fa fa-star"></i> ';
			}
		}
		if(!empty($data["rating"])){
			for($s=($data["rating"]);$s<5;$s++){
				echo '<i class="fa fa-star-o"></i> ';
			}
		}
		$query1=mysqli_query($con,"select * from complain_comment where complain_id='".$data['c_id']."' order by co_id DESC");
		echo 'Review ('.mysqli_num_rows($query1).')'; ?>
		<br/>
		<div class="name_show"><?= substr($acronym,0,2);  ?></div> <?php echo $data2['u_name'].' on '.date("M d , Y".strtotime($data2['c_date'])); ?> <a href="complaint" class="btn btn-success" style="    float: right;">Submit a Complaint</a><br>
		
			<p align="justify">	<?php echo $data['c_details']; ?></p>
				
				
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
			</div><br>
			
			
			
			<!--END OF LIKE UNLIKE QUESTION ANSWER  -->
			
				<!------comment  -==================section===============------->
		<div class="col-md-12"  id="div<?php echo $data["c_id"]; ?>" style="  background-color:#FAFAFA; margin-bottom:15px;padding:10px;"><br/>
	
			<div class="col-md-1"></div>
		<div class="col-md-6">			
					
		<?php				
		//comment query
		while($data_cat=mysqli_fetch_assoc($query1))
					{
$sql3=mysqli_query($con,"select * from user_register where u_id='".$data_cat['user_id']."'");
while($data3=mysqli_fetch_assoc($sql3)){						?>
					
					 <div style="clear:both;color:gray; font-size:13px; color:green;"> <?php echo $data_cat['comment']; ?></div>
					  <div style="color:gray; font-size:12px; color:gray;"><?php 
					  for($i=1;$i<=($data_cat["c_rating"]);$i++){
						  echo '<i class="fa fa-star small-i"></i>  ';
					  } echo '<br/>BY :'.$data3['u_name']; 
					  
					  $sql2=mysqli_query($con,"select count(r_id) as pige from complain_reply where comment_id='".$data_cat['co_id']."'");
					$data2=mysqli_fetch_assoc($sql2);
					 $total_records2=$data2['pige'];
					 $total_pages2=ceil($total_records2);?><button style="margin-left:10px;" class="btn btn-primary btn-xs" onClick="myFunction(<?php echo $data_cat['co_id'];  ?>)">Reply ( <?php echo $total_pages2; ?>) </button></div>
				  

	<!------- Reply==========================section ----------------------->	
			<div  class="col-md-12" id="myDIV<?php echo $data_cat['co_id'];  ?>" style="display:none;">
	<div  class="col-md-2"></div>
	<div  class="col-md-10">
<?php $reply=mysqli_query($con,"select * from complain_reply where comment_id='".$data_cat["co_id"]."'");
				while($rdata=mysqli_fetch_assoc($reply)){
					
$replyuser=mysqli_query($con,"select * from user_register where u_id='".$rdata['user_id']."'");
				while($rdata1=mysqli_fetch_assoc($replyuser)){					
				
				?>
				<hr>
				<span style="clear:both;color:gray; font-size:13px; color:green;"> <?php echo $rdata['reply']; ?></span><br/>
					  <span style="color:gray; font-size:12px; color:gray;">BY :<?php echo $rdata1['u_name'];  ?></span>
					
					  
				<?php } }	?>
			
	<hr>
<form id="contact-form"   name="complain_reply_form<?php echo $data_cat["co_id"]; ?>" method="post" enctype="multipart/form-data">
		<div class="contact-form-loader"></div>
<div id="error_reply"></div>
                            <label class="name form-div-4">
		 <input type="hidden" name="action" id="action" value="NEWREPLY">
		 <input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>
			<input type="hidden" name="complain_id" id="complain_id" value="<?php echo $data['c_id']; ?>"/>	
		 <input type="hidden" name="comment_id" value="<?php echo $data_cat["co_id"]; ?>"/>	
		 <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $review_customer_id; ?>"/>
		<input type="text" name="c_reply" id="c_reply"  placeholder="Reply on this Comment" value=""  data-constraints="@Required @JustLetters"  /> <br><br>
		<a class="btn btn-success btn-xs"   name="submit" data-comment_id="<?php echo $data_cat['co_id']; ?>" data-complain_id="<?php echo $data['c_id']; ?>" id="add_data_complain_reply" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?>>Submit</a>
				</label>
				
                </form>   
<hr></div>				
          
			
	</div>				  
					  
					<hr>  
					 <?php
					}  } 
				?>
					</div>
						<div class="col-md-3"></div>
							<div class="col-md-12" > 
	<form id="contact-form"  name="complain_comment_form<?php echo $data["c_id"]; ?>" method="post" enctype="multipart/form-data" >
		<h4 >Post your Comment</h4>
		<div style="float:left"><b>Your Rating </b>(1 Star is Bad,5 Star is Good) </div>
		<div class="stars">
    <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star"value="4" />
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star"value="3" />
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
    <label class="star star-1" for="star-1"></label>
	
</div><div style="float:left"> <input type="radio" value="0" name="star" >No Rating</div>
<div id="error_comments"></div>
		

				
			<div class="contact-form-loader"></div>
				
                          
<input type="hidden" name="action" id="action" value="NEWCOMMENTS">
										 <input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>	
										 <input type="hidden" name="complain_id" value="<?php echo $data['c_id']; ?>"/>	
										 <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $review_customer_id; ?>"/>
										
		<textarea name="c_name" id="c_name"  placeholder="Comment" data-constraints="@Required @JustLetters"  style="background-color:white;"></textarea><br><br>
						
				
		<a   name="submit" class="btn btn-success btn-xs" data-complain_id="<?php echo $data["c_id"]; ?>" id="add_data_complain_comment" <?php  echo  ($review_customer_id=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; 
	?>>Submit</a>		
					  
				 	</form></div>
					</div>
					
	</div><?php } }}  ?>	
				
		<!---tab2 --////////////////////////////////////////////  --->
		<?php
			/* $sql1=mysqli_query($con,"select count(co_id) as pige from complain_comment where complain_id='".$data['c_id']."'");
					$data1=mysqli_fetch_assoc($sql1);
					 $total_records=$data1['pige'];
					 $total_pages=ceil($total_records); */
				?>
						<!--button id="ques" data-complain_id="<?php  //$data["c_id"]; ?>" class="btn btn-warning btn-xs" style="margin-left:100px; margin-bottom:10px;">comment ( <?php  //$total_pages; ?> ) display:none;</button-->
	
			<br>
<?
			$data_cat_other=fetch_query($con,"select c_date,c_subject,c_company_name,c_id,user_id,c_category,rating from complain where  c_id !='$cid' && c_category= '".$data["c_category"]."' order by c_id  DESC limit 0,10");
			if(!empty($data_cat_other)){
				echo '<div class="col-md-12"><br/><h4>Related Complaints</h4>';
				foreach($data_cat_other as $other_data){
					echo '<div class="related">	<a href="complain/'.$other_data["c_id"].'/'.str_replace(" ","-",$other_data["c_company_name"]).'-1.html">'.ucfirst( $get_cate_name[0]["category_name"].' - '.$other_data["c_company_name"].' - '.$other_data["c_subject"]).'</a></div>';
				}
				echo '<br/><a href="complain-page">View All</a></div>';
			}
			?>
<div>
		 </div>
				</div> 
				
				</div>
<br><br></div><br>
</div>
</div> <br><br> </div> </div>
<input type="hidden" value="" id="get_login" />
<style>
.fa-thumbs-o-up,.fa-thumbs-up,.likes{
	color:green;
}.fa-thumbs-o-down,.fa-thumbs-down,.dislikes{
	color:red;
}</style>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
	 <style>#contact-form p {
    float: none;
}.ck-editor__editable_inline {    height: 100px !important;}#contact-form label.ck-label,.ck-file-dialog-button{    display: none;}</style>
 <script>

ClassicEditor
        .create( document.querySelector( 'textarea#c_name' ) ).then( newEditor => {
        editor = newEditor;
    } ) .catch( error => {
            console.error( error );
        } );

   $(document).ready(function(){
    $("body").on("click","#ques",function(){
		var complain_id=$(this).data("complain_id");
        $("#div"+complain_id).toggle(1000);
    });
});

function myFunction(x) {
    x.classList.toggle("fa-thumbs-down");
}

function myFunction(id) {	 
    var x = document.getElementById("myDIV"+id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
	
	
<!--  START OF LIKE DISLIKE QUESTION     -->
var loading_image='admin/img/loading.gif';

$(document).ready(function(){
// if the user clicks on the like button ...
$('body').on('click','.post-info a', function(){
  var post_id = $(this).attr('data-id');
  var complain_id = $(this).data('complain_id');
  var a_response=$(".modal-content");
  var datatype= $(this).data('rtype');;
  if(post_id==''){
	  if(datatype==1){
  var a_request_reg ='action=GET_LOGIN&requesttype=like&requesttype_id='+complain_id+'&control_by='+$("#admin_id").val();
	  }if(datatype==2){
var a_request_reg ='action=GET_LOGIN&requesttype=dislike&requesttype_id='+complain_id+'&control_by='+$("#admin_id").val();
	  }	  
	var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl);		
		}else{	
		var action='';
		$clicked_btn = $(this).children('i');
		
		if(datatype==1){
		if ($clicked_btn.hasClass('fa-thumbs-o-up')) {action = 'qn_like'; } else if($clicked_btn.hasClass('fa-thumbs-up')){action = 'qn_unlike'; }
		
		var data= 'action=' + action + '&post_id=' + post_id + '&c_id=' + complain_id;
		like_dislike($clicked_btn,action,data,datatype);
		}
		if(datatype==2){		
		if ($clicked_btn.hasClass('fa-thumbs-o-down')) {action = 'qn_dislike'; } else if($clicked_btn.hasClass('fa-thumbs-down')){action = 'qn_undislike'; }
		var data= 'action=' + action + '&post_id=' + post_id + '&c_id=' + complain_id;
		like_dislike($clicked_btn,action,data,datatype);
		} 		
		}
});
});

function like_dislike($clicked_btn,action,data,datatype){
	var get_login=$("#get_login").val();
	$.ajax({
			url: 'c_like.php',
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

	var a_response=$(".modal-content");
	$("body").on("click","#add_data_complain_comment",function(){	
	var complain_id=$(this).data("complain_id");
	var formname="form[name='complain_comment_form"+complain_id+"']";
	var a_response2=$(formname+" #error_comments");
	$(formname+" #c_name").val(editor.getData());
	//alert($(formname+" #c_name").val());
	var star_rating=$('[name="star"]:checked').length;
	 if($(formname+" #c_name").val()=='' || $(formname+" #c_name").val()=='<p></p>'  || $(formname+" #c_name").val()=='<p> </p>'  || $(formname+" #c_name").val()=='<p>&nbsp;</p>'){
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Comment </div>'); 
		return false;
	 }else if(star_rating<=0){
		a_response2.show().html('<div class="alert alert-danger">Please Choose Rating / No Rating </div>'); 
		return false;
	 }else{		
		var customer_id=$(formname+" #customer_id").val();
		if(customer_id==''){
		var a_request_reg ='action=GET_LOGIN&requesttype=complain_comment&requesttype_id='+complain_id+'&control_by='+$("#admin_id").val();	
		var redirecturl='complain-page.php';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 		
		}else{	
		var a_url='execution/complain_comment.php';
		var a_request = new FormData($(formname)[0]);
		var redirecturq=$("#url_redirect").val();
		$(formname+" #add_data_complain_comment").hide();
		$(formname+" #add_data_complain_comment").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturq);
		$(formname+" #loader").remove();
		$(formname+" #add_data_complain_comment").show();		
		}
	}	  
});
//reply

var loading_image='admin/img/loading.gif';
	var a_response=$(".modal-content");
	$("body").on("click","#add_data_complain_reply",function(){	
	var comment_id=$(this).data("comment_id");
	var complain_id=$(this).data("complain_id");
	var formname="form[name='complain_reply_form"+comment_id+"']";
	var a_response2=$(formname+" #error_reply");
	 if($(formname+" #c_reply").val()==''){
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Reply </div>'); 
		return false;
	 }else{		
		var customer_id=$(formname+" #customer_id").val();
		if(customer_id==''){
		var a_request_reg ='action=GET_LOGIN&requesttype=complain_reply&requesttype_id='+comment_id+'&control_by='+$("#admin_id").val();	
		var redirecturl='';
		var a_url="execution/login.php"
		a_response.html('<img  id="loader" src="'+loading_image+'" />');
		fetch_data(a_url,a_request_reg,a_response,redirecturl); 		
		}else{	
		var a_url='execution/complain_comment.php';
		var a_request = new FormData($(formname)[0]);
		var redirecturq=$("#url_redirect").val();
		$(formname+" #add_data_complain_reply").hide();
		$(formname+" #add_data_complain_reply").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturq);
		$(formname+" #loader").remove();
		$(formname+" #add_data_complain_reply").show();		
		}
	}	  
}); 

	</script>
	<!--script src="js/myjs/function.js" ></script--->
	
<?php  include('includes/footer.php'); ?>
