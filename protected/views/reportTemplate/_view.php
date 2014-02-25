<?php
/* @var $this ReportTemplateController */
/* @var $data ReportTemplate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('REPORT_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->REPORT_ID), array('view', 'id'=>$data->REPORT_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BUSINESS_UNIT')); ?>:</b>
	<?php echo CHtml::encode($data->BUSINESS_UNIT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REPORT_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->REPORT_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REPORT_BODY')); ?>:</b>
	<?php echo CHtml::encode($data->REPORT_BODY); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	*/ ?>

</div>