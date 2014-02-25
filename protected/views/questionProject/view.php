<?
$project_id=$model->project_id;
$lcount=$model->level_count;
$roomcount=$model->room_count;
$subject=$model->subject;
$description=$model->description;

if(!userprojectaccess($project_id))
{
	if(checkrightsfunc(1))
	{
	}
	else
	{ ?>
	<div align="center" <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
	<meta http-equiv="refresh" content="1;url='../../index.php'" />
	<? exit();
}
?>
<div><font color="#FF0000" size="+5">You Don't have a Permissons to Access this Page</font></div>
<meta http-equiv="refresh" content="2;url='../../index.php'" />
<?
exit();
}
?>

<div class="container">
<div style="background-color:#f1f1f1;padding:10px;">
     <div align="right">
		<?php echo CHtml::htmlButton('<i class="icon-print"></i> Print', array('submit' => array('QuestionProject/projectprint', 'project_id'=>$model->project_id),'class' => 'btn btn-medium pull-right')); ?>
		<?php echo CHtml::htmlButton('<i class="icon-download-alt"></i> PDF ', array('submit' => array('QuestionProject/createpdf', 'project_id'=>$model->project_id),'class' => 'btn btn-medium pull-right')); ?>
		<?php echo CHtml::htmlButton('<i class="icon-edit"></i> Update Project', array('submit' => array('QuestionProject/update', 'id'=>$model->project_id),'class' => 'btn btn-medium pull-right')); ?>
		<?php echo CHtml::htmlButton('<i class="icon-list"></i> View All Projects', array('submit' => array('admin'),'class' => 'btn btn-medium pull-right')); ?>
	</div>
	<h3><?php echo $model->project_name ;?></h3>
	 <div class="row">
		 <div style="display:table;margin-bottom:10px; margin-left:5px;padding:5px;font-size:20px;" class="span10">
			<div class="span6" style="color:#257189;"><strong>Project Name</strong></div>
			<div style="color:#257189;"><?php echo $model->project_name ;?></div>
		 </div>   
	</div>
	<div class="row">
		 <div style="display:table;margin-bottom:10px; margin-left:5px;padding:5px;" class="span10">
			<div class="span6"><strong>Subject</strong></div>
			<div><?php echo $model->project_name ;?></div>
		 </div>   
	</div>
	<div class="row">
		 <div style="display:table;margin-bottom:10px; margin-left:5px;padding:5px;" class="span10">
			<div class="span6"><strong>Description</strong></div>
			<div><?php echo $model->description ;?></div>
		 </div>   
	</div>
	<div class="row">
		 <div style="display:table;margin-bottom:10px; margin-left:5px;padding:5px;" class="span10">
			<div class="span6"><strong>Levels</strong></div>
			<div><?php echo $model->level_count ;?></div>
		 </div>   
	</div>
	<div class="row">
		 <div style="display:table;margin-bottom:10px; margin-left:5px;padding:5px;" class="span10">
			<div class="span6"><strong>Rooms</strong></div>
			<div><?php echo $model->room_count ;?></div>
		 </div>   
	</div>
	 

</div>   
</div>
