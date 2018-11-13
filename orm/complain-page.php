<?php include 'admin/include/function.php';
include('includes/header.php');
//include('c_like.php');
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
<style>.left-bar-filter{ padding: 15px; font-size: 20px;    color: #949494;   border: 1px solid #33333329;}.left-bar-filter ul{    padding-left: 15px;    margin-top: 10px;}.left-bar-filter ul li{  border-top: 1px solid #8c8c8c4d;    margin: 0px;    font-size: 12px;
    padding: 8px 0px 8px 0px;}.cat_heading i{padding-right: 20px;float: right;     cursor: pointer; }.cat_heading{font-size: 16px;    border-bottom: 1px solid #dedede; margin-top: 15px;}.cat_heading a{color: #949494;padding-left: 10px; }.heading{    border-bottom: 1px solid #96969647;
    margin-bottom: 10px;}.left-bar-filter a.active{color: #00800099;}</style>
<div class="content indent"><br>

	<div class="container">
	<div class=" col-md-12  wow fadeIn" style="border: 1px solid #DFDFDF; padding:25px;">
						<div class="col-md-3">
						<div class="left-bar-filter"><div class="heading">Category </div>
<div class="cat_heading"><select name="subcategory1" id="subcategory1" onchange="yesnoCheck1(this);" class="form-control">
												<option value="">All</option>
												<?php 
									$query1=mysqli_query($con,"Select * from category where  status='1' order by category_name ASC");
													while($data1=mysqli_fetch_assoc($query1)){
								echo "<option  value='".$data1['category_id']."'>".$data1['category_name']."</option>";
													}	  
												?>
											
													
										</select></div>					
	</div>
		<div class="left-bar-filter">
<div class="heading">Filter By: USER RATING</div><div class="cat_heading">
<ul id="show-subcat1-7"><li><input type="checkbox" value="9" name="start[]" onchange="change_star(this);"> <span style="font-size:12px; color:gray;">5 Star </span></li><li><input type="checkbox" value="8" name="start[]" onchange="change_star(this);"><span style="font-size:12px; color:gray;"> 4 Star </span></li>
<li><input type="checkbox" value="7" name="start[]" onchange="change_star(this);"><span style="font-size:12px; color:gray;"> 3 Star </span></li>
<li><input type="checkbox" value="6" name="start[]" onchange="change_star(this);"><span style="font-size:12px; color:gray;"> Less Than 3 Star</span></li>
</ul>
		
</div>
</div>
	<div class="left-bar-filter"><div class="heading">Name,Pincode,Location </div>
<div class="cat_heading"><input type="text" name="search_by_loc"  id="search_by_loc"  class="form-control" /><!--a id="search_loc"  title="click" onClick="call_location(this);">Search</a--></div>					
	</div>	
<!--div class="left-bar-filter"><div class="heading">Search By Name </div>
<div class="cat_heading"><input type="text" name="search_by_name" id="search_by_name" class="form-control" /><a id="search_name"  title="click" onClick="call_name(this);">Search</a></div>					
	</div-->	
									</div>
  <div class="col-md-9"  id="ifYes1" >

				</div> 
						</div>
</div>
</div> 
<style>#search_by_name,#search_by_loc{padding-right: 60px;}#search_loc,#search_name{
	    position: absolute;
    right: 40px;
    margin-top: -30px;cursor:pointer;
}  .name_show {
    width: 30px;
    height: 30px;
    font-size: 12px;
    line-height: 30px;
    background-color: #cca499;
    display: inline-block;
    text-align: center;
    color: white;
    border-radius: 50%;
}
	</style>
						</div>
<input type="hidden" value="" id="get_login" />
<style>
.fa-thumbs-o-up,.fa-thumbs-up,.likes{
	color:green;
}.fa-thumbs-o-down,.fa-thumbs-down,.dislikes{
	color:red;
}</style>
  <script>
  var newdata='';
  ajax_call(newdata);
	function change_star(rec){
	var linkre='';
	$('[name="start[]"]:checked').each(function(){
	linkre +=$(this).val()+',';
	});	linkre=linkre.slice(0,-1);
	ajax_call(newdata);
	}	
	function yesnoCheck1(that) {
	  ajax_call(newdata);
	} 
	$("body").on( "keyup", "#search_by_loc", function (e){
	e.preventDefault();
	ajax_call(newdata);
	});
	//function call_location(that) {
	  //ajax_call(newdata);
	//} 
	function call_name(that) {
	  ajax_call(newdata);
	} 
	$("body").on( "click", ".pagination-sm a", function (e){
		e.preventDefault();
		var page = $(this).attr("data-page"); 
		var ref_this = $('.pagination-sm').find("li.active a");
		var page2=ref_this.data("page"); 
		if(page2 !=page){
		var newdata="&page="+page
		ajax_call(newdata);	
		}
	});
	function ajax_call(newdata){
		var subcategory1="id="+$("#subcategory1").val();
		var linkre='';
	$('[name="start[]"]:checked').each(function(){
	linkre +=$(this).val()+',';
});	linkre=linkre.slice(0,-1);
		var by_star=linkre;
		var search_by_loc=$("#search_by_loc").val();
		//var search_by_name=$("#search_by_name").val(); +"&search_by_name="+search_by_name
		var sendrequest=subcategory1+"&by_star="+by_star+"&search_by_loc="+search_by_loc+newdata;
		 $.ajax({
		url:"execution/filter-complain-data.php",
		method:"POST",		
		dataType : "html",		
		data:sendrequest,
		success: function(response){
		$("#ifYes1").html(response);	
		}
	});
	}
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
	 if($(formname+" #c_name").val()==''){
		a_response2.show().html('<div class="alert alert-danger">Please Enter Your Comment </div>'); 
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
		var redirecturq=$(formname+" #add_data_complain_comment").data('url');
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
		var redirecturq='';
		$(formname+" #add_data_complain_reply").hide();
		$(formname+" #add_data_complain_reply").after('<img id="loader" src="'+loading_image+'" style="width: 50px;" />');
		insert_data(a_url,a_request,a_response2,redirecturq);
		$(formname+" #loader").remove();
		$(formname+" #add_data_complain_reply").show();		
		}
	}	  
}); 

	</script>
	<!--script src="js/theme/complain.js"></script-->
<?php  include('includes/footer.php'); ?>
