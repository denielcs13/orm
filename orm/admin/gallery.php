<?php include('include/config.php'); 
 include('include/top-menu.php'); 
 include('include/header.php'); 

$product_id = $_GET['P_ID'];

if(isset($_POST['submit']))
{
	$dat=date('Y-m-d');
	
	foreach ($_FILES['g_image']['tmp_name'] as $key => $val ) 
	{

        $filename = $_FILES['g_image']['name'][$key];	
        $filesize = $_FILES['g_image']['size'][$key];
        $filetempname = $_FILES['g_image']['tmp_name'][$key];
		if($filesize <= 1048576 )
		{
					move_uploaded_file($filetempname,"images/gallery/".$filename);
					$query="insert into gallery  set g_image  = '".$filename."' , g_product_id = '".$product_id."' , g_admin_id = '".$admin_id."' , g_date = '".$dat."'"; 
					if($con !=='' && $query !=='')
					{
						$insert=mysqli_query($con,$query);	
						if($insert==1)
						{
							echo  $insert;
	
						}
						else{
							echo '<div class="alert alert-danger">Try Again</div>';
							}
					}
						else{
							echo 'failed';
							}
		}
					else{ ?>
						<script>
				alert("please upload Less than  1 MB  image"); window.location="gallery.php";
				</script>
				<?php
					}
	
	}
}


?>




<?php  


$sql=mysqli_query($con,"select * from  product  where company_id='$product_id'");
$data2=mysqli_fetch_assoc($sql);
?>

	
			
  <div class="boxed">
   
    
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
      <div class="pageheader hidden-xs">
        <h3><i class="fa fa-file-text-o"></i><?php  echo $data2['company_name'];  ?></h3>
        <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
          <ol class="breadcrumb">
            <li> <a href="dashbord.php"> Home </a> </li>
            <li class="active"><?php echo $data2['company_name'];  ?></li><li><a  href='company'>Back</a></li>
          </ol>
        </div>
      </div>
      <!--Page content-->
      <!--===================================================-->
    
      <div id="page-content">
        <div class="row">
          <div class="eq-height">
            <div class="col-sm-12 eq-box-sm">
              <div class="panel">
              
              <div class="row"><div class="col-lg-6">
			</div>
			
			<div class="col-lg-10" style="margin-left:30px;"> <h3>Gallery Details</h3>  
  </div>
  </div><br>
  <form method="post"   enctype="multipart/form-data">
		
        <div id="error-msg"></div>
                                                <div class="col-sm-4">
												<input type="hidden" name="product_id" value="<?php  echo $data2['company_id'];  ?>">
                                                     <input type="hidden" name="admin_id" value="<?php  echo $data2['admin_id'];  ?>"/>
													 
															<input type="file" class="form-control" id="category_name" name="g_image[]"  style="border:none;" required  multiple="multiple" accept="image/x-png,image/gif,image/jpeg" />
                                                         
                                                 </div>
															<input type="submit" name="submit" value="Upload" class="btn btn-success" >
														
 </form><br>
	<?php 
				$query="Select * from gallery   where g_product_id = '$product_id'  order by g_id desc";
		  
				$all_data=mysqli_query($con,$query);
		if((mysqli_num_rows($all_data))>0)
				{
				?>
				<div class="thumb-box5">

        <div class="container" >

          
            <div class="row" >
<?php  while($about_data = mysqli_fetch_array($all_data)){
					?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeIn" id="gal_tr" >

                    <div class="thumb-pad5 maxheight">

                        <div class="thumbnail" style="border:none;">

                            <figure><img src="images/gallery/<?php echo $about_data['g_image']; ?> "   height="230px" width="300px"alt=""></figure>

                            <div class="caption">


                           <a class="btn btn-large btn-block btn-danger"  id="delete"   data-id="<?php echo $about_data['g_id']; ?>" data-admin_id="<?php echo $about_data['g_admin_id']; ?>" >Delete</a> 

                            </div>
							
                        </div>

                    </div>

                </div><?php }
				}
else{
	echo '<div class="alert alert-danger">No Data Available.</div>';	
}
	?>
				</div>
 
                    </div>

                </div>
		
 
														   
					
                <!--===================================================-->
                <!--End Block Styled Form -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--===================================================-->
      <!--End page content-->
    </div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->
  </div>
 

<?php include('include/footer.php'); ?>
<script>	
	 a_url='ajax/gallery.php';
$("body").on("click","#delete",function(){	   
		   var thisvalue=$(this).parents('#gal_tr');
		   var a_id=$(this).data('id');
		   var admin_id=$(this).data('admin_id');
		   var error_id=$("#error-msg");
		   var postdata="action=DELETE_DATA"+"&g_id="+a_id+"&admin_id="+admin_id;
		   var checkcon=confirm("Are you sure want to delete");
		   if(checkcon){
			delete_data(a_url,postdata,error_id,thisvalue);
		   }
			
	     });
		 </script>
		 <script src="js/myjs/function.js" ></script>

