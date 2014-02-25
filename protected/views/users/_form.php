<?
$rolestype = Roles::model()->findAll();
$rolestypelist = CHtml::listData($rolestype, 'role_id', 'role_name');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
            "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqueryvalidate.js"></script>
 <script type="text/javascript">
            $(document).ready(function() {  //When the dom is ready
              // alert("ready!");
			  
			   $("#email").change(function() { //if therezs a change in the username textbox
                    var email = $("#email").val();//Get the value in the username textbox
                    if(email !=' ')
                    {
                        $("#availability_email").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loader.gif" align="absmiddle">&nbsp; Checking availability...');
                        //Add a loading image in the span id="availability_status"

                        $.ajax({ 
                            type: "POST",
                            url: "<?php echo Yii::app()->createUrl("site/checkemail"); ?>",
                            data: {email: email}, 
                            success: function(server_response){

                                    if(server_response == '0')//if ajax_check_username.php return value "0"
                                    {
                                        $("#availability_email").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/available.png" align="absmiddle"> <font color="Green">Email Id Available</font>  ');
                                        //add this image to the span with id "#availability_status"
                                    }
                                    else  if(server_response == '1')//if it returns "1"
                                    {
                                        $("#availability_email").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/not_available.png" align="absmiddle"> <font color="red"> Sorry Email Id already taken, Please try another Email Id</font>');
                                    }
                            }
                        });

                    }
                    else
                    {

                    $("#availability_email").html('<font color="#cc0000">Please Enter Email Id</font>');
                    //if in case the username is less than or equal 3 characters only
                    }
                    return false;
                });
			  
			  
                $("#username").change(function() { //if therezs a change in the username textbox
                    var username = $("#username").val();//Get the value in the username textbox
                    if(username.length > 5)
                    {
                        $("#availability_status").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loader.gif" align="absmiddle">&nbsp; Checking availability...');
                        //Add a loading image in the span id="availability_status"

                        $.ajax({ 
                            type: "POST",
                            url: "<?php echo Yii::app()->createUrl("site/checkusername"); ?>",
                            data: {username: username}, 
                            success: function(server_response){

                                    if(server_response == '0')//if ajax_check_username.php return value "0"
                                    {
                                        $("#availability_status").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/available.png" align="absmiddle"> <font color="Green">User name Available </font>  ');
                                        //add this image to the span with id "#availability_status"
                                    }
                                    else  if(server_response == '1')//if it returns "1"
                                    {
                                        $("#availability_status").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/not_available.png" align="absmiddle"> <font color="red"> Sorry User name already taken, Please try another User name</font>');
                                    }
                            }
                        });

                    }
                    else
                    {

                    $("#availability_status").html('<font color="#cc0000">User name too short</font>');
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
  username:"required", 
  password :"required",
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
          <label for="fname">Full Name :</label>
          <input type="text" name="fname" id="fname" class="form_element"/>
        </div>
		  <div class="style_form">
          <label for="lname">Last Name :</label>
          <input type="text" name="lname" id="lname" class="form_element"/>
        </div>
        <div class="style_form">
          <label for="email">Email :</label>
          <input type="email" name="email" id="email" class="form_element" required/>
		     <span id="availability_email"></span>
        </div>
		<div class="style_form">
          <label for="mobile">Phone :</label>
          <input type="text" pattern="[0-9]*" title="Please Enter Digits"  name="mobile" class="form_element"/>
        </div>
		  <div class="style_form">
          <label for="username">Username :</label>
          <input type="text" name="username" id="username" class="form_element" pattern=".{5,}" title="Minmimum 5 letters or numbers" required/>
          <span id="availability_status"></span> </div>
		  
		  <div class="style_form">
          <label for="Password">Password :</label>
         <input type="password" name="password" id="password" pattern=".{5,}" title="Minmimum 5 letters or numbers" required>
          </div>
		  
		  <div class="style_form">
          <label for="cpassword">Confirm Password  :</label>
          <input type="password" name="cpassword" id="cpassword" pattern=".{5,}" title="Minmimum 5 letters or numbers" required >
          </div> 
		    <div class="style_form">
          <label for="role">Roles  :</label>
        	<select name="role[]" multiple="multiple" size="5" required>
	   <? 	
			foreach($rolestype as $catkey => $catvalue)
			{ ?>
			<option value="<?php echo $catvalue['role_id'];?>" id="<?php echo $catvalue['role_id'];?>"><?php echo $catvalue['role_name'];?></option>
			<?  }  ?>
     	</select> 
          </div> 
		   
         <div class="form-actions">
			<input type="submit" name="register" value="Register" class="btn btn-primary" onClick="validatePassword();" />
			<input type="reset" value="Reset"  class="btn"/>
			</div> 
      </form>

	</body> </html> 