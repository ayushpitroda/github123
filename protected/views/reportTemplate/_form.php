<?php
/* @var $this ReportTemplateController */
/* @var $model ReportTemplate */
/* @var $form CActiveForm */
?>

<div class="form formall">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-template-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'BUSINESS_UNIT'); ?>
		<?php echo $form->textField($model,'BUSINESS_UNIT');?>
		<?php echo $form->error($model,'BUSINESS_UNIT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REPORT_NAME'); ?>
		<?php echo $form->textField($model,'REPORT_NAME',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'REPORT_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REPORT_BODY'); ?>
		<?php echo $form->textArea($model,'REPORT_BODY',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'REPORT_BODY'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->