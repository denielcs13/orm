<?php
if(isset($_POST['action']) && $_POST['action']=='SUBMIT')
{
        $name=$_POST['name'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$sub=$_POST['subject'];
		$msg=$_POST['description'];
		
		$subject = "Enquiry from ".$name;
		$to_email = "shwetachaurasiya9@gmail.com";
		$to_fullname = "Shweta";
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "To: Shweta <$to_email>\r\n";
		$headers .= "From: $name <$email>\r\n";
		$message = "<html lang=\"en\" xml:lang=\"en\">\r\n
		<head>\r\n
		<title>Hello Test</title>\r\n
		</head>\r\n
		<body>\r\n
		<p></p>\r\n
		<p style=\"color: #00CC66; font-weight:600; font-style: italic; font-size:14px; float:left; margin-left:7px;\">
		You have received a New Enquiry Mail from ".$email."<br>
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
		echo '<div class="alert alert-success">Thank You, Your message has been send.</div>';
		}
		else { 
		echo '<div class="alert alert-danger">Please Send Again</div>';
		
		}
	
	
}
if(isset($_POST['action']) && $_POST['action']=='Contactform')
{
	 echo '<div class="modal-header  navbar-content model-nav clearfix">
          <button type="button" class="close" data-dismiss="modal" onClick="closepopup()" data-backdrop="static" data-keyboard="false">&times;</button>
          <center><h4 class="modal-title">Contact Us</h4></center>
        </div> <div class="modal-body"><div class="panel-body">
		<div id="error-contact"></div>
<form method="post" id="enquiry-form">
<div class="form-group col-md-6">
  <label >Name *</label>
  <input type="hidden" value="SUBMIT" name="action" >
  <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
</div>
<div class="form-group  col-md-6">
  <label >Email *</label>
  <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
</div>
<div class="form-group  col-md-6">
  <label >Mobile No. *</label>
  <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile" required>
</div>

<div class="form-group  col-md-6">
  <label >Subject *</label>
  <input type="text" class="form-control" id="subject" placeholder="Enter  Subject" name="subject" required>
</div>
<div class="form-group  col-md-12">
  <label >Message *</label>
  <textarea  class="form-control" id="messages" placeholder="Message" name="description" required></textarea>
</div>

			</div>
			</div>
        <div class="modal-footer" style="clear: both;">
		<button type="button" id="submit-contact" class="btn btn-success" name="submit">Send</button>
		<input type="button"  value="Close" class="btn btn-danger" data-dismiss = "modal" />
		
			
       
    
        </div>
		</form>';

}
?>