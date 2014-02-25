<?
  $string=$_GET['string'];
  $countcheck= Users::Model()->count("encpassword='$string'");

  if($countcheck<=0)
  { 
       $userid="";
	  ?>
           <div align="center"> <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page/ Your Link has been expired,Please Click the forgot password to genrate a new link</span></div>
            <meta http-equiv="refresh" content="3;url='../../../../index.php'" />
  <? exit (); } else {
    $userid=getuseridDecrpt($string);
  }
  
    
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Change Password</title>
    	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqueryvalidate.js"></script>
		
		 
<script> 
 function validatePassword(){	
  var validator = $("#loginForm").validate({ 
  rules: { 
  cpassword:{ equalTo: "#password" }	
  },
	 
  messages: { password :"Enter Password", cpassword :"Enter Confirm Password Same as Password" } });
   } </script>
</head> 
<body> 
<style type="text/css">

form label.error{
    font:20px Tahoma,sans-serif;
    color:#FF0000;
    margin-left:5px;
    display:inline;
}
</style>
<div class="container" >
    <form action="" method="post" id="loginForm" name="loginForm">
		  
    	   <div class="style_form">
              <label for="fname">    <input type="password" name="password" id="password" pattern=".{5,}" title="Minmimum 5 letters or numbers" required  class="input-large" />   <font color="#FF0000">*</font> 	
New Password</label>
         </div>
		    <div class="style_form">
              <label for="fname">    <input type="password" name="cpassword" id="cpassword" pattern=".{5,}" title="Minmimum 5 letters or numbers" required  class="input-large" />
			   <input type="hidden" name="userid" value="<? print $userid;?>" />   <font color="#FF0000">*</font>Confirm Password</label>
         </div>
		    
		  
         <div class="form-actions">
		  
			<input type="submit" name="changepassword" value="Update" class="btn btn-primary" onClick="validatePassword();" />
			<input type="reset" value="Reset"  class="btn"/>
			</div> 
			
      </form>
</div>	  
<div style="margin-bottom:200px;"></div>
	</body> </html> 