<?php
//$this->pageTitle=Yii::app()->name;
//echo homepagecontent('1');
$user_id=Yii::app()->user->id;
if($user_id!='') {
$this->redirect(array('questionProject/admin'));
} else {
 ?>
 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqueryvalidate.js"></script>
 <script type="text/javascript">
            $(document).ready(function() {  
			   $("#email").change(function() { 
                    var email = $("#email").val();
                    if(email !=' ')
                    {
                        $("#availability_email").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loader.gif" align="absmiddle"> Checking availability...');
                        $.ajax({ 
                            type: "POST",
                            url: "<?php echo Yii::app()->createUrl("site/checkemail"); ?>",
                            data: {email: email}, 
                            success: function(server_response){

                                    if(server_response == '0')
                                    {
                                        $("#availability_email").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/available.png" align="absmiddle"> <font color="Green"> Email Id Available </font>  ');
                                    }
                                    else  if(server_response == '1')
                                    {
                                        $("#availability_email").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/not_available.png" align="absmiddle"> <font color="red">Sorry Email Id already taken, Please try another Email Id</font>');
                                    }
                            }
                        });
                    }
                    else
                    {

                    $("#availability_email").html('<font color="#cc0000">Please Enter Email Id</font>');
                    }
                    return false;
                });
			  
                $("#username").change(function() { 
                    var username = $("#username").val();
                    if(username.length > 5)
                    {
                        $("#availability_status").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loader.gif" align="absmiddle">Checking availability...');
                        $.ajax({ 
                            type: "POST",
                            url: "<?php echo Yii::app()->createUrl("site/checkusername"); ?>",
                            data: {username: username}, 
                            success: function(server_response){

                                    if(server_response == '0')
                                    {
                                        $("#availability_status").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/available.png" align="absmiddle"> <font color="Green"> User name Available </font>  ');
                                      
                                    }
                                    else  if(server_response == '1')
                                    {
                                        $("#availability_status").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/not_available.png" align="absmiddle"> <font color="red"> Sorry User name already taken, Please try another User name</font>');
                                    }
                            }
                        });

                    }
                    else
                    {

                    $("#availability_status").html('<font color="#cc0000">User name too short</font>');
                    }
                    return false;
                });
				
				
		 $("#security_code").change(function() { 
                    var security_code = $("#security_code").val();
                    if(security_code !=' ')
                    {
                        $("#availability_security_code").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loader.gif" align="absmiddle">Checking availability...');
                    
                        $.ajax({ 
                            type: "POST",
                            url: "<?php echo Yii::app()->createUrl("site/checkCaptcha"); ?>",
                            data: {security_code: security_code}, 
                            success: function(server_response){

                                    if(server_response == '0')
                                    {
                                        $("#availability_security_code").html(' ');
                                      
                                    }
                                    else  if(server_response == '1')
                                    {
                                        $("#availability_security_code").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/not_available.png" align="absmiddle"> <font color="red"> Captcha code is Incorrect,Please Try again</font>');
                                    }
                            }
                        });
                    }
                    else
                    {

                    $("#availability_security_code").html('<font color="#cc0000">Please Enter Email Id</font>');
                    }
                    return false;
                });		
				
            });
			
 function validatePassword(){	
  var validator = $("#loginForm").validate({ 
  rules: { 
  username:"required", 
  password :"required",
  cpassword:{ equalTo: "#password" }	
  },
  messages: { password :"Enter Password", cpassword :"Enter Confirm Password Same as Password" } });
   } </script>

<style type="text/css">

form label.error{
    font:20px Tahoma,sans-serif;
    color:#FF0000;
    margin-left:5px;
    display:inline;
}
</style>

<div class="container">
<?php echo homepagecontent('2');?>
<form action="" method="post" id="loginForm" name="loginForm">
       
		<div style="margin-bottom:20px;"></div>
		<div class="style_form">
              <?php  echo homepagecontent('3');?>
		</div>
		<div style="margin-bottom:20px;"></div>
		<div style="margin-bottom:20px;"></div>
		<div class="style_form">
             <label for="fname">    <input type="text" name="fname" id="fname" class="form_element"/>   Full Name </label>
        </div>
		  <div class="style_form">
              <label for="lname">   <input type="text" name="lname" id="lname" class="form_element"/>   Last Name </label>
        </div>
        <div class="style_form">
               <label for="email">    <input type="email" name="email" id="email" class="form_element" required/>   Email <font color="#FF0000">*</font>  >  Please Enter a valid Email Adress .</label>
		     <span id="availability_email"></span>
        </div>
		<div class="style_form">
                 <label for="news"><input type="checkbox" name="newsleter" checked="checked"  style="margin:10px;" value="1" />Newsletter  <font color="#FF0000">*</font> </label>
				 <label for="news" style="margin-left:30px;">Yes, I would like to receive the newsletter</label>
        </div>
		
		<div class="style_form">
                 <label for="mobile"> <input type="text" pattern="[0-9]*" title="Please Enter Digits"  name="mobile" class="form_element"/>Phone </label>
        </div>
		  <div class="style_form">
                   <label for="username"> <input type="text" name="username" id="username" class="form_element" pattern=".{5,}" title="Minmimum 5 letters or numbers" required/>   Username <font color="#FF0000">*</font>  >  Enter a user name for yourself, which you can log in later. </label>
          <span id="availability_status"></span> </div>
		  
		  <div class="style_form">
                    <label for="Password"><input type="password" name="password" id="password" pattern=".{5,}" title="Minmimum 5 letters or numbers" required>     Password <font color="#FF0000">*</font>  > Enter a password and keep it in mind for the login.</label>
           </div>
		  
		  <div class="style_form">
                       <label for="cpassword"><input type="password" name="cpassword" id="cpassword" pattern=".{5,}" title="Minmimum 5 letters or numbers" required >Confirm Password<font color="#FF0000">*</font> </label>
          </div>  
		  
		  <div class="style_form">
               <label for="captcha">    <input type="text" name="security_code" id="security_code" class="form_element" required/> <img src="<?php echo Yii::app()->request->baseUrl; ?>/security/CaptchaSecurityImages.php?characters=4&width=100&height=70" border="0" />   Spam protection, they type in the word / number sequence! <font color="#FF0000">*</font>  >  CAPTCHA </label>
			     <span id="availability_security_code"></span>
		   </div>
		  
         <div class="form-actions">
			<input type="submit" name="register" value="Register" class="btn btn-primary" onClick="validatePassword();" />
			<input type="reset" value="Reset"  class="btn"/>
			</div> 
      </form>
</div>
<? } ?>