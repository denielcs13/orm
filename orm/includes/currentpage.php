<?php
/* $cur_page=$_SERVER["PHP_SELF"];
$cur_pagename=explode('/',$cur_page);	
$page=explode('.php',$cur_pagename[3]); */

/* if($page[0]=='index'){
	$page_title= '<title> Home</title>';	
	}else if($page[0]=='about'){
	$page_title= '<title> About</title>';	
	}else if($page[0]=='review'){
	$page_title= '<title>Review</title>';
	}else if($page[0]=='contact'){
	$page_title= '<title>Contact</title>';
	}else if($page[0]=='gallery'){
	$page_title= '<title>Gallery</title>';
	}else{
	$page_title= '<title>Home</title>';	
	} */
?>
<?php
$exp_uri=explode("/",$_SERVER["REQUEST_URI"]);
$types=$exp_uri[3];
$p_id=$exp_uri[4];	
if($types=='product'){
$p_id=$p_id;
$query_select=fetch_query($con,"select meta_tag,meta_keyword,meta_description from product where company_id='$p_id'");
$meta_tags= '<title>'.$query_select[0]["meta_tag"].'</title><meta name="description" content="'.$query_select[0]["meta_description"].'">
<meta name="keywords" content="'.$query_select[0]["meta_keyword"].'">';
}else if($types =='category-list'){
	$c_id=$p_id;	
	$query_select=fetch_query($con,"select meta_tag,meta_keyword,meta_description from category where category_id='$c_id'");
$meta_tags= '<title>'.$query_select[0]["meta_tag"].'</title><meta name="description" content="'.$query_select[0]["meta_description"].'">
<meta name="keywords" content="'.$query_select[0]["meta_keyword"].'">';
	}
	else if($types =='subcategory'){
		$ss_id=$p_id;	
	$query_select=fetch_query($con,"select meta_tag,meta_keyword,meta_description from subcategory1 where sub_cat_id='$ss_id'");
$meta_tags= '<title>'.$query_select[0]["meta_tag"].'</title><meta name="description" content="'.$query_select[0]["meta_description"].'">
<meta name="keywords" content="'.$query_select[0]["meta_keyword"].'">';
	}
	else if($types =='subcategory-all'){
	$s_id=$p_id;	
	$query_select=fetch_query($con,"select meta_tag,meta_keyword,meta_description from subcategory2 where sub_cat2_id='$s_id'");
$meta_tags= '<title>'.$query_select[0]["meta_tag"].'</title><meta name="description" content="'.$query_select[0]["meta_description"].'">
<meta name="keywords" content="'.$query_select[0]["meta_keyword"].'">';
	}
	else if($types =='complain'){
	$co_id=$p_id;	
	$query_select=fetch_query($con,"select meta_tag,meta_keyword,meta_description from complain where  c_id='$co_id'");
$meta_tags= '<title>'.$query_select[0]["meta_tag"].'</title><meta name="description" content="'.$query_select[0]["meta_description"].'">
<meta name="keywords" content="'.$query_select[0]["meta_keyword"].'">';
	}
	else if($types =='qad'){
		$q_id=$p_id;	
	$query_select=fetch_query($con,"select meta_tag,meta_keyword,meta_description from question where  q_id='$q_id'");
$meta_tags= '<title>'.$query_select[0]["meta_tag"].'</title><meta name="description" content="'.$query_select[0]["meta_description"].'">
<meta name="keywords" content="'.$query_select[0]["meta_keyword"].'">';
	}
	else if($types =='review'){
	$r_id=$p_id;	
	$query_select=fetch_query($con,"select meta_tag,meta_keyword,meta_description from review where  r_id='$r_id'");
$meta_tags= '<title>'.$query_select[0]["meta_tag"].'</title><meta name="description" content="'.$query_select[0]["meta_description"].'">
<meta name="keywords" content="'.$query_select[0]["meta_keyword"].'">';
	}
	else if($types =='comment'){
	$co_id=$p_id;	
	$query_select=fetch_query($con,"select meta_tag,meta_keyword,meta_description from comment where c_id='$co_id'");
$meta_tags= '<title>'.$query_select[0]["meta_tag"].'</title><meta name="description" content="'.$query_select[0]["meta_description"].'">
<meta name="keywords" content="'.$query_select[0]["meta_keyword"].'">';
	}
	
	else if($types =='answer'){
	$a_id=$p_id;	
	$query_select=fetch_query($con,"select meta_tag,meta_keyword,meta_description from answer where  ans_id='$a_id'");
$meta_tags= '<title>'.$query_select[0]["meta_tag"].'</title><meta name="description" content="'.$query_select[0]["meta_description"].'">
<meta name="keywords" content="'.$query_select[0]["meta_keyword"].'">';
		
	}else{
		$meta_tags= '<meta name="description" content="Your description">
<meta name="keywords" content="Your keywords">
<meta name="author" content="Your name">';
	}

?>