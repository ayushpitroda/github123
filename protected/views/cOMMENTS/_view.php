<?php
/* @var $this COMMENTSController */
/* @var $data COMMENTS */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMMENT_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->COMMENT_ID), array('view', 'id'=>$data->COMMENT_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMMENT_DESCR')); ?>:</b>
	<?php echo CHtml::encode($data->COMMENT_DESCR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LOCATION_IDS')); ?>:</b>
	<?php echo CHtml::encode($data->LOCATION_IDS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_DTTM')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_DTTM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LASTUPDDTTM')); ?>:</b>
	<?php echo CHtml::encode($data->LASTUPDDTTM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LASTUPDUSER')); ?>:</b>
	<?php echo CHtml::encode($data->LASTUPDUSER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />


</div>