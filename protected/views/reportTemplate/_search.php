<?php
/* @var $this ReportTemplateController */
/* @var $model ReportTemplate */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'BUSINESS_UNIT'); ?>
		<?php echo $form->textField($model,'BUSINESS_UNIT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REPORT_ID'); ?>
		<?php echo $form->textField($model,'REPORT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REPORT_NAME'); ?>
		<?php echo $form->textField($model,'REPORT_NAME',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REPORT_BODY'); ?>
		<?php echo $form->textArea($model,'REPORT_BODY',array('rows'=>6, 'cols'=>50)); ?>
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