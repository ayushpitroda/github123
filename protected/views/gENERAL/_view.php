<?php
/* @var $this GENERALController */
/* @var $data GENERAL */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('GENERAL_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->GENERAL_ID), array('view', 'id'=>$data->GENERAL_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPANY')); ?>:</b>
	<?php echo CHtml::encode($data->COMPANY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LOGO')); ?>:</b>
	<?php echo CHtml::encode($data->LOGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ADDRESS1')); ?>:</b>
	<?php echo CHtml::encode($data->ADDRESS1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ADDRESS2')); ?>:</b>
	<?php echo CHtml::encode($data->ADDRESS2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CITY')); ?>:</b>
	<?php echo CHtml::encode($data->CITY); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('STATE')); ?>:</b>
	<?php echo CHtml::encode($data->STATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ZIP')); ?>:</b>
	<?php echo CHtml::encode($data->ZIP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL')); ?>:</b>
	<?php echo CHtml::encode($data->EMAIL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PHONE')); ?>:</b>
	<?php echo CHtml::encode($data->PHONE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIMINGS')); ?>:</b>
	<?php echo CHtml::encode($data->TIMINGS); ?>
	<br />

	*/ ?>

</div>