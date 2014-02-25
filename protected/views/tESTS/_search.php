<?php
/* @var $this TESTSController */
/* @var $model TESTS */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'TEST_ID'); ?>
		<?php echo $form->textField($model,'TEST_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TEST_DESCR'); ?>
		<?php echo $form->textField($model,'TEST_DESCR',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MOLD_IND'); ?>
		<?php echo $form->textField($model,'MOLD_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BACTERIA_IND'); ?>
		<?php echo $form->textField($model,'BACTERIA_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ALLERGEN_IND'); ?>
		<?php echo $form->textField($model,'ALLERGEN_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CHEMICAL_IND'); ?>
		<?php echo $form->textField($model,'CHEMICAL_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ASBESTOS_IND'); ?>
		<?php echo $form->textField($model,'ASBESTOS_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PARTICULATE_ANALYSIS_IND'); ?>
		<?php echo $form->textField($model,'PARTICULATE_ANALYSIS_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BUILDING_MATERIAL_IND'); ?>
		<?php echo $form->textField($model,'BUILDING_MATERIAL_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RELATIVE_HUMIDITY_IND'); ?>
		<?php echo $form->textField($model,'RELATIVE_HUMIDITY_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TEMPERATURE_IND'); ?>
		<?php echo $form->textField($model,'TEMPERATURE_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SAMPLE_STRT_DTTM_IND'); ?>
		<?php echo $form->textField($model,'SAMPLE_STRT_DTTM_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SAMPLE_END_DTTM_IND'); ?>
		<?php echo $form->textField($model,'SAMPLE_END_DTTM_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LAB_CODE_IND'); ?>
		<?php echo $form->textField($model,'LAB_CODE_IND',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATE_DTTM'); ?>
		<?php echo $form->textField($model,'CREATE_DTTM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LASTUPDDTTM'); ?>
		<?php echo $form->textField($model,'LASTUPDDTTM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LASTUPDUSER'); ?>
		<?php echo $form->textField($model,'LASTUPDUSER',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->