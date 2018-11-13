<?php session_start();
include('admin/include/config.php'); 
include 'includes/currentpage.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
<base href="http://demo.c2shub.com/rajesh/rajesh/" target="">
<?=$meta_tags;?>

<meta charset="utf-8">    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name = "format-detection" content = "telephone=no" />
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
<!--CSS-->
<link rel="stylesheet" href="css/bootstrap.css" >
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/camera.css">
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!--JS-->
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
<script src="js/jquery.equalheights.js"></script> 
<script src="js/camera.js"></script>
<script>
    $(document).ready(function(){
        jQuery('.camera_wrap').camera();
    });
</script>

<!--[if (gt IE 9)|!(IE)]><!-->
<script src="js/wow/wow.js"></script>
<script src="js/wow/device.min.js"></script>
<script src="js/jquery.mobile.customized.min.js"></script>
<script>
    $(document).ready(function () {       
      if ($('html').hasClass('desktop')) {
        new WOW().init();
      }   
    });
</script>

</head>
<body>
<!--header-->
<header class="indent">
    <div class="container">     
        <h1 class="navbar-brand navbar-brand_ wow fadeInDown"><a href="index.php"><img src="img/logo.png" alt="logo"></a></h1>  
	<a href="#" id="browse-category" class="btn btn-success"  style="    margin: 1% 0px 0px 3%;
    padding: 12px;">Browse Category</a>	
      <?php $product=$_GET["ID"];
		/* if(isset($_POST['search']))
		{
		$product=$_POST['search1'];
		$sql=mysqli_query($con, "SELECT category_id FROM category WHERE category_name LIKE  '%".$product."%'");
		$data=mysqli_fetch_assoc($sql);
		$sql2=mysqli_query($con, "SELECT sub_cat_id FROM subcategory1 WHERE sub_cat_name like  '%".$product."%'");
		$data2=mysqli_fetch_assoc($sql2);
		$sql3=mysqli_query($con, "SELECT sub_cat2_id FROM subcategory2 WHERE sub_cat2_name like  '%".$product."%'");
		$data3=mysqli_fetch_assoc($sql3);
		$sql4=mysqli_query($con, "SELECT company_id FROM product WHERE company_name like  '%".$product."%'");
		$data4=mysqli_fetch_assoc($sql4);
		if($data){		
		$search=(!empty($product))?"?category=category&ID=".$product:'';
		header("location:http://demo.c2shub.com/rajesh/rajesh/search.php".$search);		
		}else if($data2){
		$search=(!empty($product))?"?category=subcat&ID=".$product:'';
		header("location:http://demo.c2shub.com/rajesh/rajesh/search.php".$search);		
		}else if($data3){
		$search=(!empty($product))?"?category=subcat2&ID=".$product:'';
		header("location:http://demo.c2shub.com/rajesh/rajesh/search.php".$search);		
		}else if($data4){
		$search=(!empty($product))?"?category=product&ID=".$product:'';
		header("location:http://demo.c2shub.com/rajesh/rajesh/search.php".$search);		
		}else{	
		//header("location:http://demo.c2shub.com/rajesh/rajesh/add-new-details");
		
		}
			
		} */ 
		?>
		
       <div id="search" class="search" <!-- action="" method="post" accept-charset="utf-8"-->
	   <input type="text" name="search1" value="" id="search_data" autofocus="off" placeholder="Search for product, brands services and more">
			<button id="search_btn" class="btn btn-success" name="search" style="height:43px;  margin-left:opx;">Search</button>
            <!--a href="#"  name="search" ><img src="img/magnify.png" alt=""></a-->
        </div >
		<div id="product_load"></div>
		<script>
		jQuery('#search_data').keyup(function(){
		var search_data = jQuery('#search_data').val();
		if(search_data.length > 2){
			jQuery.ajax({
				type		: "POST",
				url			: "execution/search-data.php",
				dataType	: "text",
				data		: {"search_data":search_data},
				success: function(msg){	
					jQuery("#product_load").html(msg);					
					jQuery("#product_load #product").click(function(){
						var locationsend = jQuery(this).data("location");
						window.location=locationsend;									
					});
				}
			});
		}else{
			jQuery("#product_load div").remove();
		}
	});	
	jQuery("#search_btn").click(function(){
			var search_data = jQuery('#search_data').val();
			window.location="http://demo.c2shub.com/rajesh/rajesh/search?data="+search_data;
			});
		</script>
		
    </div>
	<style>
	#product_load{position: absolute;left: 51%; width: 25%;background-color: #fff;font-size: 12px;    z-index: 9999;}
	#product{padding: 8px 8px 8px 20px;border-top: 1px solid #5cb85c;color: #00000096;cursor: pointer;}
	</style>
    <div id="stuck_container" class="box clearfix">
        <div class="container">
            <nav class="navbar navbar-default navbar-static-top tm_navbar clearfix" role="navigation">
                <ul class="nav sf-menu clearfix">
                    <li <?=($page[0]=='index')?'class="active"':''; ?>><a href="index" >Home</a></li>
                    <li <?=($page[0]=='about')?'class="active"':''; ?>><a href="about" >About Us</a></li>
                    <li <?=($page[0]=='review')?'class="active"':''; ?>><a href="review">Reviews</a>                    
                    </li>
                    <li <?=($page[0]=='gallery')?'class="active"':''; ?>><a href="gallery">Gallery</a></li>
                    <li <?=($page[0]=='contact')?'class="active"':''; ?>><a href="contact">Contacts</a></li>
					<li <?=($page[0]=='complaint')?'class="active"':''; ?>><a href="complaint">Complaint</a></li>
					<li <?=($page[0]=='question-answer-reply')?'class="active"':''; ?>><a href="question-answer-reply">Ask Question</a></li>
					<?php
					if(isset($_SESSION["review_customer_id"])){
						?>
					 <li <?=($page[0]=='profile')?'class="active"':''; ?>><a href="profile">Profile</a></li>
					 <?php
					}else if($page[0] !='review'){
					?>
					
<li ><a href="#" id="popup_login" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" >Login</a></li>
<?php					
					}
					?>
			<?php
					if(isset($_SESSION["review_customer_id"])){
						?>
					 <li <?=($page[0]=='logout')?'class="active"':''; ?>><a href="logout">Logout</a></li>
					 <?php
					}
					?>	
			
	</li>
	<li <?=($page[0]=='add-new-details')?'class="active"':''; ?>><a href="add-new-details">Add-New-Details</a></li>
                </ul>
            </nav>
		
            <ul class="follow_icon">
                <li><a href="#" class="fa fa-twitter"></a></li>
                <li><a href="#" class="fa fa-google-plus"></a></li>
                <li><a href="#" class="fa fa-facebook"></a></li>
                <li><a href="#" class="fa fa-skype"></a></li>
                <li><a href="#" class="fa fa-pinterest-square"></a></li>
            </ul>
        </div>
    </div>	
</header>
	<?php  include 'includes/browse-category.php'; ?>
<?php $admin_id='2' ?> 
<input type="hidden" value="<?php echo $admin_id;?>" id="admin_id">

