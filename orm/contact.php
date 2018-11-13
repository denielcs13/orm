
<?php  include('includes/header.php'); ?>


<?php

if(isset($_POST['submit']))
{
        $name=$_POST['name'];
		$email=$_POST['email'];
		$mobile=$_POST['phone'];
		$sub=$_POST['subj'];
		$msg=$_POST['message'];
		
		$subject = "Enquiry from singhvishal120012@gmail.com";
		$to_email = "singhvishal120012@gmail.com";
		$to_fullname = "vishal";
		$from_email = $email;
		$from_fullname = $name;
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		// Additional headers
		// This might look redundant but some services REALLY favor it being there.
		$headers .= "To: $to_fullname <$to_email>\r\n";
		$headers .= "From: $from_fullname <$from_email>\r\n";
		$message = "<html lang=\"en\" xml:lang=\"en\">\r\n
		<head>\r\n
		<title>Hello Test</title>\r\n
		</head>\r\n
		<body>\r\n
		<p></p>\r\n
		<p style=\"color: #00CC66; font-weight:600; font-style: italic; font-size:14px; float:left; margin-left:7px;\">
		You have received a New Enquiry Mail from ".$from_email."<br>
		<br />
		".
		"Name : ".$name."<br>
		Mobile : ".$mobile."<br>
		Email : ".$email."<br>
		Subject: ".$sub."<br>
		Message : ".$msg."<br>
		</p>\r\n
		</body>\r\n
		</html>";
		if (mail($to_email, $subject, $message, $headers)) { 
		echo"<script>
		alert('Your Enquiry sent successfully');
		window.location.href='contact.php';
		</script>";
		}
		else { 
		echo"<script>alert('Your Enquiry are not SENt Please Try Again');</script>";
		
		}
	
	
}


?>


<div class="content indent">
    <div class="container">
        <h3 class="indent2">Map Location</h3>
        <section class="content_map">
              <div class="google-map-api"> 
                <div id="map-canvas" class="gmap">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.838285280489!2d77.3538941143442!3d28.57461839345221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce59619ba73ab%3A0x376870bf6296819a!2sWave+City+Center+Noida!5e0!3m2!1sen!2sin!4v1529561477447" width="1170" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>
				
				
				</div> 
              </div> 
        </section>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
<h3 >Contact Information</h3>
                <div class="info">
                    <h4>8901 Marmora Road,<br>Glasgow, D04 89GR.</h4>
                    <p><span>Freephone:</span>+1 800 559 6580</p>
                    <p><span>Telephone:</span>+1 800 603 6035</p>
                    <p><span>FAX:</span>+1 800 889 9898</p>
                    <p><span>E-mail:</span><a href="#">mail@demolink.org</a></p>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
  <h3 >Quick Enquiry</h3>
  <div id="error-msg"></div>
                <form id="contact-form" method="post" >
                      <div class="contact-form-loader"></div>
                      <fieldset>
                        <label class="name form-div-1">
                          <input type="text" name="name" placeholder="Name*:" value="" data-constraints="@Required @JustLetters"  />
                          <span class="empty-message">*This field is required.</span>
                          <span class="error-message">*This is not a valid name.</span>
                        </label>
                        <label class="email form-div-2">
                          <input type="text" name="email" placeholder="E-mail*:" value="" data-constraints="@Required @Email" />
                          <span class="empty-message">*This field is required.</span>
                          <span class="error-message">*This is not a valid email.</span>
                        </label>
                        <label class="phone form-div-3">
                          <input type="text" name="phone" placeholder="Telephone:" value="" data-constraints="@JustNumbers" />
                          <span class="empty-message">*This field is required.</span>
                          <span class="error-message">*This is not a valid phone.</span>
                        </label>

						<label class="subject form-div-5">

                          <input type="text" name="subj" placeholder="Subject*:" value="" data-constraints="@Required @JustLetters"  />

                          <span class="empty-message">*This field is required.</span>

                          <span class="error-message">*This is not a valid name.</span>

                        </label>
                        <label class="message form-div-4">
          <textarea name="message" placeholder="Comment*:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                          <span class="empty-message">*This field is required.</span>
                          <span class="error-message">*The message is too short.</span>
                        </label>
                        <!-- <label class="recaptcha"><span class="empty-message">*This field is required.</span></label> -->
                        <div>
          <input class="submit btn btn-theme" name="submit" type="submit" value="SUBMIT" style="background-color:red; width:100px;">
                          
                        </div>
                      </fieldset> 
                      
                </form>
            </div>
        </div>
    </div>
</div>
<!--footer--><?php  include('includes/footer.php'); ?>