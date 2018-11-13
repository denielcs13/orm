
<?php 
include 'admin/include/function.php';
 include('includes/header.php');
 include ('review-like.php');
 include('question-like.php'); 
$id=$_SESSION["product_view"]=$_GET["id"];

$review_customer_id=(isset($_SESSION["review_customer_id"]))?$_SESSION["review_customer_id"]:'';
//$url_redirect=$_SERVER["REQUEST_URI"];
//$senddada=explode("product",$url_redirect);
$re_url='http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
echo '<input type="hidden" id="url_redirect" value="'.$re_url.'"/>';
?>

<style>
.btn {
    color: #ffffff !important;
}
.modal-content{
	margin-top:20%;
}
.div_border{border-right: 1px solid #ec1f16;
    padding: 0px 5px 0px 5px;
	}
	.font-color{
	 font: 20px/20px 'Roboto';
    color: #40ae21;
	}
	.font-color-yellow{
	 font: 15px/15px 'Roboto';
    color:#fdf733
	}
	.font-color-yellow center{
	background-color: #f57c2d;
    padding: 5px;
    border-radius: 5px;
	}
	a
	{
		cursor:pointer;
	}
</style>



<link rel="stylesheet" href="css/tabs.css" />
<div class="content" style="background-color:#FAFAFA;"> 
    <div class="container"  style="width:90%;">
        <div class="row">
 
<!----- section  1   ///////////////////////////////////////////////////   /////////////////////////////////////////////////start -->
<div style="background-color:#ffffff; height:65%;  border:1px solid lightgray; padding:10px;" >
                		
 <div class="thumb-box3">
 
<?php  
$query="select * from product where admin_id='".$admin_id."' && company_id='$id'";
$data=fetch_query($con,$query);
	if(!empty($data))
	{
		foreach($data as $all_data)
		{
		$image=(file_exists('admin/images/company/'.$all_data['product_image']) && !empty($all_data['product_image']))?'admin/images/company/'.$all_data['product_image']:'admin/img/defaultimage.png';
?>
				
<div class="col-lg-5 col-md-3 col-sm-6 col-xs-6 wow fadeIn">
         <div class="thumb-pad3">
          <div class="thumbnail">
			<h4><span style="color:#83AB3F;"><?php echo $all_data['company_name']; ?><span></h4>	<hr>	
				<figure><img src="<?=$image;?>" height="210" width="90%" border="1" alt=""></figure><br>
				<a  href="writereview/<?php echo $all_data['company_id'].'/'.strtolower(str_replace(" ","-",$all_data["company_name"])).'-1.html'; ?>" class="btn btn-info btn-sm editproject" 
				style="height:37px; width:100%; background-color:#FF5A5F; color:white; border:none; padding:8px; font-size:13px;" title=" Write Your Review" >
				<span class="fa fa-pencil-square-o"></span> Write Your Review</a> <br><br>
	
</div>
 </div>
</div> 
						
<!-----product details section ///////////////////////////////////////////////////   start -->

<div class="col-lg-6 col-md-4 col-sm-6 col-xs-6 wow fadeIn" 
style="height:80%; width:57%; padding:15px; color:white; border:1px solid lightgray; margin-top:38px; ">
                    <div class="thumb-pad5 maxheight">
					   <div class="thumbnail">
						  <div class="caption">
							<?php
								$query2="select * from review where product_id='$id' && status='1' order by r_id desc";
								$count_row=num_query($con,$query2);
								 $data2=fetch_query($con,$query2);
							?>
		<div >
		<span class="font-color" style="font-size:13px;">Product Details</span>
		
		</div>
		<hr>
	<?php  include 'includes/rating-average.php'; ?>	
<div class="col-md-3 div_border font-color-yellow"><?php echo $star_rating; ?></div><div class="col-md-3 div_border"><center>
       <img src="img/love.jpg"  height="20px">100%</center></div>
        <div class="col-md-3 div_border font-color-yellow" ><center> <?php	echo $average_rating; ?> </center></div>
		<div class="col-md-3 font-color" style="font-size:13px;"><?php  echo $count_row; ?> Reviews</div>
		<br/> <hr> 

     <!--div class="col-md-6" style="clear: both;">Email ID : <?php  $all_data['email']; ?>  </div-->
       <!--div class="col-md-6">Contact Number : <?php echo $all_data['mobile']; ?></div> <br/-->
      <hr><div class="col-md-12" style="clear: both;">
        Address : <?php echo $all_data['address']; ?></div><br/><hr>
      <div class="col-md-6" style="clear:both">
	  <a target="_blank" href="<?php echo $all_data['website']; ?>" class="btn btn-large btn-block  btn-primary"> WEBSITE</a></div>
	  <div class="col-md-6">  <a class="btn btn-large btn-block btn-info" data-toggle="modal" data-target="#myModal" id="a-contact">
	  <span class="fa fa-phone"></span>Contact US</a> </div>
	  

                </div>
             </div>
          </div>
      </div>  
</div>
</div><br>
<style>
.fixed-menu {
    position: inherit;
    top: 0;
    width: 100%;
    background: #fafafa;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.25);
    -webkit-box-shadow: 0 2px 4px 0 rgba(0,0,0,.25);
    -moz-box-shadow: 0 2px 4px 0 rgba(0,0,0,.25);
    z-index: 998;
    display: none;
    left: 0;
    background: #fff;
}.fixed-menu .tabable {
    margin-bottom: 0;
    border: 0 none;
}.fixed-menu ul.tabable>li>a {
    border-right: 1px solid #e5e5e5;
    margin: 15px 0 13px 0;
    padding: 0 25px;
    color: #242c42;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
}ul.tabable>li {display: inline-block;}.fixed-menu ul.tabable>li.active a {
color: #fff; border-right: none;}.fixed-menu ul.tabable>li.active{background-color:#71a117;}#section1,#section2,#section3,#section4,#section5,#section6{    margin-top: 10%;min-height:500px;}.fixed-menu>li>a {
    color: #9d9d9d;
}.fixed-menu>.active>a, .fixed-menu>.active>a:focus, .fixed-menu>.active>a:hover{color: #fff;
    background-color: #080808;}
	#info,#review,#photo,#est,#question,#facility{    min-height: 150px;padding-top"10%;}
</style>
<div style="background-color:#ffffff;  border:1px solid lightgray;">
<div class="fixed-menu" id="fixed-menu" style="overflow: hidden;display: block;">
	
            <ul class="container tabable list-menu scroll1 nav">
                
                

                <li id="s1" class="scroll active">
                    <a href="<?= $re_url; ?>#review">Reviews</a>
                </li>
				<li id="s2" class="scroll"  >
                    <a href="<?= $re_url; ?>#info">Infromation</a>
                </li>
				 <li id="s3" class="scroll ">
                    <a href="<?= $re_url; ?>#photo">Photos</a>
                </li>
				 <li id="s4" class="scroll ">
                    <a href="<?= $re_url; ?>#est">Establishment</a>
                </li>
				 <li id="s5" class="scroll ">
                    <a href="<?= $re_url; ?>#question">FAQ</a>
                </li>
				 <li id="s6" class="scroll ">
                    <a href="<?= $re_url; ?>#facility">Facility</a>
                </li>
               
                
            </ul>
        </div>					
	
	<div class="row">
		<div class="col-md-12" >
	<div id="review">
	<?php include('product-view-review.php'); ?>	
	</div>
<div id="info">

        <ul>
			<li><p><?php echo $all_data['description']; ?></p></li>
			<?php
			
			 $more_detail="select title_name from title where product_id='".$id."'";
			$more_detail_data=fetch_query($con,$more_detail);
			 
			?>
			<li><p><?php echo $more_detail_data[0]['title_name']; ?></p></li>
			<li><span style="width:700px ;"><?php  echo $all_data['map_code'];  ?> </span></li>
		</ul>
    </div>

	
		
	<div id="photo">
 <?php include 'product-view-gallery.php';?>
		</div>
					
	<div id="est">
   
<?php include 'product-view-est.php'; ?>
   </div>
		
	<div id="question">
	<?php include 'product-view-question.php'; ?>
</div>
				
    <div id="facility">
	<div  class="col-md-12 " style="background-color:#ffffff; width:100%; margin-top:100px">
			<div class="col-md-12"> <h4>Facility</h4></div> 
		<?php 
			$facility=mysqli_query($con,"select * from  facility where product_id='$id'");
				while($fresult=mysqli_fetch_assoc($facility)){
		?>
            <ul type="circle">
			 <li><p><?php echo $fresult['f_name'];  ?></p></li>
			</ul>
		<?php  }  ?>
    </div>
	  </div>
	<?php  } 
	}
	?>
	    </div>
			</div>
			   </div>
					</div>
		               <br><br>
<input type="hidden" value="" id="get_login" />
<style>
.fa-thumbs-o-up,.fa-thumbs-up,.likes{
	color:green;
}.fa-thumbs-o-down,.fa-thumbs-down,.dislikes{
	color:red;
}</style>
	<script> 
	$("body").attr("data-spy","scroll");
	$("body").attr("data-target",".fixed-menu");
	var element_position = $('#fixed-menu').offset().top;
	$(window).on('scroll', function() {
	var y_scroll_pos = window.pageYOffset;
    var scroll_pos_test = element_position;
    if(y_scroll_pos > scroll_pos_test) {
       $('#fixed-menu').css("position","fixed");
    }else{
		$('#fixed-menu').css("position","inherit");
	}
	var position = $(this).scrollTop();

    //$('.section').each(function() {
         var s1 = $("#review").offset().top;
     
        if (position >= s1) {
			$('#s2,#s3,#s4,#s5,#s6').removeClass('active');
            $('#s1').addClass('active');
        } else{
			$('#s1').removeClass('active');
		}
		var s2 = $("#info").offset().top;        
        if (position >= s2) {
			$('#s1,#s3,#s4,#s5,#s6').removeClass('active');
            $('#s2').addClass('active');
        }else{
			 $('#s2').removeClass('active');
		}
		var s3 = $("#photo").offset().top;        
        if (position >= s3) {
			 $('#s1,#s2,#s4,#s5,#s6').removeClass('active');
            $('#s3').addClass('active');
        }else{
			 $('#s3').removeClass('active');
		}
		var s4 = $("#est").offset().top;        
        if (position >= s4) {
			$('#s1,#s2,#s3,#s5,#s6').removeClass('active');
            $('#s4').addClass('active');
        }else{
			 $('#s4').removeClass('active');
		}
		var s5 = $("#question").offset().top;        
        if (position >= s5) {
			 $('#s1,#s2,#s3,#s4,#s6').removeClass('active');
            $('#s5').addClass('active');
        }else{
			 $('#s5').removeClass('active');
		}
		var s6= $("#facility").offset().top;        
        if (position >= s6) {
			 $('#s1,#s2,#s3,#s4,#s5').removeClass('active');
			 
            $('#s6').addClass('active');
        }else{
			 $('#s6').removeClass('active');
		}
	});
	$('body').on("click",'.scroll a',function(){
	$('.scroll').removeClass("active");	
	$(this).parent('.scroll').addClass("active");
	});
	</script>
<script>
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
</script>

	<style>.nav > li > a:hover, .nav > li > a:focus{
 		background-color: transparent !important;
	}
	#est,#facility,#question,#info,#review,#photo { 
  display: flex;
}</style>	
<script src="js/theme/contact.js"></script>
<script src="js/theme/comment.js"></script>
<script src="js/theme/question-answer-reply.js"></script>				  
</div></div></div><br>
<?php include('includes/footer.php'); ?>
