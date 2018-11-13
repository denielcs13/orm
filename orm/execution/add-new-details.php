<?php session_start();include '../admin/include/config.php'; 
include '../admin/include/function.php';
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='NEWDETAIL' && is_numeric($_POST["control_by"])){

	$admin_id=$_POST["control_by"];
	$customer_id=$_POST["customer_id"];
	$name = mysqli_real_escape_string($con,$_POST['company_name']);
	$title = mysqli_real_escape_string($con,$_POST['title']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	$description = mysqli_real_escape_string($con,$_POST['description']);
	
	$category=$_POST['category_name'];
	$subcategory1=$_POST['subcategory1'];
	$subcategory2=$_POST['subcategory2'];
	//$rating = $_POST['rating'];
	$mobile = $_POST['contact_no'];
	$pincode = $_POST['pin_code'];
	$email = $_POST['email'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$website = $_POST['website'];
	$latitude= $_POST['latitude'];
	$longnitude= $_POST['longnitude'];
	$map= $_POST['map_code'];
	$date= date("Y-m-d",strtotime($_POST['p_date']));
	$proof =$_FILES['image']['name'];
	$product_image='';
	if(!empty($proof)){
    $file_tep =$_FILES['image']['tmp_name'];
	$directory="../admin/images/company/";
	$image_name='PRO_'.$admin_id.date('ynj').round(microtime(true));
	$filename=upload_image($proof,$file_tep,$directory,$image_name);
	
	if($filename !=''){
		$product_image=",product_image='".$filename."' ";
	}	
	
	}
	//category
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
	//subcategory1
	if(strtolower($subcategory1)== 'other2'){
	$search_sub=mysqli_fetch_array(mysqli_query($con,"select sub_cat_name from subcategory1 where sub_cat_name='".$_POST["other2"]."'"));
	if(empty($search_sub)){
	 echo $query4="insert into subcategory1 set sub_cat_name='".$_POST["other2"]."' ,cat_id= '".$category."',admin_id='".$admin_id."'";
		if($con !=='' && $query4 !==''){
	$insert4=insert_query($con,$query4);	
	if($insert4==1){	
		$subcategory1=mysqli_insert_id($con);
	}
	}
	}
	} 
	$subcategory1=(is_numeric($subcategory1))?$subcategory1:'';
	//subcategory2
	if(strtolower($subcategory2)== 'other3'){
	$search_sub2=mysqli_fetch_array(mysqli_query($con,"select sub_cat2_name from subcategory2 where sub_cat2_name='".$_POST["other3"]."'"));
	if(empty($search_sub2)){
	$query5="insert into subcategory2 set sub_cat2_name='".$_POST["other3"]."' ,cat_id= '".$category."',sub_cat_id='".$subcategory1."',admin_id='".$admin_id."'";
		if($con !=='' && $query5 !==''){
	$insert5=insert_query($con,$query5);	
	if($insert5==1){	
		$subcategory2=mysqli_insert_id($con);
	}
	}
	}
	} 
	$subcategory2=(is_numeric($subcategory2))?$subcategory2:'';
	//city
	if(strtolower($city)== 'other4'){
	$search_city=mysqli_fetch_array(mysqli_query($con,"select city_name from city where  city_name='".$_POST["other4"]."'"));
	if(empty($search_city)){
	 $query3="insert into city set city_name='".$_POST["other4"]."',state_id='".$state."'";
		if($con !=='' && $query3 !==''){
	$insert3=insert_query($con,$query3);	
	if($insert3==1){	
		$city=mysqli_insert_id($con);
	}
	}
	}
	}
	$city=(is_numeric($city))?$city:'';
	
		 $query="insert into product set user_id='".$customer_id."',company_name='".$name."',category='".$category."',subcategory1='".$subcategory1."',subcategory2='".$subcategory2."',mobile='".$mobile."',pin_code='".$pincode."',email='".$email."',country='".$country."',state='".$state."',city='".$city."',title='".$title."',description='".$description."',address='".$address."',latitude='".$latitude."',longnitude='".$longnitude."',map_code='".$map."',website='".$website."',p_date='".$date."',status='0',admin_id='".$admin_id."'".$product_image;
	if($con !=='' && $query !==''){
	$insert=insert_query($con,$query);	
	if($insert==1){echo mysqli_insert_id($con);
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Added Product </div>';
	}
	}else{
		echo '<div class="alert alert-danger">Invalid Request</div>';
	}
	
}
	?>