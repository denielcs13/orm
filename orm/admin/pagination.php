<?php

 $limit=3;
				 if(isset($_GET['page']))
				 {
					 $page=$_GET['page'];
					 }
					 else
					 {
						$page=1; 
					 } 
					 $start_form=($page-1)*$limit;
	$sql=mysqli_query($con,"select * from category LIMIT ".$start_form.",".$limit."");
		
		while($data=mysqli_fetch_assoc($sql))
		{
echo $data["category_name"];
echo "<br>";
		}	
?>

<?php		  
		
      
	  $sql1=mysqli_query($con,"select count(category_id) as pige from category");

$data1=mysqli_fetch_assoc($sql1);
 $total_records=$data1['pige'];
 $total_pages=ceil($total_records/$limit);
//$pageLink="<div class='row' >";
for($i=1; $i<=$total_pages; $i++)
{
echo "<a href='catpage.php?page=".$i."' style='color:red;'>".$i."</a>";
}

 
   			 ?>   
       