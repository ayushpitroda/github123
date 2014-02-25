<?
 $project_id=$_GET['id'];
$userdbid=Yii::app()->user->id;
$userarray=userdetailsfetchfunc($userdbid);
$fname=$userarray['fname'];
$lname=$userarray['lname'];
$email=$userarray['email'];
$default_subject= ProjectView($project_id);
?>
<div class="ccontainer">
<div>
 <legend> <font color="#ed5800"><?php  echo projectnamefunc($project_id);?></font>
 </legend>
</div>
<form name="invite" method="post">
	<legend>
	<br />
	       <label id="more_emails">To: <input type="email" name="to" id="useremail" required  class="input-large"/>	  <a class="add_new_email" href="#">Add cc</a>
		   </label>	
	</legend>
	<legend>
	       <label> Subject:</label>
		   <label>
		    <textarea name="subject" class="span11" required></textarea>
		   </label>	
	</legend>
	<legend>
	       <label> Description:</label>
		   <label>
		    <textarea name="description" class="span11" rows="8" required></textarea>
		   </label>	
	</legend>
	<legend>
	       <label> Sender Mail:</label>
		   <label>
		   		   <input type="text" name="sender_email" value="<? print $email;?>" class="input-large" >

		   </label>	
	</legend>
	<legend>
	       <label> <input type="checkbox" name="checkproject" checked="checked" id="projectcheck"> Send email with project details</label>
		   <label>
		   		 <div id="projectview"> <?  print $default_subject;?></div>

		   </label>	
	</legend>
	<legend>
	   <label>
	     <div class="form-actions">
		    <input type="hidden" name="project_id" value="<? echo $project_id;?>" />
			<input type="submit" name="email" value="Send" class="btn btn-primary" />
			<input type="reset" value="Reset"  class="btn"/>
        </div> 
	   </label>
	 </legend>
	

</form>
</div>

<script language="javascript">

$(document).ready(function(){
	  $("#projectcheck").click(function(){
     var isChecked = $('#projectcheck').prop('checked');
	   if($('#projectcheck').is(":checked")) {
			   $("#projectview").show();
                
            } else {
			   
			     $("#projectview").hide();
            }
  });
});


  $("#more_emails").delegate(".add_new_email", "click", function() {
    var content = '<div>' +
	                     'cc:' + '&nbsp;'+
                         '<input type="email" name="cc[]" class="input-large" />&nbsp;' +
                          '<a class="del_email" href="#">Delete</a>&nbsp;' +
                          '<a class="add_new_email" href="#">Add cc</a>'+
                         '</div>';
    $("#more_emails").append(content);
    return false;   
});

$("#more_emails").delegate(".del_email", "click", function() {
    $(this).parent().remove();
    return false;  
});
</script>