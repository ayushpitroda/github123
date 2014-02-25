<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */

$news= $model->newsletter;

?>

<form action="" method="post" id="loginForm" name="loginForm">
      
<div style="margin-bottom:20px;"></div>
		<div class="style_form">
             <label for="fname">    <input type="text" name="fname" id="fname" class="form_element" value="<? print $model->fname;?>"/> Full Name</label>
        </div>
		  <div class="style_form">
              <label for="lname">   <input type="text" name="lname" id="lname" class="form_element" value="<? print $model->lname;?>"/>Last Name </label>
        </div>
        <div class="style_form">
               <label for="email">    <input type="email" name="email" id="email" class="form_element" required value="<? print $model->email;?>"/>  Email <font color="#FF0000">*</font>  >  Please Enter a valid Email Adress </label>
		     <span id="availability_email"></span>
        </div>
		<div class="style_form">
                 <label for="news"><input type="checkbox" name="newsleter"  style="margin:10px;" value="1" <? if($news=='1') { ?> checked="checked"  <? } ?> />Newsletter  <font color="#FF0000">*</font> </label>
				 <label for="news" style="margin-left:30px;">Yes, I would like to receive the newsletter</label>
        </div>
		
		<div class="style_form">
                 <label for="mobile"> <input type="text"  title="Phone"  value="<? print $model->mobile;?>" name="mobile" class="form_element"/> Phone</label>
        </div>
		  <div class="style_form">
                   <label for="username"> <input type="text" name="username" id="username" class="form_element" pattern=".{5,}" title="Minmimum 5 letters or numbers" required value="<? print $model->username;?>"/> Username <font color="#FF0000">*</font>  > Enter a user name for yourself, which you can log in later. </label>
          <span id="availability_status"></span> </div>
		  
         <div class="form-actions">
			<input type="submit" name="update" value="Save" class="btn btn-primary" onClick="validatePassword();" />
			<input type="hidden" name="user_id" value="<? print $model->id;?>" />
			<input type="reset" value="Reset"  class="btn"/>
			</div> 
      </form>
<!-- form -->
 <script type="text/javascript">
            $(document).ready(function() {  //When the dom is ready
             //  alert("ready!");
			 
			  
			   $("#Users_email").change(function() { //if therezs a change in the username textbox
                    var email = $("#Users_email").val();//Get the value in the username textbox
                    if(email !=' ')
                    {
                        $("#availability_email").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loader.gif" align="absmiddle">Checking availability...');
                        //Add a loading image in the span id="availability_status"

                        $.ajax({ 
                            type: "POST",
                            url: "<?php echo Yii::app()->createUrl("site/checkemail"); ?>",
                            data: {email: email}, 
                            success: function(server_response){

                                    if(server_response == '0')//if ajax_check_username.php return value "0"
                                    {
                                        $("#availability_email").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/available.png" align="absmiddle"> <font color="Green"> Email Id Available</font>  ');
                                        //add this image to the span with id "#availability_status"
                                    }
                                    else  if(server_response == '1')//if it returns "1"
                                    {
                                        $("#availability_email").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/not_available.png" align="absmiddle"> <font color="red">Sorry Email Id already taken, Please try another Email Id</font>');
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
			  
			  
                $("#Users_username").change(function() { //if therezs a change in the username textbox
                    var username = $("#Users_username").val();//Get the value in the username textbox
				
                    if(username.length > 4)
                    {
                        $("#availability_status").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loader.gif" align="absmiddle">Checking availability ...');
                        //Add a loading image in the span id="availability_status"

                        $.ajax({ 
                            type: "POST",
                            url: "<?php echo Yii::app()->createUrl("site/checkusername"); ?>",
                            data: {username: username}, 
                            success: function(server_response){

                                    if(server_response == '0')//if ajax_check_username.php return value "0"
                                    {
                                        $("#availability_status").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/available.png" align="absmiddle"> <font color="Green">User name Available</font>  ');
                                        //add this image to the span with id "#availability_status"
                                    }
                                    else  if(server_response == '1')//if it returns "1"
                                    {
                                        $("#availability_status").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/not_available.png" align="absmiddle"> <font color="red">Sorry User name already taken, Please try another User name</font>');
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