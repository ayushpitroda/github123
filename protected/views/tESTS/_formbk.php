<?php
/* @var $this TESTSController */
/* @var $model TESTS */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tests-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'TEST_DESCR'); ?>
		<?php echo $form->textField($model,'TEST_DESCR',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'TEST_DESCR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MOLD_IND'); ?>
		<?php echo $form->textField($model,'MOLD_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'MOLD_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BACTERIA_IND'); ?>
		<?php echo $form->textField($model,'BACTERIA_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'BACTERIA_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ALLERGEN_IND'); ?>
		<?php echo $form->textField($model,'ALLERGEN_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ALLERGEN_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CHEMICAL_IND'); ?>
		<?php echo $form->textField($model,'CHEMICAL_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'CHEMICAL_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ASBESTOS_IND'); ?>
		<?php echo $form->textField($model,'ASBESTOS_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ASBESTOS_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PARTICULATE_ANALYSIS_IND'); ?>
		<?php echo $form->textField($model,'PARTICULATE_ANALYSIS_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'PARTICULATE_ANALYSIS_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BUILDING_MATERIAL_IND'); ?>
		<?php echo $form->textField($model,'BUILDING_MATERIAL_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'BUILDING_MATERIAL_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RELATIVE_HUMIDITY_IND'); ?>
		<?php echo $form->textField($model,'RELATIVE_HUMIDITY_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'RELATIVE_HUMIDITY_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TEMPERATURE_IND'); ?>
		<?php echo $form->textField($model,'TEMPERATURE_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'TEMPERATURE_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SAMPLE_STRT_DTTM_IND'); ?>
		<?php echo $form->textField($model,'SAMPLE_STRT_DTTM_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'SAMPLE_STRT_DTTM_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SAMPLE_END_DTTM_IND'); ?>
		<?php echo $form->textField($model,'SAMPLE_END_DTTM_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'SAMPLE_END_DTTM_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LAB_CODE_IND'); ?>
		<?php echo $form->textField($model,'LAB_CODE_IND',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'LAB_CODE_IND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CREATE_DTTM'); ?>
		<?php echo $form->textField($model,'CREATE_DTTM'); ?>
		<?php echo $form->error($model,'CREATE_DTTM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LASTUPDDTTM'); ?>
		<?php echo $form->textField($model,'LASTUPDDTTM'); ?>
		<?php echo $form->error($model,'LASTUPDDTTM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LASTUPDUSER'); ?>
		<?php echo $form->textField($model,'LASTUPDUSER',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'LASTUPDUSER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->