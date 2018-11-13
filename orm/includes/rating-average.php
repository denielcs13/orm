<?php
$one=0;
$two=0;
$three=0;
$four=0;
$five=0;$averagerating=0;
foreach($data2 as $rate){
$one +=($rate["r_rating"]==1)?1:0;
$two +=($rate["r_rating"]==2)?1:0;
$three +=($rate["r_rating"]==3)?1:0;
$four +=($rate["r_rating"]==4)?1:0;
$five +=($rate["r_rating"]==5)?1:0;
}
$total_vote=($one+$two+$three+$four+$five);
if($total_vote>0){
$one1=(1*$one);
$two1=(2*$two);
$three1=(3*$three);
$four1=(4*$four);
$five1=(5*$five);
$ave=($one1+$two1+$three1+$four1+$five1)/$total_vote;
$averagerating= round($ave,2);
list($whole, $decimal) = explode('.', $averagerating);
$star_rating='';
for($i=1;$i<=$whole;$i++){
$star_rating .= '<i class="fa fa-star"></i> ';
}
$decimal1='.'.$decimal;	
if($decimal1>='.50'){
$star_rating .=  '<i class="fa fa-star-half"></i> ';	
$whole=$whole+1;
}for($i=1;$i<=(5-$whole);$i++){
$star_rating .= '<i class="fa fa-star-o"></i> ';	
}
$average_rating= $averagerating.'<i class="fa fa-star"></i>';
$rating_percent=(round($ave,2)/5 * 100);
}else {
	$average_rating= '<i class="fa fa-star"></i>';
}
?>