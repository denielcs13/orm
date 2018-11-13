<?php include '../include/config.php';
include '../include/function.php';
if(isset($_GET["Category"]) && $_GET["Category"]=='Category'){
	$all_data=$_GET["cat_id"];
$query="Select * from category where admin_id='".$admin_id."'    order by category_id desc";
			
					  $i=1;					  
				$data=fetch_query($con,$query);
				  
				if(!empty($data)){
					echo '<option value="">Select Category</option>';
					foreach($data as $cdata){
						
                   	echo "<option   value='".$cdata['category_id']."'";
					echo ($all_data==$cdata['category_id'])?' selected':'';
					
					echo ">".$cdata['category_name']."</option>";
					}
				
						  }
	
}
if(isset($_GET["subcategory1"])){
	 $query2="Select * from subcategory1 where admin_id='".$admin_id."'  && cat_id='".$_GET["subcategory1"]."' order by sub_cat_id desc";
					 
					  $i=1;					  
				$data2=fetch_query($con,$query2);
				  
				if(!empty($data2)){
					echo '<option value="">Select Category</option>';
					foreach($data2 as $cdata2){
						
                   	echo "<option   value='".$cdata2['sub_cat_id']."'";
					echo ($_GET["subcategory_p"]==$cdata2['sub_cat_id'])?' selected':'';
					
					echo ">".$cdata2['sub_cat_name']."</option>";
					}
				
						  }
                        
	
}
if(isset($_GET["subcategory2"])){
	
	   $query3="Select * from subcategory2 where admin_id='".$admin_id."'  && sub_cat_id='".$_GET["subcategory2"]."' order by sub_cat2_id desc";
					
					  $i=1;					  
				$data3=fetch_query($con,$query3);
				  
				if(!empty($data3)){
					foreach($data3 as $cdata3){
						
                   	echo "<option   value='".$cdata3['sub_cat2_id']."'";
					echo ($_GET["subcategory2_p"]==$cdata3['sub_cat2_id'])?' selected':'';
					
					echo ">".$cdata3['sub_cat2_name']."</option>";
					}
				 }
	

	
}
?>