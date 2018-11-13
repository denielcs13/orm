<?php include('includes/header.php'); 
if(empty($_GET["token"])){
?>
<script>window.location="index";</script>
<?php
}
include 'admin/include/function.php';
$cate_name=str_replace("-"," ",$_GET["token"]);
?>
<style>
td
{
	width:220px;
}
</style>

<div class="content" style="background-color:#FAFAFA;"> 
    <div class="container"  style=" padding-left:5%;">
        <div class="row">
 

<div style="background-color:#ffffff; height:65%; width:95%; border:1px solid lightgray; padding:10px;" >
<div class="thumb-box3 ">
            <div class="container">
                <h3 class="indent wow fadeIn"><center><?= $cate_name; ?></center></h3>
                <div class="row  ">
				
  <?php 
  $category=fetch_query($con,"select category_id from category where admin_id='".$admin_id."' && category_name='$cate_name'");
$category_id=$category[0]["category_id"];
$query="select * from product where admin_id='".$admin_id."' && category='$category_id'";
$data=fetch_query($con,$query);
	if(!empty($data))
	{
		foreach($data as $all_data)
		{
			$image=(file_exists('admin/images/company/'.$all_data['product_image']) && !empty($all_data['product_image']))?'admin/images/company/'.$all_data['product_image']:'admin/img/defaultimage.png';
    ?>
	
	  <div class="col-md-3 hidden-sm col-xs-12">
                        <div class="thumb-pad3 ">
                            <div class="thumbnail">
	<div class="abc">
	
			<a href="product-view.php?Id=<?php echo $all_data['company_id']; ?>">
			<div style="height:155; width:290; border-radius:0px;  padding:0px;">
              <figure><img src="<?=$image;?>"  height="150" width="100" alt=""></figure>
			  </div>
			  <div>
			  <br>
			 <h4><?php echo $all_data['company_name']; ?></h4></a>
			 Launch Date:&nbsp;  <span ><?php echo date("d/M/Y",strtotime($all_data['p_date']));?> </span>
			  </div>
			 </div>
                                </div>
						    </div>
					  </div>
				      
		<?php
	
		}
	}
		?>


  </div>
 </div>        

 </div>
			   </div></div>
		
<?php include('includes/footer.php'); ?>