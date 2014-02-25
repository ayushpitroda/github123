<?php
/* @var $this TESTSController */
/* @var $data TESTS */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TEST_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TEST_ID), array('view', 'id'=>$data->TEST_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TEST_DESCR')); ?>:</b>
	<?php echo CHtml::encode($data->TEST_DESCR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MOLD_IND')); ?>:</b>
	<?php echo CHtml::encode($data->MOLD_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BACTERIA_IND')); ?>:</b>
	<?php echo CHtml::encode($data->BACTERIA_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALLERGEN_IND')); ?>:</b>
	<?php echo CHtml::encode($data->ALLERGEN_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CHEMICAL_IND')); ?>:</b>
	<?php echo CHtml::encode($data->CHEMICAL_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ASBESTOS_IND')); ?>:</b>
	<?php echo CHtml::encode($data->ASBESTOS_IND); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PARTICULATE_ANALYSIS_IND')); ?>:</b>
	<?php echo CHtml::encode($data->PARTICULATE_ANALYSIS_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BUILDING_MATERIAL_IND')); ?>:</b>
	<?php echo CHtml::encode($data->BUILDING_MATERIAL_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RELATIVE_HUMIDITY_IND')); ?>:</b>
	<?php echo CHtml::encode($data->RELATIVE_HUMIDITY_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TEMPERATURE_IND')); ?>:</b>
	<?php echo CHtml::encode($data->TEMPERATURE_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SAMPLE_STRT_DTTM_IND')); ?>:</b>
	<?php echo CHtml::encode($data->SAMPLE_STRT_DTTM_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SAMPLE_END_DTTM_IND')); ?>:</b>
	<?php echo CHtml::encode($data->SAMPLE_END_DTTM_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAB_CODE_IND')); ?>:</b>
	<?php echo CHtml::encode($data->LAB_CODE_IND); ?>
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

	*/ ?>

</div>