<?php include 'admin/include/function.php';
include('includes/header.php');
include '../include/function.php';
if(empty($_SESSION["product_view"])){
?>
<script>window.location="index";</script>
<?php
}
$url_redirect=$_SERVER["REQUEST_URI"];
$senddada=explode("writereview",$url_redirect);
echo '<input type="hidden" id="url_redirect" value="product/'.substr($senddada[1],1).'"/>';
$query="select company_name from product where company_id='".$_SESSION["product_view"]."'";
$data=fetch_query($con,$query);
?>


<div class="content indent">

    <!--content-->

 

    <div class="thumb-box4" >

        <div class="container">
		
<h3 class="indent2 wow fadeIn"><center>WRITE YOUR REVIEW on <span style="color:#71a117"><?= $data[0]["company_name"]; ?></span></center></h3>
            <div class="contactForm2">

         <form id="contact-form"  method="post" enctype="multipart/form-data">
<!--action="login.php" -->
                        <div class="contact-form-loader"></div>

                          <fieldset>
<div id="error_review"></div>
                            <label class="name form-div-4">

                            <strong>Enter Title:</strong>
 <input type="hidden" name="action" id="action" value="GET_REVIEW">
 <input type="hidden" name="control_by" id="control_by" value="<?php echo $admin_id; ?>"/>	
 <input type="hidden" name="product_id" value="<?php echo $_SESSION["product_view"]; ?>"/>	
 <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $_SESSION["review_customer_id"]; ?>"/>
 <input type="text" name="r_title" id="r_title" placeholder="" value="" data-constraints="@Required @JustLetters"  required />

                              

                            </label>
							<label class="name form-div-1">

                            <strong>Image:</strong>

                      <input type="file" name="r_image" id="r_image" placeholder="" value="" style="border:1px solid lightgray;height:38px; padding:5px; width:100%;" />

                              

                            </label>
<style>#contact-form label.star{
	width: initial;
}
div.stars {
 
  float: left;
      margin: 0px 10px 30px 10px;
}

input.star { display: none; }

label.star {
      float: right;
    padding-right: 5px;
    color: #444;
    transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}input.star-1:checked ~ label.star:before { color: #F62; }
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}#contact-form label{     margin-bottom: 0px; }</style>

                            <label class="name form-div-2">

                            <strong>Rating:</strong>
							<div class="stars">
							<input class="star star-5" id="star-5" type="radio" name="r_rating" value="5"/>
    <label class="star star-5" for="star-5"></label>
							 <input class="star star-4" id="star-4" type="radio" name="r_rating"value="4" />
    <label class="star star-4" for="star-4"></label>
							<input class="star star-3" id="star-3" type="radio" name="r_rating"value="3" />
    <label class="star star-3" for="star-3"></label>
							<input class="star star-2" id="star-2" type="radio" name="r_rating" value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="r_rating" value="1"/>
    <label class="star star-1" for="star-1"></label>
	
	
	
	 
	
</div><div style="float:left"> <input type="radio" value="0" name="r_rating" >No Rating</div>

                     <!--select name="r_rating" id="r_rating" style="border:1px solid lightgray;height:38px; padding:5px; width:100%; " >
<option></option>
<?php
/* 	$tra=array(1,2,3,4,5);
	for($i=0;$i<=4;$i++)
	{
	print"<option value='$tra[$i]'>".$tra[$i]."</option>";
	} */
?>
	</select--> 

                            </label>

                            <label class="message form-div-4">

                            <strong>Your review:</strong>

  <textarea name="message"  id="message"  placeholder="" data-constraints='@Required @Length(min=20,max=999999)'></textarea>

                             

                            </label>

                            <div>
					 <br>
			<? include 'includes/captcha.php'; ?>
						
<a class="btn btn-success"  name="submit" id="add_data" <?php echo ($_SESSION["review_customer_id"]=='')?'data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" data-type="submit"':''; ?>>Submit</a>
                             

                            </div>

                          </fieldset> 

                     

                    </form>
					<!--form id="contact-login"  method="post" enctype="multipart/form-data">
 <input type="hidden" name="action" id="action" value="GET_LOGIN">
 <input type="hidden" name="control_by" id="control_by" value="<?php  $admin_id; ?>"/>
 </form-->
					

            </div>

        </div>

    </div>

</div>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
	 <style>#contact-form p {
    float: none;
}.ck-editor__editable_inline {    height: 100px !important;}#contact-form label.ck-label,.ck-file-dialog-button{    display: none;}</style>
 <script>

ClassicEditor
        .create( document.querySelector( 'textarea#message' ) ).then( newEditor => {
        editor = newEditor;
    } ) .catch( error => {
            console.error( error );
        } );
		</script>
<script src="js/theme/review.js"></script>

<?php  include('includes/footer.php'); ?>
