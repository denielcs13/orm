<?php session_start();include '../admin/include/config.php'; 
include '../admin/include/function.php';
//comment
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='NEWCOMMENTS'  && is_numeric($_POST["control_by"])){
	$admin_id=$_POST["control_by"];
	$customer_id=$_POST["customer_id"];
	$complain_id=$_POST["complain_id"];
	$dat=date("Y-m-d");
	$name = mysqli_real_escape_string($con,$_POST['c_name']);
	$rating=$_POST["star"];
 $query1="insert into complain_comment  set c_rating='".$rating."',complain_id='".$complain_id."', user_id  = '".$customer_id."', admin_id  = '".$admin_id."', comment = '".$name."',
	co_date = '".$dat."'";
	$insert_data1=insert_query($con,$query1);	
	if($insert_data1==1){
		echo $insert_data1;	
	}else{
		echo '<div class="alert alert-danger">Sorry unable To Send Comment </div>';
	}
} 
//reply
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='NEWREPLY'  && is_numeric($_POST["control_by"])){
	$admin_id=$_POST["control_by"];
	$customer_id=$_POST["customer_id"];
	$complain_id=$_POST["complain_id"];
	$comment_id=$_POST['comment_id'];
	$dat=date("Y-m-d");
	$name = mysqli_real_escape_string($con,$_POST['c_reply']);

 $query2="insert into complain_reply  set complain_id='".$complain_id."',comment_id='".$comment_id."', user_id  = '".$customer_id."', admin_id  = '".$admin_id."', reply = '".$name."',
	date = '".$dat."'";
	$insert_data2=insert_query($con,$query2);	
	if($insert_data2==1){
		echo $insert_data2;
	}else{
		echo '<div class="alert alert-danger">Sorry unable To Send Reply </div>';
	}
}



?>