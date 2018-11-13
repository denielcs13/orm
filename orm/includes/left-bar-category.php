<style>.left-bar-filter{ padding: 15px; font-size: 20px;    color: #949494;   border: 1px solid #33333329;}.left-bar-filter ul{    padding-left: 15px;    margin-top: 10px;}.left-bar-filter ul li{  border-top: 1px solid #8c8c8c4d;    margin: 0px;    font-size: 12px;
    padding: 8px 0px 8px 0px;}.cat_heading i{padding-right: 20px;float: right;     cursor: pointer; }.cat_heading{font-size: 16px;    border-bottom: 1px solid #dedede; margin-top: 15px;}.cat_heading a{color: #949494;padding-left: 10px; }.heading{    border-bottom: 1px solid #96969647;
    margin-bottom: 10px;}.left-bar-filter a.active{color: #00800099;}</style>
<div class=" col-md-3	 wow fadeIn" data-wow-delay="0.1s"  >
<div class="left-bar-filter"><div class="heading"><?php echo  $data_cat[0]['category_name'];  ?></div>
<?php  
$sub_cat="select sub_cat_name,sub_cat_id from subcategory1 where cat_id='$catid'";
$data_cat2=fetch_query($con,$sub_cat);
$cnt=1;
foreach($data_cat2 as $about_data){
	$sb_id=$about_data["sub_cat_id"];
	$sub2list='';
	$sql2=mysqli_query($con, "select *  from subcategory2 where  sub_cat_id = '".$sb_id."' ");
	while($data2=mysqli_fetch_assoc($sql2)){
	 $sub2list .= '<li><a ';
	$sub2list .= ($type==3 && $sub2_catid == $data2["sub_cat2_id"])?'class="active"':''; 
	$sub2list .= ' href="subcategory-all/'.$data2["sub_cat2_id"].'/'.strtolower(str_replace(" ","-",$data2["sub_cat2_name"])).'-'.$cnt.'.html">'.$data2['sub_cat2_name'].'</a></li>';
	}	
	echo '<div class="cat_heading"><a ';
	echo ($type==2 && $sub1_catid == $sb_id)?'class="active"':''; 
	echo ' href="subcategory/'.$sb_id.'/'.strtolower(str_replace(" ","-",$about_data["sub_cat_name"])).'-'.$cnt.'.html">'.$about_data['sub_cat_name'].'</a>';
	echo (!empty($sub2list))?'<i class="fa fa-angle-down" title="Less" data-subid="'.$sb_id.'" data-type="1"></i>':'';
	echo (!empty($sub2list))?'<ul id="show-subcat1-'.$sb_id.'">'.$sub2list.'</ul>':'';
	echo '</div>';
	$cnt++;
	}	
	
 ?>					
	</div></div>
	<script>$("body").on("click",".cat_heading i",function(){
		var thisloc=$(this);
		var subid=thisloc.data('subid');
		var subid_prop=thisloc.attr('data-type');
		if(subid_prop==0){
		thisloc.attr('data-type','1');
		thisloc.attr('title','Less');
		$("#show-subcat1-"+subid).css("display","block");
		thisloc.removeClass('fa-angle-right').addClass('fa-angle-down');
		}else{
			thisloc.attr('data-type','0');
			thisloc.attr('title','More');
			thisloc.removeClass('fa-angle-down').addClass('fa-angle-right');
			$("#show-subcat1-"+subid).css("display","none");
		}
	
	});
	</script>