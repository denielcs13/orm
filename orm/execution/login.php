<?php session_start();include '../admin/include/config.php'; 
include '../admin/include/function.php';

if(isset($_POST["action"]) && strtoupper($_POST["action"])=='INSERT' && is_numeric($_POST["control_by"])){
		$admin_id=$_POST["control_by"];
		$dat=date("Y-m-d");
		$name = mysqli_real_escape_string($con,$_POST['user_name']);
		$mobile = $_POST['user_mobile'];
		$email = $_POST['user_email'];	
		$password = md5($_POST['user_password']);	
//u_phone  = '".$mobile."' || 		
		$query="Select * from user_register where u_email = '".$email."'";
		$data=fetch_query($con,$query);
		if(empty($data)){		
			$query="insert into user_register set u_name='".$name."',u_phone='".$mobile."',u_email='".$email."',u_password='".$password."',u_date='".$dat."',admin_id  = '".$admin_id."'";
			$insert=insert_query($con,$query);	
			if($insert==1){ 
			echo $_SESSION['review_customer_id']=mysqli_insert_id($con);
			}else{
				echo '<div class="alert alert-danger">Sorry Unable To Register </div>';
			}
		/* }else if($data[0]["u_phone"] ==$mobile){
			echo '<div class="alert alert-danger">Mobile Number is Already Used</div>'; */	
		}else if($data[0]["u_email"] ==$email){
			echo '<div class="alert alert-danger">Email ID  is Already Used</div>';	
		}else{
			echo '<div class="alert alert-danger"> Email ID Already registered</div>';
	}		
			
}                  	
if(isset($_POST["action"]) && strtoupper($_POST["action"])=='GET_LOGIN'  && is_numeric($_POST["control_by"])){
$admin_id=$_POST["control_by"];	
$requesttype=$_POST["requesttype"];	
$requesttype_id=$_POST["requesttype_id"];
echo ' <div class="modal-header  navbar-content model-nav clearfix">
  <button type="button" class="close" data-dismiss="modal" onClick="closepopup()" data-backdrop="static" data-keyboard="false">&times;</button>
</div> <div class="modal-body"><div class="panel-body">

<form method="post" id="form-insert" enctype="multipart/form-data" >
<input type="hidden" name="action" value="insert">
<input type="hidden" id="requesttype" value="'.$requesttype.'">
 <input type="hidden" id="requesttype_id" value="'.$requesttype_id.'">
<input type="hidden" name="control_by" value="'.$admin_id.'"/>	
<div class="row">

	<div class="col-lg-6 col-md-12 col-sm-4">
	
	<h3>REGISTER AN ACCOUNT</h3>
<div id="error-msg"></div>
	<label class="control-label">Name*</label>
		<input type="text" name="user_name" id="user_name" placeholder="Enter Your  Name" class="form-control"  style="background-color:white; border:1px solid  #C7C7C7;" size="20" required>
		
		
	
   <label class="control-label">Mobile No.*</label>
	  <input type="number" pattern="[789][0-9]{9}" name="user_mobile" id="user_mobile" class="form-control" placeholder="Enter Your  Mobile No." style="background-color:white; border:1px solid  #C7C7C7;" maxlength="10"  required > 
	  
	  <label class="control-label">Email Id*</label>
	  <input type="email" name="user_email" id="user_email" class="form-control"  size="20" style="background-color:white; border:1px solid  #C7C7C7;" placeholder="Enter Your  Email Id" required >
	
	<label class="control-label">Password*</label>
		<input type="password" name="user_password" id="user_password" class="form-control"  style="background-color:white; border:1px solid  #C7C7C7;"  placeholder="Enter Your  Password" required >
	  
	<p> 
   <br>  
   <input class="btn btn-success" id="update_register" name="u_submit" type="button" value="Register"></p>
	  
  
  </form>
	</div>
	
	<div class="col-lg-6 col-md-10 col-sm-8">
	 <h3>Log In</h3>
  <div class="titleline"  id="titleline"> </div>
  
  <span style="color:black;" class="forget">
  <form name="loginform3" id="loginform3"  method="post">
	<p>
	  <label class="control-label">User email or Mobile</label>
	  <input type="hidden" name="btn_action" id="btn_action" value="login">
	  <input type="hidden" id="requesttype_login" value="'.$requesttype.'">
	  <input type="hidden" id="requesttype_id_login" value="'.$requesttype_id.'">
	  <input type="text" name="u_email" id="user_login3" class="form-control" style="background-color:white; border:1px solid  #C7C7C7;"   placeholder="Enter Email Id"  required>
	</p>
	<p>
	  <label class="control-label">Password</label>
	  <input type="password" name="u_password" id="user_pass3" class="form-control" size="20"  style="background-color:white; border:1px solid  #C7C7C7;"   placeholder="Enter Your  Password" required>
	</p>
	<p>
	  <input class="btn btn-success" id="login" name="login" type="button" value="Log In" > <a id="change2" style="cursor:pointer;" title="Forget Password">    /    Forget Password</a>
  
	  
	</p>
  </form>
 </span>
  
  <span style="display:none;" class="forget">	
   <form method="post" id="forgetpassword">
         <input type="hidden" name="fp_action" id="fp_action" value="FORGETPASSWORD">
		 <input type="hidden" name="control_by" value="'.$admin_id.'"/>
	  <input type="hidden" id="requesttype_login" value="'.$requesttype.'">
	  <input type="hidden" id="requesttype_id_login" value="'.$requesttype_id.'">
         <p><label class="control-label"  style="color:black;">Email Id*</label></p> 
		 <p><input type="email" name="email" id="forget_email" class="form-control" style="background-color:white; border:1px solid  #C7C7C7;"></p>
		<p><a class="btn btn-success" id="popup_forgetpassword" >Send Password</a><a	 id="change" style="cursor:pointer;" title="LOGIN">   /   LOGIN</a></p>
		<p style="color:green;" align="left">	Note:- Kindly enter the registered Email id with the system. <br>
Reset password will send system generated email to the registered email address.</p>
      
   </form>
     </span>
  
  <br><br>
  
  
	</div></div>
</div>
</div>

</div></div>
<div class="modal-footer">
<input type="button"  value="Close" class="btn btn-danger" data-dismiss = "modal">
</div>  ';

}
if(isset($_POST["btn_action"]) && strtoupper($_POST["btn_action"])=='LOGIN'){		
$uemail=$_POST["u_email"];
$upwd=$_POST["u_password"];
$encupwd = md5($upwd);		
$query = "SELECT * FROM user_register where u_email ='$uemail'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if(($uemail == $row["u_email"]) && ($encupwd == $row["u_password"])){
	echo $_SESSION['review_customer_id']=$row['u_id'];
	//header("location:../index.php");
}else{
	echo'<div class="alert alert-danger">Email Id Or Password Incorrect</div>';
}
}

if(isset($_POST["fp_action"]) && strtoupper($_POST["fp_action"])=='FORGETPASSWORD'  && is_numeric($_POST["control_by"])){
	 $email=$_POST['email'];
	 $admin_id=$_POST['control_by'];
		$sql=mysqli_query($con,"select * from user_register where u_email='".$email."' && admin_id='".$admin_id."'");
			$data=mysqli_fetch_assoc($sql);
				$email1=$data['u_email'];
				$password=$data['u_password'];
				$name=$data['u_name'];
				$mobile=$data['u_phone'];
	
if($email==$email1)
{
$password='#0'.substr($email1,3,6).'B'.substr($name,0,3).rand(10,9999).'N'.substr($mobile,5,8);
$update=mysqli_query($con,"update user_register set where u_password='".md5($password)."' && admin_id='".$admin_id."'");
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
$to_admin="singhvishal@gmail.com";
$subject_admin="Contact";
$from_admin = "$email";
$header_admin = "MIME-Version: 1.0" . "\r\n";
$header_admin  .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$header_admin .= "From:" . $from_admin;

if(mail($to_admin,$subject_admin,$msg_body,$header_admin)){
	
	echo '<div class="alert alert-success">Please check your email. We have sent the password at your registered email address.</div>';
}	else{
	echo '<div class="alert alert-danger">Mail is not sended Successfully.</div>';
}
}else{
	echo '<div class="alert alert-danger">Wrong Email ID .</div>';
}
}
?>