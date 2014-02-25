<? session_start();?><title>Forgot Password</title>

<form action="" method="post" id="forgotpassword" name="forgotpassword">
      
        <div class="style_form">
          <label for="fname">Email:</label>
          <input type="text" name="email" id="email" class="form_element"/>
        </div>
		 
         <div class="form-actions">
			<input type="submit" name="forgotusername" value="submit" class="btn btn-primary" onClick="validatePassword();" />
			<input type="reset" value="Reset"  class="btn"/>
			</div> 
      </form>

