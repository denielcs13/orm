<div  class="col-md-12 " style="background-color:#ffffff; width:100%;  margin-top:100px">
			<div class="col-md-12"> <h4>Product Gallery</h4> </div>
		<?php $gallery=mysqli_query($con,"select * from gallery where g_product_id='$id'");
				while($gdata=mysqli_fetch_assoc($gallery)){
		?>		

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="thumb-pad5 maxheight">
                        <div class="thumbnail">
                            <figure><img src="admin/images/gallery/<?php echo $gdata['g_image']; ?>"  style="height:200px; width:250px;"alt=""></figure>
                        </div>
                    </div>
            </div>
		<?php } ?>  </div>