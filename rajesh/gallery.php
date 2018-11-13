
<?php  
include('includes/header.php'); 
include 'admin/include/function.php';
//unset($_SESSION["product_view"]);
?>
 
 <div class="content indent">
    <!--content-->
    <div class="thumb-box8">
        <div class="container">
            <h3 class="indent2">Photo Gallery</h3>
            <div class="row">
			
			
                
		
		
	
               
                <div class="clearfix"></div>
				<?php $query="select * from product where admin_id='".$admin_id."' && status='1'  order by company_id desc";
	$data=fetch_query($con,$query);
	if(!empty($data))
	{
		$cnt=1;
		foreach($data as $all_data){
			if($cnt==1){
				echo '<div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="thumb-pad8 wow fadeIn">';
					$height='467px';
					$width='770px';
			}else{
				echo '<div class="col-lg-4 col-md-2 col-sm-2">
                    <div class="thumb-pad9 wow fadeIn" >';
					$height='217px';
					$width='370px';
			}
		?>
                
                        <div class="thumbnail">
                            <figure> 
                                <span><?php echo $all_data['company_name'] ?></span>
								
                               <a href="admin/images/company/<?php echo $all_data['product_image'] ?>">
							   <div style=" border-radius:0px;  padding:0px;">
							   <img src="admin/images/company/<?php echo $all_data['product_image'] ?>" height="<?= $height;?>" width="<?= $width; ?>" alt=""  ></div></a>
							  
                            </figure>
                        </div>
                    </div>
                </div>
                
				<?php $cnt++;
				}} ?>	
               
			   
                							               
            </div>
        </div>
    </div>
</div><br>
<!--footer-->
<?php  include('includes/footer.php'); ?>