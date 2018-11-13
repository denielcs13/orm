<?php

if(isset($_POST['submit']))
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
		echo "<script>
		alert('Your Enquiry sent successfully');
		</script>";
		}
		else { 
		echo"<script>alert('Your Enquiry are not SENT Please Try Again');</script>";
		
		}
		echo"<script>window.location='../product-view';</script>";
	
	
}


?>