<?php session_start();include '../admin/include/config.php'; 
include '../admin/include/function.php';
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='NEWCOMMENT'  && is_numeric($_POST["control_by"])){
	$admin_id=$_POST["control_by"];
	$product_id=$_POST["product_id"];
	$customer_id=$_POST["customer_id"];
	$review_id=$_POST["review_id"];
	$dat=date("Y-m-d");
	$name = mysqli_real_escape_string($con,$_POST['c_description']);

 $query1="insert into comment  set product_id  = '".$product_id."',r_id='".$review_id."', user_id  = '".$customer_id."', admin_id  = '".$admin_id."', c_description  = '".$name."',
	c_date = '".$dat."'";
	$insert_data1=insert_query($con,$query1);	
	if($insert_data1==1){
			echo $insert_data1;
	}else{
		echo '<div class="alert alert-danger">Sorry unable To Send Comment </div>';
	}
}



if(isset($_POST["action"]) && strtoupper($_POST["action"])=='NEWCOMMENTREPLY'  && is_numeric($_POST["control_by"])){
	$admin_id=$_POST["control_by"];
	$product_id=$_POST["product_id"];
	$customer_id=$_POST["customer_id"];
	$comment_id=$_POST["comment_id"];
	$review_id=$_POST["review_id"];
	$dat=date("Y-m-d");
	$name = mysqli_real_escape_string($con,$_POST['r_name']);

 $query2="insert into r_comment_reply  set product_id  = '".$product_id."',review_id='".$review_id."',comment_id='".$comment_id."', user_id  = '".$customer_id."', admin_id  = '".$admin_id."', reply  = '".$name."',
	r_date = '".$dat."'";
	$insert_data2=insert_query($con,$query2);	
	if($insert_data2==1){
			echo $insert_data2;
	}else{
		echo '<div class="alert alert-danger">Sorry unable To Send Comment </div>';
	}
}
?>