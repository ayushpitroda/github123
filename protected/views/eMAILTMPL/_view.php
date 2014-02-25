<?php
/* @var $this EMAILTMPLController */
/* @var $data EMAILTMPL */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->EMAIL_ID), array('view', 'id'=>$data->EMAIL_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BUSINESS_UNIT')); ?>:</b>
	<?php echo CHtml::encode($data->BUSINESS_UNIT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->EMAIL_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FROM_EMAIL_DEF')); ?>:</b>
	<?php echo CHtml::encode($data->FROM_EMAIL_DEF); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SUBJECT_DEF')); ?>:</b>
	<?php echo CHtml::encode($data->SUBJECT_DEF); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL_BODY')); ?>:</b>
	<?php echo CHtml::encode($data->EMAIL_BODY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_DTTM')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_DTTM); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('LASTUPDDTTM')); ?>:</b>
	<?php echo CHtml::encode($data->LASTUPDDTTM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LASTUPDUSER')); ?>:</b>
	<?php echo CHtml::encode($data->LASTUPDUSER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	*/ ?>

</div>