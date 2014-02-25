<?php
/* @var $this QuestionEmailsController */
/* @var $data QuestionEmails */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('auto_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->auto_id), array('view', 'id'=>$data->auto_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</b>
	<?php echo CHtml::encode($data->project_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />


</div>