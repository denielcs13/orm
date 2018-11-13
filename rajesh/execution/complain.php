<?php session_start();include '../admin/include/config.php'; 
include '../admin/include/function.php';
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='NEWCOMPLAIN' && is_numeric($_POST["control_by"])){
	$admin_id=$_POST["control_by"];
	$product_id=$_POST["product_id"];
	$customer_id=$_POST["customer_id"];
	$dat=date("Y-m-d");
	$name = mysqli_real_escape_string($con,$_POST['c_company_name']);
	$subject = mysqli_real_escape_string($con,$_POST['c_subject']);
	$details = mysqli_real_escape_string($con,$_POST['c_details']);
	$category = $_POST['c_category'];
	$country = $_POST['c_country'];	
	$state = $_POST['c_state'];
	$city = $_POST['c_city'];
	$zip = $_POST['c_zip_code'];
	$website = $_POST['c_website'];
	$video = $_POST['c_video_link'];	
	$proof =$_FILES['c_image']['name'];
	$c_image="";
	if(!empty($proof)){
    $file_tep =$_FILES['c_image']['tmp_name'];
	$directory="../image/complain/";
	$image_name='COM_'.$admin_id.date('ynj').round(microtime(true));
	$filename=upload_image($proof,$file_tep,$directory,$image_name);	
	if($filename !=''){
		$c_image=",c_image='".$filename."' ";
	}	
	}	

	if(strtolower($city)== 'other3'){
	$search_city=mysqli_fetch_array(mysqli_query($con,"select city_name from city where city_name='".$_POST["other3"]."'"));
	if(empty($search_city)){
	 echo $query2="insert into city set city_name='".$_POST["other3"]."'";
		if($con !=='' && $query2 !==''){
	$insert2=insert_query($con,$query2);	
	if($insert2==1){	
		$city=mysqli_insert_id($con);
	}
	}
	}
	}
	$city=(is_numeric($city))?$city:'';
	if(strtolower($category)== 'other1'){
	$search_cat=mysqli_fetch_array(mysqli_query($con,"select category_name from category where  category_name='".$_POST["other1"]."'"));
	if(empty($search_cat)){
	 $query2="insert into category set category_name='".$_POST["other1"]."',admin_id='".$admin_id."'";
		if($con !=='' && $query2 !==''){
	$insert2=insert_query($con,$query2);	
	if($insert2==1){	
		$category=mysqli_insert_id($con);
	}
	}
	}
	}
	$category=(is_numeric($category))?$category:'';
//$c_rating=$_POST["c_rating"];
	
 $query1="insert into complain  set product_id  = '".$product_id."', user_id  = '".$customer_id."', admin_id  = '".$admin_id."', c_company_name  = '".$name."', c_subject = '".$subject."', c_details = '".$details."' , c_category = '".$category."', c_country = '".$country."' , c_state= '".$state."', c_city = '".$city."', c_zip_code = '".$zip."' , c_website = '".$website."', c_video_link = '".$video."',
	c_date = '".$dat."'".$c_image;
	$insert_data1=insert_query($con,$query1);	
	if($insert_data1==1){
			echo mysqli_insert_id($con);
	}else{
		echo '<div class="alert alert-danger">Sorry unable To Send Complain </div>';
	}
}
?>