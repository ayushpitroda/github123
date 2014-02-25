<?php
/* @var $this ETSROOMSController */
/* @var $data ETSROOMS */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROOM_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ROOM_ID), array('view', 'id'=>$data->ROOM_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROOM_DESCR')); ?>:</b>
	<?php echo CHtml::encode($data->ROOM_DESCR); ?>
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