<?php include '../include/config.php';
include '../include/function.php';
if(isset($_GET["state"])){
	$select_state=$val["select_state"];
	$state=fetch_query($con,"select * from state where country_id='".$_GET["state"]."' order by state_name asc");
	foreach($state as $val){
	echo '<option value="'.$val["id"].'"';
	echo ($select_state==$val['id'])?' selected':'';
	echo '>'.strtoupper($val["state_name"]).'</option>';	
	}
	
}
if(isset($_GET["city"])){
	$select_city=$val["select_city"];
	$city=fetch_query($con,"select * from city where state_id='".$_GET["city"]."' order by city_name asc");
	foreach($city as $val){
	echo '<option value="'.$val["id"].'"';
	echo ($select_city==$val['id'])?' selected':'';
	echo '>'.strtoupper($val["city_name"]).'</option>';	
	}
	echo '<option value="other4" >Other</option>';
}
?>