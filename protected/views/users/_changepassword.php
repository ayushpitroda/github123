<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Change Password</title>
    	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqueryvalidate.js"></script>
		 <script type="text/javascript">
            $(document).ready(function() {  //When the dom is ready
              // alert("ready!");
			   $("#oldpassword").change(function() { //if therezs a change in the username textbox
                    var oldpassword = $("#oldpassword").val();//Get the value in the username textbox
                    if(oldpassword !=' ')
                    {
                        $("#check_password").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loader.gif" align="absmiddle">Checking Password...');
                        //Add a loading image in the span id="availability_status"
                    $.ajax({ 
                            type: "POST",
                            url: "<?php echo Yii::app()->createUrl("site/checkpassword"); ?>",
                            data: {oldpassword: oldpassword}, 
                            success: function(server_response){
                                    if(server_response == '0')//if ajax_check_username.php return value "0"
                                    {
                                        $("#check_password").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/available.png" align="absmiddle"> <font color="Green"> Passwords are Matched </font>  ');
                                        //add this image to the span with id "#availability_status"
                                    }
                                    else  if(server_response == '1')//if it returns "1"
                                    {
                                        $("#check_password").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/not_available.png" align="absmiddle"> <font color="red">Passwords are not Matched</font>');
                                    }
                            }
                        });
                    }
                    else
                    {

                    $("#check_password").html('<font color="#cc0000">Please Enter Password</font>');
                    //if in case the username is less than or equal 3 characters only
                    }
                    return false;
                });
            });
    </script>
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
    <form action="" method="post" id="loginForm" name="loginForm">
		  <div class="style_form">
          <label for="Password">Old Password:</label>
         <input type="password" name="oldpassword" id="oldpassword"  required>
		  <span id="check_password"></span></div>
    	    <div class="style_form">
          <label for="cpassword">New Password :</label>
          <input type="password" name="password" id="password" pattern=".{5,}" title="Minmimum 5 letters or numbers" required >
          </div>  
		  <div class="style_form">
          <label for="cpassword">Change Password  :</label>
          <input type="password" name="cpassword" id="cpassword" pattern=".{5,}" title="Minmimum 5 letters or numbers" required >
          </div>  
         <div class="form-actions">
			<input type="submit" name="changepassword" value="Update" class="btn btn-primary" onClick="validatePassword();" />
			<input type="reset" value="Reset"  class="btn"/>
			</div> 
      </form>
	</body> </html> 