<? include '../admin/include/config.php'; include '../admin/include/function.php';
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='GET_SUBCATLIST' && is_numeric($_POST["admin_id"])){
		$admin_id=$_POST["admin_id"];
		$cat_id=$_POST["CAT_ID"];
		echo '<option value="">Select Sub Category</option>';
             $query2="Select * from subcategory1  where admin_id='".$admin_id."' && cat_id='".$cat_id."' order by sub_cat_id desc";				  
			$data2=fetch_query($con,$query2);				  
				if(!empty($data2)){
					foreach($data2 as $cdata2){						
                   	echo "<option   value='".$cdata2['sub_cat_id']."'>".$cdata2['sub_cat_name']."</option>";
					}				
				} 
				echo ' <option value="other2" >Other</option>';
	}
	if(isset($_POST["action"]) && strtoupper($_POST["action"])=='GET_SUBCAT2LIST' && is_numeric($_POST["admin_id"])){
		$admin_id=$_POST["admin_id"];
		$cat_id=$_POST["CAT_ID"];
		$cat_sub_id=$_POST["SUBCAT_ID"];
		echo '<option value="">Select Sub Category</option>';
             $query2="Select * from subcategory2  where admin_id='".$admin_id."' && sub_cat_id='".$cat_sub_id
			 ."' && cat_id='".$cat_id."' order by sub_cat_id desc";				  
				 $data2=fetch_query($con,$query2);				  
				if(!empty($data2)){
					foreach($data2 as $cdata2){						
                   	echo "<option value='".$cdata2['sub_cat_id']."'>".$cdata2['sub_cat2_name']."</option>";
					}				
				} 
		echo ' <option value="other3" >Other</option>';
	}	
	?>