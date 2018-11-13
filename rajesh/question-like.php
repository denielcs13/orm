<?php  include('admin/include/config.php'); session_start();?>
<?php


//complain like================================================================

if (isset($_POST['action'])) {	
  //$pro_id=$_SESSION["product_view"];
  $customer_id = $_POST['post_id'];
  $q_id = $_POST['q_id'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'qn_like':
		 $sql=mysqli_query($con,"SELECT rating_action from qa_rating_info WHERE customer_id='$customer_id' &&  question_id='$q_id'");
		$data=mysqli_fetch_assoc($sql);
		if(empty($data)){
			/* $sql="INSERT INTO qa_rating_info (customer_id,product_id,rating_action,question_id) 
         	   VALUES ($customer_id,$pro_id,'like',$q_id)"; */
			   $sql="INSERT INTO qa_rating_info (customer_id,rating_action,question_id) 
         	   VALUES ($customer_id,'like',$q_id)";
		}else{
		$sql="UPDATE qa_rating_info SET rating_action='like' WHERE customer_id=$customer_id && question_id=$q_id";	
		}
		
         break;
  	case 'qn_dislike':	 
		$sql=mysqli_query($con,"SELECT rating_action from qa_rating_info WHERE customer_id='$customer_id' &&  question_id='$q_id'");		   
		$data=mysqli_fetch_assoc($sql);
		if(empty($data)){
			/* $sql="INSERT INTO qa_rating_info (customer_id,product_id,question_id,rating_action) 
         	   VALUES ( $customer_id,$pro_id,$q_id,'dislike')"; */
			$sql="INSERT INTO qa_rating_info (customer_id,question_id,rating_action) 
         	   VALUES ( $customer_id,$q_id,'dislike')";
		}else{
		$sql="UPDATE qa_rating_info SET rating_action='dislike' WHERE customer_id='$customer_id' && question_id='$q_id'";	
		}
		
         break;
  	case 'qn_unlike':
	      $sql="DELETE FROM qa_rating_info WHERE customer_id= $customer_id AND question_id=$q_id";
	      break;
  	case 'qn_undislike':
      	 $sql="DELETE FROM qa_rating_info WHERE customer_id= $customer_id AND question_id=$q_id";
      break;
  	default:
  		break;
  }

  // execute query to effect changes in the database ...
  mysqli_query($con,$sql);
 
  echo getRating($customer_id,$q_id);
  exit(0);
}

// Get total number of likes and dislikes for a particular question
function getRating($id,$q_id)
{
  global $con;
  $rating = array();
   $likes_query = "SELECT COUNT(*) FROM qa_rating_info  WHERE question_id = $q_id AND rating_action='like'";
   $dislikes_query = "SELECT COUNT(*) FROM qa_rating_info WHERE question_id = $q_id AND rating_action='dislike'";
  $likes_rs = mysqli_query($con, $likes_query);
  $dislikes_rs = mysqli_query($con, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Get total number of likes for a particular question
function getLikes($id,$q_id)
{
  global $con;
  $sql = "SELECT COUNT(*) FROM qa_rating_info WHERE question_id=$q_id AND  rating_action='like'";
  $rs = mysqli_query($con, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular question
function getDislikes($id,$q_id)
{
  global $con;
  $sql = "SELECT COUNT(*) FROM qa_rating_info WHERE question_id=$q_id AND rating_action='dislike'";
  $rs = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Check if user already likes post or not
function userLiked($post_id,$q_id)
{
	
  global $con; 
  if($post_id){
	$sql = "SELECT * FROM qa_rating_info WHERE customer_id=$post_id AND question_id=$q_id AND rating_action='like'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
  }else{
	 return false; 
  }
  
}

// Check if user already dislikes post or not
function userDisliked($post_id,$q_id)
{
  global $con;
  if($post_id){
	  
   $sql = "SELECT * FROM qa_rating_info WHERE customer_id=$post_id AND question_id=$q_id AND rating_action='dislike'";
  $result = mysqli_query($con, $sql);
   if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
  }else{
	 return false; 
  }
  /* }else{
	  
  $sql = "SELECT * FROM complain_like WHERE complain_id=$c_id AND action='dislike'";
  $result = mysqli_query($con, $sql);
	  
  } */
 
}
?>