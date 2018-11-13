<?php
function insert_query($con,$query){
	if($con !=='' && $query !==''){
	if(mysqli_query($con, $query)){
		return 1;
	}
	}
}

function update_query($con,$query){
	if($con !=='' && $query !==''){
	if(mysqli_query($con, $query)){
		return 1;
	} 
	}
}
function delete_query($con,$query){	
	if($con !=='' && $query !==''){
	if(mysqli_query($con, $query)){
		return 1;
	}
	}
}
function num_query($con,$query){
	
	if($con !=='' && $query !==''){
	$data=mysqli_query($con, $query);
		$alldata=mysqli_num_rows($data);
		return $alldata;
			
	}
}
function fetch_query($con,$query){
	if($con !=='' && $query){
	$data=mysqli_query($con,$query);
	while($alldata=mysqli_fetch_assoc($data)){
		$returndata[]=	$alldata;
	}
	if(!empty($returndata)){
	return 	$returndata;
	}
	}
}
function upload_image($image,$temp,$directory,$name){
	$ext= pathinfo($image, PATHINFO_EXTENSION);
	$filename=$name.'.'.$ext;	
	$uploads_dir= $directory.$filename;
	if(move_uploaded_file($temp, $uploads_dir)){
	return  $filename;
	}  else {
		return "no";
	}
	}
?>