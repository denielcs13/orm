<?php session_start();include '../admin/include/config.php'; 
include '../admin/include/function.php';

if(isset($_POST["action"]) && strtoupper($_POST["action"])=='GET_REVIEW' && is_numeric($_POST["control_by"])){
	$admin_id=$_POST["control_by"];
	$product_id=$_POST["product_id"];
	$customer_id=$_POST["customer_id"];
	$dat=date("Y-m-d");
	$r_title = mysqli_real_escape_string($con,$_POST['r_title']);
	$r_description = mysqli_real_escape_string($con,$_POST['message']);
	$r_rating = $_POST['r_rating'];		
	$proof =$_FILES['r_image']['name'];
	$product_image='';
	if(!empty($proof)){
    $file_tep =$_FILES['r_image']['tmp_name'];
	$directory="../image/review/";
	$image_name='REV_'.$admin_id.date('ynj').round(microtime(true));
	$image_name='REV_'.$admin_id.date('ynj').round(microtime(true));
	$filename=upload_image($proof,$file_tep,$directory,$image_name);	
	if($filename !=''){
		$r_image=",r_image='".$filename."' ";
	}	
	}	
	$query1="insert into review  set product_id  = '".$product_id."', user_id  = '".$customer_id."', admin_id  = '".$admin_id."', r_title  = '".$r_title."',r_rating = '".$r_rating."',r_description = '".$r_description."',r_date = '".$dat."'".$r_image;
	$insert_data1=insert_query($con,$query1);	
	if($insert_data1==1){
			//unset($_SESSION["product_view"]);
			echo $insert_data1;
	}else{
		echo '<div class="alert alert-danger">Sorry unable To Send Review </div>';
	}
}

?>