<?php
/* @var $this BusinessunitController */
/* @var $data BusinessUnit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('BUSINESS_UNIT')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->BUSINESS_UNIT), array('view', 'id'=>$data->BUSINESS_UNIT)); ?>
	<br />
	
    <b><?php echo CHtml::encode($data->getAttributeLabel('Company Name')); ?>:</b>
	<?php echo CHtml::encode($data->BUSINESS_UNIT_ID); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Company Name')); ?>:</b>
	<?php echo CHtml::encode($data->BU_DESCR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LOGO')); ?>:</b>
	<?php echo CHtml::encode($data->LOGO); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('ADDRESS1')); ?>:</b>
	<?php echo CHtml::encode($data->ADDRESS1); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ADDRESS2')); ?>:</b>
	<?php echo CHtml::encode($data->ADDRESS2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CITY')); ?>:</b>
	<?php echo CHtml::encode($data->CITY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATE')); ?>:</b>
	<?php echo CHtml::encode($data->STATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ZIP')); ?>:</b>
	<?php echo CHtml::encode($data->ZIP); ?>
	<br />

	*/ ?>

</div>