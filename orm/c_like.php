<?php  include('admin/include/config.php'); session_start();?>
<?php


//complain like================================================================

if (isset($_POST['action'])) {	
  $pro_id=$_SESSION["product_view"];
  $customer_id = $_POST['post_id'];
  $c_id = $_POST['c_id'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'qn_like':
		 $sql=mysqli_query($con,"SELECT action from complain_like WHERE customer_id='$customer_id' &&  complain_id='$c_id'");
		$data=mysqli_fetch_assoc($sql);
		if(empty($data)){
			$sql="INSERT INTO complain_like (customer_id,action,complain_id)  VALUES ($customer_id,'like',$c_id)";
		}else{
		$sql="UPDATE complain_like SET action='like' WHERE customer_id=$customer_id && complain_id=$c_id";	
		}
		
         break;
  	case 'qn_dislike':	 
		$sql=mysqli_query($con,"SELECT action from complain_like WHERE customer_id='$customer_id' &&  complain_id='$c_id'");		   
		$data=mysqli_fetch_assoc($sql);
		if(empty($data)){
			$sql="INSERT INTO complain_like (customer_id,action,complain_id)  VALUES ($customer_id,'dislike',$c_id)";
		}else{
		$sql="UPDATE complain_like SET action='dislike' WHERE customer_id=$customer_id && complain_id=$c_id";	
		}
		
         break;
  	case 'qn_unlike':
	      $sql="DELETE FROM complain_like WHERE customer_id= $customer_id AND complain_id=$c_id";
	      break;
  	case 'qn_undislike':
      	 $sql="DELETE FROM complain_like WHERE customer_id= $customer_id AND complain_id=$c_id";
      break;
  	default:
  		break;
  }

  // execute query to effect changes in the database ...
  mysqli_query($con,$sql);
 
  echo getRating($customer_id,$c_id);
  exit(0);
}

// Get total number of likes and dislikes for a particular question
function getRating($id,$c_id)
{
  global $con;
  $rating = array();
   $likes_query = "SELECT COUNT(*) FROM complain_like  WHERE complain_id = $c_id AND action='like'";
   $dislikes_query ="SELECT COUNT(*) FROM complain_like 
		  			 WHERE complain_id = $c_id AND action='dislike'";
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
function getLikes($id,$c_id)
{
  global $con;
  $sql = "SELECT COUNT(*) FROM complain_like 
  		  WHERE complain_id=$c_id AND  action='like'";
  $rs = mysqli_query($con, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular question
function getDislikes($id,$c_id)
{
  global $con;
  $sql = "SELECT COUNT(*) FROM complain_like WHERE complain_id=$c_id AND action='dislike'";
  $rs = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Check if user already likes post or not
function userLiked($post_id,$c_id)
{
	
  global $con; 
  if($post_id){
	$sql = "SELECT * FROM complain_like WHERE  customer_id=$post_id AND complain_id=$c_id AND action='like'";
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
  $sql = "SELECT * FROM complain_like WHERE  complain_id=$c_id AND action='like'";
  $result = mysqli_query($con, $sql); 
	  
  } */
  
}

// Check if user already dislikes post or not
function userDisliked($post_id,$c_id)
{
  global $con;
  if($post_id){
	  
   $sql = "SELECT * FROM complain_like WHERE customer_id=$post_id AND complain_id=$c_id AND action='dislike'";
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