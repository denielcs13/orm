<?php 
include '../admin/include/config.php';
extract($_POST);
if(isset( $search_data)){
	$sql_product=mysqli_query($con,"select company_id,company_name,category_name from product left outer join category on product.category=category.category_id where company_name LIKE '%".$search_data."%' || title  LIKE '%".$search_data."%' order by company_name asc");
	while($data_product=mysqli_fetch_assoc($sql_product)){
		echo '<div id="product" data-location="http://demo.c2shub.com/rajesh/rajesh/product/'.$data_product["company_id"].'/'.strtolower(str_replace(" ","-",$data_product["company_name"])).'-1.html">'.strtoupper($data_product["company_name"]).'<br/><b>'.strtoupper($data_product["category_name"]).'</b></div>';
	}
	echo '<div id="product" data-location="http://demo.c2shub.com/rajesh/rajesh/search?data='.$search_data.'"><b>See More Results : >> '.$search_data.'</b></div>';
}
?> 