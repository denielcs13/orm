<?php 
include '../admin/include/config.php';

$r_id=$_GET['Id'];
echo $r_id;

?>
  <?php
extract($_POST);
if(isset($add))
{
		$upda="UPDATE `review` SET `r_title` = '$r_title', `r_rating` = '$r_rating',  `r_description` = '$r_description' WHERE   `r_id` = '$r_id'";
				$query=mysqli_query($con,$upda);
					if($query){
						echo '<div class="alert alert-success">update </div>';
								}
								else{
										echo '<div class="alert alert-danger">Sorry Unable To Update </div>';
									}
}
?>

		
	<?php
	 $sql=mysqli_query($con,"select * from review where  r_id='$r_id'");
	
	 $data=mysqli_fetch_assoc($sql);
	 ?>
		
	<div class="modal-header  navbar-content model-nav clearfix" style="background-color:#158daf; ">
          <button type="button" class="close" data-dismiss="modal" onClick="closepopup()" data-backdrop="static" data-keyboard="false">&times;</button>
          <h2 style="color:white;"><center>Update Review</center></h2>
        </div> <div class="modal-body"><div class="panel-body">
		<div id="error-msg"></div>
		<form id="contact-form"  method="post" enctype="multipart/form-data">
				<div class="contact-form-loader"></div>
					<fieldset>
						<div id="error_review"></div>
                            <label class="name form-div-4">
								<strong>Enter Title:</strong>
									<input type="text" name="r_title" id="r_title" placeholder="" value="<?php echo $data['r_title']; ?>" style="background-color:white; border:1px solid gray;"  required />
							</label>

                            <label class="name form-div-4">
								<strong>Rating:</strong>
									<select name="r_rating" id="r_rating" style="border:1px solid gray;height:38px; padding:5px; width:100%; " >
										<option><?php echo $data['r_rating']; ?></option>
											<?php
											$tra=array(1,2,3,4,5);
												for($i=0;$i<=4;$i++)
													{
														print"<option value='".$tra[$i]."'>".$tra[$i]."</option>";
													}
										?>
								</select> 
							</label>

                            <label class="message form-div-4">
								<strong>Your review:</strong>
									<textarea name="r_description"  id="r_description"  placeholder=""  style="background-color:white; border:1px solid gray; height:100px;" ><?php echo $data['r_description']; ?></textarea>
							</label>
       
						<input type="submit" name="add" value="Update" class="btn btn-success" >
       </form>
			</fieldset> 
					
        <div class="modal-footer">
				<input type="button"  value="Close" class="btn btn-danger" data-dismiss = "modal">
		</div>  