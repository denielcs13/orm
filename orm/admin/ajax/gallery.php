
<?php include('../include/config.php');  
include ('../include/function.php');
?>


<?php
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='DELETE_DATA' && is_numeric($_POST["admin_id"])){
	$id=	$_POST["g_id"];
	$admin_id=	$_POST["admin_id"];
	
	
	if(!empty($id) && !empty($admin_id)){
	$query="delete from gallery where g_id='".$id."'  && g_admin_id='".$admin_id."'";
	$delete=delete_query($con,$query);
	if($delete==1){
		echo $delete;
	}else{
		echo '<div class="alert alert-danger">Sorry Unable To Delete Data </div>';
	}	
	}else{
	echo '<div class="alert alert-danger">Sorry Unable To Delete </div>';	
	}
}
	
/* if(isset($_REQUEST['delete_record']))
{
	echo $id = $_REQUEST['Id'];

$delete_sql = mysqli_query($con,"delete from gallery where  g_id=$id");	
	if($delete_sql)
	{ 
	echo "success";
echo '<script>window.location="gallery?P_ID='.$product_id .'";</script>';
	} else {
	    echo "<div class='alert alert-danger'>Sorry Unable To Delete </div>";
	    
	}
} */

?>
 