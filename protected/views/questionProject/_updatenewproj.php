<? 
$project_id=$model->project_id;
$userdbid=Yii::app()->user->id;
$lcount=$model->level_count;
$rcount=$model->room_count;
$subject= $model->subject;
$description= $model->description;
$project_name= $model->project_name;

?>
<form id="QuestionAnswers" method="post" name="QuestionAnswers">
	<div class="container" id="page">
	  <div id="content">
		<div class="questionsDiv">
		        
                <div class="question">
                      <div>Project Name</div>
                      <div class="answer" ><input type="text" name="ProjectName" required id="ProjectName" value="<? print $project_name;?>" required /></div>
                </div>
				
				 <div class="question">
                      <div>Subject</div>
                      <div class="answer" >
					     <textarea name="subject" class="span11" required id="subject"><? print $subject;?></textarea></div>
                </div>
				 <div class="question">
                      <div>Description</div>
                      <div class="answer" >
					  <textarea name="description" id="description" class="span11"><? print $description;?></textarea>
                </div>
				 <div class="question">
                      <div>Levels</div>
                      <div class="answer" >
					  <input type="text" name="levels" required  id="levels" class="input-large" value="<? print $lcount;?>"  /></div>
                </div>
				<div class="question">
                      <div>Rooms</div>
                      <div class="answer" >
					  <input type="text" name="rooms" required  id="rooms" class="input-large" value="<? print $rcount;?>"  /></div>
                </div>
                
		</div>
		
			</div>
      
      
    </div>
<!--<input type="button"  value="Submit"  onclick="submitProjectData()" />
--><? 
 ?>
 <input type="hidden" name="project_id" value=" <? echo $project_id;?>" />
 <input type="submit"  value="Update"  onclick="submitProject" class="btn btn-primary" />

<input type="reset" value="Reset"  class="btn"/>
<input type="hidden" name="submitProject" />
</form>	
