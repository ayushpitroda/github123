<?php
/* @var $this EMAILTMPLController */
/* @var $model EMAILTMPL */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'emailtmpl-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Select Business Unit'); ?>
		<?php echo $form->textField($model,'BUSINESS_UNIT',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'BUSINESS_UNIT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'EMAIL_ID',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'EMAIL_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'EMAIL_NAME',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'EMAIL_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'From Mail); ?>
		<?php echo $form->textField($model,'FROM_EMAIL_DEF',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'FROM_EMAIL_DEF'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Subject'); ?>
		<?php echo $form->textField($model,'SUBJECT_DEF',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'SUBJECT_DEF'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Body'); ?>
		<?php echo $form->textArea($model,'EMAIL_BODY',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'EMAIL_BODY'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->