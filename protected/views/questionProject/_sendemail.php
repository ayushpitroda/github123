
<?
    $getqsnid=$_GET['project_id'];
	
	
		
?>
<form id="questions" method="post" name="QQuery">
<input type="hidden" name="questionid" value="<?php echo $getqsnid?>" />
<div>
Question:
</div>    
<div>  
 <textarea name="main_question" class="span5" required><?php echo $db_fetch_qsns['question'];?></textarea>
</div>  




<div class="form-actions">
<input type="submit" name="QQuery" value="Submit" class="btn btn-primary" />
<input type="reset" value="Reset"  class="btn"/>
</div> 
</form>
 
</script>
  