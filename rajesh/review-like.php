<?php  include('admin/include/config.php'); session_start();?>
<?php


//complain like================================================================

if (isset($_POST['action_review'])) {	
  $pro_id=$_SESSION["product_view"];
  $customer_id = $_POST['post_id'];
  $r_id = $_POST['r_id'];
  $action = $_POST['action_review'];
  switch ($action) {
  	case 'qn_like':
		 $sql=mysqli_query($con,"SELECT `rating_action` from rating_info WHERE customer_id='$customer_id' &&  r_id='$r_id'");
		$data=mysqli_fetch_assoc($sql);
		if(empty($data)){
		
			   $sql="INSERT INTO rating_info (customer_id,product_id,r_id,rating_action) 
         	   VALUES ($customer_id,$pro_id,$r_id,'like')";
		}else{
		$sql="UPDATE rating_info SET rating_action='like' WHERE customer_id=$customer_id && r_id=$r_id";	
		}
		break;
  	case 'qn_dislike':	 
		$sql=mysqli_query($con,"SELECT `rating_action` from rating_info WHERE customer_id='$customer_id' AND  r_id='$r_id'");		   
		$data=mysqli_fetch_assoc($sql);
		if(empty($data)){
			
			$sql="INSERT INTO rating_info (customer_id,product_id,r_id,rating_action) 
         	   VALUES ( $customer_id,$pro_id,$r_id,'dislike')";
		}else{
		$sql="UPDATE rating_info SET rating_action='dislike' WHERE customer_id='$customer_id' && r_id='$r_id'";	
		}
		
         break;
  	case 'qn_unlike':
	      $sql="DELETE FROM rating_info WHERE customer_id= $customer_id AND r_id=$r_id";
	      break;
  	case 'qn_undislike':
      	 $sql="DELETE FROM rating_info WHERE customer_id= $customer_id AND r_id=$r_id";
      break;
  	default:
  		break;
  }

  // execute query to effect changes in the database ...
  mysqli_query($con,$sql);
 
  echo getRating_review($customer_id,$r_id);
  exit(0);
}

// Get total number of likes and dislikes for a particular question
function getRating_review($id,$r_id){
  global $con;
  $rating = array();
   $likes_query = "SELECT COUNT(*) FROM rating_info WHERE r_id=$r_id AND  rating_action='like'";
   $dislikes_query = "SELECT COUNT(*) FROM rating_info WHERE r_id=$r_id AND rating_action='dislike'";
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
function getLikes_review($id,$r_id){
  global $con;
  $sql = "SELECT COUNT(*) FROM rating_info WHERE r_id = $r_id AND rating_action='like'";
  $rs = mysqli_query($con, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular question
function getDislikes_review($id,$r_id)
{
  global $con;
  $sql = "SELECT COUNT(*) FROM rating_info WHERE r_id=$r_id AND rating_action='dislike'";
  $rs = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Check if user already likes post or not
function userLiked_review($post_id,$r_id)
{
	
  global $con; 
  if($post_id){
	$sql = "SELECT * FROM rating_info WHERE customer_id=$post_id AND r_id=$r_id AND rating_action='like'";
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
function userDisliked_review($post_id,$r_id)
{
  global $con;
  if($post_id){
	  
   $sql = "SELECT * FROM rating_info WHERE customer_id=$post_id AND r_id=$r_id AND rating_action='dislike'";
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