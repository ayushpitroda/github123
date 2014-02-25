<?php
/* @var $this PagesController */
/* @var $data Pages */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('auto_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->auto_id), array('view', 'id'=>$data->auto_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	
</div>