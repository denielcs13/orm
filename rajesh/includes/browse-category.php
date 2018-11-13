<style>
.category-listing div ul.main-categories>li:hover a, .category-listing div ul.main-categories>li:hover a span, ul.main-categories>li.hoverclass a, .hoverclass a span {
    text-decoration: none;    font-weight: bold;    background: gary none repeat scroll 0 0;
    color: gray;    transition: opacity linear 1s;}
.sub-cat-div {   border: 1px solid #dfdfdf;    border-left: 0;    position: absolute;    left: 20%;    top: 0;
    display: none;   width: 80%;    padding: 5px;}
li.hoverclass{margin-top:5px;  padding:5px;}
ul li, ol li {   list-style: outside none;    margin: 10px 0 10px 10px;    line-height: 1.4;    font-size: 15px;    font-weight: 400;    color: gray;}
#div-show-category{ position: absolute;z-index: 99;top: 15%;width: 90%;margin-left: 5%;display:none; background-color:#EDF1F4;}
ul#browse-subcategory{background-color:gray; padding:5px;width: 20%;}.UL_ID{color:gray; font-size:12px;}
</style>

<div id="div-show-category"> 
<ul class="main-categories" id="browse-subcategory" > 
<?php
$catId=array();
$c_count=1;
$sql=mysqli_query($con, "select *  from category where status=1 order by trim(category_name) asc");
while($data=mysqli_fetch_assoc($sql)){
echo '<li class="hoverclass">
<a href="category/'.$data["category_id"].'/'.strtolower(str_replace(" ","-",$data["category_name"])).'-'.$c_count++.'.html" data-cat_id="'.$data["category_id"].'"  style="color:white; font-size:14px;" >'.strtoupper($data["category_name"]).'</a></li>';
$catId[]=	$data["category_id"];
}
?>
</ul> 
<?php  
$cnt=0;
	foreach($catId as $category_id){
	echo '<div class="sub-cat-div" id="cat_id-'.$category_id.'"';
	echo ($cnt==0)?'style="display:block"':'';
	echo '>';
	 $sql1=mysqli_query($con,"select *  from subcategory1 where cat_id='".$category_id."'");
while($data1=mysqli_fetch_assoc($sql1)){
	echo '<div class="col-md-3"><ul><li><a href="subcategory/'.$data1["sub_cat_id"].'/'.strtolower(str_replace(" ","-",$data1["sub_cat_name"])).'-'.$cnt.'.html"  style="color:green; font-size:14px;">'.strtoupper($data1['sub_cat_name']).'</a></li>';
	$sql2=mysqli_query($con, "select *  from subcategory2 where  sub_cat_id = '".$data1['sub_cat_id']."' && cat_id='".$category_id."'");
	while($data2=mysqli_fetch_assoc($sql2)){
	echo '<li class="UL_ID"><a href="subcategory-all/'.$data2["sub_cat2_id"].'/'.strtolower(str_replace(" ","-",$data2["sub_cat2_name"])).'-'.$cnt.'.html">'.strtoupper($data2['sub_cat2_name']).'</a></li>';
} 
echo '</ul></div>'; 
}
echo '</div>';
$cnt++;
} 
?>
 </div>
<script>
$("#browse-category").mouseover(function(){
	$("#div-show-category").css("display","block");
});
$("#div-show-category").mouseleave(function(){
	$("#div-show-category").css("display","none");
});
$("body").on("mouseover",".hoverclass a",function(){
	var cat_id=$(this).data("cat_id");
	$(".sub-cat-div").css("display","none");
	$("#cat_id-"+cat_id).css("display","block");
});
 
</script>



