<?php
/* @var $this TESTSController */
/* @var $model TESTS */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tests-form',
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'TEST_DESCR'); ?>
		<?php echo $form->textField($model,'TEST_DESCR',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div>	
		      <?php echo CHtml::activeCheckBox($model,'MOLD_IND'); ?> Mold
	</div>		  
	<div class="row">
		<?php echo CHtml::activeCheckBox($model,'BACTERIA_IND'); ?> Bacteria
	</div>
	<div class="row">
		<?php echo CHtml::activeCheckBox($model,'ALLERGEN_IND'); ?> Allergen
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model,'CHEMICAL_IND'); ?> Chemical
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model,'ASBESTOS_IND'); ?> Asbestos
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model,'PARTICULATE_ANALYSIS_IND'); ?> Particulate Analysis
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model,'BUILDING_MATERIAL_IND'); ?>  Building Material
	</div>
	<div class="row">
		<?php echo CHtml::activeCheckBox($model,'RELATIVE_HUMIDITY_IND'); ?> Relative  Humidity	 
	</div>
<div class="row">
		<?php echo CHtml::activeCheckBox($model,'TEMPERATURE_IND'); ?>	 Temprature
	</div>
	<div class="row">
		<?php echo CHtml::activeCheckBox($model,'SAMPLE_STRT_DTTM_IND'); ?>	 Sample Start Date/ Time
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model,'SAMPLE_END_DTTM_IND'); ?>	Sample End Date/ Time
	</div>

	<div class="row">
		<?php echo CHtml::activeCheckBox($model,'LAB_CODE_IND'); ?>	 Lab Code
	</div>
	
	 <div class="row">		
	Status
    <?php echo $form->radioButtonList($model,'STATUS', $model->getSatusOptions()); ?> 
	 </div>
	 

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->