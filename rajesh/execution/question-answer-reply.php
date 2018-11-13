<?php session_start();include '../admin/include/config.php'; 
include '../admin/include/function.php';

//question   


if(isset($_POST["action"]) && strtoupper($_POST["action"])=='NEWQUESTION' && is_numeric($_POST["control_by"])){
	$admin_id=$_POST["control_by"];
	$product_id=$_POST["product_id"];
	$customer_id=$_POST["customer_id"];
	$dat=date("Y-m-d");
	$q_name=$_POST['q_name'];
	$name = mysqli_real_escape_string($con,$q_name);
 $query1="insert into question  set product_id  = '".$product_id."', user_id  = '".$customer_id."', admin_id  = '".$admin_id."', q_name  = '".$name."',
	q_date = '".$dat."'";
	$insert_data1=insert_query($con,$query1);	
	if($insert_data1==1){
	$q_id=mysqli_insert_id($con);
	$url='qad/'.$q_id.'/'.strtolower(str_replace(" ","-",$q_name)).'-'.'1.html';
	?>
	<script>
	alert('Thank You.  Your question is Successfully Submitted');
	window.location="<?= $url; ?>";
	</script>
	
			<?php
	}else{
		echo '<div class="alert alert-danger">Sorry unable To Send Complain </div>';
	}
}


//answer


if(isset($_POST["action"]) && strtoupper($_POST["action"])=='NEWANSWER' && is_numeric($_POST["control_by"])){
	$admin_id=$_POST["control_by"];
	$product_id=$_POST["product_id"];
	$customer_id=$_POST["customer_id"];
	$question_id=$_POST["question_id"];
	$dat=date("Y-m-d");
	$answer = mysqli_real_escape_string($con,$_POST['a_name']);
 $query1="insert into answer  set product_id  = '".$product_id."', user_id  = '".$customer_id."', ques_id  = '".$question_id."', admin_id  = '".$admin_id."', answer  = '".$answer."',
	ans_date = '".$dat."'";
	$insert_data1=insert_query($con,$query1);	
	if($insert_data1==1){
	//$q_id=$question_id;
	//$q_name=
	$url='qad/'.$q_id.'/'.strtolower(str_replace(" ","-",$q_name)).'-'.'1.html';
	?>
	<script>
	alert('Thank You.  Your Answer is Successfully Submitted');
	location.reload();//"window.location=question-answer-reply";
	</script>
	
			<?php
	}else{
		echo '<div class="alert alert-danger">Sorry unable To Send answer </div>';
	}
}
?>



<?php 
//ANSWER REPLY
	if(isset($_POST["action"]) && strtoupper($_POST["action"])=='NEWANSWERREPLY' && is_numeric($_POST["control_by"])){
	$admin_id=$_POST["control_by"];
	 $product_id=$_POST["product_id"];
	$customer_id=$_POST["customer_id"];
	$question_id=$_POST["question_id"];
	$answer_id=$_POST["answer_id"];
	$dat=date("Y-m-d");
	$reply = mysqli_real_escape_string($con,$_POST['r_name']);
 $query2="insert into answer_reply set product_id  = '".$product_id."', user_id  = '".$customer_id."', question_id= '".$question_id."', admin_id  = '".$admin_id."',answer_id = '".$answer_id."',reply  = '".$reply."',
	date = '".$dat."'";
	$insert_data2=insert_query($con,$query2);	
	if($insert_data2==1)	{ ?>
	<script>
	alert('Thank You.  Your Reply is Successfully Submitted');
	location.reload();//window.location="question-answer-reply";
	</script>
	
			<?php
	}else{
		echo '<div class="alert alert-danger">Sorry unable To Send REPLY </div>';
	}
}



?>