<?php session_start();include '../admin/include/config.php'; 

if(isset($_POST['submit']))
{

echo $id=$_POST['id'];
echo $email=$_POST['email'];
		$sql=mysqli_query($con,"select * from user_register");
			$data=mysqli_fetch_assoc($sql);
				$email1=$data['u_email'];
					$password=$data['u_password'];
	
if($email==$email1)
{
@extract($_REQUEST);
$msg_body="
<div style='width:600px; margin:0 auto; background:url($_SERVER[HTTP_HOST]/images/bg.jpg) repeat #c5e8fa;-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px; border:1px solid #6CCFFF; font-family:Arial, Helvetica, sans-serif; font-size:12px;'>
<div style='padding:10px;'>
<div style='width:250px; float:left;'>
</div>
<div><p style='font-size:36px; color:#933; font-weight:500; margin:0; padding:0; '>Magical Moments</p>
<div style='margin-left:320px;'><p style='font-size:17px;color:#858585; margin:0;padding:0;'>Password Details</p></div></div>
<div style='clear:both;'></div>
<div style='background: url($_SERVER[HTTP_HOST]/images/inner.jpg) repeat-x #dcdddf; padding:5px;-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px; border:1px solid #CEEFFF; width:75%; margin-left:70px;'>
<table cellpadding='10' cellspacing='0' width='100%' border='0' >
<tr>
<td width='33%' style='text-align:right; color: #BB3D00; font-weight:bold;' >Password </td>
<td width='67%'>$password
</td></tr>

</table>
</div>
<div style='background:url($_SERVER[HTTP_HOST]/images/line.jpg) repeat-x #c6d4d9;-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px; height:40px; margin-top:20px;'>
<p style='padding:5px; font-size:11px; color:#858585; float:left;' >Visit Site : <span style='color:#999;'><a href='$_SERVER[HTTP_HOST]'>$_SERVER[HTTP_HOST]</a></span></p>
<p style='padding:5px; font-size:11px; color:#858585; float:right; margin-right:5px; font-style:italic;'> <span style='color:#999;'></span></p>
<p style='clear:both;'></p>
</div>
</div>
</div>";

///////////////////////////// ADMIN EMAIL SECTION ////////////////////////////////
$to_admin="singhvishal120012@gmail.com";
$subject_admin="Contact";
$from_admin = "$email";
$header_admin = "MIME-Version: 1.0" . "\r\n";
$header_admin  .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$header_admin .= "From:" . $from_admin;

mail($to_admin,$subject_admin,$msg_body,$header_admin);

?>
<script>
alert("Please check your email. We have sent the password at your registered email address.");
window.location="login.php";
</script>
<?php
}
else
{
?>
<script>
alert("Your email id is wrong");

window.location="login.php";
</script><?php
}
}
?>

<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
  
      
<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
          <h4 class="modal-title" align="center">Recover  Your Password</h4>
        </div>
      
      <!-- Modal content-->
      <div class="modal-content">
          <form  method="post" enctype="multipart/form-data"/>
        <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">
         <div class="col-lg-6"><p style="color:#FF0000">Email Id*</p></div> <div class="col-lg-6"><input type="email" name="email" class="form-control"/></div>
   
   <!-- <div class="col-lg-6"><p style="color:#FF0000">New Password</p></div> <div class="col-lg-6"><input type="password" name="newpassword" class="form-control" id="npass"/></div>
   
        <div class="col-lg-6"><p style="color:#FF0000">Confirm Password</p></div> <div class="col-lg-6"><input type="password" name="confirmpassword" id="cpass" class="form-control"  required onBlur="check();"/></div>-->
        
           <p id="responce" align="left">	Note:- Kindly enter the registered Email id with the system. <br>
Reset password will send system generated email to the registered email address.</p>
         </div>
         </div>
        </div>
        <div class="modal-footer">

      <input type="submit" class="btn btn-theme" name="submit" value="Send Password"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      </div>
      </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>